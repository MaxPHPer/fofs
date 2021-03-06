<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize() {

        $this->checklogin();

        //用户名
        $username=session('username');
        $this->assign('username',$username);

        $is_admim=session('is_admim');
        $this->assign('is_admim',$is_admin);
    }

    public function checklogin() {

        
        //不设权限项
        if (in_array(MODULE_NAME, array('Admin')) && in_array(CONTROLLER_NAME,array('Index')) && in_array(ACTION_NAME, array('login','logout','admin_login'))) {
            return true;
        }

        if ((!isset($_SESSION['email']) || !$_SESSION['email']) || (!isset($_SESSION['user_id']) || !$_SESSION['user_id']) ||(!isset($_SESSION['institution_type']) || !$_SESSION['institution_type'])) {
            $this->error("没有登录", __APP__.'/Home/Index');
        }
        
        //既不是普通管理员，也不是超级管理员，也不是管理员类型
        if($_SESSION['is_admin']!=1&&$_SESSION['is_admin']!=2&&$_SESSION['institution_type']!=10){
            $this->error("你没有该权限，非法越界");
        }
    }

    // 得到管理团队信息
    protected function get_senior_executives($institution_type, $user_id){
        $Senior_executive=M('Senior_executive');
        $where['institution_type']=$institution_type;
        $where['institution_id']=$user_id;
        $members=$Senior_executive->where($where)->select();

        $Business_experience=M('Business_experience');
        foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
        }

        // 将法人代表排在前面
        return array_sort($members,'is_representative','desc');
    }
}