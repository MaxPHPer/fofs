<?php
namespace Home\Controller;
use Home\Controller;
class SearchController extends BaseController {

	  //首页
    public function search(){
        //搜索类型标示
        $search_type=I('get.search_type')?I('get.search_type'):1;
        $this->assign('search_type',$search_type);

        //获取关键词
        $keywords=I('post.keywords')?I('post.keywords'):cookie('keywords');
        $this->assign('keywords',$keywords);
        cookie('keywords',$keywords);

        if($keywords){
          //搜索文章
          $Table=M('Article');
          $where=array();
          $where['title']=array('like',"%".$keywords."%");
          $articles=$Table->where($where)->order('pub_time desc')->select();
          $this->assign('articles',$articles);

          //搜索用户
          $Table=M('User');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['nickname']=array('like',"%".$keywords."%");
          $users=$Table->where($where)->select();
          foreach($users as $key=>$value){
            $users[$key]['institution_abbr']=$value['nickname'];
            $users[$key]['institution_logo_img']='individual_pic/'.($value['head_portrait_url']?$value['head_portrait_url']:'default.jpg');
            $users[$key]['detail_url']='individualProfile.html?id='.$value['id'].'&institution_type=9';
          }
          $this->assign('users',$users);

          $institutions=array();

          //搜索Lp机构
          $Table=M('Lp');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='lp_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='lpProfile.html?id='.$value['id'].'&institution_type=1';
          }
          $institutions=array_merge($institutions,$results);

          //搜索Gp机构
          $Table=M('Gp');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='gp_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='gpProfile.html?id='.$value['id'].'&institution_type=2';
          }
          $institutions=array_merge($institutions,$results);

