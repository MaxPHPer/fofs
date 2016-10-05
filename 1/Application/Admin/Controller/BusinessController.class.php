<?php
namespace Admin\Controller;
use Admin\Controller;
class BusinessController extends BaseController {
	/*********************问题*************************/
    public function modify_question(){
    	$Question = M('Business_compliance');
		$list = $Question->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_question(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_question(){
		$Question = D('Business_compliance');

        if($Question->create()) {
        	$data=I('post.');
		    $result = $Question->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_question");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Question->getError());
        }
	}

	//编辑
	public function edit_question(){
        $Question=M('Business_compliance');
        $id=I('get.id');
        $list=$Question->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_question(){
		$Question = M('Business_compliance');

        if($Question->create()) {
		    $result = $Question->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_question");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Question->getError());
        }
	}

	//删除
	public function delete_question(){      
        $Question=M('Business_compliance');
        if($Question->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Question->getError());
        }
    }

    /*********************选项*************************/
    public function modify_choice(){
    	$Choice = M('Business_compliance_question_choice');
		$list = $Choice->select();

		$Question= M('Business_compliance');	//获取问题
		foreach ($list as $key => $value) {
			$list[$key]['question']=$Question->where('id='.$value['question_id'])->getField('question');
		}

		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_choice(){
		$username=session('username');
        $this->assign('username',$username);

        $Question= M('Business_compliance');	//获取问题
        $list=$Question->select();
        if(!$list)
        	$this->error('请先设置问题','modify_question');

        $this->assign('list',$list);
    	$this->display();
	}

	//添加
	public function add_new_choice(){
		$Choice = D('Business_compliance_question_choice');

        if($Choice->create()) {
        	$data=I('post.');
		    $result = $Choice->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_choice");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Choice->getError());
        }
	}

	//编辑
	public function edit_choice(){
        $Choice=M('Business_compliance_question_choice');
        $id=I('get.id');
        $list=$Choice->where("id=$id ")->find();
        $this->assign('data',$list);

        $Question= M('Business_compliance');	//获取问题
        $question_list=$Question->select();
        $this->assign('list',$question_list);

        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_choice(){
		$Choice = M('Business_compliance_question_choice');

        if($Choice->create()) {
		    $result = $Choice->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_choice");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Choice->getError());
        }
	}

	//删除
	public function delete_choice(){      
        $Choice=M('Business_compliance_question_choice');
        if($Choice->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Choice->getError());
        }
    }
}