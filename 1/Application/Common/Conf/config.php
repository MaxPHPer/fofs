<?php
return array(
	//'配置项'=>'配置值'
	// 添加数据库配置信息
	'DB_TYPE'=>'mysql',// 数据库类型
	
	//在云服务器时
	// 'DB_HOST'=>SAE_MYSQL_HOST_M,// 服务器地址
	// 'DB_NAME'=> SAE_MYSQL_DB,// 数据库名
	// 'DB_USER'=>SAE_MYSQL_USER,// 用户名
	// 'DB_PWD'=> SAE_MYSQL_PASS,// 密码
    
    //在本地测试时
    
	'DB_HOST'=>'127.0.0.1',// 服务器地址
	'DB_NAME'=>'saas_selectedin',// 数据库名
	'DB_USER'=>'root',// 用户名
	'DB_PWD'=>'root',// 密码
	
	'DB_PORT'=>3306,// 端口
	'DB_PREFIX'=>'saas_',// 数据库表前缀
	'DB_CHARSET'=>'utf8',// 数据库字符集
	'SESSION_AUTO_START' => true, //是否开启session

	// 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.mxhichina.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_SUPPORT_USERNAME' =>'support@selectedin.com',			//SUPPORT的邮箱名
    'MAIL_SUPPORT_FROM' =>'support@selectedin.com',				//发件人地址
    'MAIL_SUPPORT_PASSWORD' =>'Vadestone123',					//邮箱密码

    'MAIL_INFO_USERNAME' =>'info@selectedin.com',				//INFO的邮箱名
    'MAIL_INFO_FROM' =>'info@selectedin.com',					//发件人地址
	'MAIL_INFO_PASSWORD' =>'Vadestone123',						//邮箱密码

	'MAIL_FROMNAME'=>'Selected In',//发件人姓名
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

    //多语言
    'LANG_SWITCH_ON'   => true,   // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
    'DEFAULT_LANG'     => 'en-us'
);