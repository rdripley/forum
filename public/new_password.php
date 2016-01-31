<?php 

require('database.php');

session_start();

if ($_SESSION['user'] === NULL) {
	header("Location: http://rdripley.com/forum");
}

$username = $_POST['username'];
$password = $_POST['password'];

$db = new Database();
$result = $db->query("SELECT * FROM users WHERE username = \"$username\" AND password = \"$password\"");

?>