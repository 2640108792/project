<?php
//测试php是否可以拿到数据库中的数据
/*echo "44444";*/

//做个路由 action为url中的参数
$action = $_GET['action'];

switch($action) {
    case 'init_data_list':
        init_data_list();
        break;

    case 'del_row':
        del_row();
        break;

}

//查询方法
function init_data_list(){
    //测试 运行crud.html时是否可以获取到 下面这个字符串
    /*echo "46545465465456465";*/
    //查询表
    $sql = "select * from hljimg";
    $query = query_sql($sql);
    while($row = $query->fetch_assoc()){
        $data[] = $row;
    }
    $json = json_encode(array(
        "resultCode"=>200,
        "message"=>"查询成功！",
        "data"=>$data
    ),JSON_UNESCAPED_UNICODE);

    //转换成字符串JSON
    echo($json);
}


/**查询服务器中的数据
 * 1、连接数据库,参数分别为 服务器地址 / 用户名 / 密码 / 数据库名称
 * 2、返回一个包含参数列表的数组
 * 3、遍历$sqls这个数组，并把返回的值赋值给 $s
 * 4、执行一条mysql的查询语句
 * 5、关闭数据库
 * 6、返回执行后的数据
 */
function query_sql(){
    $mysqli = new mysqli("localhost", "root", "12345678", "food");
    $sqls = func_get_args();
    foreach($sqls as $s){
        $query = $mysqli->query($s);
    }
    $mysqli->close();
    return $query;
}
//删除方法
function del_row()
{
    //测试
    /*echo "ok!";*/

    //接收传回的参数
    $rowId = $_GET['rowId'];
    $sql = "delete from hljimg where id='$rowId'";

    if (query_sql($sql)) {
        echo "ok!";
    } else {
        echo "删除失败！";
    }
}




?>