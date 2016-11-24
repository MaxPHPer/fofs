<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>中国母基金联盟</title>

    <!-- Bootstrap Core CSS -->
    <link href="/fofs/1/Public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/fofs/1/Public/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/fofs/1/Public/assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/fofs/1/Public/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/fofs/1/Public/assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/fofs/1/Public/assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/fofs/1/Public/assets/css/common.css" rel="stylesheet">
</head>
<body>




    <div id="wrapper">

        
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/fofs/1/index.php/Admin/Index/index" style="font-size:30px;">中国母基金联盟后台管理系统</a>
  </div>
  <!-- /.navbar-header -->

  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>欢迎你,<?php echo ($username); ?><i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
<!--         <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
        </li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li> -->
        <li><a href="/fofs/1/index.php/Admin/Index/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
      </ul>
      <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->

  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu" style="padding-bottom: 300px;">
        <?php if($is_admin == 2): ?><li>
            <a href="#"><i class="fa fa-dashboard fa-fw"></i> 系统管理<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="/fofs/1/index.php/Admin/Manager/modify_manager">查看管理员</a>
              </li>
              <li>
                <a href="/fofs/1/index.php/Admin/Manager/new_manager">新增管理员</a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li><?php endif; ?>

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>用户管理<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=1">LP</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=2">GP</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=3">创业公司</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=4">Fa</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=5">法务服务机构</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=6">财务服务结构</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=7">众创空间</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=8">其它机构</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/allUsers?institution_type=9">个人用户</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>新闻资讯<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=1">新添新闻</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=1">查看所有新闻</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>政策法规<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=2">新添政策法规</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=2">查看所有政策法规</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>投资事件<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=3">新添投资事件</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=3">查看所有投资事件</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>联盟活动<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=4">新添联盟活动</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=4">查看所有联盟活动</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>关于我们<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=5">新添关于我们</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=5">查看所有关于我们</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>法律声明<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=6">新添法律声明</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=6">查看所有法律声明</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>联系我们<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=7">新添联系我们</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=7">查看所有联系我们</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>加入我们<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=8">新添加入我们</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=8">查看所有加入我们</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>联盟介绍<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=9">新添联盟介绍</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=9">查看所有联盟介绍</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>组织架构<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=10">新添组织架构</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=10">查看所有组织架构</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>联盟成员<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=11">新添联盟成员</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=11">查看所有联盟成员</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>秘书长<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=12">新添秘书长</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=12">查看所有秘书长</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>合作伙伴<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=13">新添合作伙伴</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=13">查看所有合作伙伴</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>加入联盟<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=14">新添加入联盟</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=14">查看所有加入联盟</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>合作<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=15">新添合作</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=15">查看所有合作</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->

        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>用户协议<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Article/add_article?article_type=16">新添用户协议</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Article/all_articles?article_type=16">查看所有用户协议</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <!--文章管理-->



      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>


        <div id="page-wrapper">
                <section class="content-wrap" style="margin-top:30px;">
                  <div class="container">
                    <div class="row">

                      <div class="col-md-10">
                        <div class="well">
              <h3>用户主页

              </h3>
              <hr/>
              
              <div class="row">
                  <div class='col-md-2'>
                      <a href="#">
                        <?php if($user['head_portrait_url'] != NULL): ?><img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/individual_pic/<?php echo ($user['head_portrait_url']); ?>" alt="头像" height="100" width="100">
                          <?php else: ?>
                          <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/individual_pic/default.jpg" alt="头像" height="100" width="100"><?php endif; ?>
                      </a>
                  </div>


                  <div class='col-md-10'>
                      <div class="row">
                          <div class='col-md-2 text_right'>
                              姓名:
                          </div>
                          <div class='col-md-10'>
                              <?php echo ($user['username']); ?>(<?php echo ($user['nickname']); ?>)
                          </div>
                      </div>
                      <div class="row">
                          <div class='col-md-2 text_right'>
                              性别:
                          </div>
                          <div class='col-md-10'>
                            <?php switch($user['sex']): case "male": ?>男<?php break;?>
                              <?php case "female": ?>女<?php break;?>
                              <?php default: ?>保密<?php endswitch;?>
                          </div>
                      </div>
                      <div class="row">
                          <div class='col-md-2 text_right'>
                              简介:
                          </div>
                          <div class='col-md-10'>
                              <?php echo ($user['abstract']); ?>
                          </div>
                      </div>
                      <div class="row">
                          <div class='col-md-2 text_right'>
                              行业:
                          </div>
                          <div class='col-md-10'>
                             
                              <?php switch($user['profession']): case "0": ?>请选择机构类型<?php break;?>
                                <?php case "1": ?>母基金<?php break;?>
                                <?php case "2": ?>基金<?php break;?>
                                <?php case "3": ?>创业公司<?php break;?>
                                <?php case "4": ?>FA机构<?php break;?>
                                <?php case "5": ?>法务机构<?php break;?>
                                <?php case "6": ?>财务机构<?php break;?>
                                <?php case "7": ?>众创空间<?php break;?>
                                <?php case "8": ?>其它(媒体、政府机构等)<?php break; endswitch;?>
                          </div>
                      </div>

                  </div>
              </div>

              <div class="row margin_top_20">
                  <div class='col-md-12'>
                    <h3><span class="glyphicon glyphicon-tags"></span>从业简历</h3>
                    <div class="panel panel-default">
                      <div class="panel-body">

                          <div class="col-md-12">
                             
                                  <?php echo ($user['business_experience']); ?>
                             
                          </div>
                          
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row margin_top_20">
                  <div class='col-md-12'>
                    <h3><span class="glyphicon glyphicon-home"></span>公司信息</h3>
                    <div class="panel panel-default">
                      <div class="panel-body">

                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  名称:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['company_name']); ?>
                              </div>
                          </div>
                          <div class="row">
                            <div class='col-md-3 text_right'>职位:</div>
                            <div class='col-md-8'><?php echo ($user['company_function']); ?></div>
                          </div>
                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  认证情况:
                              </div>
                              <div class='col-md-8'>
                              <?php switch($user['is_authenticated']): case "1": ?><span class="label label-info">已认证</span><?php break;?>
                                  <?php default: ?><span class="label label-default">未认证</span><?php endswitch;?>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>


              <div class="row margin_top_20">
                  <div class='col-md-12'>
                    <h3><span class="glyphicon glyphicon-earphone"></span>联系方式</h3>
                    <div class="panel panel-default">
                      <div class="panel-body">

                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  手机:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['phone']); ?>
                              </div>
                          </div>
                          <div class="row">
                            <div class='col-md-3 text_right'>邮箱:</div>
                            <div class='col-md-8'><?php echo ($user['email']); ?></div>
                          </div>
                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  LinkedIn:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['linkedin']); ?>
                              </div>
                          </div>
                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  新浪微博:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['weibo']); ?>
                              </div>
                          </div>
                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  微信:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['wechat']); ?>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
               &nbsp;
            </div>
                      </div>
                    </div>
                  </div>
                </section>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="/fofs/1/Public/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/fofs/1/Public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/fofs/1/Public/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/fofs/1/Public/assets/dist/js/sb-admin-2.js"></script>

</body>

</html>