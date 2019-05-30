<?php
include "conn.php";
$dizhi="images/natural/".$_FILES["file"]["name"];
$tupian=$_FILES['file']['tmp_name'];
if ($_FILES["file"]["error"] > 0)
{
    echo "错误: " . $_FILES["file"]["error"] . "<br/>";
}
else
{
    if (file_exists("images/natural/".$_FILES["file"]["name"]))
{
    echo $_FILES["file"]["name"] . "文件已经存在. ";
}
else
{
    move_uploaded_file($tupian,$dizhi);
    $sql="insert into img(src) values ('$dizhi')";
    if($row=mysql_query($sql)) {
        echo "<script>alert('插入成功!');history.back();</script>";
    }
}
}
?>

