<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<?php
//connect to DB
include "db_connect.php";
//password hash encryption
include 'Bcrypt.php';
//start session
session_start();
?>
<!-- navigation bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Koogle</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="register_new_user.php">Register</a></li>
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
//data from register_new_user.php
$new_username = $_GET['username'];
$new_password1 = $_GET['password1'];
$new_password2 = $_GET['password2'];

//hash encryption
$bcrypt = new Bcrypt(15);

$hashed_password = $bcrypt->hash($new_password1);
$isGood = $bcrypt->verify($new_password1, $hashed_password);

//check username duplication
$sql = "SELECT * FROM users where username = '$new_username'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

if($result->num_rows > 0){
  echo "<h3>The username already exists!" . "</br></h3>";
}
//check passsword1=password2
else if($new_password1 != $new_password2){
  echo "<h3>Passwords are different!" . "</br></h3>";
}
//Can register: add userid, username, and hashed passwword to sql
else{
  if(strlen($new_password1) == 0){
    echo "password must be > 0";
    exit;
  }
  $sql = "INSERT INTO users (id, username, password) VALUES (null, '$new_username', '$hashed_password')";
  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

  if($result){
    echo "<legend>Registeration success!</legend>";
    echo "<p>Added Username: " . $new_username . "</br></p>";
  }
  else{
    echo "<legend>Registeration failed!</legend>";
  }
}

?>


<!--<a href="index.php" class="btn btn-info" role="button" style="margin:20px;">Return</a>-->

</body>
</html>
