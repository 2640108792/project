<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "错误:" . $_FILES["file"]["error"] . "<br/>";
  }
else
{
    echo "文件名:" . $_FILES["file"]["name"] ."<br/>" ;
  echo "类型: " . $_FILES["file"]["type"] . "<br/>";
  echo "大小: " . ($_FILES["file"]["size"] / 1024) . "<br/>";
  echo "存储位置:"  . $_FILES["file"]["tmp_name"];
  }
?>