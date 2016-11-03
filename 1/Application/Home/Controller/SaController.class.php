<?php
namespace Home\Controller;
use Home\Controller;
class SaController extends BaseController {
    public function _initialize() {
        parent::_initialize();

        //获取用户信息
        $id=session('user_id');
        $user=$this->getInfo($id);       
        $this->assign('user',$user);

    }

    //获取用户信息
    public function getInfo($id){
        switch (session('institution_type')) {
          case 4: 
            $User=M('Fa');
            $img_url='fa_pic/';
            break;
          
          case 5: 
            $User=M('Legal_agency');
            $img_url='la_pic/';
            break;

          case 6: 
            $User=M('Financial_institution');
            $img_url='fi_pic/';
            break;

          case 7: 
            $User=M('Business_incubator');
            $img_url='bi_pic/';
            break;
        }
        
        $list=$User->getById($id);
        $list['institution_logo_img']=$img_url.$list['institution_logo_img'];
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

      //产品服务信息
      switch(session('institution_type')){
        case 4: $Server_product=M('Fa_successful_case'); break;
        case 5: $Server_product=M('Server_product'); break;
        case 6: $Server_product=M('Server_product'); break;
        case 7: $Server_product=M('Server_product'); break;
      }

      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $products=$Server_product->where($where)->select();

      $this->assign('products',$products);

      $this->display();

    }

    //修改个人信息
    public function modifyPersonalInfo(){


        $this->display();
    }
    
