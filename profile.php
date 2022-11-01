<?php
session_start();
?>
<style>
.wrapper{
  width: 100%;
  width: 100%;
  border-radius: 16px;
  margin-top: none;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
           
            <script src="/TenTube/js/jquery-3.2.1.min.js"></script>
<script src="/PostShare/js/bootstrap.js"></script>
            <link rel="stylesheet" href="style.css" />

<?php 
include_once "php/config.php";
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            $row = mysqli_fetch_assoc($sql);
         
          
  
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
  if($_SESSION['unique_id'] == $user_id){
    ?>
     <!DOCTYPE html>
     
         <head>
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
           
            <script src="/PostShare/js/jquery-3.2.1.min.js"></script>
<script src="/PostShare/js/bootstrap.js"></script>
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" type="text/css" href="/PostShare/css/bootstrap.css"/>
            </head>
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
            <section class="users">
          <div class="wrapper" style="margin: 10px;">
            <a class="btn btn-primary" href="/users.php"><span class="glyphicon glyphicon-arrow-left" style="border-radius: 13px;"> Geri</span></a><br>
                  <header>
                         
        <div class="content">
          <img src="php/images/<?php echo $row['img']; ?>" alt="" style="margin: 5px;">
          <div class="details">
            <span style="margin: 5px;" ><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['rol']; ?></p>
          </div>
        </div>
       
      </header>
     
      
    
      
      
      
      
      
 
     
        <?php
       
    $sql = mysqli_query($conn, "SELECT * FROM video WHERE person = {$user_id}");
    if(mysqli_num_rows($sql) == 0){

        echo '<div class="col-md-6 well"> paylaştığın video yok</div>';

    }elseif(mysqli_num_rows($sql) > 0){
       while($fetch = mysqli_fetch_array($sql))
       {
?>
<div class="wrapper">
<br><br>
        	 <img src="/php/images/<?php echo $row['img']; ?>" style="height: 15px; weight: 15px; border-radius: 5px;"> <span style="margin: 5px;" ><?php echo $row['fname']. " " . $row['lname']; ?></span>
                              </a>
				<h3><?php echo $fetch['header']?></h3>
				<h5 class="text-primary">Dosya ismi: <?php echo $fetch['video_name']?></h5>
		
			<div class="col-md-8">
				<video width="100%" height="240" controls style="border: 5px;">
					<source src="/TenTube/<?php echo $fetch['location']?>">
				</video>
				</div>
			</div>
			</div>
        	
				
				
				<?php
       }
    }
       ?>
       
          </div>
          
          
         
      
          <?php
  }
 
  else if($_SESSION['unique_id'] != $user_id) {
        ?>
        <!DOCTYPE html>
     
          <head>
           
            <script src="/PostShare/js/jquery-3.2.1.min.js"></script>
<script src="/PostShare/js/bootstrap.js"></script>
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" type="text/css" href="/PostShare/css/bootstrap.css"/>
            </head>
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
            <section class="users">
          <div class="wrapper" style="margin: 10px;">
            <a class="btn btn-primary" href="/users.php"><span class="glyphicon glyphicon-arrow-left" style="border-radius: 13px;"> Geri</span></a><br>
                  <header>
                         
        <div class="content">
          <img src="php/images/<?php echo $row['img']; ?>" alt="" style="margin: 5px;">
          <div class="details">
            <span style="margin: 5px;" ><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['rol']; ?></p>
       <a href="/chat.php?user_id=<?php echo $row['unique_id']; ?>">
         <h4 class="glyphicon glyphicon-comment">Sohbet</h4>
         </a>
          </div>
        </div>
       
      </header>
   
      
    
      
      
      
      
      
      
      <div class="modal fade" id="video" aria-hidden="true">
        <?php
       
    $sql = mysqli_query($conn, "SELECT * FROM video WHERE person = {$user_id}");
    if(mysqli_num_rows($sql) == 0){

        echo '<div class="col-md-6 well">kullanıcının paylaştığı video yok</div>';

    }elseif(mysqli_num_rows($sql) > 0){
       while($fetch = mysqli_fetch_array($sql))
       {
?>
<div class="col-md-6 well">
  	<br><br>
        	 <img src="/php/images/<?php echo $row['img']; ?>" style="height: 15px; weight: 15px; border-radius: 5px;"> <span style="margin: 5px;" ><?php echo $row['fname']. " " . $row['lname']; ?></span>
                              </a>
				<h3><?php echo $fetch['header']?></h3>
				<h5 class="text-primary">Dosya ismi: <?php echo $fetch['video_name']?></h5>
		
		
					<div class="col-md-8">
				<video width="100%" height="240" controls style="border: 5px;">
					<source src="/TenTube/<?php echo $fetch['location']?>">
				</video>
				</div>
			</div>
			</div>
        	
				
				
				<?php
       }
    }
       ?>
       
          </div>
          
          
        
              <br>
              <br>
            
 <?php
}
?>
</div>
</header>
</section>
</div>
        </div>
      </div>
      </html>
      