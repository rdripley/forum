<?php

/**
 * SECTION 12 -- ADVANCED OBJECT ORIENTED PROGRAMMING -- AN INTRODUCTION
 *
 * We're not going to delve deep into these topics. The point of this section
 * is simply to make you aware of some OOP principles. You can get more familiar
 * with them later when they matter.
 *
 * In this section we're going to look at the following language features:
 *   1. Class Constants
 *   2. Overriding functions
 *   3. Typehinting
 *   4. Interfaces
 *
 * It's worth noting that these aren't just features of PHP. Most of these
 * are common to all Object Oriented languages. So you're learning PHP,
 * but you're also learning a lot about all the other Object Oriented languages
 * at the same time. (Such as C++ and Java.)
 *
 * Make sure to glance at the documentation where I include links.
 */

// Defining a separator for pretty output
define('SEPARATOR', "\n\n=======\n\n");
echo PHP_EOL;

/**
 * 12.1 CLASS CONSTANTS
 *
 * http://php.net/manual/en/language.oop5.constants.php
 */

// Just like we created constants with define(), a class itself can have a constant:
class Dice {
  const SIDES = 6; // Notice the keyword const here

  public function roll() {
    return rand(1, self::SIDES); // Notice the syntax -- self::NAME_OF_CONSTANT
  }
}

class TwelveSidedDie extends Dice {
  const SIDES = 12; // Notice we can override constants just like we can override properties
}

$rpgDie = new TwelveSidedDie();
echo $rpgDie->roll();
echo SEPARATOR;

/**
 * PROBLEM 1
 *
 * Create a class called ErrorOutputter that has a function outputError($error)
 * that prints out the error with a PREFIX prepended to (at the beginning of) the error.
 *
 * Let the PREFIX be "Error: " and specify it in a class constant called PREFIX.
 */

// Note that class constants can be references without ever making an object out of the class.
// You do this using the :: operator like this:
echo TwelveSidedDie::SIDES; // Echos out 12 to the screen
echo SEPARATOR;

/**
 * PROBLEM 2
 *
 * Echo out the PREFIX from your ErrorOutputter class
 */

/**
 * 12.2 OVERRIDING FUNCTIONS
 */

// So far we've seen that CHILD CLASSES can override the PROPERTIES and CONSTANTS of their
// ancestor classes:
class GrandParentClass {
  const FOO = 'foo1';
  public $bar = 'bar1';
}

class ParentClass extends GrandParentClass {
  const FOO = 'foo2';
  public $bar = 'bar2';
}

class ChildClass extends ParentClass {
  const FOO = 'foo3';
  public $bar = 'bar3';
}

// Proving our point:
echo GrandParentClass::FOO . ParentClass::FOO . ChildClass::FOO; // Outputs foo1foo2foo3
echo SEPARATOR;

$gParent = new GrandParentClass();
$parent = new ParentClass();
$child = new ChildClass();

echo $gParent->bar . $parent->bar . $child->bar; // Outputs bar1bar2bar3
echo SEPARATOR;

// Stop here if you don't fully understand and send me any questions you have

// Well, just like we can override PROPERTIES and CONSTANTS, we can also override METHODS (functions)
// of ancestor classes:
class Ball {
  function roll() {
    echo 'The ball is rolling';
  }
}

class BeachBall extends Ball {
  function roll() {
    echo 'The beach ball is rolling, but it\'s slowing quickly';
  }
}

class BowlingBall extends Ball {
  function roll() {
    echo 'The bowling ball is rolling... it keeps going!';
  }
}

// Proving our point:
$ball = new Ball();
$beachBall = new BeachBall();
$bowlingBall = new BowlingBall();

$ball->roll();
echo SEPARATOR;
$beachBall->roll();
echo SEPARATOR;
$bowlingBall->roll();
echo SEPARATOR;

// Vocabulary note: Remember, Ball would be called a "parent" class and
// BeachBall and Bowling ball would be called "child" classes of Ball

/**
 * PROBLEM 3
 *
 * Use your creativity and think of some real life objects that can be represented
 * with classes using inheritance (with parent and child classes)
 *
 * Create a function in the parent class and then override it in the child classes
 */

/**
 * 12.3 TYPEHINTING
 */

// Do you remember how we could force a function to only accept an array for a certain parameter?
function takeArray(array $foo) {
  // Do something with foo
}

// This works:
takeArray([1, 2, 3]);
// This wouldn't:
// takeArray(123);

// Well, that is called "typehinting"

// In PHP you cannot typehint "primitive" types (integers, floats, booleans, strings)

// This wouldn't work:
function takePrimitives(int $foo, float $bar, bool $baz, string $qux) {
}

/**
 * PROBLEM 4
 *
 * Try to call the takePrimitives function and pass it an int, float, bool, and string.
 * What happens?
 *
 * ANSWER:
 */


// Why does this happen?
// It happens because when you say int and float and bool and string, PHP assumes you are
// referring to names of CLASSES.

/**
 * ENTER CLASS TYPEHINTING
 */

// Just like we can typehint with arrays, we can also typehint with any class:
function takeBall(Ball $ball) {
  // Do something
}

// These will all work:
takeBall(new Ball());
$beachBall = new BeachBall();
takeBall($beachBall);

// These would not work:
// takeBall(1);
// takeBall('foo');
// takeBall(1.234);
// takeBall(false);

// Notice that takeBall did not fail when we passed it a BeachBall object.
// This is because of INHERITANCE -- a BeachBall *IS* a Ball. It's just a more
// specific type of ball. Or said another way, it is a child of Ball.

// The following statements would be true:
// A BeachBall object is a BeachBall
// A BeachBall object is a Ball
// A ChildClass object (from above) is a ParentClass
// A ChildClass object (from above) is a GrandparentClass

/**
 * PROBLEM 5
 *
 * Using the classes you made from PROBLEM 3, make a function that takes
 * 2 parameters -- one of the parent class type and one of one of the child class
 * types -- and echos out something about it.
 */

/**
 * 12.4 INTERFACES
 */

// Just like a CLASS is a template for an OBJECT,
// an INTERFACE is a template for a CLASS

// Interfaces can specify 1 thing and 1 thing only about a class -- what functions it has.

// Here is an example interface:
interface Plant {
  public function grow();
  public function water($gallons);
}

// Notice that just like in a class, you specify the function name and parameters
// but you DON'T specify the function body.

// Now we can create some classes that IMPLEMENT the Plant INTERFACE
class Grass implements Plant {
  public function grow() {
    echo 'The grass is growing';
  }

  public function water($gallons) {
    echo 'You watered the grass with ' . $gallons . ' gallons';
  }
}

class Tree implements Plant {
  public function grow() {
    echo 'Reaching toward the sky!';
  }

  public function water($gallons) {
    echo 'Come on... I need more than that!';
  }
}

/**
 * PROBLEM 6
 *
 * Try removing $gallons from `public function water($gallons)` above.
 * What happens?
 */

// So... why use interfaces?
//   1. Because you can guarantee that all classes that follow an interface have specific functions available.
//   2. Because you can typehint with interfaces just like classes!

// Check out the typehinting:
function growPlant(Plant $plant) {
  $plant->grow();
}

$rye = new Grass();
$birch = new Tree();

growPlant($rye);
growPlant($birch);
