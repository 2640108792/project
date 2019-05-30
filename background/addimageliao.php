<?php
include "config.php";
$miaoshu=$_POST['text'];
$dizhi1="images/liao/".$_FILES["file"]["name"];
$dizhi2="../images/liao/".$_FILES["file"]["name"];
$tupian=$_FILES['file']['tmp_name'];
if ($_FILES["file"]["error"] > 0)
{
    echo "错误: " . $_FILES["file"]["error"] . "<br/>";
}
else
{
    echo "文件名:"  . $_FILES["file"]["name"] . "<br/>";
    echo "类型:"  . $_FILES["file"]["type"] . "<br/>";
    echo "大小:  ". ($_FILES["file"]["size"] / 1024) . "<br/>";
}
if (file_exists("../images/liao/" . $_FILES["file"]["name"]))
{       $sql="insert into lnimg (src,user_text) VALUES ('$dizhi1','$miaoshu')";
    $my= $pdo->exec($sql);
    echo "<script>alert('文件已经存在！ ');history.go(-1);</script>";
}
else
{   $sql="insert into lnimg (src,user_text) VALUES ('$dizhi1','$miaoshu')";
    $my= $pdo->exec($sql);
    move_uploaded_file($tupian,$dizhi2);
    echo "<script>alert('文件上传成功！ ');history.go(-1);</script>";
}


?>