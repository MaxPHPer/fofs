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
              <form id="search_form" method="post" action="#">
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
                <a href="/fofs/1/index.php/Home/Buyer/inbox">新消息</a>
              </li>
              <li>
                <a href="/fofs/1/index.php/Home/Buyer/buyProfile"><?php echo ($username); ?></a>
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
                <a href="/fofs/1/index.php/Home/supplier/inbox">新消息</a>
              </li>
              <li>
                <a href="/fofs/1/index.php/Home/supplier/supplierProfile"><?php echo ($username); ?></a>
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
      <a href="#">首页</a>
    </li>
    <li role="presentation">
      <a href="#">关于联盟</a>
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
      <a href="#">合作</a>
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
<div class="buyProfile content">
  <div class="navigation">
    <div class="container">
      <ul class="nav nav-justified masthead-nav">
        <li role="presentation"><a href="/fofs/1/index.php/Home/Buyer/buyProfile"><?php echo (L("dashboard")); ?></a></li>
        <li role="presentation" class="active"><a href="/fofs/1/index.php/Home/Buyer/inbox"><?php echo (L("inbox")); ?></a></li>
        <li role="presentation"><a href="/fofs/1/index.php/Home/Buyer/supplier"><?php echo (L("supplier")); ?></a></li>
        <li role="presentation"><a href="/fofs/1/index.php/Home/Buyer/project"><?php echo (L("project")); ?></a></li>
      </ul>
    </div><!-- container -->
  </div><!-- navigation -->
  <hr/>
  <div class="content-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
         <div class="panel panel-default">        
            <div class="panel-heading"><?php echo (L("admin")); ?></div>
            <div class="panel-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <?php if($user['face_url'] != NULL): ?><img class="media-object img-thumbnail" src="/selectin/1/Public/uploads/buyer_pic/<?php echo ($user['face_url']); ?>" alt="头像" height="64" width="64">
                      <?php else: ?>
                        <img class="media-object img-thumbnail" src="/selectin/1/Public/uploads/buyer_pic/temp.jpg" alt="头像" height="64" width="64"><?php endif; ?>
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading"><?php echo ($user['username']); ?></h5>
                  <p><i class="fa fa-envelope-o fa-lg"></i> <?php echo ($user['email']); ?></p>
                  <p><i class="fa fa-phone fa-lg"></i> <?php echo ($user['mobile_phone']); ?></p>
                  <a class="btn btn-default" href="/fofs/1/index.php/Home/Buyer/buyerPersonalInfo" role="button"><?php echo (L("edit_personal_profile")); ?></a>
                </div>
              </div><!-- media -->
            </div><!-- panel-body -->
            <div class="list-group">
              <a href="?type=1" class="list-group-item "><?php echo (L("inbox")); ?><span class="badge"><?php echo ($amount['receive']); ?></span></a>
              <a href="?type=2" class="list-group-item"><?php echo (L("send_yet")); ?><span class="badge"><?php echo ($amount['send']); ?></span></a>
            </div><!-- list-group -->
          </div><!-- panel panel-default -->
        </div><!-- col-md-4 -->
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th><?php echo (L("type")); ?></th>
                    <th>
                      <?php if($pgtype != '1'): echo (L("receiver")); ?>
                        <?php else: echo (L("from")); endif; ?>
                    </th>
                    <th><?php echo (L("subject")); ?></th>
                    <th><?php echo (L("received_time")); ?></th>
                    <th><?php echo (L("status")); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($msg)): foreach($msg as $key=>$msg): ?><tr>
                    <td>
                      <?php switch($msg['type']): case "1": echo (L("rfi")); break;?>
                        <?php case "2": echo (L("message")); break; endswitch;?>
                    </td>
                    <td>
                      <?php if($pgtype == 2): ?><a href="/fofs/1/index.php/Home/Buyer/viewsupplierPersonalInfo/id/<?php echo ($msg['recipient_id']); ?>"><?php echo ($msg['user']); ?><i class="fa fa-user"></i></a>
                      <?php else: ?>
                        <?php if($msg['type'] == 2): ?><a href="/fofs/1/index.php/Home/Buyer/viewsupplierPersonalInfo/id/<?php echo ($msg['sender_id']); ?>"><?php echo ($msg['user']); ?><i class="fa fa-user"></i></a>
                        <?php else: ?>
                          <a href="/fofs/1/index.php/Home/Buyer/viewsupplierPersonalInfo/id/<?php echo ($msg['recipient_id']); ?>"><?php echo ($msg['user']); ?><i class="fa fa-user"></i></a><?php endif; endif; ?>
                    </td>
                    <td>
                    <?php switch($msg['type']): case "1": echo (L("rfi")); break;?>
                        <?php case "2": echo (L("message")); break; endswitch;?>
                      <?php if($msg['type'] == 2): ?><i type="button" class="fa fa-envelope-o " data-toggle="modal" data-target="#normalModal"
                        onclick="get_normalletter(this);" name="<?php echo ($msg['id']); ?>" id="<?php echo ($pgtype); ?>"></i><?php endif; ?>
                      <?php if(($msg['type'] == 1) AND ($msg['state'] != '0') AND ($pgtype != 2)): ?><i type="button" class="fa fa-envelope-o " data-toggle="modal" data-target="#rfiModal"
                        onclick="get_rfiletter(this);" name="<?php echo ($msg['id']); ?>"></i><?php endif; ?>
                    </td>
                    <td><?php echo ($msg['time']); ?></td>
                    <td>
                      <?php switch($msg['state']): case "已读": echo (L("read")); break;?>
                        <?php case "未读": echo (L("unread")); break;?>
                        <?php case "已发送": echo (L("send_yet")); break;?>
                        <?php case "未确认": echo (L("rfi_waiting_for_response")); break;?>
                        <?php case "已同意": echo (L("rfi_accepted")); break;?>
                        <?php case "已拒绝": echo (L("rfi_declined")); break; endswitch;?>
                    </td>
                  </tr><?php endforeach; endif; ?>
                </tbody>
              </table>
            </div><!-- panel-body -->
          </div><!-- panel panel-default -->
        </div><!-- col-md-8 -->
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- content-wrap -->
</div><!-- content -->
<div class="modal fade" id="rfiModal" role="dialog" aria-label aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id='rfi_letter'>
      
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal fade -->

<div class="modal fade" id="normalModal" role="dialog" aria-label aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content" id='ordinary_letter'>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal fade -->

<div class="modal fade" id="ReplyMessage" tabindex="-1" role="dialog" aria-labelledby="sendMessageLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id='reply_letter'>
        
      </div>
    </div>
  </div><!-- modal fade -->
<br/>
<footer class="footer">
  <div class="footerLink">
    <a href="#">关于我们</a>
    <a href="#">法律声明</a>
    <a href="#">联系我们</a>
    <a href="#">加入我们</a>
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