<?php

echo 'Welcome to Notes!'.PHP_EOL.PHP_EOL;

define('ACTION_ADD', '1');
define('ACTION_LIST', '2');
define('ACTION_EXIT', '3');

$userNotes = file('notes.txt');

function syncToFile($userNotes) {
	file_put_contents('notes.txt', $userNotes);
}

while ($command !== ACTION_EXIT) {
	echo 'What do you want to do?'.PHP_EOL.
		'  (1) Add a note'.PHP_EOL.
		'  (2) Print all notes'.PHP_EOL.
		'  (3) Exit'.PHP_EOL.
		'  > ';

	$command = readline();

	switch ($command) {
		case ACTION_ADD:
			echo 'Type note here: ';
			$newNote = readline().PHP_EOL;
			array_push($userNotes, $newNote);
			syncToFile($userNotes);
			break;
		case ACTION_LIST:
			echo PHP_EOL. 'Notes: '.PHP_EOL;
			foreach ($userNotes as $value) {
				echo $value;
			}
			echo PHP_EOL;
			break;
		case ACTION_EXIT:
			break;
		default:
			echo PHP_EOL.'  ** That isn\'t a valid option!!! **'.PHP_EOL.PHP_EOL;
	}
}
