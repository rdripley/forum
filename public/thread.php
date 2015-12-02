<?php require('header.php'); ?>


<form action="post_reply.php" method="post">
	Title:
	<input type="text">
<h1>
	This is the title of the thread.
</h1>

<div class="thread-post">
	This will be where the thread post will go. The first thread post from the thread author will be the first post on the page.
</div>
	<br>

<form>
	<textarea>
		Add a new comment...
	</textarea>

	<br>
	<input type="submit">

</form>

<?php require('footer.php'); ?>
