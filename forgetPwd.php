<?php
include "background/config.php";
session_start();
$findUserName=$_POST["findUserName"];
$findUserEmail=$_POST["findUserEmail"];
$findUserTelephone=$_POST["findUserTelephone"];
$sql="select user_id from t_users where user_account='$findUserName'and email='$findUserEmail'and telephone='$findUserTelephone'";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
$id=$row['user_id'];
$_SESSION["uid"]=$id;
if($row){
    echo"<script>location.href='findPwd.html'</script>";
}else{
    echo "<script>alert('验证信息不正确!');history.go(-1);</script>";
}
