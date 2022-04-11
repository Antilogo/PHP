<?php

class Bank
{
  private $accNo;
  private $name;
  private $balance;

  public function __construct($accNo, $name, $balance)
  {
    $this->accNo = $accNo;
    $this->name = $name;
    $this->balance = $balance;
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
  public function depositAmount($amount)
  {
    return $this->balance = ($this->balance + $amount);
  }

  public function deductAmount($amount)
  {
    if ($this->balance <= 0) {
      return "No balance in account";
    }
    if ($this->balance < $amount) {
      return "Request amount is greater than balance";
    }
    return $this->balance =  $this->balance - $amount;
  }

  public function checkBalance()
  {
    return $this->balance;
  }
}

$bank = new Bank(1, 'Nguyen Van Hung', 30);
echo "So tien ban dau: " . $bank->checkBalance() . "</br>";

$nap = 60;
echo "Nap:" . $nap . "</br>";
echo "So tien sau khi nap:" . $bank->depositAmount($nap) . "</br>";

$rut = 10;
echo "Rut: " . $rut . "</br>";
echo "So tien sau khi rut:" . $bank->deductAmount($rut) . "</br>";
