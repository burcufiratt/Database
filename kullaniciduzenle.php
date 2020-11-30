<?php 
	include("inc/db.php");
session_start();

	
if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
	
	$sorgu= $baglan->prepare("DELETE FROM kullanicilar WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:kullanici.php"); 
	 }else
		echo("Kayıt silinemedi.");
}}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');
	$id = $_GET['id'];
	 
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kullanicilar WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
}

if($_GET["islem"]=="ekle"){
	 
	if (isset($_POST["kaydet"])) {
		
		$requestUrl = $_SERVER['REQUEST_URI'];
		$kullanici=$_SESSION['name'];
		$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
		$sorgu->execute(array($kullanici, $requestUrl));
	
		$AdSoyad = $_POST["AdSoyad"];
		$MailAdresi = $_POST["MailAdresi"];
		$Sifre = md5($_POST["Sifre"]);
     
		
		
		
		if(!empty($AdSoyad)){
		

			$ekle = $baglan->prepare("insert into kullanicilar (AdSoyad,MailAdresi,Sifre) VALUES (?,?,?)");
		
		    try {
		        $result = $ekle->execute(array($AdSoyad,$MailAdresi,$Sifre,));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:kullanici.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}}
}



?>
<?php include('inc/header.php'); 
include('inc/navbar.php');?>

<?php

		if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$AdSoyad = $_POST["AdSoyad"];
		$MailAdresi = $_POST["MailAdresi"];
		$Sifre = md5($_POST["Sifre"]);
		$Sifredel = md5($_POST["Sifredel"]);


	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
		
		if(!empty($ID) ){
		
			$duzenle = $baglan->prepare("
			update kullanicilar set 
			AdSoyad =:AdSoyad,
			MailAdresi =:MailAdresi,
			ID =:ID,
			Sifre =:Sifre	Where ID = :ID and Sifre =:Sifredel ");
		
		 try {
			$result = $duzenle->execute(array(
				':AdSoyad' => ($AdSoyad),
				':ID' => ($ID),
				':MailAdresi' => ($MailAdresi),
				':Sifre' => ($Sifre),
				':Sifredel' => ($Sifredel)
	
			));
	
				if($result){ echo "Güncellendi." ;
			header('Location:kullanici.php ');  }
				else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		   }
		
		catch(PDOException $e ) {
			echo $e->getMessage();
		}
		 }}?>
	<?php if($_GET["islem"]=="guncelle"){ ?>
 <br><div class="container">
	  <div class="row justify-content-center">
<form method="post" action="?id=<?php echo $id;?>">
<?php foreach($result as $row){ ?>
<div class="form-group">
		<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="hidden" class="form-control" id="ID" name="ID" value="<?= $row->ID ?>">
</div>
<div class="form-group">
	<label for="Ad"><b>Kullanici Adi</label>
	<input type="text" class="form-control" id="AdSoyad" name="AdSoyad"  value="<?= $row->AdSoyad ?>">
</div>
<div class="form-group">
	<label for="MailAdresi"><b>Mail Adresi</label>
	<input type="text" class="form-control" id="MailAdresi" name="MailAdresi"  value="<?= $row->MailAdresi ?>">
</div>

<div class="form-group">
	<label for="Soyad"><b>Eski Sifre</label>
	<input type="text" class="form-control" id="Sifredel" name="Sifredel"  value="">
</div>
<div class="form-group">
	<label for="Soyad"><b>Sifre</label>
	<input type="text" class="form-control" id="Sifre" name="Sifre"  value="">
</div>


	<div class="form-group text-center">
<button type="submit" class="btn btn-dark" class="form-control">Kaydet</button>
</div>
<?php } ?>
</form>
 
	</div>
</div>
<?	} ?>

<?php if($_GET["islem"]=="ekle"){ ?>
	      <br><div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	     <label for="AdSoyad"><b>Kullanici Adi</label>
	     <input type="text" class="form-control" id="AdSoyad" name="AdSoyad"  value="">
      </div>
	    <div class="form-group">
	     <label for="MailAdresi"><b>Mail Adresi</label>
	     <input type="text" class="form-control" id="MailAdresi" name="MailAdresi"  value="">
      </div>
	     <div class="form-group">
	     <label for="Sifre"><b>Şifre</label>
	     <input type="text" class="form-control" id="Sifre" name="Sifre"  value="">
      </div>

      <div class="form-group text-center">
           <button type="submit" class="btn btn-dark" name="kaydet" class="form-control">Kaydet</button>
       </div>
	   
</form>
 
	   </div>
       </div>
<?}?>


<?php include('inc/footer.php') ?>

