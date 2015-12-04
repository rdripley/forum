<?php require('header.php'); ?>


	<h3>
	Create a New Thread
	</h3>

	<hr>


	Title:
	<input placeholder="Some cool title">


	<hr>

	Contents:
		<form action="make_thread.php">

			<textarea placeholder="Enter your initial message here">
			</textarea>

			<br>

			<button type="submit">
				Submit
			</button>
		</form>
<?php require('footer.php'); ?>
