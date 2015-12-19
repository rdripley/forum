<?php

/**
 * Expressions
 *
 * What is an expression? It's "any legal combination of symbols that represents a value".
 *
 * Here are some examples:
 *
 *   4
 *   'I love cheese'
 *   'Paul' . 'is' . 'the' . 'bomb'
 *   1 + 1
 *   1 - 1.5
 *   50.50 * .007
 *   1 / 2
 *
 * Those symbols are operators. You recognize the math ones like +, -, * (multiply), and / (divide).
 *
 * The . symbol means "concatenate". To concatenate means to join two strings together.
 */

// Setup code:
$firstName = 'Paul';
$lastName = 'Statezny';
$fullName = $firstName.$lastName;

echo PHP_EOL; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 1: What string does $fullName contain? Does it have a space between the names?
// =======================================================================


//PaulStatezny. No.

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 2: How would you fix $fullName to have a space between the names?
// =======================================================================

$firstName = 'Paul';
$lastName = 'Statezny';
$fullName = $firstName." $lastName";

print_r($fullName);

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 3: Print out the sum of 1 + 2 + 3... all the way to 10 (Without creating any variables)
// =======================================================================

echo 1+2+3+4+5+6+7+8+9+10;

echo PHP_EOL; // Leave this before the next problem to move to the next line...


// =======================================================================
// PROBLEM 4: Print out 1 + 'cheese' -- what do you think will happen?
// =======================================================================

print_r(1 + 'cheese');

//It ignores the cheese portion.

/**
 * Functions
 *
 * Functions are ways of packaging code in a reusable way.
 * Functions prevent you from having to write the same code over and over.
 * Functions have a *name* so you can easily understand what the code does.
 * Functions can take input values. ("Arguments")
 * Functions can return a single value. (A "return value".)
 */

// Here's a function that prints out a string that you give it, with a prefix attached to the beginning
function printMessage($message) {
  echo 'THE MESSAGE IS: ' . $message;
}

// You "invoke" printMessage (run its code) like this
printMessage('Testing 123'); // Note what is printed on the console

echo PHP_EOL;

// Functions take an input (as seen above) and return a value.
// Here's a function that returns the square of a number
function square($a) {
  return $a * $a;
}

echo square(5);

// =======================================================================
// PROBLEM 5: What will the above line of code print out?
// ANSWER: 25
// =======================================================================

// =======================================================================
// PROBLEM 6: Why did we have to do `echo square(5)` instead of just `square(5)`? What happens if we remove the echo?
// ANSWER: the computer won't print out anything. Echo tells the computer to print out the value of the function.
// =======================================================================

echo PHP_EOL;

// Here is a function that prints a newline character to the console output,
// so anything after it goes on the next line

function printNewline() {
  echo PHP_EOL; // EOL stands for "end of line"
}

// Demonstration:
echo 'Hi, I\'m on one line';
printNewline();
echo 'Hi, I\'m on another line!';

// Function names are really helpful because they can be easier to read.

// From here on, I've stopped adding `echo PHP_EOL;` after every question. You can now add `printNewLine()` after each answer to keep the output on separate lines.
printNewline();
// =======================================================================
// PROBLEM 7: Write a function called sum that takes 2 arguments ($a and $b) and returns their sum.
// =======================================================================

function sum($a, $b) {
	return $a + $b;
}

echo sum(5, 10);

printNewline();
// =======================================================================
// PROBLEM 8: Write a function called sumArray that takes 1 arguments (expects it to be an array)
// and returns the sum of every element of that array
//
// HINT: Use a foreach loop
// =======================================================================

$sumArray = array(1, 2, 3, 4);

function sumArray($sumArray) {
	$total = 0;

		foreach ($sumArray as $value) {
				$total += $value;
		}

		return ($total);

}

echo sumArray($sumArray);

printNewline();
// =======================================================================
// PROBLEM 9: Write a function called sumIntegersTo100 that simply returns the sum of
// all integers from 1 to 100 and returns that value
//
// HINT: Use a for loop
// =======================================================================

	function sumIntegersTo100 () {
		$sumIntegersTo100 = 0;
		
			for ($value = 0; $value <= 100; $value++) {
				$sumIntegersTo100 += $value;
		}

		return ($value);
}

echo sumIntegersTo100();

printNewline();
// =======================================================================
// PROBLEM 10: Write a modified version of your function from problem 9.
// Instead of summing 1 to 100, it should take 1 argument (an integer called $x) and
// sum all numbers from 1 to $x. It should returns the sum.
// =======================================================================

// END
printNewline();
