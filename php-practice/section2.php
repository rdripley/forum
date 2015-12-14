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

echo "\n"; // Leave this before the next problem to move to the next line...

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

//not sure how to do this one

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 4: Print out 1 + 'cheese' -- what do you think will happen?
// =======================================================================

print_r(1 + 'cheese');

//It ignores the cheese portion.

// END
echo "\n";
