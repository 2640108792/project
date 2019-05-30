<?php 
$pdo=new PDO('mysql:host=localhost;dbname=food','root','12345678');

$pdo->exec('set names utf8');

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
 ?>