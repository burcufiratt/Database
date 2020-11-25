
<?php
include("inc/db.php");

session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
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
    <form action="" method="POST">
		<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
      <input type="text" id="mail" class="fadeIn second" name="mail" placeholder="E-mail Adresinizi Girin">
	  <input type="submit" class="fadeIn fourth" name="mailsifre" value="Şifre Gönder">
	
	  <?php 
	  if(isset($_POST["mailsifre"])){
		 
		   include("inc/db.php");
		   $eposta=trim($_POST["mail"]);
		  if(!$_POST["mail"]){
			  ?>
					  
				<div class="alert alert-danger"> <strong>Mail Adresi Girin</strong>  </div> 
				<?php
		  }
		  else{
			  if(!filter_var($eposta,FILTER_VALIDATE_EMAIL)){
				 ?>
					  
				<div class="alert alert-danger"> <strong>Mail Formatı Yanlış Girildi</strong>  </div> 
				<?php
			  }else{
				  $kod=rand(1,9000)."_".rand(1,9000);
				  $sorgu=$baglan->prepare("update kullanicilar set Sifre=? where MailAdresi=?");
				  $calis=$sorgu->execute(array(md5($kod),$eposta));
				  if($calis){
			   require_once 'PHPMailer/PHPMailer.php';
			   require_once 'PHPMailer/class.PHPMailer.php';
		       require_once 'PHPMailer/Exception.php';
			   require_once 'PHPMailer/SMTP.php';
				  $varmi = $baglan->prepare("SELECT MailAdresi FROM kullanicilar WHERE MailAdresi=:e");
				  $varmi->execute([':e' => $eposta]);
				  if($varmi->rowCount()){
					  $row = $varmi->fetch(PDO::FETCH_ASSOC);
					  $mail = new PHPMailer();
					  $mail->Host = "smtp.gmail.com";
					  $mail->Port = 587;
					  $mail->SMTPSecure = 'tls';
					  $mail->SMTPAuth = true;
					  $mail->Username="burcufirat123@gmail.com";
					  $mail->SMTPKeepAlive=true;
					  $mail->Password = "burcu123firat";
					  $mail->IsSMTP();
					  $mail->IsHTML(true);
					  $mail->AddAddress($eposta);
					  $mail->setFROM = "burcufirat123@gmail.com";
					  $mail->FromName = "Sifremi Unuttum";
					  $mail->Charset ="UTF-8";
					  $mail->Subject ="Sifremi Sifirla";
					  $mailicerik = "Tek kullanimlik kodunuz : ".$kod;
					  $mail->MsgHTML($mailicerik);
					  if($mail->Send()){
						  
						  header('Location:register2.php ');
				  }}else{?>
					  
				<div class="alert alert-danger"> <strong>Mail Gönderilemedi</strong>  </div> 
				<?php
						  
					  }
					  
				  }
			  }
		  }
	
			
}
 
?>

		  
	
    </form>

 

  </div>
</div>

<?php if($_GET["islem"]=="cikis"){

session_start();
ob_start();
unset($_SESSION['name']);
unset($_SESSION['pass']);
unset($_SESSION['token']);
session_destroy();

header("Refresh: 0; url=index.php");
ob_end_flush();}
?>