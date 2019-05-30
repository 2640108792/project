<?php
include "background/config.php";
session_start();
$account=$_SESSION["account"];
$utext=$_POST['utext'];
$types='1';

$sql1="select telephone,email from t_users where user_account='$account'";//头像
$smt1=$pdo->prepare($sql1);
$smt1->execute();
$row1=$smt1->fetch();
$email=$row1['email'];
$telephone=$row1['telephone'];

$sql="insert into mess(user_account,telephone,uemail,utext,types) values ('$account','$telephone','$email','$utext','$types')";
$smt=$pdo->prepare($sql);//预编译
$smt->execute();//执行语句

if($smt){

//echo "<script>alert('插入成功!');location='mail.html';</script>";
    echo "<script>alert('留言上传成功!');history.back();</script>";


}
else
{
    echo "<script>alert('留言上传失败!');history.go(-1);</script>";
}