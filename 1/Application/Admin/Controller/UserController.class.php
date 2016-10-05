<?php
namespace Admin\Controller;
use Admin\Controller;
class UserController extends BaseController {
	public function modify_buyer(){
		$User=M('Buyer');
		$list=$User->select();
		$this->assign('list',$list);

		$Company=M('Buyer_company');
		$comlist=$Company->getField('id,name');
		$this->assign('comlist',$comlist);

		$this->display();
	}

	public function viewbuyerPersonalInfo(){
		$id=I('get.id');
        if(!$id)    $this->error('非法访问');

        $Buyer=M('Buyer');
        $info=$Buyer->getById($id);

        $Function=M('Function');        //职能
        $info['function']=$Function->getById($info['function_id']);

        $Country=M('Country_code');     //国家
        $Province=M('Province_code');   //省份

        $tel_cou=$Country->getById($info['tel_country_code_id']);       //电话
        $tel_area=$Province->getById($info['tel_area']);

        $mobile_cou=$Country->getById($info['mobile_country_code_id']);       //移动电话
        $mobile_area=$Province->getById($info['mobile_area']);

        $fax_cou=$Country->getById($info['fax_country_code_id']);       //传真
        $fax_area=$Province->getById($info['fax_area']);

        $info['tel']='+'.$tel_cou['code'].' '.$info['tel_area'].' '.$info['tel_phone'];
        $info['mobile']='+'.$mobile_cou['code'].' '.$info['mobile_phone'];
        $info['fax']='+'.$fax_cou['code'].' '.$info['fax_area'].' '.$info['fax_phone'];

        $this->assign('info',$info);

        $this->display();
	}

	//查看采购商公司信息
    public function viewbuyerCompanyInfo(){
        $id=I('get.id');
        if(!$id)    $this->error('未填写公司信息');

        $Company=M('Buyer_company');
        $info=$Company->getById($id);

        $Industry=M('Industry_cate');        //行业
        $info['industry']=$Industry->getById($info['industry_cate_id']);

        $Country=M('Country_code');     //国家
        $info['country']=$Country->getById($info['country_id']);

        $Province=M('Province_code');   //省份
        $info['province']=$Province->getById($info['province_id']);

        $this->assign('info',$info);

        $this->display();
    }

    public function modify_supplier(){
		$User=M('Supplier');
		$list=$User->select();
		$this->assign('list',$list);

		$Company=M('Supplier_company');
		$comlist=$Company->getField('id,name');
		$this->assign('comlist',$comlist);

		$this->display();
	}

	//查看个人信息
    public function viewsupplierPersonalInfo(){

        $id=I('get.id');
        if(!$id)   $this->error('未填写公司信息');

        $Supplier=M('Supplier');
        $info=$Supplier->getById($id);

        $Function=M('Function');        //职能
        $info['function']=$Function->getById($info['function_id']);

        $Country=M('Country_code');     //国家
        $Province=M('Province_code');   //省份

        $tel_cou=$Country->getById($info['tel_country_code_id']);       //电话
        $tel_area=$Province->getById($info['tel_area']);

        $mobile_cou=$Country->getById($info['mobile_country_code_id']);       //移动电话
        $mobile_area=$Province->getById($info['mobile_area']);

        $fax_cou=$Country->getById($info['fax_country_code_id']);       //传真
        $fax_area=$Province->getById($info['fax_area']);

        $info['tel']='+'.$tel_cou['code'].' '.$info['tel_area'].' '.$info['tel_phone'];
        $info['mobile']='+'.$mobile_cou['code'].' '.$info['mobile_phone'];
        $info['fax']='+'.$fax_cou['code'].' '.$info['fax_area'].' '.$info['fax_phone'];

        $this->assign('info',$info);

        $this->display();
    }

