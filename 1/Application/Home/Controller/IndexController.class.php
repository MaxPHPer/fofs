<?php
namespace Home\Controller;
use Home\Controller;
class IndexController extends BaseController {
    //首页
    public function index(){

        $Article=M("Article");
        
        //新闻
        $where['article_type']=1;
        $news=$Article->where($where)->order('id desc')->limit(1,10)->select();
        //赋值数据集
        $this->assign('news',$news);

        //政策法规
        $where['article_type']=2;
        $policies=$Article->where($where)->order('id desc')->limit(10)->select();
        //赋值数据集
        $this->assign('policies',$policies);


        //投资事件
        $where['article_type']=3;
        $investments=$Article->where($where)->order('id desc')->limit(10)->select();
        //赋值数据集
        $this->assign('investments',$investments);

        //联盟活动
        $where['article_type']=4;
        $allianceActivities=$Article->where($where)->order('id desc')->limit(10)->select();
        //赋值数据集
        $this->assign('allianceActivities',$allianceActivities);


        $this->display();
    }

    //登陆
    public function login(){
        session(null);

        $data['email']=I('post.user');              //获得用户名
        $data['password']=md5(I('post.password'));  //获得密码

        if(I('post.buyer')){                        //确定用户类型
            $User=M('Buyer');
            $key='buyer';
        }
        else{
            $User=M('Supplier');
            $key='supplier';
        }
        
        $list=$User->getbyEmail($data['email']);    //读取用户数据

        if($list){
            if($list['password']==$data['password']){
            	session('username',$list['username']);
                session('user_id',$list['id']);
                session('group_id',$list['group_id']);
                if($list[$key.'_company_id']==null){
                    session(null);
                    cookie('user_id',$list['id']);
                    $this->error('未填写公司信息，请完善',__APP__.'/Home/Register/'.$key.'CompanyInfo');
                }
                if(I('post.buyer')){
                	session('type',1);
                    $this->success('采购商登陆成功',__APP__.'/Home/Search/search');
                }else{
                	session('type',2);
                    $this->success('供应商登陆成功',__APP__.'/Home/Supplier/supplierProfile');
                }
                
            }
            else{
                $this->error('用户名或密码错误');
            }
        }
        else{
            $this->error('用户名或密码错误');
        }
    }

    //登出
    public function logout(){
    	session(null);
    	$this->success('退出成功',__APP__.'/Home/Index');
    }

    //关于联盟
    public function aboutAlliance(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(I('article_type'));
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        //文章类型
        $this->assign('article_type',I('article_type'));

        $this->display();
    }

    //联盟新闻列表
    public function aboutAllianceNews(){
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
    public function articleDetail(){
        $Article=M('Article');
        $article=$Article->getById(I('article_id'));
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }

    //文章列表
    public function articleList(){
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

    //文章列表
    public function aboutUs(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(5);
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }

    //文章列表
    public function notices(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(6);
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }

    //文章列表
    public function contactUs(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(7);
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }

    //文章列表
    public function links(){
        $Article=M('Article');
        $article=$Article->getByArticle_type(8);
        $article['content']=htmlspecialchars_decode($article['content']);

        $this->assign('article',$article);

        $this->display();
    }
}