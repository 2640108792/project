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
    <title>美食介绍</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="layui/css/layui.css" rel="stylesheet">
    <!-- //animation-effect -->
    <link href='http://fonts.useso.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>
    <link href='http://fonts.useso.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
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
                        <li><a href="events.php"class="active">文化习俗</a></li>
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
<!-- events -->
<div class="events">
    <div class="container">
        <h1 class="wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">东北过年习俗</h1>
        <div class="event-grids">
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/1.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>杀  年  猪</h2>
                </div>
                <p class="quod">在农村，过了腊八之后，人们开始杀猪宰鸡，把猪肉切成块，放在大缸中送到仓房里冻起来以备节日期间用。
                    谁家杀猪都要用酸菜和肥肉、血肠放在大锅里炖，这便是人们常说的 “杀猪菜”。杀猪菜，原本是东北农村每年接近年关杀年猪时所吃的一种炖菜。
                    杀猪菜不怎么讲究什么配料、调料，只是把刚杀好的猪肉斩成大块放进锅里，加入水，放上盐，然后边煮边往里面切酸菜，等到肉烂菜熟后，再把灌好的血肠倒进锅内煮熟。
                    上菜时，一盘肉，一盘酸菜，一盘血肠，也有的是把三者合一，大盆大盆地端上桌来。</p>
            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/2.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>扫  棚</h2>
                </div>
                <p class="quod">进入腊月二十三之后，各家各户都要打扫卫生。家庭主妇们通常先把屋里的家具用被单等遮盖起来，
                    用头巾或毛巾将头包好，然后用扫帚将墙壁上下扫干净。扫完之后，擦洗桌椅、冲洗地面，用干净、整洁、亮堂来迎接新年的到来。
                    中国民间称之为“扫尘”、“掸尘”。因为有民谚说：“腊月不扫尘，来年招瘟神。”民俗专家表示，扫尘既有驱除病疫、祈求新年安康的意思，
                    也有除“陈”（尘）布新的含义。</p>

            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/3.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>赶年集，办年货</h2>
                </div>
                <p class="quod">过年之前要作很多准备，要买很多东西，吃的、用的、穿的、戴的、耍的、供的、干的、鲜的、生的、熟的，统名之日“年货”。
                    过年之前采购工作称为“办年货”。

                    年货一般包括鞭炮、对子（春联）、灯笼、冻梨、冻柿子等。家里有小孩的还要给小孩买件新衣服，这是规矩。在农村置办年货多选择赶集，
                    年集是一年中规模最大参与人数最多的一次，在大集上要把香蜡、纸码、鞭炮、年画、红纸、白糖、烟茶、糖果、佐料等买回家</p>

            </div>
            <div class="clearfix"> </div>

        </div>
        <div class="event-grids">
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/4.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>蒸  馒  头</h2>
                </div>
                <p class="quod">旧时为了春节期间来客人做饭锅不够之备，所以要提前蒸几锅馒头备用，也为春节祭祖用，也做粘豆包之类，
                    二十八把面发、 二十九蒸馒头即指此，也有称二十九把油走，意指做油扎食品。</p>
            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/5.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>祭 神 祭 祖</h2>
                </div>
                <p class="quod">老东北祭神祭祖一般用糕点，有蜜供、萨其马等，这些不仅是东北地区满蒙等少数民族的食品，也是东北人家中必备的食物。
                    东北人还有除夕夜吃鱼的习俗。鱼必须是鲤鱼，最初是以祭神为名目，后来就和“吉庆有余”、“连年有余”相联系。鱼既是美食，也是供品。
                    祭祖也是很重要的，有传下家谱的就要给祖宗供奉丰盛的祭品、上香，全家男丁都要祭拜，也有在除夕之夜烧纸送“钱”祭祖，祭祖一般要到初三结束，
                    在结束前女婿是不允许看丈母娘家家谱的。</p>

            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/6.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>粘  豆  包</h2>
                </div>
                <p class="quod">黏豆包是一种满族食品，满族人传统上喜欢黏性的食品。目前仍是东北地区人们冬季餐桌不可或缺的主角。
                    黏豆包一般是在冬季开始的时候制作，然后放入户外的缸（天然冰箱）中保存过冬。制作方法是将红小豆或大芸豆煮熟，
                    捣成豆沙酱，放入细砂糖，攥成核头大的馅团。用揉好的黄米面将豆馅团包入里面，团成豆包状，放入波罗叶（苏子叶）的屉中大火蒸二十分钟，
                    即可出锅。吃的时候可蘸白糖，吃其香甜黏；也可拍成小圆饼用油煎吃，品其香酥脆。</p>

            </div>
            <div class="clearfix"> </div>

        </div>
        <div class="event-grids">
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/7.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>贴  春  联</h2>
                </div>
                <p class="quod">过年家家都要贴对子（春联），春联也叫门对、春贴、对联、对子、桃符等。“门心”贴于门板上端中心部位；
                    “框对”贴于左右两个门框上；“横披”贴于门媚的横木上；“春条”根据不同的内容，贴于相应的地方；“斗斤”也叫“门叶”，为正方菱形，
                    多贴在家具、影壁中。养猪的要在猪圈上贴上“肥猪满圈”，粮囤子上要贴上“粮食满仓”，马车和拖拉机上要贴上“出入平安”的字样。
                    贴春联时间是不固定的，一般是在农历二十九或者三十早上。 窗花不仅烘托了喜庆的节日气氛，也集装饰性、欣赏性和实用性于一体。</p>
            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/8.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>福倒（到）了</h2>
                </div>
                <p class="quod">每逢新春佳节，家家户户都要在屋门上、墙壁上贴上大大小小的“福”字。“福”字代表着“幸福”、“福气”、“福运”。
                    为了更充分地体现这种向往和祝愿，都将“福”字倒过来贴，表示“福倒（到）了”。民间还有将“福”字精描细做成各种图案的，
                    图案有寿星寿桃、鲤鱼跳龙门、五谷丰登、龙凤呈祥等。</p>

            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/9.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>贴  窗  花</h2>
                </div>
                <p class="quod">新春佳节时，东北地区的人们喜欢在窗户上贴上各种剪纸——窗花。不仅烘托了喜庆的节日气氛，而且也为人们带来了美的享受，
                    集装饰性、欣赏性和实用性于一体。当然在东北还有一种特别的窗花，那就是冰窗花。东北的冬天冷的又早又狠，早起拉开窗帘多有冰窗花挂满玻璃窗。
                    东北的冰窗花几乎没有重样的，每一次零下20多度寒潮来临，玻璃上总是生成千姿万态的冰窗花，遇周末可以猫在屋里即躲避冰地雪天寒风，
                    又可以悠闲欣赏冰窗花的神奇与诗意、象形与联想、纯洁与高雅、纯自然的鬼斧神工之美。如今随着楼房的平地而起，加之地热等供暖措施，
                    城市里已经越来越少见到了，不过乡村中还是会找到许多的。</p>

            </div>
            <div class="clearfix"> </div>

        </div>
        <div class="event-grids">
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/10.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>年  夜  饭</h2>
                </div>
                <p class="quod">东北人过年最为讲究的要数大年三十（除夕夜）的年夜饭了，这可能是年迈父母一年最大的盼头。
                    家人团圆，欢聚一堂，有说有笑。东北人非常重视年夜饭的质量，通常这顿饭必须包括所谓的“四大件儿”，这四样菜即鸡、鱼、排骨和肘子，
                    好像只要缺了其中一样，这顿饭就显得非常不“地道”、不“东北”。吃完年夜饭，开始吃冻梨、冻柿子。由于东北天气寒冷，
                    一些水果冻过之后，就另有一番滋味。最常见的是冰梨和冻柿子，最纯正的是冻秋梨。冻秋梨是将普通白梨冰冻变成乌黑色，
                    硬邦邦的，砸到地上，也不会有丝毫损伤。经过冰冻之后的秋梨酸甜可口，果汁充足。年夜饭后吃这种梨能解酒、解油腻。</p>
            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/11.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>年三十吃饺子</h2>
                </div>
                <p class="quod">大年三十晚上辞旧迎新，一定要吃饺子，在众多的饺子中只包上几只带有硬币的，谁吃到了这样的饺子就预示着在新的一年里会交好运，
                    有吉祥之意。饺子包好煮好，吃之前要放烟花鞭炮，这是孩子们最喜欢的节目了。之后初一、初五、十五的早晨饭前也要要放爆竹。
                    年夜饭吃完后孩子要给长辈拜年，给爸爸妈妈、爷爷奶奶、叔叔伯伯磕头，然后就是拿红包。</p>

            </div>
            <div class="col-md-4 event-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/custom/12.jpg" alt=" " class="img-responsive" />
                <div class="nobis">
                    <h2>三十不关灯、初一初二不扫地</h2>
                </div>
                <p class="quod">东北人在大年三十都要点长寿灯，彻夜通明。大年三十一直到正月十五元宵节，每家每户都要挂红灯笼，
                    到了晚上就要点亮灯笼，而且要点一宿，不能关灯，意味着益寿延年，香火不断。

                    在东北，上了年纪的老人都有这样一个说法，大年初一、初二这两天，不扫地，就是不愿将好运气、财气扫走。所以只有等着到了初三才可以扫地</p>

            </div>
            <div class="clearfix"> </div>

        </div>

    </div>
</div>
<!-- //events -->
<!-- footer -->
<div id="footer"></div>
<!-- //footer -->

</body>
<script src="js/bootstrap.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

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
</html>
