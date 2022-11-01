<link rel="stylesheet" href="/style.css">
<link rel="stylesheet" href="/TenTube/css/bootstrap.css">
<script src="/TenTube/js/jquery-3.2.1.min.js"></script>
<script src="/TenTube/js/bootstrap.js"></script>
<script src="users.js"></script>
  <style>
.wrapper{
  max-width: 900px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>
<div class="wrapper">
  <title>Gruplar</title>
  	  <a href="/users.php" class="navbar-brand">Geri dön</a><br>
  <div class="details">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><h3 class="glyphicon glyphicon-plus">Grup oluştur</h3></button>
    </div>
    <br>
    <br>

  <?php
  include_once "header.php";
  include_once "config.php";
  $query = mysqli_query($conn, "SELECT * FROM `grup's` ORDER BY `grup_id` ASC") or die(mysqli_error());

?>
 <div class="modal fade" id="add" aria-hidden="true">
   <div class="modal-dialog">
			<form action="save_grup.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
                                                 
                                                        <label> Grup ismi </label><br>
                                                        <input type="text" name="header" placeholder="İsim..."/><br>
    <label>Grup profili</label>
								<input type="file" name="image" class="form-control-file"/>
              <script> 
var maxAmount = 40;
function textCounter(textField, showCountField) {
    if (textField.value.length > maxAmount) {
        textField.value = textField.value.substring(0, maxAmount);
	} else { 
        showCountField.value = maxAmount - textField.value.length;
	}
}
</script>
</head>
<body>
<form>
  <label>Açıklama</label><br>
<textarea name="ta" rows="6" style="width:150px;" onKeyDown="textCounter(this.form.ta,this.form.countDisplay);" onKeyUp="textCounter(this.form.ta,this.form.countDisplay);"></textarea>
<br>
<input readonly type="text" name="countDisplay" size="3" maxlength="40" value="40">/40</input>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Çık</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Oluştur</button>
					</div>
				</div>
			</form>
		</div>
   </div>
   
      <span class="text" style="margin: 7px; font-size: 18px; ">Sohbet edeceğin grubu seç!</span>
      <?php
      if(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_array($query)){
  
  ?>
   <div class="users-list" style="margin: 7px;">
      <a href="GrupChat.php?grup_id=<?php echo $row['unique_id']; ?>">
                <div class="content">
                    <img src="<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span style="font-size: 15px;"><?php echo $row['name']; ?> </span><span style="margin: 5px; color: #808080; font-size: 8px;"><?php echo $row['time']; ?></span>
                 </div>
           
                </a>
   </div>
   <?php 
  }
      }
  else{
    echo '<div style="margin: 15px; font-size: 14px; "
 >Grup yok, oluşturulduğunda burda gözükecek</div>
 ';
  }
  ?>

</div>
  <style>
.wrapper{
  max-width: 900px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}
</style>