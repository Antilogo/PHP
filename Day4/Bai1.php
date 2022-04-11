<?php
  $str = "Write a function countWords(str) that takes any string of characters and finds the number of times each string occurs";

  function countWords($str) {
    $arr = [];
    $string = strtolower($str);
    $stringArr = explode(" ",$string);
    foreach ($stringArr as $item) {
      if(!isset($arr[$item])){
        $arr[$item] = 0;
      }
      
      if (in_array($item, $stringArr)) {
          $arr[$item] += 1;
          //$
      }
    }
    
    return $arr;
  }
  
  echo "<pre>";
  print_r(countWords($str));
  echo "</pre>";
?>


