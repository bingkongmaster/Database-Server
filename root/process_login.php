<head>

<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];

echo "Login: " . $username . "/" . $password . "<br>";

//Search matching username/password
$stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ? and password = ?");
$stmt->bind_param("ss",$username, $password);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

?>

<?php
if ($stmt->num_rows > 0) {
  // output data of each row
  $row = $stmt->fetch();
  $userid = $row['id'];
  echo "Login success!<br>";
  $_SESSION['username'] = $uname;
  $_SESSION['userid'] = $userid;
} else {
  echo "No user found";
  $_SESSION = [];
  session_destroy();

}

echo "SESSION = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>
</div>
<!-- jQuery accodion UI end -->

<!-- Return Button start -->
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->

<!-- Button -->
<a href="index.php" class="btn btn-info" role="button" style="margin:20px;">Return</a>
<!-- Return Button end -->
