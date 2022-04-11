<?php

class Employee
{
  private $id;
  private $name;
  private $workingHourPeerDay = 8;
  private $hourlyRate = 15;
  private $totalLeaveTaken;
  private $workingDays;

  public function __construct($id, $name, $totalLeaveTaken, $workingDays)
  {
    $this->id = $id;
    $this->name = $name;
    $this->totalLeaveTaken = $totalLeaveTaken;
    $this->workingDays = $workingDays;
  }

  public function __set($name, $value)
  {
    if (property_exists($this, $name)) {
      $this->$name = $value;
    }
  }

  public function __get($name)
  {
    return $this->$name;
  }

  public function getSalaryAmount($totalDays)
  {
    return ($totalDays - $this->totalLeaveTaken) * $this->workingHourPeerDay * $this->hourlyRate;
  }

  public function showInfo($totalDays)
  {
    return $this->name . " has worked for " . $this->workingDays . " and taken " . $this->totalLeaveTaken . " leaves, " . $this->name . " salary is " . $this->getSalaryAmount($totalDays);
  }
}

$employee = new Employee(1, 'Nguyen Van Hung', 4, 16);
echo $employee->showInfo(20);
