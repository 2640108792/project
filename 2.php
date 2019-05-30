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

    <script src="layui/layui.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/wow.min.js"></script>

    <link href="ceshi/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="ceshi/css/lightbox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="ceshi/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".zoom,.ilike").hide();

            $(".zoom").each(function() { //遍历所有对象
                var src = $(this).siblings("img").attr("src");
                $(this).attr({
                    href: src
                });
            });

            $("#nav li").click(function() {
                $("#nav a").removeClass("hover");
                $(this).find("a").addClass("hover");
            });

            $(".waterfall li").mouseover(function() {
                $(this).addClass("hover");
                $(this).find(".zoom,.ilike").show();
            });

            $(".waterfall li").mouseout(function() {
                $(this).removeClass("hover");
                $(this).find(".zoom,.ilike").hide();
            });
        });
    </script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
        $(function(){
            $("#footer").load('foot.html');
        });
    </script>
    <script src="js/jquery.min.js"></script>

</head>

<body>

<script language="javascript">
    $(document).ready(function() {
        $(".tab_left a").each(function(j) {
            var num = j + 1;
            $(this).click(function() {
                $(".tab_left a").attr("class", "");
                $(this).attr("class", "hovera");
                for (var i = 1; i <= 5; i++) {
                    $(".tab_kc" + i).css("display", "none");
                }
                $(".tab_kc" + num).css("display", "block");
                //每次选项时都触发瀑布流
                var $waterfall = $('.waterfall');
                $waterfall.masonry({
                    columnWidth: 230
                });
                //每次选项时都触发瀑布流end

            });
        });
    });
</script>
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
<div class="position_pbl">
    <!-- main -->
    <div class="main  tab_kc1" style="display:block;">
        <ul class="waterfall">
            <li>
                <div class="img_block">
                    <img src="ceshi/files/1.jpg" />
                    <a href="#" rel="lightbox[plants]" title="测试标题" class="zoom">放大</a>
                    <a href="#" class="ilike">YYM</a>
                </div>
                <h3>TITLE</h3>
                <div class="iNum">
                    <span>1</span><a href="#">4</a>
                </div>
                <p>简介文字简介文字简介文字简介文字简介文字简介文字……</p>
            </li>

            <li>
                <div class="img_block">
                    <img src="ceshi/files/2.jpg" />
                    <a href="#" rel="lightbox[plants]" title="测试标题" class="zoom">放大</a>
                    <a href="#" class="ilike">YYK</a>
                </div>
                <h3>标题测试</h3>
                <div class="iNum">
                    <span>1</span><a href="#">4</a>
                </div>
                <p>简介文字简介文字简介文字简介文字简介文字简介文字……</p>
            </li>

            <li>
                <div class="img_block">
                    <img src="ceshi/files/3.jpg" />
                    <a href="#" rel="lightbox[plants]" title="测试标题" class="zoom">放大</a>
                    <a href="#" class="ilike">我喜欢</a>
                </div>
                <h3>标题测试</h3>
                <div class="iNum">
                    <span>1</span><a href="#">4</a>
                </div>
                <p>简介文字简介文字简介文字简介文字简介文字简介文字……</p>
            </li>

            <li>
                <div class="img_block">
                    <img src="ceshi/files/4.jpg" />
                    <a href="#" rel="lightbox[plants]" title="测试标题" class="zoom">放大</a>
                    <a href="#" class="ilike">我喜欢</a>
                </div>
                <h3>标题测试</h3>
                <div class="iNum">
                    <span>1</span><a href="#">4</a>
                </div>
                <p>简介文字简介文字简介文字简介文字简介文字简介文字……</p>
            </li>


        </ul>
    </div>

</div>



<script type="text/javascript" src="ceshi/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="ceshi/js/lightbox.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var $waterfall = $('.waterfall');

        $waterfall.masonry({
            columnWidth: 230
        });

    });
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
