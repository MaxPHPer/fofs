<?php
namespace Home\Controller;
use Home\Controller;
class SearchController extends BaseController {

	//首页
    public function search(){
    	$this->assign('username',session('username'));
    	$this->assign('user_id',session('user_id'));
    	$this->assign('type',session('type'));
    	
    	//加工工艺一级目录
    	$table=M('processing_technic_first');
    	$processing_technic_firsts=$table->select();
        if(session('lang')=='en'){
            $processing_technic_firsts=zh_to_en($processing_technic_firsts);
        }

    	$this->assign('processing_technic_firsts',$processing_technic_firsts);

	    $Cur_type=M('Currency_type');     //货币类型
        $Cur_type_list=$Cur_type->select();
        if(session('lang')=='en'){
            $Cur_type_list=zh_to_en($Cur_type_list);
        }
        $this->assign('cur_type_list',$Cur_type_list);

        $Industry=M('Industry_cate');   //行业
        $Ind_list=$Industry->select();
        if(session('lang')=='en'){
            $Ind_list=zh_to_en($Ind_list);
        }
        $this->assign('ind_list',$Ind_list); 
        
        $Area=M('Area_partition');  //区域
        $area_list=$Area->select();
        if(session('lang')=='en'){
            $area_list=zh_to_en($area_list);
        }
        $this->assign('are_list',$area_list);   
        $this->assign('market_distribution_num',sizeof($area_list));

        $Criteria=M('system_criteria');	//体系认证标准
        $system_criterias=$Criteria->select();  
        $this->assign('system_criterias',$system_criterias);
        $this->assign('system_criterias_num',sizeof($system_criterias));

        $Criteria=M('Product_criteria');	//产品认证标准
        $product_criterias=$Criteria->select();
        $this->assign('product_criterias',$product_criterias);
        $this->assign('product_criterias_num',sizeof($product_criterias));

        $Country=M('Country_code');     //国家
        $Cou_list=$Country->select();
        if(session('lang')=='en'){
            $Cou_list=zh_to_en($Cou_list);
        }
        $this->assign('cou_list',$Cou_list);



        $this->display();
    }

    //根据国家id得到所有其省份
    public function get_all_provinces(){
    	$id=I('country_id');
    	$Province=M('Province_code');   //省份
        $Pro_list=$Province->where('country_id='.$id)->select();
        if(session('lang')=='en'){
            $Pro_list=zh_to_en($Pro_list);
        }
        $this->ajaxReturn($Pro_list);
    }

