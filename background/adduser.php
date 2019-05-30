<?php
include "config.php";

$userName = $_GET['user_name'];
$userAccount = $_GET['user_account'];
$userPassword=$_GET['user_password'];
$userSex = $_GET['user_sex'];
$userRight = $_GET['user_right'];
$userTelephone = $_GET['telephone'];
$userEmail = $_GET['email'];
if ($userSex==1){
    $userSex=男;
}else{
    $userSex=女;
}
if ($userRight==1){
    $userRight=普通用户;
}else{
    $userRight=管理员;
}
$sql="INSERT INTO t_users (user_name,user_account,user_password,user_sex,user_right,telephone,email) VALUES ('$userName','$userAccount','$userPassword','$userSex','$userRight','$userTelephone','$userEmail')";
$my= $pdo->exec($sql);
if($my){
    exit(json_encode(array('code'=>'1','msg'=>'1')));
}else{
    exit(json_encode(array('code'=>'0','msg'=>'0')));
}