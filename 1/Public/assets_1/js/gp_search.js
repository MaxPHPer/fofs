var objectModel = {};
var investment_type = {};
var user_id = $("#user_id").val();
var institution_type = $("#institution_type").val();


// 多选框组
$('input').on('ifChanged',function(event){

    if(this.checked){
        investment_type[this.name] = 1; //表示选中
    }else{
        investment_type[this.name] = 0;
    }

    objectModel['investment_type'] = investment_type;
    console.log(objectModel);

});


/*gp搜索*/
$('#gp_search').click(function(){
    do_gp_search(1);
});

/*执行gp搜索*/
function do_gp_search(page){
    objectModel['fund_type'] = $("#fund_type").val();

    objectModel['investment_field'] = $("#investment_field").val();
    objectModel['investment_region'] = $("#investment_region").val();

    // 当前页面
    objectModel['page'] = page;

    console.log(objectModel);
    
    var domain=document.domain;
    if(domain=='localhost'){
        domain+='/fofs/1';
    }
    var toUrl='http://'+domain+"/index.php/Home/Search/do_gpSearch";

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
            
            $("#gp_results").empty();
            var count = 0;
            if(data['gps']){
                var count = data['gps'].length;
            }
            var b = "";
            if(count == 0 || data['gps'] == null){
                b += '<h3>暂无数据,请尝试更改搜索条件~</h3>';
                // 页码导航
                $("#pages").empty();
            }
            else{
                // gp的搜索结果
                var gp_img_url_index = $("#gp_img_url_index").val();
                var gp_profile_url_index = $("#gp_profile_url_index").val();
                
                var i = 0;
                for(i=0; i<count; i++){

                    b += '<div class="list-group-item row form-group">';
                    b +=     '<div class="col-sm-1 " style="margin-top:18px;">';
                    b +=        i + 1;
                    b +=     '</div>';
                                     
                    b +=     '<div class="col-sm-2">';
                    b +=        '<img class="media-object img-thumbnail" src="' + gp_img_url_index + (data['gps'][i]['institution_logo_img']?data['gps'][i]['institution_logo_img']:'default.jpg') + '" alt="头像"  width="100"/>';
                    b +=     '</div>';
                    b +=     '<div class="col-sm-5" style="margin-top:18px;">';
                    b +=        '<a href="' + gp_profile_url_index + '?id=' + data['gps'][i]['id'] + '&institution_type=' + data['gps'][i]['institution_type'] + '" target="_blank">' + data['gps'][i]['institution_fullname_cn'] + '</a>';
                    b +=     '</div>';

                    b +=     '<div class="col-sm-3" style="margin-top:18px;">';
                                if(data['gps'][i]['is_securities_fund'] == 1){
                    b +=            '证券投资基金';
                                }
                                if(data['gps'][i]['is_stock_fund'] == 1){
                    b +=            '股权投资基金';
                                }
                                if(data['gps'][i]['is_startup_fund'] == 1){
                    b +=            '创业投资基金';
                                }
                                if(data['gps'][i]['is_other_fund'] == 1){
                    b +=            '其它投资基金';
                                }

                    b +=      '</div>';

                    b +=      '<div class="col-sm-1 " style="margin-top:18px;">';
                                if( user_id == data['gps'][i]['id'] && institution_type == data['gps'][i]['institution_type'] ){

                                }else if( data['gps'][i]['is_by_followed'] == 1){
                    b +=            '<span class="label label-warning">已关注</span>';
                                }
                                else{
                    b +=            '<span class="label label-info" onclick="add_follow(' + data['gps'][i]['id'] + ',' + data['gps'][i]['institution_type'] + ',this);">+关注</span>';
                                }

                    b +=       '</div>';
                                                                
                      
                    b +=    '</div>';
                }

                // 页码导航
                $("#pages").empty();

                var page_nav = '';
                // 上一页
                if( data['now_page'] != 1){
                    page_nav += '<li><a class="prev" onclick="go_gp_page(' + ( data["now_page"] - 1 ) + ')">&lt;&lt;</a></li>';
                }

                // 页码
                for(var i = 1; i <= data['total_page']; i++){
                    // 当前页
                    if( i == data['now_page'] ){
                        page_nav += '<li class="active "><span>' + i + '<span class="sr-only"></span></span></li>';
                    }
                    else{
                        page_nav += '<li><a class="num" onclick="go_gp_page(' + i + ')">' + i + '</a></li>';
                    }
                }

                // 下一页
                if( data['now_page'] != data['total_page'] ){
                    page_nav += '<li><a class="next" onclick="go_gp_page(' + ( data["now_page"] + 1 ) + ')">&gt;&gt;</a></li>';
                }

                $("#pages").append(page_nav);
            }

            $("#gp_results").append(b);

        },
    });
}

/*gp页码跳转*/
function go_gp_page(page){
    console.log(page);
    do_gp_search(page);
}

$(document).ready(function(){ 
    do_gp_search(1);
});