    //根据搜索代表性产品返回供应商信息
    public function get_companies_by_product(){
        //得到拥有该产品的供应商的公司的id
        $name=I('representative_product');
        $where1['name']=array('like','%'.$name.'%');
        $where1['name_en']=array('like','%'.$name.'%');
        $where1['_logic'] = 'OR';
        $table1=M('Representative_product');   //代表性产品
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $count = $table1->where($where1)->count();// 查询满足要求的总记录数
        //页数是从第一页开始的
        $page=(I('page')>1)?(int)(I('page')):1;
        $page=($page<=ceil($count/5))?$page:ceil($count/5);
        $supplier_company_id_list=$table1->where($where1)->page($page.',5')->getField('supplier_company_id',true);
        $supplier_company_id_list=array_unique($supplier_company_id_list);
        
        // var_dump($table1->where($where1)->select());
        // var_dump($supplier_company_id_list);

        $api=new ApiController();
        //被搜索展现一次，则推荐加1
        foreach($supplier_company_id_list as $supplier_company_id){
            $api->add_one_recommened_record($supplier_company_id);
        }

        //根据供应商公司的id返回供应商的详细信息
        $table2 = M('Supplier_company');
        $table3 = M('Turnover');
        $table4 = M('System_authentication_item');
        $table5 = M('Product_authentication_item');
        $table6 = M('Company_processing_technic_second');
        $table7 = M('Customers_distribution');
        $table8 = M('Market_distribution');
        $table9 = M('Currency_type');
        $table10 = M('Country_code');
        $table11 = M('Province_code');
        $table12 = M('System_criteria');
        $table13 = M('Product_criteria');
        $table14 = M('Processing_technic_second');
        $table15 = M('Industry_cate');
        $table16 = M('Area_partition');

        $supplier_companies=array();
        $i=0;
        foreach($supplier_company_id_list as $supplier_company_id){
            //得到公司基本信息
            $supplier_companies[$i] = $table2->getById($supplier_company_id);
            $currency_type=$table9->getById($supplier_companies[$i]['currency_type_id']);

            if(!$supplier_companies[$i]['logo_url']){
                $supplier_companies[$i]['logo_url']='temp.jpg';
            }

            if(session('lang')=='en'){
                $supplier_companies[$i]=zh_to_en_single($supplier_companies[$i]);  //name
                $supplier_companies[$i]=zh_to_en_single($supplier_companies[$i],'city','city_en');  //city_en
                $supplier_companies[$i]=zh_to_en_single($supplier_companies[$i],'address','address_en');  //address_en
            }


            if(session('lang')=='en'){
                $supplier_companies[$i]['register_capital_currency_type']=$currency_type['name_en'];
            }else{
                $supplier_companies[$i]['register_capital_currency_type']=$currency_type['name'];
            }

            //得到公司地址
            $country=$table10->getById($supplier_companies[$i]['country_id']);

            if(session('lang')=='en'){
                $supplier_companies[$i]['country']=$country['name_en'];
            }else{
                $supplier_companies[$i]['country']=$country['name'];
            }
            
            $province=$table11->getById($supplier_companies[$i]['province_id']);

            if(session('lang')=='en'){
                $supplier_companies[$i]['province']=$province['name_en'];
            }else{
                $supplier_companies[$i]['province']=$province['name'];
            }
            

            //得到最近一年营业额
            $where3['supplier_company_id']=$supplier_company_id;
            $turnovers = $table3->where($where3)->order('year desc')->select();

            $currency_type=$table9->getById($turnovers[0]['currency_type_id']);

            if(session('lang')=='en'){
                $supplier_companies[$i]['currency_type']=$currency_type['name_en'];
            }else{
                $supplier_companies[$i]['currency_type']=$currency_type['name'];
            }
            
            $supplier_companies[$i]['turnover']=$turnovers[0]['amount'];

            //得到所有管理体系认证
            $where4['supplier_company_id']=$supplier_company_id;
            $system_criteria_id_list=$table4->where($where4)->getField('system_criteria_id',true);
            $system_criterias=array();
            foreach ($system_criteria_id_list as $id) {
                $system_criteria=$table12->getById($id);
                $system_criterias[]=$system_criteria['name'];
            }
            $supplier_companies[$i]['system_criterias']=$system_criterias;

            //得到所有产品体系认证
            $where5['supplier_company_id']=$supplier_company_id;
            $product_criteria_id_list=$table5->where($where5)->getField('product_criteria_id',true);
            $product_criterias=array();
            foreach ($product_criteria_id_list as $id) {
                $product_criteria=$table13->getById($id);
                $product_criterias[]=$product_criteria['name'];
            }
            $supplier_companies[$i]['product_criterias']=$product_criterias;

            //得到所有二级工艺
            $where6['supplier_company_id']=$supplier_company_id;
            $technic_second_id_list=$table6->where($where6)->getField('technic_second_id',true);
            $technic_seconds=array();
            foreach ($technic_second_id_list as $id) {
                $technic_second=$table14->getById($id);

                if(session('lang')=='en'){
                    $technic_seconds[]=$technic_second['name_en'];
                }else{
                    $technic_seconds[]=$technic_second['name'];
                }
                
            }
            $supplier_companies[$i]['processing_technic_second']=$technic_seconds;

            //得到客户分布
            $where7['supplier_company_id']=$supplier_company_id;
            $supplier_companies[$i]['customers_distribution']=$table7->where($where7)->select();
            $j=0;
            foreach ($supplier_companies[$i]['customers_distribution'] as $value) {
                $industry_cate=$table15->getById($value['industry_cate_id']);

                if(session('lang')=='en'){
                    $supplier_companies[$i]['customers_distribution'][$j]['industry_cate']=$industry_cate['name_en'];
                }else{
                    $supplier_companies[$i]['customers_distribution'][$j]['industry_cate']=$industry_cate['name'];
                }

                
                $j++;
            }

            //得到市场分布
            $where8['supplier_company_id']=$supplier_company_id;
            $supplier_companies[$i]['market_distribution']=$table8->where($where8)->select();
            $j=0;
            foreach ($supplier_companies[$i]['market_distribution'] as $value) {
                $area_partition=$table16->getById($value['area_partition_id']);
                
                if(session('lang')=='en'){
                    $supplier_companies[$i]['market_distribution'][$j]['area_partition']=$area_partition['name_en'];
                }else{
                    $supplier_companies[$i]['market_distribution'][$j]['area_partition']=$area_partition['name'];
                }

                
                $j++;
            }

            $i++;
        }
        $data['now_page']=$page;    //当前页数
        $data['count']=$count;          //总记录数
        $data['supplier_companies']=$supplier_companies; //符合条件的全部公司

        $this->ajaxReturn($data);
    }

