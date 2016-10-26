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


    //采购商收件箱
    public function inbox(){

        $this->display();
        die();
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $Inbox=M('Letter');             //获取邮件
        $amount=array('receive'=>0,      //计数器
                      'send'=>0);

        $rec_map=array(array('sender_id'=>$user['id'],     //Rfi查询条件
                    'sender_type'=>1,
                    'type'=>1,
                    'state'=>array('neq',0)),
                    '_string'=>'recipient_id='.$user['id'].' AND recipient_type=1',                                 //普通信息查询条件
                    '_logic'=>'OR');                       //OR
        $send_map=array('sender_id'=>$user['id'],    //发送
                    'sender_type'=>1);

        $rec_msg=$Inbox->where($rec_map)->order('time desc')->select();
        $send_msg=$Inbox->where($send_map)->order('time desc')->select();

        foreach ($rec_msg as $key => $value) {      //整理数据---收件箱
            if($value['type']==2){
                $rec_msg[$key]['user']=$this->getMsgSender($value['sender_type'],$value['sender_id']);      //获取发送者名称
                $rec_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                                //处理发送时间
                $rec_msg[$key]['state']=$value['state']?'已读':'未读';  //处理状态
            }
            else if($value['type']==1){
                $rec_msg[$key]['user']=$this->getMsgSender($value['recipient_type'],$value['recipient_id']);      //获取发送者名称
                $rec_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                                //处理发送时间
                switch ($value['state']) {
                    case '1': $rec_msg[$key]['state']='已同意'; break;
                    case '2': $rec_msg[$key]['state']='已拒绝'; break;
                }
            }
        }

        $SupCompany=M('Supplier_company');
        $BuyCompany=M('Buyer_company');
        $Buyer=M('Buyer');
        $Supplier=M('Supplier');
        foreach ($send_msg as $key => $value) {      //整理数据---发件箱
            $send_msg[$key]['user']=$this->getMsgSender($value['recipient_type'],$value['recipient_id']);      //获取收件人名称
            $send_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                            //处理发送时间
            $send_msg[$key]['state']='已发送';  //处理状态
            if($value['type']=='1'){

                $supcom_id=$Supplier->getFieldById($value['recipient_id'],'supplier_company_id');
                $send_msg[$key]['supname']=$SupCompany->getFieldById($supcom_id,'name');       //获取供应商公司名

                $send_msg[$key]['servicer']=$Supplier->getFieldById($value['recipient_id'],'username');       //获取供应商客户经理

            }
        }
        
        $amount['receive']=count($rec_msg);
        $amount['send']=count($send_msg);

        $type=I('get.type');
        if($type=='2'){
            $this->assign('msg',$send_msg);
        }
        else
        {
            $this->assign('msg',$rec_msg);
        }

        $this->assign('amount',$amount);
        $this->assign('pgtype',$type);
        $this->display();
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
                $User->where('id='.(int)$user_id)->setField('is_representative',1);
            }

            if(I('post.business_experience')){
                //保存工作经历
                $Business_experience=M('Business_experience');
                // 批量添加数据
                $experience=I('post.business_experience');
                for($i=0;$i<count($experience['company_name']);$i++){
                    $dataList[] = array('senior_executive_id'=>(int)$user_id,'company_name'=>$experience['company_name'][$i],'function'=>$experience['function'][$i],'start_time'=>$experience['start_time'][$i],'end_time'=>$experience['end_time'][$i]);
                }

                $result=$Business_experience->addAll($dataList);    
                
                if($result){
                    $this->success('Success！保存成功');
                }else{
                    $this->error($Business_experience->getError());
                }      
            }else{
                if($user_id){
                    $this->success('Success！保存成功',__APP__.'/Home/Lp/membersInfo');
                }
            }



        }
        else{
            $this->error($User->getError());
        }
    }

    //删除成员信息
    public function deleteMember(){
        $this->display();
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