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
                        <?php if($user['institution_logo_img'] != NULL): ?><img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/<?php echo ($user['institution_logo_img']); ?>" alt="头像" height="100" width="100">
                          <?php else: ?>
                          <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/default.jpg" alt="头像" height="100" width="100"><?php endif; ?>
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
                              <?php echo ($user['institution_fullname_en']); ?>
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
              
              <?php if($user['institution_type'] == 4): ?><div class="row margin_top_20">
                    <div class='col-md-12'>
                      <h3><span class="glyphicon glyphicon-home"></span>服务内容和费用</h3>
                      <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="row">
                                <div class='col-md-12'>
                                   <?php echo ($user['services_and_fees']); ?>
                                </div>
                            </div>

                        </div>
                      </div>
                    </div>
                </div>
              <?php else: ?>
                <div class="row margin_top_20">
                    <div class='col-md-12'>
                      <h3><span class="glyphicon glyphicon-home"></span>基本信息</h3>
                      <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="row">
                                <div class='col-md-3 text_right'>
                                    服务地域:
                                </div>
                                <div class='col-md-8'>
                                    <?php echo ($user['service_area']); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class='col-md-3 text_right'>
                                    成立时间:
                                </div>
                                <div class='col-md-8'>
                                  <?php echo date('Y-m-d',$user['founded_time']); ?>
                                </div>
                            </div>

                        </div>
                      </div>
                    </div>
                </div><?php endif; ?>


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
                                  <?php echo ($user['contact_mobilephone']); ?>
                              </div>
                          </div>

                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  电话:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['contact_telephone']); ?>
                              </div>
                          </div>

                          <div class="row">
                            <div class='col-md-3 text_right'>邮箱:</div>
                            <div class='col-md-8'><?php echo ($user['contact_email']); ?></div>
                          </div>

                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  机构微信:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['company_wechat']); ?>
                              </div>
                          </div>
                          <div class="row">
                              <div class='col-md-3 text_right'>
                                  机构网站:
                              </div>
                              <div class='col-md-8'>
                                  <?php echo ($user['company_web']); ?>
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

              <?php if($user['institution_type'] == 4): ?><div class="row margin_top_20">
                    <div class='col-md-12'>
                      <h3><span class="glyphicon glyphicon-saved"></span>成功案例</h3>
                      <div class="panel panel-default">
                        <div class="panel-body">
                           
                          <?php if(is_array($products)): foreach($products as $key=>$vo): ?><div class="repeat">
                                <div class="row" style="margin-top:10px;">
                                  
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          <span class="glyphicon glyphicon-tree-deciduous" style="color:black;"></span>(<?php echo ($key+1); ?>)融资公司
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="invested_company" name="invested_company"  value="<?php echo ($vo['invested_company']); ?>" disabled />                            
                                        </div>

                                    </div>

                                </div>
                                <div class="row" style="margin-top:10px;">
                                  
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          投资人
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="investor" name="investor"  value="<?php echo ($vo['investor']); ?>" disabled/>
                                        </div>

                                    </div>

                                </div>
                                <div class="row" style="margin-top:10px;">
                                    
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          币种
                                        </div>
                                        <div class="col-sm-4">
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
                                          投资额度
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="investment_quota" name="investment_quota"  value="<?php echo ($vo['investment_quota']); ?>" disabled/>                            
                                        </div>

                                    </div>

                                </div>
                                <div class="row" style="margin-top:10px;">
                                  
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          投资轮次
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="investment_round" name="investment_round"  value="<?php echo ($vo['investment_round']); ?>" disabled/> 
                                        </div>

                                    </div>

                                </div>
                                <div class="row borderBottom" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            投资时间
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="date" class="form-control" id="founded_time" name="founded_time"  value="<?php echo date('Y-m-d',$vo['founded_time']); ?>" disabled/> 
                                          </div>

                                      </div>

                                  </div>  
                                
                              </div><?php endforeach; endif; ?>
                        </div>
                      </div>
                    </div>
                </div>
              <?php else: ?>
                <div class="row margin_top_20">
                    <div class='col-md-12'>
                      <h3><span class="glyphicon glyphicon-saved"></span>服务/产品</h3>
                      <div class="panel panel-default">
                        <div class="panel-body">
                           
                          <?php if(is_array($products)): foreach($products as $key=>$vo): ?><div class="repeat">
                                <div class="row" style="margin-top:10px;">
                                  
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          <span class="glyphicon glyphicon-tree-deciduous" style="color:black;"></span>(<?php echo ($key+1); ?>)名称
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="name" name="name"  value="<?php echo ($vo['name']); ?>" disabled />                            
                                        </div>

                                    </div>

                                </div>
                                <div class="row" style="margin-top:10px;">
                                  
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          详细内容
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="content" name="content"  value="<?php echo ($vo['content']); ?>" disabled/>
                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="margin-top:10px;">
                                  
                                    <div>
                                        <div class="col-sm-3 text_right">
                                          价格(元)
                                        </div>
                                        <div class="col-sm-4">
                                          <input type="text" class="form-control" id="price" name="price"  value="<?php echo ($vo['price']); ?>" disabled/>                            
                                        </div>

                                    </div>

                                </div>
                                
                              </div><?php endforeach; endif; ?>
                        </div>
                      </div>
                    </div>
                </div><?php endif; ?>
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