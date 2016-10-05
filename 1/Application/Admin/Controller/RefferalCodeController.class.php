<?php
namespace Admin\Controller;
use Admin\Controller;
class RefferalCodeController extends BaseController {
	//生产有效码
    public function product_code(){

		$username=session('username');
		$this->assign('username',$username);

		$this->display();
    }

	//生产有效码
    public function do_product_code(){

    	$Referral_code=M('Referral_code');
    	for($i=0;$i<I('number');$i++){
    		$data['code']=substr($this->create_guid(),0,I('bits'));
    		$data['effective_degree']=I('effective_degree');
    		$data['productive_time']=time();
    		$where['code']=$data['code'];
    		$codes=array();
    		$codes=$Referral_code->where($where)->select();
    		if(!$codes[0]){
    			$Referral_code->add($data);
    		}else{
    			$i-=1;
    		}
    	}

    	$this->success('有效码生成成功',__APP__.'/Admin/RefferalCode/code_manage');

    }

	//查看所有有效码
    public function code_manage(){

		$username=session('username');
		$this->assign('username',$username);
		
		$Referral_code=M('Referral_code');
		$codes=$Referral_code->select();
		$this->assign('codes',$codes);

		$this->display();
    }

    public function delete_code(){
    	if(I('id')){
    		$Referral_code=M('Referral_code');
    		$result=$Referral_code->delete(I('id'));
    		if($result){
    			$this->success('删除成功');
    		}
    	}
    }

	 /**
	 * 生成唯一的注册码
	 * @return string
	 */
	 public function create_guid($namespace = null) {
	    static $guid = '';
	    $uid = uniqid ( "", true );	//uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID。
	                                 
	    $data = $namespace;
	    $data .= $_SERVER ['REQUEST_TIME'];     // 请求那一刻的时间戳
	    $data .= $_SERVER ['HTTP_USER_AGENT'];  // 获取访问者在用什么操作系统
	    $data .= $_SERVER ['SERVER_ADDR'];      // 服务器IP
	    $data .= $_SERVER ['SERVER_PORT'];      // 端口号
	    $data .= $_SERVER ['REMOTE_ADDR'];      // 远程IP
	    $data .= $_SERVER ['REMOTE_PORT'];      // 端口信息
	                                 
	    $hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );
	    $guid = substr ( $hash, 0, 8 ) . substr ( $hash, 8, 4 )  . substr ( $hash, 12, 4 ) . substr ( $hash, 16, 4 ) . substr ( $hash, 20, 12 ) ;
	                                 
	    return $guid;
	}

}