          //搜索startup_company
          $Table=M('Startup_company');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='startup_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='startUpProfile.html?id='.$value['id'].'&institution_type=3';
          }
          $institutions=array_merge($institutions,$results);

          //搜索Fa机构
          $Table=M('Fa');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='fa_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='saProfile.html?id='.$value['id'].'&institution_type=4';
          }
          $institutions=array_merge($institutions,$results);

          //搜索法务
          $Table=M('Legal_agency');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='la_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='saProfile.html?id='.$value['id'].'&institution_type=5';
          }
          $institutions=array_merge($institutions,$results);

          //搜索财务机构
          $Table=M('Financial_institution');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='fi_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='saProfile.html?id='.$value['id'].'&institution_type=6';
          }
          $institutions=array_merge($institutions,$results);

          //搜索众创空间
          $Table=M('Business_incubator');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='bi_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='saProfile.html?id='.$value['id'].'&institution_type=7';
          }
          $institutions=array_merge($institutions,$results);

          //搜索其它机构
          $Table=M('Other_institution');
          $where=array();
          $where['state']=array('neq',400); //排除被删除的
          $where['institution_abbr']=array('like',"%".$keywords."%");
          $results=$Table->where($where)->select();
          foreach($results as $key=>$value){
            $results[$key]['institution_logo_img']='other_pic/'.($value['institution_logo_img']?$value['institution_logo_img']:'default.jpg');
            $results[$key]['detail_url']='otherProfile.html?id='.$value['id'].'&institution_type=8';
          }
          $institutions=array_merge($institutions,$results);

          $this->assign('institutions',$institutions);

        }else{
          $this->error('请输入关键词搜索');
        }

        $this->display();
    }

    //lp搜索
    public function lpSearch(){

      //根据lpproduct的条件求出所有的LP的id
      if(I('post.fund_type')){
        $where[I('post.fund_type')]=1;
        $this->assign(I('post.fund_type'),1);
      }

      if(I('post.investment_type')){
        $where['_string']=implode(' OR ',I('post.investment_type'));
        foreach(I('post.investment_type') as $investment_type){
          $this->assign(preg_replace('/[=1]+/i','',$investment_type),1);
        }
      }
      if(I('post.investment_field')){
        $where['investment_field']  = array('like', '%'.I('post.investment_field').'%');
        $this->assign('investment_field',I('post.investment_field'));
      }
      
      $Product=M('Lp_fund_product');
      $products=$Product->where($where)->distinct(true)->field('institution_id')->select();

      $Lp_ids=array();
      foreach($products as $product){
        $Lp_ids[]=$product['institution_id'];
      }

      if(empty($Lp_ids)){ //如果没有数据
        $this->assign('tip','暂无数据~');
        $this->display();
      }

    	$User=M('Lp');
      $where=array();
      $where['state']=array('neq',400); //排除被删除的
	    $where['id']=array('in',$Lp_ids);

      //查询满足要求的总的记录数
      $count=$User->where($where)->count();
      //实例化分页类传入总记录数和煤业显示的记录数
      $Page=new \Think\Page($count,10);
      //分页显示输出
      $show=$Page->show();
      // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      $results=$User->where($where)->order('id desc')->field('id,institution_type,institution_fullname_cn,institution_logo_img,is_securities_fund,is_stock_fund,is_startup_fund,is_other_fund')->limit($Page->firstRow.','.$Page->listRows)->select();

      //赋值分页输出
      $this->assign('page',$show);

      //如果登录了，则检测是否已经关注了该用户
      if(session('user_id')&&session('institution_type')){
          $Interest_list=M('Interest_list');
          $where['fan_id']=session('user_id');
          $where['fan_type']=session('institution_type');

          foreach($results as $key=>$value){
            $where['host_id']=$value['id'];
            $where['host_type']=$value['institution_type'];
            if($Interest_list->where($where)->select()){
              $results[$key]['is_by_followed']=1;
            }
          }
      }

      //赋值数据集
      $this->assign('results',$results);

      $this->display();
    }

    //lp详情
    public function lpProfile(){


      //获取用户信息
  	  $user_id=I('get.id');
  	  $institution_type=I('get.institution_type');
  	  $user=$this->getInfo($user_id,$institution_type);      

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

  	  $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);

      //基金信息
      $Lp_fund_product=M('Lp_fund_product');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $funds=$Lp_fund_product->where($where)->select();

      $Investment_project=M('Investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));


      $this->display();
    }

    //获取用户信息
    public function getInfo($id,$institution_type){
        switch ($institution_type) {
            /*LP(母基金管理机构)*/
            case '1':  $User=M('Lp');  break;
            /*LP(母基金管理机构)end*/

            /*GP(私募股权基金管理机构)*/
            case '2':  $User=M('Gp');  break;
            /*GP(私募股权基金管理机构)end*/

            /*创业公司*/
            case '3':  $User=M('Startup_company');  break;
            /*创业公司end*/

            /*fa服务机构*/
            case '4':  $User=M('Fa');  break;
            /*fa服务机构end*/

            /*法务服务机构*/
            case '5':  $User=M('Legal_agency');  break;
            /*法务服务机构end*/

            /*财务服务机构*/
            case '6':  $User=M('Financial_institution');  break;
            /*财务服务机构end*/

            /*众创空间*/
            case '7':  $User=M('Business_incubator');  break;
            /*众创空间end*/

            /*其它机构*/
            case '8':  $User=M('Other_institution');  break;
            /*其它机构*/

            /*个人用户*/
            case '9':  $User=M('User');  break;
            /*个人用户*/


            default: $this->error('请选择机构类型!');break;
        } 
        $list=$User->getById($id);
        return $list;
    }

    //gp搜索
    public function gpSearch(){
      //根据gpproduct的条件求出所有的LP的id
      
      if(I('post.fund_type')){
        $where[I('post.fund_type')]=1;
        $this->assign(I('post.fund_type'),1);
      }
      
      if(I('post.investment_field')){
        $where['investment_field']  = array('like', '%'.I('post.investment_field').'%');
        $this->assign('investment_field',I('post.investment_field'));
      }

      if(I('post.investment_region')){
        $where['investment_region']  = array('like', '%'.I('post.investment_region').'%');
        $this->assign('investment_region',I('post.investment_region'));
      }
      
      $Product=M('Gp_fund_product');
      $products=$Product->where($where)->distinct(true)->field('institution_id')->select();

      $Gp_ids=array();
      foreach($products as $product){
        $Gp_ids[]=$product['institution_id'];
      }

      if(empty($Gp_ids)){ //如果没有数据
        $this->assign('tip','暂无数据~');
        
        if(I('post.investment_type')){
          
          foreach(I('post.investment_type') as $investment_type){
            $this->assign(preg_replace('/[=1]+/i','',$investment_type),1);
          }
        }
        $this->display();
        die();
      }

    	$User=M('Gp');
      $where=array();
      $where['state']=array('neq',400); //排除被删除的
    	
      if(I('post.investment_type')){
        $where['_string']=implode(' OR ',I('post.investment_type'));
        foreach(I('post.investment_type') as $investment_type){
          $this->assign(preg_replace('/[=1]+/i','',$investment_type),1);
        }
      }
      $where['id']=array('in',$Gp_ids);

      //查询满足要求的总的记录数
      $count=$User->where($where)->count();
      
      //实例化分页类传入总记录数和煤业显示的记录数
      $Page=new \Think\Page($count,2);
      //分页显示输出
      $show=$Page->show();
      // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      $results=$User->where($where)->order('id desc')->field('id,institution_type,institution_fullname_cn,institution_logo_img,is_securities_fund,is_stock_fund,is_startup_fund,is_other_fund')->limit($Page->firstRow.','.$Page->listRows)->select();

      //赋值分页输出
      $this->assign('page',$show);

      //如果登录了，则检测是否已经关注了该用户
      if(session('user_id')&&session('institution_type')){
          $Interest_list=M('Interest_list');
          $where['fan_id']=session('user_id');
          $where['fan_type']=session('institution_type');

          foreach($results as $key=>$value){
            $where['host_id']=$value['id'];
            $where['host_type']=$value['institution_type'];
            if($Interest_list->where($where)->select()){
              $results[$key]['is_by_followed']=1;
            }
          }
      }
    	$this->assign('results',$results);

      $this->display();
    }

    //gp详情
    public function gpProfile(){


      //获取用户信息
  	  $user_id=I('get.id');
  	  $institution_type=I('get.institution_type');
  	  $user=$this->getInfo($user_id,$institution_type);     

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }
      
      


  	  $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);

      //基金信息
      $Gp_fund_product=M('Gp_fund_product');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $funds=$Gp_fund_product->where($where)->select();

      $Investment_project=M('Gp_investment_project');
      $total_funds_size=0;

      foreach($funds as $key => $value){
          $where2['fund_id']=$value['id'];
          $funds[$key]['investment_projects']=$Investment_project->where($where2)->select();

          //计算管理基金总规模
          $total_funds_size+=$funds[$key]['fund_size'];

      }

      $this->assign('funds',$funds);
      $this->assign('total_funds_size',$total_funds_size);
      $this->assign('total_funds_num',count($funds));


      $this->display();
    }

    //startUp搜索
    public function startUpSearch(){
      $User=M('Startup_company');
      $where=array();
      $where['state']=array('neq',400); //排除被删除的

      //查询满足要求的总的记录数
      $count=$User->where($where)->count();
      //实例化分页类传入总记录数和煤业显示的记录数
      $Page=new \Think\Page($count,2);
      //分页显示输出
      $show=$Page->show();
      // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      $results=$User->where($where)->order('id desc')->field('id,institution_type,institution_abbr,institution_logo_img,institution_abstract')->limit($Page->firstRow.','.$Page->listRows)->select();

      //赋值分页输出
      $this->assign('page',$show);

      //如果登录了，则检测是否已经关注了该用户
      if(session('user_id')&&session('institution_type')){
          $Interest_list=M('Interest_list');
          $where['fan_id']=session('user_id');
          $where['fan_type']=session('institution_type');

          foreach($results as $key=>$value){
            $where['host_id']=$value['id'];
            $where['host_type']=$value['institution_type'];
            if($Interest_list->where($where)->select()){
              $results[$key]['is_by_followed']=1;
            }
          }
      }
      $this->assign('results',$results);

      $this->display();
    }

    //startUp详情
    public function startUpProfile(){


      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);  

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);

      $this->display();
    }

    //sa搜索
    public function saSearch(){
      //机构类型标示
      $this->assign('institution_type',I('get.institution_type')?I('get.institution_type'):4);

      //区分是哪一个机构类型
      switch (I('get.institution_type')) {
        case 4:
          $User=M('Fa');
          break;
        
        case 5:
          $User=M('Legal_agency');
          break;
        
        case 6:
          $User=M('Financial_institution');
          break;
        
        case 7:
          $User=M('Business_incubator');
          break;

        case 8:
          $User=M('Other_institution');
          break;

        default:
          $User=M('Fa');
          break;
      }

      $where=array();
      $where['state']=array('neq',400); //排除被删除的
      //查询满足要求的总的记录数
      $count=$User->where($where)->count();
      //实例化分页类传入总记录数和煤业显示的记录数
      $Page=new \Think\Page($count,2);
      //分页显示输出
      $show=$Page->show();
      //赋值分页输出
      $this->assign('page',$show);

      $results=$User->where($where)->field('id,institution_type,institution_fullname_cn,institution_logo_img')->select();
      //如果登录了，则检测是否已经关注了该用户
      if(session('user_id')&&session('institution_type')){
          $Interest_list=M('Interest_list');
          $where['fan_id']=session('user_id');
          $where['fan_type']=session('institution_type');

          foreach($results as $key=>$value){
            $where['host_id']=$value['id'];
            $where['host_type']=$value['institution_type'];
            if($Interest_list->where($where)->select()){
              $results[$key]['is_by_followed']=1;
            }
          }
      }

      //区分是哪一个机构类型
      switch (I('get.institution_type')) {
        case 4:
          $this->assign('results1',$results);
          break;
        
        case 5:
          $this->assign('results2',$results);
          break;
        
        case 6:
          $this->assign('results3',$results);
          break;
        
        case 7:
          $this->assign('results4',$results);
          break;

        case 8:
          $this->assign('results5',$results);
          break;

        default:
          $this->assign('results1',$results);
          break;
      }

      $this->display();
    }

    //sa详情
    public function saProfile(){

      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);
      switch ($institution_type) {
          case 4: 

            $img_url='fa_pic/';
            break;
          
          case 5: 
  
            $img_url='la_pic/';
            break;

          case 6: 

            $img_url='fi_pic/';
            break;

          case 7: 

            $img_url='bi_pic/';
            break;
      }
        
      $user['institution_logo_img']=$img_url.$user['institution_logo_img'];      

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }


      $this->assign('user',$user);

      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);


      //产品服务信息
      switch($institution_type){
        case 4: $Server_product=M('Fa_successful_case'); break;
        case 5: $Server_product=M('Server_product'); break;
        case 6: $Server_product=M('Server_product'); break;
        case 7: $Server_product=M('Server_product'); break;
      }

      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $products=$Server_product->where($where)->select();

      $this->assign('products',$products);

      $this->display();
    }

    //其它机构详情
    public function otherProfile(){
      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);  

      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);


      //成员信息
      $Senior_executive=M('Senior_executive');
      $where['institution_type']=$institution_type;
      $where['institution_id']=$user_id;
      $members=$Senior_executive->where($where)->select();

      $Business_experience=M('Business_experience');
      foreach($members as $key => $value){
          $where2['senior_executive_id']=$value['id'];
          $members[$key]['business_experience']=$Business_experience->where($where2)->select();
      }

      $this->assign('members',$members);


      $this->display();
    }

    //个人主页
    public function individualProfile(){
      //获取用户信息
      $user_id=I('get.id');
      $institution_type=I('get.institution_type');
      $user=$this->getInfo($user_id,$institution_type);
      
      //判断是否已经关注了该用户
      if($user_id==session('user_id')&&$institution_type==session('institution_type')){
        $user['has_followed']=2;  //表示自己
      }else{
        $Interest_list=M('Interest_list');
        $where4['fan_id']=session('user_id');
        $where4['fan_type']=session('institution_type');
        $where4['host_id']=I('get.id');
        $where4['host_type']=I('get.institution_type');

        if($Interest_list->where($where4)->select()){
          $user['has_followed']=1;  //表示已经关注此用户
        }else{
          $user['has_followed']=0;  //表示尚未关注此用户
        }
      }

      $this->assign('user',$user);
      $this->display();
    }
}
