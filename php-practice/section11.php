<?php

/**
 * SECTION 11 -- OBJECT ORIENTED PROGRAMMING -- INHERITANCE
 *
 * In this section we'll explore:
 *   1. Class Inheritance
 *   2. Multi-level Inheritance
 *   3. Class Properties and Inheritance
 *   4. Class Methods and Inheritance
 *   5. Overriding Properties and Methods
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

  public function __construct($username, $email) {
    $this->username = $username;
    $this->email = $email;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getEmail() {
    return $this->email;
  }
}

// Note, since this is a regular class we can already use it to make objects:
$someUser = new User('paulstat', 'paulstat@example.com');
$someUser->getEmail(); // Returns 'paulstat@example.com'

// But we can also create "child" classes which "inherit" from their parent
class Admin extends User {
  public function deleteUser($userId) {
    echo 'Deleting user ID ' . $userId . PHP_EOL;
  }
}

// We use the `extends` keyword to make the Admin class INHERIT from the Admin class
// The Admin class INHERITS all of the User class's PROPERTIES, METHODS, and CONSTANTS.

// Now we can create an Admin user that has a deleteUser() function:
$someAdmin = new Admin('superadmin', 'superadmin@example.com');
$someAdmin->getUsername(); // Returns 'superadmin'
$someAdmin->deleteUser(1); // Notice this echos out the message!

// It's just as if we put all of those properties and methods directly inside the Admin class!

/**
 * PROBLEM 1
 *
 * Create a child class of User called FreeTierUser.
 * Give it a method called accessFreeContent that echos out the message "Accessing free content!"
 */

/**
 * PROBLEM 2
 *
 * Note that if we called accessFreeContent() on $someAdmin, it would fail because that isn't defined
 * on the Admin class, or on the Admin class's parent class either (the User class)
 *
 * Try it out below! (You can comment it out after trying so the file doesn't error.)
 */

/**
 * 11.2 MULTI-LEVEL INHERITANCE
 */

// The inheritance chain can go as many levels deep as you want.
// A child class can have its own child class, grandchild classes, etc.

// Check out this SuperAdmin class that has all the abilities of an Admin, but even more on top of those.
class SuperAdmin extends Admin {
  public function deleteAdmin($adminId) {
    echo 'Deleting admin ' . $adminId . PHP_EOL;
  }

  public function deleteDatabase() {
    echo 'Deleting the DATABASE -- because I\'m a baller SUPERADMIN, that\'s why!' . PHP_EOL;
  }
}

// Notice a SuperAdmin object can do anything an Admin object or User object can do -- because it
// inherits from both of those classes.
$paul = new SuperAdmin('paul', 'paul@s.com');
echo $paul->getUsername();
echo PHP_EOL;
$paul->deleteUser(5); // This is from the Admin class
$paul->deleteAdmin(10);
$paul->deleteDatabase();

// Just like in real life, inheritance only goes one way. If you uncomment the lines below it
// will break because the Admin class does not inherit from the SuperAdmin class -- only the
// other way around.

// $admin = new Admin();
// $admin->deleteDatabase();

/**
 * PROBLEM 3
 *
 * Create a child class of FreeTierUser called PremiumUser
 * Let it have a method called accessPremiumContent that prints out this message:
 * "Accessing premium content -- hey, I pay monthly for this ability!"
 */

/**
 * 11.3 PROPERTIES AND INHERITANCE
 */

// Child classes inherit both METHODS (functions) and PROPERTIES (variables) from their ANCESTORS
// (parent classes, grandparent classes, etc.)

// So far we've seen child classes that add new methods. But child classes can also add new properties.

// Case in point:
class Animal {
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
      echo 'WOOF!' . PHP_EOL;
    } else {
      echo '...You better run, man...' . PHP_EOL;
    }
  }
}

// You can work with the hasPouch property if the object is a Mammal
$myDog = new Dog();
$myDog->genus = 'Canine';
$myDog->species = 'Scary';
$myDog->barkIsBiggerThanBite = false;
$myDog->bark(); // What will this print out? ANSWER:

/**
 * PROBLEM 4
 *
 * Create a $kangaroo variable as a `new Mammal()` object. Try to set the
 * barkIsBiggerThanBite property on it -- what happens? Why?
 */

/**
 * 11.4 METHODS AND INHERITANCE
 */

// Child classes can also add new methods that aren't inherited from the parent. For example:
class Fruit {
  public $name;

  public function eat() {
    echo 'Yum!';
  }
}

class Apple {
  public function dropOnIsaacNewtonsHead() {
    echo 'Ouch!';
  }
}

/**
 * PROBLEM 5
 *
 * Create a new Fruit object, and a new Apple object
 * Try to call dropOnIsaacNewtonsHead() on each of these objects.
 * Which will work? Which won't? Why not?
 *
 * ANSWER HERE:
 */

/**
 * 11.5 OVERRIDING PROPERTIES AND METHODS
 */

// A child class can OVERRIDE its parent's properties and methods:

// Well, just like we can override PROPERTIES and CONSTANTS, we can also override METHODS (functions)
// of ancestor classes:
class Ball {
  public $color = 'It could be a lot of colors...';

  function roll() {
    echo 'The ball is rolling' . PHP_EOL;
  }
}

class BeachBall extends Ball {
  public $color = 'Red, white, blue, and yellow';

  function roll() {
    echo 'The beach ball is rolling, but it\'s slowing quickly' . PHP_EOL;
  }
}

class BowlingBall extends Ball {
  public $color = 'Black';

  function roll() {
    echo 'The bowling ball is rolling... it keeps going!' . PHP_EOL;
  }
}

// Vocabulary note: Remember, Ball would be called a "parent" class and
// BeachBall and Bowling ball would be called "child" classes of Ball

/**
 * PROBLEM 6
 *
 * Create a Ball object and a BeachBall object.
 * Call roll() on both of them. Then echo out $color for both of them.
 * What happens when you call roll() on the Ball object?
 * What happens with the BeachBall object?
 *
 * ANSWER HERE:
 */

/**
 * PROBLEM 7
 *
 * Use your imagination to come up with a parent and child class
 * On the child class, override properties and methods from the parent class
 */
