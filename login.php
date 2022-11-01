<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  } 
?>

<?php include_once "header.php"; ?>
<body>
<style>
.wrapper{
  max-width: 900px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
  <title>Giriş yap</title>
  <div class="wrapper">
    <section class="form login">
      <header>Giriş yap</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Eposta</label>
          <input type="text" name="email" placeholder="Eposta" required>
        </div>
        <div class="field input">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="Şifre" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Devam et">
        </div>
      </form>
      <div class="link">Henüz kaydolmadınız mı? <a href="index.php">Şimdi üye olun</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
