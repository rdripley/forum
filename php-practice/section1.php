<?php

/**
 * Welcome to Section 1 of the PHP quiz! Once you pass all of the questions
 * in the PHP quiz, you'll be well equipped to move on working on the forum app.
 *
 * You will also be knighted by the queen and given a yearly pass to "PHP Land" in Los Angeles.
 */

/**
 * INSTRUCTIONS:
 *  1. Read through any introductory comments
 *  2. When you come upon "// PROBLEM 1" (or another number), put your code below that line
 *  3. Test your code by navigating to the folder that contains this file in Git Bash and running this command:
 *
 *      php section1.php
 *
 * 	   (Look at the output of the Git Bash console to help determine if your answer is correct)
 *
 *  4. Commit your changes to this file once you've answered the questions and submit a pull request
 *  5. You must do it perfectly on your first try and NEVER ask questions. DEFINITELY don't Google things that you don't know either. That would be cheating.
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 1: Print out the string "I'm ready for some PHP!" to the console
// =======================================================================

echo "I am ready for some php";

/**
 * Part 2: Variables
 *
 * Variables are like boxes that hold information.
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 2: Create a variable called $monthsInYear and assign it the number of months in the year.
// Then print it out to the console.
// =======================================================================

$monthsInYear = "12";

echo "$monthsInYear";

/**
 * Part 3: Variable Types
 *
 * There are 4 basic types of variables in PHP:
 * 1. String (an alphanumeric message - it can contain alphabetic characters, numbers, or symbols - like "hi dude")
 * 2. Integer (A number without decimals like 0 or -100 or 99999999)
 * 3. Float (A number with a decimal like 0.5 or 123.456 or -98.6)
 * 4. Boolean (One of these values: true or false)
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 3: Create 4 different variables, one of each of the basic types. Name them whatever you want.
// =======================================================================

// Code here: 

$string = "hi Paul";
$integer = 10;
$float = 3.14;
$boolean = true;



echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 4: Output the variables from PROBLEM 3 to the Git Bash console.
// (Note what PHP outputs. It may not look the same because PHP will convert it to a string -- more on that later)
// =======================================================================

/**
 * Part 4: Arrays
 *
 * An array is like a container for many variables. Create an array like this:
 *
 *   $someArray = [1, 2, 3, "foosball"];
 *
 * Now $someArray is an array containing 3 values. (1, 2, 3, and "foosball")
 * Notice that the values don't have to be the same type (although you often want them to be)
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 5: Create a variable called $myArray and set it to an array that contains an integer, a boolean, a float, and a string
// =======================================================================

$myArray = ["Bob Ross", 102, 3.14, true];

/**
 * VOCABULARY: The things inside an array are called the array's "elements"
 *
 *   $someArray = [1, "strawberry", true];
 *
 * The first element of $someArray is 1. The second element is "strawberry".
 *
 * So how do you get the values out of an array? With bracket syntax, like this:
 *
 *   $someArray[1]
 *
 * The number inside the brackets is the INDEX of the element you want. It should be totally
 * obvious to you as a human being that the first element has an index of 0. The second is 1, etc.
 *
 * 	 echo $someArray[0]; // Prints out "1"
 * 	 echo $someArray[1]; // Prints out "strawberry"
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 6: Take $myArray from problem 4 and echo out the second element to the console
// =======================================================================

echo $myArray[1];
/**
 * You can also set a single array element using bracket syntax:
 *
 *   $someArray[3] = "Some fourth element";
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 7: Add a fifth element to $myArray -- a value of "I am Russell and I eat arrays for breakfast"
// =======================================================================

$myArray = ["Bob Ross", 102, 3.14, true, "I am Russell and I eat arrays for breakfast"];

/**
 * You can print out an entire array with the native PHP print_r() function like this:
 *
 *   print_r($someArray);
 *   print_r(['foo', 'bar', 1, 2, 3]);
 */

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 8: Print out $myArray from PROBLEM 6
// =======================================================================

$myArray = ["Bob Ross", 102, 3.14, true, "I am Russell and I eat arrays for breakfast"];

print_r($myArray);

/**
 * You can remove elements from an array with the native PHP unset() function like this:
 *
 *   unset($someArray[3]); // This line would remove the fourth element of $someArray
 */

 echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 9: Remove element 2 from $myArray and then print out the array.
// =======================================================================

$myArray = ["Bob Ross", 102, 3.14, true, "I am Russell and I eat arrays for breakfast"];

unset($myArray[3]);

print_r($myArray);

/**
 * Part 5: Associative Arrays
 *
 * An associative array is an array where the indexes are strings instead of numbers.
 * Here's how you create one:
 *
 * $phpDeveloperInfo = [
 *   'name' => 'Paul',
 *   'level' => 'grandmaster',
 *   'food' => 'bacon',
 *   'children' => 1,
 *   'awesome' => true
 * ];
 *
 * Notice the syntax:
 *   - Normal opening/closing of an array: []
 *   - Instead of just providing values, you provide the index name, a "fat arrow" =>, and the value
 */

 echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 10: Create an associative array named $myAssocArray and print it out.
// It should have an element with index 'id' and value 5
// It should have an element with index 'color' and value 'white'
// It should have an element with index 'fallingToItsDeath' and value false
// =======================================================================

$myAssocArray = [
	'id' => 5, 
	'color' => 'white',
	'fallingToItsDeath' => false
	];

print_r($myAssocArray);

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 11: Add an element to $myAssocArray at index 'rhinosEndangered' with a value of true. Then print out the array.
// (Hint: The syntax is sort of similar to PROBLEM 6)
// =======================================================================

$myAssocArray = [
	'id' => 5, 
	'color' => 'white',
	'fallingToItsDeath' => false,
	'rhinosEndangered' => true
	];

print_r($myAssocArray);

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 12: Remove element 'color' from $myAssocArray and print out the array.
// =======================================================================


$myAssocArray = [
	'id' => 5, 
	'color' => 'white',
	'fallingToItsDeath' => false,
	'rhinosEndangered' => true
	];

	unset($myAssocArray[1]);
	print_r($myAssocArray);

echo "\n"; // Leave this before the next problem to move to the next line...

// =======================================================================
// PROBLEM 13: Add an element at index 'ID' to $myAssocArray and print out the array.
// Does the element at index 'id' get overwritten? What does that tell you?
// =======================================================================

$myAssocArray = [
	'id' => 5, 
	'color' => 'white',
	'fallingToItsDeath' => false,
	'rhinosEndangered' => true,
	'ID' => 'added'
	];

	print_r($myAssocArray);

// END
echo "\n";
