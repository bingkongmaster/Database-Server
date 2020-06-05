<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<?php

//connect to DB
include "db_connect.php";
//encryption hash
include "Bcrypt.php";
//username/password from login_form
$username = $_POST['username'];
$password = $_POST['password'];

//start session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!-- navigation bar -->
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

//Search matching username/password securely
$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

//if found username, get information, check password with encryption.
if ($stmt->num_rows == 1){
  $stmt->fetch();
  $bcrypt = new Bcrypt(15);

  //if password is right, log in session
  if($bcrypt->verify($password, $pw)){
    echo "<legend>Login success!</legend>";
    $_SESSION['username'] = $uname;
    $_SESSION['userid'] = $userid;
    echo "<p>Username: $_SESSION[username]</p><br>";
    echo "<p>ID: $_SESSION[userid]</p><br>";
  }
  //if password is not right, end session
  else{
    echo "Password is different<br>";
    $_SESSION = [];
    session_destroy();
  }
}
//if no user is found, end session
else{
  echo "No user found<br>";
  $_SESSION = [];
  session_destroy();
}

?>

</body>
</html>
