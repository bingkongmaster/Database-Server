<html>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    * {
        font-family:Arial, Helvetica, sans-serif;
    }
  </style>
</head>
<body>
<?php

//error
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

//bring all information table combined with username table
$sql = "
  SELECT JokeID, Joke_question, Joke_answer, users_id, username
  FROM Jokes_table
  JOIN users ON users.id = jokes_table.users_id";

$result = $mysqli->query($sql);
?>
<div id="accordion">
<?php
//output the table
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h3>$row[Joke_question]</h3>";
    echo "<div><p>$row[Joke_answer] <br>By: $row[username]</p></div>";
  }
} else {
  echo "0 results";
}
?>
</div>
<!-- javascripts -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="display_accordion.js"></script>
</body>
</html>