    //根据id数组返回供应商数组
    public function get_supplier_companies_by_ids($id_list=null){
        //得到拥有该产品的供应商的公司的id
        $supplier_company_id_list=$id_list?$id_list:I('supplier_company_id_list');

        //添加一次关注
        $api=new ApiController();
        foreach($supplier_company_id_list as $supplier_company_id){
            $api->add_one_watched_record($supplier_company_id);
        }

        //根据供应商公司的id返回供应商的详细信息
        $table2 = M('Supplier_company');
        $table3 = M('Turnover');
        $table4 = M('System_authentication_item');
        $table5 = M('Product_authentication_item');
        $table6 = M('Company_processing_technic_second');
        $table7 = M('Customers_distribution');
        $table8 = M('Market_distribution');
        $table9 = M('Currency_type');
        $table10 = M('Country_code');
        $table11 = M('Province_code');
        $table12 = M('System_criteria');
        $table13 = M('Product_criteria');
        $table14 = M('Processing_technic_second');
        $table15 = M('Industry_cate');
        $table16 = M('Area_partition');

        $supplier_companies=array();
        $i=0;
        foreach($supplier_company_id_list as $supplier_company_id){
            //得到公司基本信息
            $supplier_companies[$i] = $table2->getById($supplier_company_id);
            $currency_type=$table9->getById($supplier_companies[$i]['currency_type_id']);

            if(!$supplier_companies[$i]['logo_url']){
                $supplier_companies[$i]['logo_url']='temp.jpg';
            }

            if(session('lang')=='en'){
                $supplier_companies[$i]=zh_to_en_single($supplier_companies[$i]);  //name
                $supplier_companies[$i]=zh_to_en_single($supplier_companies[$i],'city','city_en');  //city_en
                $supplier_companies[$i]=zh_to_en_single($supplier_companies[$i],'address','address_en');  //address_en
            }


            if(session('lang')=='en'){
                $supplier_companies[$i]['register_capital_currency_type']=$currency_type['name_en'];
            }else{
                $supplier_companies[$i]['register_capital_currency_type']=$currency_type['name'];
            }

            //得到公司地址
            $country=$table10->getById($supplier_companies[$i]['country_id']);

            if(session('lang')=='en'){
                $supplier_companies[$i]['country']=$country['name_en'];
            }else{
                $supplier_companies[$i]['country']=$country['name'];
            }
            
            $province=$table11->getById($supplier_companies[$i]['province_id']);

            if(session('lang')=='en'){
                $supplier_companies[$i]['province']=$province['name_en'];
            }else{
                $supplier_companies[$i]['province']=$province['name'];
            }
            

            //得到最近一年营业额
            $where3['supplier_company_id']=$supplier_company_id;
            $turnovers = $table3->where($where3)->order('year desc')->select();

            $currency_type=$table9->getById($turnovers[0]['currency_type_id']);

            if(session('lang')=='en'){
                $supplier_companies[$i]['currency_type']=$currency_type['name_en'];
            }else{
                $supplier_companies[$i]['currency_type']=$currency_type['name'];
            }
            
            $supplier_companies[$i]['turnover']=$turnovers[0]['amount'];

            //得到所有管理体系认证
            $where4['supplier_company_id']=$supplier_company_id;
            $system_criteria_id_list=$table4->where($where4)->getField('system_criteria_id',true);
            $system_criterias=array();
            foreach ($system_criteria_id_list as $id) {
                $system_criteria=$table12->getById($id);
                $system_criterias[]=$system_criteria['name'];
            }
            $supplier_companies[$i]['system_criterias']=$system_criterias;

            //得到所有产品体系认证
            $where5['supplier_company_id']=$supplier_company_id;
            $product_criteria_id_list=$table5->where($where5)->getField('product_criteria_id',true);
            $product_criterias=array();
            foreach ($product_criteria_id_list as $id) {
                $product_criteria=$table13->getById($id);
                $product_criterias[]=$product_criteria['name'];
            }
            $supplier_companies[$i]['product_criterias']=$product_criterias;

            //得到所有二级工艺
            $where6['supplier_company_id']=$supplier_company_id;
            $technic_second_id_list=$table6->where($where6)->getField('technic_second_id',true);
            $technic_seconds=array();
            foreach ($technic_second_id_list as $id) {
                $technic_second=$table14->getById($id);

                if(session('lang')=='en'){
                    $technic_seconds[]=$technic_second['name_en'];
                }else{
                    $technic_seconds[]=$technic_second['name'];
                }
                
            }
            $supplier_companies[$i]['processing_technic_second']=$technic_seconds;

            //得到客户分布
            $where7['supplier_company_id']=$supplier_company_id;
            $supplier_companies[$i]['customers_distribution']=$table7->where($where7)->select();
            $j=0;
            foreach ($supplier_companies[$i]['customers_distribution'] as $value) {
                $industry_cate=$table15->getById($value['industry_cate_id']);

                if(session('lang')=='en'){
                    $supplier_companies[$i]['customers_distribution'][$j]['industry_cate']=$industry_cate['name_en'];
                }else{
                    $supplier_companies[$i]['customers_distribution'][$j]['industry_cate']=$industry_cate['name'];
                }

                
                $j++;
            }

            //得到市场分布
            $where8['supplier_company_id']=$supplier_company_id;
            $supplier_companies[$i]['market_distribution']=$table8->where($where8)->select();
            $j=0;
            foreach ($supplier_companies[$i]['market_distribution'] as $value) {
                $area_partition=$table16->getById($value['area_partition_id']);
                
                if(session('lang')=='en'){
                    $supplier_companies[$i]['market_distribution'][$j]['area_partition']=$area_partition['name_en'];
                }else{
                    $supplier_companies[$i]['market_distribution'][$j]['area_partition']=$area_partition['name'];
                }

                
                $j++;
            }

            $i++;
        }

        $data['supplier_companies']=$supplier_companies; //符合条件的全部公司

        if($id_list){
            return $data['supplier_companies'];
        }else{
            $this->ajaxReturn($data);
        }
        
    }

