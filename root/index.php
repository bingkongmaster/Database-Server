<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
  <?php

  include "db_connect.php";
  session_start();
  /*
  echo "<h1>Koogle</h1>";
  if(isSet($_SESSION['username'])){
    echo "<h1>Welcome, $_SESSION[username]</h1>";
  }
  else{
    echo "<h1>Log in!</h1>";
  }
  */
  ?>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Koogle</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="register_new_user.php">Register</a></li>
        <li><a href="login_form.php">Login</a></li>
        <li><a href="process_logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="container-fluid">
      <div class="navbar-header">
        <li>
          <?php
            //echo "<span style='float:right;'> Hello </span>";
            if(isSet($_SESSION['username'])){
              echo '<a class="navbar-brand" href="#">Welcome ' . $_SESSION["username"] . '</a>';
            }
            else{
              echo '<a class="navbar-brand" href="#">Not Welcome</a>';
            }
          ?>
        </li>
      </div>
  </nav>
<!-- link buttons -->
<!--
<a href="register_new_user.php" class="btn btn-info" role="button" style="margin:20px;">Register</a>
<a href="login_form.php" class="btn btn-info" role="button" style="margin:20px;">Login</a>
<a href="index.php" class="btn btn-info" role="button" style="margin:20px;">Return</a>
-->


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
  <div class="col-md-5">
  <input id="newjoke" type="text" name="newjoke" placeholder="Input 1" class="form-control input-md" required="">
  <span class="help-block">* Required field</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanswer">Enter input</label>
  <div class="col-md-5">
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

<!-- Timer/auto-logout -->
<div ng-app="APP">
<timer interval="1000"><p style="text-align:right;">Online for: {{minutes}} minutes {{seconds}} seconds.</p></timer>
</div>

<!-- Timer Javascript -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
<script src="timer.js"></script>
<script src="activate_timer.js"></script>
<!-- Script to uses innerHTML -->

</body>
</html>
