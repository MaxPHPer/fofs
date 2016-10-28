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
            $this->assign('username',session('nickname')?session('nickname'):session('username'));
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
}