<?php
include "background/config.php";
session_start();
$account= $_SESSION["account"];
$sql="SELECT user_name,telephone,email,user_sex,signature,head FROM t_users where user_account='$account'";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
$username=$row['user_name'];
$telephone=$row['telephone'];
$email=$row['email'];
$sex=$row['user_sex'];
$signature=$row['signature'];
$head=$row['head'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人资料</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="layui/css/layui.css" >
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <style type="text/css">
        #typediv{
            width: 500px;
            height: 850px;
            margin:  0 auto;
        }
    </style>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<script src="layui/layui.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>

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

<div id="typediv">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>个人资料修改</legend>
    </fieldset>

    <form class="layui-form" action="updateUserHome.php" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label class="layui-form-label">个人  头像</label>
            <div class="layui-input-block">
                <img src="<?php echo"$head"?>" style="width: 90px; height: auto" >
                <input name="file" type="file" id="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵称</label>
            <div class="layui-input-block">
                <input type="text" name="name"   placeholder="请输入昵称" autocomplete="off" class="layui-input" value="<?php echo $username;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-block">
                <input type="text" name="telephone" placeholder="请输入手机号"  class="layui-input" value="<?php echo $telephone;?>">
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" name="email"  placeholder="请输入密码" autocomplete="off" class="layui-input" value="<?php echo $email;?>">
            </div>

        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <?php
                if ($sex=='男'){
                 echo "  <input type='radio' name='sex' value='男' title='男' checked>";
                 echo "  <input type='radio' name='sex' value='女' title='女' >";
                }else{
                    echo "  <input type='radio' name='sex' value='男' title='男' >";
                    echo "  <input type='radio' name='sex' value='女' title='女' checked>";
                }
                ?>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">个性 签名</label>
            <div class="layui-input-block">
                <textarea name="signature" placeholder="请输入内容" class="layui-textarea" ><?php echo "$signature"?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" >立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;
    });
</script>
<script>

</script>
</body>

</html>