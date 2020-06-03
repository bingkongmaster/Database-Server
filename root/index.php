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

<legend>Home Page</legend>

<!-- link buttons -->
<a href="register_new_user.php" class="btn btn-info" role="button" style="margin:20px;">Register</a>
<a href="login_form.php" class="btn btn-info" role="button" style="margin:20px;">Login</a>
<a href="index.php" class="btn btn-info" role="button" style="margin:20px;">Return</a>

<?php

include "db_connect.php";
//include "search_all_jokes.php";
?>

<!-- Start of bootstrap search UI -->

<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search Input</label>
  <div class="col-md-5">
    <input id="keyword" type="search" name="keyword" placeholder="e.g. France" class="form-control input-md">
    <p class="help-block">Search keyword</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>

<!-- End of bootstrap search UI -->

<!-- Start of bootstrap add UI -->

<form class="form-horizontal" action="add_joke.php">
<fieldset>

<!-- Form Name -->
<legend>Add</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newjoke">Enter input</label>
  <div class="col-md-6">
  <input id="newjoke" type="text" name="newjoke" placeholder="Input 1" class="form-control input-md" required="">
  <span class="help-block">* Required field</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanswer">Enter input</label>
  <div class="col-md-6">
  <input id="newanswer" type="text" name="newanswer" placeholder="Input 2" class="form-control input-md" required="">
  <span class="help-block">* Required field</span>
  </div>
</div>

<!-- add data Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Add data</button>
  </div>
</div>

</fieldset>
</form>

<!-- End of bootstrap add UI -->

<?php
//include "search_keyword.php";

$mysqli->close();
?>

</body>
</html>
