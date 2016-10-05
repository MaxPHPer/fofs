/*全局变量*/
var compare_list=new Array();

$(document).ready(function(){

/*清空cookie*/
store.set('market_distribution_num',$("#market_distribution_num").val());
var index='';
for(var i=1;i<=store.get('market_distribution_num');i++){
    index='market_distribution_id_'+i;
    store.set(index,0);
}

store.set('system_criterias_num',$("#system_criterias_num").val());
for(var i=1;i<=store.get('system_criterias_num');i++){
    index='system_criteria_id_'+i;
    store.set(index,0);
}

store.set('product_criterias_num',$("#product_criterias_num").val());
for(var i=1;i<=store.get('product_criterias_num');i++){
    index='product_criteria_id_'+i;
    store.set(index,0);
}

store.set('processing_technic_first_id',0);
store.set('processing_technic_second_id',0);
store.set('technic_third_total',0);
store.set('is_active_technic_third',0);
store.set('duns',0);
store.set('country_id',0);
store.set('province_id',0);
store.set('system_criterias_num',0);
store.set('product_criterias_num',0);
store.set('cur_type_id',0);
store.set('startTurnover',-1);
store.set('overTurnover',-1);
store.set('customers_distribution_id',0);
store.set('market_distribution_num',0);
store.set('distance',-1);

store.set('is_search',0);
store.set('next_page',0);
store.set('now_page',0);
store.set('pre_page',0);
store.set('total_page',0);

filter_by_conditions_and_page(store.getAll(),1);

aa();

});

/*动态关联*/
$('#processing_technic_first').click(function(){
                var objectModel = {};
                var value = $(this).val();
                objectModel['technic_first_level'] =value;

                var domain=document.domain;
                if(domain=='localhost'){
                    domain+='/selectin/1';
                }
                var toUrl='http://'+domain+"/index.php/Home/Register/getSecondProcess";

                $.ajax({
                    cache:false,
                    type:"POST",
                    url :toUrl,
                    dataType:"json",
                    data:objectModel,
                    timeout:30000,
                    
                    
                    error:function(){
                        alert(url);
                    },
                    success:function(data){
                        
                        $("#processing_technic_second").empty();
                        var count = data.length;
                        var i = 0;
                        var b = "<option value='0'>unlimited</option>";
                        for(i=0;i<count;i++){
                             b+="<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
                        }
                        $("#processing_technic_second").append(b);

                        store.set('processing_technic_second_id',0);
                        store.set('technic_third_total',0);

                        $("#processing_technic_third").empty();
                    },
                });
          });


/*动态关联*/
$('#processing_technic_second').click(function(){
                var objectModel = {};
                var value = $(this).val();
                objectModel['technic_second_level'] =value;
                
                var domain=document.domain;
                if(domain=='localhost'){
                    domain+='/selectin/1';
                }
                var toUrl='http://'+domain+"/index.php/Home/Register/getThirdProcess";

                $.ajax({
                    cache:false,
                    type:"POST",
                    url :toUrl,
                    dataType:"json",
                    data:objectModel,
                    timeout:30000,

                    error:function(){
                        alert(url);
                    },
                    success:function(data){
                        
                        $("#processing_technic_third").empty();
                        var count = data.length;
                        store.set('technic_third_total',count);
                        store.set('is_active_technic_third',0);
                        if(count>0){
                            var i = 0;
                            var b = "";
                            for(i=0;i<count;i++){
                                var a="<div class='col-sm-4 select'><input type='checkbox' name='processing_technic_third_id_"+(i+1)+"' value='"+data[i]['id']+"' /><span><span>"+data[i]['name']+"</span></span></div>";
                                b+=a;
                            }
                            
                            $("#processing_technic_third").append(b);

                            $('input').iCheck({
                              checkboxClass: 'icheckbox_flat-blue',
                              radioClass: 'iradio_flat-blue'
                            });

                            aa();
                        }

                    },
                });
          });

