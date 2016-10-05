<?php
namespace Home\Controller;
use Home\Controller;
class SupplierController extends BaseController {
    public function _initialize() {
        parent::_initialize();
        //if(session('type')!=2)  $this->error('非法访问',__APP__.'/Home/Index');
    }
    
    //获取发送者名字
    public function getMsgSender($type,$id){
        switch ($type) {
            case '1':   //采购商
                $User=M('buyer');
            break;

            case '2':   //供应商
                $User=M('Supplier');
            break;
        }
        $name=$User->getFieldById($id,'username');
        return $name;
    }

	//销售及客户
    public function client(){
        $pgtype=session('lang')=='en'?'name_en':'name';

        $User=M('Supplier');
        $user=$User->getById(session('user_id'));

        $bs_view=$this->bussiness_view($user);  //业务看板
        $this->assign('view',$bs_view);

        $Customer=M('Supply_company_customer_list');     //获取关注列表
        $Buyer=M('Buyer');                //供应商个人
        $Company=M('Buyer_company');     //供应商列表
        $Industry_cate=M('Industry_cate'); //供应商工艺列表

        $list=$Customer->where('supplier_company_id='.$user['id'])->select();
        foreach ($list as $key) {
            $com_id=$Buyer->getFieldById($key['buyer_id'],'buyer_company_id');                           
            $com_name=$Company->getFieldById($com_id,$pgtype);//供应商名称

            switch ($key['is_comfirm_rfi']) {        //邀请状态
                case '0':  $state='未处理';  break;
                case '1':  $state='接受信息邀请';  break;
                case '2':  $state='拒绝信息邀请';  break;
            }

            $industry=$Industry_cate->find($Company->getFieldById($com_id,'industry_cate_id'));

            if(session('lang')=='en') $industry=zh_to_en_single($industry);
            //*****************done
            
            //**********获取联系人
            $connect=$Buyer->getFieldById($key['buyer_id'],'username');
            //*****************done
            
            $customers[]=array('name'=>$com_name,       //整合列表
                                'state'=>$state,
                                'industry'=>$industry,
                                'connect'=>$connect,
                                'connect_id'=>$key['buyer_id'],
                                'com_id'=>$com_id,
                                'id'=>$key['id']);
        }
        $this->assign('customers',$customers);

        $this->display();
    }

    //供应商收件箱
    public function inbox(){
        $langtype=session('lang')=='en'?'name_en':'name';

        $User=M('Supplier');
        $user=$User->getById(session('user_id'));
        $this->assign('user',$user);

        $Inbox=M('Letter');             //获取邮件
        $amount=array('receive'=>0,      //计数器
                      'send'=>0);

        $rec_map=array('recipient_id'=>$user['id'],     //接收
                    'recipient_type'=>2);
        $send_map=array(array('sender_id'=>$user['id'],    //普通邮件发送
                                'sender_type'=>2),
                        array('recipient_id'=>$user['id'],     //Rfi查询条件
                            'recipient_type'=>2,
                            'type'=>1,
                            'state'=>array('neq',0)),
                     '_logic'=>'OR');
        $rec_msg=$Inbox->where($rec_map)->order('time desc')->select();
        $send_msg=$Inbox->where($send_map)->order('time desc')->select();

        $SupCompany=M('Supplier_company');
        $BuyCompany=M('Buyer_company');
        $Buyer=M('Buyer');
        foreach ($rec_msg as $key => $value) {     //整理数据---收件箱
            $rec_msg[$key]['user']=$this->getMsgSender($value['sender_type'],$value['sender_id']);      //获取发送者名称
            $rec_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                            //处理发送时间
            $rec_msg[$key]['state']=$value['state']?'已读':'未读';  //处理状态
            if($value['type']=='1'){

                $rec_msg[$key]['supname']=$SupCompany->getFieldById($user['supplier_company_id'],$langtype);       //获取供应商公司名

                $buycom_id=$Buyer->getFieldById($value['sender_id'],'buyer_company_id');
                $rec_msg[$key]['buyname']=$BuyCompany->getFieldById($buycom_id,$langtype);    //获取采购商公司名

                $rec_msg[$key]['buyertitle']=$Buyer->getFieldById($value['sender_id'],'title');      //获取职位
            }
        }

        foreach ($send_msg as $key => $value) {      //整理数据---发件箱
            $send_msg[$key]['user']=$this->getMsgSender($value['recipient_type'],$value['recipient_id']);      //获取收件人名称
            $send_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                            //处理发送时间
            $send_msg[$key]['state']='已发送';  //处理状态
            if($value['type']=='1'){
                $send_msg[$key]['user']=$this->getMsgSender($value['sender_type'],$value['sender_id']);      //获取发送者名称
                switch ($value['state']) {          //处理状态
                    case '1': $send_msg[$key]['state']='已同意'; break;
                    case '2': $send_msg[$key]['state']='已拒绝'; break;
                }
            }
            
        }
        
        $amount['receive']=count($rec_msg);
        $amount['send']=count($send_msg);

        $type=I('get.type');        //页面类型:2为发送,其余为收件
        if($type=='2'){
            $this->assign('msg',$send_msg);
        }
        else
        {
            $this->assign('msg',$rec_msg);
        }

        $this->assign('amount',$amount);
        $this->assign('pgtype',$type);
      
        $this->display();
    }

