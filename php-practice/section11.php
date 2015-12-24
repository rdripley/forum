<?php

/**
 * SECTION 11 -- OBJECT ORIENTED PROGRAMMING -- INHERITANCE
 */

// In object oriented programming languages (languages with classes and objects)
// classes are used to represent real life things, such as Users, Cars, Orders, etc.

// Let's say you have a bunch of different user types, and you want them all to have their
// own class. But you are going to need to do a lot of the same stuff with each of them:
//
//  - Store a username
//  - Store an email address
//
// You want to keep your code DRY [don't repeat yourself] because you know duplicated
// or copy/pasted code is a nightmare to maintain.
//
// What do you do?

/**
 * 11.1 ENTER INHERITANCE!
 */

/**
 * Let's say you have 3 types of users:
 *  - Admins
 *  - Premium users
 *  - Free tier users
 */

// You can create a common class that contains all of the shared logic and properties:
class User {
  private $username;
  private $email;

  public __construct($username, $email) {
    $this->username = $username;
    $this->email = $email;
  }

  public getUsername() {
    return $this->username;
  }

  public getEmail() {
    return $this->email;
  }
}

// Note, since this is a regular class we can already use it to make objects:
$someUser = new User('paulstat', 'paulstat@example.com');
$someUser->getEmail(); // Returns 'paulstat@example.com'

// But we can also create "child" classes which "inherit" from their parent
class Admin extends User {
  public function deleteUser($userId) {
    echo 'Deleting user ID ' . $userId;
  }
}

// Now we can create an Admin user that has a deleteUser() function:
$someAdmin = new Admin('superadmin', 'superadmin@example.com');
$someAdmin->getUsername(); // Returns 'superadmin'
$someAdmin->deleteUser(); // Notice this echos out the message!

echo PHP_EOL;

/**
 * PROBLEM 1
 *
 * Create a child class of User called FreeTierUser.
 * Give it a method called accessFreeContent that echos out the message "Accessing free content!"
 */

// Note that if we called accessFreeContent() on $someAdmin, it would fail because that isn't defined
// on the Admin class, or on the Admin class's parent class either (the User class)

/**
 * 11.2 MULTI-LAYER INHERITANCE
 */

// The inheritance chain can go as many layers deep as you want.
// A child class can have its own child class, grandchild classes, etc.

// Check out this SuperAdmin class that has all the abilities of an Admin, but even more on top of those.
class SuperAdmin extends Admin {
  public function deleteAdmin($adminId) {
    echo 'Deleting admin ' . $adminId;
  }

  public function deleteDatabase() {
    echo 'Deleting the DATABASE -- because I\'m a baller SUPERADMIN, that\'s why!';
  }
}

// Notice a SuperAdmin object can do anything an Admin object or User object can do -- because it
// inherits from both of those classes.
$paul = new SuperAdmin('paul', 'paul@s.com');
echo $paul->getUsername();
$paul->deleteUser(5); // This is from the Admin class
$paul->deleteAdmin(10);
$paul->deleteDatabase();

// Just like in real life, inheritance only goes one way. If you uncomment the lines below it
// will break because the Admin class does not inherit from the SuperAdmin class -- only the
// other way around.

// $admin = new Admin();
// $admin->deleteDatabase();

/**
 * PROBLEM 2
 *
 * Create a child class of FreeTierUser called PremiumUser
 * Let it have a method called accessPremiumContent that prints out this message:
 * "Accessing premium content -- hey, I pay monthly for this ability!"
 */

/**
 * 11.3 PROPERTIES IN INHERITANCE
 */

// Child classes inherit both METHODS (functions) and PROPERTIES (variables) from their ANCESTORS
// (parent classes, grandparent classes, etc.)

// So far we've seen child classes that add new methods. But child classes can also add new properties.

// Case in point:
abstract class Animal { // IGNORE `abstract` FOR NOW...
  public $genus;
  public $species;
}

class Mammal extends Animal {
  public $hasPouch;
}

class Dog extends Mammal {
  public $barkIsBiggerThanBite;

  public function __construct() {
    $this->hasPouch = false; // Dogs never have pouches
  }

  public function bark() {
    if ($this->barkIsBiggerThanBite) {
      echo 'WOOF!';
    } else {
      echo '...You better run, man...';
    }
  }
}

// You can work with the hasPouch property if the object is a Mammal
$myDog = new Dog();
$myDog->genus = 'Canine';
$myDog->species = 'Scary';
$myDog->barkIsBiggerThanBite = false;
$myDog->bark();

/**
 * PROBLEM 3
 *
 * Create a $kangaroo variable as a `new Mammal()` object. Try to set the
 * barkIsBiggerThanBite property on it -- what happens? Why?
 */

/**
 * 11.4 ABSTRACT CLASSES
 */

// Notice the `abstract` keyword above in the Animal class definition.
// An abstract class cannot be instantiated. In other words, you can't make an object out of it.

/**
 * PROBLEM 4
 *
 * Try to make an Animal object directly and see what happens:
 */

// The point of an abstract class is to put shared code in it, knowing this class will
// have child classes that you'll use to make objects.

// Sometimes it makes sense to allow someone to make objects out of a parent class.
// But when it doesn't, we make it abstract.

// Here's an example:
abstract class Dice {
  private $sides;

  public function roll() {
    return rand(1, $this->sides);
  }
}

class SixSidedDie extends Dice {
  private $sides = 6; // Notice we can override properties from any ancestor class
}

class TwelveSidedDie extends Dice {
  private $sides = 12;
}

$rpgDie = new TwelveSidedDie();
$rpgDie->roll(); // Will always return between 1 and 12

$yahtzeeDie = new SixSidedDie();
$yahtzeeDie->roll(); // Will always return between 1 and 6

/**
 * PROBLEM 5
 *
 * *WARNING -- ADVANCED*
 *
 * Copy and paste below your HatOfNames class from section9.php
 *
 * Modify this code and split it up into 3 classes:
 *   - HatOfNames -- this will be an abstract parent class which contains all shared code
 *   - LockedHatOfNames -- this will be a HatOfNames where the winner is locked after picking one
 *   - ReusableHatOfNames -- this will be a HatOfNames where the winner is different every time pickWinner() is called
 */
