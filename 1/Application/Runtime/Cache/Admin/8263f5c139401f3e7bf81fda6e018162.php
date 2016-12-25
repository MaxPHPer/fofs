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


<!--新添加新闻-->
    <script type="text/javascript" charset="utf-8" src="/fofs/1/Data/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/fofs/1/Data/Ueditor/ueditor.all.min.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->  
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->  
    <script type="text/javascript" charset="utf-8" src="/fofs/1/Data/Ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');

    </script>
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
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          新添加
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
        </h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <section id='content' style="margin-top:20px">
        <form action='/fofs/1/index.php/Admin/Article/do_add_article' method='post'>
          <div class='container-fluid'>
            <div class='row-fluid' id='content-wrapper'>
              <div class='span12'>
                <div class='row-fluid'>
                  <div class='span12 box'>

                    <div class='box-content'>
                      <table class='table table-striped table-bordered' id='inplaceediting-user' style='margin-top: 20px'>
                        <tbody>
                        <tr>
                          <td style='width:10%'>标题</td>
                          <td style='width:90%'>
                          <?php if($article_type<=4){ echo "<input type='text' name='title' placeholder='标题'/>"; }else{ switch($article_type){ case 5: $title='关于我们'; break; case 6: $title='法律声明'; break; case 7: $title='联系我们'; break; case 8: $title='加入我们'; break; case 9: $title='联盟介绍'; break; case 10: $title='组织架构'; break; case 11: $title='联盟成员'; break; case 12: $title='秘书长'; break; case 13: $title='合作伙伴'; break; case 14: $title='加入联盟'; break; case 15: $title='合作'; break; case 16: $title='用户协议'; break; } echo $title; echo "<input type='hidden' name='title' value='".$title."' />"; } ?>
                            
                          </td>
                        </tr><!--帮助标题-->
                        <tr>
                          <td style='width:10%'>类别</td>
                          <td style='width:90%'>
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
                              <input type="hidden" name="article_type" value="<?php echo ($article_type); ?>">
                          </td>
                        </tr><!--帮助类别-->
                       
                        <tr  >
                          <td >内容</td>
                          <!-- <td>
                            <a href='#' id='inplaceediting-pencil'>
                              <i class='icon-pencil'></i>
                              [编辑]
                            </a>
                            <div class='editable' data-original-title='Enter notes' data-pk='1' data-toggle='manual' data-type='wysihtml5' id='inplaceediting-note' tabindex='-1'>
                            </div>
                          </td> -->
                          <td >
                             <script id="editor" name='content' type="text/plain" style="width:900px;height:500px;">帮助详细介绍，可以编辑内容</script>
                          </td>
                        </tr><!--内容-->
                        <tr>
                        </tr>
                        </tbody>
                      </table>
                      <div style="margin-left: 90%">
                        <button class='btn btn-primary'>提交</button>
                      </div>
                      <div class='clearfix'></div>
                      <hr class='hr-normal' />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </section>

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