<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">




<?php

	include ("inc/db.php");
	
	if($_POST)
	{
		$name =$_POST["name"];
		$pass =md5($_POST["pass"]);
		

		$query  = $baglan->query("SELECT * FROM kullanicilar WHERE AdSoyad='$name' && Sifre='$pass'");
		
		if ( $say = $query -> rowCount() ){

			if( $say > 0 ){
				session_start();
				$_SESSION['oturum']=true;
				$_SESSION['name']=$name;
				$_SESSION['pass']=$pass;
				
				
				
			if(isset($_POST["token"])&&$_POST["token"]==$_SESSION["token"]){

            
			   header("Location:deneme.php");
}

else{

echo "token yanlış!";

}
		}}else{
				?>
		<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <img src="assets/img/adsiz1.png" id="icon" alt="User Icon" />
    </div>
		<div class="alert alert-danger">
  <strong></strong> GİRİŞ BAŞARISIZ
</div>
	<form action="#" method="post"/>
	
	
	 <a href="register.php" class="underlineHover">Şifremi Unuttum</a><br>
	 <a href="register.php" class="underlineHover">E-Mail ile Giriş</a><br>
	 <a href="index.php" class="underlineHover">Tekrar Dene</a>
	    
	</form>
</div>
	</div><?
		}
	}
	
?>