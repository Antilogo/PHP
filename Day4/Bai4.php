<?php
  function isPalindrome($str) {
    $arr = str_split($str);
    for($i = 0;$i < strlen($str)/2;$i++){
      if($arr[$i] != $arr[strlen($str)-$i-1]){
        return "No";
      }
    }
  }

  echo isPalindrome("122");




