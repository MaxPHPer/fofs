var lpConditions = {};
var investment_type = {};
var lp_user_id = $("#lp_user_id").val();
var lp_institution_type = $("#lp_institution_type").val();


// 多选框组
$('input').on('ifChanged',function(event){

    if(this.checked){
        investment_type[this.name] = 1; //表示选中
    }else{
        investment_type[this.name] = 0;
    }

    lpConditions['investment_type'] = investment_type;
    console.log(lpConditions);

});


/*lp搜索*/
$('#lp_search').click(function(){
    do_lp_search(1);
});

/*执行lp搜索*/
function do_lp_search(page){
    lpConditions['fund_type'] = $("#lp_fund_type").val();

    lpConditions['investment_field'] = $("#lp_investment_field").val();

    // 当前页面
    lpConditions['page'] = page;

    console.log(lpConditions);
    
    var domain=document.domain;
    if(domain=='localhost'){
        domain+='/fofs/1';
    }
    var toUrl='http://'+domain+"/index.php/Home/Search/do_lpSearch";

    $.ajax({
        cache:false,
        type:"POST",
        url :toUrl,
        dataType:"json",
        data:lpConditions,
        timeout:30000,
        
        
        error:function(){
            alert(url);
        },
        success:function(data){

            console.log(data);
            
            $("#lp_results").empty();
            var count = 0;
            if(data['lps']){
                var count = data['lps'].length;
            }
            var b = "";
            if(count == 0 || data['lps'] == null){
                b += '<h3>暂无数据,请尝试更改搜索条件~</h3>';
                // 页码导航
                $("#lp_pages").empty();
            }
            else{
                // lp的搜索结果
                var lp_img_url_index = $("#lp_img_url_index").val();
                var lp_profile_url_index = $("#lp_profile_url_index").val();
                
                var i = 0;
                for(i=0; i<count; i++){

                    b += '<div class="list-group-item row form-group">';
                    b +=     '<div class="col-sm-1 " style="margin-top:18px;">';
                    b +=        i + 1;
                    b +=     '</div>';
                                     
                    b +=     '<div class="col-sm-2">';
                    b +=        '<img class="media-object img-thumbnail" src="' + lp_img_url_index + (data['lps'][i]['institution_logo_img']?data['lps'][i]['institution_logo_img']:'default.jpg') + '" alt="头像"  width="100"/>';
                    b +=     '</div>';
                    b +=     '<div class="col-sm-5" style="margin-top:18px;">';
                    b +=        '<a href="' + lp_profile_url_index + '?id=' + data['lps'][i]['id'] + '&institution_type=' + data['lps'][i]['institution_type'] + '" target="_blank">' + data['lps'][i]['institution_fullname_cn'] + '</a>';
                    b +=     '</div>';

                    b +=     '<div class="col-sm-3" style="margin-top:18px;">';
                                if(data['lps'][i]['is_securities_fund'] == 1){
                    b +=            '证券投资基金';
                                }
                                if(data['lps'][i]['is_stock_fund'] == 1){
                    b +=            '股权投资基金';
                                }
                                if(data['lps'][i]['is_startup_fund'] == 1){
                    b +=            '创业投资基金';
                                }
                                if(data['lps'][i]['is_other_fund'] == 1){
                    b +=            '其它投资基金';
                                }

                    b +=      '</div>';

                    b +=      '<div class="col-sm-1 " style="margin-top:18px;">';
                                if( lp_user_id == data['lps'][i]['id'] && lp_institution_type == data['lps'][i]['institution_type'] ){

                                }else if( data['lps'][i]['is_by_followed'] == 1){
                    b +=            '<span class="label label-warning">已关注</span>';
                                }
                                else{
                    b +=            '<span class="label label-info" onclick="add_follow(' + data['lps'][i]['id'] + ',' + data['lps'][i]['institution_type'] + ',this);">+关注</span>';
                                }

                    b +=       '</div>';
                                                                
                      
                    b +=    '</div>';
                }

                // 页码导航
                $("#lp_pages").empty();

                var page_nav = '';
                // 上一页
                if( data['now_page'] != 1){
                    page_nav += '<li><a class="prev" onclick="go_lp_page(' + ( data["now_page"] - 1 ) + ')">&lt;&lt;</a></li>';
                }

                // 页码
                for(var i = 1; i <= data['total_page']; i++){
                    // 当前页
                    if( i == data['now_page'] ){
                        page_nav += '<li class="active "><span>' + i + '<span class="sr-only"></span></span></li>';
                    }
                    else{
                        page_nav += '<li><a class="num" onclick="go_lp_page(' + i + ')">' + i + '</a></li>';
                    }
                }

                // 下一页
                if( data['now_page'] != data['total_page'] ){
                    page_nav += '<li><a class="next" onclick="go_lp_page(' + ( data["now_page"] + 1 ) + ')">&gt;&gt;</a></li>';
                }

                $("#lp_pages").append(page_nav);
            }

            $("#lp_results").append(b);

        },
    });
}

/*lp页码跳转*/
function go_lp_page(page){
    console.log(page);
    do_lp_search(page);
}

$(document).ready(function(){ 
    do_lp_search(1);
});