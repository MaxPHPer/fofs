<?php
namespace Home\Controller;
use Home\Controller;
class IndividualController extends BaseController {
    public function _initialize() {
        parent::_initialize();

        //获取用户信息
        $id=session('user_id');
        $user=$this->getInfo($id);       
        $this->assign('user',$user);
    }

    //获取用户信息
    public function getInfo($id){
        $User=M('User');
        $list=$User->getById($id);
        return $list;
    }



    //个人主页
    public function individualProfile(){

        //检查认证情况
        $Staff_auth=M('Staff_auth');
        $where=array();
        $where['user_id']=session('user_id');
        $where['user_name']=session('nickname');
        $staff_auths=$Staff_auth->where($where)->order('req_time desc')->limit(1)->select();
        $this->assign('staff_auth',$staff_auths[0]);

        $this->display();
    }

    //修改个人信息
    public function modifyPersonalInfo(){


        $this->display();
    }
    
    //更新个人信息
    public function save_individualInfo(){
        

        $User=M('User');
        $data=I('post.');

        $img=$User->getFieldById($data['id'],'head_portrait_url');   //头像名
        $path='./Public/uploads/individual_pic/';             //头像路径

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $path ; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if($User->create()){        //更新信息
            $res=$User->save();
            if($res!==false){
                //上传新头像
                foreach($_FILES as $key =>$file){
                    if(!empty($file['name'])) {
                        $upload->saveName  =   $data['id'].'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                        $info   =   $upload->uploadOne($file);
                        if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                        }else{// 上传成功 获取上传文件信息
                            unlink($path.$img);  //删除原文件
                            //新浪云删除文件
                            //sae_unlink('./Public/Uploads/xxx.jpg');
                            $res2=$User->where('id='.$data['id'])->setField('head_portrait_url',$info['savename']);
                        }
                    }
                }
                if($res2!==false){
                    session('username',$data['nickname']);
                    $this->success('信息更新成功',__APP__.'/Home/Individual/individualProfile');
                }
                else{
                    $this->error($User->getError());
                }
            }
            else{
                $this->error($User->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }


    //我的公司
    public function myCompany(){
        if($_POST['institution_type']&&$_POST['institution_name']){
             switch ($_POST['institution_type']) {
                    /*LP(母基金管理机构)*/
                    case '1':  $User=M('Lp');   break;
                    /*LP(母基金管理机构)end*/

                    /*GP(私募股权基金管理机构)*/
                    case '2':  $User=M('Gp');   break;
                    /*GP(私募股权基金管理机构)end*/

                    /*创业公司*/
                    case '3':  $User=M('Startup_company');  break;
                    /*创业公司end*/

                    /*fa服务机构*/
                    case '4':  $User=M('Fa');  break;
                    /*fa服务机构end*/

                    /*法务服务机构*/
                    case '5':  $User=M('Legal_agency');   break;
                    /*法务服务机构end*/

                    /*财务服务机构*/
                    case '6':  $User=M('Financial_institution');   break;
                    /*财务服务机构end*/

                    /*众创空间*/
                    case '7':  $User=M('Business_incubator');   break;
                    /*众创空间end*/

                    /*其它机构*/
                    case '8':  $User=M('Other_institution');   break;
                    /*其它机构*/

                    /*其它机构*/
                    case '9':  $User=M('User');   break;
                    /*其它机构*/


                    default:break;
            }
            $where['_string'] = ' (institution_abbr like "%'.$_POST['institution_name'].'%")  OR ( institution_fullname_cn like "'.$_POST['institution_name'].'") ';
            $results=$User->where($where)->field('id,institution_type,institution_abbr,institution_fullname_cn')->select();
            if($results){
                $search_result['has_result']=1;
                $search_result['institution_id']=$results[0]['id'];
                $search_result['institution_name']=$results[0]['institution_abbr'];
                $search_result['institution_type']=$results[0]['institution_type'];
                $this->assign('search_result',$search_result);
            }           
        }

        //检查认证情况
        $Staff_auth=M('Staff_auth');
        $where=array();
        $where['user_id']=session('user_id');
        $where['user_name']=session('nickname');
        $staff_auths=$Staff_auth->where($where)->order('req_time desc')->limit(1)->select();
        $this->assign('staff_auth',$staff_auths[0]);

        $this->display();
    }


    //账号设置
    public function accountSetting(){
        $this->display();
    }

    //修改密码
    public function set_password(){
        if(I('post.newpassword')==I('post.renewpassword')){
            //确定用户类型
            $User=M('User');

            $user=$User->getbyId(session('user_id'));    //读取用户数据

            if($user){
                if(md5(I('post.oldpassword'))==$user['password']){
                    $data['id']=session('user_id');
                    $data['password']=md5(I('post.newpassword'));

                    $result=$User->save($data);
                    if($result){
                        session(null);
                        $this->success('修改成功,请重新登录',__APP__.'/Home/Index/index');  
                    }else{
                        $this->error('密码修改失败');
                    }
                }
                else{
                    $this->error('原密码错误');
                }
            }else{
                $this->error('用户不存在');
            }
        }else{
            $this->error('新密码两次输入不一致');
        }
    }

    //发送公司认证请求
    public function send_auth_req(){
        if(I('institution_id')&&I('institution_type')&&I('institution_name')){
            $Staff_auth=M('Staff_auth');
            $data['user_id']=session('user_id');
            $data['user_name']=session('nickname');
            $data['institution_id']=I('institution_id');
            $data['institution_type']=I('institution_type');
            $data['institution_name']=I('institution_name');
            $data['req_time']=time();
            $data['state']=-1; //-1代表未审核，1代表审核通过，2代表拒绝
            if($Staff_auth->add($data)){
                $this->success('认证请求发送成功，待对方审核');
            }else{
                $this->error('认证请求发送失败');
            }
        }else{
            $this->error('参数不完整');
        }
        
    }

}