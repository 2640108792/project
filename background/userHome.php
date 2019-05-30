<?php
include "config.php";
session_start();
$account= $_SESSION["account"];
$sql="SELECT user_name,telephone,email,user_sex,signature,head FROM t_users where user_account='$account'";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
$username=$row['user_name'];
$telephone=$row['telephone'];
$email=$row['email'];
$sex=$row['user_sex'];
$signature=$row['signature'];
$head=$row['head'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人资料</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../layui/css/layui.css" >
    <style type="text/css">
        #typediv{
            width: 500px;
            height: 850px;
            margin:  0 auto;
        }
    </style>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<script src="../layui/layui.js" type="text/javascript"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>

<div id="typediv">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>个人资料修改</legend>
    </fieldset>

    <form class="layui-form" action="updateUserHome.php" method="post" enctype="multipart/form-data">
        <div class="layui-form-item">
            <label class="layui-form-label">个人  头像</label>
            <div class="layui-input-block">
                <img src="../<?php echo"$head"?>" style="width: 90px; height: auto" >
                <input name="file" type="file" id="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵称</label>
            <div class="layui-input-block">
                <input type="text" name="name"   placeholder="请输入昵称" autocomplete="off" class="layui-input" value="<?php echo $username;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-block">
                <input type="text" name="telephone" placeholder="请输入手机号"  class="layui-input" value="<?php echo $telephone;?>">
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" name="email"  placeholder="请输入密码" autocomplete="off" class="layui-input" value="<?php echo $email;?>">
            </div>

        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <?php
                if ($sex=='男'){
                    echo "  <input type='radio' name='sex' value='男' title='男' checked>";
                    echo "  <input type='radio' name='sex' value='女' title='女' >";
                }else{
                    echo "  <input type='radio' name='sex' value='男' title='男' >";
                    echo "  <input type='radio' name='sex' value='女' title='女' checked>";
                }
                ?>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">个性 签名</label>
            <div class="layui-input-block">
                <textarea name="signature" placeholder="请输入内容" class="layui-textarea" ><?php echo "$signature"?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" >立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;
    });
</script>
<script>

</script>
</body>

</html>