var aa=function(){
    $('input').on('ifChanged',function(event){
        //     alert(this.name);
        //     alert(this.value);
        //     alert(this.checked);
        if(this.checked){
            store.set(this.name,this.value);
        }else{
            store.set(this.name,0);
        }
        store.set('market_distribution_num',$("#market_distribution_num").val());
        store.set('system_criterias_num',$("#system_criterias_num").val());
        store.set('product_criterias_num',$("#product_criterias_num").val());

        //获取货币类型和上下额
        store.set($("#cur_type_id").prop("name"),$("#cur_type_id").val());
        if($("#startTurnover").val()){
            store.set($("#startTurnover").prop('name'),$("#startTurnover").val());
        }else{
            store.set($("#startTurnover").prop('name'),-1);
        }

        if($("#overTurnover").val()){
            store.set($("#overTurnover").prop('name'),$("#overTurnover").val());
        }else{
            store.set($("#overTurnover").prop('name'),-1);
        }
        
        //判断是否触发第三级tech
        if(this.name.indexOf('processing_technic_third_id_')>=0){
            store.set('is_active_technic_third',1);
        }

        do_search_by_condition();
    });
}

/*国家省份动态关联*/
$('#country').click(function(){
                var objectModel = {};
                var value = $(this).val();
                objectModel['country_id'] =value;

                var domain=document.domain;
                if(domain=='localhost'){
                    domain+='/selectin/1';
                }
                var toUrl='http://'+domain+"/index.php/Home/Search/get_all_provinces";

                $.ajax({
                    cache:false,
                    type:"POST",
                    url :toUrl,
                    dataType:"json",
                    data:objectModel,
                    timeout:30000,
                    
                    
                    error:function(){
                        alert(url);
                    },
                    success:function(data){
                        
                        $("#province").empty();
                        var count = data.length;
                        var i = 0;
                        var b = "<option value='0'>unlimited</option>";
                        for(i=0;i<count;i++){
                             b+="<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
                        }
                        $("#province").append(b);

                        store.set('province_id',0);
                    },
                });
          });



