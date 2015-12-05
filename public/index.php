<?php require('header.php'); ?>

<form action="make_thread.php" id="newthread">
	<input type="submit" value="Make a New Thread">
</form>

<section>
	<table class="thread-table">
		<tr>
			<th>Author</th>
			<th>Date</th>
			<th>Post Title</th>
		</tr>

		<tr>
			<td>Paul</td>
			<td>9/1/2001</td>
			<td>
				<a href="view_thread.php">Sample Post</a>
			</td>
		</tr>

		<tr>
			<td>Russ</td>
			<td>10/10/2010</td>
			<td>
				<a href="view_thread.php">More Sample Stuff</a>
			</td>
		</tr>

		<tr>
			<td>Paul Russ</td>
			<td>9/10/2001</td>
			<td>
				<a href="view_thread.php">Combine Fake Data</a>
			</td>
		</tr>
	</table>
</section>

<?php require('footer.php'); ?>
