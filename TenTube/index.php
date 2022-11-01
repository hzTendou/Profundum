<?php
require 'conn.php';
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: /login.php");
  }
    $sql1 = mysqli_query($conn, "SELECT * FROM `likes` WHERE post_id = '{$fetch['unique_id']}'");
			  $count = mysqli_num_rows($sql1);
            ?>
<!DOCTYPE html>
<html lang="en">
  
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
	<head>
        <title>TenTube</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	</head>
<body
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="/users.php" class="navbar-brand">Anasayfa</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
		<h3 class="text-primary">           TenTube</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Video yükle</button>
		<br /><br />
		<hr style="border-top:3px solid;"/>
		<?php
			
			
			$query = mysqli_query($conn, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
			  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$fetch['person']}");
			  $row = mysqli_fetch_array($sql);
	  $sql1 = mysqli_query($conn, "SELECT * FROM `likes` WHERE post_id = '{$fetch['unique_id']}'");
			  $count = mysqli_num_rows($sql1);
			   $sql3 = mysqli_query($conn, "SELECT * FROM `disslikes` WHERE post_id = '{$fetch['unique_id']}'");
			  $count1= mysqli_num_rows($sql3);
			    $sql4 = mysqli_query($conn, "SELECT * FROM `view` WHERE post_id = '{$fetch['unique_id']}'");
			  $count2= mysqli_num_rows($sql4);
		?>
		<div style="float: left;">
			<div class="col-md-4" style="word-wrap:break-word;">
				<br />
           

		 <a href="watch.php?id=<?php echo $fetch['unique_id']; ?>" style="padding: 5px; background: #fff;">

				                    
<form method="GET" action="watch.php">
<div style="margin-left: 13px;">
    				<img src="<?php echo $fetch['thumbnail']; ?>" style="height: 120px; width: 180px;"><br>
				<input type="text" value="<?php echo $fetch['unique_id']; ?>" name="id" hidden>
			
				  	<h5 style="width: 120px;"><?php echo $fetch['header']; ?></h5>
				  		<div style="width: 200px;">
            <img src="/php/images/<?php echo $row['img']; ?>" style="height: 10px; weight: 10px; border-radius: 5px;"> <span style="margin: 5px; font-size: 10px;" ><?php echo $row['fname']. " " . $row['lname']; ?></span><br>
            <span style="color: grey; font-size: 10px;">like <?php echo $count; ?> | disslike <?php echo $count1; ?> | görüntülenme <?php echo $count2; ?></span>
            </div>
                              </div>
    
			  
				  
</div>
</a>
</form>
				</div>
				</div>
				<?php
}
?>
</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
						<div class="col-md-3"></div>
						<div class="col-md-6 well">
						    	
						  
							<div class="form-group">
                                                       
                             <form enctype="multipart/form-data" method="POST" action="save_video.php">
                                                        <label> Gönderi Başlığı </label><br>
                                                        <input type="text" name="header" placeholder="Başlık..." required/><br>
								<label>Gönderi dosyası</label>
      <input class="file-input" type="file" name="file" hidden>
								<label>Kapak Fotoğrafı</label>
								<input type="file" name="thumbnail" class="form-control-file" required/>
							
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Çık</button>
						<button name="save" type="submit" class="btn btn-primary" onclick="upload()"><span class="glyphicon glyphicon-save"></span> Yükle</button>
						</div>
						</div>
			</form>
			                                <section class="progress-area"></section>
    <section class="uploaded-area"></section>
    					</div>
				</div>
		</div>
	</div>
	

	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>