<?php

/**
 * Classes and Objects
 *
 * We already started learning about classes and objects -- but I want you to get really comfortable with them.
 * So let's practice some more!
 */

// Let's remember the basic anatomy of a class.
// Classes and objects are really good for representing real life things, so I'll make a VideoGame class as an example:

class VideoGame {
  // Here are some variables that VideoGame objects can hold.
  // Remember that these variables are called PROPERTIES because they are inside a class.
  public $title;
  public $publisher;
  public $isMultiplayer; // Whether the game is a multiplayer game -- should be TRUE or FALSE

  // This is the CONSTRUCTOR. Remember, this is the function that gets run whenever you create a new VideoGame object.
  // Notice that this particular constructor takes 3 ARGUMENTS.
  // (An argument is a variable passed into a function.)
  public function __construct($title, $publisher, $isMultiplayer) {
    $this->title = $title;
    $this->publisher = $publisher;
    $this->isMultiplayer = $isMultiplayer;
  }

  // The constructor is a "magic" function in the sense that PHP does something special with it
  // (Runs it when you create a new object)

  // Here are some not-so-magic, regular old functions.
  // Since these are in a class, they are technically called METHODS, not functions.
  // But you can call them functions too. It's not a big deal.

  // This method simulates playing online
  public function playOnline() {
    echo 'Playing online... This game is fun!'.PHP_EOL;
  }

  // This method simulates playing the 1-player campaign
  public function playCampaign() {
    echo 'Playing the campaign. Great storyline.'.PHP_EOL;
  }
}

// We can create a new VideoGame object like this:
$starCraft2 = new VideoGame('StarCraft 2', 'Blizzard', true);

// We can run the methods defined in the class
$starCraft2->playOnline();
$starCraft2->playCampaign();

// We can access (retrieve) the public properties of an object like this:
echo 'My favorite game is' . $starCraft2->title;

// We can also set the public properties of an object like this:
$starCraft2->publisher = 'Electronic Arts'; // That would be bad!

/**
 * <LECTURE-MODE>
 */

// Some things we could say about $starCraft2:
//   - It's a variable.
//   - It is an OBJECT. (Object is the TYPE of variable -- like integer or boolean or array or string)
//   - It is an INSTANCE of the VideoGame class.

// Some notes about the difference between Classes and Objects:
//
// A class is a template for objects. The VideoGame class just defines what VideoGame
// objects look like. And the details we define in the VideoGame class become true
// about all VideoGame objects. For example, if the VideoGame class has an $isTrilogy property,
// then all VideoGame objects will have an $isTrilogy property. If the VideoGame class
// has an enterCheatCode method, then all VideoGame objects will have enterCheatCode methods.
//
// In summary, a class is simply a definition for objects of a given type.

/**
 * </LECTURE-MODE>
 */

/**
 * QUESTION 1
 *
 * What are the 2 main things that you can create inside of a class?
 * ANSWER:
 */

/**
 * QUESTION 2
 *
 * What keyword do you use in PHP to create an object from a class?
 * ANSWER:
 */

/**
 * QUESTION 3
 *
 * When you instantiate (create) a new object, which method (function) runs from its class?
 * ANSWER:
 */

/**
 * QUESTION 4
 *
 * If the constructor is set up to take arguments, how or where do you specify which arguments to pass in?
 * ANSWER:
 */

/**
 * QUESTION 5
 *
 * How do you access a public property of an object?
 * ANSWER:
 */

/**
 * QUESTION 6
 *
 * Create below a Novel class. Give it some properties that novels have, such as
 * author and title. Also give it some methods representing things you can do with
 * a novel.
 *
 * Create a constructor function that takes arguments for each of the properties
 * so that you must set the properties via the constructor. (See the VideoGame class
 * for an example.)
 */

/**
 * QUESTION 7
 *
 * Create below a Novel object stored in a variable called $myBestSeller
 * and call all of its public methods.
 */

