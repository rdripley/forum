<?php 

	require('database.php');

	session_start();

	$authorId = $_SESSION['author_id'];

	$threadId = $_POST['thread_id'];

	$content = $_POST['content'];

	$db = new Database();

	$query = "DELETE FROM posts WHERE author_id=, thread_id=, content=,";

	$db->query($query);

	header("Location: http://rdripley.com/forum/view_thread.php?id=$threadId");

?>