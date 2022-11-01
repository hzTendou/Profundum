<?php
	date_default_timezone_set('Asia/Manila');
	require_once 'conn.php';
	session_start();
	
	if(ISSET($_POST['save'])){
		$file_name = $_FILES['photo']['name'];
		$file_temp = $_FILES['photo']['tmp_name'];
		$file_size = $_FILES['photo']['size'];
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('jpg', 'png', 'psd', 'jpeg', 'tiff', 'gif');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();
				$person = $_SESSION['unique_id'];
        $header = $_POST['header'];
				$location = 'photo/'.$name.".".$end;
				$id = rand(1, 1000000);
				if(move_uploaded_file($file_temp, $location)){
					mysqli_query($conn, "INSERT INTO `photo` VALUES('', '$name', '$location', '$header', '$person', '$id')") or die(mysqli_error());
					echo "<script>alert('Gönderi yüklendi')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}else{
				echo "<script>alert('Yanlış dosya formatı')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		}else{
			echo "<script>alert('Dosya yüklenemeyecek kadar büyük')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
	}
?>