    //供应商公司详细信息
    public function supplierCompanyDetailedInfo(){
    	$com_id=session('Infoview.sup_com_id');		//默认他人访问
    	$state=session('Infoview.rfi');
    	$type=session('type');
    	$Supplier=M('Supplier');

    	if($state!=2){			//验证权限
    		if(!$com_id){
    			if($type==1) $this->error('对不起，您无权查看，正转向公开信息页面','supplierCompanyPublicInfo');
    			$user_id=session('user_id');		//自己访问
    			$com_id=$Supplier->getFieldById($user_id,'supplier_company_id');
    		}else{
    			$this->error('对不起，您无权查看，正转向公开信息页面','supplierCompanyPublicInfo');
    		}
    	}
    	else{
    		$map['id']=session('Infoview.int_id');		//再次验证权限
    		$map['buyer_id']=session('user_id');
    		$Interest=M('Buyer_interest_list');
    		$res=$Interest->where($map)->find();
    		if($res['is_send_rfi']!=$state){
    			$this->error('对不起，您无权查看，正转向公开信息页面','supplierCompanyPublicInfo');
    		}
    	}
    	
    	//session('Infoview',null);

    	$Sup_company=M('Supplier_company');		//公司信息
    	$base=$Sup_company->find($com_id);
        $base['established_time']=date('Y-m-d',$base['established_time']);
    	
    	$Country=M('Country_code');				//国家名称
    	$base['country']=$Country->find($base['country_id']);

    	$Province=M('Province_code');			//省份名称
    	$base['province']=$Province->find($base['province_id']);

    	$Industry=M('Industry_cate');			//行业类别
    	$base['industry']=$Industry->find($base['industry_cate_id']);

    	$Company_cate=M('Company_cate');		//公司类型
    	$base['cate']=$Company_cate->find($base['company_cate_id']);

    	$Stock=M('Stock_market');				//上市地点
    	$base['stock']=$Stock->find($base['stock_market_id']);

    	$Currency_type=M('Currency_type');		//资金类型
    	$base['currency_type']=$Currency_type->find($base['currency_type_id']);

    	$Process2=M('Company_processing_technic_second');	//生产工艺
    	$Process3=M('Company_processing_technic_third');
    	$Name_process1=M('Processing_technic_first');        //工艺名称列表
    	$Name_process2=M('Processing_technic_second');        
    	$Name_process3=M('Processing_technic_third');
    	$Unit=M('Unit');									//单位列表
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
        
        $Number=M('Staffs_number');				//员工人数
        $base['number']=$Number->where('supplier_company_id='.$com_id)->order('year desc')->limit(3)->select();
        foreach ($base['number'] as $key => $value) {
        	$base['number'][$key]['total']=$value['manufacture']+$value['quality']+$value['research']+$value['other'];
        }

        $Turnover=M('Turnover');				//营业额
        $base['turnover']=$Turnover->where('supplier_company_id='.$com_id)->order('year desc')->limit(3)->select();
        foreach ($base['turnover'] as $key => $val) {
        	$base['turnover'][$key]['currency_type']=$Currency_type->getById($val['currency_type_id']);
        }

        $Customer=M('Customers_distribution');		//客户分布
        $base['customer']=$Customer->where('supplier_company_id='.$com_id)->order('ratio desc')->limit(3)->select();
        foreach($base['customer'] as $key => $val){
        	$base['customer'][$key]['industry']=$Industry->getById($val['industry_cate_id']);
        }

        $Market=M('Market_distribution');			//市场分布
        $Area=M('Area_partition');
        $base['market']=$Market->where('supplier_company_id='.$com_id)->order('ratio desc')->limit(3)->select();
        foreach($base['market'] as $key => $val){
        	$base['market'][$key]['area']=$Area->getById($val['area_partition_id']);
        }

        $Product=M('Representative_product');		//代表性产品
        $base['product']=$Product->where('supplier_company_id='.$com_id)->limit(5)->select();

        $SystemCri=M('System_criteria');			//体系认证
        $ProductCri=M('Product_criteria');
        $CriBody=M('Certification_body');
        $SystemItem=M('System_authentication_item');
        $ProductItem=M('product_authentication_item');
        $base['cri']=array();

        $syslist=$SystemItem->where('supplier_company_id='.$com_id)->select();
        foreach ($syslist as $key => $value) {
            $type=session('lang')=='en'?'System Certificate':'管理体系认证';
        	$system_criteria=$SystemCri->getById($value['system_criteria_id']);
        	$certification_body=$CriBody->getById($value['certification_body_id']);
        	$base['cri'][]=array('type'=>$type,
        						'criteria'=>$system_criteria,
        						'certification_body'=>$certification_body,
        						'expire_date'=>$value['expire_date'],
        						'certificate_number'=>$value['certificate_number'],
        						'certificate_pdf_url'=>$value['certificate_pdf_url']);
        }
        $prolist=$ProductItem->where('supplier_company_id='.$com_id)->select();
        foreach ($prolist as $key => $value) {
            $type=session('lang')=='en'?'Product Certificate':'产品认证';
        	$product_criteria=$ProductCri->getById($value['product_criteria_id']);
        	$certification_body=$CriBody->getById($value['certification_body_id']);
        	$base['cri'][]=array('type'=>$type,
        						'criteria'=>$product_criteria,
        						'certification_body'=>$certification_body,
        						'expire_date'=>$value['expire_date'],
        						'certificate_number'=>$value['certificate_number'],
        						'certificate_pdf_url'=>$value['certificate_pdf_url']);
        }

        $Production_facility=M('Company_production_facility');		//生产设备
        $base['profacility']=$Production_facility->where('supplier_company_id='.$com_id)->select();
        foreach($base['profacility'] as $key => $val){
        	$base['profacility'][$key]['technic_second']=$Name_process2->getById($val['processing_technic_second_id']);
        }

        $Detection=M('company_detection_device');				//检查设备
        $base['detection']=$Detection->where('supplier_company_id='.$com_id)->select();

        $Ability=M('Ability_question'); //信息能力及回答
        $Ability_Ans=M('Ability_question_choice');
        $Ability_list=$Ability->select();
        foreach ($Ability_list as $key => $value) {
            $Ability_list[$key]['answer']=$Ability_Ans->where('question_id='.$value['id'])->select();
        }
        $this->assign('abi_list',$Ability_list);

        $Com_Aibility=M('Company_ability_question_choice');		//公司能力回答
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

    //供应商公司信息
    public function supplierCompanyInfo(){
        

        $User=M('Supplier');
        $user=$User->getById(session('user_id'));
        $this->assign('user',$user);

        /***********页面目录信息展示**********/
            $Year=date('Y');        //获取年份
            $this->assign('year',$Year);

            $Industry=M('Industry_cate');   //行业
            $Ind_list=$Industry->select();
            if(session('lang')=='en') $Ind_list=zh_to_en($Ind_list);
            $this->assign('ind_list',$Ind_list);

            $Cate=M('Company_cate');    //公司类型
            $Cate=$Cate->select();
            if(session('lang')=='en') $Cate=zh_to_en($Cate);
            $this->assign('cate',$Cate);

            $Stock=M('Stock_market');     //上市地点
            $Sto_list=$Stock->select();
            if(session('lang')=='en') $Sto_list=zh_to_en($Sto_list);
            $this->assign('sto_list',$Sto_list);

            $Cur_type=M('Currency_type');     //货币类型
            $Cur_type_list=$Cur_type->select();
            if(session('lang')=='en') $Cur_type_list=zh_to_en($Cur_type_list);
            $this->assign('cur_type_list',$Cur_type_list);

            $Unit=M('Unit');    //单位
            $Unit_list=$Unit->select();
            if(session('lang')=='en') $Unit_list=zh_to_en($Unit_list);
            $this->assign('uni_list',$Unit_list);

            $Process_First=M('Processing_technic_first');    //加工工艺一级
            $Process_First_list=$Process_First->select();
            if(session('lang')=='en') $Process_First_list=zh_to_en($Process_First_list);
            $this->assign('pro1_list',$Process_First_list);

            $Process_Second=M('Processing_technic_second');    //加工工艺二级
            $Process_Second_list=$Process_Second->select();
            if(session('lang')=='en') $Process_Second_list=zh_to_en($Process_Second_list);
            $this->assign('pro2_list',$Process_Second_list);

            $Process_Third=M('Processing_technic_third');    //加工工艺三级
            $Process_Third_list=$Process_Third->select();
            if(session('lang')=='en') $Process_Third_list=zh_to_en($Process_Third_list);
            $this->assign('pro3_list',$Process_Third_list);

            $Country=M('Country_code');     //国家
            $Cou_list=$Country->select();
            if(session('lang')=='en') $Cou_list=zh_to_en($Cou_list);
            $this->assign('cou_list',$Cou_list);

            $Province=M('Province_code');   //省份
            $Pro_list=$Province->select();
            if(session('lang')=='en') $Pro_list=zh_to_en($Pro_list);
            $this->assign('pro_list',$Pro_list);

            $Area=M('Area_partition');  //区域
            $area_list=$Area->select();
            if(session('lang')=='en') $area_list=zh_to_en($area_list);
            $this->assign('are_list',$area_list);

            $Ability=M('Ability_question'); //信息能力及回答
            $Ability_Ans=M('Ability_question_choice');
            $Ability_list=$Ability->select();
            foreach ($Ability_list as $key => $value) {
                $Ability_list[$key]['answer']=$Ability_Ans->where('question_id='.$value['id'])->select();
            }
            $this->assign('abi_list',$Ability_list);

            $Compliance=M('Business_compliance'); //业务合规
            $Compliance_Ans=M('Business_compliance_question_choice');
            $Compliance_list=$Ability->select();
            foreach ($Compliance_list as $key => $value) {
                $Compliance_list[$key]['answer']=$Compliance_Ans->where('question_id='.$value['id'])->select();
            }
            $this->assign('com_list',$Compliance_list);

            $System=M('System_criteria');  //体系认证标准
            $System_list=$System->select();
            $this->assign('sys_list',$System_list);

            $Body=M('Certification_body');  //认证机构
            $Body_list=$Body->select();
            $this->assign('bod_list',$Body_list);
        /****************展示done***************/

        $com_id=$user['supplier_company_id'];
        $this->assign('com_id',$com_id);

        $Sup_company=M('Supplier_company');     //公司信息
        $base=$Sup_company->find($com_id);
        $base['established_time']=date('Y-m-d',$base['established_time']);
        $this->assign('base',$base);

        $Employee=M('Staffs_number');           //员工人数
        $number[0]=$Employee->where('supplier_company_id='.$com_id.' AND year='.($Year-2))->find();
        $number[1]=$Employee->where('supplier_company_id='.$com_id.' AND year='.($Year-1))->find();
        $number[2]=$Employee->where('supplier_company_id='.$com_id.' AND year='.($Year))->find();
        $this->assign('number',$number);
        
        $Process2=M('Company_processing_technic_second');       //生产能力
        $Process3=M('Company_processing_technic_third');
        $processlist2=$Process2->where('supplier_company_id='.$com_id)->select();
        $this->assign('processlist2',$processlist2);

        $Prodection=M('Company_production_facility');           //生产设备
        $prodectionlist=$Prodection->where('supplier_company_id='.$com_id)->select();
        $this->assign('tionlist',$prodectionlist);

        $Detection=M('Company_detection_device');           //检测设备
        $detectionlist=$Detection->where('supplier_company_id='.$com_id)->select();
        $this->assign('detection',$detectionlist);

        $Turnover=M('Turnover');                //分布
        $Customer=M('Customers_distribution');
        $Market=M('Market_distribution');
        for ($i=0; $i < 3; $i++) { 
            $turnover_list[$i]=$Turnover->where('supplier_company_id='.$com_id.' AND year='.($Year-2+$i))->find();
        }
        $customer_list=$Customer->where('supplier_company_id='.$com_id)->limit(3)->select();
        $market_list=$Market->where('supplier_company_id='.$com_id)->limit(3)->select();
        $this->assign('money',$turnover_list);
        $this->assign('customer',$customer_list);
        $this->assign('market',$market_list);


        $this->display();
    }

    //公司信息更新————基础信息
    public function update_base(){
        

        //初始化上传文件
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('pdf','jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->rootPath  =      './Public/uploads/supplier_company/'; // 设置附件上传根目录
        $upload->replace   =     true;      //覆盖文件

        $base=I('post.');
        $base['established_time']=time($base['established_time']);
        $Company=M('Supplier_company');     //基础信息入库
        $res1=$Company->save($base);
        if($res1===false)    $this->error('基础信息修改出错');

        $Employee=M('Staffs_number');       //员工人数修改
        $number=I('post.number');
        foreach ($number as $key => $value) {
            $value['supplier_company_id']=$base['id'];
            $find=$Employee->where('supplier_company_id='.$value['supplier_company_id'].' AND year='.$value['year'])->getField('id');
            if($find){
                $res2=$Employee->where('id='.$find)->save($value);
            }else{
                $res2=$Employee->add($value);
            }
            if($res2===false) $this->error('员工人数修改出错');
        }

        //上传文件
        foreach($_FILES as $key =>$file){
            if(!empty($file['name'])) {// 上传单个文件 
                $upload->saveName  =   $base['id'].'_'.$key;    //上传文件名
                $info   =   $upload->uploadOne($file);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 保存上传文件信息
                    $Company->where('id='.$base['id'])->setField($key.'_url',$info['savename']);
                }
            }
        }

        if(($res1!==false) && ($res2!==false)) $this->success('信息修改成功');
    }

    //公司信息更新————生产能力
    public function update_ability(){
        

        $ability=I('post.ability');

        $Company_second=M('Company_processing_technic_second');

        $new_ability=array();       //整理数据,转置数组
        foreach($ability as $val=>$value){
            foreach($value as $k=>$v){
                if($val!='technic_third_id'){
                   $new_ability[$k][$val] = $v;
               }
            }
        }
        foreach ($new_ability as $key) {
            $res=$Company_second->save($key);
            if($res===false)    $this->error('生产能力更新失败');
        }

        $this->success('更新成功');
    }

    //公司信息更新————生产设备
    public function update_production(){
        

        $production=I('post.production');

        $Production=M('Company_production_facility');
        $new_production=array();       //整理数据,转置数组

        foreach($production as $val=>$value){
            foreach($value as $k=>$v){
                $new_production[$k][$val] = $v;
            }
        }

        foreach ($new_production as $key) {
            $res=$Production->save($key);
            if($res===false)    $this->error('生产设备更新失败');
        }

        $this->success('更新成功');
    }

    //公司信息更新————检测设备
    public function update_detection(){
        

        $detection=I('post.detection');

        $Detection=M('Company_detection_device');
        $new_detection=array();       //整理数据,转置数组

        foreach($detection as $val=>$value){
            foreach($value as $k=>$v){
                $new_detection[$k][$val] = $v;
            }
        }

        foreach ($new_detection as $key) {
            $res=$Detection->save($key);
            if($res===false)    $this->error('检测设备更新失败');
        }

        $this->success('更新成功');
    }

    //公司信息更新————市场
    public function update_market(){
        

        $Turnover=M('Turnover');
        $Customer=M('Customers_distribution');
        $Market=M('Market_distribution');
        $com_id=I('post.comid');

        //营业额更新
        $turnover=I('post.money');

        foreach ($turnover as $key => $value) {
            $value['supplier_company_id']=$com_id;
            $find=$Turnover->where('supplier_company_id='.$value['supplier_company_id'].' AND year='.$value['year'])->getField('id');
            if($find){
                $res1=$Turnover->where('id='.$find)->save($value);
            }else{
                $res1=$Turnover->add($value);
            }
            if($res1===false) $this->error('营业额修改出错');
        }

        //客户分布
        $customer=I('post.customer');
        foreach ($customer as $key) {
            $res2=$Customer->save($key);
            if($res2===false) $this->error('客户分布修改出错');
        }

        //市场分布
        $market=I('post.market');
        foreach ($market as $key) {
            $res3=$Market->save($key);
            if($res3===false) $this->error('市场分布修改出错');
        }
        
        $this->success('更新成功');
    }
    //供应商公司公开信息
    public function supplierCompanyPublicInfo(){
    	$com_id=session('Infoview.sup_com_id');		//默认他人访问
    	$type=session('type');

    	$Supplier=M('Supplier');
    	if(!$com_id){
    		if($type==1) $this->error('非法访问',__APP__.'/Home/Index');
    		$user_id=session('user_id');		//自己访问
    		$com_id=$Supplier->getFieldById($user_id,'supplier_company_id');
    	}
    	//session('Infoview',null);

    	$Sup_company=M('Supplier_company');		//公司信息
    	$base=$Sup_company->find($com_id);
        $base['established_time']=date('Y-m-d',$base['established_time']);
    	
    	$Country=M('Country_code');				//国家名称
    	$base['country']=$Country->find($base['country_id']);

    	$Province=M('Province_code');			//省份名称
    	$base['province']=$Province->find($base['province_id']);

    	$Industry=M('Industry_cate');			//行业类别
    	$base['industry']=$Industry->find($base['industry_cate_id']);

    	$Company_cate=M('Company_cate');		//公司类型
    	$base['cate']=$Company_cate->find($base['company_cate_id']);

    	$Stock=M('Stock_market');				//上市地点
    	$base['stock']=$Stock->find($base['stock_market_id']);

    	$Currency_type=M('Currency_type');		//资金类型
    	$base['currency_type']=$Currency_type->find($base['currency_type_id']);

    	$Process=M('Company_processing_technic_second');	//生产工艺
    	$Name_process=M('Processing_technic_second');        //工艺名称列表
    	//*****************获取工艺名称
        $sup_prolist=$Process->where('supplier_company_id='.$com_id)->getField('id,technic_second_id');
        foreach ($sup_prolist as $k => $val) {
            $base['processname'][]=$Name_process->getById($val);
        }
        //*****************done
        
        $Number=M('Staffs_number');				//员工人数
        $number_list=$Number->where('supplier_company_id='.$com_id)->order('year desc')->limit(1)->select();
        $base['number']=$number_list[0]['manufacture']+$number_list[0]['quality']+$number_list[0]['research']+$number_list[0]['other'];

        $Turnover=M('Turnover');				//营业额
        $base['turnover']=$Turnover->where('supplier_company_id='.$com_id)->order('year desc')->limit(1)->getField('currency_type_id,amount');
        foreach ($base['turnover'] as $cur_type => $amount) {
        	$base['turnover']['currency_type']=$Currency_type->getById($cur_type);
        	$base['turnover']['amount']=$amount;
        }

        $Customer=M('Customers_distribution');		//客户分布
        $base['customer']=$Customer->where('supplier_company_id='.$com_id)->order('ratio desc')->limit(3)->select();
        foreach($base['customer'] as $key => $val){
        	$base['customer'][$key]['industry']=$Industry->getById($val['industry_cate_id']);
        }

        $Market=M('Market_distribution');			//市场分布
        $Area=M('Area_partition');
        $base['market']=$Market->where('supplier_company_id='.$com_id)->order('ratio desc')->limit(3)->select();
        foreach($base['market'] as $key => $val){
        	$base['market'][$key]['area']=$Area->getById($val['area_partition_id']);
        }

        $Product=M('Representative_product');		//代表性产品
        $base['product']=$Product->where('supplier_company_id='.$com_id)->limit(3)->select();

        $SystemCri=M('System_criteria');			//体系认证
        $ProductCri=M('Product_criteria');
        $CriBody=M('Certification_body');
        $SystemItem=M('System_authentication_item');
        $ProductItem=M('product_authentication_item');
        $base['cri']=array();

        $syslist=$SystemItem->where('supplier_company_id='.$com_id)->select();
        foreach ($syslist as $key => $value) {
            $type=session('lang')=='en'?'System Certificate':'管理体系认证';
        	$system_criteria=$SystemCri->getById($value['system_criteria_id']);
        	$certification_body=$CriBody->getById($value['certification_body_id']);
        	$base['cri'][]=array('type'=>$type,
        						'criteria'=>$system_criteria,
        						'certification_body'=>$certification_body,
        						'expire_date'=>$value['expire_date'],
        						'certificate_number'=>$value['certificate_number'],
        						'certificate_pdf_url'=>$value['certificate_pdf_url']);
        }
        $prolist=$ProductItem->where('supplier_company_id='.$com_id)->select();
        foreach ($prolist as $key => $value) {
            $type=session('lang')=='en'?'Product Certificate':'产品认证';
        	$product_criteria=$ProductCri->getById($value['product_criteria_id']);
        	$certification_body=$CriBody->getById($value['certification_body_id']);
        	$base['cri'][]=array('type'=>$type,
        						'criteria'=>$product_criteria,
        						'certification_body'=>$certification_body,
        						'expire_date'=>$value['expire_date'],
        						'certificate_number'=>$value['certificate_number'],
        						'certificate_pdf_url'=>$value['certificate_pdf_url']);
        }

    	$this->assign('base',$base);

    	$view=I('get.view')?I('get.view'):substr(cookie('think_language'),0,2);//信息展示语言
    	$this->assign('view',$view);

        $this->display();
    }

    //供应商个人信息
    public function supplierPersonalInfo(){
        

        $User=M('Supplier');
        $list=$User->getById(session('user_id'));
        $this->assign('user',$list);

        $Function=M('Function');   //行业
        $Fun_list=$Function->select();
        if(session('lang')=='en') $Fun_list=zh_to_en($Fun_list);
        $this->assign('fun_list',$Fun_list);

        $Country=M('Country_code');     //国家
        $Cou_list=$Country->select();
        if(session('lang')=='en') $Cou_list=zh_to_en($Cou_list);
        $this->assign('cou_list',$Cou_list);

        $Province=M('Province_code');   //省份
        $Pro_list=$Province->select();
        if(session('lang')=='en') $Pro_list=zh_to_en($Pro_list);
        $this->assign('pro_list',$Pro_list);

        $Recommand=M('Recommended_channel'); //推荐渠道
        $Rec_list=$Recommand->select();
        $this->assign('rec_list',$Rec_list);
    
        $this->display();
    }

    //更新个人信息
    public function update_PersonalInfo(){
        

        $User=M('Supplier');
        $data=I('post.');

        $img=$User->getFieldById($data['id'],'face_url');   //头像名
        $path='./Public/uploads/supplier_pic/';             //头像路径

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $path ; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        $upload->autoSub   =     false;    //不使用子目录
        $upload->replace   =     true;      //覆盖文件

        if($User->create()){        //更新信息
            $res=$User->save();
            if($res!==false){
                //上传新头像
                foreach($_FILES as $key =>$file){
                    if(!empty($file['name'])) {
                        $upload->saveName  =   $data['id'].'_'.substr(md5_file($file['tmp_name']),0,10);    //上传文件名
                             // 上传单个文件 
                        $info   =   $upload->uploadOne($file);
                        if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                        }else{// 上传成功 获取上传文件信息
                            unlink($path.$img);  //删除原文件
                            //新浪云删除文件
                            //sae_unlink('./Public/Uploads/xxx.jpg');
                            $res2=$User->where('id='.$data['id'])->setField('face_url',$info['savename']);
                        }
                    }
                }
                if($res2!==false){
                    session('username',$data['username']);
                    $this->success('信息更新成功',__APP__.'/Home/Supplier/supplierProfile');
                }
                else{
                    $this->error($User->getError());
                }
            }
            else{
                $this->error($User->getError());
            }
        }
        else{
            $this->error($User->getError());
        }
    }

