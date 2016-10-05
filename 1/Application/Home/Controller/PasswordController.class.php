<?php
namespace Home\Controller;
use Home\Controller;
class PasswordController extends BaseController {
    //邮件内容
    private function mailcontent($username,$link){
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
      <h2 class="modal-title">忘记密码邮件</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 忘记密码</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：忘记密码</h4>
      <div class="mailContent">
        <p>尊敬的<span class="name" id="name">'.$username.'</span>，您好<br/>您会收到这份邮件是由于selectedin.com收到找回登陆密码申请。如不是您本人行为，请忽略此邮件。如是您本人申请找回密码，请点击以下链接重置登录密码。</p>  
        <div class="row">  
          <div class="col-md-4">
            <a href="'.$link.'"><button type="button" class="btn btn-primary  btn-block">重置登录密码</button>
            </a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
      <p>如有任何问题，请与<a href="#">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
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
      <h2 class="modal-title">Forget Password</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| Forget Password</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>Subject: Forget Password</h4>
      <div class="mailContent">
        <p>Dear<span class="name" id="name">'.$username.'</span><br/>The reason why you received this email is that we got the request on resetting password in selectedin.com. If this request is not initiated from you, please ignore this email. Otherwise, please click the below link to reset the password for Login.</p>  
        <div class="row">
          <div class="col-md-4">
            <a href="'.$link.'"><button type="button" class="btn btn-primary  btn-block">Reset Password</button></a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="#">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
    </div>
  </div>
</body>
</html>';
                break;
        }
        return $content;
    }

	//忘记密码第一步
    public function first(){
        $this->display();
    }

    //发送邮件
    public function do_send_mail($type,$id,$state){
        $email=cookie('email');
        $title=session('lang')=='en'?"Selectin Forget Password":"Selectin 忘记密码";
        switch ($type) {
            case 1: //采购商
                $link=U('Home/Password/buyer_inf_confirm',array('user_id'=>$id,'state'=>$state),'',true);
                $User=M('Buyer');
            break;

            case 2: //供应商
                $link=U('Home/Password/supplier_inf_confirm',array('user_id'=>$id,'state'=>$state),'',true);
                $User=M('Supplier');
            break;

            default:
                $this->error('参数非法',__APP__.'/Home/Index');
            break;
        }

        $username=$User->getFieldByEmail($email,'username');
        $content=$this->mailcontent($username,$link);           //生产HTML邮件

        if(SUPPORTsendMail($email,$title,$content)) {
            cookie('type',null);
            cookie('type',$type);
            return 1;
        }
        else return 0;
    }

    //账户检索
    public function send_mail(){
        $data=I('post.');
        $type=null;
        switch ($data['userType']) {
            case 'buyer':   //采购商
                $User=M('Buyer');
                $type=1;
                break;

            case 'supplier':    //供应商
                $User=M('Supplier');
                $type=2;
                break;

            default:
                $this->error('参数非法',__APP__.'/Home/Index');
                break;
        }

        $res=$User->getbyEmail($data['email']); //获得用户

        if($res){
            $check=md5(time().$data['email']);  //创建验证码
            $state=substr($check,0,20);
            $User->state=$state;
            $new=$User->save();     //储存新验证码

            if($new!==false){
                cookie(null);
                cookie('email',$res['email']);
                $send=$this->do_send_mail($type,$res['id'],$state); //发送邮件
                if($send){
                    $this->redirect("second",0);
                }
                else $this->error('未知错误，请联系管理员');
            }
            else{
                $this->error($User->getError());
            }
        }
        else{
            $this->error('不存在的账户!',__APP__.'/Home/Index');
        }
    }

    //忘记密码第二步
    public function second(){
        $email=cookie('email');
        $this->assign('email',$email);

        $add=explode('@',$email);       //获取邮箱地址
        $link='http://mail.'.$add[1];  
        $this->assign('link',$link);

        $this->display();
    }

    //采购商验证
    public function buyer_inf_confirm(){
        $data=I('get.');
        if(empty($data)) $this->error('非法访问',__APP__.'/Home/Index');
        $User=M('Buyer');
        $res=$User->getbyId($data['user_id']);

        if($res){
            if($res['state']==1){
                $this->success('该用户已激活',__APP__."/Home/Index");
            }
            else if($res['state']==2){
                $this->error('该用户已停用',__APP__."/Home/Index");
            }
            else{
                if($res['state']==$data['state']){
                    $User->state='-1';
                    $save=$User->save();    //更新字段
                    if($save){
                        cookie(null);
                        cookie('user_id',$data['user_id']);
                        cookie('type',1);
                        $this->success('邮箱确认成功！请填写新密码',__APP__."/Home/Password/third");
                    }
                    else{
                        $this->error($User->getError());
                    }
                }
                else {
                    $check=md5(time().$email);  //创建验证码
                    $state=substr($check,0,20);
                    $save=$User->where('id='.$data['user_id'])->setField('state',$state);
                    if($save){
                        cookie(null);
                        cookie('email',$data['email']);
                        $this->do_send_mail(1,$data['user_id'],$state);
                        $this->error('邮箱验证有误！请重新验证',__APP__."/Home/Password/second");
                    }
                }
            }
        }
        else{
            $this->error('没有此用户',__APP__."/Home/Index");
        }
    }

    //供应商验证
    public function supplier_inf_confirm(){
        $data=I('get.');
        if(empty($data)) $this->error('非法访问',__APP__.'/Home/Index');
        $User=M('Supplier');
        $res=$User->getbyId($data['user_id']);

        if($res){
            if($res['state']==1){
                $this->success('该用户已激活',__APP__."/Home/Index");
            }
            else if($res['state']==2){
                $this->error('该用户已停用',__APP__."/Home/Index");
            }
            else{
                if($res['state']==$data['state']){
                    $User->state='-1';
                    $save=$User->save();    //更新字段
                    if($save){
                        cookie(null);
                        cookie('user_id',$data['user_id']);
                        cookie('type',2);
                        $this->success('邮箱确认成功！请填写新密码',__APP__."/Home/Password/third");
                    }
                    else{
                        $this->error($User->getError());
                    }
                }
                else {
                    $check=md5(time().$email);  //创建验证码
                    $state=substr($check,0,20);
                    $save=$User->where('id='.$data['user_id'])->setField('state',$state);
                    if($save){
                        cookie(null);
                        cookie('email',$data['email']);
                        $this->do_send_mail(2,$data['user_id'],$state);
                        $this->error('邮箱验证有误！请重新验证',__APP__."/Home/Password/second");
                    }
                }
            }
        }
        else{
            $this->error('没有此用户',__APP__."/Home/Index");
        }
    }

    //忘记密码第三步
    public function third(){
        $id=cookie('user_id');
        $type=cookie('type');
        switch ($type) {
            case 1: //采购商
                $User=M('Buyer');
                break;
            
            case 2: //供应商
                $User=M('Supplier');
                break;
            default:
                $this->error('参数非法',__APP__.'/Home/Index');
                break;
        }

        $res=$User->getbyId($id);   //获取用户

        if($res['state']=='-1'){
            $this->assign('id',$id);
            $this->assign('type',$type);
            $this->display();
        }
        else{
            $this->error('非法访问',__APP__.'/Home/Index');
        }
    }

    //保存修改
    public function save_change(){
        $data=I('post.');

        if(!$data['password']||!$data['passwordTwice'])
            $this->error('填写信息不完整');

        if(md5($data['password'])!=md5($data['passwordTwice']))
            $this->error('两次密码不一致!');
        else{
            switch ($data['type']) {
                case 1: //采购商
                    $User=M('Buyer');
                    break;
                
                case 2: //供应商
                    $User=M('Supplier');
                    break;
                default:
                    $this->error('参数非法',__APP__.'/Home/Index');
                    break;
            }

            $res=$User->getbyId($data['id']);   //获取用户

            if($res['state']=="-1"){
                $User->password=md5($data['password']);
                $User->state=1;
                $save=$User->save();
                if($save){
                    cookie(null);
                    $this->success('密码修改成功，请使用新密码登陆',__APP__.'/Home/Index');
                }
                else{
                    $this->error($User->getError());
                }
            }
            else{
                $this->error('非法访问',__APP__.'/Home/Index');
            }
        }
    }
}