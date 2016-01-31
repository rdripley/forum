<?php require('header.php'); ?>

<?php require('database.php'); ?>

<h1> My Account </h1>

<h1> Update Password </h1>

<form action="new_password.php" method="post">
	<h3> New Password
	</h3>
		<input name="New Password" placeholder="Password">
	<h3> Confirm New Password
	</h3>
		<input name="Confirm Password">
	<button type="submit"> Submit </button>
</form>

<?php require('footer.php'); ?>