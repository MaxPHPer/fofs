<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize() {

        //$this->checklogin();

    }

    public function checklogin() {

        
        // if (in_array(MODULE_NAME, array('Home')) && in_array(ACTION_NAME, array('index','info'))) {
        //     return true;

        // }

        if ((!isset($_SESSION['email']) || !$_SESSION['email']) || (!isset($_SESSION['user_id']) || !$_SESSION['user_id']) ||(!isset($_SESSION['group']) || !$_SESSION['group'])) {
            $this->error("没有登录", __APP__.'/Home/Index');
        }
        
        if($_SESSION['group']>=3){
            $this->error("你没有该权限，非法越界");
        }
    }
}