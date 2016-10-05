<?php
namespace Admin\Controller;
use Think\Controller;
class TestController extends Controller{
    public function send_mail(){
        $this->display();
    }

    public function do_send_mail(){
	    if(SendMail($_POST['mail'],$_POST['title'],$_POST['content']))
            $this->success('发送成功！');
        else
            $this->error('发送失败');
    }

    //测试切换语言
    public function change_lang(){
    	$this->display();
    }
    

    //测试验证存在的情况
    public function check_test_1(){
    	var_dump($this->check_certificate_validity('1','iatf','0165281','20160620'));
    }

    //测试验证不存在的情况
    public function check_test_2(){
    	var_dump($this->check_certificate_validity('1','iatf','01652811','20160620'));
    }
    /**
     * [check_certificate_validity 检查证书是否有效]
     * @param  string $type     [验证类型，1代表‘体系认证’，2代表‘产品认证’]
     * @param  string $criteria [证书类型]
     * @param  [type] $number   [证书编号]
     * @param  [type] $period   [证书有效截止时间]
     * @return [type] $result   [验证结果，true代表有效，false代表无效]
     */
    public function check_certificate_validity($type='1',$criteria='iatf',$number,$period){
    	//对不同type分别处理
    	if($type=='1'){		    //体系认证
    		switch ($criteria) {
    			case 'iatf':
    				return $this->check_iatf($number,$period);
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}
    	else if($type=='2'){   //产品认证
    		switch ($criteria) {
    			case 'value':
    				# code...
    				break;
    			
    			default:
    				# code...
    				break;
    		}
    	}

    	return false;
    }

    /**
     * 检查年iatf证书编号是否正确
     * @param  [type] $number [证书编号]
     * @return [type] $result [有效则返回true，不存在则返回false,其他返回‘检验过程错误’]
     */
    public function check_iatf($number,$period='0')
	{	
		//这个证书没有有效期
		$data = "cert_no=".$number."&cert_no_submit.x=7&cert_no_submit.y=6";
		$url = "http://www.iatf-customerportal.org";
		$headers = array(
			"Host: www.iatf-customerportal.org",
			"Content-Length: 53",
			"Cache-Control: max-age=0",
			"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
			"Origin: http://www.iatf-customerportal.org",
			"Upgrade-Insecure-Requests: 1",
			"User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36",
			"Content-Type: application/x-www-form-urlencoded",
			"Referer: http://www.iatf-customerportal.org/",
			"Accept-Encoding: gzip, deflate",
			"Accept-Language: zh-CN,zh;q=0.8"
		);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_ENCODING, ""); //设置编码
		$output = curl_exec($curl);
		curl_close($curl);

		if(stripos($output,'does not exist')){
			$result=false;
			return $result;
		}else if(stripos(strstr($output,'Validity:'),'YES')){
			$result=true;
			return $result;
		}else{
			$result='检验过程错误';
			return $result;
		}
		
	}
}