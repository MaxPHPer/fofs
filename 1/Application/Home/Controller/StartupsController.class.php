<?php
namespace Home\Controller;
use Home\Controller;
class StartupsController extends BaseController {
    public function _initialize() {
        parent::_initialize();

        //获取用户信息
        $id=session('user_id');
        $user=$this->getInfo($id);       
        $this->assign('user',$user);

    }

    //获取用户信息
    public function getInfo($id){
        $User=M('Startup_company');
        $list=$User->getById($id);
        return $list;
    }



    //个人主页
    public function individualProfile(){

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);


      $this->display();

    }

    //修改个人信息
    public function modifyPersonalInfo(){


        $this->display();
    }
    
    //更新机构管理员信息
    public function save_personalInfo(){

        $User=M('Startup_company');
        $data=I('post.');
        $data['id']=session('user_id');

        if($User->create($data)){        //更新信息
            $res=$User->save();
            if($res){
                session('username',$data['admin_name']);
                $this->success('信息更新成功',__APP__.'/Home/Startups/accountSetting');
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
          //成员信息
          $Senior_executive=M('Senior_executive');
          $where['institution_type']=session('institution_type');
          $where['institution_id']=session('user_id');
          $members=$Senior_executive->where($where)->select();

          $Business_experience=M('Business_experience');
          foreach($members as $key => $value){
              $where2['senior_executive_id']=$value['id'];
              $members[$key]['business_experience']=$Business_experience->where($where2)->select();
          }

          $this->assign('members',$members);
          $this->display();
    }

    //修改成员信息
    public function modifyMember(){
          //成员信息
          $Senior_executive=M('Senior_executive');
          $where['institution_type']=session('institution_type');
          $where['institution_id']=session('user_id');
          $where['id']=I('get.id');
          $members=$Senior_executive->where($where)->select();

          $Business_experience=M('Business_experience');
          foreach($members as $key => $value){
              $where2['senior_executive_id']=$value['id'];
              $members[$key]['business_experience']=$Business_experience->where($where2)->select();
          }

          $this->assign('members',$members);

          $this->display();
    }

    //保存成员信息
    public function do_modifyMember(){
        $User=M('Senior_executive');

        $data['username']=I('post.username');
        $data['function']=I('post.function');
        $data['id']=I('post.id');

        if($User->create($data)){
            //保存个人基本信息
            $user_id=$User->save();
            $where['institution_id']=session('user_id');
            //设置第一位为法人或代表
            if($User->where($where)->count()==1){
                $User->where('id='.(int)I('post.id'))->setField('is_representative',1);
            }

            if(I('post.business_experience')){
                //保存工作经历
                $Business_experience=M('Business_experience');
                // 批量添加数据
                $experience=I('post.business_experience');
                for($i=0;$i<count($experience['company_name']);$i++){
                    $dataList[] = array('senior_executive_id'=>(int)I('post.id'),'company_name'=>$experience['company_name'][$i],'function'=>$experience['function'][$i],'start_time'=>$experience['start_time'][$i],'end_time'=>$experience['end_time'][$i]);
                }

                $result=$Business_experience->addAll($dataList);    
                
                if($result){
                    $this->success('Success！修改保存成功',__APP__.'/Home/Startups/myCompany');
                }else{
                    $this->error($Business_experience->getError());
                }      
            }else{
                if($user_id){
                    $this->success('Success！保存成功',__APP__.'/Home/Startups/myCompany');
                }else{
                    $this->error($User->getError());
                }
            }



        }
        else{
            $this->error($User->getError());
        }
    }

    //删除成员信息
    public function deleteMember(){
        $Business_experience=M('Business_experience');
        $where['senior_executive_id']=I('get.id');
        $Business_experience->where($where)->delete();

        $Senior_executive=M('Senior_executive');
        $where2['id']=I('get.id');
        if($Senior_executive->where($where2)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }

    }

    //删除成员经历
    public function deleteExperience(){
        $Business_experience=M('Business_experience');
        $where['id']=I('get.id');
        if($Business_experience->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //添加新成员
    public function addMember(){
        $this->display();
    }


    //执行添加新成员
    public function do_addMember(){
        $User=M('Senior_executive');

        $data['username']=I('post.username');
        $data['function']=I('post.function');
        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['reg_time']=time();

        if($User->create($data)){
            //保存个人基本信息
            $user_id=$User->add();
            $where['institution_id']=session('user_id');
            //设置第一位为法人或代表
            if($User->where($where)->count()==1){
                $User->where('id='.(int)$user_id)->setField('is_representative',1);
            }

            //保存工作经历
            $Business_experience=M('Business_experience');
            // 批量添加数据
            $experience=I('post.business_experience');
            for($i=0;$i<count($experience['company_name']);$i++){
                $dataList[] = array('senior_executive_id'=>(int)$user_id,'company_name'=>$experience['company_name'][$i],'function'=>$experience['function'][$i],'start_time'=>$experience['start_time'][$i],'end_time'=>$experience['end_time'][$i]);
            }

            $result=$Business_experience->addAll($dataList);

            if($result){
                $this->success('Success！保存成功',__APP__.'/Home/Startups/myCompany');
            }else{
                $this->error($Business_experience->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }

    //账号设置
    public function accountSetting(){
        $this->display();
    }

    //我的粉丝
    public function myFollows(){
        $this->display();
    }


    //我关注的
    public function myFollowing(){
        $this->display();
    }

    //发送信件
    public function sendLetter(){
        $this->display();
    }

    //修改密码
    public function set_password(){
        if(I('post.newpassword')==I('post.renewpassword')){
            //确定用户类型
            $User=M('Startup_company');

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

    //修改公司信息
    public function modifyCompanyInfo(){
      $this->display();
    }

    //保存修改公司信息
    public function save_modifyCompanyInfo(){

       //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Startup_company');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_vision']=I('post.institution_vision');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['user_pain_points']=I('post.user_pain_points');
        $data['solutions']=I('post.solutions');
        $data['core_resources']=I('post.core_resources');
        $data['profit_model']=I('post.profit_model');
        $data['market_situation']=I('post.market_situation');
        $data['competitive_analysis']=I('post.competitive_analysis');
        $data['advantage_analysis']=I('post.advantage_analysis');
        $data['equity_structure']=I('post.equity_structure');
        $data['is_invested']=I('post.is_invested');
        $data['investment_round']=I('post.investment_round');
        $data['investment_quota']=I('post.investment_quota');
        $data['investor']=I('post.investor');
        $data['plan_investment_round']=I('post.plan_investment_round');
        $data['plan_invested_quota']=I('post.plan_invested_quota');
        $data['plan_transfer_shares']=I('post.plan_transfer_shares');
        $data['plan_to_do']=I('post.plan_to_do');
        $data['accept_joint_investment']=I('post.accept_joint_investment');

        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');
        $data['contact_wechat']=I('post.contact_wechat');
        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/startup_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/startup_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result || $_FILES){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $data['id'].'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                /*原图片地址*/
                                $img=$User->getFieldById($data['id'],'institution_logo_img');   //文件名
                                $path=__ROOT__.'/Public/uploads/startup_pic/';   //文件路径
                                if($img){
                                  unlink($path.$img);  //删除原文件
                                }

                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }else if($key=='bp_url'){
                        $upload->rootPath  =     './Public/uploads/startup_bp/'; // 设置附件上传根目录
                        if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息

                                /*原图片地址*/
                                $img=$User->getFieldById($data['id'],'bp_url');   //文件名
                                $path=__ROOT__.'/Public/uploads/startup_bp/';   //文件路径
                                if($img){
                                  unlink($path.$img);  //删除原文件
                                }
                                $User->where('id='.$data['id'])->setField('bp_url',$info['savename']);
                             }
                         }
                     }

                }

                $this->success('Success！修改成功',__APP__.'/Home/Startups/individualProfile');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

}