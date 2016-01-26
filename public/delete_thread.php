<?php 

	require('database.php');

	session_start();

	$id = $_SESSION['user_id'];

	$author_id = $_POST['author_id'];

	$db = new Database();

	$query = "DELETE FROM threads WHERE id= 6 AND author_id= 6";

	$db->query($query);

	header("Location: http://rdripley.com/forum");

?>