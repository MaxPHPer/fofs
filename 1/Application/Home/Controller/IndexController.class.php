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
    public function personal_login(){
        session(null);

        $data['email']=I('post.user');              //获得用户名
        $data['password']=md5(I('post.password'));  //获得密码

        //确定用户类型
        $User=M('User');

        $list=$User->getbyEmail($data['email']);    //读取用户数据

        if($list){
            if($list['password']==$data['password']){
            	session('nickname',$list['nickname']);
                session('user_id',$list['id']);
                session('email',$list['email']);
                session('institution_type',$list['institution_type']);
                
                $this->success('登陆成功',__APP__.'/Home/Individual/individualProfile');            
            }
            else{
                $this->error('用户名或密码错误');
            }
        }
        else{
            $this->error('用户名或密码错误');
        }
    }

    //机构登陆
    public function institution_login(){
        session(null);

        $data['email']=I('post.email');              //获得用户名
        $data['password']=md5(I('post.password'));  //获得密码

        $data['institution_type']=I('post.institution_type');

        //确定用户类型
        switch ($data['institution_type']) {
            /*LP(母基金管理机构)*/
            case '1':  $User=M('Lp');  
                       $success_url='/Lp/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/lpCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       $fourth_sign_url='/Register/lpFundsInfo';
                       break;
            /*LP(母基金管理机构)end*/

            /*GP(私募股权基金管理机构)*/
            case '2':  $User=M('Gp');  
                       $success_url='/Gp/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/gpCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       $fourth_sign_url='/Register/gpFundsInfo';
                       break;
            /*GP(私募股权基金管理机构)end*/

            /*创业公司*/
            case '3':  $User=M('Startup_company');  
                       $success_url='/Startups/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/startupCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       break;
            /*创业公司end*/

            /*fa服务机构*/
            case '4':  $User=M('Fa');  
                       $success_url='/Sa/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/faCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       $fourth_sign_url='/Register/faSuccessCase';
                       break;
            /*fa服务机构end*/

            /*法务服务机构*/
            case '5':  $User=M('Legal_agency');  
                       $success_url='/Sa/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/laCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       $fourth_sign_url='/Register/laServiceInfo';
                       break;
            /*法务服务机构end*/

            /*财务服务机构*/
            case '6':  $User=M('Financial_institution');  
                       $success_url='/Sa/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/fiCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       $fourth_sign_url='/Register/fiServiceInfo';
                       break;
            /*财务服务机构end*/

            /*众创空间*/
            case '7':  $User=M('Business_incubator');  
                       $success_url='/Sa/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/biCompanyInfo';
                       $third_sign_url='/Register/membersInfo';
                       $fourth_sign_url='/Register/biServiceInfo';
                       break;
            /*众创空间end*/

            /*其它机构*/
            case '8':  $User=M('Other_institution');  
                       $success_url='/Other/individualProfile'; 
                       $first_sign_url='/Register/personalInfo';
                       $second_sign_url='/Register/otherInstitutionInfo';
                       $third_sign_url='/Register/membersInfo';
                       break;
            /*其它机构*/

            /*个人*/
            case '9':  $User=M('User');  
                       $success_url='/Individual/individualProfile'; 
                       break;
                    
            default:break;
        }



        $list=$User->getbyEmail($data['email']);    //读取用户数据

        if($list){
            if($list['password']==$data['password']){
                session('nickname',$list['admin_name']?$list['admin_name']:$list['email']);
                session('institution_abbr',$list['institution_abbr']);
                session('email',$list['email']);
                session('user_id',$list['id']);
                session('institution_type',$list['institution_type']);

                if($list['state']==='200'){  //账号已完成注册，且正常
                    $this->success('登陆成功',__APP__.'/Home'.$success_url);
                    
                }else if($list['state']==='2'){  //账号死锁
                    session(null);
                    cookie(null);
                    $this->success('该账号已被后台锁死，请联系管理员',__APP__.'/Home/Index/index');    
                }else if($list['state']==='1'){  //账号正常，未完成全部注册
                    switch($list['reg_step']){
                        case 1: $this->success('登陆成功,你的信息尚未填写完全,请继续填写',__APP__.'/Home'.$first_sign_url); break;
                        case 2: $this->success('登陆成功,你的信息尚未填写完全,请继续填写',__APP__.'/Home'.$second_sign_url); break;
                        case 3: $this->success('登陆成功,你的信息尚未填写完全,请继续填写',__APP__.'/Home'.$third_sign_url); break;
                        case 4: $this->success('登陆成功,你的信息尚未填写完全,请继续填写',__APP__.'/Home'.$fourth_sign_url); break;
                    }

                }else{
                    cookie('institution_type',$list['institution_type']);
                    cookie('email',$list['email']);
                    $this->error('账号尚未被激活，已经发送邮件至你邮箱，请登录邮箱点击确认',__APP__.'/Home/Register/resend_email');
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