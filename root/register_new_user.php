<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>
<body>
<h1>Koogle</h1>

<?php

include "db_connect.php";
//include "search_all_jokes.php";
?>

<!-- Start of bootstrap search UI -->

<form class="form-horizontal" action="process_new_user.php">
<fieldset>

<!-- Form Name -->
<legend>Register</legend>

<!-- username input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-5">
    <input id="username" type="text" name="username" placeholder="Your username" class="form-control input-md">
    <p class="help-block">* Please enter your username</p>
  </div>
</div>

<!-- password #1 input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password1">Password</label>
  <div class="col-md-5">
    <input id="password1" type="password" name="password1" placeholder="Your password" class="form-control input-md">
    <p class="help-block">* Please enter your password</p>
  </div>
</div>

<!-- password #2 input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Password</label>
  <div class="col-md-5">
    <input id="password2" type="password" name="password2" placeholder="Your password" class="form-control input-md">
    <p class="help-block">* Please confirm your password</p>
  </div>
</div>

<!-- create user Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Create</button>
  </div>
</div>

</fieldset>
</form>

<!-- End of bootstrap search UI -->

<?php
//include "search_keyword.php";

$mysqli->close();
?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
