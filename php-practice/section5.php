<?php

/**
 * SECTION 5 -- More Practice with functions
 *
 * WARNING -- YOU WILL BE READING A LOT OF CODE IN THIS SECTION
 */

// ==========================================

/**
 * 5.1 INTRODUCTORY RANT
 *
 * Remember, this is code we're dealing with. You can make the code do whatever
 * you want. Here are some examples of dumb/random things you can do just because you want to.
 */

// Here's a function that just returns the value that you pass into it
function returnArgument($value) {
  return $value;
}

// See how it works?
echo returnArgument('I am a string being passed into a function');

// Here's a function that takes the given array and returns the element at the given index from it
function getElementFromArray($arr, $index) {
  return $arr[$index];
}

// Note: You've see array elements accessed like $arr[0] or $arr['name']
// Notice above you can put a variable inside the square brackets too!
// Whatever's in the square brackets just has to evaluate to an index in that array.

// See how it works?
echo getElementFromArray(
  ['foo', 'bar'],
  1
).PHP_EOL;

// Notice I busted out that line into multiple lines. You can do that to make it easier to read.
// The above line of code is the same as this:
echo getElementFromArray(['foo', 'bar'], 1) . PHP_EOL;

// ... which is the same as this:
$strings = ['foo', 'bar'];
$message = getElementFromArray($strings, 1);
echo $message;
echo PHP_EOL;

/**
 * PROBLEM 1
 *
 * Explain in your own words why the above 3 examples of code are effectively
 * the same exact code, written in different ways.
 *
 * ANSWER:
 */

// ==========================================

/**
 * 5.2 DOCBLOCKS
 *
 * A DocBlock is a specifically formatted comment that tells you what a function does,
 * what PARAMETERS (arguments) it takes, and what it returns.
 *
 * Professional programmers usually put these above functions that they create.
 */

// A DocBlock looks like this:

/**
 * DESCRIPTION OF FUNCTION
 *
 * @param  TYPE_OF_PARAM        $nameOfParam       DESCRIPTION OF PARAM
 * @param  TYPE_OF_SECOND_PARAM $nameOfSecondParam DESCRIPTION OF SECOND PARAM
 * @return TYPE_OF_RETURN_VALUE                    DESCRIPTION OF RETURN VALUE
 */

// You'll catch on... :) The functions defined below have DocBlocks so you can
// start getting used to seeing them.

// ==========================================

/**
 * 5.3 USEFUL FUNCTIONS
 *
 * Functions are best when they're reusable. (When they do something you're
 * going to have to do over... and over... and over.)
 */

// Here's a useful function. Read the code until you fully understand what it's doing and how.

/**
 * Gets the smallest value from the given array
 * (Essentially assumes that all values are numeric, but that may not be the case.)
 *
 * @param  array $arr The array from which to get the smallest value
 * @return mixed      The smallest value
 */
function getSmallestValue($arr) {
  sort($arr); // Use the built-in PHP array sort function to sort the array elements from lowest to highest

  return $arr[0];
}

// Check it in action!
echo getSmallestValue([234, 6, 23, -45, 1100, -5]) . PHP_EOL;
echo getSmallestValue(['Joseph', 'Paul', 'Andrew']) . PHP_EOL; // It works with strings too! (Alphabetizes them)

/**
 * PROBLEM 2
 *
 * Explain in your own words how the above function works.
 *
 * ANSWER:
 */

// ==========================================

// Notice the DocBlock doesn't have an @return annotation because this function
// doesn't return anything.

/**
 * Print out the given lines on separate lines using the PHP_EOL to separate them
 *
 * @param  array  $lines An array of strings to print out as separate lines
 */
function printLines(array $lines) {
  foreach ($lines as $line) {
    echo $line.PHP_EOL;
  }
}

// See it in action!
echo printLines(['For those about to rock', 'We salute you']);
echo printLines(['Roses are red', 'Violets are blue', 'These are supposed to rhyme', 'Aren\'t they?']);

