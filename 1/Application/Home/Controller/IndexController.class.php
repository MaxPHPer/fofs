<?php
namespace Home\Controller;
use Home\Controller;
class IndexController extends BaseController {
    //首页
    public function index(){
        if(session('user_id')){
            switch (session('type')) {
                case '1':$link="Home/Buyer/buyProfile"; break;
                case '2':$link="Home/Supplier/supplierProfile"; break;
            }
        }
        else{
            $link="Home/Register/email";
        }
        $this->assign('link',$link);
        
        $this->display();
    }

    //登陆
    public function login(){
        session(null);

        $data['email']=I('post.user');              //获得用户名
        $data['password']=md5(I('post.password'));  //获得密码

        if(I('post.buyer')){                        //确定用户类型
            $User=M('Buyer');
            $key='buyer';
        }
        else{
            $User=M('Supplier');
            $key='supplier';
        }
        
        $list=$User->getbyEmail($data['email']);    //读取用户数据

        if($list){
            if($list['password']==$data['password']){
            	session('username',$list['username']);
                session('user_id',$list['id']);
                session('group_id',$list['group_id']);
                if($list[$key.'_company_id']==null){
                    session(null);
                    cookie('user_id',$list['id']);
                    $this->error('未填写公司信息，请完善',__APP__.'/Home/Register/'.$key.'CompanyInfo');
                }
                if(I('post.buyer')){
                	session('type',1);
                    $this->success('采购商登陆成功',__APP__.'/Home/Search/search');
                }else{
                	session('type',2);
                    $this->success('供应商登陆成功',__APP__.'/Home/Supplier/supplierProfile');
                }
                
            }
            else{
                $this->error('用户名或密码错误');
            }
        }
        else{
            $this->error('用户名或密码错误');
        }
    }

    //登出
    public function logout(){
    	session(null);
    	$this->success('退出成功',__APP__.'/Home/Index');
    }

}