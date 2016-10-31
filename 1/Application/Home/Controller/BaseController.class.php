<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _empty(){
        $this->error('不存在该链接，请检查',__APP__.'/Home/Index');
    }
    
	public function _initialize() {

        //$this->checklogin();
        if(session('institution_type')){
            $this->assign('username',session('nickname')?session('nickname'):(session('username')?session('username'):session('email')));
            $this->assign('user_id',session('user_id'));
            $this->assign('institution_type',session('institution_type'));
            switch(session('institution_type')){
                  case 1: $base_url='Lp'; break;
                  case 2: $base_url='Gp'; break;
                  case 3: $base_url='Startups'; break;
                  case 4: $base_url='Sa'; break;
                  case 5: $base_url='Sa'; break;
                  case 6: $base_url='Sa'; break;
                  case 7: $base_url='Sa'; break;
                  case 8: $base_url='Sa'; break;
                  case 9: $base_url='Individual'; break;
            }
            $this->assign('base_url',$base_url);
        }

        //设置语言选项
        session('lang',substr(cookie('think_language'),0,2));
        //中文zh,英文en
    }

    public function checklogin() {

        //不设权限项
        if (in_array(MODULE_NAME, array('Home')) && in_array(CONTROLLER_NAME,array('Index')) && in_array(ACTION_NAME, array('index','login','logout'))) {
            return true;
        }

        //不设权限项
        if (in_array(MODULE_NAME, array('Home')) && in_array(CONTROLLER_NAME,array('Password'))) {
            return true;
        }

        //不设权限项
        if (in_array(MODULE_NAME, array('Home')) && in_array(CONTROLLER_NAME,array('Register'))) {
            return true;
        }

        if ((!isset($_SESSION['username']) || !$_SESSION['username']) || (!isset($_SESSION['user_id']) || !$_SESSION['user_id']) ||(!isset($_SESSION['group_id']) || !$_SESSION['group_id'])) {
            $this->error("没有登录", __APP__.'/Home/Index');
        }
        
        

    }

    //收件箱
    public function inbox(){

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
}