<head>

<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
include "Bcrypt.php";
$username = $_POST['username'];
$password = $_POST['password'];

echo "Login: " . $username . "/" . $password . "<br>";

//Search matching username/password
$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);
echo "username: " . $username . "<br>";
echo "uname: " . $uname . "<br>";
if ($stmt->num_rows == 1){
  echo "One person found";
  $stmt->fetch();
  $bcrypt = new Bcrypt(15);
  //echo $bcrypt->hash($password);
  //echo $pw;
  if($bcrypt->verify($password, $pw)){
    echo "<h2>Login success!</h2><br>";
    $_SESSION['username'] = $uname;
    $_SESSION['userid'] = $userid;
    echo "<h2>Username: $_SESSION[username]</h2><br>";
    echo "<h2>ID: $_SESSION[userid]</h2><br>";
  }
  else{
    echo "Password is different<br>";
    $_SESSION = [];
    session_destroy();
  }
}
else{
  echo "No user found<br>";
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