    //供应商业务看板
    public function supplierProfile(){
        

        $id=session('user_id');
        $User=M('Supplier');        //获取用户信息
        $user=$User->getById($id);
        $this->assign('user',$user);

        $Inbox=M('Letter');             //获取邮件
        $Interest=M('Supply_company_customer_list');
        $amount=array('unread'=>0,      //计数器
                      'accepted'=>0,
                      'rejected'=>0,
                      'checking'=>0,);

        $msg_map=array('recipient_id'=>$user['id'], //邮箱
                    'recipient_type'=>2);
        $msg=$Inbox->where($msg_map)->select();
        $amount['unread']=count($msg);

        $list=$Interest->where('supplier_company_id='.$user['id'])->select();  //邀请列表
        foreach ($list as $key) {
            switch ($key['is_comfirm_rfi']) {
                case '0':  $amount['checking']++;  break;
                case '2':  $amount['rejected']++;  break;
                case '1':  $amount['accepted']++;  break;
            }
        }

        $this->assign('amount',$amount);

        $bs_view=$this->bussiness_view($user);  //业务看板
        $this->assign('view',$bs_view);

        $this->display();
    }

    //业务看板
    public function bussiness_view($user){

        //推荐
        $Recommended_record=M('Recommended_record');
        $where=array();
        $where['supplier_company_id']=$user['supplier_company_id'];
        $recommended_records=$Recommended_record->where($where)->select();
        $reccomand=count($recommended_records);

        //关注
        $Watched_record=M('Watched_record');
        $where=array();
        $where['supplier_company_id']=$user['supplier_company_id'];
        $watched_records=$Watched_record->where($where)->select();
        $watched=count($watched_records);

        //信息邀请
        $Interest=M('Buyer_interest_list');
        $list=$Interest->where('supplier_company_id='.$user['id'])->select();
        $invitecount=count($list);

        $bs_view=array('reccomand'=>$reccomand,
                        'follow'=>$watched,
                        'invite'=>$invitecount);
        return $bs_view;
    }

