<?php 

	require('database.php');

	session_start();

	$postId = $_POST['id'];

	$authorId = $_SESSION['user_id'];

	$db = new Database();

	$query = "DELETE FROM posts WHERE id= $postId AND author_id= $authorId";

	$db->query($query);

	header("Location: http://rdripley.com/forum/view_thread.php?id=$threadId");

?>