function search_by_product(representative_product,page){
                var objectModel = {};
                objectModel['representative_product'] =representative_product;
                objectModel['page']=page;
                // alert(objectModel['representative_product']);
                var domain=document.domain;
                if(domain=='localhost'){
                    domain+='/selectin/1';
                }
                var toUrl='http://'+domain+"/index.php/Home/Search/get_companies_by_product";

                $.ajax({
                    cache:false,
                    type:"POST",
                    url :toUrl,
                    dataType:"json",
                    data:objectModel,
                    timeout:30000,
                    
                    
                    error:function(){
                        alert(url);
                    },
                    success:function(data){
                        console.log(data);
                        //清空原来的
                        for(var i=1;i<=5;i++){
                            var company_name_id='company_name_'+i;
                            $("#"+company_name_id).empty();

                            var company_address_id='company_address_'+i;
                            $("#"+company_address_id).empty();

                            var company_registered_capital_id='company_registered_capital_'+i;
                            $("#"+company_registered_capital_id).empty();

                            var company_turnover_id='company_turnover_'+i;
                            $("#"+company_turnover_id).empty();

                            var company_duns_no_id='company_duns_no_'+i;
                            $("#"+company_duns_no_id).empty();

                            var company_system_criterias_id='company_system_criterias_'+i;
                            $("#"+company_system_criterias_id).empty();

                            var company_product_criterias_id='company_product_criterias_'+i;
                            $("#"+company_product_criterias_id).empty();

                            var company_processing_technic_second_id='company_processing_technic_second_'+i;
                            $("#"+company_processing_technic_second_id).empty();

                            var company_customers_distribution_id='company_customers_distribution_'+i;
                            $("#"+company_customers_distribution_id).empty();

                            var company_market_distribution_id='company_market_distribution_'+i;
                            $("#"+company_market_distribution_id).empty();

                            var company_add_compare_id='company_add_compare_'+i;
                            $("#"+company_add_compare_id).val(0);

                            var company_send_rfi_id='company_send_rfi_'+i;
                            $("#"+company_send_rfi_id).val(0);
                        }
                        
                        var company_num=data['supplier_companies'].length;
                        for(var i=1;i<=company_num;i++){
                            var logo_base_url=$('#company_logo_base_url').val();

                            var company_name="<img src='"+logo_base_url+data['supplier_companies'][i-1]['logo_url']+"' height=60 /><br/>"+data['supplier_companies'][i-1]['name'];
                            var company_name_id='company_name_'+i;
                            $("#"+company_name_id).empty();
                            $("#"+company_name_id).append(company_name);

                            var company_address=data['supplier_companies'][i-1]['country']+' '+data['supplier_companies'][i-1]['province']+' '+data['supplier_companies'][i-1]['city'];//+' '+data['supplier_companies'][i-1]['address'];
                            var company_address_id='company_address_'+i;
                            $("#"+company_address_id).empty();
                            $("#"+company_address_id).append(company_address);

                            var company_registered_capital=data['supplier_companies'][i-1]['register_capital_currency_type']+' '+data['supplier_companies'][i-1]['registered_capital'];
                            var company_registered_capital_id='company_registered_capital_'+i;
                            $("#"+company_registered_capital_id).empty();
                            $("#"+company_registered_capital_id).append(company_registered_capital);

                            var company_turnover=data['supplier_companies'][i-1]['currency_type']+' '+data['supplier_companies'][i-1]['turnover'];
                            var company_turnover_id='company_turnover_'+i;
                            $("#"+company_turnover_id).empty();
                            $("#"+company_turnover_id).append(company_turnover);

                            var company_duns_no=data['supplier_companies'][i-1]['duns_no'];
                            var company_duns_no_id='company_duns_no_'+i;
                            $("#"+company_duns_no_id).empty();
                            $("#"+company_duns_no_id).append(company_duns_no);


                            var company_system_criterias='';
                            var count=data['supplier_companies'][i-1]['system_criterias'].length;
                            for(var j=0;j<count;j++){
                                company_system_criterias+=data['supplier_companies'][i-1]['system_criterias'][j]+'<br/>';

                            }
                            var company_system_criterias_id='company_system_criterias_'+i;
                            $("#"+company_system_criterias_id).empty();
                            $("#"+company_system_criterias_id).append(company_system_criterias);

                            //产品认证
                            var company_product_criterias='';
                            var count=data['supplier_companies'][i-1]['product_criterias'].length;
                            for(var j=0;j<count;j++){
                                company_product_criterias+=data['supplier_companies'][i-1]['product_criterias'][j]+'<br/>';

                            }
                            var company_product_criterias_id='company_product_criterias_'+i;
                            $("#"+company_product_criterias_id).empty();
                            $("#"+company_product_criterias_id).append(company_product_criterias);

                            //所有二级工艺
                            var company_processing_technic_seconds='';
                            var count=data['supplier_companies'][i-1]['processing_technic_second'].length;
                            for(var j=0;j<count;j++){
                                company_processing_technic_seconds+=data['supplier_companies'][i-1]['processing_technic_second'][j]+'<br/>';

                            }
                            var company_processing_technic_second_id='company_processing_technic_second_'+i;
                            $("#"+company_processing_technic_second_id).empty();
                            $("#"+company_processing_technic_second_id).append(company_processing_technic_seconds);


                            //所有客户分布
                            var company_customers_distributions='';
                            var count=data['supplier_companies'][i-1]['customers_distribution'].length;
                            for(var j=0;j<count;j++){
                                company_customers_distributions+=data['supplier_companies'][i-1]['customers_distribution'][j]['industry_cate']+' '+data['supplier_companies'][i-1]['customers_distribution'][j]['ratio']+'%<br/>';

                            }
                            var company_customers_distribution_id='company_customers_distribution_'+i;
                            $("#"+company_customers_distribution_id).empty();
                            $("#"+company_customers_distribution_id).append(company_customers_distributions);

                            //所有区域分布
                            var company_market_distributions='';
                            var count=data['supplier_companies'][i-1]['market_distribution'].length;
                            for(var j=0;j<count;j++){
                                company_market_distributions+=data['supplier_companies'][i-1]['market_distribution'][j]['area_partition']+' '+data['supplier_companies'][i-1]['market_distribution'][j]['ratio']+'%<br/>';

                            }
                            var company_market_distribution_id='company_market_distribution_'+i;
                            $("#"+company_market_distribution_id).empty();
                            $("#"+company_market_distribution_id).append(company_market_distributions);

                            var company_add_compare_id='company_add_compare_'+i;
                            $("#"+company_add_compare_id).val(data['supplier_companies'][i-1]['id']);

                            var company_send_rfi_id='company_send_rfi_'+i;
                            $("#"+company_send_rfi_id).val(data['supplier_companies'][i-1]['id']);
                            
                        }

                        //总共多少条记录
                        $("#total_num").empty();
                        $("#total_num").append(data['count']);

                        $("#now_page").empty();
                        $("#now_page").append(data['now_page']);
                        store.set('now_page',data['now_page']);

                        $("#total_page").empty();
                        $("#total_page").append(Math.ceil(data['count']/5));
                        store.set('total_page',Math.ceil(data['count']/5));

                        //下一页
                        $("#next_page").val(data['now_page']+1);
                        store.set('next_page',data['now_page']+1);

                        //上一页
                        $("#pre_page").val(data['now_page']-1);
                        store.set('pre_page',data['now_page']-1);
                        
                    },
                });
}

