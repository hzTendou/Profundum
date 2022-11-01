

<?php 
  session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status']="true";
  }
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<head>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Global Chat </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="stylesheet" href="/stylechat.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="stylesheet" href="/TenTube/css/bootstrap.css" />
</head>
<body style="background-color: A0A0A0;">
    <center>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="/users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="global.jpg" alt="">
       <div class="details">
          <span>Global&nbsp;Chat</span> 
          <p></p>
        </div>
        <button type="button" class="btn btn-primary" style="margin-left: 70px;" data-toggle="modal" data-target="#settings"><h5 class="glyphicon glyphicon-cog">Ayarlar</h5></button>
</header>
      <div class="chat-box">
      <?php
               $sql = mysqli_query($conn, "SELECT * FROM globalchatmsg ORDER BY id ASC");
       if(mysqli_num_rows($sql) > 0){ 
        while($row2 = mysqli_fetch_array($sql)){
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = 
          '{$row2['person']}' ");
            $row3 = mysqli_fetch_assoc($sql3);

        ?>
        <?php
        if($row2['person'] == 101){
                      echo ' <div class="chat incoming">
                                <img src="anonim.png" style="border-radius: 50%;" alt="">
                                <div class="details">
                                  <span style="margin: 5px; color: black; font-size: 10px; background-position: left;">ANONIM</span>
                                    <p>'. $row2['msg'] .'</p>
                                                                  </div>  </div> ';

                                
        }
        else{
          echo ' <div class="chat incoming">
                                <img src="/php/images/'. $row3['img'] .'" style="border-radius: 50%;" alt="">
                                <div class="details">
                                  <span style="margin: 5px; color: black; font-size: 10px;"> '. $row3['fname'] .'</span>
                                    <p>'. $row2['msg'] .'</p>
                                                                  </div>  </div> ';
        }
        }
        }
                else{
                  echo '<div class="text">Mesaj yok, mesaj gönderildiğinde burda olacak.</div>';
                }
                ?>
      </div>
      <?php
      if($_SESSION['status'] == "true"){
        ?>
      <form action="sendmsg.php" method="POST" class="typing-area" enctype="multipart/form-data">   
      <input type="text" name="sender" value="101" hidden>
        <input type="text" name="msg" class="input-field" placeholder="Mesaj gir..." autocomplete="off">
        <button type="submit" class="active"><i class="fab fa-telegram-plane"></i></button>
      </form>
      <?php
      }
      ?>
      <?php
       if($_SESSION['status'] == "false"){
        ?>
      <form action="sendmsg.php" method="POST" class="typing-area" enctype="multipart/form-data">   
      <input type="text" name="sender" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
        <input type="text" name="msg" class="input-field" placeholder="Mesaj gir..." autocomplete="off">
        <button type="submit" class="active"><i class="fab fa-telegram-plane"></i></button>
      </form>
      <?php
      }
      ?>
    </section>
  </div>
  <div class="modal fade" id="settings" aria-hidden="true">
  <div class="col-md-3"></div>
						<div class="col-md-6 well">
              <h2>Anonim mod: </h2>
              <form action="#" class="settings">            
         <a href="on.php" style="text-decoration: none; color: white;">  <button type="button" id="on" class="btn btn-primary" style="background: green;"><h5 class="glyphicon glyphicon-ok">Aç</h5></button> </a>
         <a href="off.php" style="text-decoration: none; color: white;">    <button type="button" id="off" class="btn btn-primary" style="margin-left: 10px; background: red;"><h5 class="glyphicon glyphicon-remove">Kapat</h5></button> </a>
            
            </div>
  </div>
              </div>
    </center>
<script src="/TenTube/js/jquery-3.2.1.min.js"></script>
<script src="/TenTube/js/bootstrap.js"></script>
</body>
<style>
.chat-area header{
  background: white;
  display: flex;
  align-items: center;
  padding: 18px 30px;
}
.chat-area header .back-icon{
  color: #333;
  font-size: 18px;
}
.chat-area header img{
  height: 45px;
  width: 45px;
  margin: 0 15px;
  border-radius: 50%;
}
.chat-area header .details span{
  font-size: 17px;
  font-weight: 500;
}
.chat-box{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-box .chat{
  margin: 15px 0;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
}
.chat-box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-box .incoming img{
  height: 35px;
  width: 35px;
}
.chat-box .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: #fff;
  color: #333;
  border-radius: 18px 18px 18px 0;
}
.typing-area {
  background-color:white;
  padding: 18px 30px;
  display: flex;
  justify-content: space-between;
}
.typing-area input{
  height: 45px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  border: none;
  outline: none;
  background: #333;
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
}
.typing-area button.active{

  opacity: 1;

  pointer-events: auto;
}

/* Responive media query */
@media screen and (max-width: 450px) {
  .form, .users{
    padding: 20px;
  }
  .form header{
    text-align: center;
  }
  .form form .name-details{
    flex-direction: column;
  }
  .form .name-details .field:first-child{
    margin-right: 0px;
  }
  .form .name-details .field:last-child{
    margin-left: 0px;
  }

  .users header img{
    height: 45px;
    width: 45px;
  }
  .users header .logout{
    padding: 6px 10px;
    font-size: 16px;
  }
  :is(.users, .users-list) .content .details{
    margin-left: 15px;
  }

  .users-list a{
    padding-right: 10px;
  }

  .chat-area header{
    padding: 15px 20px;
  }
  .chat-box{
    min-height: 400px;
    padding: 10px 15px 15px 20px;
  }
  .chat-box .chat p{
    font-size: 15px;
  }
  .chat-box .outogoing .details{
    max-width: 230px;
  }
  .chat-box .incoming .details{
    max-width: 265px;
  }
  .incoming .details img{
    height: 30px;
    width: 30px;
  }
  .chat-area form{
    padding: 20px;
  }
  .chat-area form input{
    height: 40px;
    width: calc(100% - 48px);
  }
  .chat-area form button{
    width: 45px;
  }
}
</style>

</html>
