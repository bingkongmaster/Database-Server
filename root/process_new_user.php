<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<?php
include "db_connect.php";
include 'Bcrypt.php';
session_start();
?>

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
//data from register_new_user.php
$new_username = $_GET['username'];
$new_password1 = $_GET['password1'];
$new_password2 = $_GET['password2'];

//hash encryption
//$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);
$bcrypt = new Bcrypt(15);

$hashed_password = $bcrypt->hash($new_password1);
$isGood = $bcrypt->verify($new_password1, $hashed_password);
//echo $hash;
//echo "isgood: " . $isGood;
//echo "pw: " . $new_password1;


//echo "Added Passwword:" . $new_password1 . "</br>";

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
//register user
else{
  //check SQL injection
  /*
  preg_match('/[0-9]+/', $new_password1, $matches);
  if(sizeof($matches) == 0){
    echo "The password must have more than 0 character";
    exit;
  }
  */
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