/*代表性产品搜索*/
$('#product_search').click(function(){
        store.set('is_search',1);
        var value = $('#representative_product').val();
        search_by_product(value,1);
                
});

/*上一页*/
function go_pre_page(){
    var now_page=store.get('now_page');
    var total_page=store.get('total_page');
    if(now_page==null||total_page==null){
        return;
    }
    if(now_page<=1){
        alert('当前已是最前一页');
        return;
    }
    if(now_page>total_page){
        alert('当前已是最后一页');
        return;
    }

    if(store.get('is_search')==1){
       var value = $('#representative_product').val();
       if(value){
            search_by_product(value,now_page-1);
       }
    }else if(store.get('is_search')==0){
        filter_by_conditions_and_page(store.getAll(),now_page-1);
    }

}

/*下一页*/
function go_next_page(){
    var now_page=store.get('now_page');
    var total_page=store.get('total_page');
    if(now_page==null||total_page==null){
        return;
    }
    if(now_page<1){
        alert('当前已是最前一页');
        return;
    }
    if(now_page>=total_page){
        alert('当前已是最后一页');
        return;
    }

    if(store.get('is_search')==1){
       var value = $('#representative_product').val();
       if(value){
            search_by_product(value,now_page+1);
       }
    }else if(store.get('is_search')==0){
        filter_by_conditions_and_page(store.getAll(),parseInt(now_page)+1);
    }

}


//加入到对比队列
function add_to_compare_list(obj){
    //判断是否已经存在队列中
    if($.inArray($(obj).val(),compare_list)==-1) {
        if(compare_list.length>=5){
            compare_list.pop();
        }

        if($(obj).val()==0){
            return;
        }
　　　　compare_list.unshift($(obj).val());

        alert('加入成功');
        return;
　　}

    alert('已经加入过了');
    return;
}

//移除对比队列
function move_from_compare_list(obj){
    //判断是否已经存在队列中
    var move_id=$(obj).val();

    if(move_id==0){
        return;
    }
    var new_arr=new Array();

    var length=compare_list.length;
    for(var i=0;i<length;i++){
        var temp=compare_list.pop();
        if(temp!=move_id){
            new_arr.unshift(temp);
        }
    }
　　compare_list=new_arr;

    start_to_compare();
    alert('移除成功');
    return;
}

//发送rfi
function send_rfi(obj){
    var objectModel = {};
    var value = $(obj).val();
    if(value==0 || value=='0'){
        return;
    }
    objectModel['supplier_company_id'] =value;

    var domain=document.domain;
    if(domain=='localhost'){
        domain+='/selectin/1';
    }
    var toUrl='http://'+domain+"/index.php/Home/Search/send_rfi";

    $.ajax({
        cache:false,
        type:"POST",
        url :toUrl,
        dataType:"json",
        data:objectModel,
        timeout:30000,
        
        
        error:function(){
            alert(toUrl);
        },
        success:function(data){
            alert(data['state']);
        },
    });
}

//数组除重
function arr_unique(arr){
    var new_arr=new Array();
    for(var i=0;i<arr.length;i++) {
    　　var items=arr[i];
    　　//判断元素是否存在于new_arr中，如果不存在则插入到new_arr的最后
    　　if($.inArray(items,new_arr)==-1) {
    　　　　new_arr.push(items);
    　　}
    }
    return new_arr;
}

