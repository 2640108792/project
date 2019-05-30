<?php
include "config.php";

$userName = $_GET['user_account'];
$userTelephone = $_GET['telephone'];
$userEmail = $_GET['email'];
$userText = $_GET['text'];
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
$sql="INSERT INTO mess (user_account,uemail,telephone,utext,types) VALUES ('$userName','$userEmail','$userTelephone','$userText','2')";
$my= $pdo->exec($sql);
if($my){
    exit(json_encode(array('code'=>'1','msg'=>'1')));
}else{
    exit(json_encode(array('code'=>'0','msg'=>'0')));
}