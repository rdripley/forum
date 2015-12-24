<?php

/**
 * SECTION 10 -- ASSOCIATIVE ARRAYS
 *
 * We already learned about numerically indexed arrays like ['foo', 'bar'] where $arr[0] would equal 'foo'.
 *
 * This section is about arrays where the programmer specifies the index of the elements manually:
 *
 * VOCABULARY:
 *   - A numerically indexed array can be referred to as a LIST because the indexes are insignificant
 *   - An associative array can be referred to as a MAP (or DICTIONARY) because it maps a key to its value
 */

$myCar = array(
  'make'  => 'Toyota',
  'model' => 'Prius',
  'year'  => 2006
);

// Remember, you use these the same as the other arrays, except the indexes are manually specified:
echo 'The make is ' . $myCar['make'] . PHP_EOL;

/**
 * PROBLEM 1
 *
 * Create an associative array called $movie that contains info about a movie.
 *
 * It should have the following keys: (indexes)
 *   - title
 *   - leadCharacter
 *   - hasSequel (this will be a boolean value)
 */

/**
 * 10.1 -- MULTI-DIMENSIONAL ARRAYS
 */

// One thing to know about arrays is that they can contain OTHER arrays:
$myCar['oilChangeDates'] = array('03-15-2015', '06-18-2015', '10-05-2015');

// You can print_r $myCar and see that it has an array within an array! (This is called a multi-dimensional array)
print_r($myCar);

// To access properties of a multidimensional array, you just use [] like you'd think:
echo $myCar['oilChangeDates'][0]; // Print out the first oil change date
echo PHP_EOL;

/**
 * 10.2 -- COLLECTIONS
 */

// Most of the time when you see multidimensional arrays, they will be "Collections"
// A "collection" is a term that essentially means a LIST of MAPS

// For example, this is a "Collection" of cars:
$cars = array(
  array('make' => 'Toyota', 'model' => 'Camry'),
  array('make' => 'Toyota', 'model' => 'Prius'),
  array('make' => 'Toyota', 'model' => 'Corolla'),
  array('make' => 'Toyota', 'model' => 'Yaris'),
  array('make' => 'Ford', 'model' => 'Fusion')
);

/**
 * PROBLEM 2
 *
 * Create a Collection of "Favorite Author" arrays. This should be a LIST of "author" MAPS,
 * and each "author" should have a `name` key and a `genre` key for whatever genre they write in.
 */

/**
 * PROBLEM 3
 *
 * Create a function that takes a collection of "Authors" (as we defined Authors above -- an
 * associative array with `name` and `genre` indexes) and loops over it, printing out the name of each other.
 */

/**
 * 10.3 -- COLLECTIONS WITH REAL OBJECTS
 */

// A lot of times, instead of representing collections of data as LISTS of MAPS,
// you'll instead see LISTS of OBJECTS.

// For example...

/**
 * A class representing the author of a book
 */
class Author {
  /**
   * Name of the author
   * @var string
   */
  public $name;

  /**
   * Genre in which the author typically writes
   * @var string
   */
  public $genre;

  /**
   * Constructor for setting name and genre
   * @param string $name  Name of the author
   * @param string $genre Author's typical genre
   */
  public function __construct($name, $genre) {
    $this->name = $name;
    $this->genre = $genre;
  }
}

$authors = [
  new Author('CS Lewis', 'Spiritual?'),
  new Author('JRR Tolkein', 'Fantasy'),
  new Author('Joel Osteen', 'Prosperity Gospel'), // Did you catch this comma? FYI it's legal PHP :-)
];

// Now instead of printing out $authors[0]['name'], I'd print out...
echo $authors[0]->name; // Because $authors[0] is an Author object

/**
 * PROBLEM 4
 *
 * Create a class to represent the different races in fantasy worlds (Orcs, humans, ogres, etc.)
 *
 * The class should be called Race.
 * It should hold the following information:
 *   - The name of the race
 *   - Typical weapons used by the race (make this an array)
 *   - Whether they're usually bad guys
 *
 * Then, create a collection of Race objects called $fantasyRaces
 */
