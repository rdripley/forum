<?php 
require('header.php');
require('init_form.php');

if ($_SESSION['user'] === NULL) {
	header("Location: http://rdripley.com/forum");
}

if (formIsBeingSubmitted()) {
	if ($_POST['confirm_password'] === $_POST['new_password'] && strlen($_POST['new_password']) >= 8) {
	$db = new Database();
	$result = "UPDATE users SET password= '$_POST[new_password]' WHERE id= $_SESSION[user_id]";
	$db->query($result);
	echo "Password changed successfully";
	} elseif ($_POST['confirm_password'] != $_POST['new_password']){
		echo "Error: Password must match";
	} else {
		echo "Error: Password must be at least 8 characters";
	}
}

?>

<h1> My Account </h1>

<h2> Update Password </h2>

<form action="account.php" method="post">
	<h3> New Password
	</h3>
		<input name="new_password" placeholder="Password">
	<h3> Confirm New Password
	</h3>
		<input name="confirm_password">
	<button type="submit"> Submit </button>
</form>

<?php require('footer.php'); ?>