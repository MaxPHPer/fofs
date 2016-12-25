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


        // 设置语言选项
        // 中文zh,英文en
        session('lang',substr(cookie('think_language'),0,2));
        // $this->check_right();
        
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


        //检查认证情况
        $Staff_auth=M('Staff_auth');
        $where=array();
        $where['institution_type']=session('institution_type');
        $where['institution_id']=session('user_id');
        $staff_auths=$Staff_auth->where($where)->order('req_time desc')->select();
        
        foreach($staff_auths as $key => $value){
            $User=M('User');  
            $base_url='individual_pic/';

            $where5['id']=$value['user_id'];
            $img_url=$User->where($where5)->getField('head_portrait_url');
            $staff_auths[$key]['institution_logo_img']=$base_url.($img_url?$img_url:'default.jpg');
        }
        $this->assign('staff_auths',$staff_auths);

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
    public function do_sendLetter($letter_type=1){
        if(I('post.title')&&I('post.content')){
            $letter['sender_id']=session('user_id');
            $letter['sender_type']=session('institution_type');
            $letter['sender_name']=session('institution_abbr')?session('institution_abbr'):session('nickname');
            $letter['recipient_id']=I('post.recipient_id');
            $letter['recipient_type']=I('post.recipient_type');
            $letter['recipient_name']=I('post.recipient_name');
            $letter['title']=I('post.title');
            $letter['content']=I('post.content');
            $letter['letter_type']=$letter_type;    //1表示普通信件，2表示个人用户申请认证信件
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

    //认证通过员工申请认证
    public function auth_approve(){
        $Staff_auth=M('Staff_auth');
        $where['id']=I('get.auth_id');
        $where['institution_type']=session('institution_type');
        $where['institution_id']=session('user_id');

        $data['id']=I('get.auth_id');
        $data['state']=1;
        if($Staff_auth->where($where)->save($data)){
            $this->success('认证成功');
        }else{
            $this->error('认证失败');
        }
    }

    //认证通过员工申请认证
    public function auth_deny(){
        $Staff_auth=M('Staff_auth');
        $where['id']=I('get.auth_id');
        $where['institution_type']=session('institution_type');
        $where['institution_id']=session('user_id');
        
        $data['id']=I('get.auth_id');
        $data['state']=2;
        if($Staff_auth->where($where)->save($data)){
            $this->success('拒绝成功');
        }else{
            $this->error('拒绝失败');
        }
    }

    // 检测用户权限
    protected function check_right(){
        var_dump($this->check_right_item('organization_code',null,null,1,3));
        echo '<br/>';
        var_dump($this->check_right_item('已登录',9,5,1,3));
        echo '<br/>';
        var_dump($this->check_right_item('organization_code',9,6,1,3));
        echo '<br/>';
        var_dump($this->check_right_item('contributed_capital',1,4,1,3));
        echo '<br/>';
        var_dump($this->check_right_item('contributed_capital',1,3,1,3));
        echo '<br/>';
    }
    //检测某类型的用户是否具有查看某类型用户的某项内容的权限
    protected function check_right_item($right_name, $watcher_type = 0, $watcher_id = 0,$observed_type = 0,$observed_id = 0){

        //检查是否登录
        if ($right_name == '已登录') {
            if ($watcher_type && $watcher_id) {
                return 1;
            }
            else{
                return 0;
            }
        }

        //检查其它权限
        if (!$watcher_type || !$watcher_id) {
            return 0;
        }else{
            $watcher_table_name = $this->get_table_name_by_num($watcher_type);

            //如果观察者是个人用户
            if ($watcher_table_name == 'User') {
                //是否被认证
                if($this->is_user_auth($watcher_id) == 1){
                    // 1表示有公司验证，但公司不是联盟成员
                    $watcher_table_name = $watcher_table_name.'AuthUnMem';
                }
                else if($this->is_user_auth($watcher_id) == 2) {
                    // 2表示有公司验证，且公司是联盟成员
                    $watcher_table_name = $watcher_table_name.'AuthMem';
                }
            }

            //如果观察者是Lp
            if ($watcher_table_name == 'Lp') {
                //是否被认证
                if($this->is_lp_mem($watcher_id)){
                    // 是联盟成员
                    $watcher_table_name = $watcher_table_name.'Mem';
                }
                else {
                    // 不是联盟成员
                    $watcher_table_name = $watcher_table_name.'UnMem';
                }
            }

            $observed_table_name = $this->get_table_name_by_num($observed_type);

            $auth = new \Think\Auth();

            var_dump($watcher_table_name.'_'.$right_name.'_'.$observed_table_name);
            echo '<br/>';
            var_dump($watcher_table_name);
            echo '<br/>';
            $result = $auth->check($watcher_table_name.'_'.$right_name.'_'.$observed_table_name, $watcher_table_name);
            if($result){
                return 1;
            }else{
                return 0;
            }
        }
    }

    protected function get_table_name_by_num($institution_type){
        switch ($institution_type) {
                /*LP(母基金管理机构)*/
                case '1':  $User='Lp'; break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User='Gp'; break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User='Startup_company'; break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User='Fa'; break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User='Legal_agency'; break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User='Financial_institution'; break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User='Business_incubator'; break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User='Other_institution'; break;
                /*其它机构*/

                /*其它机构*/
                case '9':  $User='User'; break;
                /*其它机构*/
                default: break;
        }
        return $User;
    }

    // 个人用户是否被公司验证
    protected function is_user_auth($user_id) {
        //检查认证情况
        $Staff_auth=M('Staff_auth');
        $where['user_id']=$user_id;
        $where['state']=1;  //审核通过的

        $auths = $Staff_auth->where($where)->order('id desc')->limit(1)->select();
        if(!$auths[0]['institution_id']){
            return 0;   //此用户未认证
        }else{
            if ($auths[0]['institution_type'] !=1 ) {
                return 1;   //此用户被认证的公司非Lp,即非联盟成员
            }
            else {
                $Lp = M('Lp');
                $is_fofs_member = $Lp->getFieldById($auths[0]['institution_id'], 'is_fofs_member');
                if ($is_fofs_member == 1) {
                    return 2; //此用户所属的LP为联盟成员
                }else{
                    return 1;  //此用户所属的LP为非联盟成员
                }

            }
        }


    }

    // Lp是否为联盟成员
    protected function is_lp_mem($lp_id) {
        $Lp = M('Lp');
        $is_fofs_member = $Lp->getFieldById($lp_id, 'is_fofs_member');
        if ($is_fofs_member == 1) {
            return 1; //此用户所属的LP为联盟成员
        }else{
            return 0;  //此用户所属的LP为非联盟成员
        }
    }

    // 检查用户对LP的查看权限
    protected function lp_check_read_right($observed_type = 0,$observed_id = 0){
        // 检查对 组织机构代码 的查看权限
        $right['is_allow_read_organization_code'] = $this->check_right_item('organization_code',session('institution_type'),session('institution_id'),$observed_type,$observed_id);
        
        // 检查对 注册地址、办公地址、注册资本 的查看权限
        $right['is_allow_read_addr_and_capital'] = $this->check_right_item('已登录',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 实缴资本 的查看权限
        $right['is_allow_read_contributed_capital'] = $this->check_right_item('contributed_capital',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 员工人数 的查看权限
        $right['is_allow_read_number_of_employees'] = $this->check_right_item('number_of_employees',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 联系人姓名 的查看权限
        $right['is_allow_read_contact_username'] = $this->check_right_item('contact_username',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 联系传真 的查看权限
        $right['is_allow_read_contact_fax'] = $this->check_right_item('contact_fax',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 联系电话 的查看权限
        $right['is_allow_read_contact_phone'] = $this->check_right_item('contact_phone',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 联系邮箱 的查看权限
        $right['is_allow_read_contact_email'] = $this->check_right_item('contact_email',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 法人代表姓名职务 的查看权限
        $right['is_allow_read_representative_baseinfo'] = $this->check_right_item('已登录',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 从业经历 的查看权限
        $right['is_allow_read_business_experience'] = $this->check_right_item('business_experience',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 其它高管姓名职务 的查看权限
        $right['is_allow_read_senior_executive_baseinfo'] = $this->check_right_item('senior_executive',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 协会登记信息 的查看权限
        $right['is_allow_read_association_registration'] = $this->check_right_item('association_registration',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 中基协备案状况 的查看权限
        $right['is_allow_read_recorded'] = $this->check_right_item('recorded',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 托管人名称 的查看权限
        $right['is_allow_read_trustee_name'] = $this->check_right_item('trustee_name',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 运作状态 的查看权限
        $right['is_allow_read_run_state'] = $this->check_right_item('已登录',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 募集方案 的查看权限
        $right['is_allow_read_recruitment_plan_url'] = $this->check_right_item('recruitment_plan_url',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 已投项目基本信息 的查看权限
        $right['is_allow_read_investment_project'] = $this->check_right_item('investment_project',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        // 检查对 已投项目详细信息 的查看权限
        $right['is_allow_read_investment_project_detail'] = $this->check_right_item('investment_project_detail',session('institution_type'),session('institution_id'),$observed_type,$observed_id);

        $this->assign('right', $right);
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