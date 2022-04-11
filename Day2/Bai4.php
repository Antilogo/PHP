<?php
  $a = 0;
  $sum = 0;
  for($x=0;$x<100;$x++){
    if($x<=50){
      $sum += $x;
    }else{
      break;
    }
  }
  echo($sum*$sum);
?>