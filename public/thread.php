<?php require('header.php'); ?>

<h1>
	This is the title of the thread.
</h1>

<button type="submit">
	Add a Reply
</button>

<div class="thread-post">
	This will be where the thread post will go. The first thread post from the thread author will be the first post on the page.
</div>

<form>

	<textarea rows="4" cols="50" name="comment">
		Enter text here...
	</textarea>

	<br>
	<input type="submit">

</form>

<?php require('footer.php'); ?>
