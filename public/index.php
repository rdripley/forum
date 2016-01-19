<?php require('header.php'); ?>

<?php 

require('database.php');

$db = new Database();
$query = "SELECT users.username as author_name, threads.id, threads.title, posts.date FROM `threads` " .
	"JOIN users ON users.id = threads.author_id " .
	"JOIN posts ON posts.thread_id = threads.id " . 
	"ORDER BY date DESC";

$threads = array();

$results = $db->query($query);

while ($result = $results->fetch_assoc()) {
	array_push($threads, $result);
}

?>
<form action="make_thread.php" id="newthread">
	<input type="submit" value="Make a New Thread">
</form>

<section>
	<table class="thread-table">
		<tr>
			<th>Post Title</th>
			<th>Author</th>
			<th>Most Recent Post</th>
		</tr>

		<?php
			foreach ($threads as $thread) { ?>
				<tr>
					<td>
						<a href="view_thread.php"><?= $thread['title']; ?></a>
					</td>
					<td><?= $thread['author_name']; ?></td>
					<td><?= date('n/j/Y H:i', strtotime($thread['date'])); ?></td>
				</tr>

				<?php
			}
		?>
	</table>
</section>

<?php require('footer.php'); ?>
