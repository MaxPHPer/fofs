<?php
namespace Home\Controller;
use Home\Controller;
class IndividualController extends BaseController {
    public function _initialize() {
        parent::_initialize();
        //if(session('type')!=1)  $this->error('非法访问',__APP__.'/Home/Index');
    }

    //获取用户信息
    public function getInfo($id){
        $User=M('Buyer');
        $list=$User->getById($id);
        return $list;
    }

    //供应商公司公开信息
    public function supplierCompanyPublicInfo(){
        $com_id=session('Infoview.sup_com_id');     //默认他人访问
        $type=session('type');

        $Supplier=M('Supplier');
        if(!$com_id){
            if($type==1) $this->error('非法访问',__APP__.'/Home/Index');
            $user_id=session('user_id');        //自己访问
            $com_id=$Supplier->getFieldById($user_id,'supplier_company_id');
        }
        //session('Infoview',null);

        $Sup_company=M('Supplier_company');     //公司信息
        $base=$Sup_company->find($com_id);
        $base['established_time']=date('Y-m-d',$base['established_time']);
        
        $Country=M('Country_code');             //国家名称
        $base['country']=$Country->find($base['country_id']);
        if(session('lang')=='en') $base['country']=zh_to_en_single($base['country']);

        $Province=M('Province_code');           //省份名称
        $base['province']=$Province->find($base['province_id']);
        if(session('lang')=='en') $base['province']=zh_to_en_single($base['province']);


        $Industry=M('Industry_cate');           //行业类别
        $base['industry']=$Industry->find($base['industry_cate_id']);
        if(session('lang')=='en') $base['industry']=zh_to_en_single($base['industry']);

        $Company_cate=M('Company_cate');        //公司类型
        $base['cate']=$Company_cate->find($base['company_cate_id']);
        if(session('lang')=='en') $base['cate']=zh_to_en_single($base['cate']);

        $Stock=M('Stock_market');               //上市地点
        $base['stock']=$Stock->find($base['stock_market_id']);
        if(session('lang')=='en') $base['stock']=zh_to_en_single($base['stock']);

        $Currency_type=M('Currency_type');      //资金类型
        $base['currency_type']=$Currency_type->find($base['currency_type_id']);
        if(session('lang')=='en') $base['currency_type']=zh_to_en_single($base['currency_type']);

        $Process=M('Company_processing_technic_second');    //生产工艺
        $Name_process=M('Processing_technic_second');        //工艺名称列表
        //*****************获取工艺名称
        $sup_prolist=$Process->where('supplier_company_id='.$com_id)->getField('id,technic_second_id');
        foreach ($sup_prolist as $k => $val) {
            $base['processname'][]=$Name_process->getById($val);
        }
        //*****************done
        
        $Number=M('Staffs_number');             //员工人数
        $number_list=$Number->where('supplier_company_id='.$com_id)->order('year desc')->limit(1)->select();
        $base['number']=$number_list[0]['manufacture']+$number_list[0]['quality']+$number_list[0]['research']+$number_list[0]['other'];

        $Turnover=M('Turnover');                //营业额
        $base['turnover']=$Turnover->where('supplier_company_id='.$com_id)->order('year desc')->limit(1)->getField('currency_type_id,amount');
        foreach ($base['turnover'] as $cur_type => $amount) {
            $base['turnover']['currency_type']=$Currency_type->getById($cur_type);
            $base['turnover']['amount']=$amount;
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
        $base['product']=$Product->where('supplier_company_id='.$com_id)->limit(3)->select();

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

        $this->assign('base',$base);

        $view=I('get.view')?I('get.view'):substr(cookie('think_language'),0,2);//信息展示语言
        $this->assign('view',$view);

        $this->display();
    }

    //供应商公司详细信息
    public function supplierCompanyDetailedInfo(){
        $com_id=session('Infoview.sup_com_id');     //默认他人访问
        $state=session('Infoview.rfi');
        $type=session('type');
        $Supplier=M('Supplier');

        if($state!=2){          //验证权限
            if(!$com_id){
                if($type==1) $this->error('对不起，您无权查看，正转向公开信息页面','supplierCompanyPublicInfo');
                $user_id=session('user_id');        //自己访问
                $com_id=$Supplier->getFieldById($user_id,'supplier_company_id');
            }else{
                $this->error('对不起，您无权查看，正转向公开信息页面','supplierCompanyPublicInfo');
            }
        }
        else{
            $map['id']=session('Infoview.int_id');      //再次验证权限
            $map['buyer_id']=session('user_id');
            $Interest=M('Buyer_interest_list');
            $res=$Interest->where($map)->find();
            if($res['is_send_rfi']!=$state){
                $this->error('对不起，您无权查看，正转向公开信息页面','supplierCompanyPublicInfo');
            }
        }
        
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
            redirect(__APP__.'/Home/Buyer/supplierCompanyPublicInfo');
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
                redirect(__APP__.'/Home/Buyer/supplierCompanyDetailedInfo');
            }
            else{
                $infoview=array('sup_com_id'=>$sup_com_id);       //设置查看权限
                session('Infoview',$infoview);
                redirect(__APP__.'/Home/Buyer/supplierCompanyPublicInfo');
            }
        }
    }

    //查看个人信息
    public function viewsupplierPersonalInfo(){

        $id=I('get.id');
        if(!$id)   $this->error('非法访问',__APP__.'/Home/Index');

        $Interest=M('Buyer_interest_list'); //获得关注列表
        $state=$Interest->where('buyer_id='.session('user_id').' AND supplier_company_id='.$id)->getField('is_send_rfi');
        $this->assign('state',$state);

        $Supplier=M('Supplier');
        $info=$Supplier->getById($id);

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

	//为项目选择供应商
    public function alternateName(){
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $Project=M('Project');          //项目列表
        $list=$Project->where('creator_id='.$user['id'])->select();
        $this->assign('list',$list);

        $id=I('get.id');                //成员列表
        if(!$id)    $this->error('非法访问！',__APP__.'/Home/Buyer/project');

        $Member=M('Project_member');
        $members=$Member->where('project_id='.$id)->select();

        if($Project->getFieldById($id,'creator_id')!=$user['id'])   //验证非法访问
            $this->error('非法访问！',__APP__.'/Home/Buyer/project');

        $Supplier=M('Supplier');
        $Company=M('Supplier_company');
        foreach ($members as $key => $value) {
            $com_id=$Supplier->getFieldById($value['supplier_id'],'supplier_company_id');
            $members[$key]['address']=$Company->getFieldById($com_id,'address');
            $members[$key]['connect']=$Supplier->getFieldById($value['supplier_id'],'username');
        }
        $this->assign('member',$members);

        $this->assign('id',$id);
        $this->display();
    }

    //删除成员
    public function del_member(){
        

        $id=I('get.id');
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');
        $Project=M('Project');          //项目列表

        $Member=M('Project_member');    //成员列表
        $list=$Member->find($id);

        if($Project->getFieldById($list['project_id'],'creator_id')!=session('user_id'))   //验证非法访问
            $this->error('非法访问！');
        else{
            $res=$Member->delete($id);
            if($res)    $this->success('删除成功');
            else        $this->error('删除失败');
        }
    }

    //删除项目
    public function del_project(){
        

        $id=I('get.id');
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');

        $Project=M('Project');          //项目列表
        $Member=M('Project_member');    //成员列表

        $list=$Project->find($id);

        if($list['creator_id']!=session('user_id'))   //验证非法访问
            $this->error('非法访问！');
        else{
            $res=$Project->delete($id);
            if($res){
                $del=$Member->where('project_id='.$id)->delete();
                $this->success('删除成功',__APP__.'/Home/Buyer/project');
            }    
            else  $this->error('删除失败');
        }
    }
    //采购商公司信息
    public function buyerCompanyInfo(){
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $this->display();
    }

    //采购商个人信息
    public function buyerPersonalInfo(){
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $Function=M('Function');   //行业
        $Fun_list=$Function->select();
        if(session('lang')=='en')   $Fun_list=zh_to_en($Fun_list);

        $this->assign('fun_list',$Fun_list);

        $Country=M('Country_code');     //国家
        $Cou_list=$Country->select();
        if(session('lang')=='en')   $Cou_list=zh_to_en($Cou_list);
        $this->assign('cou_list',$Cou_list);


        $Province=M('Province_code');   //省份
        $Pro_list=$Province->select();
        $this->assign('pro_list',$Pro_list);

        $Recommand=M('Recommended_channel'); //推荐渠道
        $Rec_list=$Recommand->select();
        if(session('lang')=='en')   $Rec_list=zh_to_en($Rec_list,'channel','channel_en');
        $this->assign('rec_list',$Rec_list);

        $this->display();
    }

    //更新个人信息
    public function update_PersonalInfo(){
        

        $User=M('Buyer');
        $data=I('post.');

        $img=$User->getFieldById($data['id'],'face_url');   //头像名
        $path='./Public/uploads/buyer_pic/';             //头像路径

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
                    $this->success('信息更新成功',__APP__.'/Home/Buyer/individualProfile');
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

    //个人主页
    public function individualProfile(){
        

        $id=session('user_id');
        $user=$this->getInfo($id);       //获取用户信息
        $this->assign('user',$user);

        $Inbox=M('Letter');             //获取邮件
        $Interest=M('Buyer_interest_list');
        $amount=array('unread'=>0,      //计数器
                      'accepted'=>0,
                      'rejected'=>0,
                      'checking'=>0,);

        $rec_map=array(array('sender_id'=>$user['id'],     //Rfi查询条件
                    'sender_type'=>1,
                    'type'=>1,
                    'state'=>array('neq',0)),
                    '_string'=>'recipient_id='.$user['id'].' AND recipient_type=1',                                 //普通信息查询条件
                    '_logic'=>'OR');  
        $msg=$Inbox->where($rec_map)->select();
        $amount['unread']=count($msg);

        $list=$Interest->where('buyer_id='.$user['id'])->select();  //邀请列表
        foreach ($list as $key) {
            switch ($key['is_send_rfi']) {
                case '1':  $amount['checking']++;  break;
                case '3':  $amount['rejected']++;  break;
                case '2':  $amount['accepted']++;  break;
            }
        }

        $this->assign('amount',$amount);

        //项目
        $Project=M('Project');
        $project_list=$Project->where('creator_id='.$user['id'])->limit(3)->select();
        $this->assign('project',$project_list);


        $this->display();
    }

    //采购商收件箱
    public function inbox(){
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $Inbox=M('Letter');             //获取邮件
        $amount=array('receive'=>0,      //计数器
                      'send'=>0);

        $rec_map=array(array('sender_id'=>$user['id'],     //Rfi查询条件
                    'sender_type'=>1,
                    'type'=>1,
                    'state'=>array('neq',0)),
                    '_string'=>'recipient_id='.$user['id'].' AND recipient_type=1',                                 //普通信息查询条件
                    '_logic'=>'OR');                       //OR
        $send_map=array('sender_id'=>$user['id'],    //发送
                    'sender_type'=>1);

        $rec_msg=$Inbox->where($rec_map)->order('time desc')->select();
        $send_msg=$Inbox->where($send_map)->order('time desc')->select();

        foreach ($rec_msg as $key => $value) {      //整理数据---收件箱
            if($value['type']==2){
                $rec_msg[$key]['user']=$this->getMsgSender($value['sender_type'],$value['sender_id']);      //获取发送者名称
                $rec_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                                //处理发送时间
                $rec_msg[$key]['state']=$value['state']?'已读':'未读';  //处理状态
            }
            else if($value['type']==1){
                $rec_msg[$key]['user']=$this->getMsgSender($value['recipient_type'],$value['recipient_id']);      //获取发送者名称
                $rec_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                                //处理发送时间
                switch ($value['state']) {
                    case '1': $rec_msg[$key]['state']='已同意'; break;
                    case '2': $rec_msg[$key]['state']='已拒绝'; break;
                }
            }
        }

        $SupCompany=M('Supplier_company');
        $BuyCompany=M('Buyer_company');
        $Buyer=M('Buyer');
        $Supplier=M('Supplier');
        foreach ($send_msg as $key => $value) {      //整理数据---发件箱
            $send_msg[$key]['user']=$this->getMsgSender($value['recipient_type'],$value['recipient_id']);      //获取收件人名称
            $send_msg[$key]['time']=date('Y-m-d H:i:s',$value["time"]);
                                            //处理发送时间
            $send_msg[$key]['state']='已发送';  //处理状态
            if($value['type']=='1'){

                $supcom_id=$Supplier->getFieldById($value['recipient_id'],'supplier_company_id');
                $send_msg[$key]['supname']=$SupCompany->getFieldById($supcom_id,'name');       //获取供应商公司名

                $send_msg[$key]['servicer']=$Supplier->getFieldById($value['recipient_id'],'username');       //获取供应商客户经理

            }
        }
        
        $amount['receive']=count($rec_msg);
        $amount['send']=count($send_msg);

        $type=I('get.type');
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

    //新建项目
    public function addProject(){
        

        $project=array('project_name'=>I('post.project_name'),
                        'creator_id'=>session('user_id'), 
                        'creator_name'=>session('username'),
                        'sub_time'=>time());        //创建项目
        $list=I('post.member');                     //成员列表

        $Project=M('Project');
        $Member=M('Project_member');
        if($Project->create($project)){
            $id=$Project->add();
            if($id){
                foreach ($list as $val => $name) {
                    $member=array('project_id'=>$id,
                                'project_name'=>$project['project_name'],
                                'supplier_id'=>$val,
                                'supplier_name'=>$name,
                                'sub_time'=>time());
                    $res=$Member->add($member);
                    if(!$res) $this->error('成员添加失败');
                }
                $this->success('项目创建成功！');
            }
            else{
                $this->error($Project->getError());
            }
        }
        else{
            $this->error($Project->getError());
        }

    }

    //项目列表
    public function project(){
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $Project=M('Project');
        $list=$Project->where('creator_id='.$user['id'])->select();
        $this->assign('list',$list);

        $Interest=M('Buyer_interest_list');
        $Supplier=M('Supplier');                //供应商个人
        $Sup_company=M('Supplier_company');     //供应商列表
        $member=$Interest->where('buyer_id='.$user['id'].' AND is_send_rfi=2')->select();
        foreach ($member as $key => $value) {
            $com_id=$Supplier->getFieldById($value['supplier_company_id'],'supplier_company_id');                           
            $member[$key]['comname']=$Sup_company->getFieldById($com_id,'name');//供应商名称
        }
        $this->assign('member',$member);

        $this->display();
    }

    public function supplier(){
        

        $user=$this->getInfo(session('user_id'));
        $this->assign('user',$user);

        $Interest=M('Buyer_interest_list');     //获取关注列表
        $Supplier=M('Supplier');                //供应商个人
        $Sup_company=M('Supplier_company');     //供应商列表
        $Sup_process=M('Company_processing_technic_second'); //供应商工艺列表
        $Name_process=M('Processing_technic_second');        //工艺名称列表
        $type=session('lang')=='en'?'name_en':'name';

        $list=$Interest->where('buyer_id='.$user['id'])->select();
        foreach ($list as $key) {
            $com_id=$Supplier->getFieldById($key['supplier_company_id'],'supplier_company_id');
            if(!$com_id) continue;                          
            $com_name=$Sup_company->getFieldById($com_id,$type);//供应商名称

            switch ($key['is_send_rfi']) {        //邀请状态
                case '0':  $state='未邀请';  break;
                case '1':  $state='未确认信息邀请';  break;
                case '3':  $state='拒绝信息邀请';  break;
                case '2':  $state='接受信息邀请';  break;
            }

            //*****************获取工艺名称
            $sup_prolist=$Sup_process->where('supplier_company_id='.$com_id)->getField('id,technic_second_id');
            $name=array();

            foreach ($sup_prolist as $k => $val) {
                $name[]=$Name_process->getFieldById($val,$type);
            }

            //*****************done
            
            //**********获取联系人
            $connect=$Supplier->getFieldById($key['supplier_company_id'],'username');
            //*****************done
            
            $interests[]=array('name'=>$com_name,       //整合列表
                                'state'=>$key['is_send_rfi'],
                                'process'=>$name,
                                'connect'=>$connect,
                                'connect_id'=>$key['supplier_company_id'],
                                'id'=>$key['id']);
        }
        $this->assign('intlist',$interests);

        $Project=M('Project');          //项目列表
        $list=$Project->where('creator_id='.$user['id'])->select();
        $this->assign('list',$list);

        $this->display();
    }

    //添加供应商到项目
    public function addMember(){
        

        $Project=M('Project');
        $name=$Project->getFieldById(I('post.project_id'),'project_name');                                          //获得项目名称
        $list=I('post.member');                     //成员列表

        $Member=M('Project_member');
        if($list){
            $res=array();
            foreach ($list as $val => $n){
                $member=array('project_id'=>I('post.project_id'),
                                'supplier_id'=>$val);
                $find=$Member->where($member)->select();
                if($find){ $this->error('所选供应商 '.$n.' 已在该项目中');}
                else{
                   $res[]=array('project_id'=>I('post.project_id'),
                                'project_name'=>$name,
                                'supplier_id'=>$val,
                                'supplier_name'=>$n,
                                'sub_time'=>time()); 
                }
                
            }
            $suc=$Member->addAll($res);
            if($suc){
                $this->success('成员添加成功！');
            }
            else{
                $this->error('成员添加失败！');
            }
        }
        else{
            $this->error('没有选择供应商');
        }
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

    //删除关注列表
    public function del_interest(){
        

        $id=I('get.id');
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');

        $Interest=M('Buyer_interest_list');
        $state=$Interest->getFieldById($id,'is_send_rfi');

        if($state=='1'){
            $this->error('邀请信息未确认，不能删除');
        }
        else{
            $res=$Interest->delete($id);
            if($res){
                $this->success('删除成功');
            }
            else{
                $this->error('删除失败');
            }
        }
    }

    //发送消息
    public function sendmessage(){
        

        $Letter=M('Letter');
        $data=I('post.');
        $data['sender_id']=session('user_id');
        $data['sender_type']=1;
        $data['recipient_type']=2;
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
        $data['sender_type']=1;
        $data['recipient_type']=2;
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
        if(!$id)    $this->error('非法访问',__APP__.'/Home/Index');

        $Letter=M('Letter');
        $res=$Letter->where('id='.$id)->setField('state',1);
        redirect(__APP__.'/Home/Buyer/inbox');
    }

    //根据id得到消息的内容
    public function get_letter_by_id(){
        $id=I('id');
        if($id){
            $table=M('Letter');
            $letter=$table->getById($id);
            $data['status']=1;
            $data['letter']=$letter;

            if($letter['sender_type']==2){
                $Supplier=M('Supplier');        //得到发件人姓名
                $data['letter']['reciver']=$Supplier->getFieldById($letter['sender_id'],'username');
            }

            $this->ajaxReturn($data);
        }

        $data['status']=0;
        $this->ajaxReturn($data);
    }

    //根据id得到RFI的内容
    public function get_rfiletter_by_id(){
        $id=I('id');
        if($id){
            $type=session('lang')=='en'?'name_en':'name';
            $table=M('Letter');
            $letter=$table->where('id='.$id.' AND type=1')->find();
            $data['status']=1;
            $data['letter']=$letter;

            $Buyer=M('Buyer');
            $data['letter']['username']=$Buyer->getFieldById(session('user_id'),'username');

            $Supplier=M('Supplier');
            $Sup_company=M('Supplier_company');
            $com_id=$Supplier->getFieldById($letter['recipient_id'],'supplier_company_id');
            $data['letter']['companyname']=$Sup_company->getFieldById($com_id,$type);

            $data['letter']['servicer']=$Supplier->getFieldById($letter['recipient_id'],'username');

            $this->ajaxReturn($data);
        }

        $data['status']=0;
        $this->ajaxReturn($data);
    }

    //我的公司
    public function myCompany(){
        $this->display();
    }
}