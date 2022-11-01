<?php
	date_default_timezone_set('Asia/Manila');
	require_once 'conn.php';
	session_start();
	
	if(ISSET($_POST['save'])){
		$file_name = $_FILES['video']['name'];
		$file_temp = $_FILES['video']['tmp_name'];
		$file_size = $_FILES['video']['size'];
		$file_name2 = $_FILES['thumbnail']['name'];
		$file_temp2 = $_FILES['thumbnail']['tmp_name'];
		$file_size2 = $_FILES['thumnail']['size'];
		$file2 = explode('.', $file_name2);
		$end2 = end($file2);
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();
				$person = $_SESSION['unique_id'];
        $header = $_POST['header'];
				$location = 'video/'.$name.".".$end;
				$location2 = 'thumbnail/'.$name."th.".$end;
				$id = rand(1, 1000000);
				if(move_uploaded_file($file_temp, $location)){
     move_uploaded_file($file_temp2, $location2);
					mysqli_query($conn, "INSERT INTO `video` VALUES('', '$name', '$location', '$header', '$person', '$id', '$location2')") or die(mysqli_error());
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