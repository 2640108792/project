<?php
include 'background/config.php';
$uname=$_POST['username'];
$upass=$_POST['upwd'];
$reupass=$_POST['reupwd'];
$sex=$_POST['xingbie'];
$nicheng=$_POST['nicheng'];
$shouji=$_POST['shouji'];
$youxiang=$_POST['youxiang'];
if($uname==''||$upass==''||$reupass==''||$nicheng==''||$shouji==''||$youxiang=='')
{
    echo "<script>alert('信息不能为空！');history.go(-1);</script>";
}else{
  if($sex!="男"&&$sex!="女"){
      echo "<script>alert('请添加正确的性别  (¬､¬) (￢_￢)');history.go(-1);</script>";
  }else{
   if ( $upass==$reupass)
    {
        $sql = "insert into t_users(user_name,user_account,user_password,user_sex,user_right,telephone,email) values('$nicheng','$uname','$upass','$sex','普通用户','$shouji','$youxiang')";
        $smt=$pdo->prepare($sql);
        if ($row = $smt->execute()) {
            echo "<script>alert('用户添加成功'),location='login.html'</script>";
        } else {
            echo "<script>alert('用户未添加成功');history.go(-1);</script>";
        }
    }else{
       echo "<script>alert('密码不一致！');
           history.go(-1);</script>";
   }
  }
}
?>