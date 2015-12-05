<?php

require('init_form.php');

session_start();

if (formIsBeingSubmitted()) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$db = new Database();
	$db->query("INSERT INTO users (username, password) VALUES (\"$username\", \"$password\")");

	$_SESSION['user'] = $username;
	header("Location: http://rdripley.com/forum");
}

?>

<html>
	<head>
		<title>
			register
		</title>
	</head>

	<body>

		<form method="POST">
			<label>
				Username
				<input type="text" name="username">
			</label>

			<br>

			<label>
				Password
				<input type="password" name="password">
			</label>

			<button type="submit">
				Register Now
			</button>

		</form>

		<br>

		<a href="index.html">
			Go back
		</a>
	</body>
</html>
