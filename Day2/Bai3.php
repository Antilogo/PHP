<?php
  $x = 0;
  $sum = 0;

  while($x < 100){
    $sum += $x;
    $x++;
  }
  echo $sum;
?>
<?php
    $x = 20;
    while($x >= 20 && $x <= 50){
      if($x % 3 == 0){
        echo $x ,"<br>";
      }
      $x++;
    }
?>