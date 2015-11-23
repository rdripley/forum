<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>

    <title>
      rdripley.com
    </title>

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
        min-height: 100%;
        width: auto;
      }

      body {
        min-height: 100%;
        margin: 0;
        min-width: 100%;
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
        right: 250px;
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
        right: 250px;
        transform: rotate(270deg);
      }

      .clickable {
        cursor: pointer;
      }

      table {

      }

      table, th, td {
        border: 1px solid black;
        padding: 5px;
        margin: 5px;
        width: 450px;
        height: 25px;
      }

      table {
        background-color: lightgrey;
      }

      th, td {
        background-color: white;
      }

      .thread-post {
        background-color: lightgrey;
        width: 100%;
        height: 300px;
      }

    </style>
  </head>

  <body>

    <div class="container">
      <h4>
        rdripley.com
      </h4>


      <ul class="menu">
        <li><a href="/Home/default.asp">
          Home
          </a>
        </li>

        <li><a href="/Account/default.asp">
          Account
          </a>
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

              <div id="flip" class="clickable"> Log-in </div>

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

      <nav>
        <div id="fullactivity">Activity</div>

          <div id="insideactivity">
            This is where all the activity is!
          </div>
      </nav>
