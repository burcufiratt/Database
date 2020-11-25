
<?php
include("inc/db.php");



?>

 	<link rel="stylesheet" href="assets/css/style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <div class="wrapper fadeInDown">
  <div id="formContent">

    <div id="formFooter">
      <img src="assets/img/adsiz1.png" id="icon" alt="User Icon" />
    </div>
    <form action="#" method="POST">
	<input type="text" id="mail" class="fadeIn second" name="mail" placeholder="Mail Adresi">
      <input type="text" id="kod" class="fadeIn second" name="kod" placeholder="Tek Kullanımlık Şifre">

	  <input type="submit" class="fadeIn fourth" name="submit" value="Gönder">
	  <?php 
	 
 if($_POST){
	 $mail=($_POST["mail"]);
	 $sifre=($_POST["kod"]);
	 if($mail!="" && $sifre!=""){
		 $sorgu = $baglan->prepare("SELECT kod, MailAdresi, AdSoyad FROM kullanicilar");
		 $sorgu->execute(array());
		foreach($sorgu as $item) {
			if ($sifre == $item['kod'] && $mail == $item['MailAdresi'] ) {
				
			
				$name=$item['AdSoyad'];
				$_SESSION['oturum']=true;
				$_SESSION['name']=$name;
				
				header('Location:deneme.php ');
			}
			else{
			 ?><div class="alert alert-danger">
				<strong></strong> KOD YANLIŞ GİRİLDİ!
				</div>
				<br><a class="underlineHover" href="register.php">GERİ DÖN</a>
		 <?}			

		}
	 }
	 else{
		 		?><div class="alert alert-danger">
				<strong></strong> BOŞ ALAN BIRAKMAYINIZ!
				</div>
	 <?}
	 
 }
?>

		  
	
    </form>

 

  </div>
</div>

