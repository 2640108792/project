<?php
include "background/config.php";
$mysql="select * from img";
$data=$pdo->query($mysql);
$rows=$data->fetchAll(PDO::FETCH_ASSOC);
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
$account=$_SESSION["account"];
$sql="select head,user_name from t_users where user_account='$account'";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
$head=$row['head'];
$nicheng=$row['user_name'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>自然景观</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="layui/css/layui.css" rel="stylesheet">
    <link href="css/zzsc.css" type="text/css" rel="stylesheet" />
    <script src="layui/layui.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
        $(function(){
            $("#footer").load('foot.html');
        });
    </script>
    <script src="js/jquery.min.js"></script>
    <script>
        ;(function($){
            var
                //参数
                setting={
                    column_width:240,//列宽
                    column_className:'waterfall_column',//列的类名
                    column_space:10,//列间距
                    cell_selector:'.cell',//要排列的砖块的选择器，context为整个外部容器
                    img_selector:'img',//要加载的图片的选择器
                    auto_imgHeight:true,//是否需要自动计算图片的高度
                    fadein:true,//是否渐显载入
                    fadein_speed:600,//渐显速率，单位毫秒
                    insert_type:1, //单元格插入方式，1为插入最短那列，2为按序轮流插入
                    getResource:function(index){ }  //获取动态资源函数,必须返回一个砖块元素集合,传入参数为加载的次数
                },
                //
                waterfall=$.waterfall={},//对外信息对象
                $waterfall=null;//容器
            waterfall.load_index=0, //加载次数
                $.fn.extend({
                    waterfall:function(opt){
                        opt=opt||{};
                        setting=$.extend(setting,opt);
                        $waterfall=waterfall.$waterfall=$(this);
                        waterfall.$columns=creatColumn();
                        render($(this).find(setting.cell_selector).detach(),false); //重排已存在元素时强制不渐显
                        waterfall._scrollTimer2=null;
                        $(window).bind('scroll',function(){
                            clearTimeout(waterfall._scrollTimer2);
                            waterfall._scrollTimer2=setTimeout(onScroll,300);
                        });
                        waterfall._scrollTimer3=null;
                        $(window).bind('resize',function(){
                            clearTimeout(waterfall._scrollTimer3);
                            waterfall._scrollTimer3=setTimeout(onResize,300);
                        });
                    }
                });
            function creatColumn(){//创建列
                waterfall.column_num=calculateColumns();//列数
                //循环创建列
                var html='';
                for(var i=0;i<waterfall.column_num;i++){
                    html+='<div class="'+setting.column_className+'" style="width:'+setting.column_width+'px; display:inline-block; *display:inline;zoom:1; margin-left:'+setting.column_space/2+'px;margin-right:'+setting.column_space/2+'px; vertical-align:top; overflow:hidden"></div>';
                }
                $waterfall.prepend(html);//插入列
                return $('.'+setting.column_className,$waterfall);//列集合
            }
            function calculateColumns(){//计算需要的列数
                var num=Math.floor(($waterfall.innerWidth())/(setting.column_width+setting.column_space));
                if(num<1){ num=1; } //保证至少有一列
                return num;
            }
            function render(elements,fadein){//渲染元素
                if(!$(elements).length) return;//没有元素
                var $columns = waterfall.$columns;
                $(elements).each(function(i){
                    if(!setting.auto_imgHeight||setting.insert_type==2){//如果给出了图片高度，或者是按顺序插入，则不必等图片加载完就能计算列的高度了
                        if(setting.insert_type==1){
                            insert($(elements).eq(i),setting.fadein&&fadein);//插入元素
                        }else if(setting.insert_type==2){
                            insert2($(elements).eq(i),i,setting.fadein&&fadein);//插入元素
                        }
                        return true;//continue
                    }
                    if($(this)[0].nodeName.toLowerCase()=='img'||$(this).find(setting.img_selector).length>0){//本身是图片或含有图片
                        var image=new Image;
                        var src=$(this)[0].nodeName.toLowerCase()=='img'?$(this).attr('src'):$(this).find(setting.img_selector).attr('src');
                        image.onload=function(){//图片加载后才能自动计算出尺寸
                            image.onreadystatechange=null;
                            if(setting.insert_type==1){
                                insert($(elements).eq(i),setting.fadein&&fadein);//插入元素
                            }else if(setting.insert_type==2){
                                insert2($(elements).eq(i),i,setting.fadein&&fadein);//插入元素
                            }
                            image=null;
                        }
                        image.onreadystatechange=function(){//处理IE等浏览器的缓存问题：图片缓存后不会再触发onload事件
                            if(image.readyState == "complete"){
                                image.onload=null;
                                if(setting.insert_type==1){
                                    insert($(elements).eq(i),setting.fadein&&fadein);//插入元素
                                }else if(setting.insert_type==2){
                                    insert2($(elements).eq(i),i,setting.fadein&&fadein);//插入元素
                                }
                                image=null;
                            }
                        }
                        image.src=src;
                    }else{//不用考虑图片加载
                        if(setting.insert_type==1){
                            insert($(elements).eq(i),setting.fadein&&fadein);//插入元素
                        }else if(setting.insert_type==2){
                            insert2($(elements).eq(i),i,setting.fadein&&fadein);//插入元素
                        }
                    }
                });
            }
            function public_render(elems){//ajax得到元素的渲染接口
                render(elems,true);
            }
            function insert($element,fadein){//把元素插入最短列
                if(fadein){//渐显
                    $element.css('opacity',0).appendTo(waterfall.$columns.eq(calculateLowest())).fadeTo(setting.fadein_speed,1);
                }else{//不渐显
                    $element.appendTo(waterfall.$columns.eq(calculateLowest()));
                }
            }
            function insert2($element,i,fadein){//按序轮流插入元素
                if(fadein){//渐显
                    $element.css('opacity',0).appendTo(waterfall.$columns.eq(i%waterfall.column_num)).fadeTo(setting.fadein_speed,1);
                }else{//不渐显
                    $element.appendTo(waterfall.$columns.eq(i%waterfall.column_num));
                }
            }
            function calculateLowest(){//计算最短的那列的索引
                var min=waterfall.$columns.eq(0).outerHeight(),min_key=0;
                waterfall.$columns.each(function(i){
                    if($(this).outerHeight()<min){
                        min=$(this).outerHeight();
                        min_key=i;
                    }
                });
                return min_key;
            }
            function getElements(){//获取资源
                $.waterfall.load_index++;
                return setting.getResource($.waterfall.load_index,public_render);
            }
            waterfall._scrollTimer=null;//延迟滚动加载计时器
            function onScroll(){//滚动加载
                clearTimeout(waterfall._scrollTimer);
                waterfall._scrollTimer=setTimeout(function(){
                    var $lowest_column=waterfall.$columns.eq(calculateLowest());//最短列
                    var bottom=$lowest_column.offset().top+$lowest_column.outerHeight();//最短列底部距离浏览器窗口顶部的距离
                    var scrollTop=document.documentElement.scrollTop||document.body.scrollTop||0;//滚动条距离
                    var windowHeight=document.documentElement.clientHeight||document.body.clientHeight||0;//窗口高度
                    if(scrollTop>=bottom-windowHeight){
                        render(getElements(),true);
                    }
                },100);
            }
            function onResize(){//窗口缩放时重新排列
                if(calculateColumns()==waterfall.column_num) return; //列数未改变，不需要重排
                var $cells=waterfall.$waterfall.find(setting.cell_selector);
                waterfall.$columns.remove();
                waterfall.$columns=creatColumn();
                render($cells,false); //重排已有元素时强制不渐显
            }
        })(jQuery);
    </script>

</head>

<body>
<!-- header -->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="logo">
                    <a class="navbar-brand" href="index.php">家乡东北</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" >特色美食</a></li>
                        <li><a href="events.php">文化习俗</a></li>
                        <li><a href="short-codes.php" class="active">自然景观</a></li>
                        <li><a href="services.php">旅游景点</a></li>
                        <li><a href="mail.php">联系我们</a></li>
                        <li><a href="loginRegister.php">登陆注册</a></li>
                    </ul>
                </nav>
                <div class="social-icons">
                    <ul>
                        <li><a class="icon-link round facebook" href="http://v.t.sina.com.cn/share/share.php?url=http://www.qhnu.edu.cn &title=点击了解东北风光,美食文化,冰雪之城,欢迎大家前来游玩~" target="_blank"></a></li>
                        <li><a class="icon-link round p" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http://www.qhnu.edu.cn &title=点击了解东北风光,美食文化,冰雪之城,欢迎大家前来游玩~" target="_blank"></a></li>
                        <li><a class="icon-link round twitter" href="http://tieba.baidu.com/f/commit/share/openShareApi?url=http://www.qhnu.edu.cn &title=点击了解东北风光,美食文化,冰雪之城,欢迎大家前来游玩~" target="_blank"></a></li>
                    </ul>
                    <?php
                    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
                        echo "  
                    <ul class='layui-nav layui-layout-right'>
                        <li class='layui-nav-item'>
                            <a href='javascript:;''>
                                <img src='$head' class='layui-nav-img'>
                                $nicheng
                            </a>
                            <dl class='layui-nav-child'>
                                <dd><a href='userHome.php'>基本资料</a></dd>
                            </dl>
                        </li>
                        <li class='layui-nav-item'><a href='loggedOut.php'>退了</a></li>
                    </ul>";
                    }else{
                        echo " 
                    <ul class='layui-nav layui-layout-right'>
						<li class='layui-nav-item'>
							<a href='login.html'>
								<img src='images/co.png' class='layui-nav-img'>
                        请登陆
							</a>
						</li>
					</ul>";
                    }
                    ?>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<!-- header -->
