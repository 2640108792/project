<?php
include "config.php";

   //   数据库位于本地:localhost  数据库名:test  管理员账户名:root  密码:123

$sql="select * from t_users";
//<!--去查存数据库-->
$smt=$pdo->prepare($sql);
$smt->execute();
$rows=$smt->fetchAll();
//<!--将数据全部抓取出来    PDO::FETCH_ASSOC 代表关联数组  PDO::FETCH_NUM 索引数组 PDO::FETCH_OBJ 对象数组 PDO::FETCH_BOTH 混合数组-->

echo"<pre>";
print_r($rows);
echo"</pre>";
?>