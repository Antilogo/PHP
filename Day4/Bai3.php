<?php
  function daysInMonth($month){
    $day = cal_days_in_month(CAL_GREGORIAN, $month, 2021);
    return $day;
  }

  echo daysInMonth(2);
?>