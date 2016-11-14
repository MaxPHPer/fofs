/**
 * Created by leiger on 2016/2/4.
 */
$(document).ready(function() {
  var a1 = $('#addNew1').parents('.panel-body').find('.repeat_people');
  var b1 = a1.first().html();
  var a2 = $('#addNew2').parents('.panel-body').find('.repeat');
  var b2 = a2.first().html();
  var a3 = $('#addNew3').parents('.panel-body').find('.repeat_fund');
  var b3 = a3.first().html();
  var a4 = $('#addNew4').parents('.panel-body').find('.repeat');
  var b4 = a4.first().html();
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });
  $('#addNew1').click(function() {
    a1.last().append(b1);
  });
  $('#addNew2').click(function() {
    a2.last().append(b2);
  });
  $('#addNew3').click(function() {
    a3.last().append(b3);
  });
  $('#addNew4').click(function() {
    a4.last().append(b4);
  });
  /*  $('#accordion').find('input').each(function(){
      if($(this).focus() && (!$(this).parent('.collapse').hasClass('in'))){
        $(this).parent('.collapse').addClass('in');
        console.log(this);
      }
    });*/
  $('#collapseOne').on('hidden.bs.collapse', function() {
    var a = 0;
    $(this).find('input').each(function() {
      if (($(this).attr('required')) && ($(this).val() == '')) {
        a++;
      }
    });
    if (a != 0) {
      alert('公司基本信息有必填项未填写！');
      $('#collapseOne').collapse('show');
    }
  });

});

  

//获得当前语言
function getLangCookie(name) {　　
  var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));　　
  if (arr != null)　　　　　　　　 return unescape(arr[2]).substr(0, 2);　　
  return null;
}

/*忘记密码*/
$("#btnSubmit").click(function() {
  var val = $('input:radio[name="sex"]:checked').val();
  if (val == null) {
    alert("什么也没选中!");
    return false;
  } else {
    alert(val);
  }
  var list = $('input:radio[name="list"]:checked').val();
  if (list == null) {
    alert("请选中一个!");
    return false;
  } else {
    alert(list);
  }
});

/*忘记密码end*/

/*切换登录注册的小标题*/
$("#personal_sign_title").click(function() {
    $("#personal_sign_title").css("color","black");
    $("#institution_sign_title").css("color","#A2A0A0");
});


$("#institution_sign_title").click(function() {
    $("#personal_sign_title").css("color","#A2A0A0");
    $("#institution_sign_title").css("color","black");
});

$("#personal_login_title").click(function() {
    $("#personal_login_title").css("color","white");
    $("#institution_login_title").css("color","#AFACAC");
});


$("#institution_login_title").click(function() {
    $("#personal_login_title").css("color","#AFACAC");
    $("#institution_login_title").css("color","white");
});

$("#personal_forget").click(function() {
    $("#personal_forget").css("color","black");
    $("#institution_forget").css("color","#AFACAC");
});


$("#institution_forget").click(function() {
    $("#personal_forget").css("color","#AFACAC");
    $("#institution_forget").css("color","black");
});
/*切换登录注册的小标题end*/

/*添加关注*/
function add_follow(host_id,host_type,obj){
    var objectModel = {};
    objectModel['host_id'] =host_id;
    objectModel['host_type'] =host_type;

    console.log(objectModel);

    var domain=document.domain;
    if(domain=='localhost'){
        domain+='/fofs/1';
    }

    var toUrl='http://'+domain+"/index.php/Home/Base/add_follow";

    $.ajax({
        cache:false,
        type:"POST",
        url :toUrl,
        dataType:"json",
        data:objectModel,
        timeout:30000,


        error:function(){
            console.log(toUrl);
        },
        success:function(data){
            console.log(data);
            if(data['state']==1){
                var a=$(obj).parent();
                a.empty();
                a.append("<span class='label label-warning' >已关注</span>");
                alert("关注成功，可在机构主页查看我的所有关注");
            }else if(data['state']==2){
                alert("你尚未登录，登录后才能关注");
            }else{
                alert("操作失败，请重试");
            }

        },
    });
}