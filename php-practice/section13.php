<?php

/**
 * SECTION 13 -- ADVANCED OBJECT ORIENTED PROGRAMMING -- AN INTRODUCTION
 *
 * We're not going to delve deep into these topics. The point of this section
 * is simply to make you aware of some OOP principles. You can get more familiar
 * with them later when they matter.
 *
 * In this section we're going to look at the following language features:
 *   1. Class Constants
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
 * 13.1 CLASS CONSTANTS
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
  const SIDES = 12; // Notice we can override constants just like we can override properties and methods
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

class ErrorOutPutter {
  const PREFIX = "Error: ";
  public function outputError($error) {
    echo self::PREFIX . $error;
  }
}
// Note that class constants can be references without ever making an object out of the class.
// You do this using the :: operator like this:
echo TwelveSidedDie::SIDES; // Echos out 12 to the screen
echo SEPARATOR;

/**
 * PROBLEM 2
 *
 * Echo out the PREFIX from your ErrorOutputter class
 */

$errorOutputter = new ErrorOutputter();

echo ErrorOutputter::PREFIX;

echo SEPARATOR;
/**
 * 13.2 TYPEHINTING
 */

// Do you remember how we could force a function to only accept an array for a certain parameter?
function takeArray(array $foo) {
  // Do something with foo
}

// This works:
takeArray([1, 2, 3]);
// This wouldn't work:
// takeArray(133);

// Well, that is called "typehinting"

// In PHP you cannot typehint "primitive" types (integers, floats, booleans, strings)

// This wouldn't work:
function takePrimitives(int $foo, float $bar, bool $baz, string $qux) {
  // Do stuff
}

/**
 * PROBLEM 3
 *
 * Try to call the takePrimitives function and pass it an int, float, bool, and string.
 * What happens?
 *
 * ANSWER: it gives me a fatal error. It says "must be an instance of int, integer given"
 */

/*takePrimitives(1, 3.14, TRUE, 'this is a great string');

// Why does this happen?
// It happens because when you say int and float and bool and string, PHP assumes you are
// referring to names of CLASSES.

/**
 * ENTER CLASS TYPEHINTING
 */

// Just like we can typehint with arrays, we can also typehint with any class:
function takeDice(Dice $ball) {
  // Do something
}

// But as we saw above... arrays and classes are the ONLY things we can typehint with

// These will all work:
takeDice(new Dice());

$rpgDie = new TwelveSidedDie();
takeDice($rpgDie);

// These would not work... Try uncommenting them to see!
// takeDice(1);
// takeDice('foo');
// takeDice(1.234);
// takeDice(false);

// Notice that takeDice did not fail when we passed it a TwelveSidedDie object.
// This is because of INHERITANCE -- a TwelveSidedDie *IS* a Dice. It's just a more
// specific type of Dice. Or said another way, it is a child of Dice.

// The following statements would be true:
// A TwelveSidedDie object is a TwelveSidedDie
// A TwelveSidedDie object is a Dice

/**
 * PROBLEM 4
 *
 * Using your imagination, come up with some parent and child class that represent
 * real world objects, and then make a function that takes 2 parameters -- one
 * of the parent class type and one of one of the child class types -- and echos
 * out something about them.
 */

class GreatMovie {
  public $title = 'Inception';
}

class BestMovie extends GreatMovie {
  public $title = 'Star Wars Episode IV';
}

function pickMovie(GreatMovie $greatMovie, BestMovie $bestMovie) {
  echo $greatMovie->title . ' isn\'t as good as ' . $bestMovie->title;
}

$movieAnswer = new GreatMovie();
$secondAnswer = new BestMovie();

pickMovie($movieAnswer, $secondAnswer);

echo SEPARATOR;
/**
 * 13.3 INTERFACES
 */

// Just like a CLASS is a *template* for an OBJECT,
// an INTERFACE is a *template* for a CLASS

// Interfaces can specify 1 thing and 1 thing only about a class -- what methods it has.

// Here is an example interface:
interface Plant {
  public function grow();
  public function water($gallons);
}

// Notice that just like in a class, you specify the method name and parameters
// but you DON'T specify the method body.

// (Vocabulary Note: these are called "method signatures")

// Now we can create some classes that IMPLEMENT the Plant INTERFACE
// To do this, we use the `implements` keyword:

class Grass implements Plant {
  public function grow() {
    echo 'The grass is growing' . PHP_EOL;
  }

  public function water($gallons) {
    echo 'You watered the grass with ' . $gallons . ' gallons' . PHP_EOL;
  }
}

class Tree implements Plant {
  public function grow() {
    echo 'Reaching toward the sky!' . PHP_EOL;
  }

  public function water($gallons) {
    echo 'Come on... I need more than that!' . PHP_EOL;
  }
}

/**
 * PROBLEM 6
 *
 * Try removing $gallons from `public function water($gallons)` above.
 * What happens? Why do you think that happens?
 *
 * ANSWER HERE: I get the error "Fatal error: Declaration of Tree::water() must be compatible with Plant::water($gallons)". I think it happens because "Tree::water()" is dependent on "Plant::water".
 */

// So... why use interfaces?
//   1. Because you can guarantee that all classes that follow an interface have specific functions available.
//   2. Because you can typehint with interfaces just like classes!

// Check out typehinting with Interfaces:

// This function contains a typehint, but not on an array or class -- rather, on an interface!
// You can pass in any class that IMPLEMENTS that interface
function growPlant(Plant $plant) {
  $plant->grow();
}

$rye = new Grass();
$birch = new Tree();

growPlant($rye);
growPlant($birch);

/**
 * PROBLEM 7
 *
 * Create an interface called ConsolePrinter with a method signature for a print()
 * method which takes a parameter called $message.
 *
 * Create classes called NotificationPrinter and ErrorPrinter which implement that
 * interface. For each class, let the print() method echo out the message prefixed
 * with a fitting prefix. (e.g. "Notice: " and "Error: ")
 */

interface ConsolePrinter {
  public function printMessage($message);
}

class NotificationPrinter implements ConsolePrinter {
  public function printMessage($message) {
    echo "Notice: " . $message . PHP_EOL;
  }
}

class ErrorPrinter implements ConsolePrinter {
  public function printMessage($message) {
    echo "Error: " . $message . PHP_EOL;
  }
}

$notificationPrinter = new NotificationPrinter();
$errorPrinter = new ErrorPrinter();

$notificationPrinter->printMessage('Issue with syntax');

$errorPrinter->printMessage('You forgot the semicolon, ya dummy!');