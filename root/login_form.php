<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Koogle</h1>

<?php

include "db_connect.php";
//include "search_all_jokes.php";
?>

<!-- Start of bootstrap search UI -->

<form class="form-horizontal" action="process_login.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- username input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-5">
    <input id="username" type="text" name="username" placeholder="Username" class="form-control input-md">
    <p class="help-block">Enter username</p>
  </div>
</div>

<!-- password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Password</label>
  <div class="col-md-5">
    <input id="password" type="password" name="password" placeholder="Password" class="form-control input-md">
    <p class="help-block">Enter password</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>

<!-- End of bootstrap search UI -->

<?php
//include "search_keyword.php";

$mysqli->close();
?>

</body>
</html>
