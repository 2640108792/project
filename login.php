<?php
include "background/config.php";
session_start();   //  启动 Session
$userName=$_POST["username"];
$userPasswd=$_POST["password"];
$sql="select user_right from t_users where user_account='$userName' AND user_password='$userPasswd'";
$smt=$pdo->prepare($sql);//预编译
$smt->execute();//执行语句
$row=$smt->fetch();
if ($_SESSION["admin"] != true){
if ($row) {
    //  注册登陆成功的 admin 变量，并赋值 true
    $_SESSION["admin"] = true;
    $_SESSION["account"]=$userName;
    if ($row['user_right']=='普通用户'){
        echo "<script>alert('您已成功登陆');location.href='index.php'</script>";
    }else{
        echo "<script>location.href='background/index.php'</script>";
    }
} else {
    echo "<script>alert('用户名密码错误');history.go(-1);</script>";
}
}else{
    echo "<script>alert('请勿重复登陆！！！');history.go(-1);</script>";
}