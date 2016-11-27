<?php
namespace Admin\Controller;
use Admin\Controller;
class UserController extends BaseController {


    //某一个类型的所有用户
    public function allUsers(){

      //区分是哪一个机构类型
      switch (I('get.institution_type')) {
            /*LP(母基金管理机构)*/
            case '1':  $User=M('Lp');  $base_url='lp_pic/'; $profile_base_url='lpProfile'; break;
            /*LP(母基金管理机构)end*/

            /*GP(私募股权基金管理机构)*/
            case '2':  $User=M('Gp');  $base_url='gp_pic/'; $profile_base_url='gpProfile'; break;
            /*GP(私募股权基金管理机构)end*/

            /*创业公司*/
            case '3':  $User=M('Startup_company'); $base_url='startup_pic/'; $profile_base_url='startUpProfile'; break;
            /*创业公司end*/

            /*fa服务机构*/
            case '4':  $User=M('Fa');  $base_url='fa_pic/'; $profile_base_url='saProfile'; break;
            /*fa服务机构end*/

            /*法务服务机构*/
            case '5':  $User=M('Legal_agency');  $base_url='la_pic/'; $profile_base_url='saProfile'; break;
            /*法务服务机构end*/

            /*财务服务机构*/
            case '6':  $User=M('Financial_institution');  $base_url='fi_pic/'; $profile_base_url='saProfile'; break;
            /*财务服务机构end*/

            /*众创空间*/
            case '7':  $User=M('Business_incubator');  $base_url='bi_pic/'; $profile_base_url='saProfile'; break;
            /*众创空间end*/

            /*其它机构*/
            case '8':  $User=M('Other_institution');  $base_url='other_pic/'; $profile_base_url='otherProfile'; break;
            /*其它机构*/

            /*个人*/
            case '9':  $User=M('User');  $base_url='individual_pic/'; $profile_base_url='individualProfile'; break;
            /*个人*/

            default:break;
      }
      
      //查询满足要求的总的记录数
      $where=array();
      $where['state']=array('neq',400); //排除被删除的
      $count=$User->where($where)->count();
      //实例化分页类传入总记录数和煤业显示的记录数
      $Page=new \Think\Page($count,10);
      //分页显示输出
      $show=$Page->show();
      //赋值分页输出
      $this->assign('page',$show);

      //个人用户
      if(I('get.institution_type')==9){
            $results=$User->where($where)->field('id,institution_type,email,nickname,head_portrait_url,reg_time')->select();
      }else{
            $results=$User->where($where)->field('id,institution_type,email,institution_abbr,institution_fullname_cn,institution_logo_img,reg_time')->limit($Page->firstRow.','.$Page->listRows)->select();
      }
      //头像
      $img_url=I('get.institution_type')==9?'head_portrait_url':'institution_logo_img';
      foreach($results as $key=>$value){
         $results[$key]['institution_logo_img']=$base_url.($results[$key][$img_url]?$results[$key][$img_url]:'default.jpg');
         if(I('get.institution_type')==9){
            $results[$key]['institution_abbr']=$value['nickname'];
         }else{
            if(empty($results[$key]['institution_abbr'])){
                $results[$key]['institution_abbr']=$results[$key]['institution_fullname_cn'];
            }
         }

         $results[$key]['detail_url']=$profile_base_url.'.html?id='.$value['id'].'&institution_type='.I('get.institution_type');
      }
      
      $this->assign('results',$results);

      $this->assign('institution_type',I('get.institution_type'));

      $this->display();
    }

    //删除用户
    public function delete(){
        if(I('get.institution_id')&&I('get.institution_type')){
            //区分是哪一个机构类型
            switch (I('get.institution_type')) {
                  /*LP(母基金管理机构)*/
                  case '1':  
                              $User=M('Lp'); 
                              break;
                  /*LP(母基金管理机构)end*/

                  /*GP(私募股权基金管理机构)*/
                  case '2':  
                              $User=M('Gp');
                              break;
                  /*GP(私募股权基金管理机构)end*/

                  /*创业公司*/
                  case '3':  
                              $User=M('Startup_company'); 
                              break;
                  /*创业公司end*/

                  /*fa服务机构*/
                  case '4':  
                              $User=M('Fa');
                              break;
                  /*fa服务机构end*/

                  /*法务服务机构*/
                  case '5':  $User=M('Legal_agency');  $base_url='la_pic/'; $profile_base_url='saProfile'; $logo_img_name='institution_logo_img'; break;
                  /*法务服务机构end*/

                  /*财务服务机构*/
                  case '6':  $User=M('Financial_institution');  $base_url='fi_pic/'; $profile_base_url='saProfile'; $logo_img_name='institution_logo_img'; break;
                  /*财务服务机构end*/

                  /*众创空间*/
                  case '7':  $User=M('Business_incubator');  $base_url='bi_pic/'; $profile_base_url='saProfile'; $logo_img_name='institution_logo_img'; break;
                  /*众创空间end*/

                  /*其它机构*/
                  case '8':  $User=M('Other_institution');  $base_url='other_pic/'; $profile_base_url='otherProfile'; $logo_img_name='institution_logo_img'; break;
                  /*其它机构*/

                  /*个人*/
                  case '9':  $User=M('User');  $base_url='individual_pic/'; $profile_base_url='individualProfile'; $logo_img_name='head_portrait_url'; break;
                  /*个人*/

                  default:break;
            }

            $data['id']=I('get.institution_id');
            $data['state']=400; //代表被系统删除
            $result=$User->save($data);
            if($result){
              $this->success('删除成功');
            }else{
              $this->error('删除失败');
            }

        }else{
            $this->success('操作失败');
        }

    }

