<?php

/**
 * SECTION 9 -- Build in MATH FUNCTIONS
 *
 * These are built in PHP functions that do ... (surprise!) Math stuff.
 * Let's get familiar with them. Math's pretty important in programming.
 *
 * By the way, same rules as the string functions -- look up each function
 * in the PHP docs in order to thoroughly understand it.
 */

/**
 * round() -- Round a number
 */

/**
 * PROBLEM 1
 *
 * echo out Pi to the nearest integer (zero decimal places)
 * Hint: in PHP, there is an M_PI constant that equals Pi.
 */

// <RANT ABOUT HOW TO READ PHP DOCS>

/**
 * A quick explanation about the PHP docs. Check out this function signature from round()'s documentation:
 *
 *   float round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] )
 *
 * Let's break it apart to make sure you understand everything that is saying:
 *
 *   - `float round`: The function returns a float, and its name is round
 *
 *   - Open parenthesis `(`: Following are the parameters that this function takes
 *
 *   - `float $val`: The first parameter must be a float (a decimal number) and it is
 *     referred to in the docs as $val (standing for "value")
 *
 *   - Open square bracket followed by comma `[,`: The square bracket means, "the following
 *     parameter is optional"
 *
 *   - `int $precision = 0`: The second parameter must be an integer, it is referred to
 *     as $precision in the docs, and if you don't supply a value it defaults to 0.
 *
 *   - Open square bracket followed by comma `[,`: Same as before -- the 3rd parameter is optional too.
 *
 *   - `int $mode = PHP_ROUND_HALF_UP`: The third parameter must be an integer, it's referred to
 *     as $mode, and by default it is PHP_ROUND_HALF_UP, which is a constant value (like PHP_EOL)
 *
 */

// </RANT ABOUT HOW TO READ PHP DOCS>

/**
 * rand() -- Get a random number
 */

/**
 * PROBLEM 2
 *
 * Using rand(), create a function called rollDice that does a virtual "dice roll"
 * and returns a number between 1 and 6.
 */

/**
 * PROBLEM 3
 *
 * Using rand(), strlen(), and substr(), create a function called returnRandomCharacter
 * that takes a single string parameter and returns a single random character from that string.
 */

/**
 * PROBLEM 4
 *
 * Using rand() and any other array functions you need, create a function called
 * drawNameFromHat that takes an array ($hat) filled with people's names (strings)
 * and randomly returns the name of a winner.
 */

/**
 * PROBLEM 5
 *
 * Create a "Machine" class (see section5) called HatOfNames to solve problem 4 more elegantly.
 *
 * Let it have these methods:
 *
 *   1. addName($name)
 *   2. pickWinner()
 *
 * (Hint: What private properties does this class need to have? Do they need to have
 * a default value?)
 */

/**
 * BONUS! PROBLEM 6
 *
 * Go back to your solution in PROBLEM 5 and change it so that you can only pick
 * the winner once, and after that, that same person is always returned as winner.
 *
 * (That way, you can keep checking back to see who the winner is without changing
 * who the winner is.)
 */

/**
 * BONUS!! PROBLEM 7
 *
 * Now that you've done PROBLEM 6, go back and change the HatOfNames class so that
 * when you create the class, you can decide what behavior pickWinner() will have:
 *
 *  1. Choose a winner the first time and always return that person.
 *  2. Choose a random winner every time you call it.
 *
 * (Hint: You will have to create a constructor so you can tell the constructor
 * which mode you want to use.)
 */
