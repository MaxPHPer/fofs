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
                <a href="<?php echo U('Home/Individual/inbox');?>">新消息</a>
              </li>
              <li>
                <a href="<?php echo U('Home/Individual/individualProfile');?>"><?php echo ($username); ?></a>
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
                <a href="<?php echo U('Home/Individual/inbox');?>">新消息</a>
              </li>
              <li>
                <a href="<?php echo U('Home/Individual/individualProfile');?>"><?php echo ($username); ?></a>
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
      <a href="<?php echo U('Home/Index/index');?>">首页</a>
    </li>
    <li role="presentation">
      <a href="<?php echo U('Home/Index/aboutAlliance');?>">关于联盟</a>
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
<div class="content">
  <section class="banner">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="/fofs/1/Public/assets_1/img/main_picture_1.jpg" alt="carousel1">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="title">
                  <img src="/fofs/1/Public/assets_1/img/logo.png" alt="logo"/>
                </h1>
                <h2><?php echo (L("banner_title_1")); ?></h2>
                <p>快速发现好项目</p>
              </div>
              <div class=" col-sm-4 action">
                <a href="/fofs/1/index.php/<?php echo ($link); ?>" class="btn btn-lg"><?php echo (L("start_app")); ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/fofs/1/Public/assets_1/img/main_picture_2.jpg" alt="carousel2">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="title">
                  <img src="/fofs/1/Public/assets_1/img/logo.png" alt="logo"/>
                </h1>
                <h2><?php echo (L("banner_title_2")); ?></h2>
                <p>快速发现好项目</p>
              </div>
              <div class=" col-sm-4 action">
                <a href="/fofs/1/index.php/<?php echo ($link); ?>" class="btn btn-lg"><?php echo (L("start_app")); ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/fofs/1/Public/assets_1/img/main_picture_3.jpg" alt="carousel3">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="title">
                  <img src="/fofs/1/Public/assets_1/img/logo.png" alt="logo"/>
                </h1>
                <h2><?php echo (L("banner_title_3")); ?></h2>
                <p>快速发现好项目</p>
              </div>
              <div class=" col-sm-4 action">
                <a href="/fofs/1/index.php/<?php echo ($link); ?>" class="btn btn-lg"><?php echo (L("start_app")); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <!--banner结束-->
  <!--新闻列表-->
  <div class="container mp30">

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">

          <div class="panel-heading">

            <span class="glyphicon glyphicon-list-alt"></span> 
            <b>新闻资讯</b>
            <a href="<?php echo U('Home/Index/newsList');?>" style ='float:right;'>更多</a>
          </div>

          <div class="panel-body">

            <div class="row">

              <div class="col-xs-12">

                <ul id="demo1">

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                </ul>

              </div>

            </div>

          </div>

          <div class="panel-footer"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">

          <div class="panel-heading">

            <span class="glyphicon glyphicon-list-alt"></span> 
            <b>政策法规</b>
            <a href="#" style ='float:right;'>更多</a>
          </div>

          <div class="panel-body">

            <div class="row">

              <div class="col-xs-12">

                <ul id="demo2">

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                </ul>

              </div>

            </div>

          </div>

          <div class="panel-footer"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">

          <div class="panel-heading">

            <span class="glyphicon glyphicon-list-alt"></span>
            <b>投资事件</b>
            <a href="#" style ='float:right;'>更多</a>
          </div>

          <div class="panel-body">

            <div class="row">

              <div class="col-xs-12">

                <ul id="demo3">

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                </ul>

              </div>

            </div>

          </div>

          <div class="panel-footer"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">

          <div class="panel-heading">

            <span class="glyphicon glyphicon-list-alt"></span>
            <b>联盟活动</b>
            <a href="#" style ='float:right;'>更多</a>
          </div>

          <div class="panel-body">

            <div class="row">

              <div class="col-xs-12">

                <ul id="demo4">

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                  <li class="news-item">
                    <div class='news_title'>
                        Curabitur porttitor ante eget hendrerit adipiscing
                    </div> 
                     Maecenas at magna accumsan,rhoncus neque id, fringilla dolor.
                    <a href="#">Read more...</a>
                  </li>

                </ul>

              </div>

            </div>

          </div>

          <div class="panel-footer"></div>
        </div>
      </div>
    </div>
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