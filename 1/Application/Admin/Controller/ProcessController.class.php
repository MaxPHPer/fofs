<?php
namespace Admin\Controller;
use Admin\Controller;
class ProcessController extends BaseController {

	/*********************一级*************************/
	public function modify_first(){
		$First = M('Processing_technic_first');
		$list = $First->select();

		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
	}

    public function new_first(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_first(){
		$First = D('Processing_technic_first');

        if($First->create()) {
        	$data=I('post.');
		    $result = $First->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_first");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($First->getError());
        }
	}

	//编辑
	public function edit_first(){
        $First=M('Processing_technic_first');
        $id=I('get.id');
        $list=$First->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_first(){
		$First = M('Processing_technic_first');

        if($First->create()) {
		    $result = $First->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_first");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($First->getError());
        }
	}

	//删除
	public function delete_first(){      
        $First=M('Processing_technic_first');
        if($First->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($First->getError());
        }
    }

	/*********************二级*************************/
    public function modify_second(){
    	$Second = M('Processing_technic_second');	//获取列表
		$list = $Second->select();

		$First = M('Processing_technic_first');		//获取一级目录
		foreach ($list as $key => $value) {
            $list[$key]['first']=$First->where('id='.$value['first_level_id'])->getField('name');
        }

		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_second(){
    	$First = M('Processing_technic_first');	//获取一级目录
    	if(!$list=$First->select())		
    		$this->error('请先设置一级目录','modify_first');
    	$this->assign('list',$list);

		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_second(){
		$Second = D('Processing_technic_second');

        if($Second->create()) {
        	$data=I('post.');
		    $result = $Second->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_second");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Second->getError());
        }
	}

	//编辑
	public function edit_second(){
        $Second=M('Processing_technic_second');
        $id=I('get.id');
        $list=$Second->where("id=$id ")->find();

        $First = M('Processing_technic_first');		//获取一级目录
		$first_list=$First->select();
		$this->assign('list',$first_list);

        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_second(){
		$Second = M('Processing_technic_second');

        if($Second->create()) {
		    $result = $Second->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_second");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Second->getError());
        }
	}

	//删除
	public function delete_second(){      
        $Second=M('Processing_technic_second');
        if($Second->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Second->getError());
        }
    }

	/*********************三级*************************/
    public function modify_third(){
        $Second=M('Processing_technic_second');

    	$Third = M('Processing_technic_third');	//获取目录
		$list = $Third->select();
        foreach ($list as $key => $value) {
            $list[$key]['second']=$Second->where('id='.$value['second_level_id'])->getField('name');
        }
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_third(){
        $Second=M('Processing_technic_second');
        $list=$Second->select();
        if(!$list)
            $this->error('请先设置二级目录','modify_second');
        else{
            $this->assign('list',$list);
		    $username=session('username');
            $this->assign('username',$username);
    	   $this->display();
        }
	}

	//添加
	public function add_new_third(){
		$Third = D('Processing_technic_third');

        if($Third->create()) {
        	$data=I('post.');
		    $result = $Third->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_third");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Third->getError());
        }
	}

	//编辑
	public function edit_third(){
        $Second=M('Processing_technic_second');
        $Second_list=$Second->select();
        $Third=M('Processing_technic_third');
        $id=I('get.id');
        $list=$Third->where("id=$id ")->find();
        $this->assign('data',$list);
        $this->assign('list',$Second_list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_third(){
		$Third = M('Processing_technic_third');

        if($Third->create()) {
		    $result = $Third->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_third");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Third->getError());
        }
	}

	//删除
	public function delete_third(){      
        $Third=M('Processing_technic_third');
        if($Third->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Third->getError());
        }
    }

    /*********************单位*************************/
	public function modify_unit(){
		$Unit = M('Unit');
		$list = $Unit->select();

		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
	}

    public function new_unit(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_unit(){
		$Unit = D('Unit');

        if($Unit->create()) {
        	$data=I('post.');
		    $result = $Unit->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_unit");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Unit->getError());
        }
	}

	//编辑
	public function edit_unit(){
        $Unit=M('Unit');
        $id=I('get.id');
        $list=$Unit->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_unit(){
		$Unit = M('Unit');

        if($Unit->create()) {
		    $result = $Unit->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_unit");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Unit->getError());
        }
	}

	//删除
	public function delete_unit(){      
        $Unit=M('Unit');
        if($Unit->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Unit->getError());
        }
    }
}