/**
 * PROBLEM 3
 *
 * Explain in your own words how the above function works.
 *
 * ANSWER:
 */

// ==========================================

// OKAY YOUR TURN!

/**
 * PROBLEM 4
 *
 * Write a function below that takes 2 numbers ($min and $max) and prints out numbers to the screen starting
 * from $min and ending with $max.
 *
 * So if $min is 5 and $max is 10, it would print out: 5 6 7 8 9 10
 */


// ==========================================

// Okay my turn again...

/**
 * 5.4 USING FUNCTIONS IN CLASSES
 */

// Classes can be used as tools. Here is a class that represents a "counter"

class Counter {
  private $count = 0; // Note, you can set a default value for properties like this

  /**
   * Increase count by 1
   */
  public function increment() {
    $this->count++;
  }

  /**
   * Reset count back to 0
   */
  public function reset() {
    $this->count = 0;
  }

  /**
   * @return integer The current value of the count
   */
  public function getCount() {
    return $this->count;
  }
}

// Watch it in use
$myCounter = new Counter();
$myCounter->increment();
$myCounter->increment();
$myCounter->increment();
echo $myCounter->getCount(); // What should this print out? Answer:
echo PHP_EOL;
$myCounter->reset();
$myCounter->increment();
echo $myCounter->getCount(); // What should this print out? Answer:
echo PHP_EOL;

/**
 * Here is another class that represents an "emailer". You "carry" it around in
 * your code and populate it with a message to send, and you can add email addresses
 * to it as you discover all of the recipients that need to hear the message.
 */

class Emailer {
  private $emailAddresses = [];
  private $message;
  private $subject;

  /**
   * Set the email message
   *
   * @param string $msg The message
   */
  public function setMessage($msg) {
    $this->message = $msg;
  }

  /**
   * Set the email subject
   *
   * @param string $sbj The subject
   */
  public function setSubject($sbj) {
    $this->subject = $sbj;
  }

  /**
   * Add an email address to the list of addresses that will receive this email
   *
   * @param string $address The email address to receive this message
   */
  public function addEmailAddress($address) {
    array_push($this->emailAddresses, $address);
  }

  /**
   * This function would normally be set up to actually send emails, but we're
   * just simulating sending emails by printing out to the console
   */
  public function send() {
    echo 'Sending email with subject "' . $this->subject . '" and message "' . $this->message . '" ';
    echo 'to the following email addresses: ';
    echo implode(', ', $this->emailAddresses);
  }
}

// See it in action!
$welcomeEmailer = new Emailer();
$welcomeEmailer->setSubject('Welcome to my site!');
$welcomeEmailer->setMessage('Please [click here] for special deals!');

// Let's add some addresses...
$welcomeEmailer->addEmailAddress('paul@example.com');
$welcomeEmailer->addEmailAddress('russ@example.com');
$welcomeEmailer->addEmailAddress('rasmus@lerdorf.com');

// And let's send the emails!
$welcomeEmailer->send();

// See how that's kind of elegant? The Emailer object carries around the details of
// what we're doing in a nice, encapsulated way. All of the details are in one place,
// and once we add the message/subject or an email address, we don't have to worry about
// remembering what we set it to. We just hit send() when we're ready.

// Also, notice that we didn't expose any of the properties of this class as public, but it
// was still able to do its job.

// ==========================================

// Your turn again!

/**
 * PROBLEM 5
 *
 * Create a ShoppingCart class with the following methods:
 *
 * addItem : Takes the $name of an item and its $cost and adds it to the cart
 * getItemCount : Returns the number of items currently in your shopping cart so it can be displayed
 * getTotalCost : Gets the total cost of all the items in your shopping cart so we can charge them
 *
 * The hard part -- it's up to YOU to determine what properties need to exist
 * and what code needs to exist in these methods.
 *
 * HINT: You can represent a single item in the cart as an associative array like this:
 *
 * $item = [
 *   'name' => 'Pringles',
 *   'cost' => 3.99
 * ];
 */
