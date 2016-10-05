<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>中国母基金联盟</title>
  <!--bootstrap3-->
  <link rel="stylesheet" href="/fofs/1/Public/assets_1/public/bootstrap/css/bootstrap.min.css"/>
  <!--font-awesome-->
  <link rel="stylesheet" href="/fofs/1/Public/assets_1/public/font-awesome/css/font-awesome.min.css"/>
  <!--i-check-->
  <link rel="stylesheet" href="/fofs/1/Public/assets_1/public/icheck/skins/flat/blue.css"/>

  <link rel="stylesheet" href="/fofs/1/Public/assets_1/css/common.css"/>

  <link rel="stylesheet" type="text/css" href="/fofs/1/Public/assets_1/css/default.css">
  <link href="/fofs/1/Public/assets_1/css/site.css" rel="stylesheet" type="text/css" />
  <script type='text/javascript'>
      var _vds = _vds || [];
      window._vds = _vds;
      (function(){
        _vds.push(['setAccountId', '85dd0477b4e83d27']);
        (function() {
          var vds = document.createElement('script');
          vds.type='text/javascript';
          vds.async = true;
          vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dn-growing.qbox.me/vds.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(vds, s);
        })();
      })();
  </script>
</head>
<body>
<header class="header" role="navigation">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
          <span class="sr-only">中国母基金联盟</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/fofs/1/index.php/Home" id="logo">
          <img src="/fofs/1/Public/assets_1/img/logo.png" alt="select_in"/>
        </a>

      </div>

      <div class="collapse navbar-collapse" id="collapse">

        <ul class="nav navbar-nav navbar-right">
          <li>
            <div id="search_box">
              <form id="search_form" method="post" action="#">
                <input type="text" id="s" placeholder="文章/机构/用户" class="swap_value" />
                <input type="image" src="/fofs/1/Public/assets_1/img/search.png" width="20" height="20" id="go" alt="Search" title="Search" />
              </form>
            </div>
          </li>
          <!--未登录-->
          <?php if(($user_id) == ""): ?><li>
              <a href="#login" data-toggle="modal"> <i class="fa fa-sign-in"></i>
                登录
              </a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Home/Register/email.html"> <i class="fa fa-plus-square"></i>
                注册
              </a>
            </li>

            <li>
              <a href="http://weibo.com/u/1923830340/home?wvr=5"  target="_Blank">微博</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                微信
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="?l=zh-cn">
                    <img src="/fofs/1/Public/assets_1/img/wechat.jpg" alt="cn" style="height:116px;" />
                  </a>
                </li>
              </ul>
            </li>
            <?php else: ?>
            <!--已登录之后的-->
            <?php if(($type) == "1"): ?><li>
                <a href="http://weibo.com/u/1923830340/home?wvr=5"  target="_Blank">微博</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  微信
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="?l=zh-cn">
                      <img src="/fofs/1/Public/assets_1/img/wechat.jpg" alt="cn" style="height:116px;" />
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="/fofs/1/index.php/Home/Buyer/inbox">新消息</a>
              </li>
              <li>
                <a href="/fofs/1/index.php/Home/Buyer/buyProfile"><?php echo ($username); ?></a>
              </li><?php endif; ?>
            <?php if(($type) == "2"): ?><li>
                <a href="http://weibo.com/u/1923830340/home?wvr=5"  target="_Blank">微博</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  微信
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="?l=zh-cn">
                      <img src="/fofs/1/Public/assets_1/img/wechat.jpg" alt="cn" style="height:116px;" />
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="/fofs/1/index.php/Home/supplier/inbox">新消息</a>
              </li>
              <li>
                <a href="/fofs/1/index.php/Home/supplier/supplierProfile"><?php echo ($username); ?></a>
              </li><?php endif; ?>
            <li>
              <a href="/fofs/1/index.php/Home/Index/logout">登出</a>
            </li><?php endif; ?>
        </ul>
      </div>
      <!-- /.navbar-collapse --> </div>
    <!-- /.container-fluid --> </nav>

</header>
<div id='nav_bar'>
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" >
      <a href="#">首页</a>
    </li>
    <li role="presentation">
      <a href="#">关于联盟</a>
    </li>
    <li role="presentation">
      <a href="#">LP</a>
    </li>
    <li role="presentation">
      <a href="#">GP</a>
    </li>
    <li role="presentation">
      <a href="#">创业公司</a>
    </li>
    <li role="presentation">
      <a href="#">服务机构</a>
    </li>
    <li role="presentation">
      <a href="#">合作</a>
    </li>
  </ul>
</div>

