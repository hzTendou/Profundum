<?php 

  session_start();

  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
          
  include_once "header.php";
  ?>
  	<html>
  <style>
.wrapper{
  max-width: 900px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
			<head>
			    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "602d658b-4dbf-478f-a22b-2175a3b48a23",
      safari_web_id: "",
      notifyButton: {
        enable: true,
      },
    });
  });
</script>
				<title>Anasayfa</title>
				<link rel="stylesheet" href="style.css" />
				<link rel="stylesheet" href="/TenTube/css/bootstrap.css" />
					<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
			</head>
			<body>
			    <div class="wrapper">
			    <nav style="color: black; font-size: 20px;">
			      <div style="color:black;">
			          <div class="dropdown">
			              			<a href="#">
				<h2 class="glyphicon glyphicon-home" style="color: black;"></h2>
			</a>
  <button class="dropbtn"><i class="glyphicon glyphicon-list"></i> Kategoriler</button>
  <div class="dropdown-content">
			        <style>
			        a{
			          margin-left: 20px;
			          color: black;
			        }
			          </style>
		
	   
	
          
						<a href="feedback.html" style="font-color: black;">
						  <span class="glyphicon glyphicon-envelope">
						 Feedback
							</a>
							</a>
                                        <a href="TenTube" style="font-color: #000;">
                                          <span class="glyphicon glyphicon-upload"> Paylaşımlar</span>
                                        
</a>
                                        <a href="GrupChat" style="font-color: #000;">
                                          <span class="glyphicon glyphicon-th">
                                        Gruplar
                                        </span>
                                        </a>
                                         <a href="/profile.php?user_id=<?php echo $_SESSION['unique_id']; ?>"><span class="glyphicon glyphicon-user" style="border-radius: 13px;"> Profil</span></a>
                                         <a href="/GlobalChat"><span class="glyphicon glyphicon-globe" style="border-radius: 13px;"> GlobalChat</span></a>
                                         <a href="TendouAppDowload.html" style="font-color: #000;">
                                          <span class="glyphicon glyphicon-phone">
                                        Uygulama
                                        </span>
                                        </a>
                                    
                                          </div>
</div>
                                        </div>
					
					</nav>
					
                                       <br>
                                 
				

			</body>
			</html>
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  
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
    <section class="users"><br>
      <br>
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span style="margin: 5px;" ><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['rol']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>" class="logout">Çıkış yap</a>
      </header>
      <div class="search">
        <span class="text">Sohbet edeceğin kişiyi seç!</span>
        <input type="text" placeholder="İsim ara...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>

<style>
    .dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 215px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>