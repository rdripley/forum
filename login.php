<?php

require('database.php');

$username = $_POST['username'];
$password = $_POST['password'];

$db = new Database();
$result = $db->query('SELECT * FROM users WHERE username = "$username" AND password = "$password"');

$loginSuccessful = ($result && count($result->fetch_all()) > 0);

if ($loginSuccessful) {
  $_SESSION['user'] = $username;
  header("Location: http://rdripley.com/forum");
} else {
  header("Location: http://rdripley.com/forum/login-failed");
}
