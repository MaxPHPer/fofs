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
<div class="content search">
  <section class="conditon">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-4">
              <h1><?php echo (L("conditional_filtering")); ?></h1>
            </div>
            <div class="col-sm-4 col-sm-offset-4">
              <div class="form-group searchProduct">
                <input type="text" name="search" class="form-control" placeholder="<?php echo (L("search_by_you_want")); ?>" id='representative_product'/>
                <button class="glyphicon glyphicon-search" id='product_search'></button>
              </div>
            </div><!--产品-->
          </div>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default panel1">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-wrench"></i><?php echo (L("manufacturing_capability")); ?><i class="fa fa-angle-down pull-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-6 borderRight">
                      <div class="form-group clearfix">
                        <label for="processing_technic_first_id" class="col-sm-2 control-label"><?php echo (L("category")); ?></label>
                        <div class="col-sm-10">
                          <select name="processing_technic_first_id" id="processing_technic_first" class="form-control" onchange="search_by_condition(this);">
                            <option value='0'><?php echo (L("unlimited")); ?></option>
                            <?php if(is_array($processing_technic_firsts)): foreach($processing_technic_firsts as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; ?>
                          </select>
                        </div>
                      </div><!--类别-->
                      <div class="form-group clearfix">
                        <label for="processing_technic_second_id" class="col-sm-2 control-label"><?php echo (L("manufacturing_technology")); ?></label>
                        <div class="col-sm-10">
                          <select name="processing_technic_second_id" id="processing_technic_second" class="form-control" onchange="search_by_condition(this);">
                              <option value='0'><?php echo (L("unlimited")); ?></option>
                          </select>
                        </div>
                      </div><!--制造技术-->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 control-label"><?php echo (L("fabrication_craftwork")); ?></label>
                        <div class="col-sm-9" id='processing_technic_third'>

                        </div>
                      </div><!--制造工艺-->
                    </div>
                  </div>
                </div>
              </div>
            </div><!--制造能力-->
            <div class="panel panel-default panel2">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa fa-user"></i><?php echo (L("customer_market")); ?><i class="fa fa-angle-down pull-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-6 borderRight">
                      <div class="form-group clearfix">
                        <label for="duns" class="col-sm-2 control-label"><?php echo (L("duns")); ?></label>
                        <div class="col-sm-10">
                          <input class="icheckbox_flat-blue" id="duns" type="checkbox" name="duns" onclick="search_by_condition(this);">
                          <?php echo (L("provided")); ?>
                        </div>
                      </div><!--邓白氏码-->
                      <div class="form-group clearfix">
                        <label for="cur_type_id" class="col-sm-2 control-label"><?php echo (L("turnover")); ?></label>
                        <div class="col-sm-3">
                          <select name="cur_type_id" id="cur_type_id" class="form-control"  onchange="search_by_condition(this);">
                            <?php if(is_array($cur_type_list)): foreach($cur_type_list as $key=>$cur_type): ?><option value="<?php echo ($cur_type['id']); ?>"><?php echo ($cur_type['name']); ?></option><?php endforeach; endif; ?>
                          </select>
                        </div>
                        <div class="col-sm-3">
                          <input type="number" name="startTurnover" id='startTurnover' class="form-control" placeholder="<?php echo (L("minimum_amount")); ?>" onchange="search_by_condition(this);"/>
                        </div>
                        <div class="col-sm-1">
                          <span style="line-height: 30px;">~</span>
                        </div>
                        <div class="col-sm-3">
                          <input type="number" name="overTurnover" id='overTurnover' class="form-control" placeholder="<?php echo (L("maximum_amount")); ?>" onchange="search_by_condition(this);"/>
                        </div>
                      </div><!--营业额-->
                      <div class="form-group clearfix">
                        <label for="customers_distribution_id" class="col-sm-2 control-label"><?php echo (L("customer_distribution")); ?></label>
                        <div class="col-sm-10">
                          <select name="customers_distribution_id" id="distribution" class="form-control"  onchange="search_by_condition(this);">
                              <option value='0'><?php echo (L("unlimited")); ?></option>
                              <?php if(is_array($ind_list)): foreach($ind_list as $key=>$ind): ?><option value="<?php echo ($ind['id']); ?>"><?php echo ($ind['name']); ?></option><?php endforeach; endif; ?>
                          </select>
                        </div>
                      </div><!--客户分布--><!--用于order排序-->
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-3 control-label"><?php echo (L("market_distribution")); ?></label>
                        <div class="col-sm-9">
                          <input type="hidden" name='market_distribution_num' id='market_distribution_num' value="<?php echo ($market_distribution_num); ?>">
                          <?php if(is_array($are_list)): $i = 0; $__LIST__ = $are_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$are): $mod = ($i % 2 );++$i;?><div class="col-sm-4 select">
                              <input type="checkbox" name="market_distribution_id_<?php echo ($i); ?>" value="<?php echo ($are['id']); ?>" /><span><span><?php echo ($are['name']); ?></span></span>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                      </div><!--市场分布-->
                    </div>
                  </div>
                </div>
              </div>
            </div><!--客户及市场-->
            <div class="panel panel-default panel3">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-check"></i><?php echo (L("management_product_certificate")); ?><i class="fa fa-angle-down pull-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <div class="col-sm-7 borderRight">
                    <div class="form-group row">
                      <label class="col-sm-2 control-label"><?php echo (L("management_system_certificate")); ?></label>
                      <div class="col-sm-10">
                        <input type="hidden" name='system_criterias_num' id='system_criterias_num' value="<?php echo ($system_criterias_num); ?>">
                        <?php if(is_array($system_criterias)): $i = 0; $__LIST__ = $system_criterias;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$criteria): $mod = ($i % 2 );++$i;?><div class="col-sm-4 select">
                              <input type="checkbox" name="system_criteria_id_<?php echo ($i); ?>" value="<?php echo ($criteria['id']); ?>"  /><span><span><?php echo ($criteria['name']); ?></span></span>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>
                    </div><!--体系认证-->
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group row">
                      <label class="col-sm-2 control-label"><?php echo (L("product_certificate")); ?></label>
                      <div class="col-sm-10">
                        <input type="hidden" name='product_criterias_num' id='product_criterias_num' value="<?php echo ($product_criterias_num); ?>">
                        <?php if(is_array($product_criterias)): $i = 0; $__LIST__ = $product_criterias;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$criteria): $mod = ($i % 2 );++$i;?><div class="col-sm-4 select">
                              <input type="checkbox" name="product_criteria_id_<?php echo ($i); ?>" value="<?php echo ($criteria['id']); ?>" /><span><span><?php echo ($criteria['name']); ?></span></span>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>
                    </div><!--产品认证-->
                  </div>
                </div>
              </div>
            </div><!--体系及产品认证-->
            <div class="panel panel-default panel4">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="fa fa-globe"></i><?php echo (L("location")); ?><i class="fa fa-angle-down pull-right"></i>
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                  <div class="row">
                    <div class="form-group col-sm-12 clearfix">
                      <div class="col-sm-3">
                        <select name="country_id" id="country" class="form-control" onchange="search_by_condition(this);">
                            <option value='0'><?php echo (L("unlimited")); ?></option>
                            <?php if(is_array($cou_list)): foreach($cou_list as $key=>$cou): ?><option value="<?php echo ($cou['id']); ?>"><?php echo ($cou['name']); ?></option><?php endforeach; endif; ?>
                        </select>
                      </div><!--国家-->
                      <div class="col-sm-3">
                        <select name="province_id" id="province" class="form-control"  onchange="search_by_condition(this);">
                              <option value='0'><?php echo (L("unlimited")); ?></option>
                        </select>
                      </div><!--省州-->
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12 clearfix">
                      <label for="turnover" class="col-sm-1 control-label"><?php echo (L("distance")); ?></label>
                      <div class="col-sm-3">
                        <input type="text" name="city" class="form-control"/>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control"  name='distance' onchange="search_by_condition(this);">
                          <option value="100">100</option>
                          <option value="400">400</option>
                          <option value="800">800</option>
                          <option value="1000">1000</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <span style="line-height: 40px;"><?php echo (L("within_km")); ?></span>
                      </div>
                    </div><!--距离-->
                  </div>
                </div>
              </div>
            </div><!--地址-->
          </div>
        </div>
      </div>
    </div>

  </section>
  <section class="searchForm">
    <div class="container">
      <div class="row" style="position: relative">
        <div class="leftButton">
            <input type='hidden' id='pre_page' value="0">
            <i class="fa fa-angle-left" onclick='go_pre_page();'></i>
        </div>
        <input type="hidden" id='company_logo_base_url' value="/selectin/1/Public/uploads/supplier_company/">
        <div class="table-responsive col-sm-12 table-search">
          <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th><?php echo (L("corporation")); ?></th>
              <th id='company_name_1'></th>
              <th id='company_name_2'></th>
              <th id='company_name_3'></th>
              <th id='company_name_4'></th>
              <th id='company_name_5'></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo (L("location")); ?></td>
              <td id='company_address_1'></td>
              <td id='company_address_2'></td>
              <td id='company_address_3'></td>
              <td id='company_address_4'></td>
              <td id='company_address_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("registered_capital")); ?></td>
              <td id='company_registered_capital_1'></td>
              <td id='company_registered_capital_2'></td>
              <td id='company_registered_capital_3'></td>
              <td id='company_registered_capital_4'></td>
              <td id='company_registered_capital_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("turnover")); ?></td>
              <td id='company_turnover_1'></td>
              <td id='company_turnover_2'></td>
              <td id='company_turnover_3'></td>
              <td id='company_turnover_4'></td>
              <td id='company_turnover_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("duns")); ?></td>
              <td id='company_duns_no_1'></td>
              <td id='company_duns_no_2'></td>
              <td id='company_duns_no_3'></td>
              <td id='company_duns_no_4'></td>
              <td id='company_duns_no_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("management_system_certificate")); ?></td>
              <td id='company_system_criterias_1'></td>
              <td id='company_system_criterias_2'></td>
              <td id='company_system_criterias_3'></td>
              <td id='company_system_criterias_4'></td>
              <td id='company_system_criterias_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("product_certificate")); ?></td>
              <td id='company_product_criterias_1'></td>
              <td id='company_product_criterias_2'></td>
              <td id='company_product_criterias_3'></td>
              <td id='company_product_criterias_4'></td>
              <td id='company_product_criterias_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("manufacturing_technology")); ?></td>
              <td id='company_processing_technic_second_1'></td>
              <td id='company_processing_technic_second_2'></td>
              <td id='company_processing_technic_second_3'></td>
              <td id='company_processing_technic_second_4'></td>
              <td id='company_processing_technic_second_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("customer_distribution")); ?></td>
              <td id='company_customers_distribution_1'></td>
              <td id='company_customers_distribution_2'></td>
              <td id='company_customers_distribution_3'></td>
              <td id='company_customers_distribution_4'></td>
              <td id='company_customers_distribution_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("market_distribution")); ?></td>
              <td id='company_market_distribution_1'></td>
              <td id='company_market_distribution_2'></td>
              <td id='company_market_distribution_3'></td>
              <td id='company_market_distribution_4'></td>
              <td id='company_market_distribution_5'></td>
            </tr>
            <tr>
              <td class="text-center"><button class="btn btn-block btn-primary" data-toggle="modal" data-target=".compareModal" onclick="start_to_compare();"><?php echo (L("compare")); ?></button></td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='company_add_compare_1' value='0' onclick="add_to_compare_list(this);"><?php echo (L("add_to_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='company_send_rfi_1' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='company_add_compare_2' value='0' onclick="add_to_compare_list(this);"><?php echo (L("add_to_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='company_send_rfi_2' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='company_add_compare_3' value='0' onclick="add_to_compare_list(this);"><?php echo (L("add_to_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='company_send_rfi_3' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='company_add_compare_4' value='0' onclick="add_to_compare_list(this);"><?php echo (L("add_to_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='company_send_rfi_4' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='company_add_compare_5' value='0' onclick="add_to_compare_list(this);"><?php echo (L("add_to_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='company_send_rfi_5' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
          <div style="float:right;">总共有<span id='total_num'>0</span>条记录符合,当前是第<span id='now_page'>0</span>页，总共有<span id='total_page'>0</span>页</div>
        </div>
        <div class="rightButton">
            <input type='hidden' id='next_page' value="0">
            <i class="fa fa-angle-right" onclick='go_next_page();'></i>
        </div>
      </div>
    </div>
  </section>
</div>

<!--modal -->
<div class="modal fade compareModal" tabindex="-1" role="dialog" aria-labelledby="compareModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">比较(Comparation)</h4>
    </div>
    <div class="modal-content">
      <div class="table-responsive">
        <table class="table table-bordered table-search">
            <thead>
            <tr>
              <th><?php echo (L("corporation")); ?></th>
              <th id='compare_company_name_1'></th>
              <th id='compare_company_name_2'></th>
              <th id='compare_company_name_3'></th>
              <th id='compare_company_name_4'></th>
              <th id='compare_company_name_5'></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo (L("location")); ?></td>
              <td id='compare_company_address_1'></td>
              <td id='compare_company_address_2'></td>
              <td id='compare_company_address_3'></td>
              <td id='compare_company_address_4'></td>
              <td id='compare_company_address_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("registered_capital")); ?></td>
              <td id='compare_company_registered_capital_1'></td>
              <td id='compare_company_registered_capital_2'></td>
              <td id='compare_company_registered_capital_3'></td>
              <td id='compare_company_registered_capital_4'></td>
              <td id='compare_company_registered_capital_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("turnover")); ?></td>
              <td id='compare_company_turnover_1'></td>
              <td id='compare_company_turnover_2'></td>
              <td id='compare_company_turnover_3'></td>
              <td id='compare_company_turnover_4'></td>
              <td id='compare_company_turnover_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("duns")); ?></td>
              <td id='compare_company_duns_no_1'></td>
              <td id='compare_company_duns_no_2'></td>
              <td id='compare_company_duns_no_3'></td>
              <td id='compare_company_duns_no_4'></td>
              <td id='compare_company_duns_no_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("management_system_certificate")); ?></td>
              <td id='compare_company_system_criterias_1'></td>
              <td id='compare_company_system_criterias_2'></td>
              <td id='compare_company_system_criterias_3'></td>
              <td id='compare_company_system_criterias_4'></td>
              <td id='compare_company_system_criterias_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("product_certificate")); ?></td>
              <td id='compare_company_product_criterias_1'></td>
              <td id='compare_company_product_criterias_2'></td>
              <td id='compare_company_product_criterias_3'></td>
              <td id='compare_company_product_criterias_4'></td>
              <td id='compare_company_product_criterias_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("manufacturing_technology")); ?></td>
              <td id='compare_company_processing_technic_second_1'></td>
              <td id='compare_company_processing_technic_second_2'></td>
              <td id='compare_company_processing_technic_second_3'></td>
              <td id='compare_company_processing_technic_second_4'></td>
              <td id='compare_company_processing_technic_second_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("customer_distribution")); ?></td>
              <td id='compare_company_customers_distribution_1'></td>
              <td id='compare_company_customers_distribution_2'></td>
              <td id='compare_company_customers_distribution_3'></td>
              <td id='compare_company_customers_distribution_4'></td>
              <td id='compare_company_customers_distribution_5'></td>
            </tr>
            <tr>
              <td><?php echo (L("market_distribution")); ?></td>
              <td id='compare_company_market_distribution_1'></td>
              <td id='compare_company_market_distribution_2'></td>
              <td id='compare_company_market_distribution_3'></td>
              <td id='compare_company_market_distribution_4'></td>
              <td id='compare_company_market_distribution_5'></td>
            </tr>
            <tr>
              <td class="text-center"><button class="btn btn-block btn-primary" data-toggle="modal" data-target=".compareModal" ><?php echo (L("close_window")); ?></button></td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='compare_company_add_compare_1' value='0' onclick="move_from_compare_list(this);"><?php echo (L("move_from_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='compare_company_send_rfi_1' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='compare_company_add_compare_2' value='0' onclick="move_from_compare_list(this);"><?php echo (L("move_from_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='compare_company_send_rfi_2' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='compare_company_add_compare_3' value='0' onclick="move_from_compare_list(this);"><?php echo (L("move_from_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='compare_company_send_rfi_3' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='compare_company_add_compare_4' value='0' onclick="move_from_compare_list(this);"><?php echo (L("move_from_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='compare_company_send_rfi_4' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
              <td class="text-center">
                <div class="btn-group" role="group" >
                  <button type="button" class="btn btn-primary" id='compare_company_add_compare_5' value='0' onclick="move_from_compare_list(this);"><?php echo (L("move_from_compare")); ?></button>
                  <button type="button" class="btn btn-default" id='compare_company_send_rfi_5' value='0' onclick="send_rfi(this);"><?php echo (L("rfi")); ?></button>
                </div>
              </td>
            </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

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