    //同意邀请
    public function acceptInvite(){
        

        $msgid=I('get.id');
        if(!$msgid)   $this->error('非法访问',__APP__.'/Home/Index');

        $Letter=M('Letter');
        $SupInterest=M('Supply_company_customer_list');
        $BuyInterest=M('Buyer_interest_list');

        $map['buyer_id']=$Letter->getFieldById($msgid,'sender_id');
        $map['supplier_company_id']=$Letter->getFieldById($msgid,'recipient_id');

        //答复邮件
        $res1=$Letter->where('id='.$msgid)->setField('state',1);
        if($res1===0) $this->error('已答复该邮件',__APP__.'/Home/Supplier/supplierProfile');
        //设置关注列表
        $res2=$SupInterest->where($map)->setField('is_comfirm_rfi',1);
        $res3=$BuyInterest->where($map)->setField('is_send_rfi',2);

        if($res1!==false&&$res2!==false&&$res3!==false){
            $this->SendAcceptEmail($map['buyer_id'],$msgid,$map['supplier_company_id']);
            redirect(__APP__.'/Home/Supplier/supplierProfile');
        }
        else{
            $this->error('确认失败',__APP__.'/Home/Supplier/supplierProfile');
        }
    }

    //拒绝邀请
    public function rejectInvite(){
        

        $msgid=I('get.id');
        if(!$msgid)   $this->error('非法访问',__APP__.'/Home/Index');

        $Letter=M('Letter');
        $SupInterest=M('Supply_company_customer_list');
        $BuyInterest=M('Buyer_interest_list');

        $map['buyer_id']=$Letter->getFieldById($msgid,'sender_id');
        $map['supplier_company_id']=$Letter->getFieldById($msgid,'recipient_id');

        //答复邮件
        $res1=$Letter->where('id='.$msgid)->setField('state',2);
        if($res1===0) $this->error('已答复该邮件',__APP__.'/Home/Supplier/supplierProfile');
        //设置关注列表
        $res2=$SupInterest->where($map)->setField('is_comfirm_rfi',2);
        $res3=$BuyInterest->where($map)->setField('is_send_rfi',3);

        if($res1!==false&&$res2!==false&&$res3!==false){
            $this->SendRejectEmail($map['buyer_id'],$msgid);
            redirect(__APP__.'/Home/Supplier/supplierProfile');
        }
        else{
            $this->error('拒绝失败',__APP__.'/Home/Supplier/supplierProfile');
        }
    }

