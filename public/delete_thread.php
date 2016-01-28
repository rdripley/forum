<?php 

	require('database.php');

	session_start();

	$threadId = $_POST['id'];

	$authorId = $_SESSION['user_id'];

	$db = new Database();

	$query = "SELECT * FROM threads WHERE id = $_GET['id'] AND author_id = $_SESSION['user_id']";

	$result = $db->query($query);

	if ($result === false) {
		header("Location: http://rdripley.com/forum");
	}

	$threadsQuery = "DELETE FROM threads WHERE thread_id= $threadId";

	$postsQuery = "DELETE FROM posts WHERE thread_id= $threadId AND author_id= $authorId";

	$db->query($threadsQuery);

	$db->query($postsQuery);

	header("Location: http://rdripley.com/forum");

?>