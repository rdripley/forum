<?php 

	require('database.php');

	session_start();

	$id = $_SESSION['user_id'];

	$threadId = $_POST['thread_id'];

	$content = $_POST['content'];

	$db = new Database();

	$query = "DELETE FROM posts WHERE id= 6 AND thread_Id= 8";

	$db->query($query);

	header("Location: http://rdripley.com/forum/view_thread.php?id=$threadId");

?>