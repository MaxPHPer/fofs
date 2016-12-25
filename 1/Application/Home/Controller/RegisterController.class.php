<?php
namespace Home\Controller;
use Home\Controller;
class RegisterController extends BaseController{
    public function _initialize() {
        parent::_initialize();
        $pgtype=cookie('think_language')=='zh-CN'?'zh-cn':cookie('think_language');
        $this->assign('pgtype',$pgtype);
    }


    //个人注册者邮件确认内容
    public function personalmailcontent($link){
        switch (cookie('think_language')) {
            case 'zh-cn':case 'zh-CN':
               $content='<!DOCTYPE html>
<html lang="zh-CN">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mail</title>
  <style type="text/css">
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    html {
      font-family: sans-serif;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    head {
      display: none;
    }
    meta {
      display: none;
    }
    title {
      display: none;
    }
    link {
      display: none;
    }
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      background-color: #fff;
    }
    body {
      margin: 0;
    }
    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .modal-header {
      min-height: 16.43px;
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .modal-title {
      margin: 0;
      line-height: 1.42857143;
    }
    .h2, h2 {
      font-size: 30px;
    }
    .h1, .h2, .h3, h1, h2, h3 {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;
    }
    .h4, h4 {
      font-size: 18px;
    }
    .h4, .h5, .h6, h4, h5, h6 {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .media, .media-body {
      overflow: hidden;
      zoom: 1;
    }
    .media-heading {
      margin-top: 0;
      margin-bottom: 5px;
    }
    .media {
      margin-top: 15px;
    }
    .media-body, .media-left, .media-right {
      display: table-cell;
      vertical-align: top;
    }
    .media-body {
      width: 10000px;
    }
    .media-left, .media .pull-left {
      padding-right: 10px;
    }
    .media-object {
      display: block;
    }
    .modal-body {
      position: relative;
      padding: 15px;
    }
    .row {
      margin-right: -15px;
      margin-left: -15px;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-4{
      float: left;
    }
    .col-md-4{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .btn-primary {
      color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .btn-block {
      display: block;
      width: 100%;
    }
    button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
    }
    button, select {
      text-transform: none;
    }
    button {
      overflow: visible;
    }
    a {
      color: #337ab7;
      text-decoration: none;
    }
    a {
      background-color: transparent;
    }
    img {
      vertical-align: middle;
    }
    img {
      border: 0;
      height: 20;
    }
    .modal-footer {
      padding: 15px;
      text-align: right;
      border-top: 1px solid #e5e5e5;
    }

    *{
      font-family: "微软雅黑";
    }
    .mail .well{
      margin-top: 20px;
      margin-left: 100px;
      margin-right: 100px;
    }
    .mailContent{
      margin: 20px;
    }
    .mail .modal-body p{
      font-size: 18px;
    }
    .mail .modal-body .name ,.number{
      color: #337ab7;
    }
    .mail .btn-group{
      margin: 10px;
    }
    .mail .modal-body .row{
      margin-top: 20px;
    }
    .mail .logoEmial {
      height: 30px;
    }
  </style>
</head>
<body class="mail">
  <div class="well">
    <div class="modal-header">
      <h2 class="modal-title">注册邮件</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="#" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 注册邮件</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：核实您的电子邮箱地址</h4>
      <div class="mailContent">
        <p>感谢您注册 中国母基金联盟。</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$link.'" class="btn btn-primary  btn-block">点击核实您的邮箱地址</a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
      <p>如有任何问题，请与<a href="Mailto:896776703@qq.com">896776703@qq.com</a>联系。<br/>您的中国母基金联盟技术支持团队。</p>
    </div>
  </div>
</body>
</html>';
                break;
            
            case 'en-us':
                $content='<!DOCTYPE html>
<html lang="zh-CN">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mail</title>
  <style type="text/css">
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    html {
      font-family: sans-serif;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    head {
      display: none;
    }
    meta {
      display: none;
    }
    title {
      display: none;
    }
    link {
      display: none;
    }
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      background-color: #fff;
    }
    body {
      margin: 0;
    }
    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .modal-header {
      min-height: 16.43px;
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .modal-title {
      margin: 0;
      line-height: 1.42857143;
    }
    .h2, h2 {
      font-size: 30px;
    }
    .h1, .h2, .h3, h1, h2, h3 {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;
    }
    .h4, h4 {
      font-size: 18px;
    }
    .h4, .h5, .h6, h4, h5, h6 {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .media, .media-body {
      overflow: hidden;
      zoom: 1;
    }
    .media-heading {
      margin-top: 0;
      margin-bottom: 5px;
    }
    .media {
      margin-top: 15px;
    }
    .media-body, .media-left, .media-right {
      display: table-cell;
      vertical-align: top;
    }
    .media-body {
      width: 10000px;
    }
    .media-left, .media .pull-left {
      padding-right: 10px;
    }
    .media-object {
      display: block;
    }
    .modal-body {
      position: relative;
      padding: 15px;
    }
    .row {
      margin-right: -15px;
      margin-left: -15px;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-4{
      float: left;
    }
    .col-md-4{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .btn-primary {
      color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .btn-block {
      display: block;
      width: 100%;
    }
    button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
    }
    button, select {
      text-transform: none;
    }
    button {
      overflow: visible;
    }
    a {
      color: #337ab7;
      text-decoration: none;
    }
    a {
      background-color: transparent;
    }
    img {
      vertical-align: middle;
    }
    img {
      border: 0;
      height: 20;
    }
    .modal-footer {
      padding: 15px;
      text-align: right;
      border-top: 1px solid #e5e5e5;
    }

    *{
      font-family: "微软雅黑";
    }
    .mail .well{
      margin-top: 20px;
      margin-left: 100px;
      margin-right: 100px;
    }
    .mailContent{
      margin: 20px;
    }
    .mail .modal-body p{
      font-size: 18px;
    }
    .mail .modal-body .name ,.number{
      color: #337ab7;
    }
    .mail .btn-group{
      margin: 10px;
    }
    .mail .modal-body .row{
      margin-top: 20px;
    }
    .mail .logoEmial {
      height: 30px;
    }
  </style>
</head>
<body class="mail">
  <div class="well">
    <div class="modal-header">
      <h2 class="modal-title">Registration</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="#" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| Registration</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>Subject: Verify your email address</h4>
      <div class="mailContent">
        <p>Thank you for signing up FOFS.</p>  
        <div class="row">
          <div class="col-md-4">
            <a href="'.$link.'" class="btn btn-primary  btn-block">Verify your email address</a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:896776703@qq.com">896776703@qq.com</a>.<br/>Your FOFS technic Team.</p>
    </div>
  </div>
</body>
</html>';
                break;
        }
        return $content;
    }


	  //注册页
    public function email(){
        $this->display();
    }

    //发送邮件
    public function do_send_mail($institution_type,$id,$state){
        $email=cookie('email');
        $title=session('lang')=='en'?"Fofs Verify":"中国母基金联盟 验证邮件";
        if ($institution_type) {

            $link=U('Home/Register/personal_inf_confirm',array('user_id'=>$id,'state'=>$state,'institution_type'=>$institution_type),'',true);
            $content=$this->personalmailcontent($link);

        }else{
            $this->error('参数非法',__APP__.'/Home/Index');
        }

        if(SUPPORTsendMail($email,$title,$content)) {
            cookie('institution_type',null);
            cookie('institution_type',$institution_type);
            return 1;
        }
        else return 0;
    }

    //重新发送
    public function resend_email(){
        $institution_type=session('institution_type');
        $data['email']=session('email');
        $data['institution_type']=session('institution_type');
        switch ($data['institution_type']) {
            /*LP(母基金管理机构)*/
            case '1':  $User=M('Lp');   break;
            /*LP(母基金管理机构)end*/

            /*GP(私募股权基金管理机构)*/
            case '2':  $User=M('Gp');  break;
            /*GP(私募股权基金管理机构)end*/

            /*创业公司*/
            case '3':  $User=M('Startup_company');  break;
            /*创业公司end*/

            /*fa服务机构*/
            case '4':  $User=M('Fa');  break;
            /*fa服务机构end*/

            /*法务服务机构*/
            case '5':  $User=M('Legal_agency');  break;
            /*法务服务机构end*/

            /*财务服务机构*/
            case '6':  $User=M('Financial_institution');  break;
            /*财务服务机构end*/

            /*众创空间*/
            case '7':  $User=M('Business_incubator');  break;
            /*众创空间end*/

            /*其它机构*/
            case '8':  $User=M('Other_institution'); break;
            /*其它机构*/

            /*个人*/
            case '9':  $User=M('User'); break;
                    
            default:break;
        }

        $id=$User->where($data)->getField('id');

        $check=md5(time().$data['email']);  //创建验证码
        $state=substr($check,0,20);
        $res=$User->where($data)->setField('state',$state);

        if($res){
            $this->do_send_mail($institution_type,$id,$state);
            $this->redirect('/Home/Register/emailCheck',0);
        }
        else $this->error($User->getError());
    }

    //信息入库
    public function send_mail(){
        $data=I('post.');

        // $Code=M('Referral_code');         //验证推荐码
        // $key=$Code->getbyCode($data['code']);
        // if(!empty($key)){
        //   if($key['effective_degree']>0)  $Code->where($key)->setDec('effective_degree');
        //   else $this->error('推荐码无效');
        // }else{
        //   $this->error('推荐码无效');
        // }
        

        if(!$data['email']||!$data['password']||!$data['passwordTwice'])
            $this->error('填写信息不完整');
        if($data['accepted']!='on')
            $this->error('请阅读并同意用户协议','termOfUse');

        if(md5($data['password'])!=md5($data['passwordTwice']))
            $this->error('两次密码不一致!');
        else{
            //个人注册者
            if($data['is_personal_sign']){
                $User=M('User');
            }else{
                switch ($data['institution_type']) {
                    /*LP(母基金管理机构)*/
                    case '1':  $User=M('Lp');  break;
                    /*LP(母基金管理机构)end*/

                    /*GP(私募股权基金管理机构)*/
                    case '2':  $User=M('Gp');  break;
                    /*GP(私募股权基金管理机构)end*/

                    /*创业公司*/
                    case '3':  $User=M('Startup_company');  break;
                    /*创业公司end*/

                    /*fa服务机构*/
                    case '4':  $User=M('Fa');  break;
                    /*fa服务机构end*/

                    /*法务服务机构*/
                    case '5':  $User=M('Legal_agency');  break;
                    /*法务服务机构end*/

                    /*财务服务机构*/
                    case '6':  $User=M('Financial_institution');  break;
                    /*财务服务机构end*/

                    /*众创空间*/
                    case '7':  $User=M('Business_incubator');  break;
                    /*众创空间end*/

                    /*其它机构*/
                    case '8':  $User=M('Other_institution');  break;
                    /*其它机构*/


                    default: $this->error('请选择机构类型!');break;
                }              
            }


            $check=md5(time().$data['email']);  //创建验证码
            $data['state']=substr($check,0,20); //存储验证码
            $data['reg_step']=1;
            $data['password']=md5($data['password']);

            if($User->create($data)){
                try{
                    $res=$User->add();
                }catch(\Exception $e){      //错误处理
                    $code=$e->getCode();
                    if($code=='23000')  $this->error('该用户已存在,请登录');
                }
                if($res){
                    cookie(null);
                    cookie('email',$data['email']);
                    if($this->do_send_mail($data['is_personal_sign']?$data['is_personal_sign']:$data['institution_type'],$res,$data['state'])){
                        $this->redirect('emailCheck');
                    }else{
                        $this->error('邮件发送错误!');
                    } 
                }
            }
            else {
              $this->error($User->getError());
            }
        }   
    }

	  //注册后验证邮箱提示页
    public function emailCheck(){
        $email=cookie('email');
        $this->assign('email',$email);

        $add=explode('@',$email);       //获取邮箱地址
        $link='http://mail.'.$add[1];  
        $this->assign('link',$link);

        $this->display();
    }

    //注册者邮件信息确认
    public function personal_inf_confirm(){

        $data=I('get.');

        switch ($data['institution_type']) {
            /*LP(母基金管理机构)*/
            case '1':  $User=M('Lp');  $success_url='personalInfo'; break;
            /*LP(母基金管理机构)end*/

            /*GP(私募股权基金管理机构)*/
            case '2':  $User=M('Gp');  $success_url='personalInfo'; break;
            /*GP(私募股权基金管理机构)end*/

            /*创业公司*/
            case '3':  $User=M('Startup_company');  $success_url='personalInfo'; break;
            /*创业公司end*/

            /*fa服务机构*/
            case '4':  $User=M('Fa');  $success_url='personalInfo'; break;
            /*fa服务机构end*/

            /*法务服务机构*/
            case '5':  $User=M('Legal_agency');  $success_url='personalInfo'; break;
            /*法务服务机构end*/

            /*财务服务机构*/
            case '6':  $User=M('Financial_institution');  $success_url='personalInfo'; break;
            /*财务服务机构end*/

            /*众创空间*/
            case '7':  $User=M('Business_incubator');  $success_url='personalInfo'; break;
            /*众创空间end*/

            /*其它机构*/
            case '8':  $User=M('Other_institution');  $success_url='personalInfo'; break;
            /*其它机构*/

            /*个人*/
            case '9':  $User=M('User');  $success_url='individualInfo'; break;
                    
            default:break;
        }
        
        if(!$data)  $this->error('非法访问',__APP__."/Home/Index/");

        $state=$User->where('id='.$data['user_id'])->getField('state');
        $email=$User->where('id='.$data['user_id'])->getField('email');

        if($state=='1'){
            $this->success('该用户已激活,请登录',__APP__."/Home/Index");
        }
        else if($state=='2'){
            $this->error('该用户已停用,请联系管理员',__APP__."/Home/Index");
        }
        else{
            if($state==$data['state']){
                $res=$User->where('id='.$data['user_id'])->setField('state',1);
                $res=$User->where('id='.$data['user_id'])->setField('reg_step',1);  //激活成功
                $res=$User->where('id='.$data['user_id'])->setField('reg_time',time());

                if($res){
                    cookie(null);
                    cookie('user_id',$data['user_id']);
                    cookie('institution_type',$data['institution_type']);
                    session('user_id',$data['user_id']);
                    session('email',$email);
                    session('institution_type',$data['institution_type']);
                    $this->success('邮箱确认成功！请继续填写相关信息',__APP__.'/Home/Register/'.$success_url);
                }
                else{
                    $this->error($User->getError());
                } 
                
            }
            else {
                $check=md5(time().$email);  //创建验证码
                $state=substr($check,0,20);
                $res=$User->where('id='.$data['user_id'])->setField('state',$state);
                if($res){
                    cookie(null);
                    cookie('email',$data['email']);
                    $this->do_send_mail($data['institution_type'],$data['user_id'],$state);
                    $this->error('邮箱验证有误！请重新验证',__APP__."/Home/Register/emailCheck");
                }
            }
        }
    }


    //个人信息
    public function individualInfo(){

        $User=M('User');
        $id=cookie('user_id');
        if(!$id) $this->error('非法访问',__APP__."/Home/Index/");

        $data=$User->find($id);

        if($data['state']=='1'){

            $this->assign('data',$data);
            $this->display();
        }
        else $this->error('非法访问',__APP__."/Home/Index/");
    }

    //储存个人注册者信息
    public function save_individualInfo(){
      //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('User');
        $data=I('post.');
        $data['state']=200;  //表示已经注册完成

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/individual_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/individual_pic', 0777 ,1);

        if($User->create($data)){
            $User->reg_time=time();
            $result=$User->save();
            if($result){
                /*上传头像*/
                    foreach($_FILES as $key =>$file){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('head_portrait_url',$info['savename']);
                             }
                         }
                    }

                $email=$User->getFieldById($data['id'],'email');
                $this->finishedemail($email,$data['username']);     //发送成功邮件

                $this->success('Success！注册成功,请登录',__APP__."/Home/Index/index");
            }
            else $this->error($User->getError());
        }
        else{
            $this->error($User->getError());
        }
    }

    //lp公司信息
    public function lpCompanyInfo(){
        if(session('institution_type')!=1){
            $this->error('非法访问',__APP__."/Home/Index/");
        }else{
            $this->display();
        }
            
    }

    //个人信息
    public function personalInfo(){
        if(session('user_id')){
            switch (session('institution_type')) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');  break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');  break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company');  break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');  break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');  break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');  break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');  break;
                /*其它机构*/


                default:break;
            }
            $this->assign('user',$User->getById(session('user_id')));    
            $this->display();
        }
        else{
           $this->error('非法访问',__APP__."/Home/Index/");
        } 
    }

    //储存个人注册者信息
    public function save_personalInfo(){
        if(session('user_id')){

            //确定用户类型
            switch (session('institution_type')) {
                /*LP(母基金管理机构)*/
                case '1':  $User=M('Lp');  
                           $success_url='/Lp/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/lpCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           $fourth_sign_url='/Register/lpFundsInfo';
                           break;
                /*LP(母基金管理机构)end*/

                /*GP(私募股权基金管理机构)*/
                case '2':  $User=M('Gp');  
                           $success_url='/Gp/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/gpCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           $fourth_sign_url='/Register/gpFundsInfo';
                           break;
                /*GP(私募股权基金管理机构)end*/

                /*创业公司*/
                case '3':  $User=M('Startup_company');  
                           $success_url='/Startups/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/startupCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           break;
                /*创业公司end*/

                /*fa服务机构*/
                case '4':  $User=M('Fa');  
                           $success_url='/Sa/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/faCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           $fourth_sign_url='/Register/faSuccessCase';
                           break;
                /*fa服务机构end*/

                /*法务服务机构*/
                case '5':  $User=M('Legal_agency');  
                           $success_url='/Sa/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/laCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           $fourth_sign_url='/Register/laServiceInfo';
                           break;
                /*法务服务机构end*/

                /*财务服务机构*/
                case '6':  $User=M('Financial_institution');  
                           $success_url='/Sa/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/fiCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           $fourth_sign_url='/Register/fiServiceInfo';
                           break;
                /*财务服务机构end*/

                /*众创空间*/
                case '7':  $User=M('Business_incubator');  
                           $success_url='/Sa/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/biCompanyInfo';
                           $third_sign_url='/Register/membersInfo';
                           $fourth_sign_url='/Register/biServiceInfo';
                           break;
                /*众创空间end*/

                /*其它机构*/
                case '8':  $User=M('Other_institution');  
                           $success_url='/Sa/individualProfile'; 
                           $first_sign_url='/Register/personalInfo';
                           $second_sign_url='/Register/otherInstitutionInfo';
                           $third_sign_url='/Register/membersInfo';
                           break;
                /*其它机构*/

                /*个人*/
                case '9':  $User=M('User');  
                           $success_url='/Individual/individualProfile'; 
                           break;
                        
                default:break;
            }
        }
        else{
           $this->error('非法访问',__APP__."/Home/Index/");
        } 

        $data=I('post.');
        $data['reg_step']=2;
        $data['id']=session('user_id');

        if($User->create($data)){
            $User->reg_time=time();
            $result=$User->save();
            if($result){
                session('username',$data['admin_name']);
                $this->success('Success！保存成功，请继续完善机构信息',__APP__.'/Home'.$second_sign_url);
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }


    //使用条款
    public function termOfUse(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(16);
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }


    //发送注册成功邮件
    private function finishedemail($email,$name){
      $title='注册成功';
      switch (cookie('think_language')) {
        case 'zh-cn':case 'zh-CN':
          $content='<!DOCTYPE html>
<html lang="zh-CN">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mail</title>
  <style type="text/css">
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    html {
      font-family: sans-serif;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    head {
      display: none;
    }
    meta {
      display: none;
    }
    title {
      display: none;
    }
    link {
      display: none;
    }
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      background-color: #fff;
    }
    body {
      margin: 0;
    }
    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .modal-header {
      min-height: 16.43px;
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .modal-title {
      margin: 0;
      line-height: 1.42857143;
    }
    .h2, h2 {
      font-size: 30px;
    }
    .h1, .h2, .h3, h1, h2, h3 {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;
    }
    .h4, h4 {
      font-size: 18px;
    }
    .h4, .h5, .h6, h4, h5, h6 {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .media, .media-body {
      overflow: hidden;
      zoom: 1;
    }
    .media-heading {
      margin-top: 0;
      margin-bottom: 5px;
    }
    .media {
      margin-top: 15px;
    }
    .media-body, .media-left, .media-right {
      display: table-cell;
      vertical-align: top;
    }
    .media-body {
      width: 10000px;
    }
    .media-left, .media .pull-left {
      padding-right: 10px;
    }
    .media-object {
      display: block;
    }
    .modal-body {
      position: relative;
      padding: 15px;
    }
    .row {
      margin-right: -15px;
      margin-left: -15px;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-4{
      float: left;
    }
    .col-md-4{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .btn-primary {
      color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .btn-block {
      display: block;
      width: 100%;
    }
    button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
    }
    button, select {
      text-transform: none;
    }
    button {
      overflow: visible;
    }
    a {
      color: #337ab7;
      text-decoration: none;
    }
    a {
      background-color: transparent;
    }
    img {
      vertical-align: middle;
    }
    img {
      border: 0;
      height: 20;
    }
    .modal-footer {
      padding: 15px;
      text-align: right;
      border-top: 1px solid #e5e5e5;
    }

    *{
      font-family: "微软雅黑";
    }
    .mail .well{
      margin-top: 20px;
      margin-left: 100px;
      margin-right: 100px;
    }
    .mailContent{
      margin: 20px;
    }
    .mail .modal-body p{
      font-size: 18px;
    }
    .mail .modal-body .name ,.number{
      color: #337ab7;
    }
    .mail .btn-group{
      margin: 10px;
    }
    .mail .modal-body .row{
      margin-top: 20px;
    }
    .mail .logoEmial {
      height: 30px;
    }
  </style>
</head>
<body class="mail">
  <div class="well">
    <div class="modal-header">
      <h2 class="modal-title">注册确认邮件</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="#" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 注册确认邮件</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：注册确认邮件  </h4>
      <div class="mailContent">
        <p>尊敬的<span class="name" id="name">'.$name.'</span>，您好<br/>您已成功注册中国母基金联盟， 请妥善保管好密码。如忘记密码，可以通过注册电子邮箱找回。</p>  
        <br/>
      </div>
    </div>
     <div class="modal-footer">
       <p>如有任何问题，请与<a href="Mailto:896776703@qq.com">896776703@qq.com</a>联系。<br/>您的中国母基金联盟技术支持团队。</p>
    </div>
  </div>
</body>
</html>';
          break;
        
        case 'en-us':
          $content='<!DOCTYPE html>
<html lang="zh-CN">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mail</title>
  <style type="text/css">
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    html {
      font-family: sans-serif;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    head {
      display: none;
    }
    meta {
      display: none;
    }
    title {
      display: none;
    }
    link {
      display: none;
    }
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      background-color: #fff;
    }
    body {
      margin: 0;
    }
    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .modal-header {
      min-height: 16.43px;
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .modal-title {
      margin: 0;
      line-height: 1.42857143;
    }
    .h2, h2 {
      font-size: 30px;
    }
    .h1, .h2, .h3, h1, h2, h3 {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;
    }
    .h4, h4 {
      font-size: 18px;
    }
    .h4, .h5, .h6, h4, h5, h6 {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .media, .media-body {
      overflow: hidden;
      zoom: 1;
    }
    .media-heading {
      margin-top: 0;
      margin-bottom: 5px;
    }
    .media {
      margin-top: 15px;
    }
    .media-body, .media-left, .media-right {
      display: table-cell;
      vertical-align: top;
    }
    .media-body {
      width: 10000px;
    }
    .media-left, .media .pull-left {
      padding-right: 10px;
    }
    .media-object {
      display: block;
    }
    .modal-body {
      position: relative;
      padding: 15px;
    }
    .row {
      margin-right: -15px;
      margin-left: -15px;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-4{
      float: left;
    }
    .col-md-4{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .btn-primary {
      color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .btn-block {
      display: block;
      width: 100%;
    }
    button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
    }
    button, select {
      text-transform: none;
    }
    button {
      overflow: visible;
    }
    a {
      color: #337ab7;
      text-decoration: none;
    }
    a {
      background-color: transparent;
    }
    img {
      vertical-align: middle;
    }
    img {
      border: 0;
      height: 20;
    }
    .modal-footer {
      padding: 15px;
      text-align: right;
      border-top: 1px solid #e5e5e5;
    }

    *{
      font-family: "微软雅黑";
    }
    .mail .well{
      margin-top: 20px;
      margin-left: 100px;
      margin-right: 100px;
    }
    .mailContent{
      margin: 20px;
    }
    .mail .modal-body p{
      font-size: 18px;
    }
    .mail .modal-body .name ,.number{
      color: #337ab7;
    }
    .mail .btn-group{
      margin: 10px;
    }
    .mail .modal-body .row{
      margin-top: 20px;
    }
    .mail .logoEmial {
      height: 30px;
    }
  </style>
</head>
<body class="mail">
  <div class="well">
    <div class="modal-header">
      <h2 class="modal-title">Registration Confirmation</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="#" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| Registration Confirmation</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>Subject: Registration Confirmation</h4>
      <div class="mailContent">
        <p>You had been successfully registered in FOFS, your user name is <span class="name" id="name">'.$name.'</span>.In case that you forget your password, you could request to reset the password via this email address.</p>  
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:896776703@qq.com">896776703@qq.com</a>.<br/>Your FOFS Technic  Team.</p>
    </div>
  </div>
</body>
</html>';
          break;
      }
      SUPPORTsendMail($email,$title,$content);
    }

    //储存lp公司信息
    public function save_lpCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Lp');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['organization_code']=I('post.organization_code');
        $data['is_fofs_member']=I('post.is_fofs_member');
        $data['registered_addr']=I('post.registered_addr');
        $data['office_addr']=I('post.office_addr');
        $data['registered_capital']=I('post.registered_capital');
        $data['contributed_capital']=I('post.contributed_capital');
        switch (I('post.fund_type')) {
          case '0':
            $data['is_securities_fund']=1;
            break;
          
          case '1':
            $data['is_stock_fund']=1;
            break;

          case '2':
            $data['is_startup_fund']=1;
            break;

           case '3':
            $data['is_other_fund']=1;
            break;
        }
        $data['number_of_employees']=I('post.number_of_employees');
        $data['contact_username']=I('post.contact_username');
        $data['contact_fax']=I('post.contact_fax');
        $data['contact_phone']=I('post.contact_phone');
        $data['contact_email']=I('post.contact_email');
        $data['contact_institution_wechat']=I('post.contact_institution_wechat');
        $data['contact_institution_web']=I('post.contact_institution_web');
        $data['is_association_registration']=I('post.is_association_registration');
        $data['association_registration_number']=I('post.association_registration_number');
        $data['association_registration_time']=strtotime(I('post.association_registration_time'));

        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/lp_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/lp_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                         }
                     }
                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }


    //保存团队信息，再添加其它成员
    public function add_membersInfo(){

        $User=M('Senior_executive');

        $data['username']=I('post.username');
        $data['function']=I('post.function');
        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['reg_time']=time();

        if($User->create($data)){
            //保存个人基本信息
            $user_id=$User->add();
            $where['institution_id']=session('user_id');
            //设置第一位为法人或代表
            if($User->where($where)->count()==1){
                $User->where('id='.(int)$user_id)->setField('is_representative',1);
            }

            //保存工作经历
            $Business_experience=M('Business_experience');
            // 批量添加数据
            $experience=I('post.business_experience');
            for($i=0;$i<count($experience['company_name']);$i++){
                $dataList[] = array('senior_executive_id'=>(int)$user_id,'company_name'=>$experience['company_name'][$i],'function'=>$experience['function'][$i],'start_time'=>$experience['start_time'][$i],'end_time'=>$experience['end_time'][$i]);
            }

            $result=$Business_experience->addAll($dataList);

            if($result){
                $this->success('Success！保存成功，请继续添加管理团队信息',__APP__.'/Home/Register/membersInfo');
            }else{
                $this->error($Business_experience->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
        
    }


    //保存团队信息，并跳转下一步
    public function save_membersInfo(){
        $User=M('Senior_executive');

        $data['username']=I('post.username');
        $data['function']=I('post.function');
        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['reg_time']=time();

        if($User->create($data)){
            //保存个人基本信息
            $user_id=$User->add();
            $where['institution_id']=session('user_id');
            //设置第一位为法人或代表
            if($User->where($where)->count()==1){
                $User->where('id='.(int)$user_id)->setField('is_representative',1);
            }

            //保存工作经历
            $Business_experience=M('Business_experience');
            // 批量添加数据
            $experience=I('post.business_experience');
            for($i=0;$i<count($experience['company_name']);$i++){
                $dataList[] = array('senior_executive_id'=>(int)$user_id,'company_name'=>$experience['company_name'][$i],'function'=>$experience['function'][$i],'start_time'=>$experience['start_time'][$i],'end_time'=>$experience['end_time'][$i]);
            }

            $result=$Business_experience->addAll($dataList);


            if($result){
                //确定用户类型
                switch (session('institution_type')) {
                    /*LP(母基金管理机构)*/
                    case '1':  $User=M('Lp');  
                               $success_url='/Lp/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/lpCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               $fourth_sign_url='/Register/lpFundsInfo';
                               break;
                    /*LP(母基金管理机构)end*/

                    /*GP(私募股权基金管理机构)*/
                    case '2':  $User=M('Gp');  
                               $success_url='/Gp/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/gpCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               $fourth_sign_url='/Register/gpFundsInfo';
                               break;
                    /*GP(私募股权基金管理机构)end*/

                    /*创业公司*/
                    case '3':  $User=M('Startup_company');  
                               $success_url='/Startups/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/startupCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               break;
                    /*创业公司end*/

                    /*fa服务机构*/
                    case '4':  $User=M('Fa');  
                               $success_url='/Sa/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/faCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               $fourth_sign_url='/Register/faSuccessCase';
                               break;
                    /*fa服务机构end*/

                    /*法务服务机构*/
                    case '5':  $User=M('Legal_agency');  
                               $success_url='/Sa/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/laCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               $fourth_sign_url='/Register/laServiceInfo';
                               break;
                    /*法务服务机构end*/

                    /*财务服务机构*/
                    case '6':  $User=M('Financial_institution');  
                               $success_url='/Sa/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/fiCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               $fourth_sign_url='/Register/fiServiceInfo';
                               break;
                    /*财务服务机构end*/

                    /*众创空间*/
                    case '7':  $User=M('Business_incubator');  
                               $success_url='/Sa/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/biCompanyInfo';
                               $third_sign_url='/Register/membersInfo';
                               $fourth_sign_url='/Register/biServiceInfo';
                               break;
                    /*众创空间end*/

                    /*其它机构*/
                    case '8':  $User=M('Other_institution');  
                               $success_url='/Other/individualProfile'; 
                               $first_sign_url='/Register/personalInfo';
                               $second_sign_url='/Register/otherInstitutionInfo';
                               $third_sign_url='/Register/membersInfo';
                               break;
                    /*其它机构*/

                    /*个人*/
                    case '9':  $User=M('User');  
                               $success_url='/Individual/individualProfile'; 
                               break;
                            
                    default:break;
                }

                $data['id']=session('user_id');
                $data['reg_step']=4;
                if(session('institution_type')==3||session('institution_type')==8||session('institution_type')==9){
                    $data['state']=200;
                }
                
                $User->save($data);

                if(session('institution_type')==3||session('institution_type')==8||session('institution_type')==9){
                    $this->success('Success！保存成功，完成注册',__APP__.'/Home'.$success_url);
                }else{
                    $this->success('Success！保存成功，请继续添加其它信息',__APP__.'/Home'.$fourth_sign_url);
                }
                    
            }else{
                $this->error($Business_experience->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }      

    //lp基金信息
    public function lpFundsInfo(){
      $Lp_fund_product=M('Lp_fund_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $funds=$Lp_fund_product->where($where)->select();

      $Investment_project=M('Investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));
      $this->display();
    }

    //保存lp基金，并再添加
    public function add_lpFundsInfo(){
        $Lp_fund_product=M('Lp_fund_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['registered_address']=I('post.registered_address');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['fund_size']=I('post.fund_size');
        switch(I('post.fund_property')){
            case 1: $data['is_government_guidance']=1; break;
            case 2: $data['is_private_capital']=1; break;
            case 3: $data['is_state_owned']=1; break;
        }

        foreach(I('post.fund_type') as $value){
            $data[$value]=1;
        }

        $data['trustee_name']=I('post.trustee_name');
        $data['investment_field']=I('post.investment_field');
        $data['is_recruitment_period']=I('post.is_recruitment_period');

        $data['is_recorded']=I('post.is_recorded');
        $data['fund_number']=I('post.fund_number');
        $data['recorded_time']=strtotime(I('post.recorded_time'));

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10145728 ;// 设置附件上传大小,10M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/lp_recruitment/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/lp_recruitment', 0777 ,1);


        if($Lp_fund_product->create($data)){
            //保存个人基本信息
            $fund_id=$Lp_fund_product->add();

            if($fund_id){
                /*上传募集方案*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $fund_id.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $Lp_fund_product->where('id='.$fund_id)->setField('recruitment_plan_url',$info['savename']);
                         }
                     }
                }
            }


            $where['fund_id']=$fund_id;

            //保存已投项目/基金
            $Investment_project=M('Investment_project');
            // 批量添加数据
            $investment_projects=I('post.investment_project');
            for($i=0;$i<count($investment_projects['project_name']);$i++){
                $dataList[] = array('fund_id'=>(int)$fund_id,'project_name'=>$investment_projects['project_name'][$i],'project_abstract'=>$investment_projects['project_abstract'][$i],'investment_quota'=>$investment_projects['investment_quota'][$i],'investment_round'=>$investment_projects['investment_round'][$i],'investment_time'=>strtotime($investment_projects['investment_time'][$i]),'project_state_type'=>$investment_projects['project_state_type'][$i]);
            }

            $result=$Investment_project->addAll($dataList);

            if($result){
                $this->success('Success！保存成功，请继续添加其它基金产品信息',__APP__.'/Home/Register/lpFundsInfo');
            }else{
                $this->error($Investment_project->getError());
            }
        }
        else{
            $this->error($Lp_fund_product->getError());
        }
    }

    //保存lp基金，完成注册
    public function save_lpFundsInfo(){
        $Lp_fund_product=M('Lp_fund_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['registered_address']=I('post.registered_address');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['fund_size']=I('post.fund_size');
        switch(I('post.fund_property')){
            case 1: $data['is_government_guidance']=1; break;
            case 2: $data['is_private_capital']=1; break;
            case 3: $data['is_state_owned']=1; break;
        }

        foreach(I('post.fund_type') as $value){
            $data[$value]=1;
        }

        $data['trustee_name']=I('post.trustee_name');
        $data['investment_field']=I('post.investment_field');
        $data['is_recruitment_period']=I('post.is_recruitment_period');

        $data['is_recorded']=I('post.is_recorded');
        $data['fund_number']=I('post.fund_number');
        $data['recorded_time']=strtotime(I('post.recorded_time'));

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10145728 ;// 设置附件上传大小,10M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/lp_recruitment/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/lp_recruitment', 0777 ,1);


        if($Lp_fund_product->create($data)){
            //保存个人基本信息
            $fund_id=$Lp_fund_product->add();

            if($fund_id){
                /*上传募集方案*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $fund_id.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $Lp_fund_product->where('id='.$fund_id)->setField('recruitment_plan_url',$info['savename']);
                         }
                     }
                }
            }


            $where['fund_id']=$fund_id;

            //保存已投项目/基金
            $Investment_project=M('Investment_project');
            // 批量添加数据
            $investment_projects=I('post.investment_project');
            for($i=0;$i<count($investment_projects['project_name']);$i++){
                $dataList[] = array('fund_id'=>(int)$fund_id,'project_name'=>$investment_projects['project_name'][$i],'project_abstract'=>$investment_projects['project_abstract'][$i],'investment_quota'=>$investment_projects['investment_quota'][$i],'investment_round'=>$investment_projects['investment_round'][$i],'investment_time'=>strtotime($investment_projects['investment_time'][$i]),'project_state_type'=>$investment_projects['project_state_type'][$i]);
            }

            $result=$Investment_project->addAll($dataList);

            if($result){
                //设置账号为完成注册
                $User=M('Lp');
                $data=array();
                $data['id']=session('user_id');
                $data['reg_step']=5;
                $data['state']=200;
                $User->save($data);
                $this->success('Success！保存成功，恭喜完成注册',__APP__.'/Home/Lp/individualProfile');
            }else{
                $this->error($Investment_project->getError());
            }
        }
        else{
            $this->error($Lp_fund_product->getError());
        }
    }


    public function membersInfo(){
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);
      $this->display();
    }

    //gp公司信息
    public function gpCompanyInfo(){
        $this->display();
        die();
    }

        //储存lp公司信息
    public function save_gpCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Gp');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['organization_code']=I('post.organization_code');
        $data['is_fofs_member']=I('post.is_fofs_member');
        $data['registered_addr']=I('post.registered_addr');
        $data['office_addr']=I('post.office_addr');
        $data['registered_capital']=I('post.registered_capital');
        $data['contributed_capital']=I('post.contributed_capital');
        switch (I('post.fund_type')) {
          case '0':
            $data['is_securities_fund']=1;
            break;
          
          case '1':
            $data['is_stock_fund']=1;
            break;

          case '2':
            $data['is_startup_fund']=1;
            break;

           case '3':
            $data['is_other_fund']=1;
            break;
        }
        $data['number_of_employees']=I('post.number_of_employees');
        $data['contact_username']=I('post.contact_username');
        $data['contact_fax']=I('post.contact_fax');
        $data['contact_phone']=I('post.contact_phone');
        $data['contact_email']=I('post.contact_email');
        $data['contact_institution_wechat']=I('post.contact_institution_wechat');
        $data['contact_institution_web']=I('post.contact_institution_web');
        $data['is_association_registration']=I('post.is_association_registration');
        $data['association_registration_number']=I('post.association_registration_number');
        $data['association_registration_time']=strtotime(I('post.association_registration_time'));

        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/gp_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/gp_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                         }
                     }
                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

    //gp基金信息
    public function gpFundsInfo(){
      $Lp_fund_product=M('Gp_fund_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $funds=$Lp_fund_product->where($where)->select();

      $Investment_project=M('Gp_investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));
      $this->display();
    }


    //保存gp基金，并再添加
    public function add_gpFundsInfo(){
        $Lp_fund_product=M('Gp_fund_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['registered_address']=I('post.registered_address');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['fund_size']=I('post.fund_size');
        switch(I('post.fund_property')){
            case 1: $data['is_angel_investment']=1; break;
            case 2: $data['is_vc_investment']=1; break;
            case 3: $data['is_pe_investment']=1; break;
            case 4: $data['is_other_investment']=1; break;
        }


        $data['trustee_name']=I('post.trustee_name');
        $data['investment_field']=I('post.investment_field');
        $data['investment_region']=I('post.investment_region');

        $data['is_recruitment_period']=I('post.is_recruitment_period');

        $data['is_recorded']=I('post.is_recorded');
        $data['fund_number']=I('post.fund_number');
        $data['recorded_time']=strtotime(I('post.recorded_time'));

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10145728 ;// 设置附件上传大小,10M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/gp_recruitment/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/gp_recruitment', 0777 ,1);


        if($Lp_fund_product->create($data)){
            //保存个人基本信息
            $fund_id=$Lp_fund_product->add();

            if($fund_id){
                /*上传募集方案*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $fund_id.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $Lp_fund_product->where('id='.$fund_id)->setField('recruitment_plan_url',$info['savename']);
                         }
                     }
                }
            }


            $where['fund_id']=$fund_id;

            //保存已投项目/基金
            $Investment_project=M('Gp_investment_project');
            // 批量添加数据
            $investment_projects=I('post.investment_project');
            for($i=0;$i<count($investment_projects['project_name']);$i++){
                $dataList[] = array('fund_id'=>(int)$fund_id,'project_name'=>$investment_projects['project_name'][$i],'project_abstract'=>$investment_projects['project_abstract'][$i],'investment_quota'=>$investment_projects['investment_quota'][$i],'investment_round'=>$investment_projects['investment_round'][$i],'investment_time'=>strtotime($investment_projects['investment_time'][$i]),'project_state_type'=>$investment_projects['project_state_type'][$i]);
            }

            $result=$Investment_project->addAll($dataList);

            if($result){
                $this->success('Success！保存成功，请继续添加其它基金产品信息',__APP__.'/Home/Register/gpFundsInfo');
            }else{
                $this->error($Investment_project->getError());
            }
        }
        else{
            $this->error($Lp_fund_product->getError());
        }
    }

    //保存gp基金，完成注册
    public function save_gpFundsInfo(){
        $Gp_fund_product=M('Gp_fund_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['registered_address']=I('post.registered_address');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['fund_size']=I('post.fund_size');
        switch(I('post.fund_property')){
            case 1: $data['is_angel_investment']=1; break;
            case 2: $data['is_vc_investment']=1; break;
            case 3: $data['is_pe_investment']=1; break;
            case 4: $data['is_other_investment']=1; break;
        }


        $data['trustee_name']=I('post.trustee_name');
        $data['investment_field']=I('post.investment_field');
        $data['investment_region']=I('post.investment_region');

        $data['is_recruitment_period']=I('post.is_recruitment_period');

        $data['is_recorded']=I('post.is_recorded');;
        $data['fund_number']=I('post.fund_number');
        $data['recorded_time']=strtotime(I('post.recorded_time'));

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10145728 ;// 设置附件上传大小,10M
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/gp_recruitment/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/gp_recruitment', 0777 ,1);


        if($Gp_fund_product->create($data)){
            //保存个人基本信息
            $fund_id=$Gp_fund_product->add();

            if($fund_id){
                /*上传募集方案*/
                foreach($_FILES as $key =>$file){
                     if(!empty($file['name'])) {
                        $upload->saveName  =   $fund_id.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                         // 上传单个文件 
                         $info   =   $upload->uploadOne($file);
                         if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                         }else{// 上传成功 获取上传文件信息
                            $Gp_fund_product->where('id='.$fund_id)->setField('recruitment_plan_url',$info['savename']);
                         }
                     }
                }
            }


            $where['fund_id']=$fund_id;

            //保存已投项目/基金
            $Investment_project=M('Gp_investment_project');
            // 批量添加数据
            $investment_projects=I('post.investment_project');
            for($i=0;$i<count($investment_projects['project_name']);$i++){
                $dataList[] = array('fund_id'=>(int)$fund_id,'project_name'=>$investment_projects['project_name'][$i],'project_abstract'=>$investment_projects['project_abstract'][$i],'investment_quota'=>$investment_projects['investment_quota'][$i],'investment_round'=>$investment_projects['investment_round'][$i],'investment_time'=>strtotime($investment_projects['investment_time'][$i]),'project_state_type'=>$investment_projects['project_state_type'][$i]);
            }

            $result=$Investment_project->addAll($dataList);

            if($result){
                //设置账号为完成注册
                $User=M('Gp');
                $data=array();
                $data['id']=session('user_id');
                $data['reg_step']=5;
                $data['state']=200;
                $User->save($data);
                $this->success('Success！保存成功，恭喜完成注册',__APP__.'/Home/Gp/individualProfile');
            }else{
                $this->error($Investment_project->getError());
            }
        }
        else{
            $this->error($Gp_fund_product->getError());
        }
    }

    //startup公司信息
    public function startupCompanyInfo(){
      $this->display();
    }

    //储存创业公司信息
    public function save_startupCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Startup_company');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_vision']=I('post.institution_vision');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['user_pain_points']=I('post.user_pain_points');
        $data['solutions']=I('post.solutions');
        $data['core_resources']=I('post.core_resources');
        $data['profit_model']=I('post.profit_model');
        $data['market_situation']=I('post.market_situation');
        $data['competitive_analysis']=I('post.competitive_analysis');
        $data['advantage_analysis']=I('post.advantage_analysis');
        $data['equity_structure']=I('post.equity_structure');
        $data['is_invested']=I('post.is_invested');
        $data['investment_round']=I('post.investment_round');
        $data['investment_quota']=I('post.investment_quota');
        $data['investor']=I('post.investor');
        $data['plan_investment_round']=I('post.plan_investment_round');
        $data['plan_invested_quota']=I('post.plan_invested_quota');
        $data['plan_transfer_shares']=I('post.plan_transfer_shares');
        $data['plan_to_do']=I('post.plan_to_do');
        $data['accept_joint_investment']=I('post.accept_joint_investment');

        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');
        $data['contact_wechat']=I('post.contact_wechat');
        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/startup_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/startup_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }else if($key=='bp_url'){
                        $upload->rootPath  =     './Public/uploads/startup_bp/'; // 设置附件上传根目录
                        if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('bp_url',$info['savename']);
                             }
                         }
                     }

                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

    //fa公司信息
    public function faCompanyInfo(){
      $this->display();
    }

    //保存fa公司信息
    public function save_faCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Fa');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['services_and_fees']=I('post.services_and_fees');
       
        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');

        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/fa_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/fa_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }
                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

    //fa公司信息
    public function faSuccessCase(){
      $Fa_successful_case=M('Fa_successful_case');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $successCases=$Fa_successful_case->where($where)->select();

      $this->assign('successCases',$successCases);
      $this->display();
    }

    //添加fa成功案例，并继续添加
    public function add_faSuccessCase(){
        $Fa_successful_case=M('Fa_successful_case');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['invested_company']=I('post.invested_company');
        $data['investor']=I('post.investor');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['investment_quota']=I('post.investment_quota');
        $data['investment_round']=I('post.investment_round');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['reg_time']=time();

        
        if($Fa_successful_case->create($data)){
            //保存个人基本信息
            $result=$Fa_successful_case->add();

           
            if($result){
                $this->success('Success！保存成功，继续添加其它成功案例');
            }else{
                $this->error($Fa_successful_case->getError());
            }
        }
        else{
            $this->error($Fa_successful_case->getError());
        }
    }

    //保存fa成功案例，完成注册
    public function save_faSuccessCase(){
        $Fa_successful_case=M('Fa_successful_case');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['invested_company']=I('post.invested_company');
        $data['investor']=I('post.investor');
        $data['currency_type_id']=I('post.currency_type_id');
        $data['investment_quota']=I('post.investment_quota');
        $data['investment_round']=I('post.investment_round');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['reg_time']=time();

        
        if($Fa_successful_case->create($data)){
            //保存个人基本信息
            $result=$Fa_successful_case->add();

           
            if($result){
                //设置账号为完成注册
                $User=M('Fa');
                $data=array();
                $data['id']=session('user_id');
                $data['reg_step']=5;
                $data['state']=200;
                $User->save($data);
                $this->success('Success！保存成功，恭喜完成注册',__APP__.'/Home/Sa/individualProfile');
            }else{
                $this->error($Fa_successful_case->getError());
            }
        }
        else{
            $this->error($Fa_successful_case->getError());
        }
    }

    //法务公司信息
    public function laCompanyInfo(){
        $this->display();
    }

    //保存法务公司信息
    public function save_laCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Legal_agency');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['service_area']=I('post.service_area');
       
        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');

        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/la_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/la_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }
                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

    //法务公司产品、服务信息
    public function laServiceInfo(){
      $Server_product=M('Server_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $services=$Server_product->where($where)->select();

      $this->assign('services',$services);

      $this->display();
    }

    //添加la产品/服务，并继续添加
    public function add_serviceInfo(){
        $Server_product=M('Server_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['content']=I('post.content');
        $data['price']=I('post.price');
        $data['reg_time']=time();

        
        if($Server_product->create($data)){
            //保存个人基本信息
            $result=$Server_product->add();

           
            if($result){
                $this->success('Success！保存成功，继续添加其它产品/服务');
            }else{
                $this->error($Server_product->getError());
            }
        }
        else{
            $this->error($Server_product->getError());
        }
    }

    //保存la产品/服务，完成注册
    public function save_serviceInfo(){
        $Server_product=M('Server_product');

        $data['institution_type']=session('institution_type');
        $data['institution_id']=session('user_id');
        $data['name']=I('post.name');
        $data['content']=I('post.content');
        $data['price']=I('post.price');
        $data['reg_time']=time();

        
        if($Server_product->create($data)){
            //保存个人基本信息
            $result=$Server_product->add();

           
            if($result){
                //设置账号为完成注册
                switch (session('institution_type')) {
                  case 4: 
                    $User=M('Fa');
                    break;
                  
                  case 5: 
                    $User=M('Legal_agency');
                    break;

                  case 6: 
                    $User=M('Financial_institution');
                    break;

                  case 7: 
                    $User=M('Business_incubator');
                    break;
                }
                $data=array();
                $data['id']=session('user_id');
                $data['reg_step']=5;
                $data['state']=200;
                $User->save($data);
                $this->success('Success！保存成功，恭喜完成注册',__APP__.'/Home/Sa/individualProfile');
            }else{
                $this->error($Server_product->getError());
            }
        }
        else{
            $this->error($Server_product->getError());
        }
    }

    //财务公司信息
    public function fiCompanyInfo(){
      $this->display();
    }

    //保存财务公司信息
    public function save_fiCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Financial_institution');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['service_area']=I('post.service_area');
       
        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');

        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/fi_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/fi_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }
                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

    //财务公司产品、服务信息
    public function fiServiceInfo(){
      $Server_product=M('Server_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $services=$Server_product->where($where)->select();

      $this->assign('services',$services);

      $this->display();
    }

    //众创空间信息
    public function biCompanyInfo(){
      $this->display();
    }

    //保存众创空间信息
    public function save_biCompanyInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Business_incubator');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['institution_abstract']=I('post.institution_abstract');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['service_area']=I('post.service_area');
       
        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');

        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/bi_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/bi_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }
                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }

    //众创空间产品、服务信息
    public function biServiceInfo(){
      $Server_product=M('Server_product');
      $where['institution_type']=session('institution_type');
      $where['institution_id']=session('user_id');
      $services=$Server_product->where($where)->select();

      $this->assign('services',$services);

      $this->display();
    }

    //其它机构公司信息
    public function otherInstitutionInfo(){
      $this->display();
    }

    //保存其它机构公司信息
    public function save_otherInstitutionInfo(){
        //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Other_institution');
        $data['institution_fullname_cn']=I('post.institution_fullname_cn');
        $data['institution_fullname_en']=I('post.institution_fullname_en');
        $data['founded_time']=strtotime(I('post.founded_time'));
        $data['founded_addr']=I('post.founded_addr');
        $data['profession']=I('post.profession');
        $data['institution_abstract']=I('post.institution_abstract');

        $data['contact_username']=I('post.contact_username');
        $data['contact_telephone']=I('post.contact_telephone');
        $data['contact_mobilephone']=I('post.contact_mobilephone');
        $data['contact_email']=I('post.contact_email');
  
        $data['company_wechat']=I('post.company_wechat');
        $data['company_web']=I('post.company_web');
       
        $data['id']=session('user_id');
        $data['reg_step']=3;

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','pdf','pptx','docx','ppt');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/other_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/other_pic', 0777 ,1);

        if($User->create($data)){

            $result=$User->save();
            if($result){
                /*上传头像*/
                foreach($_FILES as $key =>$file){
                     if($key=='institution_logo_img'){
                         if(!empty($file['name'])) {
                            $upload->saveName  =   $result.'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                             $info   =   $upload->uploadOne($file);
                             if(!$info) {// 上传错误提示错误信息
                                $this->error($upload->getError());
                             }else{// 上传成功 获取上传文件信息
                                $User->where('id='.$data['id'])->setField('institution_logo_img',$info['savename']);
                             }
                         }
                     }

                }

                $this->success('Success！保存成功，请继续管理团队信息',__APP__.'/Home/Register/membersInfo');
            }
            else{
                $this->error($User->getError());
            } 
        }
        else{
            $this->error($User->getError());
        }
    }
}