    //接受邀请邮件内容
    private function acceptmailcontent($msgid,$link){
        $data=$this->mail_get_rfiletter_by_id($msgid);

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
      <h2 class="modal-title">供应商确认信息邀请邮件</h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 接受信息邀请</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：接受信息邀请 </h4>
      <div class="mailContent">
        <p>尊敬的<span class="name" id="name">'.$data['username'].'</span>，您好<br/>您的信息邀请已被<span class="name" id="supplierCompany">'.$data['companyname'].'</span>接受，您的客户经理<span class="name" id="supplierPersonal">'.$data['servicer'].'</span>将竭诚为您服务</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$link.'" class="btn btn-primary  btn-block">查看供应商详细信息</a>
          </div>   
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>如有任何问题，请与<a href="Mailto:support@seletedin.com">support@seletedin.com</a>联系。<br/>您的selectedin团队。</p>
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
      <h2 class="modal-title">RFI Accepted </h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| RFI Accepted</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>Subject: RFI Accepted</h4>
      <div class="mailContent">
        <p>Dear<span class="name" id="name">'.$data['username'].'</span><br/>Your RFI have been accepted by <span class="name" id="supplierCompany">'.$data['companyname'].'</span>, your account manager <span class="name" id="supplierPersonal">'.$data['servicer'].'</span>is dedicated to serve you.</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$link.'" class="btn btn-primary  btn-block">Supplier’s Detailed Profile</a>
          </div>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <div class="modal-footer">
       <p>In case of any questions, do not hesitate to contact us at <a href="Mailto:support@seletedin.com">support@seletedin.com</a>.<br/>Your Selectedin Team.</p>
    </div>
</body>
</html>';
                break;
        }
        return $content;
    }

    //发送接受邀请邮件
    private function SendAcceptEmail($id,$msgid,$supid){
        $Buyer=M('Buyer');
        $email=$Buyer->getFieldById($id,'email');
        $title='Saas 信息邀请';

        $key='accept';                                         //设置密匙
       //// $state=authcode($id,'ENCODE',$key,0);                  //加密采购商id
       // $state.='_'.authcode($email,'ENCODE',$key,0);          //加密采购商邮件地址
       // $state.='_'.authcode($supid,'ENCODE',$key,0);          //加密供应商id

        $state=str_hex($id);                  //加密采购商id
        $state.='_'.str_hex($email);          //加密采购商邮件地址
        $state.='_'.str_hex($supid);          //加密供应商id

        $link=U('Home/Api/AcceptEmailCheck',array('state'=>$state),'',true);

        $content=$this->acceptmailcontent($msgid,$link);
        SUPPORTsendMail($email,$title,$content);
    }

    //拒绝邀请邮件内容
    private function rejectmailcontent($msgid,$loginlink,$searchlink){
        $data=$this->mail_get_rfiletter_by_id($msgid);

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
      <h2 class="modal-title">供应商拒绝信息邀请邮件  </h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| 供应商拒绝信息邀请邮件</h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>主题：拒绝信息邀请 </h4>
      <div class="mailContent">
        <p>尊敬的<span class="name" id="name">'.$data['username'].'</span>，您好<br/>您的信息邀请已被 <span class="name" id="supplierCompany">'.$data['companyname'].'</span>拒绝，您可以选择向其它供应商发送邀请或重新选择供应商。</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$loginlink.'" class="btn btn-primary  btn-block">向其它供应商发送</a>
          </div>
          <div class="col-md-4">
             <a href="'.$searchlink.'" class="btn btn-primary  btn-block">寻找供应商</a>
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
      <h2 class="modal-title">RFI Declined  </h2>
      <div class="media logoEmial">
        <div class="media-left">
          <a href="#">
            <img class="media-object " src="http://selectin.applinzi.com/Public/assets/img/logo.jpg" height="20" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">| RFI Declined </h4>
        </div>
      </div>     
    </div>
    <div class="modal-body">        
      <h4><i class="fa fa-circle "></i>Subject: RFI Declined</h4>
      <div class="mailContent">
        <p>Dear<span class="name" id="name">'.$data['username'].'</span><br/>Your RFI has been declined by <span class="name" id="supplierCompany">'.$data['companyname'].'</span>, and you could send RFI to other suppliers or search new suppliers.</p>  
        <div class="row">
          <div class="col-md-4">
             <a href="'.$loginlink.'" class="btn btn-primary  btn-block">Send RFI to Other Suppliers</a>
          </div>
          <div class="col-md-4">
             <a href="'.$searchlink.'" class="btn btn-primary  btn-block">Search New Suppliers</a>
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

    //发送拒绝邀请邮件
    private function SendRejectEmail($id,$msgid){
        $Buyer=M('Buyer');
        $email=$Buyer->getFieldById($id,'email');

        $title='Saas 信息邀请';

        $key='reject';                                         //设置密匙
        //$state=authcode($id,'ENCODE',$key,0);                  //加密采购商id
        //$state.='_'.authcode($email,'ENCODE',$key,0);          //加密采购商邮件地址
        
        $state=str_hex($id);                  //加密采购商id
        $state.='_'.str_hex($email);          //加密采购商邮件地址

        $loginlink=U('Home/Api/AcceptEmailCheck',array('state'=>'l_'.$state),'',true);
        $searchlink=U('Home/Api/AcceptEmailCheck',array('state'=>'s_'.$state),'',true);

        $content=$this->rejectmailcontent($msgid,$loginlink,$searchlink);
        SUPPORTsendMail($email,$title,$content);
    }


    //删除客户
    public function deletecustomer(){
        $user_id=session('user_id');
        $id=I('get.id');
        if(!$id)   $this->error('非法访问',__APP__.'/Home/Index');

        $Customer=M('Supply_company_customer_list');
        $find=$Customer->getById($id);
        if($find){
            if($user_id==$find['supplier_company_id']){
                $res=$Customer->delete();
                if($res){
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }
            else{
                $this->error('删除失败');
            }
        }
        else{
            $this->error('删除失败');
        }
    }

    //查看采购商信息
    public function viewbuyerPersonalInfo(){
        $id=I('get.id');
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');

        $Customer=M('Supply_company_customer_list'); //获得关注列表
        $state=$Customer->where('supplier_company_id='.session('user_id').' AND buyer_id='.$id)->getField('is_comfirm_rfi');
        $this->assign('state',$state);

        $Buyer=M('Buyer');
        $info=$Buyer->getById($id);

        $Function=M('Function');        //职能
        $info['function']=$Function->getById($info['function_id']);
        if(session('lang')=='en')   $info['function']=zh_to_en_single($info['function']);

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
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');

        $Company=M('Buyer_company');
        $info=$Company->getById($id);

        $Industry=M('Industry_cate');        //行业
        $info['industry']=$Industry->getById($info['industry_cate_id']);
        if(session('lang')=='en')   $info['industry']=zh_to_en_single($info['industry']);

        $Country=M('Country_code');     //国家
        $info['country']=$Country->getById($info['country_id']);
        if(session('lang')=='en')   $info['country']=zh_to_en_single($info['country']);

        $Province=M('Province_code');   //省份
        $info['province']=$Province->getById($info['province_id']);
        if(session('lang')=='en')   $info['province']=zh_to_en_single($info['province']);

        $this->assign('info',$info);

        $this->display();
    }

    //跳转供应商信息页
    public function CheckRifState(){
        session('Infoview',null);

        $supplierid=I('get.id');        //得到公司ID
        if(!$supplierid)   $this->error('非法访问',__APP__.'/Home/Index');

        $Supplier=M('Supplier');
        $sup_com_id=$Supplier->getFieldById($supplierid,'supplier_company_id');

        $type=session('type');

        if($type==2){       //供应商查看供应商
            $infoview=array('sup_com_id'=>$sup_com_id);       //设置查看权限
            session('Infoview',$infoview);
            redirect(__APP__.'/Home/Supplier/supplierCompanyPublicInfo');
        }

        else if($type==1){  //采购商查看供应商
            $Interest=M('Buyer_interest_list');     //获取关注列表
            $map['buyer_id']=session('user_id');
            $map['supplier_company_id']=$supplierid;
            $res=$Interest->where($map)->select();
            if($res && $res[0]['is_send_rfi']==2){
                $infoview=array('rfi'=>$res[0]['is_send_rfi'],
                                'sup_com_id'=>$sup_com_id,
                                'int_id'=>$res[0]['id']);       //设置查看权限
                session('Infoview',$infoview);
                redirect(__APP__.'/Home/Supplier/supplierCompanyDetailedInfo');
            }
            else{
                $infoview=array('sup_com_id'=>$sup_com_id);       //设置查看权限
                session('Infoview',$infoview);
                redirect(__APP__.'/Home/Supplier/supplierCompanyPublicInfo');
            }
        }
    }

    //发送消息
    public function sendmessage(){
        

        $Letter=M('Letter');
        $data=I('post.');
        $data['sender_id']=session('user_id');
        $data['sender_type']=2;
        $data['recipient_type']=1;
        $data['type']=2;
        $data['time']=time();

        if($Letter->create($data)){
            $res=$Letter->add();
            if($res){
                $this->success('发送成功');
            }
            else{
                $this->error($Letter->getError());
            }
        }
        else{
            $this->error($Letter->getError());
        }
    }

    //回复消息
    public function replyletter(){
        

        $Letter=M('Letter');
        $data=I('post.');
        $data['sender_id']=session('user_id');
        $data['sender_type']=2;
        $data['recipient_type']=1;
        $data['type']=2;
        $data['time']=time();
        if($Letter->create($data)){
            $res=$Letter->add();
            if($res){
                $setRead=$Letter->where('id='.$data['letterid'])->setField('state',1);
                $this->success('发送成功');
            }
            else{
                $this->error($Letter->getError());
            }
        }
        else{
            $this->error($Letter->getError());
        }
    }
    //设置已读
    public function setRead(){
        

        $id=I('get.id');
        if(!$id)   $this->error('非法访问',__APP__.'/Home/Index');

        $Letter=M('Letter');
        $res=$Letter->where('id='.$id)->setField('state',1);
        redirect(__APP__.'/Home/Supplier/inbox');
    }

    //根据id得到消息的内容
    public function get_letter_by_id(){
        $id=I('id');
        if($id){
            $table=M('Letter');
            $letter=$table->getById($id);
            $data['status']=1;
            $data['letter']=$letter;

            if($letter['sender_type']==1){
                $Buyer=M('Buyer');        //得到发件人姓名
                $data['letter']['reciver']=$Buyer->getFieldById($letter['sender_id'],'username');
            }

            $this->ajaxReturn($data);
        }

        $data['status']=0;
        $this->ajaxReturn($data);
    }

    //根据id得到RFI的内容
    public function get_rfiletter_by_id(){
        $langtype=session('lang')=='en'?'name_en':'name';
        $id=I('id');
        if($id){
            $table=M('Letter');
            $letter=$table->where('id='.$id.' AND type=1')->find();
            $data['status']=1;
            $data['letter']=$letter;

            $Buyer=M('Buyer');
            $Supplier=M('Supplier');
            $Buyer_company=M('Buyer_company');

            $data['letter']['username']=$Supplier->getFieldById(session('user_id'),'username');     //获得自己姓名
            
            $com_id=$Buyer->getFieldById($letter['sender_id'],'buyer_company_id');
            $data['letter']['companyname']=$Buyer_company->getFieldById($com_id,$langtype);            //发送者公司名

            $data['letter']['sender']=$Buyer->getFieldById($letter['sender_id'],'username');     //获得发送者姓名

            $this->ajaxReturn($data);
        }

        $data['status']=0;
        $this->ajaxReturn($data);
    }

    //根据id得到RFI的内容(发邮件用)
    private function mail_get_rfiletter_by_id($id){
        $langtype=session('lang')=='en'?'name_en':'name';

            $table=M('Letter');
            $letter=$table->where('id='.$id.' AND type=1')->find();
            $data['status']=1;
            $data['letter']=$letter;

            $Buyer=M('Buyer');
            $data['letter']['username']=$Buyer->getFieldById($letter['sender'],'username');

            $Supplier=M('Supplier');
            $Sup_company=M('Supplier_company');
            $com_id=$Supplier->getFieldById($letter['recipient_id'],'supplier_company_id');
            $data['letter']['companyname']=$Sup_company->getFieldById($com_id,$langtype);

            $data['letter']['servicer']=$Supplier->getFieldById($letter['recipient_id'],'username');

            return $data['letter'];
    }
}