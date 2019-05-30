<?php
include "background/config.php";

$dizhi="images/natural/".$_FILES["file"]["name"];
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
if (file_exists("images/natural/" . $_FILES["file"]["name"]))
{
    echo $_FILES["file"]["name"] . "文件已经存在. ";
    }
else
{   $sql="insert into img (src) VALUES ('$dizhi')";
    $my= $pdo->exec($sql);
    move_uploaded_file($tupian,$dizhi);
    echo "文件已经被存储到: " . "images/natural/" . $_FILES["file"]["name"];
    }


?>