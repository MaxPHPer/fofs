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
                        <?php if($user['institution_logo_img'] != NULL): ?><img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/<?php echo ($user['institution_logo_img']); ?>" alt="头像" height="100" width="100">
                        <?php else: ?>
                          <img class="media-object img-thumbnail" src="/fofs/1/Public/uploads/default.jpg" alt="头像" height="100" width="100"><?php endif; ?>
                      </a>
                    </div>
                    <div class="media-body" style=" overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">

                      <p><i class="fa fa-envelope-o fa-md"></i> <?php echo ($user['email']); ?></p>
                      <p><i class="glyphicon glyphicon-th-list"></i>
                          <?php switch($user['institution_type']): case "4": ?>FA<?php break;?>
                            <?php case "5": ?>法务机构<?php break;?>
                            <?php case "6": ?>财务机构<?php break;?>
                            <?php case "7": ?>众创空间(孵化器)<?php break; endswitch;?>
                      </p>
                      <a class="btn btn-default" href="modifyCompanyInfo.html" role="button">修改机构信息</a><a class="btn btn-default" href="allCases.html" role="button" style="margin-left:10px;"><?php if($user['institution_type'] == 4): ?>成功案例<?php else: ?>产品服务<?php endif; ?></a>
                    </div>
                  </div>
                </div>
              </div><!--头像-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Sa/individualProfile');?>">
                      <span class="glyphicon glyphicon-home"></span>机构主页
                      
                    </a>
                  </div>
                </div>
              </div><!--机构主页-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Sa/myCompany');?>">
                      <span class="glyphicon glyphicon-user"></span>机构成员
                      
                    </a>
                  </div>
                </div>
              </div><!--机构成员-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Sa/accountSetting');?>">
                      <span class="glyphicon glyphicon-pencil"></span>账号设置
                      
                    </a>
                  </div>
                </div>
              </div><!--账号设置-->

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <div class="panel-title">
                    <a href="<?php echo U('Home/Sa/inbox');?>">
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
                      <a href="<?php echo U('Home/Sa/myFollows');?>" class="list-group-item">关注我的<span class="badge"><?php echo ($amount['checking']); ?></span></a>
                      <a href="<?php echo U('Home/Sa/myFollowing');?>" class="list-group-item ">我关注的<span class="badge"><?php echo ($amount['accepted']); ?></span></a>
                      
                    </div>
                  </div>
                </div>
              </div><!--圈子-->
            </div>
          </div>
          <div class="col-md-8">
            <div class="well">
              <h3>所有<?php if($user['institution_type'] == 4): ?>成功案例<?php else: ?>产品服务<?php endif; ?>&nbsp;(<a href="<?php echo U('Home/Sa/addCase');?>">添加新<?php if($user['institution_type'] == 4): ?>成功案例<?php else: ?>产品服务<?php endif; ?></a>)</h3>
              <hr/>
            <form class="form-horizontal" action=""  method="post" name='form1'>
               
              <div class="row margin_top_20">
                  <div class='col-md-12'>
                    <h3><span class="glyphicon glyphicon-saved"></span><?php if($user['institution_type'] == 4): ?>成功案例<?php else: ?>产品服务<?php endif; ?></h3>
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <!--已有服务产品-->
                        <?php if($user['institution_type'] == 4): if(is_array($products)): foreach($products as $key=>$vo): ?><div class="repeat">
                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            <span class="glyphicon glyphicon-tree-deciduous" style="color:black;"></span>(<?php echo ($key+1); ?>)融资公司
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="invested_company" name="invested_company"  value="<?php echo ($vo['invested_company']); ?>"   />
                                            <input type="hidden" class="form-control"  name="id"  value="<?php echo ($vo['id']); ?>"   />                            
                                          </div>
                                          
                                      </div>

                                  </div>
                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            投资人
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="investor" name="investor"  value="<?php echo ($vo['investor']); ?>"  />
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
                                            
                                              <option value='0' <?php if($vo['currency_type_id'] == 0): ?>selected = "selected"<?php endif; ?> >人民币RMB</option>
                                              <option value='1' <?php if($vo['currency_type_id'] == 1): ?>selected = "selected"<?php endif; ?> >美元USD</option>
                                              <option value='2' <?php if($vo['currency_type_id'] == 2): ?>selected = "selected"<?php endif; ?> >日元JPY</option>
                                              <option value='3' <?php if($vo['currency_type_id'] == 3): ?>selected = "selected"<?php endif; ?> >欧元EUR</option>
                                              <option value='4' <?php if($vo['currency_type_id'] == 4): ?>selected = "selected"<?php endif; ?> >英镑GBP</option>
                                              <option value='5' <?php if($vo['currency_type_id'] == 5): ?>selected = "selected"<?php endif; ?> >德国马克DEM</option>
                                              <option value='6' <?php if($vo['currency_type_id'] == 6): ?>selected = "selected"<?php endif; ?> >瑞士法郎CHF</option>
                                              <option value='7' <?php if($vo['currency_type_id'] == 7): ?>selected = "selected"<?php endif; ?> >法国法郎FRF</option>
                                              <option value='8' <?php if($vo['currency_type_id'] == 8): ?>selected = "selected"<?php endif; ?> >加拿大元CAD</option>
                                              <option value='9' <?php if($vo['currency_type_id'] == 9): ?>selected = "selected"<?php endif; ?> >澳大利亚元AUD</option>
                                              <option value='10' <?php if($vo['currency_type_id'] == 10): ?>selected = "selected"<?php endif; ?> >港币HKD</option>
                                              <option value='11' <?php if($vo['currency_type_id'] == 11): ?>selected = "selected"<?php endif; ?> >俄罗斯卢布SUR</option>
                                              <option value='12' <?php if($vo['currency_type_id'] == 12): ?>selected = "selected"<?php endif; ?> >新加坡元SGD</option>
                                              <option value='13' <?php if($vo['currency_type_id'] == 13): ?>selected = "selected"<?php endif; ?> >韩国元KRW</option>
                                              <option value='14' <?php if($vo['currency_type_id'] == 14): ?>selected = "selected"<?php endif; ?> >泰铢THB</option>
                                              <option value='15' <?php if($vo['currency_type_id'] == 15): ?>selected = "selected"<?php endif; ?> >奥地利先令ATS</option>
                                              <option value='16' <?php if($vo['currency_type_id'] == 16): ?>selected = "selected"<?php endif; ?> >芬兰马克FIM</option>
                                              <option value='17' <?php if($vo['currency_type_id'] == 17): ?>selected = "selected"<?php endif; ?> >比利时法郎BEF</option>
                                              <option value='18' <?php if($vo['currency_type_id'] == 18): ?>selected = "selected"<?php endif; ?> >爱尔兰镑IEP</option>
                                              <option value='19' <?php if($vo['currency_type_id'] == 19): ?>selected = "selected"<?php endif; ?> >意大利里拉ITL</option>
                                              <option value='20' <?php if($vo['currency_type_id'] == 20): ?>selected = "selected"<?php endif; ?> >卢森堡法郎LUF</option>
                                              <option value='21' <?php if($vo['currency_type_id'] == 21): ?>selected = "selected"<?php endif; ?> >荷兰盾NLG</option>
                                              <option value='22' <?php if($vo['currency_type_id'] == 22): ?>selected = "selected"<?php endif; ?> >葡萄牙埃斯库多PTE</option>
                                              <option value='23' <?php if($vo['currency_type_id'] == 23): ?>selected = "selected"<?php endif; ?> >西班牙比塞塔ESP</option>
                                              <option value='24' <?php if($vo['currency_type_id'] == 24): ?>selected = "selected"<?php endif; ?> >印尼盾IDR</option>
                                              <option value='25' <?php if($vo['currency_type_id'] == 25): ?>selected = "selected"<?php endif; ?> >马来西亚林吉特MYR</option>
                                              <option value='26' <?php if($vo['currency_type_id'] == 26): ?>selected = "selected"<?php endif; ?> >新西兰元NZD</option>
                                              <option value='27' <?php if($vo['currency_type_id'] == 27): ?>selected = "selected"<?php endif; ?> >菲律宾比索PHP</option>

                                          

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
                                            <input type="text" class="form-control" id="investment_quota" name="investment_quota"  value="<?php echo ($vo['investment_quota']); ?>"  />                            
                                          </div>

                                      </div>

                                  </div>
                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            投资轮次
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="investment_round" name="investment_round"  value="<?php echo ($vo['investment_round']); ?>"  /> 
                                          </div>

                                      </div>

                                  </div>
                                  <div class="row borderBottom" style="margin-top:10px;">
                                      
                                        <div>
                                            <div class="col-sm-3 text_right">
                                              投资时间
                                            </div>
                                            <div class="col-sm-4">
                                              <input type="date" class="form-control" id="founded_time" name="founded_time"  value="<?php echo date('Y-m-d',$vo['founded_time']); ?>"  /> 
                                            </div>

                                        </div>

                                    </div>  
                                  
                                </div><?php endforeach; endif; ?>
                        <?php else: ?>
                            <?php if(is_array($products)): foreach($products as $key=>$vo): ?><div class="repeat">
                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            <span class="glyphicon glyphicon-tree-deciduous" style="color:black;"></span>(<?php echo ($key+1); ?>)名称
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="name" name="name"  value="<?php echo ($vo['name']); ?>"  />
                                            <input type="hidden" class="form-control"  name="id"  value="<?php echo ($vo['id']); ?>"   />                            
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            内容
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="content" name="content"  value="<?php echo ($vo['content']); ?>" />
                                          </div>

                                      </div>

                                  </div>

                                  <div class="row" style="margin-top:10px;">
                                    
                                      <div>
                                          <div class="col-sm-3 text_right">
                                            价格
                                          </div>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="price" name="price"  value="<?php echo ($vo['price']); ?>" />                            
                                          </div>

                                      </div>

                                  </div>
                                </div><?php endforeach; endif; endif; ?>

                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary" id="" onclick="form1.action='/fofs/1/index.php/Home/Sa/do_modifyCase';form1.submit();">保存修改</button>
                  </div>
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