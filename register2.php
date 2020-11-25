
<?php
include("inc/db.php");
session_start();

    $_SESSION['token'] = bin2hex(random_bytes(32));

$token = $_SESSION['token'];




?>

 	<link rel="stylesheet" href="assets/css/style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <div class="wrapper fadeInDown">
  <div id="formContent">

    <div id="formFooter">
      <img src="assets/img/adsiz1.png" id="icon" alt="User Icon" />
    </div>
    <form action="index2.php" method="POST">
		<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
	<input type="text" id="name" class="fadeIn second" name="name" placeholder="Kullanıcı Adı">
      <input type="text" id="pass" class="fadeIn second" name="pass" placeholder="Tek Kullanımlık Şifre">

	  <input type="submit" class="fadeIn fourth" name="submit" value="Gönder">

		  
	
    </form>

 

  </div>
</div>