//开始比较
function start_to_compare(){

    console.log(compare_list);
    var objectModel = {};
    objectModel['supplier_company_id_list'] =compare_list;

    var domain=document.domain;
    if(domain=='localhost'){
        domain+='/selectin/1';
    }
    var toUrl='http://'+domain+"/index.php/Home/Search/get_supplier_companies_by_ids";

    $.ajax({
        cache:false,
        type:"POST",
        url :toUrl,
        dataType:"json",
        data:objectModel,
        timeout:30000,
        
        
        error:function(){
            alert(url);
        },
        success:function(data){
            console.log(data);

            //清空原来的
            for(var i=1;i<=5;i++){
                var compare_company_name_id='compare_company_name_'+i;
                $("#"+compare_company_name_id).empty();

                var compare_company_address_id='compare_company_address_'+i;
                $("#"+compare_company_address_id).empty();

                var compare_company_registered_capital_id='compare_company_registered_capital_'+i;
                $("#"+compare_company_registered_capital_id).empty();

                var compare_company_turnover_id='compare_company_turnover_'+i;
                $("#"+compare_company_turnover_id).empty();

                var compare_company_duns_no_id='compare_company_duns_no_'+i;
                $("#"+compare_company_duns_no_id).empty();

                var compare_company_system_criterias_id='compare_company_system_criterias_'+i;
                $("#"+compare_company_system_criterias_id).empty();

                var compare_company_product_criterias_id='compare_company_product_criterias_'+i;
                $("#"+compare_company_product_criterias_id).empty();

                var compare_company_processing_technic_second_id='compare_company_processing_technic_second_'+i;
                $("#"+compare_company_processing_technic_second_id).empty();

                var compare_company_customers_distribution_id='compare_company_customers_distribution_'+i;
                $("#"+compare_company_customers_distribution_id).empty();

                var compare_company_market_distribution_id='compare_company_market_distribution_'+i;
                $("#"+compare_company_market_distribution_id).empty();

                var compare_company_add_compare_id='compare_company_add_compare_'+i;
                $("#"+compare_company_add_compare_id).val(0);

                var compare_company_send_rfi_id='compare_company_send_rfi_'+i;
                $("#"+compare_company_send_rfi_id).val(0);
            }
            
            var compare_company_num=data['supplier_companies'].length;
            for(var i=1;i<=compare_company_num;i++){
                var logo_base_url=$('#company_logo_base_url').val();

                var compare_company_name="<img src='"+logo_base_url+data['supplier_companies'][i-1]['logo_url']+"' height=60 /><br/>"+data['supplier_companies'][i-1]['name'];
                var compare_company_name_id='compare_company_name_'+i;
                $("#"+compare_company_name_id).empty();
                $("#"+compare_company_name_id).append(compare_company_name);

                var compare_company_address=data['supplier_companies'][i-1]['country']+' '+data['supplier_companies'][i-1]['province']+' '+data['supplier_companies'][i-1]['city'];//+' '+data['supplier_companies'][i-1]['address'];
                var compare_company_address_id='compare_company_address_'+i;
                $("#"+compare_company_address_id).empty();
                $("#"+compare_company_address_id).append(compare_company_address);

                var compare_company_registered_capital=data['supplier_companies'][i-1]['register_capital_currency_type']+' '+data['supplier_companies'][i-1]['registered_capital'];
                var compare_company_registered_capital_id='compare_company_registered_capital_'+i;
                $("#"+compare_company_registered_capital_id).empty();
                $("#"+compare_company_registered_capital_id).append(compare_company_registered_capital);

                var compare_company_turnover=data['supplier_companies'][i-1]['currency_type']+' '+data['supplier_companies'][i-1]['turnover'];
                var compare_company_turnover_id='compare_company_turnover_'+i;
                $("#"+compare_company_turnover_id).empty();
                $("#"+compare_company_turnover_id).append(compare_company_turnover);

                var compare_company_duns_no=data['supplier_companies'][i-1]['duns_no'];
                var compare_company_duns_no_id='compare_company_duns_no_'+i;
                $("#"+compare_company_duns_no_id).empty();
                $("#"+compare_company_duns_no_id).append(compare_company_duns_no);


                var compare_company_system_criterias='';
                var count=data['supplier_companies'][i-1]['system_criterias'].length;
                for(var j=0;j<count;j++){
                    compare_company_system_criterias+=data['supplier_companies'][i-1]['system_criterias'][j]+'<br/>';

                }
                var compare_company_system_criterias_id='compare_company_system_criterias_'+i;
                $("#"+compare_company_system_criterias_id).empty();
                $("#"+compare_company_system_criterias_id).append(compare_company_system_criterias);

                //产品认证
                var compare_company_product_criterias='';
                var count=data['supplier_companies'][i-1]['product_criterias'].length;
                for(var j=0;j<count;j++){
                    compare_company_product_criterias+=data['supplier_companies'][i-1]['product_criterias'][j]+'<br/>';

                }
                var compare_company_product_criterias_id='compare_company_product_criterias_'+i;
                $("#"+compare_company_product_criterias_id).empty();
                $("#"+compare_company_product_criterias_id).append(compare_company_product_criterias);

                //所有二级工艺
                var compare_company_processing_technic_seconds='';
                var count=data['supplier_companies'][i-1]['processing_technic_second'].length;
                for(var j=0;j<count;j++){
                    compare_company_processing_technic_seconds+=data['supplier_companies'][i-1]['processing_technic_second'][j]+'<br/>';

                }
                var compare_company_processing_technic_second_id='compare_company_processing_technic_second_'+i;
                $("#"+compare_company_processing_technic_second_id).empty();
                $("#"+compare_company_processing_technic_second_id).append(compare_company_processing_technic_seconds);


                //所有客户分布
                var compare_company_customers_distributions='';
                var count=data['supplier_companies'][i-1]['customers_distribution'].length;
                for(var j=0;j<count;j++){
                    compare_company_customers_distributions+=data['supplier_companies'][i-1]['customers_distribution'][j]['industry_cate']+' '+data['supplier_companies'][i-1]['customers_distribution'][j]['ratio']+'%<br/>';

                }
                var compare_company_customers_distribution_id='compare_company_customers_distribution_'+i;
                $("#"+compare_company_customers_distribution_id).empty();
                $("#"+compare_company_customers_distribution_id).append(compare_company_customers_distributions);

                //所有区域分布
                var compare_company_market_distributions='';
                var count=data['supplier_companies'][i-1]['market_distribution'].length;
                for(var j=0;j<count;j++){
                    compare_company_market_distributions+=data['supplier_companies'][i-1]['market_distribution'][j]['area_partition']+' '+data['supplier_companies'][i-1]['market_distribution'][j]['ratio']+'%<br/>';

                }
                var compare_company_market_distribution_id='compare_company_market_distribution_'+i;
                $("#"+compare_company_market_distribution_id).empty();
                $("#"+compare_company_market_distribution_id).append(compare_company_market_distributions);

                var compare_company_add_compare_id='compare_company_add_compare_'+i;
                $("#"+compare_company_add_compare_id).val(data['supplier_companies'][i-1]['id']);

                var compare_company_send_rfi_id='compare_company_send_rfi_'+i;
                $("#"+compare_company_send_rfi_id).val(data['supplier_companies'][i-1]['id']);
                
            }
            
        },
    });    
}

