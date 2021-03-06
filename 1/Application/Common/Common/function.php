<?php
/**
 * SUPPORT邮件发送函数
 */
function SUPPORTsendMail($to, $title, $content) {
 
    Vendor('PHPMailer.PHPMailerAutoload');     
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_SUPPORT_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_SUPPORT_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_SUPPORT_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}

/**
 * Info邮件发送函数
 */
function INFOsendMail($to, $title, $content) {
 
    Vendor('PHPMailer.PHPMailerAutoload');     
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_INFO_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_INFO_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_INFO_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}

/* 加密 */
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {   
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙   
    $ckey_length = 4;   
       
    // 密匙   
    $key = md5($key ? $key : $GLOBALS['discuz_auth_key']);   
       
    // 密匙a会参与加解密   
    $keya = md5(substr($key, 0, 16));   
    // 密匙b会用来做数据完整性验证   
    $keyb = md5(substr($key, 16, 16));   
    // 密匙c用于变化生成的密文   
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): 
substr(md5(microtime()), -$ckey_length)) : '';   
    // 参与运算的密匙   
    $cryptkey = $keya.md5($keya.$keyc);   
    $key_length = strlen($cryptkey);   
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)， 
//解密时会通过这个密匙验证数据完整性   
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确   
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) :  
sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;   
    $string_length = strlen($string);   
    $result = '';   
    $box = range(0, 255);   
    $rndkey = array();   
    // 产生密匙簿   
    for($i = 0; $i <= 255; $i++) {   
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);   
    }   
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度   
    for($j = $i = 0; $i < 256; $i++) {   
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;   
        $tmp = $box[$i];   
        $box[$i] = $box[$j];   
        $box[$j] = $tmp;   
    }   
    // 核心加解密部分   
    for($a = $j = $i = 0; $i < $string_length; $i++) {   
        $a = ($a + 1) % 256;   
        $j = ($j + $box[$a]) % 256;   
        $tmp = $box[$a];   
        $box[$a] = $box[$j];   
        $box[$j] = $tmp;   
        // 从密匙簿得出密匙进行异或，再转成字符   
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));   
    }   
    if($operation == 'DECODE') {  
        // 验证数据有效性，请看未加密明文的格式   
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) &&  
substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {   
            return substr($result, 26);   
        } else {   
            return '';   
        }   
    } else {   
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因   
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码   
        return $keyc.str_replace('=', '', base64_encode($result));   
    }  

} 
function str_hex($string){ 
    $hex="";
    for($i = 0; $i < strlen($string); $i++)
    $hex .= dechex(ord($string[$i]));
    $hex = strtoupper($hex);
    return $hex;
}   
 
function hex_str($hex){   
    $string = ""; 
    for($i = 0; $i < strlen($hex) - 1; $i += 2)
    $string .= chr(hexdec($hex[$i].$hex[$i + 1]));
    return $string;
} 

//将中文变成英文(数组)
function zh_to_en($arr,$name='name',$name_en='name_en'){

    for($i=0;$i<count($arr);$i++){
        $arr[$i][$name]=$arr[$i][$name_en];
    }

    return $arr;

}

//将中文变成英文(个体)
function zh_to_en_single($vo,$name='name',$name_en='name_en'){
    $vo[$name]=$vo[$name_en];
    return $vo;
}

//格式化打印
function p($arr){
    print_r("<pre>");
    print_r($arr);
    print_r("</pre>");
}

/*
function:二维数组按指定的键值排序
author:www.111cn.net
*/
function array_sort($array,$keys,$type='asc'){
    if(!isset($array) || !is_array($array) || empty($array)){
        return '';
    }
    if(!isset($keys) || trim($keys)==''){
        return '';
    }
    if(!isset($type) || $type=='' || !in_array(strtolower($type),array('asc','desc'))){
        return '';
    }
    $keysvalue=array();
    foreach($array as $key=>$val){
        $val[$keys] = str_replace('-','',$val[$keys]);
        $val[$keys] = str_replace(' ','',$val[$keys]);
        $val[$keys] = str_replace(':','',$val[$keys]);
        $keysvalue[] =$val[$keys];
    }
    asort($keysvalue); //key值排序
    reset($keysvalue); //指针重新指向数组第一个
    foreach($keysvalue as $key=>$vals) {
        $keysort[] = $key;
    }
    $keysvalue = array();
    $count=count($keysort);
    if(strtolower($type) != 'asc'){
        for($i=$count-1; $i>=0; $i--) {
            $keysvalue[] = $array[$keysort[$i]];
        }
    }else{
        for($i=0; $i<$count; $i++){
            $keysvalue[] = $array[$keysort[$i]];
        }
    }
    return $keysvalue;
}