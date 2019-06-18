<?php
header("Content-type:text/html;charset=utf-8");
require "MySQLPDO.class.php";
require "Tools.php";
//接受用户提交的答案
$userAnswer=$_POST;
//Tools::log($userAnswer);
$id=$_GET["id"];
$data = Tools::getAll($id);
$sum = 0;
$i =0;
$count =array();
foreach ($userAnswer as $k=>$v) {
    switch ($k) {
        case "binary":
            for ($i = 0; $i < count($v); $i++) {
                $count[$k][$i]["name"] = "判断题";
                if ($v[$i] == $data['datas']['binary'][$i]['answer']) {
                    $sum += $data['score']['binary'];
                    $count[$k][$i]["answer"] = "对";
                    $count[$k][$i]["score"] = $data['score']['binary'];

                } else {
                    $count[$k][$i]["score"] = "0";
                    $count[$k][$i]["answer"] = "错";
                }
            }
            break;
        case "single":
            for ($i = 0; $i < count($v); $i++) {
                $count[$k][$i]["name"] = "单选题";
                if ($v[$i] == $data['datas']['single'][$i]['answer']) {
                    $sum += $data['score']['single'];
                    $count[$k][$i]["answer"] = "对";
                    $count[$k][$i]["score"] = $data['score']['single'];
                } else {
                    $count[$k][$i]["score"] = "0";
                    $count[$k][$i]["answer"] = "错";
                }
            }
            break;
        case "multiple":
            for ($i = 0; $i < count($v); $i++) {
                $count[$k][$i]["name"] = "多选题";
                if ($v[$i] == $data['datas']['multiple'][$i]['answer']) {
                    $sum += $data['score']['multiple'];
                    $count[$k][$i]["answer"] = "对";
                    $count[$k][$i]["score"] = $data['score']['multiple'];
                } else {
                    $count[$k][$i]["score"] = "0";
                    $count[$k][$i]["answer"] = "错";
                }
            }
            break;
        case "fill":
            for ($i = 0; $i < count($v); $i++) {
                $count[$k][$i]["name"] = "填空题";
                if ($v[$i] == $data['datas']['fill'][$i]['answer']) {
                    $sum += $data['score']['fill'];
                    $count[$k][$i]["answer"] = "对";
                    $count[$k][$i]["score"] = $data['score']['fill'];
                } else {
                    $count[$k][$i]["score"] = "0";
                    $count[$k][$i]["answer"] = "错";
                }
            }
            break;
    }
}
//echo "<pre>";
//var_dump($count);
require "view/total.html";
?>