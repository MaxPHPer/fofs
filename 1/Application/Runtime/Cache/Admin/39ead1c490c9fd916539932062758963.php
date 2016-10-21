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
<div class="content supplierPersonalInfo">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1><?php echo (L("personal_profile")); ?></h1>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                  <div class="row borderNo">
                    <div class="col-sm-8 personal-photo">
                        <img class="media-object img-thumbnail personal-photo" src="/selectin/1/Public/uploads/supplier_pic/<?php echo $info['face_url']?$info['face_url']:'temp.jpg'; ?>" alt="头像">
                    </div>
                  </div><!--上传头像-->

                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("user_name")); ?></label>
                    <div class="col-sm-4">
                      <p><?php echo ($info['username']); ?></p>
                    </div>
                  </div><!--用户名-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("first_name")); ?></label>
                    <div class="col-sm-4 borderRight">
                      <p><?php echo ($info['firstname']); ?></p>
                    </div>
                    <label class="col-sm-2 control-label"><?php echo (L("last_name")); ?></label>
                    <div class="col-sm-4">
                      <p><?php echo ($info['lastname']); ?></p>
                    </div>
                  </div><!--名、姓-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("first_name")); ?>(<?php echo (L("lang_english")); ?>)</label>
                    <div class="col-sm-4 borderRight">
                      <p><?php echo ($info['firstname_en']); ?></p>
                    </div>
                    <label class="col-sm-2 control-label"><?php echo (L("last_name")); ?>(<?php echo (L("lang_english")); ?>)</label>
                    <div class="col-sm-4">
                      <p><?php echo ($info['lastname_en']); ?></p>
                    </div>
                  </div><!--名、姓(英文)-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("position")); ?></label>
                    <div class="col-sm-4 borderRight">
                      <p><?php echo ($info['title']); ?></p>
                    </div>
                    <label class="col-sm-2 control-label"><?php echo (L("function")); ?></label>
                    <div class="col-sm-4">
                      <p><?php echo ($info['function']['name']); ?></p>
                    </div>
                  </div><!--职位、职能-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("email")); ?></label>
                    <div class="col-sm-8">
                      <p><?php echo ($info['email']); ?></p>
                    </div>
                  </div><!--电子邮件-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("telephone")); ?></label>
                    <div class="col-sm-3">
                      <p><?php echo ($info['tel']); ?></p>
                    </div>
                  </div><!--电话号码-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("mobile_phone")); ?></label>
                    <div class="col-sm-4">
                      <p><?php echo ($info['mobile']); ?></p>
                    </div>
                  </div><!--手机-->
                  <div class="row borderNo">
                    <label class="col-sm-2 control-label"><?php echo (L("fax")); ?></label>
                    <div class="col-sm-4">
                      <p><?php echo ($info['fax']); ?></p>
                    </div><!--传真-->
                  </div>
              </div>
            </div>
            <div class="row borderNo">
              <div class="col-sm-5 col-sm-offset-1">
                <a href="/fofs/1/index.php/Admin/User/supplierCompanyDetailedInfo/id/<?php echo ($info['supplier_company_id']); ?>" type="button" class="btn btn-block btn-primary"><?php echo (L("view_company")); ?></a>
              </div>
              <div class="col-sm-5">
                <a href="javascript:;" onClick="javascript:history.back(-1);" type="button" class="btn btn-default btn-block"><?php echo (L("back")); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>