<?php
include "background/config.php";
$mysql="select * from lnimg";
$data=$pdo->query($mysql);
$rows=$data->fetchAll(PDO::FETCH_ASSOC);//图片加载
$admin = false;//  启动会话，这步必不可少
session_start();//  判断是否登陆
$account=$_SESSION["account"];
$sql="select head,user_name from t_users where user_account='$account'";//头像
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
$head=$row['head'];
$nicheng=$row['user_name'];
$sql1="select count(*) as value from mess WHERE types='3'";//留言数目
$smt1=$pdo->prepare($sql1);
$smt1->execute();
$tot=$smt1->fetchColumn();
//留言内容
$sql2="SELECT t_users.user_name,t_users.head,mess.utext,mess.updatetime FROM mess,t_users WHERE mess.user_account=t_users.user_account and mess.types=3";
$smt2=$pdo->query($sql2);
$row2=$smt2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>辽宁美食</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="layui/css/layui.css" rel="stylesheet" type="text/css">
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- animation-effect -->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- //animation-effect -->
    <link href='http://fonts.useso.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(function(){
            $("#footer").load('foot.html');
        });
    </script>


    <link rel="stylesheet" type="text/css" href="css/grid-accordion.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/grid-accordion-example1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.gridAccordion.min.js"></script>

    <script type="text/javascript">

        jQuery(document).ready(function($){
            $('.accordion').gridAccordion(
                {width:1100,
                    height:800,
                    columns:5,
                    distance:2,
                    closedPanelWidth:10,
                    closedPanelHeight:10,
                    alignType:'centerCenter',
                    slideshow:true,
                    panelProperties:{
                        0:{captionWidth:200, captionHeight:35, captionTop:30, captionLeft:30},
                        4:{captionWidth:150, captionHeight:100, captionTop:30, captionLeft:650},
                        7:{captionWidth:310, captionHeight:35, captionTop:350, captionLeft:40},
                        8:{captionWidth:300, captionHeight:40, captionTop:150, captionLeft:35},
                        11:{captionWidth:150, captionHeight:120, captionTop:300, captionLeft:30},
                        14:{captionWidth:300, captionHeight:40, captionTop:30, captionLeft:50},
                        16:{captionWidth:150, captionHeight:120, captionTop:150, captionLeft:10},
                        18:{captionWidth:300, captionHeight:40, captionTop:130, captionLeft:50}
                    }});
        });

    </script>

    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
</head>

<body>
<!-- header -->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="logo">
                    <a class="navbar-brand" href="index.html">家乡东北</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" class="active">特色美食</a></li>
                        <li><a href="events.php">文化习俗</a></li>
                        <li><a href="short-codes.php">自然景观</a></li>
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
                                <dd><a href=''>基本资料</a></dd>
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
<!-- single -->
<div class="single">
    <div class="container">
        <div id="biaoti" ><img src="images/l.jpg" ></div>
        <ul class="accordion">
            <?php
            foreach($rows as $rw){
                echo " <li>
                <img src='{$rw['src']}' alt=\"\"></a>
            </li>";
            }
            ?>
        </ul>
        <?php
        echo "<div class=\"three-com\">
            <h3 class=\"wow fadeInUp\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\">共 $tot 条留言评论 <label>欢迎大家参与留言评论！</label></h3>
               
        </div>";

        for($x=0;$x<$tot;$x++){
            if($x%2==0){
                echo " <div class=\"tom-grid wow fadeInUp\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\">
                <div class=\"tom\">
                    <img src=\"{$row2[$x]['head']}\" alt=\" \" />
                </div>
                <div class=\"tom-right\">
                    <div class=\"Hardy\">
                        <h4>{$row2[$x]['user_name']}</h4>
                        <p><label>{$row2[$x]['updatetime']}</label></p>
                    </div>     
                    <div class=\"clearfix\"> </div>
                    <p class=\"lorem\">{$row2[$x]['utext']}</p>
                </div>
                <div class=\"clearfix\"> </div>
            </div>";
            }
            else{
                echo " <div class=\"tom-grid humour wow fadeInUp\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\">
                <div class=\"tom\">
                    <img src=\"{$row2[$x]['head']}\" alt=\" \" />
                </div>
                <div class=\"tom-right\">
                    <div class=\"Hardy\">
                        <h4>{$row2[$x]['user_name']}</h4>
                        <p><label>{$row2[$x]['updatetime']}</label></p>
                    </div>
                    <div class=\"clearfix\"> </div>
                    <p class=\"lorem\">{$row2[$x]['utext']}</p>
                </div>
                <div class=\"clearfix\"> </div>
            </div>";
            }
        }
        ?>
        <?php
        if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
            echo "  
            <div class=\"leave-comment wow fadeInUp\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\">
                 <h3>请留下您对美食的看法</h3>
                 <p>Thank you very much for your message. I hope you will continue to enjoy northeast cuisine.</p>
                 <form action=\"liao.php\" method=\"post\">
                       <textarea name=\"utext\"textarea placeholder=\"Message..\" required=\" \"></textarea>
                       <input type=\"submit\" value=\"点击提交\">
                    <div class=\"clearfix\"> </div>
                 </form>
            </div>";
        }else{
            echo " 
                    <div class=\"leave-comment wow fadeInUp\" data-wow-duration=\"1000ms\" data-wow-delay=\"300ms\">
                 <h3>留言请先<a href='loginRegister.php'  style=\"cursor:pointer;text-decoration:none;color:#F89407\" >登录</a>！Please log in first</h3>
                 <p>Thank you very much for your message. I hope you will continue to enjoy northeast cuisine.</p>
                 <form action=\"\" method=\"post\">
                       <textarea name=\"utext\"textarea placeholder=\"Message..\" required=\" \"></textarea>
                       <input type=\"submit\" value=\"点击提交\" onclick='hint()'>
                    <div class=\"clearfix\"> </div>
                 </form>       
            </div>";
        }
        ?>

    </div>
</div>
<!-- //single -->
<!-- footer -->
<div id="footer"></div>
<!-- //footer -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="layui/layui.js" type="text/javascript"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<script>
    function hint() {
        alert("请先进行用户登陆");
    }
</script>


<!-- //for bootstrap working -->
</body>
</html>
