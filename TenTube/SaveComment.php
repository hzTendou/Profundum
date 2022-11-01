<?php
require "conn.php";
$person = $_POST['person'];
$post_id = $_POST['post_id'];
$comment = $_POST['comment'];
mysqli_query($conn, "INSERT INTO comments VALUES('','$comment', '$person', '$post_id')") or die(mysqli_error());
$url = $_SERVER['HTTP_REFERER'];
header("Location: ". $url);
?>