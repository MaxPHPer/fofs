<?php
namespace Home\Controller;
use Home\Controller;
class LpController extends BaseController {
    public function _initialize() {
        parent::_initialize();
        //if(session('type')!=1)  $this->error('非法访问',__APP__.'/Home/Index');
    }

    //获取用户信息
    public function getInfo($id){
        $User=M('Buyer');
        $list=$User->getById($id);
        return $list;
    }

    //更新个人信息
    public function update_PersonalInfo(){
        

        $User=M('Buyer');
        $data=I('post.');

        $img=$User->getFieldById($data['id'],'face_url');   //头像名
        $path='./Public/uploads/buyer_pic/';             //头像路径

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
                            $res2=$User->where('id='.$data['id'])->setField('face_url',$info['savename']);
                        }
                    }
                }
                if($res2!==false){
                    session('username',$data['username']);
                    $this->success('信息更新成功',__APP__.'/Home/Buyer/individualProfile');
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

    //个人主页
    public function individualProfile(){
        

        $id=session('user_id');
        $user=$this->getInfo($id);       //获取用户信息
        $this->assign('user',$user);

        $Inbox=M('Letter');             //获取邮件
        $Interest=M('Buyer_interest_list');
        $amount=array('unread'=>0,      //计数器
                      'accepted'=>0,
                      'rejected'=>0,
                      'checking'=>0,);

        $rec_map=array(array('sender_id'=>$user['id'],     //Rfi查询条件
                    'sender_type'=>1,
                    'type'=>1,
                    'state'=>array('neq',0)),
                    '_string'=>'recipient_id='.$user['id'].' AND recipient_type=1',                                 //普通信息查询条件
                    '_logic'=>'OR');  
        $msg=$Inbox->where($rec_map)->select();
        $amount['unread']=count($msg);

        $list=$Interest->where('buyer_id='.$user['id'])->select();  //邀请列表
        foreach ($list as $key) {
            switch ($key['is_send_rfi']) {
                case '1':  $amount['checking']++;  break;
                case '3':  $amount['rejected']++;  break;
                case '2':  $amount['accepted']++;  break;
            }
        }

        $this->assign('amount',$amount);

        //项目
        $Project=M('Project');
        $project_list=$Project->where('creator_id='.$user['id'])->limit(3)->select();
        $this->assign('project',$project_list);


        $this->display();
    }

    //采购商收件箱
    public function inbox(){
        

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
}