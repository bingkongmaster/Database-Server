<?php

session_start();

if(! isset($_SESSION['username'])){
  echo "Login to add info<br>";

  //echo "<a href="login_form.php" class="btn btn-info" role="button" style="margin:20px">Login</a>"
  //echo "<a href="register_new_user.php" class="btn btn-info" role="button" style="margin:20px">Register</a><br>"
  exit;
}

include "db_connect.php";
$new_joke_question = $_GET["newjoke"];
$new_joke_answer = $_GET["newanswer"];
$userid = $_SESSION['userid'];

$new_joke_question = addslashes($new_joke_question);
$new_joke_answer = addslashes($new_joke_answer);
//Search database for key word
echo "<h1>Added</h2>";
echo "<h2>Question: $new_joke_question </h2>";
echo "<h2>Answer: $new_joke_answer </h2>";
echo "<h2>Username: $_SESSION[username]</h2>";
echo "<h2>ID: $_SESSION[userid]</h2>";

$sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_id) VALUES (null, '$new_joke_question', '$new_joke_answer', '$userid')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

include "search_all_jokes.php";

?>

<!-- Button -->
<a href="index.php" class="btn btn-info" role="button" style="margin:20px;">Return</a>
<!-- Return Button end -->
