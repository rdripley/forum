<?php
	session_start();
	var_dump($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>rdripley.com</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$("#flip").click(function(){
					$("#panel").slideToggle("slow");
					});
				});
		</script>

		<script>
			$(document).ready(function(){
				$("#fullactivity").click(function(){
					$("#insideactivity").slideToggle("slow");
					});
				});
		</script>

		<style>

			.clearfix:after {
				content: "";
				display: table;
				clear: both;
			}

			#panel, #flip {
				padding: 0px;
				text-align: center;
				background-color: lightgrey;
				border: solid 1px #c3c3c3;
			}

			#panel {
				padding: 25px;
				display: none;
			}

			html {
				width: auto;
			}

			body {
				margin: 0;
			}

			.container {
				min-width: 1000px;
				width: 1000px;
				margin: 0 auto;
			}

			h4 {
				background-color: lightgrey;
				color: white;
				padding: 10px;
				margin: 0px;
				border: 1px solid grey;
			}

			.menu {
				padding: 0px;
				margin: 0px;
			}

			.menu li {
				list-style-type: none;
				padding: 5px;
				margin: 0;
				display: inline;
				background-color: lightgrey;
				color: white;
				font-size: 18px;
				float: left;
				border: 1px solid grey;
			}

			.menu li a:hover {
				background-color: grey;
				color: white;
			}

			#insideactivity, #fullactivity {
				display: block;
				float: right;
				background-color: lightgrey;
				color: white;
				position: fixed;
				bottom: 500px;
				right: 270px;
				transform: rotate(270deg);
				transform-origin: center top 0;
				padding: 0px 30px 0px 30px;
				text-align: center;
				border: solid 1px #c3c3c3;
			}

			#insideactivity {
				padding: 25px;
				display: none;
				position: fixed;
				bottom: 500px;
				right: 270px;
				transform: rotate(270deg);
			}

			.clickable {
				cursor: pointer;
			}

			section {
				margin-top: 25px;
			}

			.thread-table, .thread-table th, .thread-table td {
				border: 1px solid #000;
			}

			.thread-table {
				background-color: lightgrey;
				width: 100%;
			}

			th, td {
				background-color: white;
				padding: 10px;
			}

			.post {
				border: 1px solid #000;
				padding: 10px;
			}

			.post__details {
				font-weight: bold;
			}

			textarea {
				width: 400px;
				height: 100px;
			}

			#newthread {
				position: absolute;
				top: 40px;
				right: 300px;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<h4>rdripley.com</h4>

			<ul class="menu clearfix">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="Account.html">Account</a>
				</li>

				<li>
					<?php
						$loggedIn = ! empty($_SESSION['user']);

						if ($loggedIn) {
							echo "Welcome, " . $_SESSION['user']; ?>
							<a href="logout.php">
								Log out
							</a>
							<?php
						} else { ?>
							<div id="flip" class="clickable">Log-in</div>

							<div id="panel">
								<form action="login.php" method="post">
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
										Log-in
									</button>

									<br>

									<a href="register.php">
										Sign up now!
									</a>
								</form>
							</div>
							<?php
						}
					?>
				</li>
			</ul>

			<!--
			<nav>
				<div id="fullactivity">Activity</div>

					<div id="insideactivity">
						This is where all the activity is!
					</div>
			</nav>
			-->
