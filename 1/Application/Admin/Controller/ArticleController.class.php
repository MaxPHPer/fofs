<?php
namespace Admin\Controller;
use Admin\Controller;
class ArticleController extends BaseController {
    public function add_article(){
        //文章类型只能有一篇的情况
        if(I('article_type')>=4){
            $Article=M('Article');
            $article=$Article->getByArticle_type(I('article_type'));
            //已经存在该类型文章了
            if($article){
                $this->error('已经添加过了,可以点击修改',"all_articles?article_type=".I('article_type'));
            }
        }

        //文章类型
        $this->assign('article_type',I('article_type'));

        $this->display();
    }

    //添加文章
    public function do_add_article(){
    	if(!I('title')||!I('content')||!I('article_type')){
    		$this->error('标题或者内容不能为空');
    	}
    	
    	$article['article_type']=I('article_type');
    	$article['title']=I('title');
    	$article['content']=I('content');
    	$article['institution_type']=session('institution_type');
    	$article['author_id']=session('user_id');
    	$article['author_name']=session('username');
    	$article['pub_time']=time();

    	$Article=M('Article');
	    $result = $Article->add($article);
	    if($result) {
	       $this->success('数据添加成功！',"all_articles?article_type=".I('article_type'));
	    }else{
	       $this->error('数据添加错误！');
	    }

    }

    //所有文章
    public function all_articles(){
    	$Article=M("Article");
    	$where['article_type']=I('article_type');

        //查询满足要求的总的记录数
        $count=$Article->where($where)->count();
        //实例化分页类传入总记录数和煤业显示的记录数
        $Page=new \Think\Page($count,2);
        //分页显示输出
        $show=$Page->show();
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$news=$Article->where($where)->order('id desc')->field('id,title,institution_type,author_name,pub_time')->limit($Page->firstRow.','.$Page->listRows)->select();

        //赋值数据集
    	$this->assign('news',$news);
        //赋值分页输出
        $this->assign('page',$show);

        //文章类型
        $this->assign('article_type',I('article_type'));

    	$this->display();

    }

    //文章详情
    public function article_detail(){
        $Article=M('Article');
        $article=$Article->getById(I('article_id'));
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }

    //删除文章
    public function delete_article(){

        $table=M('Article');
        if($table->delete($_GET['article_id'])){
            $this->success('删除成功');
        }else{
            $this->error($table->getError());
        }
    }

    //修改文章
    public function edit_article(){
        $Article=M('Article');
        $article=$Article->getById(I('article_id'));
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        //文章类型
        $this->assign('article_type',I('article_type'));

        $this->display();
    }

    //保存修改文章
    public function do_edit_article(){

        if(!I('title')||!I('content')||!I('article_type')){
            $this->error('标题或者内容不能为空');
        }
        
        $article['id']=I('article_id');
        $article['article_type']=I('article_type');
        $article['title']=I('title');
        $article['content']=I('content');
        $article['institution_type']=session('institution_type');
        $article['author_id']=session('user_id');
        $article['author_name']=session('username');
        $article['pub_time']=time();

        $table=M('Article');
        if($table->create($article)){
            if($insertid=$table->save()){
                $this->success('更新成功',__APP__.'/Admin/Article/all_articles?article_type='.I('article_type'));
            }
            else{
                $this->error($table->getError());
            }
        }else{
            $this->error($table->getError());
        }

    }
}