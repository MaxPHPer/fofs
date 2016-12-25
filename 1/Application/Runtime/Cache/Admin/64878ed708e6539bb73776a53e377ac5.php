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
                          <h3>机构主页

                          </h3>
                          <hr/>
                          
                          <div class="row">
                              <div class='col-md-2'>
                                  <a href="#">
                                    <?php if($user['institution_logo_img'] != NULL): ?><img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/lp_pic/<?php echo ($user['institution_logo_img']); ?>" alt="头像" height="100" width="100">
                                      <?php else: ?>
                                      <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/lp_pic/default.jpg" alt="头像" height="100" width="100"><?php endif; ?>
                                  </a>
                              </div>


                              <div class='col-md-10'>
                                  <div class="row">
                                      <div class='col-md-2 text_right'>
                                          中文全称:
                                      </div>
                                      <div class='col-md-10'>
                                          <?php echo ($user['institution_fullname_cn']); ?>(<?php echo ($user['institution_abbr']); ?>)
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class='col-md-2 text_right'>
                                          英文全称:
                                      </div>
                                      <div class='col-md-10'>
                                          <?php echo ($user['institution_fullname_en']); ?>(<?php echo ($user['institution_fullname_en']); ?>)
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class='col-md-2 text_right'>
                                          简介:
                                      </div>
                                      <div class='col-md-10'>
                                          <?php echo ($user['institution_abstract']); ?>
                                      </div>
                                  </div>

                              </div>
                          </div>

                          <div class="row margin_top_20">
                              <div class='col-md-12'>
                                <h3><span class="glyphicon glyphicon-home"></span>机构基本信息</h3>
                                <div class="panel panel-default">
                                  <div class="panel-body">

                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              是否联盟成员:
                                          </div>
                                          <div class='col-md-8'>
                                          <?php switch($user['is_fofs_member']): case "1": ?><span class="label label-info">是</span><?php break;?>
                                              <?php default: ?><span class="label label-default">不是</span>(<a href='#'>申请认证</a>)<?php endswitch;?>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              组织机构代码:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php echo ($user['organization_code']); ?>
                                          </div>
                                      </div>

                                      <div class="row">
                                        <div class='col-md-3 text_right'>注册地址:</div>
                                        <div class='col-md-8'><?php echo ($user['registered_addr']); ?></div>
                                      </div>

                                      <div class="row">
                                        <div class='col-md-3 text_right'>办公地址:</div>
                                        <div class='col-md-8'><?php echo ($user['office_addr']); ?></div>
                                      </div>

                                      <div class="row">
                                        <div class='col-md-3 text_right'>注册资本:</div>
                                        <div class='col-md-8'><?php echo ($user['registered_capital']); ?></div>
                                      </div>

                                      <div class="row">
                                        <div class='col-md-3 text_right'>实缴资本:</div>
                                        <div class='col-md-8'><?php echo ($user['contributed_capital']); ?></div>
                                      </div>

                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              管理基金类型:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php if($user['is_securities_fund'] == 1): ?>证券投资基金<?php endif; ?>
                                              <?php if($user['is_stock_fund'] == 1): ?>股权投资基金<?php endif; ?>
                                              <?php if($user['is_startup_fund'] == 1): ?>创业投资基金<?php endif; ?>
                                              <?php if($user['is_other_fund'] == 1): ?>其它投资基金<?php endif; ?>
                                          </div>
                                      </div>

                                      <div class="row">
                                        <div class='col-md-3 text_right'>员工数量:</div>
                                        <div class='col-md-8'><?php echo ($user['number_of_employees']); ?></div>
                                      </div>

                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              中国证券投资基金协会登记:
                                          </div>
                                          <?php switch($user['is_association_registration']): case "1": ?><div class="col-md-2">
                                                    <span class="label label-info">已登记</span>
                                                  </div>
                                                  <div class="col-md-4">
                                                    编号 :<?php echo ($user['association_registration_number']); ?>
                                                  </div>
                                                  <div class="col-md-3">
                                                    时间 :<?php echo date('Y-m-d',$user['association_registration_time']); ?>
                                                  </div><?php break;?>
                                              <?php default: ?><span class="label label-default">尚未登记</span><?php endswitch;?>
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
                                              联系人:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php echo ($user['contact_username']); ?>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              手机:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php echo ($user['contact_phone']); ?>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class='col-md-3 text_right'>邮箱:</div>
                                        <div class='col-md-8'><?php echo ($user['contact_email']); ?></div>
                                      </div>
                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              传真:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php echo ($user['contact_fax']); ?>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              机构微信:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php echo ($user['contact_institution_wechat']); ?>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class='col-md-3 text_right'>
                                              机构网站:
                                          </div>
                                          <div class='col-md-8'>
                                              <?php echo ($user['contact_institution_web']); ?>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                          </div>

                          <div class="row margin_top_20">
                              <div class='col-md-12'>
                                <h3><span class="glyphicon glyphicon-user"></span>管理团队</h3>
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                      <!--已有团队成员-->
                                      <?php if(is_array($members)): foreach($members as $key=>$vo): ?><div id="" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="">
                                            <div class="panel-body">
                                              <div class="repeat_people ">
                                                <div class="borderBottom" style="margin-bottom:20px;">
                                                  <div class="row" >
                                                    <div class="col-sm-3 text_right">
                                                      
                                                        姓名:
                                  
                                                    </div>

                                                    <div class="col-sm-8">

                                                          <?php echo ($vo['username']); ?>
                                                          <?php if($vo['is_representative'] == 1): ?>&nbsp;&nbsp;法定代表人/执行事务合伙人（委派代表）<?php endif; ?>

                                                    </div>

                                                  </div>

                                                  <div class="row" style="margin-top:10px;">
                                                    <div class="col-sm-3 text_right">
                                                      
                                                        职务:
                                  
                                                    </div>

                                                    <div class="col-sm-8">

                                                          <?php echo ($vo['function']); ?>

                                                    </div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-sm-3 text_right">
                                                        从业经历:
                                                      </div>
                                                  </div>

                                                  <div class="repeat">
                                                    <?php if(is_array($vo['business_experience'])): foreach($vo['business_experience'] as $key=>$business_experience): ?><div class="row" style="margin-top:10px;">
                                                          
                                                          <div class="col-sm-3 text_right">
                                                                <?php echo ($business_experience['company_name']); ?>
                                                          </div>
                                                         
                                                            
                                                          <div class="col-sm-3">
                                                                <?php echo ($business_experience['function']); ?>
                                                          </div>

                                                          <div class="col-sm-6">
                                                            <?php echo ($business_experience['start_time']); ?>-<?php echo ($business_experience['end_time']); ?>
                                                          </div>
                                                
                                                        </div><?php endforeach; endif; ?>
                                                  </div>

                                                </div>
                                              </div>

                                            </div>
                                          </div><?php endforeach; endif; ?>
                                  </div>
                                </div>
                              </div>
                          </div>

                          <div class="row margin_top_20">
                              <div class='col-md-12'>
                                <h3><span class="glyphicon glyphicon-saved"></span>基金产品</h3>
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                      <!--已有基金产品-->
                                      <div class="row" >
                                        <div class="col-sm-3 text_right">
                                          
                                            <label for="userName" ><span>*</span>管理基金数量</label>
                      
                                        </div>

                                        <div class="col-sm-8">

                                              <?php echo ($total_funds_num); ?>

                                        </div>

                                      </div>



                                      <div class="row" style="margin-top:10px;">
                                        <div class="col-sm-3 text_right">
                                          
                                            <label for="userName" ><span>*</span>基金总规模</label>
                      
                                        </div>

                                        <div class="col-sm-8">

                                              <?php echo ($total_funds_size); ?>&nbsp;(万人民币)
                                        </div>
                                      </div>
                                      <?php if(is_array($funds)): foreach($funds as $key=>$vo): ?><div class="row">
                                            <div class="col-sm-3 text_right">
                                              <label for="userName" ><b>基金产品 <?php echo ($key+1); ?>:</b></label>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  基金名称
                                                </div>
                                                <div class="col-sm-8">
                                                  <?php echo ($vo['name']); ?>                            
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  成立时间
                                                </div>
                                                <div class="col-sm-8">
                                                  <?php echo date('Y-m-d',$vo['founded_time']); ?>                        
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  注册地点
                                                </div>
                                                <div class="col-sm-8">
                                                  <?php echo ($vo['registered_address']); ?>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  币种
                                                </div>
                                                <div class="col-sm-8">
                                                  <select class="form-control" id="currency_type_id" name="currency_type_id" disabled>
                                                  <?php switch($vo['currency_type_id']): case "0": ?><option value='0'>人民币RMB</option><?php break;?>
                                                    <?php case "1": ?><option value='1'>美元USD</option><?php break;?> 
                                                    <?php case "2": ?><option value='2'>日元JPY</option><?php break;?> 
                                                    <?php case "3": ?><option value='3'>欧元EUR</option><?php break;?> 
                                                    <?php case "4": ?><option value='4'>英镑GBP</option><?php break;?> 
                                                    <?php case "5": ?><option value='5'>德国马克DEM</option><?php break;?> 
                                                    <?php case "6": ?><option value='6'>瑞士法郎CHF</option><?php break;?> 
                                                    <?php case "7": ?><option value='7'>法国法郎FRF</option><?php break;?> 
                                                    <?php case "8": ?><option value='8'>加拿大元CAD</option><?php break;?> 
                                                    <?php case "9": ?><option value='9'>澳大利亚元AUD</option><?php break;?> 
                                                    <?php case "10": ?><option value='10'>港币HKD</option><?php break;?> 
                                                    <?php case "11": ?><option value='11'>俄罗斯卢布SUR</option><?php break;?> 
                                                    <?php case "12": ?><option value='12'>新加坡元SGD</option><?php break;?> 
                                                    <?php case "13": ?><option value='13'>韩国元KRW</option><?php break;?> 
                                                    <?php case "14": ?><option value='14'>泰铢THB</option><?php break;?> 
                                                    <?php case "15": ?><option value='15'>奥地利先令ATS</option><?php break;?> 
                                                    <?php case "16": ?><option value='16'>芬兰马克FIM</option><?php break;?> 
                                                    <?php case "17": ?><option value='17'>比利时法郎BEF</option><?php break;?> 
                                                    <?php case "18": ?><option value='18'>爱尔兰镑IEP</option><?php break;?> 
                                                    <?php case "19": ?><option value='19'>意大利里拉ITL</option><?php break;?> 
                                                    <?php case "20": ?><option value='20'>卢森堡法郎LUF</option><?php break;?> 
                                                    <?php case "21": ?><option value='21'>荷兰盾NLG</option><?php break;?> 
                                                    <?php case "22": ?><option value='22'>葡萄牙埃斯库多PTE</option><?php break;?> 
                                                    <?php case "23": ?><option value='23'>西班牙比塞塔ESP</option><?php break;?> 
                                                    <?php case "24": ?><option value='24'>印尼盾IDR</option><?php break;?> 
                                                    <?php case "25": ?><option value='25'>马来西亚林吉特MYR</option><?php break;?> 
                                                    <?php case "26": ?><option value='26'>新西兰元NZD</option><?php break;?> 
                                                    <?php case "27": ?><option value='27'>菲律宾比索PHP</option><?php break; endswitch;?>
                                                    


                                                  </select>
                              
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  基金规模(万元)
                                                </div>
                                                <div class="col-sm-8">
                                                  <?php echo ($vo['fund_size']); ?>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  基金类型
                                                </div>
                                                <div class="col-sm-8">
                                                    <select name="fund_property" id="fund_property" class="form-control" disabled>


                                                      <?php if($vo['is_government_guidance'] == 1): ?><option value ="1">政府引导基金</option><?php endif; ?>
                                                      <?php if($vo['is_private_capital'] == 1): ?><option value ="2">民营资本市场化运作基金</option><?php endif; ?>
                                                      <?php if($vo['is_state_owned'] == 1): ?><option value ="3">国企参与市场化基金</option><?php endif; ?>

                                                    </select>                           
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  基金投资类型
                                                </div>
                                                <div class="col-sm-8">
                                                  <div class="col-sm-3 ">
                                                  <input class="icheckbox_flat-blue" id="is_investment_security" type="checkbox" name="fund_type[]" value="is_investment_security" <?php if($vo['is_investment_security']==1) echo' checked'; ?> />
                                                    证券投资基金
                                                  </div>
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue" id="is_equity_investment" type="checkbox" name="fund_type[]" value="is_equity_investment" <?php if($vo['is_equity_investment']==1) echo' checked'; ?> />
                                                    股权投资基金
                                                  </div>
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue" id="is_venture_investment" type="checkbox" name="fund_type[]" value="is_venture_investment" <?php if($vo['is_venture_investment']==1) echo' checked'; ?> />
                                                    创业投资基金
                                                  </div>
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue" id="is_other_investment" type="checkbox" name="fund_type[]" value="is_other_investment" <?php if($vo['is_other_investment']==1) echo' checked'; ?> />
                                                    其它投资基金
                                                  </div>                        
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  托管人名称
                                                </div>
                                                <div class="col-sm-8">
                                                  <?php echo ($vo['trustee_name']); ?>                          
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  主要投资领域
                                                </div>
                                                <div class="col-sm-4">
                                                  <?php echo ($vo['investment_field']); ?>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  运作状态
                                                </div>
                                                <div class="col-sm-8">
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recruitment_period']==0) echo' checked'; ?>/>
                                                    封闭
                                                  </div>
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recruitment_period']==1) echo' checked'; ?>/>
                                                    募集期
                                                  </div>      
                                                  <div class="col-sm-2 ">
                                                    募集方案
                                                  </div>
                                                  <div class="col-sm-4 ">
                                                      <a href="/fofs/1/Public/uploads/lp_recruitment/<?php echo ($vo['recruitment_plan_url']); ?>" ><?php echo ($vo['recruitment_plan_url']); ?></a>
                                                  </div>  

                                                                       
                                                </div>

                                            </div>

                                        </div>


                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-3 text_right">
                                                  中基协备案状况
                                                </div>
                                                <div class="col-sm-8">
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recorded']==0) echo' checked'; ?>/>
                                                    未备案
                                                  </div>
                                                  <div class="col-sm-3 ">
                                                    <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recorded']==1) echo' checked'; ?>/>
                                                    已备案
                                                  </div>  
                                                  <div class="col-sm-6 ">
                                                    (若已备案则填写下面基金编号、备案时间)
                                                  </div>                       
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row" style="margin-top:10px;">
                                            
                                            <div>
                                                <div class="col-sm-2 text_right">
                                                 基金编号:
                                                </div>
                        
                                                <div class="col-sm-4 ">
                                                  <?php echo ($vo['fund_number']); ?>
                                                </div>
                                                <div class="col-sm-2 ">
                                                  备案时间:
                                                </div>  
                                                <div class="col-sm-4 ">
                                                  <?php echo date('Y-m-d',$vo['recorded_time']); ?>
                                                </div>                       
                                              

                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6  ">
                                              <label for="userName" class="col-sm-12 control-label"><b>该基金已投基金/项目</b></label>
                                            </div>
                                        </div>


                                        <div class="">
                                        <?php if(is_array($vo['investment_projects'])): foreach($vo['investment_projects'] as $project_key=>$investment_project): ?><div class="row" style="margin-top:10px;">
                                                      <div>
                                                          <div class="col-sm-3 text_right">
                                                            基金项目<?php echo ($project_key+1); ?>名称
                                                          </div>
                                                          <div class="col-sm-8">
                                                            <?php echo ($investment_project['project_name']); ?>                          
                                                          </div>

                                                      </div>

                                                  </div>
                                                  <div class="row" style="margin-top:10px;">
                                                    
                                                      <div>
                                                          <div class="col-sm-3 text_right">
                                                            基金项目简介
                                                          </div>
                                                          <div class="col-sm-8">
                                                            <textarea class="form-control" id="project_abstract" name="investment_project[project_abstract][]"  disabled><?php echo ($investment_project['project_abstract']); ?></textarea>
                                                          </div>

                                                      </div>

                                                  </div>
                                                  <div class="row" style="margin-top:10px;">
                                                    
                                                      <div>
                                                          <div class="col-sm-3 text_right">
                                                            投资额度
                                                          </div>
                                                          <div class="col-sm-4">
                                                              <?php echo ($investment_project['investment_quota']); ?>                         
                                                          </div>
                                                          <div class="col-sm-2">
                                                            万元
                                                          </div>

                                                      </div>

                                                  </div>
                                                  <div class="row" style="margin-top:10px;">
                                                    
                                                      <div>
                                                          <div class="col-sm-3 text_right">
                                                            项目投资轮次
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <?php echo ($investment_project['investment_round']); ?>
                                                          </div>
                                                          <div class="col-sm-2">
                                                            (基金无)
                                                          </div>

                                                      </div>

                                                  </div>
                                                  <div class="row" style="margin-top:10px;">
                                                    
                                                      <div>
                                                          <div class="col-sm-3 text_right">
                                                            投资时间
                                                          </div>
                                                          <div class="col-sm-4">
                                                            <?php echo date('Y-m-d',$investment_project['investment_time']); ?>                  
                                                          </div>

                                                      </div>

                                                  </div>
                                                  <div class="row borderBottom" style="margin-top:10px;">
                                                    
                                                      <div>
                                                          <div class="col-sm-3 text_right">
                                                            项目现状
                                                          </div>
                                                          <div class="col-sm-4">
                                                              <select name="investment_project[project_state_type][]" id="project_state_type" class="form-control" disabled>
                                                                    <?php switch($investment_project['project_state_type']): case "1": ?><option value ="1">死亡</option><?php break;?>
                                                                          <?php case "2": ?><option value ="2">Pre-IPO</option><?php break;?>
                                                                          <?php case "3": ?><option value ="3">M&A</option><?php break;?>
                                                                          <?php case "4": ?><option value ="4">上市</option><?php break; endswitch;?>
                                                              </select>  
                                                          </div>

                                                      </div>

                                                  </div><?php endforeach; endif; endforeach; endif; ?>
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