<?php
  $str = 'rayy@example.com';
  for($x=0;$x<strlen($str);$x++){
    if($str[$x]==='@'){
      break;
    }
    $res .= $str[$x];
  }
  echo $res;

?>