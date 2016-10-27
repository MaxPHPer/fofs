<?php
namespace Home\Controller;
use Home\Controller;
class LpController extends BaseController {
    public function _initialize() {
        parent::_initialize();

        //获取用户信息
        $id=session('user_id');
        $user=$this->getInfo($id);       
        $this->assign('user',$user);

    }

    //获取用户信息
    public function getInfo($id){
        $User=M('Lp');
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

      //基金信息
      $Lp_fund_product=M('Lp_fund_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $funds=$Lp_fund_product->where($where)->select();

      $Investment_project=M('Investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));


      $this->display();

    }

    //修改个人信息
    public function modifyPersonalInfo(){


        $this->display();
    }
    
    //更新机构管理员信息
    public function save_personalInfo(){

        $User=M('Lp');
        $data=I('post.');
        $data['id']=session('user_id');

        if($User->create($data)){        //更新信息
            $res=$User->save();
            if($res){
                session('username',$data['admin_name']);
                $this->success('信息更新成功',__APP__.'/Home/Lp/accountSetting');
            }
            else{
                $this->error($User->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }


    //收件箱
    public function inbox(){

        $this->display();
        die();
        
    }


    //发送消息
    public function sendmessage(){
        

        $Letter=M('Letter');
        $data=I('post.');
        $data['sender_id']=session('user_id');
        $data['sender_type']=1;
        $data['recipient_type']=2;
        $data['type']=2;
        $data['time']=time();

        if($Letter->create($data)){
            $res=$Letter->add();
            if($res){
                $this->success('发送成功');
            }
            else{
                $this->error($Letter->getError());
            }
        }
        else{
            $this->error($Letter->getError());
        }
    }

    //回复消息
    public function replyletter(){
        

        $Letter=M('Letter');
        $data=I('post.');
        $data['sender_id']=session('user_id');
        $data['sender_type']=1;
        $data['recipient_type']=2;
        $data['type']=2;
        $data['time']=time();
        if($Letter->create($data)){
            $res=$Letter->add();
            if($res){
                $setRead=$Letter->where('id='.$data['letterid'])->setField('state',1);
                $this->success('发送成功');
            }
            else{
                $this->error($Letter->getError());
            }
        }
        else{
            $this->error($Letter->getError());
        }
    }
    //设置已读
    public function setRead(){
        

        $id=I('get.id');
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');

        $Letter=M('Letter');
        $res=$Letter->where('id='.$id)->setField('state',1);
        redirect(__APP__.'/Home/Buyer/inbox');
    }

    //根据id得到消息的内容
    public function get_letter_by_id(){
        $id=I('id');
        if($id){
            $table=M('Letter');
            $letter=$table->getById($id);
            $data['status']=1;
            $data['letter']=$letter;

            if($letter['sender_type']==2){
                $Supplier=M('Supplier');        //得到发件人姓名
                $data['letter']['reciver']=$Supplier->getFieldById($letter['sender_id'],'username');
            }

            $this->ajaxReturn($data);
        }

        $data['status']=0;
        $this->ajaxReturn($data);
    }

    //根据id得到RFI的内容
    public function get_rfiletter_by_id(){
        $id=I('id');
        if($id){
            $type=session('lang')=='en'?'name_en':'name';
            $table=M('Letter');
            $letter=$table->where('id='.$id.' AND type=1')->find();
            $data['status']=1;
            $data['letter']=$letter;

            $Buyer=M('Buyer');
            $data['letter']['username']=$Buyer->getFieldById(session('user_id'),'username');

            $Supplier=M('Supplier');
            $Sup_company=M('Supplier_company');
            $com_id=$Supplier->getFieldById($letter['recipient_id'],'supplier_company_id');
            $data['letter']['companyname']=$Sup_company->getFieldById($com_id,$type);

            $data['letter']['servicer']=$Supplier->getFieldById($letter['recipient_id'],'username');

            $this->ajaxReturn($data);
        }

        $data['status']=0;
        $this->ajaxReturn($data);
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
                    $this->success('Success！修改保存成功',__APP__.'/Home/Lp/myCompany');
                }else{
                    $this->error($Business_experience->getError());
                }      
            }else{
                if($user_id){
                    $this->success('Success！保存成功',__APP__.'/Home/Lp/myCompany');
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
                $this->success('Success！保存成功',__APP__.'/Home/Lp/myCompany');
            }else{
                $this->error($Business_experience->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }

    //添加新基金
    public function addFund(){
      $this->display();
    }

    //执行添加新基金
    public function do_addFund(){
        $Lp_fund_product=M('Lp_fund_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['registered_address']=I('post.registered_address');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['fund_size']=I('post.fund_size');
        switch(I('post.fund_property')){
            case 1: $data['is_government_guidance']=1; break;
            case 2: $data['is_private_capital']=1; break;
            case 3: $data['is_state_owned']=1; break;
        }

        foreach(I('post.fund_type') as $value){
            $data[$value]=1;
        }

        $data['trustee_name']=I('post.trustee_name');
        $data['investment_field']=I('post.investment_field');
        $data['is_recruitment_period']=I('post.is_recruitment_period');

        $data['is_recorded']=I('post.is_recorded');
        $data['fund_number']=I('post.fund_number');
        $data['recorded_time']=strtotime(I('post.recorded_time'));

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10145728 ;// 设置附件上传大小,10M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/lp_recruitment/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/lp_recruitment', 0777 ,1);


        if($Lp_fund_product->create($data)){
            //保存个人基本信息
            $fund_id=$Lp_fund_product->add();

            if($fund_id){
                /*上传募集方案*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $fund_id.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $Lp_fund_product->where('id='.$fund_id)->setField('recruitment_plan_url',$info['savename']);
                         }
                     }
                }
            }


            $where['fund_id']=$fund_id;

            //保存已投项目/基金
            $Investment_project=M('Investment_project');
            // 批量添加数据
            $investment_projects=I('post.investment_project');
            for($i=0;$i<count($investment_projects['project_name']);$i++){
              if($investment_projects['project_name'][$i]){
                $dataList[] = array('fund_id'=>(int)$fund_id,'project_name'=>$investment_projects['project_name'][$i],'project_abstract'=>$investment_projects['project_abstract'][$i],'investment_quota'=>$investment_projects['investment_quota'][$i],'investment_round'=>$investment_projects['investment_round'][$i],'investment_time'=>strtotime($investment_projects['investment_time'][$i]),'project_state_type'=>$investment_projects['project_state_type'][$i]);
              }
            }

            if($dataList){
                $result=$Investment_project->addAll($dataList);

                if($result){
                    $this->success('Success！添加成功',__APP__.'/Home/Lp/allFunds');
                }else{
                    $this->error($Investment_project->getError());
                }
            }else{
                $this->success('Success！添加成功',__APP__.'/Home/Lp/allFunds');
            }
            
        }
        else{
            $this->error($Lp_fund_product->getError());
        }
    }

    //所有基金
    public function allFunds(){
      //基金信息
      $Lp_fund_product=M('Lp_fund_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $funds=$Lp_fund_product->where($where)->select();

      $Investment_project=M('Investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));

      $this->display();
    }


    //修改基金
    public function modifyFund(){
      //基金信息
      $Lp_fund_product=M('Lp_fund_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $where['id']=I('get.id');
      $funds=$Lp_fund_product->where($where)->select();

      $Investment_project=M('Investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));

      $this->display();
    }

    //保存修改基金
    public function do_modifyFund(){

        $Lp_fund_product=M('Lp_fund_product');

        $data['id']=I('post.id');
        $data['name']=I('post.name');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['registered_address']=I('post.registered_address');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['fund_size']=I('post.fund_size');
        switch(I('post.fund_property')){
            case 1: $data['is_government_guidance']=1; break;
            case 2: $data['is_private_capital']=1; break;
            case 3: $data['is_state_owned']=1; break;
        }

        foreach(I('post.fund_type') as $value){
            $data[$value]=1;
        }

        $data['trustee_name']=I('post.trustee_name');
        $data['investment_field']=I('post.investment_field');
        $data['is_recruitment_period']=I('post.is_recruitment_period');

        $data['is_recorded']=I('post.is_recorded');
        $data['fund_number']=I('post.fund_number');
        $data['recorded_time']=strtotime(I('post.recorded_time'));

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10145728 ;// 设置附件上传大小,10M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/lp_recruitment/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/lp_recruitment', 0777 ,1);


        if($Lp_fund_product->create($data)){
            //保存个人基本信息
            $res=$Lp_fund_product->save();

            if($res!==false){

                /*原募集方案地址*/
                $img=$Lp_fund_product->getFieldById($data['id'],'recruitment_plan_url');   //文件名
                $path=__ROOT__.'/Public/uploads/lp_recruitment/';                          //文件路径

                /*上传募集方案*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $data['id'].'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            if($img){
                              unlink($path.$img);  //删除原文件
                            }
                      
                            $Lp_fund_product->where('id='.$data['id'])->setField('recruitment_plan_url',$info['savename']);
                         }
                     }
                }
            }


            $where['fund_id']=$data['id'];

            //保存已投项目/基金
            $Investment_project=M('Investment_project');
            // 批量添加数据
            $investment_projects=I('post.investment_project');
            for($i=0;$i<count($investment_projects['project_name']);$i++){
                if($investment_projects['project_name'][$i]){
                  $dataList[] = array('fund_id'=>(int)$data['id'],'project_name'=>$investment_projects['project_name'][$i],'project_abstract'=>$investment_projects['project_abstract'][$i],'investment_quota'=>$investment_projects['investment_quota'][$i],'investment_round'=>$investment_projects['investment_round'][$i],'investment_time'=>strtotime($investment_projects['investment_time'][$i]),'project_state_type'=>$investment_projects['project_state_type'][$i]);
                }
            }
            if($dataList){
                $result=$Investment_project->addAll($dataList);

                if($result){
                    $this->success('Success！修改成功',__APP__.'/Home/Lp/allFunds');
                }else{
                    $this->error($Investment_project->getError());
                }
            }else{
                $this->success('Success！修改成功',__APP__.'/Home/Lp/allFunds');
            }
            

        }
        else{
            $this->error($Lp_fund_product->getError());
        }
    }

    //删除基金
    public function deleteFund(){
        //删除该基金下的投资项目
        $Investment_project=M('Investment_project');
        $where['fund_id']=I('get.id');
        $Investment_project->where($where)->delete();


        $Lp_fund_product=M('Lp_fund_product');
        $where2['id']=I('get.id');

        if($Lp_fund_product->where($where2)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //删除基金投资的项目
    public function deleteInvestment(){
        $Investment_project=M('Investment_project');
        $where['id']=I('get.id');
        if($Investment_project->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
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
            $User=M('Lp');

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