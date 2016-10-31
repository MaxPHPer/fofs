<?php
namespace Home\Controller;
use Home\Controller;
class SearchController extends BaseController {

	//首页
    public function search(){

        $this->display();
    }

    //lp搜索
    public function lpSearch(){
    	$User=M('Lp');
    	$results=$User->where($where)->field('id,institution_type,institution_fullname_cn,institution_logo_img,is_securities_fund,is_stock_fund,is_startup_fund,is_other_fund')->select();
    	$this->assign('results',$results);

        $this->display();
    }

    //lp详情
    public function lpProfile(){


      //获取用户信息
	  $user_id=I('get.id');
	  $institution_type=I('get.institution_type');
	  $user=$this->getInfo($user_id,$institution_type);       
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


            default: $this->error('请选择机构类型!');break;
        } 
        $list=$User->getById($id);
        return $list;
    }

    //gp搜索
    public function gpSearch(){
    	$User=M('Gp');
    	$results=$User->where($where)->field('id,institution_type,institution_fullname_cn,institution_logo_img,is_securities_fund,is_stock_fund,is_startup_fund,is_other_fund')->select();
    	$this->assign('results',$results);

        $this->display();
    }

    //gp详情
    public function gpProfile(){


      //获取用户信息
	  $user_id=I('get.id');
	  $institution_type=I('get.institution_type');
	  $user=$this->getInfo($user_id,$institution_type);       
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
}
