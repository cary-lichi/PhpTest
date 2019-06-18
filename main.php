<?php
//查找data下的所有PHP文件 返回一个数组 数组中保存的是文件名
$file=glob("data/*.php");
//var_dump($file);

//定义一个数组 保存读取的数据信息 后续把这个数组的信息显示到模板文件中
$info=array();
$i=0;
$score=0;
foreach($file as $f){
    //获取数据文件的文件名
    $pos=strrpos($f,"/");//查找最后一个/的位置
    $str=substr($f,$pos+1); //从最后一个/ 后面的位置截取到最后
    $str=str_replace(".php","",$str); //把.php 替换为空
//    echo $str;
    $data=require $f; // 加载数据库文件  注意数据库文件中有return语句 所以这个地方直接用变量接收数据
//    echo $data["title"];
//    echo $data["timeout"];
    $info[$i]["fileName"]=$str;
    $info[$i]["title"]=$data["title"];
    $info[$i]["time"]=$data["timeout"]/60;
    //累加分数
    foreach($data["data"] as $v){
        $score+=$v["score"];
    }
    $info[$i]["score"]=$score;
    $score=0;
    $i++;
}
//echo "<pre>";
//var_dump($info);
require "view/index.html"; //加载模板文件
?>