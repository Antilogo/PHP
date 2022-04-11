<?php
  $n = 101;
  switch ($n) {
    case $n>100 && $n <= 200:
        echo "Giá tiền sẽ là 600d/KW";
      break;
    case $n>200 && $n <= 300:
        echo "Giá tiền sẽ là 750d/KW";
      break;
    case $n>300 && $n <= 500:
        echo "Giá tiền sẽ là 900d/KW";
      break;
    case $n>500 && $n <= 1000:
        echo "Giá tiền sẽ là 1000d/KW";
      break;
    case $n>1000:
        echo "Giá tiền sẽ là 1200d/KW";
      break;
    default:
      echo "Giá tiền sẽ là 450d/KW";
  }
?>