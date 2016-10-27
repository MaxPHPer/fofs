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
          <div class="col-md-4 main-content">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><span class="glyphicon glyphicon-home"></span><?php echo ($user['institution_fullname_cn']); ?></div>
                <div class="panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <?php if($user['institution_logo_img'] != NULL): ?><img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/lp_pic/<?php echo ($user['institution_logo_img']); ?>" alt="头像" height="100" width="100">
                        <?php else: ?>
                          <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/lp_pic/default.jpg" alt="头像" height="100" width="100"><?php endif; ?>
                      </a>
                    </div>
                    <div class="media-body" style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">

                      <p><i class="fa fa-envelope-o fa-md"></i> <?php echo ($user['email']); ?></p>
                      <p><i class="glyphicon glyphicon-th-list"></i>LP</p>
                      <a class="btn btn-default" href="allFunds.html" role="button">修改管理的基金</a>
                    </div>
                  </div>
                </div>
              </div><!--头像-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Lp/individualProfile');?>">
                      <span class="glyphicon glyphicon-home"></span>机构主页
                      
                    </a>
                  </div>
                </div>
              </div><!--机构主页-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Lp/myCompany');?>">
                      <span class="glyphicon glyphicon-user"></span>机构成员
                      
                    </a>
                  </div>
                </div>
              </div><!--机构成员-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Lp/accountSetting');?>">
                      <span class="glyphicon glyphicon-pencil"></span>账号设置
                      
                    </a>
                  </div>
                </div>
              </div><!--账号设置-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Lp/inbox');?>">
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
                      <a href="<?php echo U('Home/Lp/myFollows');?>" class="list-group-item">关注我的<span class="badge"><?php echo ($amount['checking']); ?></span></a>
                      <a href="<?php echo U('Home/Lp/myFollowing');?>" class="list-group-item ">我关注的<span class="badge"><?php echo ($amount['accepted']); ?></span></a>
                      
                    </div>
                  </div>
                </div>
              </div><!--圈子-->
            </div>
          </div>
          <div class="col-md-8">
            <div class="well">
              <h3>修改基金信息</h3>
              <hr/>
              <form class="form-horizontal" action=""  method="post" name='form1'>
                <div class="panel-body">
                    <!--已有基金产品-->

                    <?php if(is_array($funds)): foreach($funds as $key=>$vo): ?><div class="row">
                            <div class="col-sm-3">
                              <label for="userName" class="col-sm-12 control-label"><b>基金产品</b></label>
                            </div>
                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  <span class="glyphicon glyphicon-th-list"></span>基金名称
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="name" name="name"  value="<?php echo ($vo['name']); ?>" />  
                                  <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo ($vo['id']); ?>" />                          
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  成立时间
                                </div>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" id="founded_time" name="founded_time"  value="<?php echo date('Y-m-d',$vo['founded_time']); ?>"/>                            
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  注册地点
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="registered_address" name="registered_address"  value="<?php echo ($vo['registered_address']); ?>"/>                            
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  币种
                                </div>
                                <div class="col-sm-4">
                                  <select class="form-control" id="currency_type_id" name="currency_type_id">
                                    
                                  <?php if($vo['currency_type_id'] == 0): ?><option value='0' selected>人民币RMB</option><?php else: ?><option value='0'>人民币RMB</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 1): ?><option value='1' selected>美元USD</option><?php else: ?><option value='1'>美元USD</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 2): ?><option value='2' selected>日元JPY</option><?php else: ?><option value='2'>日元JPY</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 3): ?><option value='3' selected>欧元EUR</option><?php else: ?><option value='3'>欧元EUR</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 4): ?><option value='4' selected>英镑GBP</option><?php else: ?><option value='4'>英镑GBP</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 5): ?><option value='5' selected>德国马克DEM</option><?php else: ?><option value='5'>德国马克DEM</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 6): ?><option value='6' selected>瑞士法郎CHF</option><?php else: ?><option value='6'>瑞士法郎CHF</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 7): ?><option value='7' selected>法国法郎FRF</option><?php else: ?><option value='7'>法国法郎FRF</option><?php endif; ?> 
                                  <?php if($vo['currency_type_id'] == 8): ?><option value='8' selected>加拿大元CAD</option><?php else: ?><option value='8'>加拿大元CAD</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 9): ?><option value='9' selected>澳大利亚元AUD</option><?php else: ?><option value='9'>澳大利亚元AUD</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 10): ?><option value='10' selected>港币HKD</option><?php else: ?><option value='10'>港币HKD</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 11): ?><option value='11' selected>俄罗斯卢布SUR</option><?php else: ?><option value='11'>俄罗斯卢布SUR</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 12): ?><option value='12' selected>新加坡元SGD</option><?php else: ?><option value='12'>新加坡元SGD</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 13): ?><option value='13' selected>韩国元KRW</option><?php else: ?><option value='13'>韩国元KRW</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 14): ?><option value='14' selected>泰铢THB</option><?php else: ?><option value='14'>泰铢THB</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 15): ?><option value='15' selected>奥地利先令ATS</option><?php else: ?><option value='15'>奥地利先令ATS</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 16): ?><option value='16' selected>芬兰马克FIM</option><?php else: ?><option value='16'>芬兰马克FIM</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 17): ?><option value='17' selected>比利时法郎BEF</option><?php else: ?><option value='17'>比利时法郎BEF</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 18): ?><option value='18' selected>爱尔兰镑IEP</option><?php else: ?><option value='18'>爱尔兰镑IEP</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 19): ?><option value='19' selected>意大利里拉ITL</option><?php else: ?><option value='19'>意大利里拉ITL</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 20): ?><option value='20' selected>卢森堡法郎LUF</option><?php else: ?><option value='20'>卢森堡法郎LUF</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 21): ?><option value='21' selected>荷兰盾NLG</option><?php else: ?><option value='21'>荷兰盾NLG</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 22): ?><option value='22' selected>葡萄牙埃斯库多PTE</option><?php else: ?><option value='22'>葡萄牙埃斯库多PTE</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 23): ?><option value='23' selected>西班牙比塞塔ESP</option><?php else: ?><option value='23'>西班牙比塞塔ESP</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 24): ?><option value='24' selected>印尼盾IDR</option><?php else: ?><option value='24'>印尼盾IDR</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 25): ?><option value='25' selected>马来西亚林吉特MYR</option><?php else: ?><option value='25'>马来西亚林吉特MYR</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 26): ?><option value='26' selected>新西兰元NZD</option><?php else: ?><option value='26'>新西兰元NZD</option><?php endif; ?>
                                  <?php if($vo['currency_type_id'] == 27): ?><option value='27' selected>菲律宾比索PHP</option><?php else: ?><option value='27'>菲律宾比索PHP</option><?php endif; ?>

                                  </select>
              
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  基金规模(万元)
                                </div>
                                <div class="col-sm-4">
                                  <input type="number" class="form-control" id="fund_size" name="fund_size"  value="<?php echo ($vo['fund_size']); ?>"/>                            
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  基金类型
                                </div>
                                <div class="col-sm-4">
                                    <select name="fund_property" id="fund_property" class="form-control">
                                       <?php if($vo['fund_property'] == 1): ?><option value='1' selected>政府引导基金</option><?php else: ?><option value='1'>政府引导基金</option><?php endif; ?>
                                       <?php if($vo['fund_property'] == 2): ?><option value='2' selected>民营资本市场化运作基金</option><?php else: ?><option value='2'>民营资本市场化运作基金</option><?php endif; ?>
                                       <?php if($vo['fund_property'] == 3): ?><option value='3' selected>国企参与市场化基金</option><?php else: ?><option value='3'>国企参与市场化基金</option><?php endif; ?>

                                    </select>                           
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  基金投资类型
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-3 ">
                                    <?php if($vo['is_investment_security'] == 1): ?><input class="icheckbox_flat-blue" id="is_investment_security" type="checkbox" name="fund_type[]" value="is_investment_security" checked/>

                                    <?php else: ?>
                                        <input class="icheckbox_flat-blue" id="is_investment_security" type="checkbox" name="fund_type[]" value="is_investment_security" /><?php endif; ?>
                                    
                                    证券投资基金
                                  </div>
                                  <div class="col-sm-3 ">
                                    <?php if($vo['is_equity_investment'] == 1): ?><input class="icheckbox_flat-blue" id="is_equity_investment" type="checkbox" name="fund_type[]" value="is_equity_investment" checked/>

                                    <?php else: ?>
                                        <input class="icheckbox_flat-blue" id="is_equity_investment" type="checkbox" name="fund_type[]" value="is_equity_investment" /><?php endif; ?>
                                    
                                    股权投资基金
                                  </div>
                                  <div class="col-sm-3 ">
                                    <?php if($vo['is_venture_investment'] == 1): ?><input class="icheckbox_flat-blue" id="is_venture_investment" type="checkbox" name="fund_type[]" value="is_venture_investment" checked/>

                                    <?php else: ?>
                                        <input class="icheckbox_flat-blue" id="is_venture_investment" type="checkbox" name="fund_type[]" value="is_venture_investment" /><?php endif; ?>
                                    创业投资基金
                                  </div>
                                  <div class="col-sm-3 ">
                                    <?php if($vo['is_other_investment'] == 1): ?><input class="icheckbox_flat-blue" id="is_other_investment" type="checkbox" name="fund_type[]" value="is_other_investment" checked/>

                                    <?php else: ?>
                                        <input class="icheckbox_flat-blue" id="is_other_investment" type="checkbox" name="fund_type[]" value="is_other_investment" /><?php endif; ?>
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
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="trustee_name" name="trustee_name"  value="<?php echo ($vo['trustee_name']); ?>"/>                            
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                 主要投资领域
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="investment_field" name="investment_field"  value="<?php echo ($vo['investment_field']); ?>"/>                            
                                </div>

                            </div>

                        </div>

                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  运作状态
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-3 ">
                                    <input class="icheckbox_flat-blue" id="is_recruitment_period_0" type="radio" name="is_recruitment_period" value="0" <?php if($vo['is_recruitment_period'] == 0) echo 'checked'; ?>/>
                                    封闭
                                  </div>
                                  <div class="col-sm-3 ">
                                    <input class="icheckbox_flat-blue" id="is_recruitment_period_1" type="radio" name="is_recruitment_period" value="1" <?php if($vo['is_recruitment_period'] == 1) echo 'checked'; ?>/>
                                    募集期
                                  </div>      
                                  <div class="col-sm-2 ">
                                    上传募集方案
                                  </div>
                                  <div class="col-sm-4 ">
                                  <a href="/fofs/1/Public/Uploads/lp_recruitment/<?php echo ($vo['recruitment_plan_url']); ?>" target="_Blank">已传方案</a><input type="file" class="form-control" id="recruitment_plan_url" name="recruitment_plan_url" >
                                  </div>  

                                                       
                                </div>

                            </div>

                        </div>


                        <div class="row" style="margin-top:10px;">
                            
                            <div>
                                <div class="col-sm-3 text_right">
                                  中基协备案状况
                                </div>
                                <div class="col-sm-9">
                                  <div class="col-sm-3 ">
                                    <input class="icheckbox_flat-blue" id="is_recorded_0" type="radio" name="is_recorded" value="0" <?php if($vo['is_recorded'] == 0) echo 'checked'; ?>>
                                    未备案
                                  </div>
                                  <div class="col-sm-3 ">
                                    <input class="icheckbox_flat-blue" id="is_recorded_1" type="radio" name="is_recorded" value="1" <?php if($vo['is_recorded'] == 1) echo 'checked'; ?>>
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
                                <div class="col-sm-3 text_right">
                                  基金编号
                                </div>
        
                                <div class="col-sm-4 ">
                                  <input type="text" class="form-control" id="fund_number" name="fund_number"  value="<?php echo ($vo['fund_number']); ?>"/>   
                                </div>
                                <div class="col-sm-2 ">
                                  备案时间
                                </div>  
                                <div class="col-sm-3 ">
                                  <input type="date" class="form-control" id="recorded_time" name="recorded_time"  value="<?php echo date('Y-m-d',$vo['recorded_time']); ?>"/>   
                                </div>                       
                              

                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-4">
                              <label for="userName" class="col-sm-12 control-label"><b>该基金已投基金/项目</b></label>
                            </div>
                        </div>


                        <?php if(is_array($vo['investment_projects'])): foreach($vo['investment_projects'] as $project_key=>$investment_project): ?><div class="row" style="margin-top:10px;">
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            <span class="glyphicon glyphicon-tree-deciduous"></span>基金项目<?php echo ($project_key+1); ?>名称
                                          </div>
                                          <div class="col-sm-6">
                                            <?php echo ($investment_project['project_name']); ?>                          
                                          </div>

                                          <div class="col-sm-3 text_right">
                                              <span class="glyphicon glyphicon-trash"></span><a href="<?php echo U('Home/Lp/deleteInvestment');?>?id=<?php echo ($investment_project['id']); ?>">删除</a>
                                          </div>

                                      </div>

                                  </div>
                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            基金项目简介
                                          </div>
                                          <div class="col-sm-8">
                                            <textarea class="form-control"   disabled><?php echo ($investment_project['project_abstract']); ?></textarea>
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
                                              <select  class="form-control" disabled>
                                                    <?php switch($investment_project['project_state_type']): case "1": ?><option value ="1">死亡</option><?php break;?>
                                                          <?php case "2": ?><option value ="2">Pre-IPO</option><?php break;?>
                                                          <?php case "3": ?><option value ="3">M&A</option><?php break;?>
                                                          <?php case "4": ?><option value ="4">上市</option><?php break; endswitch;?>
                                              </select>  
                                          </div>

                                      </div>

                                  </div><?php endforeach; endif; ?>

                        <div class="repeat">
                          <div class="row" style="margin-top:10px;">
                            
                              <div>
                                  <div class="col-sm-3 text_right">
                                    基金项目名称
                                  </div>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="project_name" name="investment_project[project_name][]"  />                            
                                  </div>

                              </div>

                          </div>
                          <div class="row" style="margin-top:10px;">
                            
                              <div>
                                  <div class="col-sm-3 text_right">
                                    基金项目简介
                                  </div>
                                  <div class="col-sm-4">
                                    <textarea class="form-control" id="project_abstract" name="investment_project[project_abstract][]" ></textarea>
                                  </div>

                              </div>

                          </div>
                          <div class="row" style="margin-top:10px;">
                            
                              <div>
                                  <div class="col-sm-3 text_right">
                                    投资额度
                                  </div>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="investment_quota" name="investment_project[investment_quota][]"  />                            
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
                                    <input type="text" class="form-control" id="investment_round" name="investment_project[investment_round][]"  /> 
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
                                    <input type="date" class="form-control" id="investment_time" name="investment_project[investment_time][]"  />                            
                                  </div>

                              </div>

                          </div>
                          <div class="row borderBottom" style="margin-top:10px;">
                            
                              <div>
                                  <div class="col-sm-3 text_right">
                                    项目现状
                                  </div>
                                  <div class="col-sm-4">
                                      <select name="investment_project[project_state_type][]" id="project_state_type" class="form-control">

                                          <option value ="1">死亡</option>
                                          <option value ="2">Pre-IPO</option>
                                          <option value ="3">M&A</option>
                                          <option value ="4">上市</option>

                                      </select>  
                                  </div>

                              </div>

                          </div>

                        </div>
                        <div class="row">
                          <div class="col-sm-7"></div>
                          <div class="col-sm-5 text_right">
                            <button type="button" class="btn btn-primary" id="addNew4" >再添加该基金已投基金/项目</button>
                          </div>
                        </div>

                        <div class="row">
                              <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary" id="" onclick="form1.action='/fofs/1/index.php/Home/Lp/do_modifyFund';form1.submit();">保存修改</button>
                              </div>
                        </div><?php endforeach; endif; ?>

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