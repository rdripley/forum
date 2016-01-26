<?php 

	require('database.php');

	session_start();

	$title = $_SESSION['title'];

	$author_id = $_POST['author_id'];

	$db = new Database();

	$query = "DELETE FROM threads WHERE title='What is the best video game?' AND author_id= 6";

	$db->query($query);

	header("Location: http://rdripley.com/forum");

?>