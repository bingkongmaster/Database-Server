<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Koogle</h1>

<?php

include "db_connect.php";
//data from register_new_user.php
$new_username = $_GET['username'];
$new_password1 = $_GET['password1'];
$new_password2 = $_GET['password2'];

echo "Added Username: " . $new_username . "</br>";
echo "Added Passwword:" . $new_password1 . "</br>";

//check username duplication
$sql = "SELECT * FROM users where username = '$new_username'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

if($result->num_rows > 0){
  echo "The username already exists!" . "</br>";
}
//check passsword1=password2
else if($new_password1 != $new_password2){
  echo "Passwords are different!" . "</br>";
}
//register user
else{
  $sql = "INSERT INTO users (id, username, password) VALUES (null, '$new_username', '$new_password1')";
  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

  if($result){
    echo "Registeration success!" . "</br>";
  }
  else{
    echo "Registeration error!" . "</br>";
  }
}

?>


<a href="index.php" class="btn btn-info" role="button" style="margin-top:30px;">Return</a>

</body>
</html>
