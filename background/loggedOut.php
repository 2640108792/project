<?php
session_start();
//  这种方法是将原来注册的某个变量销毁
unset($_SESSION['admin']);
//  这种方法是销毁整个 Session 文件
session_destroy();
echo "<script>alert('退出成功');location.href='../index.php'</script>";