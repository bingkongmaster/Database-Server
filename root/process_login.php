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
include "Bcrypt.php";
$username = $_POST['username'];
$password = $_POST['password'];
?>

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
//echo "Login: " . $username . "/" . $password . "<br>";

//Search matching username/password
$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);
//echo "username: " . $username . "<br>";
//echo "uname: " . $uname . "<br>";
if ($stmt->num_rows == 1){
  //echo "One person found";
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

/*
echo "SESSION = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/
?>
</div>
<!-- jQuery accodion UI end -->

<!-- Return Button start -->
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->

<!-- Return Button end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
