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
<h1>my page</h1>

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
    <input id="keyword" name="keyword" type="search" placeholder="e.g. France" class="form-control input-md">
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

<hr>
<form action="add_joke.php">
  Input1:<br>
  <input type="text" name="newjoke"><br>

  Input2:<br>
  <input type="text" name="newanswer"><br>
  <input type="submit" value="Submit">
</form>

<!-- Start of bootstrap add UI -->

<form class="form-horizontal" action="add_joke.php">
<fieldset>

<!-- Form Name -->
<legend>Search</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newjoke">Enter input</label>
  <div class="col-md-6">
  <input id="newjoke" name="newjoke" type="text" placeholder="input 1" class="form-control input-md" required="">
  <span class="help-block">* Required field</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanswer">Enter input</label>
  <div class="col-md-6">
  <input id="newanswer" name="newanswer" type="text" placeholder="input 2" class="form-control input-md" required="">
  <span class="help-block">* Required field</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Single Button</label>
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
