<?php
  $hostname = "localhost";
  $username = "tendouxy";
  $password = "9k;1DWgRS3v]2f";
  $dbname = "tendouxy_main";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
