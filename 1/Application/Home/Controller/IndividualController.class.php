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

}