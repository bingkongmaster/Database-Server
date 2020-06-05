<?php
  //destroy session and go home page
  session_start();

  $_SESSION = [];
  session_destroy();

  header("Location:index.php");
  exit;
 ?>
