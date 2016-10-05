<?php
namespace Admin\Controller;
use Admin\Controller;
class ManagerController extends BaseController {
	public function modify_manager(){
		$User = M('Admin');
		$map['group_id'] = array('elt','2');
		$list = $User->where($map)->select();

		$Group=M('Group');		//获取群组

		foreach ($list as $key => $value) {
			$list[$key]['reg_time']=date('Y-m-d H:i:s',$value["reg_time"]);		//获取注册时间
			$list[$key]['group']=$Group->where('priority='.$value['group_id'])->getField('name');	//获取群组名称
		}

		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
	}

	public function new_manager(){
		$username=session('username');
        $this->assign('username',$username);

        $Group=M('Group');
        $list=$Group->select();
        if(!$list)
			$this->error('请先设置群组权限表','group_manager');
		$this->assign('list',$list);
    	$this->display();
	}

	//添加管理员
	public function add_new_manager(){
		$User = D('Admin');
		$data=I('post.');

		$upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/uploads/admin_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->saveName  =     '_'.time();	//上传文件名
        $upload->autoSub   =     false;    //不使用子目录

        if(!file_exists($upload->rootPath))
            $test1=mkdir('Public/uploads/admin_pic', 0777 ,1);

        /*写入数据*/
        if($User->create()) {
        	if(!$data['password']||!$data['repassword']||!$data['email'])
        		$this->error('表单不完整！');
        	else{
	        	$data['password']=md5($data['password']);
	        	$data['repassword']=md5($data['repassword']);

	        	if($data['password']==$data['repassword']){
	        		/*上传头像*/
	        		foreach($_FILES as $key =>$file){
			             if(!empty($file['name'])) {
			                 // 上传单个文件 
			                 $info   =   $upload->uploadOne($file);
			                 if(!$info) {// 上传错误提示错误信息
			                    $this->error($upload->getError());
			                 }else{// 上传成功 获取上传文件信息
			                    $data['face_url']=$info['savename'];
			                 }
			             }
			        }

	        		$data['reg_time']=time();
		            $result =   $User->add($data);
		            if($result) {
		            	$new_name=$result.$info['savename'];
		            	rename("./Public/uploads/admin_pic/".$info['savename'],"./Public/uploads/admin_pic/".$new_name);	
		            	//更新文件名
		            	$User->where('id='.$result)->setField('face_url',$new_name); //更新数据库
		                $this->success('数据添加成功！',"modify_manager");
		            }else{
		                $this->error('数据添加错误！');
		            }
		        }
		     	else{
		     		$this->error('两次密码不同！');
		     	}
	    	}
        }
        else{
            $this->error($User->getError());
        }
	}

	//删除管理员
    public function delete_manager(){      
        $User=M('Admin');
        $img = $User->where('id='.I('get.id'))->getField('face_url');      //读取原头像
        if($User->delete(I('get.id'))){
        	unlink('./Public/uploads/admin_pic/'.$img);  //删除头像
            $this->success('删除成功');
        }else{
            $this->error($User->getError());
        }
    }

    //编辑
    public function edit_manager(){
        $User=M('Admin');

        $Group=M('Group');		//获取群组
    	$Group_list=$Group->select();
    	$this->assign('list',$Group_list);

        $id=I('get.id');
        $list=$User->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_manager(){
        $User=M('Admin');
        $data=I('post.');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/uploads/admin_pic/'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->saveName  =     $data['id'].'_'.time();        //设置文件名为 用户ID_上传时间
        $upload->autoSub   =     false;    //不使用子目录

        $img = $User->where('id='.$data['id'])->getField('face_url');      //读取原头像

        if($User->create()){
      		if(!$data['password'])	$User->field('password',ture);	//如未输入密码保持不变
	      	if(!$data['email'])
	        		$this->error('表单不完整！');
	        else{
		        	if(md5($data['password'])==md5($data['repassword'])){
						/*上传头像*/
		        		foreach($_FILES as $key =>$file){
				             if(!empty($file['name'])) {
				                 // 上传单个文件 
				                 $info   =   $upload->uploadOne($file);
				                 if(!$info) {// 上传错误提示错误信息
				                    $this->error($upload->getError());
				                 }else{// 上传成功 获取上传文件信息
				                 	unlink('./Public/uploads/admin_pic/'.$img);  //删除原文件
				                    $User->face_url=$info['savename'];
				                 }
				             }
				        }

			        	$User->password=md5($data['password']);		        		
		        		$User->reg_time=time();
			            if($insertid=$User->save()){
			                $this->success('更新成功','modify_manager');
			            }
			            else{
			                $this->error($User->getError());
			            }
			        }
			        else $this->error('两次密码不一致！');
			    }
        }
        else{
            $this->error($User->getError());
        }
    }

    //群组管理
    public function group_manager(){
    	$Group = M('group');
		$list = $Group->select();
		$this->assign('list',$list);
		$username=session('username');
		$this->assign('username',$username);
		
		$this->display();
    }

    public function new_group(){
		$username=session('username');
        $this->assign('username',$username);

    	$this->display();
	}

	//添加群组
	public function add_new_group(){
		$group = D('group');

        if($group->create()) {
        	$data=I('post.');
		    $result = $group->add($data);
		    if($result) {
		       $this->success('数据添加成功！',"group_manager");
		    }else{
		       $this->error('数据添加错误！');
		    }
        }
        else{
            $this->error($group->getError());
        }
	}

	//编辑群组
	public function edit_group(){
        $Group=M('Group');
        $id=I('get.id');
        $list=$Group->where("id=$id ")->find();
        $this->assign('data',$list);
        $username=session('username');
        $this->assign('username',$username);
        $this->display();   
    }

    //提交编辑
    public function update_group(){
		$Group = M('Group');

        if($Group->create()) {
		    $result = $Group->save();
		    if($result) {
		       $this->success('数据更新成功！',"group_manager");
		    }else{
		       $this->error('数据更新错误！');
		    }
        }
        else{
            $this->error($Group->getError());
        }
	}

	//删除群组
	public function delete_group(){      
        $Group=M('Group');
        if($Group->delete(I('get.id'))){
            $this->success('删除成功');
        }else{
            $this->error($Group->getError());
        }
    }
}