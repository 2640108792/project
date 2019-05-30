<?php
include "config.php";
$userID = $_GET['user_id'];
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
$sql="UPDATE t_users SET  user_name = '$userName', user_account = '$userAccount', user_password = '$userPassword', user_sex = '$userSex',user_right = '$userRight',telephone = '$userTelephone', email = '$userEmail' WHERE user_id= '$userID';";
$my= $pdo->exec($sql);
if($my){
    exit(json_encode(array('code'=>'1','msg'=>'1')));
}else{
    exit(json_encode(array('code'=>'0','msg'=>'0')));
}