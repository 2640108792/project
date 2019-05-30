

//对Date的扩展，将 Date 转化为指定格式的String
//月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
//年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
//例子： 
//(new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
//(new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
Date.prototype.format = function (fmt) { //author: meizz 
 var o = {
     "M+": this.getMonth() + 1, //月份 
     "d+": this.getDate(), //日 
     "h+": this.getHours(), //小时 
     "m+": this.getMinutes(), //分 
     "s+": this.getSeconds(), //秒 
     "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
     "S": this.getMilliseconds() //毫秒 
 };
 if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
 for (var k in o)
 if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
 return fmt;
}


function getMondayTime(){
    var now = new Date(); 
    var nowTime = now.getTime() ; 
    var day = now.getDay();
    var oneDayLong = 24*60*60*1000 ; 
    var MondayTime = nowTime - (day-1)*oneDayLong  ; 
    var monday = new Date(MondayTime);
    return monday;
}

function getSundayTime(){
    var now = new Date(); 
    var nowTime = now.getTime() ; 
    var day = now.getDay();
    var oneDayLong = 24*60*60*1000 ; 
    var SundayTime =  nowTime + (7-day)*oneDayLong ; 
    var sunday = new Date(SundayTime);
    return sunday;
}

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
};
$(function(){
    initNavigationArea();
    $(window).scroll(function(){
        var sc = $(window).scrollTop();//滚动高度
        var bh = $(window).height();//浏览器高度
        sc>bh ? $("#goTop").css("display","block") : $("#goTop").css("display","none");
    })
    $("#goTop").on("click",function(){
        $("body,html").animate({scrollTop:0},500);

    })

});
function initNavigationArea(type, curIndex){
    // 导航区域切换
    if(curIndex==null){
        curIndex =parseInt(getQueryString('curIndex'));
    }
    if(type==null){
        type =getQueryString('type');
    }
    var colIndex =parseInt(getQueryString('menu1'));
    var host = window.location.host;
    var pathname = window.location.pathname;
    var collectionTypeName = ['改革开放史','古代艺术','深圳历史文化','自然标本']
    switch(type)
    {
        // 典藏
        case 'collection':
            if(!curIndex){
                $('#collectionTypeName').text(collectionTypeName[0]);
            }else{
                $('#collectionTypeName').text(collectionTypeName[curIndex]);

            }
            break;
        //社教
        case 'socialisation':
            if(!curIndex){
                $('.social_nav ul li').find('a').removeClass('active');
                $('.social_nav ul li').eq(0).find('a').addClass('active');
            }else{

                $('.social_nav ul li').find('a').removeClass('active');
                $('.social_nav ul li').eq(curIndex).find('a').addClass('active');
            }
            break;
        case 'about':
            if(!curIndex){
                $('.title-b .title-b-item').find('a').removeClass('active');
                $('.title-b .title-b-item').eq(0).find('a').addClass('active');
            }else{
                $('.title-b .title-b-item').find('a').removeClass('active');
                $('.title-b .title-b-item').eq(curIndex).find('a').addClass('active');

            }
            break;
        // 我的收藏
        case 'centerCol':
            $('.col').find('a').eq(0).addClass('active');
            $('.res').find('a').eq(0).removeClass('active');

            $('.col').find('.sec-nav').show();
            $('.res').find('.sec-nav').hide();

            $('.col').find('.sec-nav a').eq(0).addClass('active');
            $('.items').eq(0).show().siblings().hide();

            $('.reservation-main').hide();
            $('.collection-main').show();
            break;
        // 我的预约
        case 'centerRes':
            $('.res').find('a').eq(0).addClass('active');
            $('.col').find('a').eq(0).removeClass('active');

            $('.res').find('.sec-nav').show();
            $('.col').find('.sec-nav').hide();

            $('.res').find('.sec-nav a').eq(0).addClass('active');
       
            $('.collection-main').hide();
            $('.reservation-main').show();

            break;
        default:

    }
    var pH = $(".exhi-article").children("p").height();
    if(pH<166){
        $(".shandow").hide();
        $(".exhi-article").css("height","auto");
        $(".exhi-article-wrap").css("paddingBottom","0");
        $(".exhi-detail .exhi-paragraph").css("marginBottom","0");
    }
    var oDiv = $(".astracts").height();
    if(oDiv>=183){
        $(".astracts").css("height","200px");
        $(".abstra_content").css("height","200px")
    }else{
        $(".arrow").hide();
//        console.log($(".astracts").height()+"px")
        $(".abstra_content").css({"height":"$('.astracts').height()"+"px","paddingBottom":"0"})
    }
    var oP = $(".astracts p");

    for(var i = 0;i<oP.length;i++){
        if(oP.eq(i).html()=='<br>'){
                oP.eq(i).remove();
        }else if(oP.eq(i).html()==''){
            oP.eq(i).remove();
        }
        var oSpan = oP.eq(i).children("span")
        for(var j=0;j<oSpan.length;j++){
             if(oSpan.eq(j).html()==null){
                oSpan.eq(j).remove();
            }
        }
    }
    var Span =  $(".astracts").children("span");
    for(var k = 0;k<Span.length;k++){
        if(Span.eq(k).html()==null){
            Span.eq(k).remove();
        }
    }
    $(".arrowDown").click(function(){
        $(".astracts").css({transtion:"500s",height:"auto",marginBottom:"10px"});
        $(".abstra_content").css({transtion:"500s",height:"auto"});
        $(".arrow").css({bottom:"0"});
        $(this).css("display","none");
        $(".arrowUp").css("display","inline-block");
    })
    $(".arrowUp").click(function(){
    	$(".abstra_content").css({transtion:"500s",height:"170px"});
        $(".astracts").css({transtion:"500s",height:"133px"});
        $(this).css("display","none");
        $(".arrowDown").css("display","inline-block");
        $(".arrow").css({bottom:""});
    })
}
function changeURLPar(destiny, par, par_value)
{
	var pattern = par+'=([^&]*)';
	var replaceText = par+'='+par_value;
	if (destiny.match(pattern))
	{
	var tmp = '/\\'+par+'=[^&]*/';
	tmp = destiny.replace(eval(tmp), replaceText);
	return (tmp);
	}
	else
	{
	if (destiny.match('[\?]'))
	{
	return destiny+'&'+ replaceText;
	}
	else
	{
	return destiny+'?'+replaceText;
	}
	}
	return destiny+'\n'+par+'\n'+par_value;
} 

$(document).ready(function(){
   $(document).bind("contextmenu",function(e){
        return false;
    });
   
})


 



	 
    	



