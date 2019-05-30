<?php
include "background/config.php";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>登陆页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/common.css?v=20180206"/>
    <link href="layui/css/layui.css" type="text/css" rel="stylesheet">
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- animation-effect -->
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <script type="text/javascript">
        $(function(){
            $("#footer").load('foot.html');
        });
    </script>
    <!-- //animation-effect -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
</head>
<body>
<!--头部导航栏-->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="logo">
                    <a class="navbar-brand" href="index.php">家乡东北</a>
                </div>
            </div>

            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" >特色美食</a></li>
                        <li><a href="events.php">文化习俗</a></li>
                        <li><a href="short-codes.php">自然景观</a></li>
                        <li><a href="services.php">旅游景点</a></li>
                        <li><a href="mail.php">联系我们</a></li>
                        <li><a href="loginRegister.php"class="active">登陆注册</a></li>
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
							<a href='loginRegister.php'>
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
<div class="loginWrap .loginWrap_">
    <div class="register login_go">
        <form action="login.php" method="post">
            <h1>登录</h1>
            <input type="text" placeholder="请输入账号" id="loginUserName" autocomplete="off" class="input-text" name="username">
            <input type="password" placeholder="请输入密码" id="loginUserPwd" autocomplete="off"  class="input-text" name="password">
            <p class="go-login forget"><a href="forgetPwd.html">忘记密码？</a></p>
            <input type="submit" class="register-submit" value="提交">
            <p class="go-login">没有账号？<a href="register.html">去注册</a></p>
        </form>
    </div>
</div>

<div id="footer"></div>
</body>
<script src="layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</html>
