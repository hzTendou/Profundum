<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
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
  <title>Kayıt ol</title>
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
<head><meta name="abstract" content="Sosyal Medya">
<meta name="author" content="Tendou, admin@tendou.xyz"> 
  <meta name="keywords" content="HTML, CSS, JavaScript, Sosyal Medya, Sohbet, Youtube, Tendou, Famil, Tendou xyz">
<meta name="description" content="Burası insanların sohbet etmesi için kurulmuş özgür bir yerdir video paylaşa bilir grup kurup gruplara katıla bilirsiniz"></head>
  <div class="wrapper">
    <section class="form signup">
      <header>Kayıt ol</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>İsim</label>
            <input type="text" name="fname" placeholder="İsim..." required>
          </div>
        </div>
        <div class="field input">
          <label>Eposta adresi</label>
          <input type="text" name="email" placeholder="Eposta" required>
        </div>
        <div class="field input">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="Şifre" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Profil fotoğrafı seç</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Devam et">
        </div>
      </form>
      <div class="link">Daha önce hesap açtın mı?<a href="login.php"> Şimdi giriş yap</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
