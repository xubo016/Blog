<?php
/**
 * 二位数组去重复 
 */
 function arr_unique($arr2d){
  foreach($arr2d as $k => $v){
    $v = implode(',',$v);
    $temp[] = $v; 
  }
  $temp = array_unique($temp);
  foreach($temp as $k => $v){
    $temp[$k] = explode(',',$v);
  }
  $temp = array_slice($temp,0,10);
  return $temp;
 }

?>