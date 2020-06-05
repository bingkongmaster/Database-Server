<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<?php

include "db_connect.php";
session_start();
//include "search_all_jokes.php";
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Koogle</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="register_new_user.php">Register</a></li>
      <li class="active"><a href="login_form.php">Login</a></li>
      <li><a href="process_logout.php">Logout</a></li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="navbar-header">
      <?php
        //echo "<span style='float:right;'> Hello </span>";
        if(isSet($_SESSION['username'])){
          echo '<a class="navbar-brand" href="#">Welcome ' . $_SESSION["username"] . '</a>';
        }
        else{
          echo '<a class="navbar-brand" href="#">Not Welcome</a>';
        }
      ?>
    </div>
</nav>

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
