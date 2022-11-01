<?php
include_once "config.php";
$id = $_POST['sender'];
$msg = $_POST['msg'];
$msg_id = rand(3000, 100000);
mysqli_query($conn, "INSERT globalchatmsg VALUES(null, '$id', '$msg', '$msg_id')");
header("Location: index.php");
?>