    //供应商公司详细信息
    public function supplierCompanyDetailedInfo(){
        $com_id=I('get.id');
        if(!$com_id)   $this->error('未填写公司信息');
        //session('Infoview',null);

        $Sup_company=M('Supplier_company');     //公司信息
        $base=$Sup_company->find($com_id);
        $base['established_time']=date('Y-m-d',$base['established_time']);
        
        $Country=M('Country_code');             //国家名称
        $base['country']=$Country->find($base['country_id']);

        $Province=M('Province_code');           //省份名称
        $base['province']=$Province->find($base['province_id']);

        $Industry=M('Industry_cate');           //行业类别
        $base['industry']=$Industry->find($base['industry_cate_id']);

        $Company_cate=M('Company_cate');        //公司类型
        $base['cate']=$Company_cate->find($base['company_cate_id']);

        $Stock=M('Stock_market');               //上市地点
        $base['stock']=$Stock->find($base['stock_market_id']);

        $Currency_type=M('Currency_type');      //资金类型
        $base['currency_type']=$Currency_type->find($base['currency_type_id']);

        $Process2=M('Company_processing_technic_second');   //生产工艺
        $Process3=M('Company_processing_technic_third');
        $Name_process1=M('Processing_technic_first');        //工艺名称列表
        $Name_process2=M('Processing_technic_second');        
        $Name_process3=M('Processing_technic_third');
        $Unit=M('Unit');                                    //单位列表
        //*****************获取工艺名称
        $base['process']=$Process2->where('supplier_company_id='.$com_id)->select();
        foreach ($base['process'] as $key => $val) {
            $base['process'][$key]['technic_first']=$Name_process1->getById($val['technic_first_id']);
            $base['process'][$key]['technic_second']=$Name_process2->getById($val['technic_second_id']);
            $base['process'][$key]['technic_third_id']=$Process3->where('supplier_company_id='.$com_id.' AND technic_second_id='.$val['technic_second_id'])->getField('technic_third_id',true);
            foreach ($base['process'][$key]['technic_third_id'] as $k => $v) {
                $base['process'][$key]['technic_third'][$k]=$Name_process3->getById($v);
            }
            $base['process'][$key]['range_unit']=$Unit->getById($val['range_unit_id']);
            $base['process'][$key]['capacity_unit']=$Unit->getById($val['capacity_unit_id']);
        }
        //*****************done
        
        $Number=M('Staffs_number');             //员工人数
        $base['number']=$Number->where('supplier_company_id='.$com_id)->order('year desc')->limit(3)->select();
        foreach ($base['number'] as $key => $value) {
            $base['number'][$key]['total']=$value['manufacture']+$value['quality']+$value['research']+$value['other'];
        }

        $Turnover=M('Turnover');                //营业额
        $base['turnover']=$Turnover->where('supplier_company_id='.$com_id)->order('year desc')->limit(3)->select();
        foreach ($base['turnover'] as $key => $val) {
            $base['turnover'][$key]['currency_type']=$Currency_type->getById($val['currency_type_id']);
        }

        $Customer=M('Customers_distribution');      //客户分布
        $base['customer']=$Customer->where('supplier_company_id='.$com_id)->order('ratio desc')->limit(3)->select();
        foreach($base['customer'] as $key => $val){
            $base['customer'][$key]['industry']=$Industry->getById($val['industry_cate_id']);
        }

        $Market=M('Market_distribution');           //市场分布
        $Area=M('Area_partition');
        $base['market']=$Market->where('supplier_company_id='.$com_id)->order('ratio desc')->limit(3)->select();
        foreach($base['market'] as $key => $val){
            $base['market'][$key]['area']=$Area->getById($val['area_partition_id']);
        }

        $Product=M('Representative_product');       //代表性产品
        $base['product']=$Product->where('supplier_company_id='.$com_id)->limit(5)->select();

        $SystemCri=M('System_criteria');            //体系认证
        $ProductCri=M('Product_criteria');
        $CriBody=M('Certification_body');
        $SystemItem=M('System_authentication_item');
        $ProductItem=M('product_authentication_item');
        $base['cri']=array();

        $syslist=$SystemItem->where('supplier_company_id='.$com_id)->select();
        foreach ($syslist as $key => $value) {
            $system_criteria=$SystemCri->getById($value['system_criteria_id']);
            $certification_body=$CriBody->getById($value['certification_body_id']);
            $type=session('lang')=='en'?'System Certificate':'管理体系认证';
            $base['cri'][]=array('type'=>$type,
                                'criteria'=>$system_criteria,
                                'certification_body'=>$certification_body,
                                'expire_date'=>$value['expire_date'],
                                'certificate_number'=>$value['certificate_number'],
                                'certificate_pdf_url'=>$value['certificate_pdf_url']);
        }
        $prolist=$ProductItem->where('supplier_company_id='.$com_id)->select();
        foreach ($prolist as $key => $value) {
            $product_criteria=$ProductCri->getById($value['product_criteria_id']);
            $certification_body=$CriBody->getById($value['certification_body_id']);
            $type=session('lang')=='en'?'Product Certificate':'产品认证';
            $base['cri'][]=array('type'=>$type,
                                'criteria'=>$product_criteria,
                                'certification_body'=>$certification_body,
                                'expire_date'=>$value['expire_date'],
                                'certificate_number'=>$value['certificate_number'],
                                'certificate_pdf_url'=>$value['certificate_pdf_url']);
        }

        $Production_facility=M('Company_production_facility');      //生产设备
        $base['profacility']=$Production_facility->where('supplier_company_id='.$com_id)->select();
        foreach($base['profacility'] as $key => $val){
            $base['profacility'][$key]['technic_second']=$Name_process2->getById($val['processing_technic_second_id']);
        }

        $Detection=M('company_detection_device');               //检查设备
        $base['detection']=$Detection->where('supplier_company_id='.$com_id)->select();

        $Ability=M('Ability_question'); //信息能力及回答
        $Ability_Ans=M('Ability_question_choice');
        $Ability_list=$Ability->select();
        foreach ($Ability_list as $key => $value) {
            $Ability_list[$key]['answer']=$Ability_Ans->where('question_id='.$value['id'])->select();
        }
        $this->assign('abi_list',$Ability_list);

        $Com_Aibility=M('Company_ability_question_choice');     //公司能力回答
        $ability=$Com_Aibility->where('supplier_company_id='.$com_id)->getField('question_choice_id',true);
        foreach($ability as $key => $value){
            $base['ability'][$value]=$value;
        }

        $Compliance=M('Business_compliance'); //业务合规
        $Compliance_Ans=M('Business_compliance_question_choice');
        $Compliance_list=$Compliance->select();
        foreach ($Compliance_list as $key => $value) {
            $Compliance_list[$key]['answer']=$Compliance_Ans->where('question_id='.$value['id'])->select();
        }
        $this->assign('com_list',$Compliance_list);

        $Com_compliance=M('Company_business_compliance');
        $base['compliance']=$Com_compliance->where('supplier_company_id='.$com_id)->getField('business_compliance_id,business_compliance_question_choice');

        $this->assign('base',$base);

        $view=I('get.view')?I('get.view'):substr(cookie('think_language'),0,2);//信息展示语言
        $this->assign('view',$view);

        $this->display();
    }

    //删除采购商
    public function delete(){
        if(I('id')){
            //删除采购商
            $Buyer = M("Buyer"); // 实例化User对象
            $where['id']=$_GET['id'];
            $Buyer->where($where)->delete(); // 删除id为5的用户数据

            //删除采购商公司信息(此处将来需要修改逻辑)
            $Buyer_company = M("Buyer_company"); // 实例化User对象
            $where1['creator_id']=$_GET['id'];
            $Buyer_company->where($where1)->delete(); // 删除id为5的用户数据

            $this->success('删除成功',__APP__.'/Admin/User/modify_buyer');
        }else{
            $this->success('操作失败',__APP__.'/Admin/User/modify_buyer');
        }

    }
}