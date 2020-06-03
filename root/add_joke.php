<?php

include "db_connect.php";
$new_joke_question = $_GET["newjoke"];
$new_joke_answer = $_GET["newanswer"];

$new_joke_question = addslashes($new_joke_question);
$new_joke_answer = addslashes($new_joke_answer);
//Search database for key word
echo "<h2>Added: $new_joke_question </h2>";
echo "<h2>Added: $new_joke_answer </h2>";
$sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer) VALUES (null, '$new_joke_question', '$new_joke_answer')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

include "search_all_jokes.php";

?>

<!-- Button -->
<a href="index.php" class="btn btn-info" role="button" style="margin:20px;">Return</a>
<!-- Return Button end -->
