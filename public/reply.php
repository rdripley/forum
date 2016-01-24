<?php 

	require('database.php');

	session_start();

	$authorId = $_SESSION['user_id'];

	$threadId = $_POST['thread_id'];

	$content = $_POST['content'];

	$date = new DateTime();

	$date = $date->format('Y-m-d H:i:s');

	$db = new Database();

	$query = "INSERT INTO posts (`author_id`, `thread_id`, `content`, `date`) VALUES ($authorId, $threadId, \"$content\", \"$date\")";

	$db->query($query);

		header("Location: http://rdripley.com/forum/view_thread.php?id=$threadId");

?>