<!--登录模态框-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">
          <a href="#personal_login" data-toggle="tab" style="color:white;text-decoration:none;">个人登录</a>
          |
          <a href="#institution_login" data-toggle="tab" style="color:white;text-decoration:none;">机构登录</a>
        </h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="personal_login">
                <div class="col-sm-8">
                  <form action="/fofs/1/index.php/Home/Index/login" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name="user" placeholder="<?php echo (L("enter_email_address")); ?>"/>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="<?php echo (L("enter_password")); ?>"/>
                    </div>
                    <a href="/fofs/1/index.php/Home/Password/first.html" class="pull-right">忘记密码</a>
                    <div class="row btnLogin">
                      <div class="col-sm-6"></div>
                      <div class="col-sm-6">
                        <input type="submit" name='buyer' value="个人登录" class="btn btn-block btn-primary"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane fade" id="institution_login">
                <div class="col-sm-8">
                  <form action="/fofs/1/index.php/Home/Index/login" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name="user" placeholder="<?php echo (L("enter_email_address")); ?>"/>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="<?php echo (L("enter_password")); ?>"/>
                    </div>
                    <div class="form-group">
                        <select style="width:100%;height:40px;font-size:14px;color:#999;padding:6px 8px;">
                          <option value ="0">请选择机构类型</option>
                          <option value ="1">LP</option>
                          <option value="2">GP</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option>
                        </select>
                    </div>

                    <a href="/fofs/1/index.php/Home/Password/first.html" class="pull-right">忘记密码</a>
                    <div class="row btnLogin">
                      <div class="col-sm-6"></div>
                      <div class="col-sm-6">
                        <input type="submit" name='supplier' value="机构登录" class="btn btn-block btn-primary"/>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="indexText">
                  <h5>中国母基金联盟</h5>
                  <p>还没有账号</p>
                  <a href="/fofs/1/index.php/Home/Register/email.html">立即注册</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--登录模态框结束-->
<div class="content supplierCompanyInfo">
  <div class="container">
    <form action="/fofs/1/index.php/Home/Register/save_supplierCompanyInfo" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


          <div class="panel panel-default panel4" style="margin-top: 20px;">
            <div class="panel-heading" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                  <i class="fa fa-globe"></i>
                  基金产品(数量>=0)
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
              <div class="panel-body">
                <div class="repeat_fund ">
                  <div class="borderBottom" style="margin-bottom:20px;">
                    <div class="row" >
                      <div class="col-sm-2">
                        
                          <label for="userName" class="col-sm-12 control-label"><span>*</span>管理基金数量</label>
    
                      </div>

                      <div class="col-sm-4">

                            <input type="text" class="form-control" id="userName" name="username"  />

                      </div>

                    </div>



                    <div class="row" style="margin-top:10px;">
                      <div class="col-sm-2">
                        
                          <label for="userName" class="col-sm-12 control-label"><span>*</span>管理基金总规模</label>
    
                      </div>

                      <div class="col-sm-4">

                            <input type="text" class="form-control" id="userName" name="username"  />
                           

                      </div>

                      <div class='col-sm-2'>
                            <label for="userName" class="col-sm-12 control-label">(万人民币)</label>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2 ">
                          <label for="userName" class="col-sm-12 control-label"><b>基金产品</b></label>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                基金名称
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                成立时间
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                注册地点
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                币种
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                基金规模(万元)
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                基金类型
                              </label>
                            </div>
                            <div class="col-sm-4">
                                <select name="language" id="language" class="form-control">

                                  <option value ="1">天使投资基金</option>
                                  <option value ="2">VC基金</option>
                                  <option value ="3">PE基金</option>
                                  <option value ="4">其它基金</option>

                                </select>                           
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                托管人名称
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                主要投资领域
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                投资地域
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="userName" name="username"  placeholder='海外、全国范围、某省某市'/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                运作状态
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="buyer" type="radio" name="userType" value="buyer" checked>
                                <label for="buyer">封闭</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="supplier" type="radio" name="userType" value="supplier">
                                <label for="supplier">募集期</label>
                              </div>      
                              <div class="col-sm-2 ">
                                <label for="supplier">上传募集方案</label>
                              </div>
                              <div class="col-sm-4 ">
                                <input type="file" class="form-control" id="personalLogo" name="personalLogo" >
                              </div>  

                                                   
                            </div>

                        </div>

                    </div>


                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                中基协备案状况
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="buyer" type="radio" name="userType" value="buyer" checked>
                                <label for="buyer">未备案</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="supplier" type="radio" name="userType" value="supplier">
                                <label for="supplier">已备案</label>
                              </div>  
                              <div class="col-sm-6 ">
                                <label for="supplier">(若已备案则填写下面基金编号、备案时间)</label>
                              </div>                       
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="userName" class="col-sm-12 control-label">
                                基金编号
                              </label>
                            </div>
    
                            <div class="col-sm-4 ">
                              <input type="text" class="form-control" id="userName" name="username"  />   
                            </div>
                            <div class="col-sm-2 ">
                              <label for="supplier">备案时间</label>
                            </div>  
                            <div class="col-sm-4 ">
                              <input type="text" class="form-control" id="userName" name="username"  />   
                            </div>                       
                          

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-3 ">
                          <label for="userName" class="col-sm-12 control-label"><b>该基金已投基金/项目</b></label>
                        </div>
                    </div>


                    <div class="repeat">
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  基金项目名称
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="userName" name="username"  />                            
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  基金项目简介
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <textarea class="form-control" id="userName" name="username" ></textarea>
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  投资额度
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="userName" name="username"  />                            
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  项目投资轮次
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="userName" name="username"  /> 
                              </div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  (基金无)
                                </label>
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  投资时间
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="userName" name="username"  />                            
                              </div>

                          </div>

                      </div>
                      <div class="row borderBottom" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="userName" class="col-sm-12 control-label">
                                  项目现状
                                </label>
                              </div>
                              <div class="col-sm-4">
                                  <select name="language" id="language" class="form-control">

                                      <option value ="1">死亡</option>
                                      <option value ="2">Pre-IPO</option>
                                      <option value ="3">M&A</option>
                                      <option value ="4">上市</option>

                                  </select>  
                              </div>

                          </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-9"></div>
                      <div class="col-sm-3">
                        <button type="button" class="btn btn-primary" id="addNew4">再添加该基金已投基金/项目</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" id="addNew3">添加其它基金产品</button>
                      </div>
                    </div>
              </div>
            </div>
          </div>
          <!--主要检测设备-->

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4" style="margin-bottom:30px;">
          <input type="hidden" name='user_id'  value="<?php echo ($id); ?>"/>
          <input type="submit" class="btn btn-primary btn-block" id="submit" value="<?php echo (L("signup_complete")); ?>"/>
        </div>
      </div>
    </form>
  </div>
