<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16
 * Time: 16:25
 */
//这是一个高大上的工具类
class Tools
{
    public static function log($data)
    {
        echo "<pre>";
        var_dump($data);
            die();
    }
    public static function GetType($type)
    {
        $value="";
        switch($type)
        {
            case 1:
                $value="single";
                break;
            case 2:
                $value="binary";
                break;
            case 3:
                $value="multiple";
                break;
            case 4:
                $value="fill";
                break;
            default:
                break;
        }
        return $value;
    }
//    通过试卷id去获取数据库中的数据，并重新整合成视图层所用的数据然后返回
    public static function getSerial($type)
    {
        $value="";
        $type;
        switch($type)
        {
            case 0:
                $value="一";
                break;
            case 1:
                $value="二";
                break;
            case 2:
                $value="三";
                break;
            case 3:
                $value="四";
                break;
            case 4:
                $value="五";
                break;
            default:
                break;
        }
        $value=$value."、";
        return $value;
    }
    public static function getAll($id)
    {
        $sql="SELECT * FROM testlist WHERE id = $id";
//        var_dump($sql);
        $db=MySQLPDO::getInstance();
        $data=$db->fetchRow($sql);
        if(!$data) return;
//        获取到test中的Tid=id的试卷的题目类型

        $arr = explode(";" ,$data['testType']);
//        echo "<pre>";
//        var_dump($arr);
/*       定义四个数组，用于保存相应的数据
        $datas 包含了option、question、answer
        $score 每种题型的分数
        $count 每种题型的数量
        $array
*/
        $datas =array();
        $count =array();
        $score =array();
        $array = array();
        $name = array();
        for($i= 0;$i<count($arr);$i++) {
            $sql = "select count(Typeid) from `test` WHERE Tid = $id AND Typeid= $arr[$i]";
            $scores = "select * from `test` WHERE Tid = $id AND Typeid= $arr[$i]";
            $j = 0;
            $type=self::GetType($arr[$i]);
            $count[$type] = $db->fetchRow($sql)['count(Typeid)'];
            $value[$type] = $db->fetchAll($scores);
            $name[$type]=self::getSerial($i);
            foreach ($value[$type] as $v) {
                $datas[$type][$j]['question'] = $v['question'];
                $datas[$type][$j]['option'] = explode(";", $v['options']);
                $datas[$type][$j]['answer'] = $v['answer'];
                $j++;
            }
            $Sco = $value[$type][0]['score'];
            $score[$type] = $Sco;
            $array = array(
                'data'=>$data,
                'count'=>$count,
                'datas' =>$datas,
                'score'=>$score,
                'name'=>$name
            );
        }
//        Tools::log($datas);
        return $array;

    }

}