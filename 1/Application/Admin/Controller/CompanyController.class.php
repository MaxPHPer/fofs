<?php
namespace Admin\Controller;
use Admin\Controller;
class CompanyController extends BaseController {
	/*********************上市地点*************************/
    public function modify_stock(){
    	$Stock = M('Stock_market');
		$list = $Stock->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_stock(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_stock(){
		$Stock = D('Stock_market');

        if($Stock->create()) {
        	$data=I('post.');
		    $result = $Stock->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_stock");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Stock->getError());
        }
	}

	//编辑
	public function edit_stock(){
        $Stock=M('Stock_market');
        $id=I('get.id');
        $list=$Stock->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_stock(){
		$Stock = M('Stock_market');

        if($Stock->create()) {
		    $result = $Stock->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_stock");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Stock->getError());
        }
	}

	//删除
	public function delete_stock(){      
        $Stock=M('Stock_market');
        if($Stock->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Stock->getError());
        }
    }

    /*********************行业分类*************************/
    public function modify_industry(){
    	$Industry = M('Industry_cate');
		$list = $Industry->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_industry(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_industry(){
		$Industry = D('Industry_cate');

        if($Industry->create()) {
        	$data=I('post.');
		    $result = $Industry->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_industry");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Industry->getError());
        }
	}

	//编辑
	public function edit_industry(){
        $Industry=M('Industry_cate');
        $id=I('get.id');
        $list=$Industry->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_industry(){
		$Industry = M('Industry_cate');

        if($Industry->create()) {
		    $result = $Industry->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_industry");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Industry->getError());
        }
	}

	//删除
	public function delete_industry(){      
        $Industry=M('Industry_cate');
        if($Industry->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Industry->getError());
        }
    }

    /*********************公司类型*************************/
    public function modify_company(){
    	$Company = M('Company_cate');
		$list = $Company->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_company(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_company(){
		$Company = D('Company_cate');

        if($Company->create()) {
        	$data=I('post.');
		    $result = $Company->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_company");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Company->getError());
        }
	}

	//编辑
	public function edit_company(){
        $Company=M('Company_cate');
        $id=I('get.id');
        $list=$Company->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_company(){
		$Company = M('Company_cate');

        if($Company->create()) {
		    $result = $Company->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_company");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Company->getError());
        }
	}

	//删除
	public function delete_company(){      
        $Company=M('Company_cate');
        if($Company->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Company->getError());
        }
    }

    /*********************货币类型*************************/
    public function modify_currency(){
    	$Currency = M('Currency_type');
		$list = $Currency->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_currency(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_currency(){
		$Currency = D('Currency_type');

        if($Currency->create()) {
        	$data=I('post.');
		    $result = $Currency->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_currency");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Currency->getError());
        }
	}

	//编辑
	public function edit_currency(){
        $Currency=M('Currency_type');
        $id=I('get.id');
        $list=$Currency->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_currency(){
		$Currency = M('Currency_type');

        if($Currency->create()) {
		    $result = $Currency->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_currency");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Currency->getError());
        }
	}

	//删除
	public function delete_currency(){      
        $Currency=M('Currency_type');
        if($Currency->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Currency->getError());
        }
    }

    /*********************能力*************************/
    public function modify_ability(){
    	$Ability = M('Ability_question');
		$list = $Ability->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_ability(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_ability(){
		$Ability = D('Ability_question');

        if($Ability->create()) {
        	$data=I('post.');
		    $result = $Ability->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_ability");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Ability->getError());
        }
	}

	//编辑
	public function edit_ability(){
        $Ability=M('Ability_question');
        $id=I('get.id');
        $list=$Ability->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_ability(){
		$Ability = M('Ability_question');

        if($Ability->create()) {
		    $result = $Ability->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_ability");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Ability->getError());
        }
	}

	//删除
	public function delete_ability(){      
        $Ability=M('Ability_question');
        if($Ability->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Ability->getError());
        }
    }

    /*********************能力选项*************************/
    public function modify_ability_choice(){
        $Ability_choice = M('Ability_question_choice');
        $list = $Ability_choice->select();

        $Question= M('Ability_question');    //获取问题
        foreach ($list as $key => $value) {
            $list[$key]['question']=$Question->where('id='.$value['question_id'])->getField('question');
        }

        $this->assign('list',$list);
        $username=session('username');
        $this->assign('username',$username);
        
        $this->display();
    }

    public function new_ability_choice(){
        $username=session('username');
        $this->assign('username',$username);

        $Question= M('Ability_question');    //获取问题
        $list=$Question->select();
        if(!$list)
            $this->error('请先设置问题','modify_question');

        $this->assign('list',$list);
        $this->display();
    }

    //添加
    public function add_new_ability_choice(){
        $Ability_choice = D('Ability_question_choice');

        if($Ability_choice->create()) {
            $data=I('post.');
            $result = $Ability_choice->add($data);
            if($result) {
               $this->success('数据添加成功！',"modify_ability_choice");
            }else{
               $this->error('数据添加错误！');
            }
        }
        else{
            $this->error($Ability_choice->getError());
        }
    }

    //编辑
    public function edit_ability_choice(){
        $Ability_choice=M('Ability_question_choice');
        $id=I('get.id');
        $list=$Ability_choice->where("id=$id ")->find();
        $this->assign('data',$list);

        $Question= M('Ability_question');    //获取问题
        $question_list=$Question->select();
        $this->assign('list',$question_list);

        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_ability_choice(){
        $Ability_choice = M('Ability_question_choice');

        if($Ability_choice->create()) {
            $result = $Ability_choice->save();
            if($result) {
               $this->success('数据更新成功！',"modify_ability_choice");
            }else{
               $this->error('数据更新错误！');
            }
        }
        else{
            $this->error($Ability_choice->getError());
        }
    }

    //删除
    public function delete_ability_choice(){      
        $Ability_choice=M('Ability_question_choice');
        if($Ability_choice->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Ability_choice->getError());
        }
    }
    
    /*********************推荐渠道*************************/
    public function modify_recommand(){
    	$Recommand = M('Recommended_channel');
		$list = $Recommand->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_recommand(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加
	public function add_new_recommand(){
		$Recommand = D('Recommended_channel');

        if($Recommand->create()) {
        	$data=I('post.');
		    $result = $Recommand->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"modify_recommand");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($Recommand->getError());
        }
	}

	//编辑
	public function edit_recommand(){
        $Recommand=M('Recommended_channel');
        $id=I('get.id');
        $list=$Recommand->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_recommand(){
		$Recommand = M('Recommended_channel');

        if($Recommand->create()) {
		    $result = $Recommand->save();
		    if($result) {
		       $this->success('数据更新成功！',"modify_recommand");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Recommand->getError());
        }
	}

	//删除
	public function delete_recommand(){      
        $Recommand=M('Recommended_channel');
        if($Recommand->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Recommand->getError());
        }
    }
}