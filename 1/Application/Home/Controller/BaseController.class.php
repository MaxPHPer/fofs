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
                  case 8: $base_url='Other'; break;
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

        $Letter=M('Letter');
        //我发送的
        $where['sender_id']=session('user_id');
        $where['sender_type']=session('institution_type');
        $sended_mails=$Letter->where($where)->order('time desc')->limit(50)->select();
        foreach($sended_mails as $key => $value){
            switch ($value['recipient_type']) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');  $base_url='lp_pic/'; break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');  $base_url='gp_pic/'; break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company'); $base_url='startup_pic/'; break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  $base_url='fa_pic/'; break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');  $base_url='la_pic/'; break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');  $base_url='fi_pic/'; break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');  $base_url='bi_pic/'; break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');  $base_url='other_pic/'; break;
                /*其它机构*/

                /*个人*/
                case '9':  $User=M('User');  $base_url='individual_pic/'; break;
                /*个人*/


                default:break;
            }

            $where3['id']=$value['recipient_id'];
            $img_url=$User->where($where3)->getField($value['recipient_type']==9?'head_portrait_url':'institution_logo_img');

            $sended_mails[$key]['institution_logo_img']=$base_url.($img_url?$img_url:'default.jpg');

        }
        
        $this->assign('sended_mails',$sended_mails);

        //我接受的信件
        $where2['recipient_id']=session('user_id');
        $where2['recipient_type']=session('institution_type');
        $received_mails=$Letter->where($where2)->order('time desc')->limit(50)->select();
        foreach($received_mails as $key => $value){
            switch ($value['sender_type']) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');  $base_url='lp_pic/'; break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');  $base_url='gp_pic/'; break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company'); $base_url='startup_pic/'; break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  $base_url='fa_pic/'; break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');  $base_url='la_pic/'; break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');  $base_url='fi_pic/'; break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');  $base_url='bi_pic/'; break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');  $base_url='other_pic/'; break;
                /*其它机构*/

                /*个人*/
                case '9':  $User=M('User');  $base_url='individual_pic/'; break;
                /*个人*/


                default:break;
            }
            $where4['id']=$value['sender_id'];
            $img_url=$User->where($where4)->getField($value['sender_type']==9?'head_portrait_url':'institution_logo_img');
            $received_mails[$key]['institution_logo_img']=$base_url.($img_url?$img_url:'default.jpg');
        }

        $this->assign('received_mails',$received_mails);
        
        $this->display();
        
    }


    //我的粉丝
    public function myFollows(){
        $Interest_list=M('Interest_list');
        $where['host_id']=session('user_id');
        $where['host_type']=session('institution_type');
        //关注我的个人
        $where['fan_type']=array('eq',9);
        $personal_follows=$Interest_list->where($where)->select();
        foreach($personal_follows as $key => $value){
            $User=M('User');
            $base_url='individual_pic/';
            $where2['id']=$value['fan_id'];
            $personal_follows[$key]['nickname']=$User->where($where2)->getField('nickname');
            $img_url=$User->where($where2)->getField('head_portrait_url');
            $personal_follows[$key]['head_portrait_url']=$base_url.($img_url?$img_url:'default.jpg');
        }

        $this->assign('personal_follows',$personal_follows);

        //关注我的机构
        $where['fan_type']=array('neq',9);
        $institution_follows=$Interest_list->where($where)->select();
        foreach($institution_follows as $key => $value){
            switch ($value['fan_type']) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');  $base_url='lp_pic/'; break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');  $base_url='gp_pic/'; break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company'); $base_url='startup_pic/'; break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  $base_url='fa_pic/'; break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');  $base_url='la_pic/'; break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');  $base_url='fi_pic/'; break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');  $base_url='bi_pic/'; break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');  $base_url='other_pic/'; break;
                /*其它机构*/


                default:break;
            }
            $where2['id']=$value['fan_id'];
            $institution_follows[$key]['institution_abbr']=$User->where($where2)->getField('institution_abbr');
            $img_url=$User->where($where2)->getField('institution_logo_img');
            $institution_follows[$key]['institution_logo_img']=$base_url.($img_url?$img_url:'default.jpg');
        }
        $this->assign('institution_follows',$institution_follows);

        $this->display();
    }


    //我关注的
    public function myFollowing(){
        $Interest_list=M('Interest_list');
        $where['fan_id']=session('user_id');
        $where['fan_type']=session('institution_type');
        //我关注的个人
        $where['host_type']=array('eq',9);
        $personal_followings=$Interest_list->where($where)->select();
        foreach($personal_followings as $key => $value){
            $User=M('User');
            $base_url='individual_pic/';
            $where2['id']=$value['host_id'];
            $personal_followings[$key]['nickname']=$User->where($where2)->getField('nickname');
            $img_url=$User->where($where2)->getField('head_portrait_url');
            $personal_followings[$key]['head_portrait_url']=$base_url.($img_url?$img_url:'default.jpg');
        }

        $this->assign('personal_followings',$personal_followings);

        //我关注的机构
        $where['host_type']=array('neq',9);
        $institution_followings=$Interest_list->where($where)->select();
        foreach($institution_followings as $key => $value){
            switch ($value['host_type']) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');  $base_url='lp_pic/'; break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');  $base_url='gp_pic/'; break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company'); $base_url='startup_pic/'; break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  $base_url='fa_pic/'; break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');  $base_url='la_pic/'; break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');  $base_url='fi_pic/'; break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');  $base_url='bi_pic/'; break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');  $base_url='other_pic/'; break;
                /*其它机构*/


                default:break;
            }
            $where2['id']=$value['host_id'];
            $institution_followings[$key]['institution_abbr']=$User->where($where2)->getField('institution_abbr');
            $img_url=$User->where($where2)->getField('institution_logo_img');
            $institution_followings[$key]['institution_logo_img']=$base_url.($img_url?$img_url:'default.jpg');
        }
        $this->assign('institution_followings',$institution_followings);

        $this->display();
    }

    //发送信件
    public function sendLetter(){

        $recipient['recipient_id']=I('user_id');
        $recipient['recipient_type']=I('institution_type');
        $recipient['recipient_name']=I('username');

        $this->assign('recipient',$recipient);

        $this->display();
    }

    //执行发送信件
    public function do_sendLetter(){
        if(I('post.title')&&I('post.content')){
            $letter['sender_id']=session('user_id');
            $letter['sender_type']=session('institution_type');
            $letter['sender_name']=session('institution_abbr')?session('institution_abbr'):session('nickname');
            $letter['recipient_id']=I('post.recipient_id');
            $letter['recipient_type']=I('post.recipient_type');
            $letter['recipient_name']=I('post.recipient_name');
            $letter['title']=I('post.title');
            $letter['content']=I('post.content');
            $letter['time']=time();

            $Letter=M('Letter');
            if($Letter->add($letter)){
                switch (session('institution_type')) {
                    /*LP(母基金管理机构)*/
                    case '1':  $base_url='Lp'; break;
                    /*LP(母基金管理机构)end*/

                    /*GP(私募股权基金管理机构)*/
                    case '2':  $base_url='Gp'; break;
                    /*GP(私募股权基金管理机构)end*/

                    /*创业公司*/
                    case '3':  $base_url='Startups'; break;
                    /*创业公司end*/

                    /*fa服务机构*/
                    case '4':  $base_url='Sa'; break;
                    /*fa服务机构end*/

                    /*法务服务机构*/
                    case '5':  $base_url='Sa'; break;
                    /*法务服务机构end*/

                    /*财务服务机构*/
                    case '6':  $base_url='Sa'; break;
                    /*财务服务机构end*/

                    /*众创空间*/
                    case '7':  $base_url='Sa'; break;
                    /*众创空间end*/

                    /*其它机构*/
                    case '8':  $base_url='Other'; break;
                    /*其它机构*/

                    /*个人*/
                    case '9':  $base_url='Individual'; break;
                    /*个人*/


                    default:break;
                }
                $this->success('发送成功',__APP__.'/Home/'.$base_url.'/inbox');
            }else{
                $this->error('发送失败');
            }
        }else{
            $this->error('内容不能为空');
        }
        
    }

    //添加关注
    public function add_follow(){

        if(session('user_id')&&session('institution_type')){

            $Interest_list=M('Interest_list');

            $interest['host_id']=I('host_id');
            $interest['host_type']=I('host_type');
            $interest['fan_id']=session('user_id');
            $interest['fan_type']=session('institution_type');
            $interest['time']=time();

            $result=$Interest_list->add($interest);

            if($result){
                $data['state']=1;   //关注成功
            }else{
                $data['state']=3;   //关注失败
            }

        }else{
            $data['state']=2; //用户未登录
        }
        
        $this->ajaxReturn($data);
    }

    //获取用户信息
    protected function getUserInfo($user_id,$institution_type){
        switch ($institution_type) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');   break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');   break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company');  break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');   break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');   break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');   break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');   break;
                /*其它机构*/

                /*其它机构*/
                case '9':  $User=M('User');   break;
                /*其它机构*/


                default:break;
        }

        return $User->getById($user_id);
    }
}