<?php
include "config.php";
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
$account=$_SESSION["account"];
$sql="select head,user_name  from t_users where user_account='$account'";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
$head=$row['head'];
$nicheng=$row['user_name'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> 后台管理界面</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo" > 后台界面</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="../index.php">返回首页</a></li>
        </ul>
        <?php
        echo "   <ul class='layui-nav layui-layout-right'>
                        <li class='layui-nav-item'>
                            <a href='javascript:;''>
                                <img src='../$head' class='layui-nav-img'>
                                $nicheng 
                            </a>
                            <dl class='layui-nav-child'>
                                <dd><a href='userHome.php' target='view_frame' >基本资料</a></dd>
                            </dl>
                        </li>
                        <li class='layui-nav-item'><a href='loggedOut.php'>退了</a></li>
                    </ul>"
            ?>
    </div>
    <!--<iframe src="left.html"  frameborder="0" scrolling="no" height="800px" width="200px" ></iframe>-->
    <iframe src="content.html"  frameborder="0" scrolling="no"   height="700px" width="100%" ></iframe>
</div>
<script src="../layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>
