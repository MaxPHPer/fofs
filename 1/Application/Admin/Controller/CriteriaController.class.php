<?php
namespace Admin\Controller;
use Admin\Controller;
class CriteriaController extends BaseController {
	/*********************体系认证*************************/
    public function modify_system(){
    	$System = M('System_criteria');
		$list = $System->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_system(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_system(){
		$System = D('System_criteria');

        if($System->create()) {
        	$data=I('post.');
		    $result = $System->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_system");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($System->getError());
        }
	}

	//编辑
	public function edit_system(){
        $System=M('System_criteria');
        $id=I('get.id');
        $list=$System->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_system(){
		$System = M('System_criteria');

        if($System->create()) {
		    $result = $System->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_system");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($System->getError());
        }
	}

	//删除
	public function delete_system(){      
        $System=M('System_criteria');
        if($System->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($System->getError());
        }
    }

    /*********************产品体系认证*************************/
    public function modify_product(){
    	$Product = M('Product_criteria');
		$list = $Product->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_product(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_product(){
		$Product = D('Product_criteria');

        if($Product->create()) {
        	$data=I('post.');
		    $result = $Product->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_product");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Product->getError());
        }
	}

	//编辑
	public function edit_product(){
        $Product=M('Product_criteria');
        $id=I('get.id');
        $list=$Product->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_product(){
		$Product = M('Product_criteria');

        if($Product->create()) {
		    $result = $Product->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_product");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Product->getError());
        }
	}

	//删除
	public function delete_product(){      
        $Product=M('Product_criteria');
        if($Product->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Product->getError());
        }
    }

    /*********************认证机构*************************/
    public function modify_body(){
    	$Body = M('Certification_body');
		$list = $Body->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_body(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_body(){
		$Body = D('Certification_body');

        if($Body->create()) {
        	$data=I('post.');
		    $result = $Body->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_body");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Body->getError());
        }
	}

	//编辑
	public function edit_body(){
        $Body=M('Certification_body');
        $id=I('get.id');
        $list=$Body->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_body(){
		$Body = M('Certification_body');

        if($Body->create()) {
		    $result = $Body->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_body");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Body->getError());
        }
	}

	//删除
	public function delete_body(){      
        $Body=M('Certification_body');
        if($Body->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Body->getError());
        }
    }
}