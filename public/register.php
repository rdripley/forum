<?php

require('database.php');

session_start();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$formIsBeingSubmitted = $requestMethod === 'POST';

if ($formIsBeingSubmitted) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$db = new Database();
	$db->query("INSERT INTO users (username, password) VALUES (\"$username\", \"$password\")");

	header("Location: http://rdripley.com/forum");
	die();
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
	</body>
</html>