//筛选统一触发函数
function search_by_condition(obj){
    //将选项存储到cookie中
    store.set($(obj).prop("name"),$(obj).val());
    console.log($(obj).prop('name')+":"+store.get($(obj).prop('name')));

    //获取货币类型和上下额
    store.set($("#cur_type_id").prop("name"),$("#cur_type_id").val());
    if($("#startTurnover").val()){
        store.set($("#startTurnover").prop('name'),$("#startTurnover").val());
    }else{
        store.set($("#startTurnover").prop('name'),-1);
    }

    if($("#overTurnover").val()){
        store.set($("#overTurnover").prop('name'),$("#overTurnover").val());
    }else{
        store.set($("#overTurnover").prop('name'),-1);
    }

    do_search_by_condition();
}


$('input').on('ifChanged',function(event){
    //     alert(this.name);
    //     alert(this.value);
    //     alert(this.checked);
    if(this.checked){
        store.set(this.name,this.value);
    }else{
        store.set(this.name,0);
    }
    store.set('market_distribution_num',$("#market_distribution_num").val());
    store.set('system_criterias_num',$("#system_criterias_num").val());
    store.set('product_criterias_num',$("#product_criterias_num").val());

    //获取货币类型和上下额
    store.set($("#cur_type_id").prop("name"),$("#cur_type_id").val());
    if($("#startTurnover").val()){
        store.set($("#startTurnover").prop('name'),$("#startTurnover").val());
    }else{
        store.set($("#startTurnover").prop('name'),-1);
    }

    if($("#overTurnover").val()){
        store.set($("#overTurnover").prop('name'),$("#overTurnover").val());
    }else{
        store.set($("#overTurnover").prop('name'),-1);
    }

    //判断是否触发第三级tech
    if(this.name.indexOf('processing_technic_third_id_')>=0){
        store.set('is_active_technic_third',1);
    }

    do_search_by_condition();
});


