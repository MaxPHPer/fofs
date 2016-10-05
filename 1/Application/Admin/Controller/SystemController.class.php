<?php
namespace Admin\Controller;
use Admin\Controller;
class SystemController extends BaseController {

	/*********************职能表*************************/
	public function modify_function(){
		$Function = M('Function');
		$list = $Function->select();

		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
	}

    public function new_function(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加职能
	public function add_new_function(){
		$function = D('function');

        if($function->create()) {
        	$data=I('post.');
		    $result = $function->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_function");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($function->getError());
        }
	}

	//编辑职能
	public function edit_function(){
        $function=M('function');
        $id=I('get.id');
        $list=$function->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_function(){
		$function = M('function');

        if($function->create()) {
		    $result = $function->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_function");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($function->getError());
        }
	}

	//删除职能
	public function delete_function(){      
        $function=M('function');
        if($function->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($function->getError());
        }
    }

	/*********************国家代码*************************/
    public function modify_country(){
    	$Country = M('Country_code');
		$list = $Country->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_country(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_country(){
		$Country = D('Country_code');

        if($Country->create()) {
        	$data=I('post.');
		    $result = $Country->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_country");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Country->getError());
        }
	}

	//编辑
	public function edit_country(){
        $Country=M('Country_code');
        $id=I('get.id');
        $list=$Country->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_country(){
		$Country = M('Country_code');

        if($Country->create()) {
		    $result = $Country->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_country");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Country->getError());
        }
	}

	//删除
	public function delete_country(){      
        $Country=M('Country_code');
        if($Country->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Country->getError());
        }
    }

	/*********************省份代码*************************/
    public function modify_province(){
        $Country=M('Country_code');
    	$Province = M('Province_code');
		$list = $Province->select();
        foreach ($list as $key => $value) {
            $list[$key]['country']=$Country->where('id='.$value['country_id'])->getField('name');
        }
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_province(){
        $Country=M('Country_code');
        $list=$Country->select();
        if(!$list)
            $this->error('没有国家编号，请先设置国家','modify_country');
        else{
            $this->assign('list',$list);
		    $username=session('username');
            $this->assign('username',$username);
    	   $this->display();
        }
	}

	//添加
	public function add_new_province(){
		$Province = D('Province_code');

        if($Province->create()) {
        	$data=I('post.');
		    $result = $Province->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_province");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Province->getError());
        }
	}

	//编辑
	public function edit_province(){
        $Country=M('Country_code');
        $country_list=$Country->select();
        $Province=M('Province_code');
        $id=I('get.id');
        $list=$Province->where("id=$id ")->find();
        $this->assign('data',$list);
        $this->assign('list',$country_list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_province(){
		$Province = M('Province_code');

        if($Province->create()) {
		    $result = $Province->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_province");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Province->getError());
        }
	}

	//删除
	public function delete_province(){      
        $Province=M('Province_code');
        if($Province->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Province->getError());
        }
    }

    /*********************区域划分*************************/
    public function modify_area(){
        $Area = M('Area_partition');
        $list = $Area->select();
        $this->assign('list',$list);
        $username=session('username');
        $this->assign('username',$username);
        
        $this->display();
    }

    public function new_area(){
        $username=session('username');
        $this->assign('username',$username);

        $this->display();
    }

    //添加
    public function add_new_area(){
        $Area = D('Area_partition');

        if($Area->create()) {
            $data=I('post.');
            $result = $Area->add($data);
            if($result) {
               $this->success('数据添加成功！',"modify_area");
            }else{
               $this->error('数据添加错误！');
            }
        }
        else{
            $this->error($Area->getError());
        }
    }

    //编辑
    public function edit_area(){
        $Area=M('Area_partition');
        $id=I('get.id');
        $list=$Area->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_area(){
        $Area = M('Area_partition');

        if($Area->create()) {
            $result = $Area->save();
            if($result) {
               $this->success('数据更新成功！',"modify_area");
            }else{
               $this->error('数据更新错误！');
            }
        }
        else{
            $this->error($Area->getError());
        }
    }

    //删除
    public function delete_area(){      
        $Area=M('Area_partition');
        if($Area->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Area->getError());
        }
    }
}