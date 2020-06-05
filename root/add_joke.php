<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
//start session
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//connect to database
include "db_connect.php";
?>
<!-- navbar -->
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
        if(isSet($_SESSION['username'])){
          echo '<a class="navbar-brand" href="#">Welcome ' . $_SESSION["username"] . '</a>';
        }
        else{
          echo '<a class="navbar-brand" href="#">Not Welcome</a>';
        }
      ?>
    </div>
  </div>
</nav>
<?php
//if not logged in, can't add information
if(! isset($_SESSION['username'])){
  echo "<legend>Login to add information</legend>";

  //echo "<a href="login_form.php" class="btn btn-info" role="button" style="margin:20px">Login</a>"
  //echo "<a href="register_new_user.php" class="btn btn-info" role="button" style="margin:20px">Register</a><br>"
  exit;
}
//add slash vs "
$new_joke_question = addslashes($_GET["newjoke"]);
$new_joke_answer = addslashes($_GET["newanswer"]);
$userid = $_SESSION['userid'];

echo "<legend>Data Added</legend>";
echo "<p>Question: $new_joke_question </p>";
echo "<p>Answer: $new_joke_answer </p>";
echo "<p>By: $_SESSION[username]</p>";

//add data to SQL
$sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_id) VALUES (null, '$new_joke_question', '$new_joke_answer', '$userid')";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

//display all jokes
include "search_all_jokes.php";

?>

</body>
</html>
