<?php

/**
 * SECTION 8 -- CONSTANTS
 *
 * A constant is like a variable, but it CANNOT be changed once it is defined.
 * (Hence, its value is ... constant :-P)
 *
 * We'll learn in this section:
 *   1. That PHP comes with a bunch of constants pre-defined.
 *   2. How to define constants.
 *   3. When to use constants.
 *   4. That constants are global.
 *   5. That sometimes the value of a constant doesn't really matter.
 */

// For later use...
function printLine($text) {
  echo $text."\n"; // Print with a newline for pretty formatting
}

/**
 * 8.1 PRE-DEFINED CONSTANTS
 */

// PHP comes with a BUUUUNCH of constants pre-defined, for different purposes... Here's a sample

printLine(PHP_EOL);
printLine(PHP_VERSION);
printLine(PHP_INT_SIZE);
printLine(PHP_EXTENSION_DIR);

/**
 * 8.2 DEFINING CONSTANTS
 */

// Just use the define() function! (See the PHP docs)

// Example...
define('MY_AGE', 28);
printLine(MY_AGE);

define('PI_TO_5_DECIMALS', 3.14159);
printLine(PI_TO_5_DECIMALS);

define('US_CAPITOL', 'Washington, D.C.');
printLine(US_CAPITOL);

// Note that you have to give the name of the constant to define() as a string with quotes,
// but when you use the constant, you do not use quotes.

/**
 * PROBLEM 1
 *
 * Define a constant called BEST_VIDEO_GAME_EVER. Its value should be the best video game ever.
 */

define('BEST_VIDEO_GAME_EVER', 'best video game ever');
printline(BEST_VIDEO_GAME_EVER);
/**
 * 8.3 WHEN TO USE CONSTANTS
 *
 * You'll want to use constants when you have a special value or string that you'll be using in your
 * program.
 */

/**
 * Let's say there are 50 places in my app where I send an email to an email account
 * to track activities in the app, for example something like this:
 *
 *   trackAction('User clicked button', 'actions@mydomain.com');
 *
 * What if I decided to change that email address? I'd have to change it in 50 places.
 * But what if I used a constant instead?
 *
 *   trackAction('User clicked button', ACTIONS_EMAIL_ADDRESS);
 *
 * I would simply have to change the email address where the constant was defined, in one place.
 */

/**
 * 8.4 CONSTANTS ARE GLOBAL
 *
 * Once you define a constant, it is available ANYWHERE in your code, unlike
 * variables which are only available in the scope in which they're created
 */

// Example:
define('FAVORITE_CHEESE_PRODUCT', 'Cheesecake');

function printFavoriteCheeseProduct() {
  // We can access FAVORITE_CHEESE_PRODUCT even though it isn't defined in this function!
  echo FAVORITE_CHEESE_PRODUCT;
}

/**
 * PROBLEM 2
 *
 * Demonstrate that constants are global by creating a constant and then using that constant
 * within a function.
 */

define('FAVORITE_FOOD', 'Burgers');

function printFavoriteFood() {
	echo FAVORITE_FOOD.PHP_EOL;
}

printFavoriteFood();

/**
 * 8.5 SOMETIMES THE VALUE OF A CONSTANT DOESN'T MATTER
 *
 * Sometimes constants aren't created to store a special value, but simply to
 * be placeholders for a value that isn't really a value
 */

// Example:
define('GENDER_BOY', 1);
define('GENDER_GIRL', 2);

function printGender($gender) {
  if ($gender === GENDER_BOY) {
    echo 'You are male'.PHP_EOL;
  } else if ($gender === GENDER_GIRL) {
    echo 'You are female'.PHP_EOL;
  }
}

printGender(GENDER_BOY);
// In this case, it doesn't mean anything that GENDER_BOY is 1. That's just a unique
// value we give it so that we can create those two constants.

/**
 * PROBLEM 3
 *
 * Pick your favorite scifi / fantasy trilogy and create 3 constants, one for each
 * title. Just use numbers as their value.
 *
 * Then create a function that takes a title and echos out a witty comment about that title.
 */

define('Fellowship of the Ring', 1);
define('Two Towers', 2);
define('Return of the King', 3);

function printComment($title) {
	if($title === 'Fellowship of the Ring') {
		echo 'An incredible start to a trilogy!'.PHP_EOL;
	} elseif ($title === 'Two Towers') {
		echo 'Wow! Makes you want to read the Final Book!'.PHP_EOL;
	} else {
		echo 'I can\'t believe it\'s over!'.PHP_EOL;
	}
}

printComment('Two Towers');