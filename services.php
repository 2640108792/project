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
<!DOCTYPE HTML>
<html>
<head>
    <title>旅游景点</title>
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
    <script type="text/javascript">
        $(function(){
            $("#footer").load('foot.html');
        });
    </script>
    <!-- //animation-effect -->
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
                    <a class="navbar-brand" href="index.php">家乡东北</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" >特色美食</a></li>
                        <li><a href="events.php">文化习俗</a></li>
                        <li><a href="short-codes.php">自然景观</a></li>
                        <li><a href="services.php" class="active">旅游景点</a></li>
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
<div class="banner2">
    <div class="container">
    </div>
</div>
<!-- //banner1 -->
<!-- services -->
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">黑龙江景点</h1>
        <div class="service-grids">
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/1.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>冰雪大世界</h4>
                        <div class="more m2">
                            <a href="tourist/tourist1.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>330元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/7.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>亚布力滑雪旅游度假区</h4>
                        <div class="more m2">
                            <a href="tourist/tourist2.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>98元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/3.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>中国第一雪乡—双峰林场</h4>
                        <div class="more m2">
                            <a href="tourist/tourist3.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>120元</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="service-grids">
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/8.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>中央大街 </h4>
                        <div class="more m2">
                            <a href="tourist/tourist4.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>无门票</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/9.jpg " alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>哈尔滨极地馆 </h4>
                        <div class="more m2">
                            <a href="tourist/tourist5.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>135元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/6.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>圣索菲亚教堂</h4>
                        <div class="more m2">
                            <a href="tourist/tourist6.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>237元</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">吉林景点</h1>
        <div class="service-grids">
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/5.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>长春世界雕塑公园</h4>
                        <div class="more m2">
                            <a href="tourist/tourist7.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>48元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/18.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>长春净月潭国家森林公园</h4>
                        <div class="more m2">
                            <a href="tourist/tourist8.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>27元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/17.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>伪满皇宫博物院</h4>
                        <div class="more m2">
                            <a href="tourist/tourist9.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>67元</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="service-grids">
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/4.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>长白山</h4>
                        <div class="more m2">
                            <a href="tourist/tourist10.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>125元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/16.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>长影世纪城</h4>
                        <div class="more m2">
                            <a href="tourist/tourist11.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>188元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/2.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>雾凇岛</h4>
                        <div class="more m2">
                            <a href="tourist/tourist12.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>70元</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">辽宁景点</h1>
        <div class="service-grids">
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/13.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>九一八历史博物馆</h4>
                        <div class="more m2">
                            <a href="tourist/tourist13.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>无门票</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/14.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>本溪水洞</h4>
                        <div class="more m2">
                            <a href="tourist/tourist14.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>94元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/15.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>张氏帅府博物馆</h4>
                        <div class="more m2">
                            <a href="tourist/tourist15.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>60元</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="service-grids">
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/10.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>沈阳故宫</h4>
                        <div class="more m2">
                            <a href="tourist/tourist16.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>58元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/11.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>金石滩</h4>
                        <div class="more m2">
                            <a href="tourist/tourist17.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>145元</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 service-grid">
                <div class="service-grd wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/lvyou/12.jpg" alt=" " class="img-responsive" />
                    <div class="service-grd-pos">
                        <h4>千山</h4>
                        <div class="more m2">
                            <a href="tourist/tourist18.html" class="hvr-curl-bottom-right">了解一下</a>
                        </div>
                    </div>
                    <div class="service-grd-pos2">
                        <p>54元</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //services -->
<!-- footer -->
<div id="footer"></div>
<!-- //footer -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<script src="layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
<!-- //for bootstrap working -->
</body>
</html>
