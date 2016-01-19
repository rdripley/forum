<?php

require('database.php');

session_start();

function formIsBeingSubmitted() {
	$requestMethod = $_SERVER['REQUEST_METHOD'];
	return ($requestMethod === 'POST');
}