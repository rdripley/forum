<?php require('header.php'); ?>

<h3>Create a New Thread</h3>

<hr>

<p>
	Title:
	<input placeholder="Some cool title">
</p>

<hr>

<section>
	Contents:
	<form action="make_thread.php">
		<textarea placeholder="Enter your initial message here"></textarea>

		<br>

		<button type="submit">
			Submit
		</button>
	</form>
</section>

<?php require('footer.php'); ?>
