<?php

/**
 * SECTION 7 -- Built in STRING FUNCTIONS
 *
 * PHP comes with a lot of helpful functions pre-made that you can use anywhere in your code.
 * In this section, we'll learn about functions that have to do with strings.
 *
 * Instead of giving you a lot of information about each function, your job is to Google the
 * PHP documentation for each function. (Just type "PHP" and the name of the function and it
 * should be the first result.)
 *
 * For each function, read the description of the function enough to understand:
 *   1. What the function does.
 *   2. What parameters it takes.
 *   3. Which parameters are optional.
 *   4. What value it returns, and any rules that govern what value is returned.
 */

/**
 * strlen() -- return the length of a string
 */

$lengthOfMyName = strlen('Paul'); // This will equal 4, because 'Paul' is 4 characters long.

/**
 * PROBLEM 1
 *
 * Using strlen, echo out the length of your name
 */

$nameLength = strlen('Russell');

echo $nameLength.PHP_EOL;
/**
 * PROBLEM 2
 *
 * Using strlen, make a function called lengthOfStrings that takes 2 variables
 * ($string1 and $string2) and returns the combined length of both of them.
 */

	function lengthOfStrings($string1, $string2) {
		return strlen($string1.$string2);
};

lengthOfStrings('Paul', 'Russell');


PHP_EOL;
/**
 * substr() -- return part of a string
 */

// Look at the docs and notice that substr can either be given 2 arguments...
$string = 'Paul Statezny';
$start = 5;
$myLastName = substr($string, $start); // 'Statezny'

// ...or 3 arguments, in which case the 3rd is the number of characters to retrieve
$myFirstName = substr($string, 0, 4);

/**
 * strtoupper() and strtolower() -- Convert a string to uppercase or lowercase
 *
 * Look them up in the docs!
 */

/**
 * PROBLEM 3
 *
 * Use strtoupper() and strtolower() to echo out this string in upper and lower case
 */
$crazyCase = 'i aM nOt LOwEr OR upPeR -- i\'M cRAZy CASe!';

$upperCase = strtoupper($crazyCase);
$lowerCase = strtolower($crazyCase);

echo $upperCase.PHP_EOL;
echo $lowerCase.PHP_EOL;

PHP_EOL;

/**
 * strpos() -- find the position of a substring within another string
 *
 * (Hint: This function can be used to check whether a string contains another string at all)
 */

/**
 * PROBLEM 4
 *
 * Use strpos() to create a function called stringContains().
 * It should take 2 arguments ($needle and $haystack) and return a boolean indicating
 * whether $needle is contained somewhere in $haystack.
 *
 * (It returns TRUE if $needle is a substring of $haystack; FALSE otherwise.)
 */

function stringContains($haystack, $needle) {
	$pos = strpos($haystack, $needle);

		if ($pos == true) {
			return true;
		} else {
			return false;
		}
}

stringContains("This is the string", "ah");