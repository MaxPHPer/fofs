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
              <form id="search_form" method="post" action="<?php echo U('Home/Search/search');?>">
                <input type="text" id="s" placeholder="文章/机构/用户" value="<?php echo ($keywords); ?>" class="swap_value" name="keywords"/>
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
              <a href="http://weibo.com/u/5938414174?refer_flag=1001030201_&is_hot=1"  target="_Blank">微博</a>
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
            <li>
              <a href="/fofs/1/index.php/Home/<?php echo ($base_url); ?>/inbox">新消息</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Home/<?php echo ($base_url); ?>/individualProfile"><?php echo ($username); ?></a>
            </li>
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
      <a href="<?php echo U('Home/Index/index');?>">首页</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Index/aboutAlliance');?>?article_type=9">关于联盟</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Search/lpSearch');?>">LP</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Search/gpSearch');?>">GP</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Search/startUpSearch');?>">创业公司</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Search/saSearch');?>">服务机构</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Cooperations/cooperations');?>">合作</a>
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
          <a href="#personal_login" data-toggle="tab" id="personal_login_title" style="color:white;text-decoration:none;">个人登录</a>
          |
          <a href="#institution_login" data-toggle="tab" id="institution_login_title" style="color:#AFACAC;text-decoration:none;">机构登录</a>
        </h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">

            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="personal_login">
                <div class="col-sm-8">
                  <form action="/fofs/1/index.php/Home/Index/personal_login" method="post">
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
                  <form action="/fofs/1/index.php/Home/Index/institution_login" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" name="email" placeholder="<?php echo (L("enter_email_address")); ?>"/>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="<?php echo (L("enter_password")); ?>"/>
                    </div>
                    <div class="form-group">
                        <select name="institution_type" style="width:100%;height:40px;font-size:14px;color:#999;padding:6px 8px;">
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

      <div class="row">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

          <div class="panel panel-default panel3" style="margin-top: 20px;">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <i class="fa fa-check"></i>
                  管理团队信息
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
              </h4>
            </div>
            <!--已有团队成员-->
            <?php if(is_array($members)): foreach($members as $key=>$vo): ?><div id="" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="">
                  <div class="panel-body">
                    <div class="repeat_people ">
                      <div class="borderBottom" style="margin-bottom:20px;">
                        <div class="row" >
                          <div class="col-sm-2">
                            
                              <label for="username" class="col-sm-12 control-label"><span>*</span>姓名</label>
        
                          </div>

                          <div class="col-sm-4">

                                <input type="text" class="form-control" id="username" name="username" value="<?php echo ($vo['username']); ?>" disabled/>

                          </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                          <div class="col-sm-2">
                            
                              <label for="function" class="col-sm-12 control-label"><span>*</span>职务</label>
        
                          </div>

                          <div class="col-sm-4">

                                <input type="text" class="form-control" id="function" name="function" value="<?php echo ($vo['function']); ?>" disabled/>

                          </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2 ">
                              <label for="userName" class="col-sm-12 control-label"><b>从业经历</b></label>
                            </div>
                        </div>

                        <div class="repeat">
                          <?php if(is_array($vo['business_experience'])): foreach($vo['business_experience'] as $key=>$business_experience): ?><div class="row" style="margin-top:10px;">
                                
                                <div class="col-sm-2 ">
                                  <label for="" class="col-sm-12 control-label">公司名称</label>
                                </div>
                                <div class="col-sm-2">
                                      <input type="text" class="col-sm-12 form-control" name="business_experience[company_name][]" value="<?php echo ($business_experience['company_name']); ?>" disabled/>
                                    </div>
                                <div class="col-sm-8">
                                    
                                    <div class="col-sm-2 ">
                                      <label for="" class="col-sm-12 control-label">职位</label>
                                    </div>
                                    <div class="col-sm-2">
                                      <input type="text" class="form-control" name="business_experience[function][]" value="<?php echo ($business_experience['function']); ?>" disabled/>
                                    </div>
                                    <div class="col-sm-3 ">
                                      <label for="" class="col-sm-12 control-label">任职年月</label>
                                    </div>
                                    <div class="col-sm-2">
                                      <input type="text" class="form-control" name="business_experience[start_time][]" value="<?php echo ($business_experience['start_time']); ?>" disabled/>
                                    </div>

                                    <div class="col-sm-1 ">
                                      <label for="" class="col-sm-12 control-label">至</label>
                                    </div>
                                    <div class="col-sm-2">
                                      <input type="text" class="form-control" name="business_experience[end_time][]" value="<?php echo ($business_experience['end_time']); ?>" disabled/>
                                    </div>
                                </div>

                              </div><?php endforeach; endif; ?>
                        </div>

                      </div>
                    </div>

                  </div>
                </div><?php endforeach; endif; ?>

    <form action="" method="post" enctype="multipart/form-data" name='form1'>
            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                <div class="repeat_people ">
                  <div class="borderBottom" style="margin-bottom:20px;">
                    <div class="row" >
                      <div class="col-sm-2">
                        
                          <label for="username" class="col-sm-12 control-label"><span>*</span>姓名</label>
    
                      </div>

                      <div class="col-sm-4">

                            <input type="text" class="form-control" id="username" name="username"  />

                      </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                      <div class="col-sm-2">
                        
                          <label for="function" class="col-sm-12 control-label"><span>*</span>职务</label>
    
                      </div>

                      <div class="col-sm-4">

                            <input type="text" class="form-control" id="function" name="function"  />

                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2 ">
                          <label for="userName" class="col-sm-12 control-label"><b>从业经历</b></label>
                        </div>
                    </div>

                    <div class="repeat">
                      <div class="row" style="margin-top:10px;">
                        
                        <div class="col-sm-2 ">
                          <label for="" class="col-sm-12 control-label">公司名称</label>
                        </div>
                        <div class="col-sm-2">
                              <input type="text" class="col-sm-12 form-control" name="business_experience[company_name][]"/>
                            </div>
                        <div class="col-sm-8">
                            
                            <div class="col-sm-2 ">
                              <label for="" class="col-sm-12 control-label">职位</label>
                            </div>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="business_experience[function][]"/>
                            </div>
                            <div class="col-sm-3 ">
                              <label for="" class="col-sm-12 control-label">任职年月</label>
                            </div>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="business_experience[start_time][]"/>
                            </div>

                            <div class="col-sm-1 ">
                              <label for="" class="col-sm-12 control-label">至</label>
                            </div>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="business_experience[end_time][]"/>
                            </div>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-10"></div>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" id="addNew2">再添加从业经历</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                      <div class="col-sm-2">
                        <input type="submit" class="btn btn-primary btn-block"  value="添加其它高管" onclick="form1.action='/fofs/1/index.php/Home/Register/add_membersInfo';form1.submit();"/>
                      </div>
                </div>
              </div>
            </div>
          </div>
          <!--高管团队-->

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4" style="margin-bottom:30px;">
          <input type="submit" class="btn btn-primary btn-block"  value="保存并前往下一步" onclick="form1.action='/fofs/1/index.php/Home/Register/save_membersInfo';form1.submit();"/>
        </div>
      </div>
    </form>
  </div>
</div>

<footer class="footer">
  <div class="footerLink">
    <a href="<?php echo U('Home/Index/aboutUs');?>">关于我们</a>
    <a href="<?php echo U('Home/Index/notices');?>">法律声明</a>
    <a href="<?php echo U('Home/Index/contactUs');?>">联系我们</a>
    <a href="<?php echo U('Home/Index/links');?>">加入我们</a>
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