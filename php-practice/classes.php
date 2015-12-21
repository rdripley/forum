<?php

class Automobile {
  private $make;
  private $model;

  public function setMake($make) {
    if (!is_string($make)) {
      throw new Exception('The make must be a string');
    }

    $this->make = $make;
  }

  public function setModel($model) {
    $this->model = $model;
  }

  public function getMake() {
    return $this->make;
  }

  public function getModel() {
    return $this->model;
  }

  public function drive() {
    echo 'Speeding down the highway!';
  }

  public function drinkAndDrive() {
    if ($this->make === 'Tesla') {
      echo 'Almost got in a wreck -- not safe man!';
    } else {
      echo 'Swerving on the highway -- uh oh, you got a DUI.';
    }

    echo PHP_EOL;
  }
}

$myCar = new Automobile();

class Person {
  private $firstName;
  private $lastName;
  private $age;

  public function __construct($first, $last, $years) {
    $this->firstName = $first;
    $this->lastName = $last;
    $this->age = $years;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function getAge() {
    return $this->age;
  }

  public function haveBirthDay() {
    $this->age++;
  }
}

$student = new Person('Rusty', 'Ripley', 25);
$age = $student->getAge();
echo $student->getAge().PHP_EOL;
$student->haveBirthDay();
echo $student->getAge();
