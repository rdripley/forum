<?php

/**
 * SECTION 12 -- OBJECT ORIENTED PROGRAMMING -- INHERITANCE PART 2
 *
 * In this section, we'll talk about
 *   1. Protected Visibility
 *   2. Abstract Classes
 *
 */

/**
 * 12.1 PROTECTED PROPERTIES AND METHODS
 */

// PRIVATE properties and methods cannot be accessed by child classes.
// That's a problem -- what if we don't want to make something public,
// but we want the class's children to be able to access it?

// ENTER PROTECTED VISIBILITY!

// PROTECTED visibility means that it is private, but child classes can access it.

// Take these parent and child classes for example
class FooParent {
  protected $bar = 'The value of bar!';

  protected function baz() {
    echo 'baz called'.PHP_EOL;
  }
}

class FooChild extends FooParent {
  public function callBaz() {
    $this->baz();
  }

  public function getBar() {
    return $this->bar;
  }
}

$fooChildObject = new FooChild();
$fooChildObject->callBaz();
echo $fooChildObject->getBar();
echo PHP_EOL;

// Notice I was able to access the $bar property and the baz() method inside FooChild, since it was protected.

/**
 * PROBLEM 1
 *
 * Temporarily change the FooParent class to make $bar and baz() private instead of protected.
 * What happens, and why?
 *
 * ANSWER HERE: it returns this error "Fatal error: Call to private method FooParent::baz() from context 'FooChild'". Because as you said, child classes can't access private properties.
 */

/**
 * PROBLEM 2
 *
 * Use your imagination and come up with a parent and child class.
 * Give the parent class some protected properties and methods.
 * In the child class, access the parent's protected properties and methods.
 */

class BlackSheep {
  protected $sheeple = 'People but sheep (iz a joke)';

  protected function punchLine() {
    echo 'Imagine all the sheeple!' . PHP_EOL;
  }
}

class LittleSheeple extends BlackSheep {
  public function callPunchLine() {
    $this->punchLine();
  }

  public function getSheeple() {
    return $this->sheeple;
  }
}

$littleSheepleObject = new LittleSheeple();
$littleSheepleObject->callPunchLine();
$littleSheepleObject->getSheeple();
echo PHP_EOL;
/**
 * 12.2 ABSTRACT CLASSES
 */

// An abstract class cannot be instantiated. In other words, you can't make an object out of it.

// The point of an abstract class is to put shared code in it, knowing this class will
// have child classes that you'll use to make objects.

// We use the `abstract` keyword to make an abstract class:

abstract class SomeAbstractClass {
  public function someMethod() {
    echo 'Hey!'.PHP_EOL;
  }
}

/**
 * PROBLEM 3
 *
 * Try to make a new SomeAbstractClass object and see what happens.
 * Explain in your own words, why did that happen?
 *
 * ANSWER HERE: When I try to call someMethod I get the error "Fatal error: Cannot instantiate abstract class SomeAbstractClass". The reason is
 * as you stated I can't "instantiate" the someMethod class. So that means I can't call it using echo $someAbstractObject->someMethod();
 */

/*$someAbstractObject = new SomeAbstractClass();
*
*echo $someAbstractObject->someMethod();*/
// The SomeAbstractClass is useless without any children. Let's make a child class:
class NotAbstract extends SomeAbstractClass {
  public function someOtherMethod() {
    echo 'Hey again!'.PHP_EOL;
  }
}

/**
 * PROBLEM 4
 *
 * Make a new NotAbstract object and try to run both the someMethod() and someOtherMethod() methods.
 * Did it work without breaking? Explain, why or why not did it work?
 *
 * ANSWER HERE: I could use $someAbstractObject (my created variable) to call both the abstract Parent class AND the child class.
 */

$notAbstractObject = new NotAbstract();

echo $notAbstractObject->someOtherMethod();

echo $notAbstractObject->someMethod();

// Sometimes it makes sense to allow someone to make objects out of a parent class.
// But when it doesn't, we make it abstract.

// Here's an example:
abstract class Dice {
  protected $sides; // New keyword here -- protected. Ignore this for a minute...

  public function roll() {
    return rand(1, $this->sides);
  }
}

class SixSidedDie extends Dice {
  protected $sides = 6; // Notice we can override properties from any ancestor class
}

class TwelveSidedDie extends Dice {
  protected $sides = 12;
}

// Let's try out these classes!

$rpgDie = new TwelveSidedDie();
echo $rpgDie->roll(); // Will always return between 1 and 12
echo PHP_EOL;

$yahtzeeDie = new SixSidedDie();
echo $yahtzeeDie->roll(); // Will always return between 1 and 6
echo PHP_EOL;

/**
 * PROBLEM 5
 *
 * Use your imagination to come up with a parent class and two child classes of the parent.
 * Make the parent class abstract, and include some shared code (either properties or methods)
 * in the parent that is used by both children.
 */

abstract class Heroes {
  public $hero;
  
  public function chooseHero() {
    echo 'You chose a ' . $this->hero;
  }
}

class SupportOnly extends Heroes {
  public $hero = 'Support';
}

class SpecialistOnly extends Heroes {
  public $hero = 'Specialist';
}

$heroSelect = new SupportOnly();
echo $heroSelect->chooseHero();
echo PHP_EOL;

$althero = new SpecialistOnly();
echo $althero->chooseHero();
echo PHP_EOL;
/**
 * PROBLEM 6
 *
 * *WARNING -- ADVANCED*
 *
 * Copy and paste below your HatOfNames class from section9.php
 *
 * Modify this code and split it up into 3 classes:
 *   - HatOfNames -- this will be an abstract parent class which contains all shared code
 *   - LockedHatOfNames -- this will be a HatOfNames where the winner is locked after picking one
 *   - ReusableHatOfNames -- this will be a HatOfNames where the winner is different every time pickWinner() is called
 *
 * HINT: What shared methods or properties need to be in the parent HatOfNames class?
 * HINT: What visibility do these shared methods and properties need? (public, private, or protected?)
 */

abstract class HatOfNames {
  const MODE_RETAIN_WINNER = 1;
  const MODE_NEW_WINNER_EVERY_TIME = 2;

  protected $names = [];
  protected $winner;
  protected $mode;

  public function __construct($mode) {
    $this->mode = $mode;
  }

  public function addName($name) {
    $this->names[] = $name;
  }
}

class LockedHatOfNames extends HatOfNames {
  public function pickWinner() {
    if ($this->mode === (self::MODE_RETAIN_WINNER && $this->winner === NULL)) {
      $key = rand(0, count($this->names) -1);
      $this->winner = $this->names[$key];
    }

    return $this->winner;
  }
}

class ReusableHatOfNames extends HatOfNames {
  public function pickWinner() {
    if ($this->mode === self::MODE_NEW_WINNER_EVERY_TIME) {
      $key = rand(0, count($this->names) -1);
      $this->winner = $this->names[$key];
    }

    return $this->winner;
  }
}

$runPickWinner = new LockedHatOfNames(LockedHatOfNames::MODE_RETAIN_WINNER);

$runPickWinner->addName('Russ');
$runPickWinner->addName('John');
$runPickWinner->addName('Jacob');
$runPickWinner->addName('JingleHiemer');

echo $runPickWinner->pickWinner();
echo $runPickWinner->pickWinner();
echo $runPickWinner->pickWinner();
echo $runPickWinner->pickWinner();