<?php
namespace Admin\Controller;
use Admin\Controller;
class IndexController extends BaseController {
    public function index(){
        $username=session('username');
        $this->assign('username',$username);
        
        $this->assign('today_view',$this->get_today_view());
        $this->assign('total_view',$this->get_total_view());
        $this->assign('count_individual',$this->get_count_individual());
        $this->assign('count_institution',$this->get_count_institutions());

        $this->display();
    }
    
    public function logout(){
    	session(null);
        $this->success('登出成功',__APP__.'/Home/Index/index');
    }

    public function admin_login(){
    	$User=M('Admin');
		 
        $map['email'] = array('eq',$_POST['email']);
        $count = $User->where($map)->select();
        $loginpassword=$_POST['password'];

		 if($count){
		 	if($count[0]['password']==md5($loginpassword)){

                session('email',$count[0]['email']);
                session('username',$count[0]['username']);
                session('is_admin',$count[0]['is_admin']);
                session('user_id',$count[0]['id']);
                session('institution_type',$count[0]['institution_type']);
                // var_dump($_SESSION);
                // die();
                

            if($count[0]['face_url'])
                session('face_url',$count[0]['face_url']);
            else
                session('face_url','default.jpg');

		 		if($count[0]['is_admin']==1||$count[0]['is_admin']==2){
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


    //今日访问量
    protected function get_today_view(){
        $Record=M('Record');
        //今日记录增1
        $today_view=$Record->getByName('today_view_'.date('Y_m_d',time()));
        return $today_view['value']?$today_view['value']:1;
    }

    //历史访问量
    protected function get_total_view(){
        $Record=M('Record');
        $total_view=$Record->getByName('total_view');
        return $total_view['value'];
    }

    //总个人注册人数
    protected function get_count_individual(){
        $User=M('User');
        $count=$User->where($where)->count();
        return $count;
    }

    //总机构注册人数
    protected function get_count_institutions(){
        $count=0;
        /*LP(母基金管理机构)*/
        $User=M('Lp');
        $count+=$User->where($where)->count();
        /*LP(母基金管理机构)end*/

        /*GP(私募股权基金管理机构)*/
        $User=M('Gp');
        $count+=$User->where($where)->count();
        /*GP(私募股权基金管理机构)end*/

        /*创业公司*/
        $User=M('Startup_company');
        $count+=$User->where($where)->count();
        /*创业公司end*/

        /*fa服务机构*/
        $User=M('Fa');
        $count+=$User->where($where)->count();
        /*fa服务机构end*/

        /*法务服务机构*/
        $User=M('Legal_agency');
        $count+=$User->where($where)->count();
        /*法务服务机构end*/

        /*财务服务机构*/
        $User=M('Financial_institution');
        $count+=$User->where($where)->count();
        /*财务服务机构end*/

        /*众创空间*/
        $User=M('Business_incubator');
        $count+=$User->where($where)->count();
        /*众创空间end*/

        /*其它机构*/
        $User=M('Other_institution');
        $count+=$User->where($where)->count();
        /*其它机构*/

        return $count;
    }

}
