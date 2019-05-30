<?php
include "background/config.php";
session_start();
$findUserId= $_SESSION["uid"];
$findUserName=$_POST["findUserName"];
$findUserPwd1=$_POST["findUserPwd1"];
$findUserPwd2=$_POST["findUserPwd2"];
if ($findUserPwd1===$findUserPwd2){
    $sql="update t_users set user_account='$findUserName',user_password='$findUserPwd1'where user_id='$findUserId'";
    $my= $pdo->exec($sql);
  if($my){
        echo"<script>alert('密码修改成功，请牢记！');location.href='loginRegister.php'</script>";
    }else{
        echo "<script>alert('密码修改失败，数据库走失了Σ(°△ °|||)︴');history.go(-1);</script>";
    }
}else{
    echo "<script>alert('两次密码输入不一致！');history.go(-1)</script>";
}

