<!DOCTYPE HTML>

<link rel="stylesheet" href="assets/css/style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php 
	
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];


 ?>
 
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <div id="fadeIn first">
	 <div id="formFooter">
      <img src="assets/img/adsiz1.png" class="underlineHover" id="icon" alt="User Icon"/>
    </div></div>
	<form action="index2.php" method="post">

	
	
	
		<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
		<input type="text" id="name" class="fadeIn second" name="name" placeholder="Kullanıcı Adı">
		<input type="password" id="password" class="fadeIn third" name="pass" placeholder="Şifre">
		<input type="submit">
	</form>
	 <div id="formFooter">
	<br><a class="underlineHover" href="register.php">Şifremi Unuttum</a>
	</div>
	</div>
	</div>
</body>
</html>


