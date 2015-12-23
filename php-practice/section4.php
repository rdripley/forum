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
  // Here are some variables that VideoGame objects can hold. Remember that these are called PROPERTIES.
  public $title;
  public $publisher;
  public $isMultiplayer; // Whether the game is a multiplayer game -- should be TRUE or FALSE

  // This is the contructor. Remember, this is the function that gets run whenever you create a new VideoGame object
  function __construct($title, $publisher, $isMultiplayer) {
    $this->title = $title;
    $this->publisher = $publisher;
    $this->isMultiplayer = $isMultiplayer;
  }

  // The constructor is a "magic" function in the sense that PHP does something special with it
  // (Runs it when you create a new object)

  // Here are some not-so-magic, regular old functions.
  // FYI -- since these are in a class, they are technically called *methods*, not functions.
  // But you can call them functions too. It's not a big deal.

  // This function simulates playing online
  public function playOnline() {
    echo 'Playing online... This game is fun!';
  }

  // This function simulates playing the 1-player campaign
  public function playCampaign() {
    echo 'Playing the campaign. Great storyline';
  }
}

// We can create a new VideoGame object like this:
$starCraft2 = new VideoGame('StarCraft 2', 'Blizzard', true);

// We can run the methods defined in the class
$starCraft2->playOnline();
$starCraft2->playCampaign();