    //根据ID返回供应商信息
    public function get_supplier_company_by_id(){
        //得到供应商的公司的id
        $supplier_company_id=I('supplier_company_id');

        //根据供应商公司的id返回供应商的详细信息
        $table2 = M('Supplier_company');
        $table3 = M('Turnover');
        $table4 = M('System_authentication_item');
        $table5 = M('Product_authentication_item');
        $table6 = M('Company_processing_technic_second');
        $table7 = M('Customers_distribution');
        $table8 = M('Market_distribution');
        $table9 = M('Currency_type');
        $table10 = M('Country_code');
        $table11 = M('Province_code');
        $table12 = M('System_criteria');
        $table13 = M('Product_criteria');
        $table14 = M('Processing_technic_second');
        $table15 = M('Industry_cate');
        $table16 = M('Area_partition');

        //得到公司基本信息
        $supplier_company = $table2->getById($supplier_company_id);
        $currency_type=$table9->getById($supplier_company['currency_type_id']);
        $supplier_company['register_capital_currency_type']=$currency_type['name'];

        //得到公司地址
        $country=$table10->getById($supplier_company['country_id']);
        $supplier_company['country']=$country['name'];
        $province=$table11->getById($supplier_company['province_id']);
        $supplier_company['province']=$province['name'];

        //得到最近一年营业额
        $where3['supplier_company_id']=$supplier_company_id;
        $turnovers = $table3->where($where3)->order('year desc')->select();

        $currency_type=$table9->getById($turnovers[0]['currency_type_id']);
        $supplier_company['currency_type']=$currency_type['name'];
        $supplier_company['turnover']=$turnovers[0]['amount'];

        //得到所有管理体系认证
        $where4['supplier_company_id']=$supplier_company_id;
        $system_criteria_id_list=$table4->where($where4)->getField('system_criteria_id',true);
        $system_criterias=array();
        foreach ($system_criteria_id_list as $id) {
            $system_criteria=$table12->getById($id);
            $system_criterias[]=$system_criteria['name'];
        }
        $supplier_company['system_criterias']=$system_criterias;

        //得到所有产品体系认证
        $where5['supplier_company_id']=$supplier_company_id;
        $product_criteria_id_list=$table5->where($where5)->getField('product_criteria_id',true);
        $product_criterias=array();
        foreach ($product_criteria_id_list as $id) {
            $product_criteria=$table13->getById($id);
            $product_criterias[]=$product_criteria['name'];
        }
        $supplier_company['product_criterias']=$product_criterias;

        //得到所有二级工艺
        $where6['supplier_company_id']=$supplier_company_id;
        $technic_second_id_list=$table6->where($where6)->getField('technic_second_id',true);
        $technic_seconds=array();
        foreach ($technic_second_id_list as $id) {
            $technic_second=$table14->getById($id);
            $technic_seconds[]=$technic_second['name'];
        }
        $supplier_company['processing_technic_second']=$technic_seconds;

        //得到客户分布
        $where7['supplier_company_id']=$supplier_company_id;
        $supplier_company['customers_distribution']=$table7->where($where7)->select();
        $j=0;
        foreach ($supplier_company['customers_distribution'] as $value) {
            $industry_cate=$table15->getById($value['industry_cate_id']);
            $supplier_company['customers_distribution'][$j]['industry_cate']=$industry_cate['name'];
            $j++;
        }

        //得到市场分布
        $where8['supplier_company_id']=$supplier_company_id;
        $supplier_company['market_distribution']=$table8->where($where8)->select();
        $j=0;
        foreach ($supplier_company['market_distribution'] as $value) {
            $area_partition=$table16->getById($value['area_partition_id']);
            $supplier_company['market_distribution'][$j]['area_partition']=$area_partition['name'];
            $j++;
        }

        $data['supplier_company']=$supplier_company; //符合条件的全部公司
        $this->ajaxReturn($data);
    }


    //发送rfi
    public function send_rfi(){
        $data['sender_id']=session('user_id');
        $data['sender_type']=1;

        $table3=M('Supplier_company');
        $company=$table3->getById(I('supplier_company_id'));
        $data['recipient_id']=$company['creator_id'];
        $data['recipient_type']=2;

        //添加一次关注
        $api=new ApiController();
        $api->add_one_watched_record(I('supplier_company_id'));

        if($data['sender_id']&&$data['recipient_id']){
            $data['title']='信息邀请书';
            $data['content']='这是信息邀请书，禁止编辑，且不可回复，只能接受或者拒绝，显示格式请参考ppt';
            $data['type']=1;
            $data['state']=0;
            $data['time']=time();

            $table=M('Letter');
            $res=$table->add($data);
            if($res){
                $result['state']='信息邀请发送成功';

                //将供应商加入到采购商的关注队列
                $table2=M('Buyer_interest_list');
                $data2['buyer_id']=$data['sender_id'];
                $data2['supplier_company_id']=$data['recipient_id'];
                $find2=$table2->where($data2)->find();
                if($find2) $table2->where($data2)->setField('is_send_rfi','1');
                else{
                    $data2['is_send_rfi']=1;
                    $table2->add($data2);
                }
                
                //将采购商加入到供应商的关注队列
                $table3=M('Supply_company_customer_list');
                $data3['buyer_id']=$data['sender_id'];
                $data3['supplier_company_id']=$data['recipient_id'];
                $find3=$table3->where($data3)->find();
                if($find3) $table3->where($data3)->setField('is_comfirm_rfi','0');
                else{
                    $data3['responsible_person_id']=0;
                    $data3['is_comfirm_rfi']=0;
                    $table3->add($data3);
                }
                
                //发送邮件
                $Supplier=M('Supplier');
                $email=$Supplier->getFieldById($data['recipient_id'],'email');
                $this->SendRfiEmail($company['creator_id'],$email,$res);

                $this->ajaxReturn($result);
            }
        }
        $result['state']='操作失败';
        $this->ajaxReturn($result);
    }

