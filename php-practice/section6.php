<?php

/**
 * SECTION 6 -- More practice with CONTROL STRUCTURES
 */

/**
 * 6.1 WHAT IS A CONTROL STRUCTURE?
 *
 * You've already been using them! We're just naming them finally. Here are some examples of control structures:
 *
 *  - if statements
 *  - switch statements
 *  - loops (while loops, for loops, foreach loops)
 *
 * A definition of Control Structure from Wikiversity:
 *
 *   "A control structure is a block of programming that analyzes variables
 *    and chooses a direction in which to go based on given parameters."
 *
 * So control structures are all about *controlling* what the code does, based on some information.
 */

// You're familiar with if statements. Read through this function and make sure you fully understand what's going on

/**
 * Print out a comment about the given age
 * @param  int|float $age A person's age
 */
function commentOnAge($age) {
  if ($age >= 59.5) {
    $ability = 'withdraw from your 401k without penalties';
  } elseif ($age >= 18) {
    $ability = 'serve your country';
  } elseif ($age >= 21) {
    $ability = 'drink in the USA';
  } elseif ($age >= 16) {
    $ability = 'drive';
  }

  if ($ability !== null) {
    $message = 'You\'re old enough to ' . $ability;
  } else {
    $message = 'You\'re pretty young still';
  }

  echo $message.PHP_EOL;
}

// Testing it out...
commentOnAge(14);
commentOnAge(17);
commentOnAge(20);
commentOnAge(31);
commentOnAge(80);

// Let's make a function that we can call every time we want a visual separator in the console.
// Read this code... do you understand how it works? (Feel free to run it if that helps.)
function printSectionSeparator() {
  echo implode(PHP_EOL, ['', '=======', '', '']);
}

// Let's use it...
printSectionSeparator();

/**
 * 6.2 SWITCH STATEMENTS
 */

// Have you noticed that switch statements are basically the same as "if...elseif" blocks?
// Check it out -- we'll create a function both ways

/**
 * Get the animal mascot of the given political party
 * @param  string      $party A political party name
 * @return string|null        The animal (or null if none found)
 */
function getPartyAnimal($party) {
  if ($party === 'Republican') {
    return 'Elephant';
  } elseif ($party === 'Democrat') {
    return 'Donkey';
  } else {
    return 'None';
  }
}

echo getPartyAnimal('Republican').PHP_EOL;
echo getPartyAnimal('Democrat').PHP_EOL;
echo getPartyAnimal('Independent').PHP_EOL;

printSectionSeparator();

// Now let's make that same function with a switch statement

function getPartyAnimalAlternate($party) {
  switch ($party) {
    case 'Republican':
      return 'Elephant';
      break;
    case 'Democrat':
      return 'Donkey';
      break;
    default:
      return 'None';
      break;
  }
}

// Now let's demonstrate that they both work the same...
echo getPartyAnimal('Republican').PHP_EOL;
echo getPartyAnimal('Democrat').PHP_EOL;
echo getPartyAnimal('Independent').PHP_EOL;

printSectionSeparator();

/**
 * PROBLEM 1
 *
 * Your turn! Complete this function that takes the name of a superhero and returns his or her superpower,
 * using if statements.
 */

function getSuperpower($superheroName) {
  // YOUR CODE HERE
}

/**
 * PROBLEM 2
 *
 * Now do the same, but with switch statements
 */

function getSuperpowerAlternate($superheroName) {
  // YOUR CODE HERE
}

/**
 * 6.3 FOR LOOPS
 */

// You previously made a function using a for loop that sums all the numbers from 1 to X

function getTriangleNumber($x) {
  $total = 0;

  for ($i = 1; $i <= $x; $i++) {
    $total += $i;
  }

  return $total;
}


/**
 * PROBLEM 3
 *
 * Now, make a function that sums only the EVEN numbers 1 to 100
 * (So it does 2 + 4 + 6 + ... + 100)
 */

/**
 * Return the total of all even numbers 1 to 100 summed together
 * @return int
 */
function sum1To100Evens() {
  // YOUR CODE HERE
}

/**
 * 6.4 FOR LOOPS WITH ARRAYS
 */

// For a normal array, you can loop through all of the items with a for loop.
// You can do this by using the count() function to get the number of elements in the array:

function printNotes(array $notes) {
  $count = count($notes);

  for ($i = 0; $i < $count; $i++) {
    echo $notes[$i].PHP_EOL;
  }
}

// Now let's watch it work...

printNotes([
  'I am hungry',
  'I am going to In N Out',
  'Man, these animal style fries are delish'
]);

printSectionSeparator();

// By the way, I introduced a new syntax feature there:
//
// See the (array $notes) above? That makes it so PHP throws an error if you don't pass it an array.
// Uncomment this line to watch PHP blow up:

// printNotes('I am not an array');

/**
 * PROBLEM 4
 *
 * Now, you make a function that takes an array of errors and prints them out,
 * using a for loop, but prefixes each error with "Error: "
 *
 * So if the errors are "Foo" and "Bar" it should print out "Error: Foo" and "Error: Bar"
 */

function printErrors(array $errors) {
  // YOUR CODE HERE
}

// Run the function below, passing an array of errors

/**
 * PROBLEM 5
 *
 * Now make the SAME printErrors function with a foreach loop!
 */

function printErrorsAlternate(array $errors) {
  // YOUR CODE HERE
}
