<?php
namespace Home\Controller;
use Home\Controller;
class RegisterController extends BaseController{
    public function _initialize() {
        parent::_initialize();
        $pgtype=cookie('think_language')=='zh-CN'?'zh-cn':cookie('think_language');
        $this->assign('pgtype',$pgtype);
    }

    protected function DeleteRegisteredInfo($supid){
        $Company1=M('Supplier_company');
        $Company2=M('Staffs_number');
        $Company3=M('Company_processing_technic_second');
        $Company4=M('Company_processing_technic_third');
        $Company5=M('Company_production_facility');
        $Company6=M('Company_detection_device');
        $Company7=M('Turnover');
        $Company8=M('Customers_distribution');
        $Company9=M('Market_distribution');
        $Company10=M('Representative_product');
        $Company11=M('System_authentication_item');
        $Company12=M('Product_authentication_item');
        $Company13=M('Company_ability_question_choice');
        $Company14=M('Company_business_compliance');

        $Company1->delete($supid);
        for($i=2;$i<=14;$i++){
          $string='Company'.$i;
          $$string->where('supplier_company_id='.$supid)->delete();
        }
    }

    //采购商邮件确认内容
    public function buyermailcontent($link){
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>感谢您注册Selectedin, 我们很荣幸能够帮助您快速发掘合适的潜在供应商。</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$link.'" class="btn btn-primary  btn-block">核实您的邮箱地址</a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
      <p>如有任何问题，请与<a href="Mailto:support@selectedin.com">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>Thank you for signing up Selectedin, we are pleased to enable you to discover your right suppliers at simply manner.</p>  
        <div class="row">
          <div class="col-md-4">
            <a href="'.$link.'" class="btn btn-primary  btn-block">Verify your email address</a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:support@selectedin.com">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
    </div>
  </div>
</body>
</html>';
                break;
        }
        return $content;
    }

    //供应商邮件确认内容
    private function suppliermailcontent($link){
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>感谢您注册Selectedin, 我们很荣幸能够帮助您快速匹配合适的销售线索。</p>  
        <div class="row">
          <div class="col-md-4">
            <a href="'.$link.'" class="btn btn-primary  btn-block">核实您的邮箱地址</a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>如有任何问题，请与<a href="Mailto:support@selectedin.com">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>Thank you for signing up Selectedin, we are pleased to help you to be matched with qualified sales lead.</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$link.'" class="btn btn-primary  btn-block">Verify your email address</a>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:support@selectedin.com">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
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
    public function do_send_mail($type,$id,$state){
        $email=cookie('email');
        $title=session('lang')=='en'?"Selectin Verify":"Selectin 验证邮件";
        switch ($type) {
            case 1: //采购商
                $link=U('Home/Register/buyer_inf_confirm',array('user_id'=>$id,'state'=>$state),'',true);
                $content=$this->buyermailcontent($link);
            break;

            case 2: //供应商
                $link=U('Home/Register/supplier_inf_confirm',array('user_id'=>$id,'state'=>$state),'',true);
                $content=$this->suppliermailcontent($link);
            break;

            default:
                $this->error('参数非法',__APP__.'/Home/Index');
            break;
        }

        if(SUPPORTsendMail($email,$title,$content)) {
            cookie('type',null);
            cookie('type',$type);
            return 1;
        }
        else return 0;
    }

    //重新发送
    public function resend_email(){
        $type=cookie('type');
        $data['email']=cookie('email');
        switch ($type) {
            case 1:   $User=M('Buyer'); //采购商
                break;
            case 2:   $User=M('Supplier');  //供应商
                break;
            default:  $this->error('参数非法',__APP__.'/Home/Index');
                break;
        }
        $id=$User->where($data)->getField('id');

        $check=md5(time().$data['email']);  //创建验证码
        $state=substr($check,0,20);
        $res=$User->where($data)->setField('state',$state);

        if($res){
            $this->do_send_mail($type,$id,$state);
            $this->redirect(__APP__.'/Home/Register/emailCheck',0);
        }
        else $this->error($User->getError());
    }

    //信息入库
    public function send_mail(){
        $data=I('post.');

        $Code=M('Referral_code');         //验证推荐码
        $key=$Code->getbyCode($data['code']);
        if(!empty($key)){
          if($key['effective_degree']>0)  $Code->where($key)->setDec('effective_degree');
          else $this->error('推荐码无效');
        }else{
          $this->error('推荐码无效');
        }

        if(!$data['email']||!$data['password']||!$data['passwordTwice'])
            $this->error('填写信息不完整');
        if($data['accepted']!='on')
            $this->error('请阅读并同意用户协议','termOfUse');

        if(md5($data['password'])!=md5($data['passwordTwice']))
            $this->error('两次密码不一致!');
        else{
            switch ($data['userType']) {
            /*采购商*/
            case 'buyer':           
                $User=D('Buyer');

                $check=md5(time().$data['email']);  //创建验证码
                $data['state']=substr($check,0,20);
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
                        if($this->do_send_mail(1,$res,$data['state']))
                            $this->redirect('emailCheck');
                        else $this->error('邮件发送错误!');
                    }
                }
                else $this->error($User->getError());
                
            break;
            /*采购商end*/


            /*供应商*/
            case 'supplier':
                $Supplier=D('Supplier');

                $check=md5(time().$data['email']);  //创建验证码
                $data['state']=substr($check,0,20);
                $data['password']=md5($data['password']);

                if($Supplier->create($data)){
                    try{
                        $res=$Supplier->add();
                    }catch(\Exception $e){      //错误处理
                        $code=$e->getCode();
                        if($code=='23000')  $this->error('该用户已存在');
                    }
                    if($res){
                        cookie(null);
                        cookie('email',$data['email']);
                        if($this->do_send_mail(2,$res,$data['state']))
                            $this->redirect('emailCheck',0);
                        else $this->error('邮件发送错误!');
                    }
                }
                else $this->error($Supplier->getError());
            break;
            /*供应商end*/

            default:break;
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

    //采购商邮件信息确认
    public function buyer_inf_confirm(){
        $User=M('Buyer');
        $data=I('get.');
        
        if(!$data)  $this->error('非法访问',__APP__."/Home/Index/");

        $state=$User->where('id='.$data['user_id'])->getField('state');
        $email=$User->where('id='.$data['user_id'])->getField('email');

        if($state=='1'){
            $this->success('该用户已激活',__APP__."/Home/Index");
        }
        else if($state=='2'){
            $this->error('该用户已停用',__APP__."/Home/Index");
        }
        else{
            if($state==$data['state']){
                $res=$User->where('id='.$data['user_id'])->setField('state',1);
                if($res){
                    cookie(null);
                    cookie('user_id',$data['user_id']);
                    $this->success('邮箱确认成功！请继续填写相关信息',__APP__.'/Home/Register/buyerPersonalInfo');
                }
                else $this->error($User->getError());
                
            }
            else {
                $check=md5(time().$email);  //创建验证码
                $state=substr($check,0,20);
                $res=$User->where('id='.$data['user_id'])->setField('state',$state);
                if($res){
                    cookie(null);
                    cookie('email',$data['email']);
                    $this->do_send_mail(1,$data['user_id'],$state);
                    $this->error('邮箱验证有误！请重新验证',__APP__."/Home/Register/emailCheck");
                }
            }
        }
    }


    //采购商个人信息
    public function buyerPersonalInfo(){

        $User=M('Buyer');
        $id=cookie('user_id');
        if(!$id) $this->error('非法访问',__APP__."/Home/Index/");

        $data=$User->find($id);

        if($data['state']=='1'){
            $Function=M('Function');   //行业
            $Fun_list=$Function->select();
            if(session('lang')=='en') $Fun_list=zh_to_en($Fun_list);
            $this->assign('fun_list',$Fun_list);

            $Country=M('Country_code');     //国家
            $Cou_list=$Country->select();
            if(session('lang')=='en') $Cou_list=zh_to_en($Cou_list);
            $this->assign('cou_list',$Cou_list);

            $Province=M('Province_code');   //省份
            $Pro_list=$Province->select();
            if(session('lang')=='en') $Pro_list=zh_to_en($Pro_list);
            $this->assign('pro_list',$Pro_list);

            $Recommand=M('Recommended_channel'); //推荐渠道
            $Rec_list=$Recommand->select();
            if(session('lang')=='en') $Rec_list=zh_to_en($Rec_list,'channel','channel_en');
            $this->assign('rec_list',$Rec_list);

            $this->assign('data',$data);
            $this->display();
        }
        else $this->error('非法访问',__APP__."/Home/Index/");
    }

    //储存个人信息
    public function save_buyerPersonalInfo(){
      //电话与传真的区域代码为用户自行输入，非区域ID
        $User=M('Buyer');
        $data=I('post.');

        //处理英文注册
        if($data['firstname']==NULL) $data['firstname']=$data['firstname_en'];
        if($data['lastname']==NULL) $data['lastname']=$data['lastname_en'];
        if($data['title']==NULL) $data['title']=$data['title_en'];

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/buyer_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/buyer_pic', 0777 ,1);

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
                $this->buyer_finishedemail($email,$data['username']);     //发送成功邮件

                $this->success('Success！请继续完善企业信息','buyerCompanyInfo');
            }
            else $this->error($User->getError());
        }
        else{
            $this->error($User->getError());
        }
    }

    //供应商邮件信息确认
    public function supplier_inf_confirm(){
        $Supplier=M('Supplier');
        $data=I('get.');
        
        if(!$data)  $this->error('非法访问',__APP__."/Home/Index/");

        $state=$Supplier->where('id='.$data['user_id'])->getField('state');
        $email=$Supplier->where('id='.$data['user_id'])->getField('email');
        if($state=='1'){
            $this->success('该用户已激活',__APP__."/Home/Index");
        }
        else if($state==2){
            $this->error('该用户已停用',__APP__."/Home/Index");
        }
        else{
            if($state==$data['state']){
                $res=$Supplier->where('id='.$data['user_id'])->setField('state',1);
                if($res){
                    cookie(null);
                    cookie('user_id',$data['user_id']);
                    $this->success('邮箱确认成功！请继续填写相关信息',__APP__.'/Home/Register/supplierPersonalInfo');
                }
                else $this->error($Supplier->getError());
                
            }
            else {
                $check=md5(time().$email);  //创建验证码
                $state=substr($check,0,20);
                $res=$Supplier->where('id='.$data['user_id'])->setField('state',$state);
                if($res){
                    $this->do_send_mail(2,$data['user_id'],$state);
                    cookie(null);
                    cookie('email',$email);
                    $this->error('邮箱验证有误！请重新验证',__APP__."/Home/Register/emailCheck");
                }
                
            }
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

    public function uploadtest(){

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('pdf','jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/supplier_company/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;
        $com_id='4';
        $upload->saveName  = array('uniqid',$com_id.'_');
                        $info   =   $upload->upload();
                        if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                        }else{// 上传成功 保存上传文件信息

                            echo '上传后<pre>';var_dump($info); echo '</pre>';

                          
                        }
                    //}
                //}
    }

    //储存供应商公司信息
    public function save_supplierCompanyInfo(){
        $temp=I('post.');       //获取数据
        $files=array('logo'=>$_FILES['logo'],
                     'introduction_pdf'=>$_FILES['introduction_pdf'],
                     'introduction_en_pdf'=>$_FILES['introduction_pdf_en']);         //获取公司相关文件
        $certification_files=$_FILES['certificate_pdf'];     //获取证书认证文件
        $Year=date('Y');        //获取日期

        foreach ($temp as $item => $value) {        //分离数据
            $$item=$value;
        }

        $base['creator_id']=$user_id;
        $base['established_time']=strtotime($base['established_time']);

        //处理英文注册
        if($base['name']==NULL) $base['name']=$base['name_en'];
        if($base['address']==NULL) $base['address']=$base['address_en'];
        if($base['city']==NULL) $base['city']=$base['city_en'];

        //首先判断证书验证
        foreach($certification['check'] as $val=>$value){
            if($value == 'false')  $this->error('请先验证产品认证');
        }

        /////////////上传文件模块
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('pdf','jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/uploads/supplier_company/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;

        if(!file_exists($upload->rootPath))
            mkdir('Public/uploads/supplier_company/', 0777 ,1);

        ////////////end

        /****************公司信息入库**************************/
        $Company_base=M('Supplier_company');

         //判断公司名
        switch (cookie('think_language')) {
          case 'zh-cn':case 'zh-CN':
            $where['name']=$base['name'];
            $exist=$Company_base->where($where)->find();
            break;
          
          case 'en-us':
            $where['name_en']=$base['name_en'];
            $exist=$Company_base->where($where)->find();
            break;
        }
        
        if($exist) $this->error('公司已存在!');

        if($Company_base->create($base)){
            $com_id=$Company_base->add();
            if(!$com_id){
                $this->error('公司基本信息储存失败，请检查');
            }
        }
        else{
            $this->error($Company_base->getError());
        }
        /****************公司信息入库end***********************/

        /****************员工人数入库**************************/
        $Company_staffs=D('Staffs_number');

        foreach ($number as $key=>$val) {     //添加公司ID
            $number[$key]['supplier_company_id']=$com_id;
            $number[$key]['year']=$Year-2+$key;
        }

        if($Company_staffs->create($number)){
            $res=$Company_staffs->addAll($number);
            if(!$res){
                $this->DeleteRegisteredInfo($com_id);
                $this->error('公司员工信息储存失败，请检查');
            }
        }
        else{
            $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_staffs->getError());
        }
        /****************员工人数入库end***********************/

        /****************制造能力二级入库**************************/
        $Company_second=D('Company_processing_technic_second');

        $new_ability=array();       //整理数据,转置数组
        foreach($ability as $val=>$value){
            foreach($value as $k=>$v){
                if($val!='technic_third_id'){
                   $new_ability[$k][$val] = $v;
                   $new_ability[$k]['supplier_company_id'] = $com_id;
               }
            }
        }

        if($Company_second->create($new_ability)){  //入库
            $res=$Company_second->addAll($new_ability);
            if(!$res){
                $this->DeleteRegisteredInfo($com_id);
                $this->error('公司制造能力储存失败，请检查'); 
            }
        }
        else{
            $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_second->getError());     
        }
        /****************制造能力二级入库end***********************/

        /****************制造能力三级入库**************************/
        $Company_third=D('Company_processing_technic_third');

        $new_third=array();       //整理数据
        foreach($ability['technic_third_id'] as $k => $value){
            foreach($value as $i => $val){
                foreach ($new_ability as $key) {
                    if($key['technic_second_id']==$k){
                        if($val){
                            $new_third[]=array('supplier_company_id'=>$com_id,
                                            'technic_first_id'=>$key['technic_first_id'],
                                            'technic_second_id'=>$key['technic_second_id'],
                                            'technic_third_id'=>$val);
                        }
                    }
                }
            }
        }

        if(!empty($new_third)){
            if($Company_third->create($new_third)){
                try{
                    $res=$Company_third->addAll($new_third);
                }catch(\Exception $e){      //错误处理
                    $code=$e->getCode();
                    if($code=='23000')  $this->error('请选择正确的制造能力分类!');
                }
                if(!$res){
                    $this->DeleteRegisteredInfo($com_id);
                    $this->error('公司三级制造能力储存失败，请检查'); 
                }
            }
            else{
                $this->DeleteRegisteredInfo($com_id);
                $this->error($Company_third->getError());     
            }
        }
        /****************制造能力三级入库end***********************/

        /****************生产设备入库**************************/
        $Company_production=D('Company_production_facility');

        $new_production=array();       //整理数据,转置数组
        foreach($production as $val=>$value){
            foreach($value as $k=>$v){
                $new_production[$k][$val] = $v;
                $new_production[$k]['supplier_company_id'] = $com_id;
                //处理英文注册
                if($new_production[$k]['name']==NULL) $new_production[$k]['name']=$new_production[$k]['name_en'];
            }
        }

        if($Company_production->create($new_production)){  //入库
            $res=$Company_production->addAll($new_production);
            if(!$res){
                $this->DeleteRegisteredInfo($com_id);
                $this->error('公司生产设备储存失败，请检查'); 
            }
        }
        else{
            $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_production->getError());     
        }
        /****************生产设备入库end***********************/

        /****************检测设备入库**************************/
        $Company_detection=D('Company_detection_device');

        $new_detection=array();       //整理数据,转置数组
        foreach($detection as $val=>$value){
            foreach($value as $k=>$v){
               $new_detection[$k][$val] = $v;
               $new_detection[$k]['supplier_company_id'] = $com_id;
               //处理英文注册
                if($new_detection[$k]['name']==NULL) $new_detection[$k]['name']=$new_detection[$k]['name_en'];
            }
        }

        if($Company_detection->create($new_detection)){  //入库
            $res=$Company_detection->addAll($new_detection);
            if(!$res){
                $this->DeleteRegisteredInfo($com_id);
                $this->error('公司检测设备储存失败，请检查'); 
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_detection->getError());     
        }
        /****************检测设备入库end***********************/

        /****************营业额入库**************************/
        $Company_money=D('Turnover');

        foreach ($money as $key=>$val) {     //添加公司ID
            $money[$key]['supplier_company_id']=$com_id;
            $money[$key]['year']=$Year-2+$key;
        }

        if($Company_money->create($money)){
            $res=$Company_money->addAll($money);
            if(!$res){
              $this->DeleteRegisteredInfo($com_id);
                $this->error('公司营业额储存失败，请检查');
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_money->getError());
        }
        /****************营业额入库end***********************/

        /****************客户分布入库**************************/
        $Company_customer=D('Customers_distribution');

        foreach ($customer as $key=>$val) {     //添加公司ID
            $customer[$key]['supplier_company_id']=$com_id;
            $customer[$key]['year']=$Year-3+$key;
        }

        if($Company_customer->create($customer)){
            $res=$Company_customer->addAll($customer);
            if(!$res){
              $this->DeleteRegisteredInfo($com_id);
                $this->error('公司客户分布储存失败，请检查');
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_customer->getError());
        }
        /****************客户分布入库end***********************/

        /****************市场分布入库**************************/
        $Company_market=D('Market_distribution');

        foreach ($market as $key=>$val) {     //添加公司ID
            $market[$key]['supplier_company_id']=$com_id;
            $market[$key]['year']=$Year-3+$key;
        }

        if($Company_market->create($market)){
            $res=$Company_market->addAll($market);
            if(!$res){
              $this->DeleteRegisteredInfo($com_id);
                $this->error('公司市场分布储存失败，请检查');
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_market->getError());
        }
        /****************市场分布入库end***********************/

        /****************代表性产品入库**************************/
        $Company_product=D('Representative_product');

        foreach ($product as $key=>$val) {     //添加公司ID
            $product[$key]['supplier_company_id']=$com_id;
        }

        if($Company_product->create($product)){
            try{
                $res=$Company_product->addAll($product);
            }catch(\Exception $e){      //错误处理
                $code=$e->getCode();
                if($code=='23000')  {
                   $this->DeleteRegisteredInfo($com_id);
                  $this->error('代表性产品名称冲突');
                }
            }
            
            if(!$res){
              $this->DeleteRegisteredInfo($com_id);
                $this->error('代表性产品储存失败，请检查');
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_product->getError());
        }
        /****************代表性产品入库end***********************/

        /****************产品认证入库**************************/
        $new_cerfiles=array();       //转置文件数组
        foreach($certification_files as $val=>$value){
            foreach($value as $k=>$v){
               $new_cerfiles[$k][$val] = $v;
            }
        }

        $new_certification=array();       //整理数据,转置数组
        foreach($certification as $val=>$value){
            foreach($value as $k=>$v){
               $new_certification[$k][$val] = $v;
               $new_certification[$k]['supplier_company_id'] = $com_id;
               $new_certification[$k]['file']=$new_cerfiles[$k];
            }
        }

          //入库
        foreach ($new_certification as $key) {
            switch ($key['type']) {
                case '1':   //体系认证
                    $Company_certification=D('System_authentication_item');
                break;
                
                case '2':   //产品认证
                    $Company_certification=D('Product_authentication_item');
                    $key['product_criteria_id']=$key['system_criteria_id'];
                break;

                default:
                    continue;
                break;
            }
            
            if($Company_certification->create($key)){
                $res=$Company_certification->add($key);
                if($res){
                  switch ($key['type']) {
                      case '1':   //体系认证
                          $files+=array('s'.$res=>$key['file']);
                      break;
                      
                      case '2':   //产品认证
                          $files+=array('p'.$res=>$key['file']);
                      break;
                  }
                }
                else{
                  $this->DeleteRegisteredInfo($com_id);
                   $this->error('公司产品认证储存失败，请检查');  
                }
            }
            else{
              $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_certification->getError());     
            }
        }
        
        /****************产品认证入库end***********************/

        /****************能力回答入库**************************/
        $Company_ability_qc=D('Company_ability_question_choice');

        $new_ability_qc=array();
        foreach ($ability_qc as $key=>$val) {     //添加公司ID
            foreach ($val as $k => $v) {
                $new_ability_qc[]=array('supplier_company_id'=>$com_id,
                                    'question_id'=>$key,
                                    'question_choice_id'=>$v);
            }
        }

        if($Company_ability_qc->create($new_ability_qc)){
            $res=$Company_ability_qc->addAll($new_ability_qc);
            if(!$res){
              $this->DeleteRegisteredInfo($com_id);
                $this->error('公司能力回答储存失败，请检查');
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_ability_qc->getError());
        }
        /****************能力回答入库end***********************/

        /****************业务合规入库**************************/
        $Company_compliance_qc=D('Company_business_compliance');

        $new_compliance_qc=array();
        foreach ($compliance_qc as $key=>$val) {     //添加公司ID
            $new_compliance_qc[]=array('supplier_company_id'=>$com_id,
                                    'business_compliance_id'=>$key,
                                    'business_compliance_question_choice'=>$val);
        }

        if($Company_compliance_qc->create($new_compliance_qc)){
            $res=$Company_compliance_qc->addAll($new_compliance_qc);
            if(!$res){
              $this->DeleteRegisteredInfo($com_id);
                $this->error('公司业务合规储存失败，请检查');
            }
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($Company_compliance_qc->getError());
        }
        /****************业务合规入库end***********************/

        /****************上传文件**************************/
        $Companyadd=M('supplier_company');
        $Systemadd=M('System_authentication_item');
        $Productadd=M('Product_authentication_item');
        $upload->saveName  =  array('uniqid',$com_id.'_');    //上传文件名
        $info   =   $upload->upload($files);

        if(!$info) {// 上传错误提示错误信息
          $this->DeleteRegisteredInfo($com_id);
            $this->error($upload->getError());
        }else{// 上传成功 保存上传文件信息
          unset($addfiles);
          $addfiles=array('id'=>$com_id,
                          'logo_url'=>$info['logo']['savename'],
                          'introduction_pdf_url'=>$info['introduction_pdf']['savename'],
                          'introduction_en_pdf_url'=>$info['introduction_en_pdf']['savename']);
          $Companyadd->save($addfiles);
          foreach($info as $key=>$val){
            switch(substr($key,0,1)){
              case 's':
                $Systemadd->where('id='.substr($key,1))->setField('certificate_pdf_url',$val['savename']);
                break;

              case 'p':
                $Productadd->where('id='.substr($key,1))->setField('certificate_pdf_url',$val['savename']);
                break;

              default: break;
            }     
          }  
        }
        /****************上传文件end***********************/

        /****************更新用户信息***********************/
        $User=M('Supplier');
        $res=$User->where('id='.$user_id)->setField('supplier_company_id',$com_id);
        if($res){
            $name=$User->getFieldById($user_id,'username');
            session('user_id',$user_id);
            session('username',$name);
            session('group_id',1);
            session('type',2);

            $this->success('信息记录成功',__APP__.'/Home/Index');
        }
        else{
          $this->DeleteRegisteredInfo($com_id);
            $this->error($User->getError());
        }
        /****************更新用户信息end********************/
        
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


    //储存供应商个人信息
    public function save_supplierPersonalInfo(){
      //电话与传真的区域代码为用户自行输入，非区域ID
        $Supplier=M('Supplier');
        $data=I('post.');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/uploads/supplier_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        //处理英文注册
        if($data['firstname']==NULL) $data['firstname']=$data['firstname_en'];
        if($data['lastname']==NULL) $data['lastname']=$data['lastname_en'];
        if($data['title']==NULL) $data['title']=$data['title_en'];

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/supplier_pic', 0777 ,1);

        if($Supplier->create($data)){
            $Supplier->reg_time=time();
            $result=$Supplier->save();
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
                                $Supplier->where('id='.$data['id'])->setField('face_url',$info['savename']);
                             }
                         }
                    }

                $email=$Supplier->getFieldById($data['id'],'email');
                $this->supplier_finishedemail($email,$data['username']);     //发送成功邮件

                $this->success('Success！请继续完善企业信息','supplierCompanyInfo');
            }
            else $this->error($Supplier->getError());
        }
        else{
            $this->error($Supplier->getError());
        }
    }

    //使用条款
    public function termOfUse(){
        $this->display();
    }

    //获取二级目录
    public function getSecondProcess(){
        // $id=$_POST['type'];
        $id=I('technic_first_level');
        $Second=M('Processing_technic_second');
        $list=$Second->where('first_level_id='.$id)->select();
        if(session('lang')=='en'){
          $list=zh_to_en($list);
        }
        $this->ajaxReturn($list);
    }

    //获取三级目录
    public function getThirdProcess(){
        // $id=$_POST['type'];
        $id=I('technic_second_level');        
        $Third=M('Processing_technic_third');
        $list=$Third->where('second_level_id='.$id)->select();
        if(session('lang')=='en'){
          $list=zh_to_en($list);
        }
        $this->ajaxReturn($list);
    }

    /**
     * [check_certificate_validity 检查证书是否有效]
     * @param  string $type     [验证类型，1代表‘体系认证’，2代表‘产品认证’]
     * @param  string $criteria [证书类型]
     * @param  [type] $number   [证书编号]
     * @param  [type] $period   [证书有效截止时间]
     * @return [type] $result   [验证结果，true代表有效，false代表无效]
     */
    
    public function check_certificate_validity($type='1',$criteria='iatf',$number,$period){
        //对不同type分别处理
        if($type=='1'){         //体系认证
            switch ($criteria) {
                case 'iatf':
                    return $this->check_iatf($number,$period);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        else if($type=='2'){   //产品认证
            switch ($criteria) {
                case 'value':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        return false;
    }

    /**
     * 检查年iatf证书编号是否正确
     * @param  [type] $number [证书编号]
     * @return [type] $result [有效则返回true，不存在则返回false,其他返回‘检验过程错误’]
     */
    public function check_iatf($number,$period='0')
    {   
        //这个证书没有有效期
        $data = "cert_no=".$number."&cert_no_submit.x=7&cert_no_submit.y=6";
        $url = "http://www.iatf-customerportal.org";
        $headers = array(
            "Host: www.iatf-customerportal.org",
            "Content-Length: 53",
            "Cache-Control: max-age=0",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
            "Origin: http://www.iatf-customerportal.org",
            "Upgrade-Insecure-Requests: 1",
            "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36",
            "Content-Type: application/x-www-form-urlencoded",
            "Referer: http://www.iatf-customerportal.org/",
            "Accept-Encoding: gzip, deflate",
            "Accept-Language: zh-CN,zh;q=0.8"
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_ENCODING, ""); //设置编码
        $output = curl_exec($curl);
        curl_close($curl);

        if(stripos($output,'does not exist')){
            $result=false;
            return $result;
        }else if(stripos(strstr($output,'Validity:'),'YES')){
            $result=true;
            return $result;
        }else{
            $result='检验过程错误';
            return $result;
        }
        
    }

    public function ajax_check_criteria(){       //ajax获得证书检测
        $type=I('type');
        $criteria=I('criteria');
        $body=I('body');
        $number=I('number');
        $period=strtr(I('period'),array('-'=>''));
        // var_dump($_GET);
        // var_dump($type);
        // var_dump($criteria);
        // var_dump($number);
        // var_dump($period);
        // var_dump($this->check_certificate_validity($type,$criteria,$number,$period));
        // var_dump($this->check_certificate_validity('1','iatf','0165281','20160620'));
        $data['type']=$type;
        $data['criteria']=$criteria;
        $data['number']=$number;
        $data['period']=$period;
        $data['result']=$this->check_certificate_validity($type,$criteria,$number,$period);
        $this->ajaxReturn($data);
    }


    //根据type得到相应验证下的所有的标准
    public function get_all_criteria(){
        $type=I('type');
        if($type=='1'){
            return $this->get_all_system_criteria();
        }else if($type=='2'){
            return $this->get_all_product_criteria();
        }
    }

    //得到所有的体系标准
    public function get_all_system_criteria(){
        $Criteria=M('system_criteria');
        $criterias=$Criteria->select();
        $this->ajaxReturn($criterias);
    }


    //得到所有的产品标准
    public function get_all_product_criteria(){
        $Criteria=M('Product_criteria');
        $criterias=$Criteria->select();
        $this->ajaxReturn($criterias);
    }

    //得到所有的认证机构
    public function get_all_certification_body(){
        $CriteriaBody=M('Certification_body');
        $bodys=$CriteriaBody->select();
        $this->ajaxReturn($bodys);
    }

    //采购商发送注册成功邮件
    private function buyer_finishedemail($email,$name){
      $title='Saas 注册成功';
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>尊敬的<span class="name" id="name">'.$name.'</span>，您好<br/>您已成功注册selectedin.com， 请妥善保管好密码。如忘记密码，可以通过注册电子邮箱找回。</p>  
        <br/>
      </div>
    </div>
     <div class="modal-footer">
       <p>如有任何问题，请与<a href="Mailto:support@seletedin.com">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>You had been successfully registered in selectedin.com, your user name is <span class="name" id="name">'.$name.'</span>.In case that you forget your password, you could request to reset the password via this email address.</p>  
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:support@seletedin.com">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
    </div>
  </div>
</body>
</html>';
          break;
      }
      SUPPORTsendMail($email,$title,$content);
    }

    //供应商发送注册成功邮件
    private function supplier_finishedemail($email,$name){
      $title='Saas 注册成功';
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 注册确认邮件 </h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：注册确认邮件  </h4>
      <div class="mailContent">
        <p>尊敬的<span class="name" id="name">'.$name.'</span>，您好<br/>您已成功注册selectedin.com，请妥善保管好密码。如忘记密码，可以通过注册电子邮箱找回。</p>  
        <br/>
      </div>
    </div>
    <div class="modal-footer">
      <p>如有任何问题，请与<a href="Mailto:support@seletedin.com">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
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
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
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
        <p>You had been successfully registered in selectedin.com, your user name is <span class="name" id="name">'.$name.'</span>.In case that you forget your password, you could request to reset the password via this email address.</p>  
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:support@seletedin.com">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
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
}