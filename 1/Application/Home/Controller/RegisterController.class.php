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
        $institution_type=cookie('institution_type');
        $data['email']=cookie('email');
        $data['institution_type']=cookie('institution_type');
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


                    default:break;
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
                    if($code=='23000')  $this->error('该用户已存在');
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
                $res=$User->where('id='.$data['user_id'])->setField('reg_step',2);
                $res=$User->where('id='.$data['user_id'])->setField('reg_time',time());

                if($res){
                    cookie(null);
                    cookie('user_id',$data['user_id']);
                    cookie('institution_type',$data['institution_type']);
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
                                $User->where('id='.$data['id'])->setField('face_url',$info['savename']);
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
        $this->display();
        die();
        $User=M('Supplier');
        $id=cookie('user_id');
        if(!$id) $this->error('非法访问',__APP__."/Home/Index/");

        $state=$User->where('id='.$id)->getField('state');
        $supplier_company_id=$User->where('id='.$id)->getField('supplier_company_id');

        if($supplier_company_id) $this->error('已填写公司信息！',__APP__."/Home/Index/");
        
        if($state=='1'){
            $Year=date('Y');        //获取年份
            $this->assign('year',$Year);

            $Industry=M('Industry_cate');   //行业
            $Ind_list=$Industry->select();
            if(session('lang')=='en') $Ind_list=zh_to_en($Ind_list);
            $this->assign('ind_list',$Ind_list);

            $Cate=M('Company_cate');    //公司类型
            $Cate=$Cate->select();
            if(session('lang')=='en') $Cate=zh_to_en($Cate);
            $this->assign('cate',$Cate);

            $Stock=M('Stock_market');     //上市地点
            $Sto_list=$Stock->select();
            if(session('lang')=='en') $Sto_list=zh_to_en($Sto_list);
            $this->assign('sto_list',$Sto_list);

            $Cur_type=M('Currency_type');     //货币类型
            $Cur_type_list=$Cur_type->select();
            if(session('lang')=='en') $Cur_type_list=zh_to_en($Cur_type_list);
            $this->assign('cur_list',$Cur_type_list);

            $Unit=M('Unit');     //单位
            $Unit_list=$Unit->select();
            if(session('lang')=='en') $Unit_list=zh_to_en($Unit_list);
            $this->assign('uni_list',$Unit_list);

            $Process_First=M('Processing_technic_first');    //加工工艺一级
            $Process_First_list=$Process_First->select();
            if(session('lang')=='en') $Process_First_list=zh_to_en($Process_First_list);
            $this->assign('pro1_list',$Process_First_list);

            $Process_Second=M('Processing_technic_second');    //加工工艺二级
            $Process_Second_list=$Process_Second->select();
            if(session('lang')=='en') $Process_Second_list=zh_to_en($Process_Second_list);
            $this->assign('pro2_list',$Process_Second_list);

            $Process_Third=M('Processing_technic_third');    //加工工艺三级
            $Process_Third_list=$Process_Third->select();
            if(session('lang')=='en') $Process_Third_list=zh_to_en($Process_Third_list);
            $this->assign('pro3_list',$Process_Third_list);

            $Country=M('Country_code');     //国家
            $Cou_list=$Country->select();
            if(session('lang')=='en') $Cou_list=zh_to_en($Cou_list);
            $this->assign('cou_list',$Cou_list);

            $Province=M('Province_code');   //省份
            $Pro_list=$Province->select();
            if(session('lang')=='en') $Pro_list=zh_to_en($Pro_list);
            $this->assign('pro_list',$Pro_list);

            $Area=M('Area_partition');  //区域
            $area_list=$Area->select();
            if(session('lang')=='en') $area_list=zh_to_en($area_list);
            $this->assign('are_list',$area_list);

            $Ability=M('Ability_question'); //信息能力及回答
            $Ability_Ans=M('Ability_question_choice');
            $Ability_list=$Ability->select();
            if(session('lang')=='en') $Ability_list=zh_to_en($Ability_list,'question','question_en');
            foreach ($Ability_list as $key => $value) {
                $Ability_list[$key]['answer']=$Ability_Ans->where('question_id='.$value['id'])->select();
                if(session('lang')=='en') $Ability_list[$key]['answer']=zh_to_en($Ability_list[$key]['answer'],'content','content_en');
            }
            $this->assign('abi_list',$Ability_list);

            $Compliance=M('Business_compliance'); //业务合规
            $Compliance_Ans=M('Business_compliance_question_choice');
            $Compliance_list=$Compliance->select();
            if(session('lang')=='en') $Compliance_list=zh_to_en($Compliance_list,'question','question_en');
            foreach ($Compliance_list as $key => $value) {
                $Compliance_list[$key]['answer']=$Compliance_Ans->where('question_id='.$value['id'])->select();
                if(session('lang')=='en') $Compliance_list[$key]['answer']=zh_to_en($Compliance_list[$key]['answer'],'content','content_en');
            }
            $this->assign('com_list',$Compliance_list);

            $System=M('System_criteria');  //体系认证标准
            $System_list=$System->select();
            $this->assign('sys_list',$System_list);

            $Body=M('Certification_body');  //认证机构
            $Body_list=$Body->select();
            $this->assign('bod_list',$Body_list);

            $this->assign('id',$id);
            $this->display();
        }
        else $this->error('非法访问',__APP__."/Home/Index/");
    }

    public function upload(){
      $this->display();
    }

    //个人信息
    public function personalInfo(){
        $this->display();
        die();
        $Supplier=M('Supplier');
        $id=cookie('user_id');
        if(!$id)    $this->error('非法访问',__APP__."/Home/Index/");

        $data=$Supplier->find($id);

        if($data['state']=='1'){
            $Function=M('Function');   //行业
            $Fun_list=$Function->select();
            $this->assign('fun_list',$Fun_list);

            $Country=M('Country_code');     //国家
            $Cou_list=$Country->select();
            $this->assign('cou_list',$Cou_list);

            $Province=M('Province_code');   //省份
            $Pro_list=$Province->select();
            $this->assign('pro_list',$Pro_list);

            $Recommand=M('Recommended_channel'); //推荐渠道
            $Rec_list=$Recommand->select();
            $this->assign('rec_list',$Rec_list);

            $this->assign('data',$data);
            $this->display();
        }
        else $this->error('非法访问',__APP__."/Home/Index/");
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

    

    public function lpFundsInfo(){
      $this->display();
    }


    public function membersInfo(){
      $this->display();
    }

    //gp公司信息
    public function gpCompanyInfo(){
        $this->display();
        die();
    }

    //gp基金信息
    public function gpFundsInfo(){
      $this->display();
    }

    //startup公司信息
    public function startupCompanyInfo(){
      $this->display();
    }

    //fa公司信息
    public function faCompanyInfo(){
      $this->display();
    }

    //fa公司信息
    public function faSuccessCase(){
      $this->display();
    }

    //法务公司信息
    public function laCompanyInfo(){
      $this->display();
    }

    //法务公司产品、服务信息
    public function laServiceInfo(){
      $this->display();
    }

    //财务公司信息
    public function fiCompanyInfo(){
      $this->display();
    }

    //财务公司产品、服务信息
    public function fiServiceInfo(){
      $this->display();
    }

    //众创空间信息
    public function biCompanyInfo(){
      $this->display();
    }

    //众创空间产品、服务信息
    public function biServiceInfo(){
      $this->display();
    }

    //其它机构公司信息
    public function otherInstitutionInfo(){
      $this->display();
    }
}