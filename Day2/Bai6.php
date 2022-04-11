<?php
  $n = 50;
  $res = '';
  for($x=1;$x<=$n;$x++){
    $res .= $x;
    if($x<50){
      $res .= '-';
    }
  }
  echo $res
?>