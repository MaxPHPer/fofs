<?php
namespace Home\Controller;
use Home\Controller;
class ApiController extends BaseController {


	//Rfi邮件验证
	public function RfiEmailCheck(){
    	if(!$state=I('get.state'))	$this->error('非法访问',__APP__.'/Home/Index');
    	$state=explode('_', $state);

    	$key='rfi';                                            //设置密匙
        //$id=authcode($state[1],'DECODE',$key,0);             //解密供应商id
        //$email=authcode($state[2],'DECODE',$key,0);          //解密供应商邮件地址
        //$msgid=authcode($state[3],'DECODE',$key,0);          //解密信息id

        $id=hex_str($state[1]);             //解密供应商id
        $email=hex_str($state[2]);          //解密供应商邮件地址
        $msgid=hex_str($state[3]);          //解密信息id

        $Supplier=M('Supplier');
        if($email==$Supplier->getFieldById($id,'email')){
        	$user=$Supplier->getById($id);						//登陆
        	session('user_id',$id);
        	session('username',$user['username']);
        	session('group_id',$user['group_id']);
        	session('type',2);

        	switch ($state[0]) {
        		case 'a': redirect(__APP__.'/Home/Supplier/acceptInvite/id/'.$msgid);		//同意邀请
        			break;
        		case 'r': redirect(__APP__.'/Home/Supplier/rejectInvite/id/'.$msgid);		//拒绝邀请
        			break;
        	}
        }
        else{
        	$this->error('非法访问',__APP__.'/Home/Index');
        }
    }

    //接受信息邀请邮件验证
	public function AcceptEmailCheck(){
    	if(!$state=I('get.state'))	$this->error('非法访问',__APP__.'/Home/Index');
    	$state=explode('_', $state);
    	
    	$key='accept';                                       //设置密匙
        //$id=authcode($state[0],'DECODE',$key,0);             //解密采购商id
        //$email=authcode($state[1],'DECODE',$key,0);          //解密采购商邮件地址
       // $supid=authcode($state[2],'DECODE',$key,0);          //解密供应商id

        $id=hex_str($state[0]);             //解密采购商id
        $email=hex_str($state[1]);          //解密采购商邮件地址
        $supid=hex_str($state[2]);          //解密供应商id

        $Buyer=M('Buyer');
        if($email==$Buyer->getFieldById($id,'email')){
        	$user=$Buyer->getById($id);						//登陆
        	session('user_id',$user['id']);
        	session('username',$user['username']);
        	session('group_id',$user['group_id']);
        	session('type',1);

 			redirect(__APP__.'/Home/Buyer/CheckRifState/id/'.$supid);
        }
        else{
        	$this->error('非法访问',__APP__.'/Home/Index');
        }
    }

    //拒绝信息邀请邮件验证
	public function RejectEmailCheck(){
    	if(!$state=I('get.state'))	$this->error('非法访问',__APP__.'/Home/Index');
    	$state=explode('_', $state);
    	
    	$key='reject';                                       //设置密匙
        //$id=authcode($state[1],'DECODE',$key,0);             //解密采购商id
        //$email=authcode($state[2],'DECODE',$key,0);          //解密采购商邮件地址

        $id=hex_str($state[1]);             //解密采购商id
        $email=hex_str($state[2]);          //解密采购商邮件地址

        $Buyer=M('Buyer');
        if($email==$Buyer->getFieldById($id,'email')){
        	$user=$Buyer->getById($id);						//登陆
        	session('user_id',$user['id']);
        	session('username',$user['username']);
        	session('group_id',$user['group_id']);
        	session('type',1);

 			switch ($state[0]) {
        		case 'l': redirect(__APP__.'/Home/Buyer/supplier');		//登陆
        			break;
        		case 's': redirect(__APP__.'/Home/Search/search');		//搜索
        			break;
        	}
        }
        else{
        	$this->error('非法访问',__APP__.'/Home/Index');
        }
    }
}