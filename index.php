<?php
header("Content-type:text/html;charset=utf-8");
require "MySQLPDO.class.php";
require "Tools.php";
$db=MySQLPDO::getInstance();
$sql="SELECT * FROM `testlist`";
$data=$db->fetchAll($sql);
$info=array();
foreach($data as $f){
    {
        $test=array();
        $test["fileName"]=$f["id"];
        $test["title"]=$f["title"];
        $test["time"]=$f["timeout"]/60;
        $test["score"]=$db->fetchRow("SELECT SUM(score) FROM test WHERE Tid=$f[id]")["SUM(score)"];
        array_push($info,$test);
    }
}
require "view/index.html"; //加载模板文件
?>