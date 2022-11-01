<?php
require "conn.php";
session_start();
$person = $_SESSION['unique_id'];
$post_id = $_POST['id'];
$sql = mysqli_query($conn, "SELECT * FROM `disslikes` WHERE person = '{$person}' AND `post_id` = '{$post_id}' ") or die(mysqli_error());
if(mysqli_num_rows($sql) == 0){
 mysqli_query($conn, "INSERT INTO disslikes VALUES('', '$person', '$post_id')") or die(mysqli_error());
   mysqli_query($conn, "DELETE FROM `likes` WHERE person = '{$person}' AND `post_id` = '{$post_id}' ") or die(mysqli_error());
}
elseif(mysqli_num_rows($sql) > 0){
  mysqli_query($conn, "DELETE FROM `disslikes` WHERE person = '{$person}' AND `post_id` = '{$post_id}' ") or die(mysqli_error());
}
 $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
 header("Location: ". $url);
	?>