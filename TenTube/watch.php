<?php 
session_start();
$id = $_GET['id'];
$type = "video";
$back = htmlspecialchars($_SERVER['HTTP_REFERER']);

if($type == "video"){
require 'conn.php';
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
 
  if(!isset($_SESSION['unique_id'])){
    header("location: /login.php");
  }
  $view = mysqli_query($conn, "SELECT * FROM `view` WHERE `person` = '{$_SESSION['unique_id']}' AND `post_id` = '$id' ");
  if(mysqli_num_rows($view) == 0){
    mysqli_query($conn, "INSERT INTO view VALUES('', '{$_SESSION['unique_id']}', '$id')") or die(mysqli_error());
  }
            ?>
<!DOCTYPE html>
<html>
   <link rel="stylesheet" href="style.css">
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
        <title>Gönderi paylaşım </title>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="js/js.js"></script>
	</head>
<body>
<body>
    <div class="col-md-3"></div>
	<div  class="col-md-3"></div>
	  <a href="index.php" class="navbar-brand">Geri dön</a><br>
		<h3 class="text-primary">İyi seyirler...</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		
		<br /><br />
		<hr style="border-top:3px solid;"/>
		<?php
			
			
			$query = mysqli_query($conn, "SELECT * FROM `video` WHERE `unique_id` = '{$id}'") or die(mysqli_error());
			while($fetch = mysqli_fetch_array($query)){
			  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$fetch['person']}");
			  $row = mysqli_fetch_array($sql);
	  $sql1 = mysqli_query($conn, "SELECT * FROM `likes` WHERE post_id = '{$fetch['unique_id']}'");
			  $count = mysqli_num_rows($sql1);
			   $sql3 = mysqli_query($conn, "SELECT * FROM `disslikes` WHERE post_id = '{$fetch['unique_id']}'");
			  $count1= mysqli_num_rows($sql3);
		?>
		<div class="col-md-12">
			<div class="col-md-4" style="word-wrap:break-word;">
				<br />
           
              
		
				<br>
					<h3 style="width: 600px;"><?php echo $fetch['header']?></h3>
					<div style="width: 600px;">
					    				<h5 class="text-primary">Dosya ismi: <?php echo $fetch['video_name']?></h5>
					<form action="LikeSave.php" method="POST" enctype="multipart/form-data">
					  
				  <input type="text" name="id" value="<?php echo $fetch['unique_id']; ?>" hidden>
				 
				  <button type="submit" class="btn btn-primary" style="background: lightgreen;"><i class="glyphicon glyphicon-thumbs-up"><?php echo $count; ?></i></button>
				</form>
				 	<form action="DisslikeSave.php" method="POST" enctype="multipart/form-data">
				  <input type="text" name="id" value="<?php echo $fetch['unique_id']; ?>" hidden>
				  <button type="submit" class="btn btn-primary" style="background: red;margin-top: 5px;"><i class="glyphicon glyphicon-thumbs-down"><?php echo $count1; ?></i></button>
				  </form>
				</div>
			</div>
			
<div style="margin-top: 10px;">

                        <img src="/php/images/<?php echo $row['img']; ?>" style="height: 35px; weight: 35px; border-radius: 5px;"> <span style="margin: 5px;" ><?php echo $row['fname']. " " . $row['lname']; ?></span>
                              </div><br>
                              					
				<iframe width="100%" height="600px" controls style="border: 5px; margin-top: 150px;" src="<?php echo $fetch['location'];?>"></iframe><br>
	
                              </div>

	
                              	<form method="POST" action="SaveComment.php" class="typing-area" enctype="multipart/form-data" autocomplete="off">
		
 <input type="text" name="person" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
  <input type="text" name="post_id" value="<?php echo $_GET['id']; ?>" hidden>
        <input type="text" name="comment" class="input-field" placeholder="Yorum gir..." autocomplete="off">
        <button type="submit" ><i style="backgroud-color: #000000; opacity: 3; pointer-events: auto;" class="fab fa-telegram-plane"></i></button>
      </form>
      <?php
      $sqlca = mysqli_query($conn, "SELECT * FROM comments WHERE post_id = '{$id}' ");
     
      while($rowc = mysqli_fetch_assoc($sqlca)){
         
      $sqlua = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$rowc['person']}'");
      $rowu = mysqli_fetch_assoc($sqlua);
      
?>
  <div class="chat incoming">

                                <img width="30px" height="30px" style="border-radius: 8px;" src="/php/images/<?php echo $rowu['img']; ?> " alt="">
                                <div class="details">
                                  <span style="margin: 5px; color: black; font-size: 10px;"><?php echo $rowu['fname']. " " . $rowu['lname']; ?></span>
                                  </div>
                                  </div>
                                  <div style="max-width: 500px; max-height: 180px; background-color: grey;color: white; border-radius: 5px; margin-left: 30px;">
                <p style="margin-left:5px;"><?php echo $rowc['comment']; ?></p>
                </div>
                                </div>
                                
                                
		
				
		

		
				<?php
      }
}
?>
			
                              		</div>
	</div>
		</div>
		
	
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<?php
}
?>