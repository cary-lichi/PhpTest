<?php
header("Content-type:text/html;charset=utf-8");
//包含连接数据库的类
require "MySQLPDO.class.php";
//包含工具类
require_once "Tools.php";
//接收GET的试卷id
$id=$_GET["id"];
//通过传过来的试卷id获取到相应的数据
$data = Tools::getAll($id);
if($data)
{
    require "view/test.html";
}
else
{
    require "view/notFound.html";
}

//包含视图模块

?>