//执行条件筛选
function filter_by_conditions_and_page(conditions,page){
    var objectModel = {};
    objectModel['conditions'] =conditions;
    objectModel['page'] =page;
    console.log(objectModel['page']);
    console.log(objectModel['conditions']);

    var domain=document.domain;
    if(domain=='localhost'){
        domain+='/selectin/1';
    }
    var toUrl='http://'+domain+"/index.php/Home/Search/do_filter";

    $.ajax({
        cache:false,
        type:"POST",
        url :toUrl,
        dataType:"json",
        data:objectModel,
        timeout:30000,
        
        error:function(){
            alert(toUrl);
        },
        success:function(data){
            console.log(data);
            //清空原来的
            for(var i=1;i<=5;i++){
                var company_name_id='company_name_'+i;
                $("#"+company_name_id).empty();

                var company_address_id='company_address_'+i;
                $("#"+company_address_id).empty();

                var company_registered_capital_id='company_registered_capital_'+i;
                $("#"+company_registered_capital_id).empty();

                var company_turnover_id='company_turnover_'+i;
                $("#"+company_turnover_id).empty();

                var company_duns_no_id='company_duns_no_'+i;
                $("#"+company_duns_no_id).empty();

                var company_system_criterias_id='company_system_criterias_'+i;
                $("#"+company_system_criterias_id).empty();

                var company_product_criterias_id='company_product_criterias_'+i;
                $("#"+company_product_criterias_id).empty();

                var company_processing_technic_second_id='company_processing_technic_second_'+i;
                $("#"+company_processing_technic_second_id).empty();

                var company_customers_distribution_id='company_customers_distribution_'+i;
                $("#"+company_customers_distribution_id).empty();

                var company_market_distribution_id='company_market_distribution_'+i;
                $("#"+company_market_distribution_id).empty();

                var company_add_compare_id='company_add_compare_'+i;
                $("#"+company_add_compare_id).val(0);

                var company_send_rfi_id='company_send_rfi_'+i;
                $("#"+company_send_rfi_id).val(0);
            }
            
            var company_num=data['supplier_companies'].length;
            for(var i=1;i<=company_num;i++){
                var logo_base_url=$('#company_logo_base_url').val();

                var company_name="<img src='"+logo_base_url+data['supplier_companies'][i-1]['logo_url']+"' height=60 /><br/>"+data['supplier_companies'][i-1]['name'];
                var company_name_id='company_name_'+i;
                $("#"+company_name_id).empty();
                $("#"+company_name_id).append(company_name);

                var company_address=data['supplier_companies'][i-1]['country']+' '+data['supplier_companies'][i-1]['province']+' '+data['supplier_companies'][i-1]['city'];//+' '+data['supplier_companies'][i-1]['address'];
                var company_address_id='company_address_'+i;
                $("#"+company_address_id).empty();
                $("#"+company_address_id).append(company_address);

                var company_registered_capital=data['supplier_companies'][i-1]['register_capital_currency_type']+' '+data['supplier_companies'][i-1]['registered_capital'];
                var company_registered_capital_id='company_registered_capital_'+i;
                $("#"+company_registered_capital_id).empty();
                $("#"+company_registered_capital_id).append(company_registered_capital);

                var company_turnover=data['supplier_companies'][i-1]['currency_type']+' '+data['supplier_companies'][i-1]['turnover'];
                var company_turnover_id='company_turnover_'+i;
                $("#"+company_turnover_id).empty();
                $("#"+company_turnover_id).append(company_turnover);

                var company_duns_no=data['supplier_companies'][i-1]['duns_no'];
                var company_duns_no_id='company_duns_no_'+i;
                $("#"+company_duns_no_id).empty();
                $("#"+company_duns_no_id).append(company_duns_no);


                var company_system_criterias='';
                var count=data['supplier_companies'][i-1]['system_criterias'].length;
                for(var j=0;j<count;j++){
                    company_system_criterias+=data['supplier_companies'][i-1]['system_criterias'][j]+'<br/>';

                }
                var company_system_criterias_id='company_system_criterias_'+i;
                $("#"+company_system_criterias_id).empty();
                $("#"+company_system_criterias_id).append(company_system_criterias);

                //产品认证
                var company_product_criterias='';
                var count=data['supplier_companies'][i-1]['product_criterias'].length;
                for(var j=0;j<count;j++){
                    company_product_criterias+=data['supplier_companies'][i-1]['product_criterias'][j]+'<br/>';

                }
                var company_product_criterias_id='company_product_criterias_'+i;
                $("#"+company_product_criterias_id).empty();
                $("#"+company_product_criterias_id).append(company_product_criterias);

                //所有二级工艺
                var company_processing_technic_seconds='';
                var count=data['supplier_companies'][i-1]['processing_technic_second'].length;
                for(var j=0;j<count;j++){
                    company_processing_technic_seconds+=data['supplier_companies'][i-1]['processing_technic_second'][j]+'<br/>';

                }
                var company_processing_technic_second_id='company_processing_technic_second_'+i;
                $("#"+company_processing_technic_second_id).empty();
                $("#"+company_processing_technic_second_id).append(company_processing_technic_seconds);


                //所有客户分布
                var company_customers_distributions='';
                var count=data['supplier_companies'][i-1]['customers_distribution'].length;
                for(var j=0;j<count;j++){
                    company_customers_distributions+=data['supplier_companies'][i-1]['customers_distribution'][j]['industry_cate']+' '+data['supplier_companies'][i-1]['customers_distribution'][j]['ratio']+'%<br/>';

                }
                var company_customers_distribution_id='company_customers_distribution_'+i;
                $("#"+company_customers_distribution_id).empty();
                $("#"+company_customers_distribution_id).append(company_customers_distributions);

                //所有区域分布
                var company_market_distributions='';
                var count=data['supplier_companies'][i-1]['market_distribution'].length;
                for(var j=0;j<count;j++){
                    company_market_distributions+=data['supplier_companies'][i-1]['market_distribution'][j]['area_partition']+' '+data['supplier_companies'][i-1]['market_distribution'][j]['ratio']+'%<br/>';

                }
                var company_market_distribution_id='company_market_distribution_'+i;
                $("#"+company_market_distribution_id).empty();
                $("#"+company_market_distribution_id).append(company_market_distributions);

                var company_add_compare_id='company_add_compare_'+i;
                $("#"+company_add_compare_id).val(data['supplier_companies'][i-1]['id']);

                var company_send_rfi_id='company_send_rfi_'+i;
                $("#"+company_send_rfi_id).val(data['supplier_companies'][i-1]['id']);
                
            }

            //总共多少条记录
            $("#total_num").empty();
            $("#total_num").append(data['count']);

            $("#now_page").empty();
            $("#now_page").append(data['now_page']);
            store.set('now_page',data['now_page']);

            $("#total_page").empty();
            $("#total_page").append(Math.ceil(data['count']/5));
            store.set('total_page',Math.ceil(data['count']/5));

            //下一页
            $("#next_page").val(data['now_page']+1);
            store.set('next_page',data['now_page']+1);

            //上一页
            $("#pre_page").val(data['now_page']-1);
            store.set('pre_page',data['now_page']-1);
        },
    });
}

function do_search_by_condition(){
    store.set('is_search',0);    //表示非搜索，而是筛选
    filter_by_conditions_and_page(store.getAll(),1);
}

