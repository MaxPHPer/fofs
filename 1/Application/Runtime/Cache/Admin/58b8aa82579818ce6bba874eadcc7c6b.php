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
    <a class="navbar-brand" href="/fofs/1/index.php/Admin/Index/index">中国母基金联盟后台管理系统</a>
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
      <ul class="nav" id="side-menu" style="margin-bottom: 300px;">
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
          <a href="#"><i class="fa fa-edit fa-fw"></i> 业务相关<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Business/modify_question">业务合规问题</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Business/modify_choice">问题选项</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>推荐码管理<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/RefferalCode/product_code">生成推荐码</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/RefferalCode/code_manage">已存在的二维码</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i>用户管理<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/User/modify_buyer">采购商</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/User/modify_supplier">供应商</a>
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

    <div class="row">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top: 20px;">

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <div class="panel-title">
                    <div class="collapsed">
                      所有
                      <?php switch($article_type): case "1": ?>新闻资讯<?php break;?>
                                <?php case "2": ?>政策法规<?php break;?>
                                <?php case "3": ?>投资事件<?php break;?>
                                <?php case "4": ?>联盟活动<?php break;?>
                                <?php case "5": ?>关于我们<?php break;?>
                                <?php case "6": ?>法律声明<?php break;?>
                                <?php case "7": ?>联系我们<?php break;?>
                                <?php case "8": ?>加入我们<?php break;?>
                                <?php case "9": ?>联盟介绍<?php break;?>
                                <?php case "10": ?>组织架构<?php break;?>
                                <?php case "11": ?>联盟成员<?php break;?>
                                <?php case "12": ?>秘书长<?php break;?>
                                <?php case "13": ?>合作伙伴<?php break;?>
                                <?php case "14": ?>加入联盟<?php break;?>
                                <?php case "15": ?>合作<?php break;?>
                                <?php case "16": ?>用户协议<?php break; endswitch;?>
                      
                    </div>
                  </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <div class="list-group">
                      <?php if(is_array($news)): foreach($news as $key=>$vo): ?><div class="list-group-item">
                          <a href="<?php echo U('Admin/Article/article_detail');?>?article_id=<?php echo ($vo['id']); ?>" >
                            <?php echo ($vo['title']); ?>
                          </a>
                            <div style="float: right;">
                              <div style="float: right; margin-right:25px;">
                                <a href="<?php echo U('Admin/Article/delete_article');?>?article_id=<?php echo ($vo['id']); ?>&article_type=<?php echo ($article_type); ?>" >
                                  <span class="glyphicon glyphicon-remove"></span>
                                  删除
                                </a>
                              </div>
                              <div style="float: right; margin-right:25px;">
                                <a href="<?php echo U('Admin/Article/edit_article');?>?article_id=<?php echo ($vo['id']); ?>&article_type=<?php echo ($article_type); ?>" >
                                  <span class="glyphicon glyphicon-pencil"></span>
                                  修改
                                </a>
                              </div>
                              
                              <div style="float: right; margin-right:25px;">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <?php echo date('Y-m-d H:i:s',$vo['pub_time']) ?>
                              </div>
                              <div style="float: right; margin-right:25px;">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php switch($vo['institution_type']): case "1": ?>LP<?php break;?>
                                    <?php case "2": ?>GP<?php break;?>
                                    <?php case "3": ?>创业公司<?php break;?>
                                    <?php case "4": ?>FA<?php break;?>
                                    <?php case "5": ?>法务服务机构<?php break;?>
                                    <?php case "6": ?>财务服务机构<?php break;?>
                                    <?php case "7": ?>众创空间<?php break;?>
                                    <?php case "8": ?>其它机构<?php break;?>
                                    <?php case "9": ?>个人<?php break;?>
                                    <?php case "10": ?>中国母基金联盟<?php break; endswitch;?>
                                &nbsp;&nbsp;
                                <?php echo ($vo['author_name']); ?>
                     
                              </div>

                            </div>

                   
                          </div><?php endforeach; endif; ?>

                    </div>
                  </div>
                </div>

                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body center">
                    
                      <?php echo ($page); ?>
                 
                  </div>
                </div>
              </div><!--新闻列表-->


            </div>
    </div>
    <!-- /.row -->
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