    //更新机构管理员信息
    public function save_personalInfo(){

        switch (session('institution_type')) {
          case 4: 
            $User=M('Fa');
            break;
          
          case 5: 
            $User=M('Legal_agency');
            break;

          case 6: 
            $User=M('Financial_institution');
            break;

          case 7: 
            $User=M('Business_incubator');
            break;
        }

        $data=I('post.');
        $data['id']=session('user_id');

        if($User->create($data)){        //更新信息
            $res=$User->save();
            if($res){
                session('username',$data['admin_name']);
                $this->success('信息更新成功',__APP__.'/Home/Sa/accountSetting');
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
                    $this->success('Success！修改保存成功',__APP__.'/Home/Sa/myCompany');
                }else{
                    $this->error($Business_experience->getError());
                }      
            }else{
                if($user_id){
                    $this->success('Success！保存成功',__APP__.'/Home/Sa/myCompany');
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
                $this->success('Success！保存成功',__APP__.'/Home/Sa/myCompany');
            }else{
                $this->error($Business_experience->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }


    //所有的项目
    public function allCases(){
      //产品服务信息
      switch(session('institution_type')){
        case 4: $Server_product=M('Fa_successful_case'); break;
        case 5: $Server_product=M('Server_product'); break;
        case 6: $Server_product=M('Server_product'); break;
        case 7: $Server_product=M('Server_product'); break;
      }

      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $products=$Server_product->where($where)->select();

      $this->assign('products',$products);

      $this->display();
    }
    //添加新项目
    public function addCase(){
      $this->display();
    }

    //执行添加新项目
    public function do_addCase(){
        //确定用户类型
        switch (session('institution_type')) {
          case 4: 
            $Server_product=M('Fa_successful_case');
            $data['institution_type']=session('institution_type');
            $data['institution_id']=session('user_id');
            $data['invested_company']=I('post.invested_company');
            $data['investor']=I('post.investor');
            $data['currency_type_id']=I('post.currency_type_id');
            $data['investment_quota']=I('post.investment_quota');
            $data['investment_round']=I('post.investment_round');
            $data['founded_time']=strtotime(I('post.founded_time'));
            $data['reg_time']=time();
            break;
          
          case 5: 
            $Server_product=M('Server_product');
            $data['institution_type']=session('institution_type');
            $data['institution_id']=session('user_id');
            $data['name']=I('post.name');
            $data['content']=I('post.content');
            $data['price']=I('post.price');
            $data['reg_time']=time();
            break;

          case 6: 
            $Server_product=M('Server_product');
            $data['institution_type']=session('institution_type');
            $data['institution_id']=session('user_id');
            $data['name']=I('post.name');
            $data['content']=I('post.content');
            $data['price']=I('post.price');
            $data['reg_time']=time();
            break;

          case 7: 
            $Server_product=M('Server_product');
            $data['institution_type']=session('institution_type');
            $data['institution_id']=session('user_id');
            $data['name']=I('post.name');
            $data['content']=I('post.content');
            $data['price']=I('post.price');
            $data['reg_time']=time();
            break;
        }




        if($Server_product->create($data)){
            //保存个人基本信息
            $res=$Server_product->add();

            if($res!==false){
              $this->success('Success！添加成功',__APP__.'/Home/Sa/allCases');
            }
            else{
              $this->error($Server_product->getError());
            }
        }
        else{
            $this->error($Server_product->getError());
        }
    }


    //修改项目
    public function modifyCase(){
      //确定用户类型
      switch (session('institution_type')) {
        case 4: 
          $Server_product=M('Fa_successful_case');
          break;
        
        case 5: 
          $Server_product=M('Server_product');
          break;

        case 6: 
          $Server_product=M('Server_product');
          break;

        case 7: 
          $Server_product=M('Server_product');
          break;
      }
      
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $where['id']=I('get.id');
      $products=$Server_product->where($where)->select();

      
      $this->assign('products',$products);
     
      $this->display();
    }

    //保存修改项目
    public function do_modifyCase(){

        //确定用户类型
        switch (session('institution_type')) {
          case 4: 
            $Server_product=M('Fa_successful_case');
            $data['id']=I('post.id');
            $data['invested_company']=I('post.invested_company');
            $data['investor']=I('post.investor');
            $data['currency_type_id']=I('post.currency_type_id');
            $data['investment_quota']=I('post.investment_quota');
            $data['investment_round']=I('post.investment_round');
            $data['founded_time']=strtotime(I('post.founded_time'));
            break;
          
          case 5: 
            $Server_product=M('Server_product');
            $data['id']=I('post.id');
            $data['name']=I('post.name');
            $data['content']=I('post.content');
            $data['price']=I('post.price');

            break;

          case 6: 
            $Server_product=M('Server_product');
            $data['id']=I('post.id');
            $data['name']=I('post.name');
            $data['content']=I('post.content');
            $data['price']=I('post.price');
            break;

          case 7: 
            $Server_product=M('Server_product');
            $data['id']=I('post.id');
            $data['name']=I('post.name');
            $data['content']=I('post.content');
            $data['price']=I('post.price');
            break;
        }

        if($Server_product->create($data)){
            //保存个人基本信息
            $res=$Server_product->save();

            if($res!==false){
              $this->success('Success！修改成功',__APP__.'/Home/Sa/allCases');
            }
            else{
              $this->error($Server_product->getError());
            }
        }
        else{
            $this->error($Server_product->getError());
        }
    }

    //删除项目
    public function deleteCase(){
        //确定用户类型
        switch (session('institution_type')) {
          case 4: 
            $Server_product=M('Fa_successful_case');
            break;
          
          case 5: 
            $Server_product=M('Server_product');
            break;

          case 6: 
            $Server_product=M('Server_product');
            break;

          case 7: 
            $Server_product=M('Server_product');
            break;
        }

        $where['id']=I('get.id');

        if($Server_product->where($where)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //账号设置
    public function accountSetting(){
        $this->display();
    }


    //修改密码
    public function set_password(){
        if(I('post.newpassword')==I('post.renewpassword')){
            //确定用户类型
            switch (session('institution_type')) {
              case 4: 
                $User=M('Fa');
                break;
              
              case 5: 
                $User=M('Legal_agency');
                break;

              case 6: 
                $User=M('Financial_institution');
                break;

              case 7: 
                $User=M('Business_incubator');
                break;
            }

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

        //确定用户类型
        switch (session('institution_type')) {
          case 4: 
            $User=M('Fa');
            $img_url='fa_pic/';
            $data['services_and_fees']=I('post.services_and_fees');
            break;
          
          case 5: 
            $User=M('Legal_agency');
            $img_url='legal_agency_pic/';
            $data['founded_time']=strtotime(I('post.founded_time'));
            $data['service_area']=I('post.service_area');
            break;

          case 6: 
            $User=M('Financial_institution');
            $img_url='financial_institution_pic/';
            $data['founded_time']=strtotime(I('post.founded_time'));
            $data['service_area']=I('post.service_area');
            break;

          case 7: 
            $User=M('Business_incubator');
            $img_url='business_incubator_pic/';
            $data['founded_time']=strtotime(I('post.founded_time'));
            $data['service_area']=I('post.service_area');
            break;
        }

        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        
       
        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');

        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/'.$img_url; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/'.$img_url, 0777 ,1);

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
                                $path=__ROOT__.'/Public/uploads/'.$img_url;   //文件路径
                                if($img){
                                  unlink($path.$img);  //删除原文件
                                }

                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }

                }

                $this->success('Success！修改成功',__APP__.'/Home/Sa/individualProfile');
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