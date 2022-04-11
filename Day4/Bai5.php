<?php
  $values = 123;
  
  function reverse($value) {

    $sum = 0;
    $res = "";
    die($value);
    if(is_numeric($value)){

      while($value > 0){
        $tmp = $value %10;
        $sum = $sum *10 + $tmp;
        $value /= 10;
      }

      return $sum;
    }else{
      $arr = str_split($value);
      for($i = strlen($value) - 1;$i >= 0;$i--){
        $res .= $arr[$i];
      }
      return $res;
    }
  }
  
  echo reverse(123);
