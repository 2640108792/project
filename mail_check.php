<?php
include "conn.php";
 $uname=$_POST['uname'];   //取INPUT name属性
 $uemail=$_POST['uemail'];
 $utelephone=$_POST['utelephone'];
 $utext=$_POST['utext'];
 $types='0';
$sql="insert into mess(user_account,uemail,telephone,utext,types) values ('$uname','$uemail','$utelephone','$utext','$types')";
$mysql=mysql_query($sql);
if($mysql){
    echo "<script>alert('留言上传成功!');history.go(-1);</script>";
}
else
{
    echo "<script>alert('留言上传失败!');history.go(-1);</script>";
}