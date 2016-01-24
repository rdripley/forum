<?php

require('init_form.php');

session_start();

if ($_SESSION['user'] === NULL) {
	header("Location: http://rdripley.com/forum");
}

if (formIsBeingSubmitted()) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$authorId = $_SESSION['user_id'];
	$date = new DateTime();
	$date = $date->format('Y-m-d H:i:s');

	$db = new Database();
	$db->query("INSERT INTO threads (title, author_id) VALUES (\"$title\", \"$authorId\")");
	$threadId = $db->getLastInsertedId();
	$db->query("INSERT INTO posts (author_id, content, thread_id, date) VALUES (\"$authorId\", \"$content\", \"$threadId\" ,\"$date\")");

	header("Location: http://rdripley.com/forum");
}

?>

<?php require('header.php'); ?>

<h3>Create a New Thread</h3>

<hr>

<form action="make_thread.php" method="post">
	<p>
		Title:
		<input name="title" placeholder="Some cool title">
	</p>

	<hr>

	<section>
		Contents:
			<textarea name="content" placeholder="Enter your initial message here"></textarea>

			<br>

			<button type="submit">
				Submit
			</button>
	</section>
</form>

<?php require('footer.php'); ?>
