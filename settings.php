<?php 
include_once "header.php";
include_once "php/config.php";
session_start();
$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `unique_id` = '{$_SESSION['unique_id']}' ");
?>

  
<style>
.wrapper{
  max-width: 1000px;
  width: 100%;
  border-radius: 16px;
  margin-top: none;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
<body>
  <div class="wrapper">
    <centre>
    <h1>Hesabın</h1>
  <form action="edit.php" enctype="multipart/form-data">
    <input class="input field" type="text" value="">
    </form>
    </centre>
    </div>