    //删除图片
    protected function delete_logo_img($User,$base_url,$institution_id,$logo_img_name){
        //删除图片
        $institution_logo_img=$User->getFieldById($institution_id,$logo_img_name);
        if($institution_logo_img){
            $institution_logo_img=__ROOT__.'/Public/uploads/'.$base_url.$institution_logo_img;
            unlink($institution_logo_img);
        }
    }

    //删除团队成员
    protected function delete_team($institution_type,$institution_id){

        $Senior_executive=M('Senior_executive');
        $where['institution_type']=$institution_type;
        $where['institution_id']=$institution_id;

        $results=$Senior_executive->where($where)->select();

        //删除所有从业经历
        $Business_experience=M('Business_experience');
        foreach ($results as $key=>$value) {
          $where2['senior_executive_id']=$value['id'];
          $Business_experience->where($where2)->delete();
        }
        
        return $Senior_executive->where($where)->delete();
    }

    //删除基金
    protected function delete_funds($institution_type,$institution_id){
        switch ($institution_type) {
          case 1:
            $Fund_product=M('Lp_fund_product');
            $Investment_project=M('Investment_project');
            break;

          case 2:
            $Fund_product=M('Gp_fund_product');
            $Investment_project=M('Gp_investment_project');
            break;
          
          default:
            # code...
            break;
        }
        $where['institution_type']=$institution_type;
        $where['institution_id']=$institution_id;

        $results=$Fund_product->where($where)->select();

        //删除所有投资的产品
        foreach ($results as $key=>$value) {
          $where2['fund_id']=$value['id'];
          $Investment_project->where($where2)->delete();
        }
        
        return $Fund_product->where($where)->delete();
    }


    //lp详情
    public function lpProfile(){


      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);      

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);

      //基金信息
      $Lp_fund_product=M('Lp_fund_product');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
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

    //获取用户信息
    public function getInfo($id,$institution_type){
        switch ($institution_type) {
            /*LP(母基金管理机构)*/
            case '1':  $User=M('Lp');  break;
            /*LP(母基金管理机构)end*/

            /*GP(私募股权基金管理机构)*/
            case '2':  $User=M('Gp');  break;
            /*GP(私募股权基金管理机构)end*/

            /*创业公司*/
            case '3':  $User=M('Startup_company');  break;
            /*创业公司end*/

            /*fa服务机构*/
            case '4':  $User=M('Fa');  break;
            /*fa服务机构end*/

            /*法务服务机构*/
            case '5':  $User=M('Legal_agency');  break;
            /*法务服务机构end*/

            /*财务服务机构*/
            case '6':  $User=M('Financial_institution');  break;
            /*财务服务机构end*/

            /*众创空间*/
            case '7':  $User=M('Business_incubator');  break;
            /*众创空间end*/

            /*其它机构*/
            case '8':  $User=M('Other_institution');  break;
            /*其它机构*/

            /*个人用户*/
            case '9':  $User=M('User');  break;
            /*个人用户*/


            default: $this->error('请选择机构类型!');break;
        } 
        $list=$User->getById($id);
        return $list;
    }

    //gp详情
    public function gpProfile(){


      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);     

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }
      
      


      $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);

      //基金信息
      $Gp_fund_product=M('Gp_fund_product');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $funds=$Gp_fund_product->where($where)->select();

      $Investment_project=M('Gp_investment_project');
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

    //startUp详情
    public function startUpProfile(){


      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);  

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);

      $this->display();
    }

    //sa详情
    public function saProfile(){

      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);
      switch ($institution_type) {
          case 4: 

            $img_url='fa_pic/';
            break;
          
          case 5: 
  
            $img_url='la_pic/';
            break;

          case 6: 

            $img_url='fi_pic/';
            break;

          case 7: 

            $img_url='bi_pic/';
            break;
      }
        
      $user['institution_logo_img']=$img_url.$user['institution_logo_img'];      

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }


      $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);


      //产品服务信息
      switch($institution_type){
        case 4: $Server_product=M('Fa_successful_case'); break;
        case 5: $Server_product=M('Server_product'); break;
        case 6: $Server_product=M('Server_product'); break;
        case 7: $Server_product=M('Server_product'); break;
      }

      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $products=$Server_product->where($where)->select();

      $this->assign('products',$products);

      $this->display();
    }

    //其它机构详情
    public function otherProfile(){
      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);  

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);


      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);


      $this->display();
    }

    //个人主页
    public function individualProfile(){
      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);
      
      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);
      $this->display();
    }

}