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
<div class="content supplierCompanyInfo">
  <div class="container">
    
      <div class="row">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


          <div class="panel panel-default panel4" style="margin-top: 20px;">
            <div class="panel-heading" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                  <i class="fa fa-globe"></i>
                  基金产品(数量>=0)
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
              <div class="panel-body">
                <div class="repeat_fund ">
                  <div class="borderBottom" style="margin-bottom:20px;">
                    <div class="row" >
                      <div class="col-sm-2">
                        
                          <label for="userName" class="col-sm-12 control-label"><span>*</span>管理基金数量</label>
    
                      </div>

                      <div class="col-sm-4">

                            <input type="number" class="form-control" id="userName" name="username" placeholder='由系统自动计算得出' value="<?php echo ($total_funds_num); ?>" disabled />

                      </div>

                    </div>



                    <div class="row" style="margin-top:10px;">
                      <div class="col-sm-2">
                        
                          <label for="userName" class="col-sm-12 control-label"><span>*</span>管理基金总规模</label>
    
                      </div>

                      <div class="col-sm-4">

                            <input type="text" class="form-control" id="userName" name="username"  placeholder='由系统自动计算得出' value="<?php echo ($total_funds_size); ?>" disabled/>
                           

                      </div>

                      <div class='col-sm-2'>
                            <label for="userName" class="col-sm-12 control-label">(万人民币)</label>
                      </div>
                    </div>

                  <?php if(is_array($funds)): foreach($funds as $key=>$vo): ?><div class="row">
                        <div class="col-sm-2 ">
                          <label for="userName" class="col-sm-12 control-label"><b>基金产品 <?php echo ($key+1); ?></b></label>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="name" class="col-sm-12 control-label">
                                基金名称
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="name" name="name"  value="<?php echo ($vo['name']); ?>" disabled/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="founded_time" class="col-sm-12 control-label">
                                成立时间
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="date" class="form-control" id="founded_time" name="founded_time"  value="<?php echo date('Y-m-d',$vo['founded_time']); ?>" disabled/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="registered_address" class="col-sm-12 control-label">
                                注册地点
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="registered_address" name="registered_address"  value="<?php echo ($vo['registered_address']); ?>" disabled/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="currency_type_id" class="col-sm-12 control-label">
                                币种
                              </label>
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
                            <div class="col-sm-2">
                              <label for="fund_size" class="col-sm-12 control-label">
                                基金规模(万元)
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="number" class="form-control" id="fund_size" name="fund_size"  value="<?php echo ($vo['fund_size']); ?>" disabled/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="fund_property" class="col-sm-12 control-label">
                                基金类型
                              </label>
                            </div>
                            <div class="col-sm-4">
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
                            <div class="col-sm-2">
                              <label for="is_investment_security" class="col-sm-12 control-label">
                                基金投资类型
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                              <input class="icheckbox_flat-blue" id="is_investment_security" type="checkbox" name="fund_type[]" value="is_investment_security" <?php if($vo['is_investment_security']==1) echo' checked'; ?> />
                                <label for="is_investment_security">证券投资基金</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_equity_investment" type="checkbox" name="fund_type[]" value="is_equity_investment" <?php if($vo['is_equity_investment']==1) echo' checked'; ?> />
                                <label for="is_equity_investment">股权投资基金</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_venture_investment" type="checkbox" name="fund_type[]" value="is_venture_investment" <?php if($vo['is_venture_investment']==1) echo' checked'; ?> />
                                <label for="is_venture_investment">创业投资基金</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_other_investment" type="checkbox" name="fund_type[]" value="is_other_investment" <?php if($vo['is_other_investment']==1) echo' checked'; ?> />
                                <label for="is_other_investment">其它投资基金</label>
                              </div>                        
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="trustee_name" class="col-sm-12 control-label">
                                托管人名称
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="trustee_name" name="trustee_name"  value="<?php echo ($vo['trustee_name']); ?>" disabled/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="investment_field" class="col-sm-12 control-label">
                                主要投资领域
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="investment_field" name="investment_field"  value="<?php echo ($vo['investment_field']); ?>" disabled/>                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="is_recruitment_period" class="col-sm-12 control-label">
                                运作状态
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recruitment_period']==0) echo' checked'; ?>/>
                                <label for="is_recruitment_period_0">封闭</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recruitment_period']==1) echo' checked'; ?>/>
                                <label for="is_recruitment_period_1">募集期</label>
                              </div>      
                              <div class="col-sm-2 ">
                                <label for="">上传募集方案</label>
                              </div>
                              <div class="col-sm-4 ">
                                  <a href="/fofs/1/Public/uploads/lp_recruitment/<?php echo ($vo['recruitment_plan_url']); ?>" class="form-control"><?php echo ($vo['recruitment_plan_url']); ?></a>
                              </div>  

                                                   
                            </div>

                        </div>

                    </div>


                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="is_recorded_0" class="col-sm-12 control-label">
                                中基协备案状况
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recorded']==0) echo' checked'; ?>/>
                                <label for="is_recorded_0">未备案</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue"  type="radio"  <?php if($vo['is_recorded']==1) echo' checked'; ?>/>
                                <label for="is_recorded_1">已备案</label>
                              </div>  
                              <div class="col-sm-6 ">
                                <label for="is_recorded_0">(若已备案则填写下面基金编号、备案时间)</label>
                              </div>                       
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="fund_number" class="col-sm-12 control-label">
                                基金编号
                              </label>
                            </div>
    
                            <div class="col-sm-4 ">
                              <input type="text" class="form-control" id="fund_number" name="fund_number"  value="<?php echo ($vo['fund_number']); ?>" disabled/>   
                            </div>
                            <div class="col-sm-2 ">
                              <label for="recorded_time">备案时间</label>
                            </div>  
                            <div class="col-sm-4 ">
                              <input type="date" class="form-control" id="recorded_time" name="recorded_time"  value="<?php echo date('Y-m-d',$vo['recorded_time']); ?>" disabled />   
                            </div>                       
                          

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-3 ">
                          <label for="userName" class="col-sm-12 control-label"><b>该基金已投基金/项目</b></label>
                        </div>
                    </div>


                    <div class="">
                    <?php if(is_array($vo['investment_projects'])): foreach($vo['investment_projects'] as $project_key=>$investment_project): ?><div class="row" style="margin-top:10px;">
                                  <div>
                                      <div class="col-sm-2">
                                        <label for="project_name" class="col-sm-12 control-label">
                                          基金项目<?php echo ($project_key+1); ?>名称
                                        </label>
                                      </div>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" id="project_name" name="investment_project[project_name][]"  value="<?php echo ($investment_project['project_name']); ?>" disabled />                            
                                      </div>

                                  </div>

                              </div>
                              <div class="row" style="margin-top:10px;">
                                
                                  <div>
                                      <div class="col-sm-2">
                                        <label for="project_abstract" class="col-sm-12 control-label">
                                          基金项目简介
                                        </label>
                                      </div>
                                      <div class="col-sm-4">
                                        <textarea class="form-control" id="project_abstract" name="investment_project[project_abstract][]"  disabled><?php echo ($investment_project['project_abstract']); ?></textarea>
                                      </div>

                                  </div>

                              </div>
                              <div class="row" style="margin-top:10px;">
                                
                                  <div>
                                      <div class="col-sm-2">
                                        <label for="investment_quota" class="col-sm-12 control-label">
                                          投资额度
                                        </label>
                                      </div>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" id="investment_quota" name="investment_project[investment_quota][]" value="<?php echo ($investment_project['investment_quota']); ?>" disabled />                            
                                      </div>
                                      <div class="col-sm-2">
                                        <label for="investment_quota" class="col-sm-12 control-label">
                                          万元
                                        </label>
                                      </div>

                                  </div>

                              </div>
                              <div class="row" style="margin-top:10px;">
                                
                                  <div>
                                      <div class="col-sm-2">
                                        <label for="investment_round" class="col-sm-12 control-label">
                                          项目投资轮次
                                        </label>
                                      </div>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" id="investment_round" name="investment_project[investment_round][]"  value="<?php echo ($investment_project['investment_round']); ?>" disabled/> 
                                      </div>
                                      <div class="col-sm-2">
                                        <label for="investment_round" class="col-sm-12 control-label">
                                          (基金无)
                                        </label>
                                      </div>

                                  </div>

                              </div>
                              <div class="row" style="margin-top:10px;">
                                
                                  <div>
                                      <div class="col-sm-2">
                                        <label for="investment_time" class="col-sm-12 control-label">
                                          投资时间
                                        </label>
                                      </div>
                                      <div class="col-sm-4">
                                        <input type="date" class="form-control" id="investment_time" name="investment_project[investment_time][]"  value="<?php echo date('Y-m-d',$investment_project['investment_time']); ?>" disabled/>                            
                                      </div>

                                  </div>

                              </div>
                              <div class="row borderBottom" style="margin-top:10px;">
                                
                                  <div>
                                      <div class="col-sm-2">
                                        <label for="project_state_type" class="col-sm-12 control-label">
                                          项目现状
                                        </label>
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
              <form action="" method="post" enctype="multipart/form-data" name="form1">
                    <div class="row">
                        <div class="col-sm-2 ">
                          <label for="userName" class="col-sm-12 control-label"><b>基金产品 <?php echo ($total_funds_num+1); ?></b></label>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="name" class="col-sm-12 control-label">
                                基金名称
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="name" name="name"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="founded_time" class="col-sm-12 control-label">
                                成立时间
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="date" class="form-control" id="founded_time" name="founded_time"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="registered_address" class="col-sm-12 control-label">
                                注册地点
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="registered_address" name="registered_address"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="currency_type_id" class="col-sm-12 control-label">
                                币种
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <select class="form-control" id="currency_type_id" name="currency_type_id">
                                
                                <option value='0'>人民币RMB</option> 
                                <option value='1'>美元USD</option> 
                                <option value='2'>日元JPY</option> 
                                <option value='3'>欧元EUR</option> 
                                <option value='4'>英镑GBP</option> 
                                <option value='5'>德国马克DEM</option> 
                                <option value='6'>瑞士法郎CHF</option> 
                                <option value='7'>法国法郎FRF</option> 
                                <option value='8'>加拿大元CAD</option> 
                                <option value='9'>澳大利亚元AUD</option> 
                                <option value='10'>港币HKD</option> 
                                <option value='11'>俄罗斯卢布SUR</option> 
                                <option value='12'>新加坡元SGD</option> 
                                <option value='13'>韩国元KRW</option> 
                                <option value='14'>泰铢THB</option> 
                                <option value='15'>奥地利先令ATS</option> 
                                <option value='16'>芬兰马克FIM</option> 
                                <option value='17'>比利时法郎BEF</option> 
                                <option value='18'>爱尔兰镑IEP</option> 
                                <option value='19'>意大利里拉ITL</option> 
                                <option value='20'>卢森堡法郎LUF</option> 
                                <option value='21'>荷兰盾NLG</option> 
                                <option value='22'>葡萄牙埃斯库多PTE</option> 
                                <option value='23'>西班牙比塞塔ESP</option> 
                                <option value='24'>印尼盾IDR</option> 
                                <option value='25'>马来西亚林吉特MYR</option> 
                                <option value='26'>新西兰元NZD</option> 
                                <option value='27'>菲律宾比索PHP</option> 

                              </select>
          
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="fund_size" class="col-sm-12 control-label">
                                基金规模(万元)
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="number" class="form-control" id="fund_size" name="fund_size"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="fund_property" class="col-sm-12 control-label">
                                基金类型
                              </label>
                            </div>
                            <div class="col-sm-4">
                                <select name="fund_property" id="fund_property" class="form-control">

                                  <option value ="1">政府引导基金</option>
                                  <option value ="2">民营资本市场化运作基金</option>
                                  <option value ="3">国企参与市场化基金</option>

                                </select>                           
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="is_investment_security" class="col-sm-12 control-label">
                                基金投资类型
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_investment_security" type="checkbox" name="fund_type[]" value="is_investment_security">
                                <label for="is_investment_security">证券投资基金</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_equity_investment" type="checkbox" name="fund_type[]" value="is_equity_investment">
                                <label for="is_equity_investment">股权投资基金</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_venture_investment" type="checkbox" name="fund_type[]" value="is_venture_investment">
                                <label for="is_venture_investment">创业投资基金</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_other_investment" type="checkbox" name="fund_type[]" value="is_other_investment">
                                <label for="is_other_investment">其它投资基金</label>
                              </div>                        
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="trustee_name" class="col-sm-12 control-label">
                                托管人名称
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="trustee_name" name="trustee_name"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="investment_field" class="col-sm-12 control-label">
                                主要投资领域
                              </label>
                            </div>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="investment_field" name="investment_field"  />                            
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="is_recruitment_period" class="col-sm-12 control-label">
                                运作状态
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_recruitment_period_0" type="radio" name="is_recruitment_period" value="0" checked>
                                <label for="is_recruitment_period_0">封闭</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_recruitment_period_1" type="radio" name="is_recruitment_period" value="1">
                                <label for="is_recruitment_period_1">募集期</label>
                              </div>      
                              <div class="col-sm-2 ">
                                <label for="recruitment_plan_url">上传募集方案</label>
                              </div>
                              <div class="col-sm-4 ">
                                <input type="file" class="form-control" id="recruitment_plan_url" name="recruitment_plan_url" >
                              </div>  

                                                   
                            </div>

                        </div>

                    </div>


                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="is_recorded_0" class="col-sm-12 control-label">
                                中基协备案状况
                              </label>
                            </div>
                            <div class="col-sm-10">
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_recorded_0" type="radio" name="is_recorded" value="0" checked>
                                <label for="is_recorded_0">未备案</label>
                              </div>
                              <div class="col-sm-3 ">
                                <input class="icheckbox_flat-blue" id="is_recorded_1" type="radio" name="is_recorded" value="1">
                                <label for="is_recorded_1">已备案</label>
                              </div>  
                              <div class="col-sm-6 ">
                                <label for="is_recorded_0">(若已备案则填写下面基金编号、备案时间)</label>
                              </div>                       
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top:10px;">
                        
                        <div>
                            <div class="col-sm-2">
                              <label for="fund_number" class="col-sm-12 control-label">
                                基金编号
                              </label>
                            </div>
    
                            <div class="col-sm-4 ">
                              <input type="text" class="form-control" id="fund_number" name="fund_number"  />   
                            </div>
                            <div class="col-sm-2 ">
                              <label for="recorded_time">备案时间</label>
                            </div>  
                            <div class="col-sm-4 ">
                              <input type="date" class="form-control" id="recorded_time" name="recorded_time"  />   
                            </div>                       
                          

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-3 ">
                          <label for="userName" class="col-sm-12 control-label"><b>该基金已投基金/项目</b></label>
                        </div>
                    </div>


                    <div class="repeat">
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="project_name" class="col-sm-12 control-label">
                                  基金项目名称
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="project_name" name="investment_project[project_name][]"  />                            
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="project_abstract" class="col-sm-12 control-label">
                                  基金项目简介
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <textarea class="form-control" id="project_abstract" name="investment_project[project_abstract][]" ></textarea>
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="investment_quota" class="col-sm-12 control-label">
                                  投资额度
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="investment_quota" name="investment_project[investment_quota][]"  />                            
                              </div>
                              <div class="col-sm-2">
                                <label for="investment_quota" class="col-sm-12 control-label">
                                  万元
                                </label>
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="investment_round" class="col-sm-12 control-label">
                                  项目投资轮次
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="investment_round" name="investment_project[investment_round][]"  /> 
                              </div>
                              <div class="col-sm-2">
                                <label for="investment_round" class="col-sm-12 control-label">
                                  (基金无)
                                </label>
                              </div>

                          </div>

                      </div>
                      <div class="row" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="investment_time" class="col-sm-12 control-label">
                                  投资时间
                                </label>
                              </div>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" id="investment_time" name="investment_project[investment_time][]"  />                            
                              </div>

                          </div>

                      </div>
                      <div class="row borderBottom" style="margin-top:10px;">
                        
                          <div>
                              <div class="col-sm-2">
                                <label for="project_state_type" class="col-sm-12 control-label">
                                  项目现状
                                </label>
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
                      <div class="col-sm-9"></div>
                      <div class="col-sm-3">
                        <button type="button" class="btn btn-primary" id="addNew4" >再添加该基金已投基金/项目</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary" id="" onclick="form1.action='/fofs/1/index.php/Home/Register/add_lpFundsInfo';form1.submit();">添加其它基金产品</button>
                      </div>
                </div>
              </div>
            </div>
          </div>
          <!--主要检测设备-->

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4" style="margin-bottom:30px;">
          <input type="submit" class="btn btn-primary btn-block" id="submit" value="<?php echo (L("signup_complete")); ?>" onclick="form1.action='/fofs/1/index.php/Home/Register/save_lpFundsInfo';form1.submit();"/>
        </div>
      </div>
    </form>
  </div>
</div>
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