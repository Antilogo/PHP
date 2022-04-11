<?php

  function arrayy($arr, $num){
    $res = [];
    for($i = 0;$i < count($arr);$i++){
      if($i % $num == 0){
        $res = [];
        continue;
      }
      $res = $arr[$i];
    }
  }

  $input = [1,2,3,4,5,6];
  print_r(arrayy($input, 2));