<?php 

	require('database.php');

	session_start();

	$postId = $_POST['id'];

	$authorId = $_SESSION['user_id'];

	$db = new Database();

	$threadsQuery = "DELETE FROM threads WHERE id= $postId AND author_id= $authorId";

	$postsQuery = "DELETE FROM posts WHERE id= $postId AND author_id= $authorId";

	$db->query($threadsQuery);

	$db->query($postsQuery);

	header("Location: http://rdripley.com/forum");

?>