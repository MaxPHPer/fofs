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
 <div class="buyProfile content" style="margin-top:30px;    background-color: #F9F7F6;">

    <section class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-10 main-content col-md-offset-1">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <div class="panel-title">
                     GP条件搜索
                  </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                      <div class='col-md-12 ' >
                          <div class="panel-body well">
                              <div class="row">
                                  <div class='col-md-2 text_right' class="form-control" style="margin-top:6px;">
                                      基金类型
                                  </div>
                                  <div class="col-md-10">
                                      <div class='col-md-3 ' >
                                          <select name="fund_type" id="fund_type" class="form-control">

                                            <option value ="0">证券投资基金</option>
                                            <option value ="1">股权投资基金</option>
                                            <option value="2">创业投资基金</option>
                                            <option value="3">其他投资基金</option>

                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="row margin_top_13">
                                  <div class="col-md-2 text_right">
                                    投资类型
                                  </div>
                                  <div class="col-md-10">
                                    <div class="col-md-3 ">
                                    <input class="icheckbox_flat-blue" id="is_investment_security" type="checkbox" name="fund_type[]" value="is_investment_security" <?php if($vo['is_investment_security']==1) echo' checked'; ?> />
                                      证券投资基金
                                    </div>
                                    <div class="col-md-3 ">
                                      <input class="icheckbox_flat-blue" id="is_equity_investment" type="checkbox" name="fund_type[]" value="is_equity_investment" <?php if($vo['is_equity_investment']==1) echo' checked'; ?> />
                                      股权投资基金
                                    </div>
                                    <div class="col-md-3 ">
                                      <input class="icheckbox_flat-blue" id="is_venture_investment" type="checkbox" name="fund_type[]" value="is_venture_investment" <?php if($vo['is_venture_investment']==1) echo' checked'; ?> />
                                      创业投资基金
                                    </div>
                                    <div class="col-md-3 ">
                                      <input class="icheckbox_flat-blue" id="is_other_investment" type="checkbox" name="fund_type[]" value="is_other_investment" <?php if($vo['is_other_investment']==1) echo' checked'; ?> />
                                      其它投资基金
                                    </div>                        
                                  </div>

                              </div>

                              <div class="row margin_top_13">
                                  <div class='col-md-2 text_right'>
                                      成立时间
                                  </div>
                                  <div class="col-md-10">
                                      <div class="col-md-2">
                                        <input class="icheckbox_flat-blue" id="start_sign_0" type="checkbox" name="start_sign_0" value="0"/>
                                          不限
                                      </div>
                                      <div class='col-md-3 ' >

                                          <input type="date" name="start_sign" value="" class="form-control">
                                          
                                      </div>
                                      <div class='col-md-2 text_center' >

                                          至
                                          
                                      </div>
                                      <div class="col-md-2">
                                        <input class="icheckbox_flat-blue" id="end_sign_0" type="checkbox" name="end_sign_0" value="0"/>
                                          不限
                                      </div>
                                      <div class='col-md-3 ' >

                                          <input type="date" name="end_sign" value="" class="form-control">
                                          
                                      </div>
                                  </div>

                              </div>

                              <div class="row margin_top_13">
                                  <div class='col-md-2 text_right' style="margin-top:6px;">
                                      
                                 
                                      
                                  </div>
                                  <div class='col-md-9 text_right' >

                                      <input type="submit" name="end_sign" value="一键搜索" class="btn btn-info">
                                      
                                  </div>
                              </div>

                          </div>
                      </div>

                      <div class='col-md-12' >
                                <div class="panel-body">
                                    <div class="list-group">
                                    <?php if(is_array($results)): foreach($results as $key=>$vo): ?><div class="list-group-item row form-group">
                                          <div class="col-sm-1 " style="margin-top:18px;">
                                              <?php echo ($key+1); ?>
                                          </div>
                                     
                                          <div class="col-sm-2">
                                            <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/gp_pic/<?php echo $vo['institution_logo_img']?$vo['institution_logo_img']:'default.jpg'; ?>" alt="头像"  width="100"/>
                                          </div>
                                          <div class="col-sm-5" style="margin-top:18px;">
                                               <a href="<?php echo U('Home/Search/gpProfile');?>?id=<?php echo ($vo['id']); ?>&institution_type=<?php echo ($vo['institution_type']); ?>" target="_blank"><?php echo ($vo['institution_fullname_cn']); ?></a>
                                          </div>

                                          <div class="col-sm-3" style="margin-top:18px;">
                                              <?php if($vo['is_securities_fund'] == 1): ?>证券投资基金<?php endif; ?>
                                              <?php if($vo['is_stock_fund'] == 1): ?>股权投资基金<?php endif; ?>
                                              <?php if($vo['is_startup_fund'] == 1): ?>创业投资基金<?php endif; ?>
                                              <?php if($vo['is_other_fund'] == 1): ?>其它投资基金<?php endif; ?>
                                          </div>


                                          <div class="col-sm-1 " style="margin-top:18px;">
                                              <span class="label label-info" onclick="alert(<?php echo ($vo['id']); ?>);">+关注</span>
                                          </div>
                                                                            
                                  
                                      </div><?php endforeach; endif; ?>
                                    </div>
                                </div>
                      </div>
                  </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body center">
                    <ul class="pagination">
                      <li class="disabled">
                        <a href="#">上一页</a>
                      </li>
                      <li >
                        <a href="#">
                          1
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li >
                        <a href="#">
                          2
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li class="active">
                        <a href="#">
                          3
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li >
                        <a href="#">
                          4
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li >
                        <a href="#">
                          5
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li >
                        <a href="#">
                          6
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li >
                        <a href="#">
                          下一页
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div><!--新闻列表-->


            </div>
          </div>

        </div>
      </div>
    </section>
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