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
  <div class="buyProfile content" style="margin-top:30px;    background-color: #F9F7F6;">

    <section class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-4 main-content">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><span class="glyphicon glyphicon-home"></span><?php echo ($user['company_name']); ?></div>
                <div class="panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <?php if($user['head_portrait_url'] != NULL): ?><img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/individual_pic/<?php echo ($user['head_portrait_url']); ?>" alt="头像" height="100" width="100">
                        <?php else: ?>
                          <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/individual_pic/default.jpg" alt="头像" height="100" width="100"><?php endif; ?>
                      </a>
                    </div>
                    <div class="media-body" style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                      <h5 class="media-heading"><?php echo ($user['username']); ?></h5>
                      <p><i class="fa fa-envelope-o fa-md"></i> <?php echo ($user['email']); ?></p>
                      <p><i class="fa fa-phone fa-md"></i> <?php echo ($user['phone']); ?></p>
                      <a class="btn btn-default" href="modifyPersonalInfo" role="button"><?php echo (L("edit_personal_profile")); ?></a>
                    </div>
                  </div>
                </div>
              </div><!--头像-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Individual/individualProfile');?>">
                      <span class="glyphicon glyphicon-user"></span>个人主页
                      
                    </a>
                  </div>
                </div>
              </div><!--个人主页-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Individual/myCompany');?>">
                      <span class="glyphicon glyphicon-home"></span>我的公司
                      
                    </a>
                  </div>
                </div>
              </div><!--我的公司-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Individual/accountSetting');?>">
                      <span class="glyphicon glyphicon-pencil"></span>账号设置
                      
                    </a>
                  </div>
                </div>
              </div><!--账号设置-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Individual/inbox');?>">
                      <span class="glyphicon glyphicon-envelope"></span>消息
                      <?php if($amount['unread'] != 0): ?><span class="badge"><?php echo ($amount['unread']); ?></span><?php endif; ?>
                    </a>
                  </div>
                </div>
              </div><!--消息-->
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <div class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span class="glyphicon glyphicon-globe"></span>圈子
                    </a>
                  </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <div class="list-group">
                      <a href="<?php echo U('Home/Individual/myFollows');?>" class="list-group-item">关注我的<span class="badge"><?php echo ($amount['checking']); ?></span></a>
                      <a href="<?php echo U('Home/Individual/myFollowing');?>" class="list-group-item ">我关注的<span class="badge"><?php echo ($amount['accepted']); ?></span></a>
                      
                    </div>
                  </div>
                </div>
              </div><!--圈子-->
            </div>
          </div>
          <div class="col-md-8">
            <div class="well">
              <h3>修改个人信息</h3>
              <hr/>
          <div class="panel-body">
            <form class="form-horizontal" action="/fofs/1/index.php/Home/Individual/save_individualInfo" enctype="multipart/form-data" method="post" >
              <div class="form-group">
                <label for="nickname" class="col-sm-3 control-label"><span>*</span>昵称</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo ($user['nickname']); ?>" required/>
                </div>
              </div><!--用户名-->

              <div class="form-group">
                <label for="head_portrait_url" class="col-sm-3 control-label">上传头像(上传限制:500k)</label>
                <div class="col-sm-8">
                  <a href=""></a>
                  <input type="file" class="form-control" id="head_portrait_url" name="head_portrait_url" >
                </div>
              </div><!--上传头像-->
              <div class="form-group">
                <label for="profession" class="col-sm-3 control-label"><span>*</span>所属行业</label>
                <div class="col-sm-8">
                  <select name="profession" id="profession" class="form-control">
                      <?php switch($user['profession']): case "1": ?><option value ="0">请选择机构类型</option>
                          <option value ="1" selected>母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "2": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2" selected>基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "3": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3" selected>创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "4": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4" selected>FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "5": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5" selected>法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "6": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6" selected>财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "7": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7" selected>众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php break;?>
                        <?php case "8": ?><option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8" selected>其它(媒体、政府机构等)</option><?php break;?>

                        <?php default: ?>
                          <option value ="0">请选择机构类型</option>
                          <option value ="1">母基金</option>
                          <option value="2">基金</option>
                          <option value="3">创业公司</option>
                          <option value ="4">FA机构</option>
                          <option value="5">法务机构</option>
                          <option value="6">财务机构</option>
                          <option value ="7">众创空间</option>
                          <option value="8">其它(媒体、政府机构等)</option><?php endswitch;?>

                  </select>
                </div>
              </div><!--所属行业-->
              
              
            
              <div class="form-group">

                <label for="company_name" class="col-sm-3 control-label"><span>*</span>公司</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo ($user['company_name']); ?>" required/>
                </div>
  
                <label for="company_function" class="col-sm-2 control-label"><span>*</span>职务</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="company_function" name="company_function" value="<?php echo ($user['company_function']); ?>" required/>
                </div>
              </div><!--职位-->
    
              <div class="form-group">
                <label for="username" class="col-sm-3 control-label"><span>*</span>姓名</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo ($user['username']); ?>" required/>
                </div>
              </div><!--姓名-->

              <div class="form-group">
                <label for="sex" class="col-sm-3 control-label">性别</label>
                <div class="col-sm-8">
                  <select name="sex" id="sex" class="form-control">
                      <?php switch($user['sex']): case "male": ?><option value ="secret">请选择性别</option>
                          <option value ="male" selected>男</option>
                          <option value="female">女</option><?php break;?>
                        <?php case "female": ?><option value ="secret">请选择性别</option>
                          <option value ="male" >男</option>
                          <option value="female" selected>女</option><?php break;?>
                        <?php default: ?>
                          <option value ="secret" selected>请选择性别</option>
                          <option value ="male" >男</option>
                          <option value="female" >女</option><?php endswitch;?>
                  </select>
                </div>
              </div><!--性别-->

              <div class="form-group">
                <label for="abstract" class="col-sm-3 control-label">简介</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="abstract" name="abstract" value="<?php echo ($user['abstract']); ?>"/>
                </div>
              </div><!--简介-->


              <div class="form-group">
                <label for="phone" class="col-sm-3 control-label">手机</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo ($user['phone']); ?>"/>
                </div>
              </div><!--手机-->



              <div class="form-group">
                <label for="email" class="col-sm-3 control-label"><span>*</span><?php echo (L("email")); ?></label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" disabled="disabled" value="<?php echo ($user['email']); ?>" required/>
                </div>
              </div><!--电子邮件-->


              <div class="form-group">
                <label for="linkedin" class="col-sm-3 control-label">LinkedIn</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?php echo ($user['linkedin']); ?>"/>
                </div>
              </div><!--LinkedIn-->


              <div class="form-group">
                <label for="weibo" class="col-sm-3 control-label">新浪微博</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="weibo" name="weibo" value="<?php echo ($user['weibo']); ?>"/>
                </div>
              </div><!--新浪微博-->
              

              <div class="form-group">
                <label for="wechat" class="col-sm-3 control-label">微信</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="wechat" name="wechat" value="<?php echo ($user['wechat']); ?>"/>
                </div>
              </div><!--微信-->

              <div class="form-group">
                <label for="business_experience" class="col-sm-3 control-label">从业经历</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="business_experience" name="business_experience" ><?php echo ($user['business_experience']); ?></textarea>
                </div>
              </div><!--从业经历-->

              <input type="hidden" name="id" value="<?php echo ($user['id']); ?>">
            <div class="alert alert-warning" role="alert">
              <span>*</span>必填
            </div>
            <input type="submit" value="保存修改" class="btn btn-block btn-primary"/> 
          </div>
          </form>
               &nbsp;
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