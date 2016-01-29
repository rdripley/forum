<?php require('header.php'); ?>

<?php 

require('database.php');

$db = new Database();
$query = "SELECT users.username as author_name, threads.id, threads.title, posts.date FROM `threads` " .
	"JOIN users ON users.id = threads.author_id " .
	"JOIN posts ON posts.thread_id = threads.id " . 
	"GROUP BY threads.id ORDER BY date DESC";

$threads = array();

$results = $db->query($query);
var_dump($threads);
while ($result = $results->fetch_assoc()) {
	array_push($threads, $result);
}

?>

<?php
	if ($_SESSION['user']) { ?>
		<form action="make_thread.php" id="newthread">
			<input type="submit" value="Make a New Thread">
		</form>
	<?php } ?>

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
						<a href="view_thread.php?id=<?= $thread['id']; ?>"><?= $thread['title']; ?></a>
					</td>
					<td><?= $thread['author_name']; ?></td>
					<td><?= date('n/j/Y H:i', strtotime($thread['date'])); ?>
						<?php 
						if ($_SESSION['user'] === $thread['author_name']) { ?>
							<form action="delete_thread.php" method="post">
								<input type="hidden" name="id" value= "<?= $thread['id']; ?>">
									<button type="submit">
										Delete
									</button>
								</input>
							</form>
						<?php } ?>
					</td>
				</tr>

				<?php
			}
		?>
	</table>
</section>
<?php require('footer.php'); ?>