<!-- banner1 -->
<div class="banner1">
    <div class="container">
    </div>
</div>
<!-- //banner1 -->
<!--typography-page -->


<div id="waterfall">
<?php

foreach($rows as $rw){

     echo "<div class=\"cell\"><a href=\"#\"><img src='{$rw['src']}' /></a></div>";

}
?>
</div>
<script>
    var opt={
        getResource:function(index,render){//index为已加载次数,render为渲染接口函数,接受一个dom集合或jquery对象作为参数。通过ajax等异步方法得到的数据可以传入该接口进行渲染，如 render(elem)
            if(index>=7) index=index%7+1;
            var html='';
            for(var i=20*(index-1);i<20*(index-1)+20;i++){
                var k='';
                for(var ii=0;ii<3-i.toString().length;ii++){
                    k+='0';
                }
                k+=i;
                var src="images/natural/image00"+k+".jpg";
                html+='<div class="cell"><a href="#"><img src="'+src+'" /></a><p>'+k+'</p></div>';
            }
            return $(html);
        },
        auto_imgHeight:true,
        insert_type:1
    }
    $('#waterfall').waterfall(opt);
</script>
<div style="text-align:center;clear:both">
    <!-- //typography-page -->
    <!-- footer -->
    <div id="footer"></div>
    <!-- //footer -->
    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
</body>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</html>
