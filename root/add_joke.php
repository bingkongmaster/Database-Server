<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
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
<?php

if(! isset($_SESSION['username'])){
  echo "<legend>Login to add info</legend>";

  //echo "<a href="login_form.php" class="btn btn-info" role="button" style="margin:20px">Login</a>"
  //echo "<a href="register_new_user.php" class="btn btn-info" role="button" style="margin:20px">Register</a><br>"
  exit;
}

$new_joke_question = addslashes($_GET["newjoke"]);
$new_joke_answer = addslashes($_GET["newanswer"]);
$userid = $_SESSION['userid'];

$new_joke_question = addslashes($new_joke_question);
$new_joke_answer = addslashes($new_joke_answer);
//Search database for key word
echo "<legend>Data Added</legend>";
echo "<h2>Question: $new_joke_question </h2>";
echo "<h2>Answer: $new_joke_answer </h2>";
echo "<h2>Username: $_SESSION[username]</h2>";
echo "<h2>ID: $_SESSION[userid]</h2>";

$sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_id) VALUES (null, '$new_joke_question', '$new_joke_answer', '$userid')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

include "search_all_jokes.php";

?>

<!-- Return Button end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
