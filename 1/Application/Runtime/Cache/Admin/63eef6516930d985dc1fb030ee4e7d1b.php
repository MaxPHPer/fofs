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
    <a class="navbar-brand" href="/fofs/1/index.php/Admin/Index/index">中国母基金联盟</a>
  </div>
  <!-- /.navbar-header -->

  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>欢迎你,<?php echo ($username); ?><i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
        </li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li>
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
      <ul class="nav" id="side-menu">

        <li>
          <a href="#"><i class="fa fa-dashboard fa-fw"></i> 系统管理<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Manager/modify_manager">查看管理员</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Manager/new_manager">新增管理员</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Manager/group_manager">群组权限管理</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        
        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i> 信息设置<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/System/modify_function">职能表</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/System/modify_country">国家代码</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/System/modify_province">省份代码</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/System/modify_area">区域划分</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i> 目录相关<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Process/modify_first">加工工艺一级目录</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Process/modify_second">加工工艺二级目录</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Process/modify_third">加工工艺三级目录</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Process/modify_unit">单位设置</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i> 认证相关<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Criteria/modify_system">体系认证标准</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Criteria/modify_product">产品体系认证标准</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Criteria/modify_body">认证机构</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
        <li>
          <a href="#"><i class="fa fa-edit fa-fw"></i> 公司相关<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_stock">上市地点</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_industry">行业分类</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_company">公司类型</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_currency">货币类型</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_ability">信息技术与物流能力问题</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_ability_choice">信息技术与物流能力回答</a>
            </li>
            <li>
              <a href="/fofs/1/index.php/Admin/Company/modify_recommand">推荐渠道</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
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


      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">添加问题</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form action='/fofs/1/index.php/Admin/Business/add_new_question' method='post'>
                <div class="form-group col-sm-6">
                  <label>问题名称</label>
                  <input class='form-control' id='question' placeholder='问题名称' type='text' name='question'/>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-6">
                  <label>英文</label>
                  <input class='form-control' id='question_en' placeholder='英文' type='text' name='question_en'/>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-sm-6">
                  <label>选项类型</label>
                    <select name="is_multiple_answer" class="form-control">
                      <option value="1">多选</option>
                      <option value="0">单选</option>
                    </select>
                </div>
              <div class="clearfix"></div>
                <div class="col-sm-6">
                  <button class='btn btn-primary'>提交</button>
                </div>
            </form>
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