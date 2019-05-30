<?php

function upload_img(){
    $file = request()->file('file'); // 获取上传的文件
    if($file==null){
        exit(json_encode(array('code'=>1,'msg'=>'未上传图片')));
    }
    // 获取文件后缀
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    // 判断文件是否合法
    if(!in_array($extension,array("gif","jpeg","jpg","png"))){
        exit(json_encode(array('code'=>1,'msg'=>'上传图片不合法')));
    }
    $info = $file->move(ROOT_PATH.'images'.DS.'natural'); // 移动文件到指定目录 没有则创建
    $img = '/uploads/'.$info->getSaveName();
    exit(json_encode(array('code'=>0,'msg'=>$img)));
}


