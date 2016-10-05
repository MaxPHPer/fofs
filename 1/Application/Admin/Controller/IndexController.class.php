<?php
namespace Admin\Controller;
use Admin\Controller;
class IndexController extends BaseController {
    public function index(){
        $username=session('username');
        $this->assign('username',$username);
        
        $this->display();
    }
    
    public function logout(){
    	session(null);
        $this->success('登出成功',__APP__.'/Home/Index/index');
    }

    public function admin_login(){
    	 $User=M('Admin');
		 
		 // var_dump($count);
		 // echo $count[0]['password'];
		 // echo '<br>'.md5($_POST['loginpassword']);
		 // echo '<br>'.md5('123456');
		 // exit;
		 
        $map['email'] = array('eq',$_POST['email']);
        $count = $User->where($map)->select();
        $loginpassword=$_POST['password'];

		 if($count){
		 	if($count[0]['password']==md5($loginpassword)){

                session('email',$count[0]['email']);
                session('username',$count[0]['username']);
                session('group',$count[0]['group_id']);
                session('user_id',$count[0]['id']);

            if($count[0]['face_url'])
                session('face_url',$count[0]['face_url']);
            else
                session('face_url','user2-160x160.jpg');
                // var_dump($count);
                // var_dump($_SESSION);
                // die();
		 		if($count[0]['group_id']==1||$count[0]['group_id']==2){
		 			// 成功后跳转到管理员界面
    				$this->success('管理员登陆成功', __APP__.'/Admin/Index/index');
		 		}
		 		else $this->error('权限不足！');
		 	}
		 	else $this->error('密码错误');
		 		
		 }else{
		 	// 错误页面的默认跳转页面是返回前一页，通常不需要设置
    		$this->error('不存在该账号');
		 }

    }

}
