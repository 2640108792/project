<?php
include "background/config.php";
session_start();
$account= $_SESSION["account"];
$name=$_POST['name'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$sex=$_POST['sex'];
$file="images/head/". $_FILES["file"]["name"];
$tupian=$_FILES['file']['tmp_name'];
$signature=$_POST['signature'];
if ($_FILES["file"]["name"]!='') {
    if (file_exists($file)) {
        $sql = "UPDATE t_users SET user_sex='$sex',user_name='$name',telephone='$telephone',email='$email',head='$file',signature='$signature'where user_account='$account'";
        $my = $pdo->exec($sql);
        echo "<script>alert('个人资料修改成功！ ');history.go(-1);</script>";
    } else {
        $sql = "UPDATE t_users SET user_sex='$sex',user_name='$name',telephone='$telephone',email='$email',head='$file',signature='$signature'where user_account='$account'";
        $my = $pdo->exec($sql);
        if (move_uploaded_file($tupian, iconv("UTF-8", "gb2312", $file)) == 'ture') {
            echo "<script>alert('个人资料修改成功！ ');history.go(-1);</script>";
        } else {
            echo "<script>alert('个人资料修改失败，可能是服务器打小差了.... ');history.go(-1);</script>";
        }

    }
}else{
    if (file_exists($file)) {
        $sql = "UPDATE t_users SET user_sex='$sex',user_name='$name',telephone='$telephone',email='$email',signature='$signature'where user_account='$account'";
        $my = $pdo->exec($sql);
        echo "<script>alert('个人资料修改成功！ ');history.go(-1);</script>";
    } else {
        $sql = "UPDATE t_users SET user_sex='$sex',user_name='$name',telephone='$telephone',email='$email',signature='$signature'where user_account='$account'";
        $my = $pdo->exec($sql);
        if (move_uploaded_file($tupian, iconv("UTF-8", "gb2312", $file)) == 'ture') {
            echo "<script>alert('个人资料修改成功！ ');history.go(-1);</script>";
        } else {
            echo "<script>alert('个人资料修改失败，可能是服务器打小差了.... ');history.go(-1);</script>";
        }

    }
}



?>