    //根据id得到RFI的内容
    public function get_rfiletter_by_id($id){
        if($id){
            $table=M('Letter');
            $letter=$table->where('id='.$id.' AND type=1')->find();
            $data['status']=1;
            $data['letter']=$letter;
            $pgtype=session('lang')=='en'?'name_en':'name';
            $Buyer=M('Buyer');
            $Supplier=M('Supplier');
            $Buyer_company=M('Buyer_company');

            $data['letter']['username']=$Supplier->getFieldById($letter['recipient_id'],'username');     //获得自己姓名
            
            $com_id=$Buyer->getFieldById($letter['sender_id'],'buyer_company_id');
            $data['letter']['companyname']=$Buyer_company->getFieldById($com_id,$pgtype);            //发送者公司名

            $data['letter']['sender']=$Buyer->getFieldById($letter['sender_id'],'username');     //获得发送者姓名

            return $data['letter'];
        }
        else{
            return 0;
        }
    }

    //邮件内容
    private function mailcontent($msgid,$A_link,$R_link){
        $data=$this->get_rfiletter_by_id($msgid);
        switch (cookie('think_language')) {
            case 'zh-cn':case 'zh-CN':
                $content='<!DOCTYPE html>
<html lang="zh-CN">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mail</title>
  <style type="text/css">
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    html {
      font-family: sans-serif;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    head {
      display: none;
    }
    meta {
      display: none;
    }
    title {
      display: none;
    }
    link {
      display: none;
    }
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      background-color: #fff;
    }
    body {
      margin: 0;
    }
    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .modal-header {
      min-height: 16.43px;
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .modal-title {
      margin: 0;
      line-height: 1.42857143;
    }
    .h2, h2 {
      font-size: 30px;
    }
    .h1, .h2, .h3, h1, h2, h3 {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;
    }
    .h4, h4 {
      font-size: 18px;
    }
    .h4, .h5, .h6, h4, h5, h6 {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .media, .media-body {
      overflow: hidden;
      zoom: 1;
    }
    .media-heading {
      margin-top: 0;
      margin-bottom: 5px;
    }
    .media {
      margin-top: 15px;
    }
    .media-body, .media-left, .media-right {
      display: table-cell;
      vertical-align: top;
    }
    .media-body {
      width: 10000px;
    }
    .media-left, .media .pull-left {
      padding-right: 10px;
    }
    .media-object {
      display: block;
    }
    .modal-body {
      position: relative;
      padding: 15px;
    }
    .row {
      margin-right: -15px;
      margin-left: -15px;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-4{
      float: left;
    }
    .col-md-4{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .btn-primary {
      color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .btn-block {
      display: block;
      width: 100%;
    }
    button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
    }
    button, select {
      text-transform: none;
    }
    button {
      overflow: visible;
    }
    a {
      color: #337ab7;
      text-decoration: none;
    }
    a {
      background-color: transparent;
    }
    img {
      vertical-align: middle;
    }
    img {
      border: 0;
      height: 20;
    }
    .modal-footer {
      padding: 15px;
      text-align: right;
      border-top: 1px solid #e5e5e5;
    }

    *{
      font-family: "微软雅黑";
    }
    .mail .well{
      margin-top: 20px;
      margin-left: 100px;
      margin-right: 100px;
    }
    .mailContent{
      margin: 20px;
    }
    .mail .modal-body p{
      font-size: 18px;
    }
    .mail .modal-body .name ,.number{
      color: #337ab7;
    }
    .mail .btn-group{
      margin: 10px;
    }
    .mail .modal-body .row{
      margin-top: 20px;
    }
    .mail .logoEmial {
      height: 30px;
    }
  </style>
</head>
<body class="mail">
  <div class="well">
    <div class="modal-header">
      <h2 class="modal-title">采购商信息邀请邮件</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 信息邀请书</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：信息邀请书</h4>
      <div class="mailContent">
        <p>尊敬的<span class="name" id="supplierCompany">'.$data['username'].'</span>，您好<br/>来自<span class="name" id="buyerCompany">'.$data['companyname'].'</span>的<span class="name" id="buyerpersonal">'.$data['sender'].'</span>，对贵公司感兴趣，特此发出信息邀请书以查看公司详细信息。</p>  
         <div class="row">
          <div class="col-md-4">
            <a href="'.$A_link.'"><button type="button" class="btn btn-primary btn-block">接受</button></a>
          </div>
          <div class="col-md-4">
            <a href="'.$R_link.'"><button type="button" class="btn btn-primary btn-block">拒绝</button></a>
          </div>   
        </div> 
        <br/>
      </div>
    </div>
    <div class="modal-footer">
      <p>如有任何问题，请与<a href="Mailto:support@seletedin.com">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
    </div>
  </div>
</body>
</html>';
                break;
            
            case 'en-us':
                $content='<!DOCTYPE html>
<html lang="zh-CN">
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mail</title>

  <style type="text/css">
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    html {
      font-size: 10px;
      -webkit-tap-highlight-color: rgba(0,0,0,0);
    }
    html {
      font-family: sans-serif;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    head {
      display: none;
    }
    meta {
      display: none;
    }
    title {
      display: none;
    }
    link {
      display: none;
    }
    body {
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
      font-size: 14px;
      line-height: 1.42857143;
      color: #333;
      background-color: #fff;
    }
    body {
      margin: 0;
    }
    div {
    display: block;
    }
    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
      box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    }
    .modal-header {
      min-height: 16.43px;
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .modal-title {
      margin: 0;
      line-height: 1.42857143;
    }
    .h2, h2 {
      font-size: 30px;
    }
    .h1, .h2, .h3, h1, h2, h3 {
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      font-family: inherit;
      font-weight: 500;
      line-height: 1.1;
      color: inherit;
    }
    .h4, h4 {
      font-size: 18px;
    }
    .h4, .h5, .h6, h4, h5, h6 {
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .media, .media-body {
      overflow: hidden;
      zoom: 1;
    }
    .media-heading {
      margin-top: 0;
      margin-bottom: 5px;
    }
    .media {
      margin-top: 15px;
    }
    .media-body, .media-left, .media-right {
      display: table-cell;
      vertical-align: top;
    }
    .media-body {
      width: 10000px;
    }
    .media-left, .media .pull-left {
      padding-right: 10px;
    }
    .media-object {
      display: block;
    }
    .modal-body {
      position: relative;
      padding: 15px;
    }
    .row {
      margin-right: -15px;
      margin-left: -15px;
    }
    .col-md-4 {
      width: 33.33333333%;
    }
    .col-md-4{
      float: left;
    }
    .col-md-4{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .btn-primary {
      color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
    }
    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .btn-block {
      display: block;
      width: 100%;
    }
    button, input, select, textarea {
      font-family: inherit;
      font-size: inherit;
      line-height: inherit;
    }
    button, html input[type=button], input[type=reset], input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
    }
    button, select {
      text-transform: none;
    }
    button {
      overflow: visible;
    }
    a {
      color: #337ab7;
      text-decoration: none;
    }
    a {
      background-color: transparent;
    }
    img {
      vertical-align: middle;
    }
    img {
      border: 0;
      height: 20;
    }
    .modal-footer {
      padding: 15px;
      text-align: right;
      border-top: 1px solid #e5e5e5;
    }

    *{
      font-family: "微软雅黑";
    }
    .mail .well{
      margin-top: 20px;
      margin-left: 100px;
      margin-right: 100px;
    }
    .mailContent{
      margin: 20px;
    }
    .mail .modal-body p{
      font-size: 18px;
    }
    .mail .modal-body .name ,.number{
      color: #337ab7;
    }
    .mail .btn-group{
      margin: 10px;
    }
    .mail .modal-body .row{
      margin-top: 20px;
    }
    .mail .logoEmial {
      height: 30px;
    }
  </style>
</head>
<body class="mail">
  <div class="well">
    <div class="modal-header">
      <h2 class="modal-title">RFI </h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| RFI (Request for Information)</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>Subject: RFI(Request for Information)</h4>
      <div class="mailContent">
        <p>Dear<span class="name" id="supplierCompany">'.$data['username'].'</span><br/><span class="name" id="buyerCompany">'.$data['companyname'].'</span>from<span class="name" id="buyerpersonal">'.$data['sender'].'</span>, is interested in your company, and send this RFI to review the detailed profile of your company. </p>  
        <div class="row">
          <div class="col-md-4">
            <a href="'.$A_link.'"><button type="button" class="btn btn-primary  btn-block">Accept</button></a>
          </div>
          <div class="col-md-4">
            <a href="'.$R_link.'"><button type="button" class="btn btn-primary  btn-block">Decline</button></a>
          </div>  
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="#">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
    </div>
  </div>
</body>
</html>';
                break;
        }
        return $content;
    }
    //发送邀请邮件
    private function SendRfiEmail($id,$email,$msgid){
        $title='Saas 信息邀请';

        $key='rfi';                                            //设置密匙
        //$state=authcode($id,'ENCODE',$key,0);                  //加密供应商id
        //$state.='_'.authcode($email,'ENCODE',$key,0);          //加密供应商邮件地址
        //$state.='_'.authcode($msgid,'ENCODE',$key,0);          //加密信息id

        $state=str_hex($id);                  //加密供应商id
        $state.='_'.str_hex($email);          //加密供应商邮件地址
        $state.='_'.str_hex($msgid);          //加密信息id

        $A_link=U('Home/Api/RfiEmailCheck',array('state'=>'a_'.$state),'',true);   //同意邀请链接
        $R_link=U('Home/Api/RfiEmailCheck',array('state'=>'r_'.$state),'',true);   //拒绝邀请链接

        $content=$this->mailcontent($msgid,$A_link,$R_link);

        SUPPORTsendMail($email,$title,$content);                  //发送邮件
    }


    //处理筛选传递过来的条件，返回供应商公司数组
    public function do_filter(){
        $conditions=I('conditions');
        $supplier_company_id_list=array();  //供应商公司id

        $table=M('Supplier_company');
        $supplier_company_id_list=$table->getField('id',true);

        //制造能力(Manufacturing Capability)
        $where1='';
        if($conditions['processing_technic_first_id'] && $conditions['processing_technic_first_id']!='0'){
            //选择了一级且不是不限
            $where1.=' technic_first_id='.$conditions['processing_technic_first_id'];
            if($conditions['processing_technic_second_id'] && $conditions['processing_technic_second_id']!=0){
                //如果选中了二级且不是不限
                $where1.=' and technic_second_id='.$conditions['processing_technic_second_id'];
                if($conditions['technic_third_total'] && $conditions['technic_third_total']!=0 && $conditions['is_active_technic_third']==1){
                    //如果选中了三级且三级选项不为空
                    $temp='';
                    for($i=1;$i<=$conditions['technic_third_total'];$i++){
                        //查看每一个下标是否有选中的
                        $index='processing_technic_third_id_'.$i;
                        if($conditions[$index] && $conditions[$index] != 0){
                            //存在且被选中
                            if($temp){
                                $temp.=' or technic_third_id='.$conditions[$index];
                            }else{
                                $temp=' technic_third_id='.$conditions[$index];
                            }
                        }
                    }
                    if($temp){
                        $where1.=' and ( '.$temp.' )';
                        $table1=M('Company_processing_technic_third');
                        $supplier_company_id_list=$table1->where($where1)->getField('supplier_company_id',true);
                        $supplier_company_id_list=array_unique($supplier_company_id_list);  //去
                    }else{
                        $table1=M('Company_processing_technic_second');
                        $supplier_company_id_list=$table1->where($where1)->getField('supplier_company_id',true);
                        $supplier_company_id_list=array_unique($supplier_company_id_list);  //去重
                    }

                }else{
                    $table1=M('Company_processing_technic_second');
                    $supplier_company_id_list=$table1->where($where1)->getField('supplier_company_id',true);
                    $supplier_company_id_list=array_unique($supplier_company_id_list);  //去重
                }

            }else{
                $table1=M('Company_processing_technic_second');
                $supplier_company_id_list=$table1->where($where1)->getField('supplier_company_id',true);
                $supplier_company_id_list=array_unique($supplier_company_id_list);  //去重
            }
        }

        if(!$supplier_company_id_list){
            //若之前的供应商公司的id集合为空，则后续不在筛选
            $data['now_page']=0;        //当前页数
            $data['count']=0;          //总记录数
            $data['supplier_companies']=array(); //符合条件的全部公司

            $this->ajaxReturn($data);  
        }

        $where2='';
        //有无邓白氏码
        if($conditions['duns'] && $conditions['duns']!='0'){
            $where2.=" duns_no!=''";
        }

        //是否筛选国家
        if($conditions['country_id'] && $conditions['country_id']!='0'){
            if($where2){
                $where2.=" and country_id=".$conditions['country_id'];
            }else{
                $where2=" country_id=".$conditions['country_id'];
            }
            //是否筛选了省份
            if($conditions['province_id'] && $conditions['province_id']!='0'){
                $where2.=" and province_id=".$conditions['province_id'];
            }
        }

        $temp='';
        if($supplier_company_id_list){
            
            foreach($supplier_company_id_list as $id){
                if($temp){
                    $temp.=" or id=".$id;
                }else{
                    $temp.=" id=".$id;
                }
            }
        }

        //拼接条件
        if($temp){
            if($where2){
                $where2.=" and ( ".$temp." )";
            }else{
                $where2=$temp;
            }
        }

        //再次筛选出符合条件的供应商id列表
        $table2=M('Supplier_company');
        if($where2){
            $supplier_company_id_list=$table2->where($where2)->getField('id',true);
            if(!$supplier_company_id_list){
                //若之前的供应商公司的id集合为空，则后续不在筛选
                $data['now_page']=0;        //当前页数
                $data['count']=0;          //总记录数
                $data['supplier_companies']=array(); //符合条件的全部公司

                $this->ajaxReturn($data);  
            }
        }
        


        //体系认证
        $table3=M('System_authentication_item');
        $temp='';

        if($conditions['system_criterias_num'] && $conditions['system_criterias_num']!='0'){

            for($i=1;$i<=$conditions['system_criterias_num'];$i++){

                //查看每一个下标是否有选中的
                $index='system_criteria_id_'.$i;
                if($conditions[$index] && $conditions[$index] != 0){
                    //存在且被选中

                    $temp=' system_criteria_id='.$conditions[$index];

                    //将供应商id拼接成条件
                    $where3='';
                    if($supplier_company_id_list){
                        
                        foreach($supplier_company_id_list as $id){
                            if($where3){
                                $where3.=" or supplier_company_id=".$id;
                            }else{
                                $where3 =" supplier_company_id=".$id;
                            }
                        }
                    }

                    if($where3){
                        $temp = ' ( '.$where3.' ) and ( '.$temp.' )';
                    }else{
                        $temp = $temp;
                    }

                    //筛选出所有符合体系认证的供应商的id列表
                    if($temp){
                        $supplier_company_id_list=$table3->where($temp)->getField('supplier_company_id',true);
                        $supplier_company_id_list=array_unique($supplier_company_id_list);

                        if(!$supplier_company_id_list){
                            //若之前的供应商公司的id集合为空，则后续不在筛选
                            $data['now_page']=0;        //当前页数
                            $data['count']=0;          //总记录数
                            $data['supplier_companies']=array(); //符合条件的全部公司

                            $this->ajaxReturn($data);  
                        }
                    }

                }
            }
        }




        //产品认证
        $table4=M('Product_authentication_item');
        $temp='';
        if($conditions['product_criterias_num'] && $conditions['product_criterias_num']!='0'){

            for($i=1;$i<=$conditions['product_criterias_num'];$i++){

                //查看每一个下标是否有选中的
                $index='product_criteria_id_'.$i;
                if($conditions[$index] && $conditions[$index] != 0){
                    //存在且被选中
  
                    $temp=' product_criteria_id='.$conditions[$index];
                
                    //将供应商id拼接成条件
                    $where4='';
                    if($supplier_company_id_list){
                        
                        foreach($supplier_company_id_list as $id){
                            if($where4){
                                $where4.=" or supplier_company_id=".$id;
                            }else{
                                $where4 =" supplier_company_id=".$id;
                            }
                        }
                    }


                    if($where4){
                        $temp = ' ( '.$where4.' ) and ( '.$temp.' )';
                    }else{
                        $temp = $temp;
                    }


                    //筛选出所有符合认证的供应商的id列表
                    if($temp){
                        $supplier_company_id_list=$table4->where($temp)->getField('supplier_company_id',true);
                        $supplier_company_id_list=array_unique($supplier_company_id_list);

                        if(!$supplier_company_id_list){
                            //若之前的供应商公司的id集合为空，则后续不在筛选
                            $data['now_page']=0;        //当前页数
                            $data['count']=0;          //总记录数
                            $data['supplier_companies']=array(); //符合条件的全部公司

                            $this->ajaxReturn($data);  
                        }
                    }
                }
            }
        }






        // //将供应商id拼接成条件
        $where5='';
        if($supplier_company_id_list){
            
            foreach($supplier_company_id_list as $id){
                if($where5){
                    $where5.=" or supplier_company_id=".$id;
                }else{
                    $where5 =" supplier_company_id=".$id;
                }
            }
        }

        /**此处将来注意不同币种汇率的换算**/

        //营业额
        $temp='';
        if($conditions['cur_type_id'] && $conditions['cur_type_id']!=0){
            $temp=" currency_type_id=".$conditions['cur_type_id'];
        }          

        if($conditions['startTurnover'] && $conditions['startTurnover']!=-1){
            if($temp){
                $temp.=" and amount>=".$conditions['startTurnover'];
            }else{
                $temp =" amount>=".$conditions['startTurnover'];
            }
        }

        if($conditions['overTurnover'] && $conditions['overTurnover']!=-1){
            if($temp){
                $temp.=" and amount<=".$conditions['overTurnover'];
            }else{
                $temp =" amount<=".$conditions['overTurnover'];
            }
        }

        if($temp){
            if($where5){
                //添加年份条件
                $where5 = ' ( '.$where5.' ) and ( '.$temp.' ) and year='.(date('Y',time())-1);
            }else{
                $where5 = ' ( '.$temp.' ) and year='.(date('Y',time())-1);
            }
        }


        $table5=M('Turnover');
        //筛选出所有符合的供应商的id列表
        if($where5){
            $supplier_company_id_list=$table5->where($where5)->getField('supplier_company_id',true);
            $supplier_company_id_list=array_unique($supplier_company_id_list);
        }



        // //将供应商id拼接成条件
        $where6='';
        if($supplier_company_id_list){
            
            foreach($supplier_company_id_list as $id){
                if($where6){
                    $where6.=" or supplier_company_id=".$id;
                }else{
                    $where6 =" supplier_company_id=".$id;
                }
            }
        }

        $temp='';
        if($conditions['customers_distribution_id'] && $conditions['customers_distribution_id']!=0){
            $temp=" industry_cate_id=".$conditions['customers_distribution_id'];
        }

        if($temp){
            if($where6){
                $where6 = ' ( '.$where6.' ) and ( '.$temp.' )';
            }else{
                $where6 = $temp;
            }
        }

        $table6=M('Customers_distribution');
        //筛选出所有符合的供应商的id列表
        if($where6){
            $supplier_company_id_list=$table6->where($where6)->getField('supplier_company_id',true);
            $supplier_company_id_list=array_unique($supplier_company_id_list);
        }
        



        //市场分布
        $table7=M('Market_distribution');
        $temp='';
        if($conditions['market_distribution_num'] && $conditions['market_distribution_num']!='0'){

            for($i=1;$i<=$conditions['market_distribution_num'];$i++){

                //查看每一个下标是否有选中的
                $index='market_distribution_id_'.$i;
                if($conditions[$index] && $conditions[$index] != 0){
                    //存在且被选中

                    $temp=' area_partition_id='.$conditions[$index];

                    //将供应商id拼接成条件
                    $where7='';
                    if($supplier_company_id_list){
                        
                        foreach($supplier_company_id_list as $id){
                            if($where7){
                                $where7.=" or supplier_company_id=".$id;
                            }else{
                                $where7 =" supplier_company_id=".$id;
                            }
                        }
                    }

                    if($where7){
                        $temp = ' ( '.$where7.' ) and ( '.$temp.' )';
                    }else{
                        $temp = $temp;
                    }


                    //筛选出所有符合认证的供应商的id列表
                    if($temp){
                        $supplier_company_id_list=$table7->where($temp)->getField('supplier_company_id',true);
                        $supplier_company_id_list=array_unique($supplier_company_id_list);

                        if(!$supplier_company_id_list){
                            //若之前的供应商公司的id集合为空，则后续不在筛选
                            $data['now_page']=0;        //当前页数
                            $data['count']=0;          //总记录数
                            $data['supplier_companies']=array(); //符合条件的全部公司

                            $this->ajaxReturn($data);  
                        }
                    }
                }
            }
        }



        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $count = count($supplier_company_id_list);// 查询满足要求的总记录数
        //页数是从第一页开始的
        $page=(I('page')>1)?(int)(I('page')):1;
        $page=($page<=ceil($count/5))?$page:ceil($count/5);

        $id_list=array_slice($supplier_company_id_list,($page-1)*5,5);
               

        $api=new ApiController();
        //被搜索展现一次，则推荐加1
        foreach($id_list as $supplier_company_id){
            $api->add_one_recommened_record($supplier_company_id);
        }

        //得到供应商
        $supplier_companies=$this->get_supplier_companies_by_ids($id_list);

        $data['last_page']=I('page');
        $data['now_page']=$page;        //当前页数
        $data['count']=$count;          //总记录数
        $data['supplier_companies']=$supplier_companies; //符合条件的全部公司

        $this->ajaxReturn($data);      
    }

}
