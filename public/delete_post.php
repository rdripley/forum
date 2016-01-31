<?php 

	require('database.php');

	session_start();

	$postId = $_POST['id'];
	$authorId = $_SESSION['user_id'];

	$db = new Database();

	// Get the threadId
	$query = "SELECT * FROM posts WHERE id= $postId";
	$results = $db->query($query);
	$post = $results->fetch_assoc();
	$threadId = $post['thread_id'];

	// Delete post from Database
	$query = "DELETE FROM posts WHERE id= $postId AND author_id= $authorId";
	$db->query($query);

	// Check if thread had any posts left
	$query = "SELECT * FROM posts where thread_id= $threadId";
	$results = $db->query($query);
	if ($results->num_rows === 0) {
		$query = "DELETE FROM threads WHERE id= $threadId";
		$db->query($query);
		header("Location: http://rdripley.com/forum");
	} else {
		header("Location: http://rdripley.com/forum/view_thread.php?id=$threadId");
	}

?>