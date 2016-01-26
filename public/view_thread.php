<?php require('header.php'); ?>

<?php 

require('database.php');

$threadId = $_GET['id'];

$db = new Database();
$threadsQuery = "SELECT threads.*, users.username as author_name FROM threads " .
	"JOIN users ON users.id = threads.author_id " .
	"WHERE threads.id = $threadId";


$postsQuery = "SELECT posts.*, users.username as author_name FROM `posts` " .
	"JOIN users ON users.id = posts.author_id " .
	"WHERE posts.thread_id = $threadId " .
	"ORDER BY posts.date ASC";

$posts = array();

$postResults = $db->query($postsQuery);

while ($result = $postResults->fetch_assoc()) {
	array_push($posts, $result);
}

$threadResults = $db->query($threadsQuery);

$thread = $threadResults->fetch_assoc();

?>

<hr>

<h3><?= $thread['title']; ?></h3>

<p>
	<em>
		By <a><?= $thread['author_name']; ?></a>
	</em>
</p>

<hr>

<?php
	foreach($posts as $post) { ?>
	<div class="post">
		<p class="post_details">
			<?= $post['author_name']; ?> | <?= date('n/j/Y H:i', strtotime($post['date'])); ?>
		</p>

		<p>
		<?= $post['content']; ?>
		</p>

<?php 
	if ($_SESSION['user'] === $post['author_name']) { ?>
		<form action="delete_post.php" method="post">
			<input type="hidden" name="thread_id" value= "<?= $threadId;?>">
				<button type="submit">
					Delete
				</button>
		</form>
	<?php } ?>
	</div>
	<?php } ?>

<br>

<?php
	if ($_SESSION['user']) { ?>
		<form action="reply.php" method="POST">
			<input type="hidden" name="thread_id" value="<?= $threadId;?>">
			<textarea name="content" placeholder="Enter your reply here..."></textarea>

			<br>

			<button type="submit">
				Submit
			</button>
		</form>

	<?php } ?>

<?php require('footer.php'); ?>
