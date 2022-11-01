<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
  <style>
.wrapper{
  max-width: 900px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
<body>
  
  <div class="wrapper">
    <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <section class="chat-area">
      <header>
        <?php 
          $grup_id = mysqli_real_escape_string($conn, $_GET['grup_id']);
          $sql = mysqli_query($conn, "SELECT * FROM `grup's` WHERE unique_id = {$grup_id}");
          $row = mysqli_fetch_array($sql);
      	$query = mysqli_query($conn, "SELECT * FROM `grupMsgs` WHERE here = {$grup_id}");
      	
      	
        ?>
        <title><?php echo $row['name']; ?></title>
        <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['name']; ?></span><br>
          <span  style="margin: 5px; color: #000000; font-size: 9px;"><?php echo $row['description']; ?></span>
          </div><br>
          </header>
      <div class="chat-box">
        
        <?php
       if(mysqli_num_rows($query) > 0){ 
        while($row2 = mysqli_fetch_array($query)){
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = 
          '{$row2['person']}' ");
            $row3 = mysqli_fetch_assoc($sql3);

        ?>
                       <div class="chat incoming">
                                <img src="/php/images/<?php echo $row3['img']; ?> " alt="">
                                <div class="details">
                                  <span style="margin: 5px; color: black; font-size: 10px;"><?php echo $row3['fname']. " " . $row3['lname']; ?> </span><span style="margin: 5px; color: #808080; font-size: 8px;"><?php echo $row2['time']; ?></span>
                                    <p><?php echo $row2['msg']; ?></p>
                                </div>
                                </div>
                                
                                <?php
        }
        }
                else{
                  echo '<div class="text">Mesaj yok, mesaj gönderildiğinde burda olacak.</div>';
                }
                ?>
      </div><br>
      <form method="POST" class="typing-area" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="message" class="input-field" placeholder="Mesaj gir..." autocomplete="off">
        <button type="submit" ><i style="backgroud-color: #000000; opacity: 3; pointer-events: auto;" class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
<?php 

    session_start();

    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        date_default_timezone_set("Europa/Istanbul");
  $time = date("Y/n/d H:i");
        if(!empty($message)){
            $sql4 = mysqli_query($conn, "INSERT INTO grupMsgs (msg_id,	person, here,	time,	msg)
                                        VALUES ('', '{$outgoing_id}', '{$grup_id}', '{$time}', '{$message}')") or die();
                                       ?>
<meta http-equiv="refresh" content="0; URL="GrupChat.php?grup_id=<?php echo $row['unique_id']; ?>" />
                                       <?php
    }
    }else{
        header("location: ../login.php");
    }
?>
 
  

</body>
</html>
