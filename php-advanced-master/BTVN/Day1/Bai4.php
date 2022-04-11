<?php
class Animal
{
  private $name;
  private $hunt;

  public function __construct($name, $hunt)
  {
    $this->name = $name;
    $this->hunt = $hunt;
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

  public function doesHunting()
  {
    if ($this->hunt) {
      return $this->name . " co san moi";
    }
    return $this->name . " ko san moi";
  }
}

interface Action
{
  public function makeSound();
}

class Dog extends Animal implements Action
{
  public function __construct($name, $hunt)
  {
    parent::__construct($name, $hunt);
  }

  public function makeSound()
  {
    return "Woff,woff";
  }
}

class Tiger extends Animal implements Action
{
  public function __construct($name, $hunt)
  {
    parent::__construct($name, $hunt);
  }

  public function makeSound()
  {
    return "Grrr,grrr";
  }
}

$dog = new Dog("siba", false);
echo $dog->makeSound() . "---" . $dog->doesHunting() . "</br>";

$tiger = new Tiger("lion", true);
echo $tiger->makeSound() . "---" . $tiger->doesHunting() . "</br>";
