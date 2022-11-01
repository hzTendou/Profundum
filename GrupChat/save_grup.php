<?php
	require_once 'config.php';
	session_start();
	date_default_timezone_set("Europa/Istanbul");
  
	
	if(ISSET($_POST['save'])){
		$file_name = $_FILES['image']['name'];
		$file_temp = $_FILES['image']['tmp_name'];
		$file_size = $_FILES['image']['size'];
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('png', 'jpg', 'jpeg', 'tiff', 'webp', 'gif');
			if(in_array($end, $allowed_ext)){
				$person = $_SESSION['unique_id'];
        $header = $_POST['header'];
        $name = date("Ymd").time();
        $id = rand(1, 1000000);
				$location = 'image/'.$name.'.'.$end;
				$kurucu = $_SESSION['unique_id'];
				$text = $_POST['ta'];
				$time = date("Y/n/d H:i");
				if(move_uploaded_file($file_temp, $location)){
					mysqli_query($conn, "INSERT INTO `grup's` VALUES('', '$header', '$text', '$id', '$kurucu', '$time', '$location')") or die(mysqli_error());
					echo "<script>alert(' Grup oluşturuldu ')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
			}else{
				echo "<script>alert('Yanlış fotoğraf formatı (grup fotoğrafı)'</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		}else{
			echo "<script>alert('grup fotoğrafı yüklenemeyecek kadar büyük')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
	}
?>