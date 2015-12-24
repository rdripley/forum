<?php

/**
 * SECTION 12 -- ADVANCED OBJECT ORIENTED PROGRAMMING -- AN INTRODUCTION
 *
 * We're not going to delve deep into these topics. The point of this section
 * is simply to make you aware of some OOP principles. You can get more familiar
 * with them later when they matter.
 */

/**
 * 12.1 CLASS CONSTANTS
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

/**
 * 12.2 OVERRIDING FUNCTIONS
 */

// You can override parent functions

/**
 * 12.3 INTERFACES
 */

/**
 * 12.4 TYPEHINTING
 */
