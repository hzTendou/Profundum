<?php
	date_default_timezone_set('Asia/Manila');
	require_once 'conn.php';
	session_start();
	
	if(ISSET($_POST['save'])){
		$file_name = $_FILES['image']['name'];
		$file_temp = $_FILES['image']['tmp_name'];
		$file_size = $_FILES['image']['size'];
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('png', 'jpg', 'jpeg', 'tiff', 'webp', 'gif');
			if(in_array($end, $allowed_ext)){
				$type = $_POST['type'];
				$person = $_SESSION['unique_id'];
        $header = $_POST['header'];
        $name = date("Ymd").time();
				$location = 'images/'.$name.'.'.$end;
				$text = $_POST['ta'];
				$id = rand(1, 1000000);
				if(move_uploaded_file($file_temp, $location)){
					mysqli_query($conn, "INSERT INTO `story` VALUES('', '$type', '$location', '$header', '$text', '$person', '$id')") or die(mysqli_error());
					echo "<script>alert('Hikaye yüklendi ')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}else{
				echo "<script>alert('Yanlış fotoğraf formatı (kapak fotoğrafı)'</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		}else{
			echo "<script>alert('Kapak fotoğrafı yüklenemeyecek kadar büyük')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
	}
?>