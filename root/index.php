<html>
<head>
<body>
<h1>my page</h1>

<?php

include "db_connect.php";
//include "search_all_jokes.php";
?>

<form action="search_keyword.php">
  Search:<br>
  <input type="text" name="keyword"><br>
  <input type="submit" value="Submit">
</form>

<hr>
<form action="add_joke.php">
  Input1:<br>
  <input type="text" name="newjoke"><br>

  Input2:<br>
  <input type="text" name="newanswer"><br>
  <input type="submit" value="Submit">
</form>

<?php
//include "search_keyword.php";

$mysqli->close();
?>

</body>
</html>