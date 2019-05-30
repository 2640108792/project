<?php
include "config.php";
$userID = $_GET['user_id'];
$userName = $_GET['user_account'];
$userTelephone = $_GET['telephone'];
$userEmail = $_GET['email'];
$userText = $_GET['text'];

$sql="UPDATE mess SET  user_account = '$userName', uemail = '$userEmail',telephone = '$userTelephone',utext='$userText'  WHERE id= '$userID';";
$my= $pdo->exec($sql);
if($my){
    exit(json_encode(array('code'=>'1','msg'=>'1')));
}else{
    exit(json_encode(array('code'=>'0','msg'=>'0')));
}