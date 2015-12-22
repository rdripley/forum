<?php

/**
 * PHP Array functions
 *
 * ------
 *
 * In PHP, there are a lot of built-in functions provided to do things with arrays.
 * You could write your own functions to do a lot of this stuff, but it makes more sense
 * to use the tools already at your disposal!
 */

/**
 * In this section when I refer to arrays, I'm referring to normal, numerically indexed arrays.
 * (Instead of Associative Arrays, which are dictionaries like this:)
 */
$someAssociativeArray = [
  'name' => 'Paul',
  'age' => 28
];

/**
 * SECTION 3.1 -- ARRAY PUSH
 *
 * "Pushing" a value onto an array means adding an element at the *end* of the array.
 * (See the PHP documentation as you do this section:) http://php.net/manual/en/function.array-push.php
 */

// Let's take this array for example:
$myArr = [10, 20, 30, 40];

// Say we wanted to add a fifth element whose value would be 100. Using array_push, we would just do this:
array_push($myArr, 100);

// On the line below, use print_r() to see how the new element was added to the array.
print_r($myArr);

// There's another more succinct way of pushing onto an array in PHP:
$myArr[] = 100;

// Notice you just put the array variable's name followed by square brackets,
// and then the rest just looks like a normal "assignment" statement -- an equals sign followed by the value

// On the line below, push the value "foo" onto $myArr using array_push()
array_push($myArr, "foo");

// On the line below, push the value 3.14159 onto $myArr using the shorthand bracket syntax
$myArr[] = 3.14159;

/**
 * SECTION 3.2 -- ARRAY POP
 *
 * "Popping" a value is the opposite of Pushing: It means to remove the last element from the array
 */

// On the line below, use print_r() to see the current form of $myArr
print_r($myArr);

// Now, we'll pop the last value you added -- 3.14159
array_pop($myArr);

// Use print_r to inspect $myArr and see that the last element was removed from the array
print_r($myArr);

// Check out the PHP docs for array_pop(): http://php.net/manual/en/function.array-pop.php
// What value does this function return?
// Answer: [returns the last value of the array]

// Why is it helpful for array_pop return that value?
// Let's say there are 5 users subscribed to a forum thread, and we need to send each of them an email
// to let them know that there was a new post in the thread.

// Perhaps we have the list of email addresses in an array:
$usersToSendEmail = [
  'joe@example.com',
  'joseph@example.com',
  'joey@example.com',
  'jose@example.com',
  'josie@example.com'
];

// If we have to send the emails one by one, we can grab the next email with array_pop():
$emailAddress = array_pop($usersToSendEmail);

// On the next 2 lines, var_dump $emailAddress and print_r $usersToSendEmail.
var_dump($emailAddress);
print_r($usersToSendEmail);

// What do they contain and why?
// $emailAddress contains: ['josie@example.com']
// $usersToSendEmail contains: ['joe@example.com','joseph@example.com', 'joey@example.com', 'jose@example.com',]

/**
 * After getting the next email address, we can send the email:
 *
 * sendEmailUpdate($emailAddress);
 *
 * (Pretend that function sends the email update to the given email)
 */

// ... and then we can get the next email address ...
$emailAddress = array_pop($usersToSendEmail);

// ... until $usersToSendEmail is empty

// ... speaking of which, you can check if an array is empty with the empty() function:
$arrayIsEmpty = empty($usersToSendEmail);

// Check out the PHP docs for empty:
// http://php.net/manual/en/function.empty.php

// What type of value does empty() return? [a false (boolean?) value]

// On the line above, I captured the return value of empty() into the $arrayIsEmpty variable
// Notice what value it returned when I var_dump the return value:
var_dump($arrayIsEmpty);

/**
 * **Medium-difficulty question**
 *
 * Edit the while loop below to so that it pops values off of the $usersToSendEmail until it is empty
 * Here's the documentation for while loops: http://php.net/manual/en/control-structures.while.php
 *
 * HINT: Use the empty() function.
 * HINT: It may help to use paper and pencil and write down what the array contains after each iteration of the loop
 */

while (!empty($originalArray)) {
  $emailAddress = array_pop($usersToSendEmail);
  $arrayIsEmpty = empty($usersToSendEmail);
}

var_dump($arrayIsEmpty);
print_r($usersToSendEmail);

/**
 * SECTION 3.3 -- ARRAY SHIFT and ARRAY UNSHIFT
 *
 * The "Array Shift" operation is like the opposite of Array Pop.
 * "But wait a second!" you say... "You already told me that Array Push and Array Pop were opposites!"
 *
 * Okay, yeah I did. But they're opposites in a different sense.
 *
 * Push ADDS an element onto the END of an array.
 * Pop REMOVES an element from the END of an array.
 * Shift REMOVES an element from the BEGINNING of an array.
 * Unshift ADDS an element to the BEGINNING of an array.
 *
 * Here's some documentation:
 *
 * array_shift(): http://php.net/manual/en/function.array-shift.php
 * array_unshift(): http://php.net/manual/en/function.array-unshift.php
 *
 * Notice 2 things:
 *   1. Push and Unshift both ADD an element, and they RETURN the number of elements in the array
 *   2. Pop and Shift both REMOVE an element, and they RETURN the element that was removed
 */

// Let's play around with these!

$favoriteCheeseFoods = ['Cheeseburger', 'Cheesecake', 'Cheese Fondue'];

// On the next line use array_shift to remove the first element from this array and then echo that string out to the console:

array_shift($favoriteCheeseFoods);

print_r($favoriteCheeseFoods);
// On the next line use array_unshift to add another cheesey food to the *beginning* of the array:

array_unshift($favoriteCheeseFoods, 'Cheesestick');
// Use print_r() on the next line to check out your array and verify that it worked:
print_r($favoriteCheeseFoods);

// Another example...

$names = ['Billy', 'Joe', 'Suzy', 'Zach'];

// Notice that these names are alphabetized.
// Check out this function I made that returns an array in the *reverse* order.
// I put some comments to help you understand it

function reverseArray($originalArray) { // Notice that it takes an array as an argument
  $newArray = []; // I create a new, empty array to build the reversed version

  while (!empty($originalArray)) { // Do a while loop -- keep going until we've finished popping off values from the original array
    $newArray[] = array_pop($originalArray); // Pop a value (from the END of the old array) and put it in the new one
  }

  return $newArray;
}

// Alright, let's see this baby in action! Uncomment the print_r() line and run this script.
$reversedNames = reverseArray($names);
print_r($reversedNames);

// In your own words, explain how the function I created works:
//
// first we create our array $names. Then we want to run a function that passes the argument $originalArray. Inside our curly braces we put a while loop
// since we wnat the code do run "while" a condition we specify remains true. In this case, we specify that "while" our argument ($originalArray)
// evaluates to "not empty" or "false" then we want the loop to "pop" a value off the end of the array and put in the new one, specified by the array $newArray[]
// We then want to "return" the value in our $newArray and repeat the loop until the $originalArray is "empty" fulfilling our "while" loop.