</div>

<footer class="footer">
  <div class="footerLink">
    <a href="#">关于我们</a>
    <a href="#">法律声明</a>
    <a href="#">联系我们</a>
    <a href="#">加入我们</a>
  </div>
</footer>
<!--jquery-->
<script src="/fofs/1/Public/assets_1/public/jquery/jquery.min.js"></script>
<!--bootstrap3-->
<script src="/fofs/1/Public/assets_1/public/bootstrap/js/bootstrap.min.js"></script>
<!--icheck-->
<script src="/fofs/1/Public/assets_1/public/icheck/icheck.min.js"></script>
<script src="/fofs/1/Public/assets_1/js/jquery.cookie.js"></script>

<script src="/fofs/1/Public/assets_1/js/common.js"></script>
<script src="/fofs/1/Public/assets_2/public/bootstrap/js/Chart.min.js"></script>
<script src="/fofs/1/Public/assets_2/js/Chart.js"></script>
<script src="/fofs/1/Public/assets_1/js/buyer_letter.js"></script>
<script src="/fofs/1/Public/assets_1/js/supplier_letter.js"></script>
<script src="/fofs/1/Public/assets_1/js/js.cookie.js"></script>

<script src="/fofs/1/Public/assets_1/js/store.js"></script>
<script src="/fofs/1/Public/assets_1/js/search.js"></script>

<script src="/fofs/1/Public/assets_1/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
<script type="text/javascript">


$(document).ready(function(){ 
    if($.cookie('lang')){
      //alert($.cookie('lang'));
    }else{
      
      var type=navigator.appName
      if (type=="Netscape"){
        var lang = navigator.language
      }
      else{
        var lang = navigator.userLanguage
      }

      //取得浏览器语言的前两个字母
      var lang = lang.substr(0,2)
      // 英语
      if (lang == "en"){
        $.cookie('lang', lang); //设置cookie的值 
        window.location.href="?l=en-us"
      }
      // 中文 - 不分繁体和简体
      else if (lang == "zh"){
        $.cookie('lang', lang); //设置cookie的值 
        window.location.href="?l=zh-cn"
        
      }
      // 除上面所列的语言
      else{
        $.cookie('lang', lang); //设置cookie的值 
        window.location.href="?l=en-us"
      }
    }
}); 


/*新闻列表*/

$("#demo1").bootstrapNews({

            newsPerPage: 4,

            autoplay: true,

      pauseOnHover: true,

      navigation: true,

            direction: 'up',

            newsTickerInterval: 2500,

            onToDo: function () {

                //console.log(this);

            }

});
$("#demo2").bootstrapNews({

            newsPerPage: 4,

            autoplay: true,

      pauseOnHover: true,

      navigation: true,

            direction: 'up',

            newsTickerInterval: 2500,

            onToDo: function () {

                //console.log(this);

            }

});
$("#demo3").bootstrapNews({

            newsPerPage: 4,

            autoplay: true,

      pauseOnHover: true,

      navigation: true,

            direction: 'up',

            newsTickerInterval: 2500,

            onToDo: function () {

                //console.log(this);

            }

});
$("#demo4").bootstrapNews({

            newsPerPage: 4,

            autoplay: true,

      pauseOnHover: true,

      navigation: true,

            direction: 'up',

            newsTickerInterval: 2500,

            onToDo: function () {

                //console.log(this);

            }

});
</script>
</body>
</html>