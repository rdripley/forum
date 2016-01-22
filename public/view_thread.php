<?php require('header.php'); ?>

<?php 

require('database.php');

$db = new Database();
$threadsquery = "SELECT threads.*, users.username as author_name FROM threads" .
	"JOIN users ON users.id = threads.author_id" .
	"WHERE threads.id = 1";


$postsquery = "SELECT posts.*, users.username as author_name FROM `posts`" .
	"JOIN users ON users.id = posts.author_id" .
	"WHERE posts.thread_id = 1"
	"ORDER BY posts.date ASC";


/*I'm not sure what to change for the rest of this PHP code */
$threads = array();

$results = $db->query($threadsquery);

while ($result = $results->fetch_assoc()) {
	array_push($threads, $result);
}

?>

<hr>

<h3><?= $thread['title']; ?></h3>

<p>
	<em>
		By <a><?= $thread['author_name']; ?></a>
	</em>
</p>

<hr>

<div class="post">
	<p class="post_details">
		<?= $thread['author_name']; ?> | <?= date('n/j/Y H:i', strtotime($thread['date'])); ?>
	</p>

	<p>
		<?= $thread['title']; ?>
	</p>

	<p>
		First you take some apples and you put them in a pie crust. Then you put it in the oven on 400 degrees and bake it until the pie's done.
	</p>
</div>

<div class="post">
	<p class ="post_details">
		RDRipley | Mon Nov 30, 2015 11:51 AM
	</p>

	<p>
		Dude, that's nothing. My wife's pie is way better.
	</p>
</div>

<br>

<form action="reply.php">
	<textarea placeholder="Enter your reply here..."></textarea>

	<br>

	<button type="submit">
		Submit
	</button>
</form>

<?php require('footer.php'); ?>
