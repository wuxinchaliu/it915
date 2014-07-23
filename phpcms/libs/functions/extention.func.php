<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */
/**
 * @param $number
 * @return string
 * 大小写转换
 */
function toDaXie($number){
    $number=substr($number,0,2);
    $arr=array("零","一","二","三","四","五","六","七","八","九");
    if(strlen($number)==1){
        $result=$arr[$number];
    }else{
        if($number==10){
            $result="十";
        }else{
            if($number<20){
                $result="十";
            }else{
                $result=$arr[substr($number,0,1)]."十";
            }
            if(substr($number,1,1)!="0"){
                $result.=$arr[substr($number,1,1)];
            }
        }
    }
    return $result;
}
?>