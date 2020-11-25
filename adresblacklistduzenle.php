<?php 
include('inc/db.php');
session_start();
	
if($_GET["islem"]=="sil"){
	if(isset($_GET["id"]))
	{
			$requestUrl = $_SERVER['REQUEST_URI'];
			$kullanici=$_SESSION['name'];
			$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
			$sorgu->execute(array($kullanici, $requestUrl));
	
		$sorgu= $baglan->prepare("DELETE FROM adresblacklist WHERE ID=?");
		$sonuc=$sorgu->execute([$_GET['id']]);
		if($sonuc){
			header("Location:adresblacklist.php"); 
				  }
		else
			echo("Kayıt silinemedi.");
	}}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');


	$id = $_GET['id'];

	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM adresblacklist WHERE ID = $id");
     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


				 } 
	  else {
		 header("Refresh: 3"); 
		   }
	 
}
if($_GET["islem"]=="ekle"){
	
	if (isset($_POST["kaydet"])) {
		
		
		
		$requestUrl = $_SERVER['REQUEST_URI'];
		$kullanici=$_SESSION['name'];
		$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
		$sorgu->execute(array($kullanici, $requestUrl));

		
		$HostName = $_POST["HostName"];
		$MailAdresi = $_POST["MailAdresi"];

		if(!empty($HostName) && !empty($MailAdresi)){
		

			$ekle = $baglan->prepare("
			insert into adresblacklist (HostName,MailAdresi,Ekleyen) VALUES (?,?,?)");
		
		    try {
		        $result = $ekle->execute(array($HostName,$MailAdresi,$kullanici));
				
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:adresblacklist.php ');  }
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
		$HostName = $_POST["HostName"];
		$MailAdresi = $_POST["MailAdresi"];
	

			$requestUrl = $_SERVER['REQUEST_URI'];
			$kullanici=$_SESSION['name'];
			$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
			$sorgu->execute(array($kullanici, $requestUrl));
		
			if(!empty($ID) ){
	
				$duzenle = $baglan->prepare("
				update adresblacklist set  HostName=?, MailAdresi=?, Duzenleyen =? where ID =?");

		
			try {
				$result = $duzenle->execute(array( $HostName, $MailAdresi,$kullanici,$ID ));
	
			
	 
				if($result){ echo "Güncellendi." ;
						header('Location:adresblacklist.php ');  }
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
		<input type="hidden" class="form-control" id="ID" name="ID"  value="<?= $row->ID ?>">
	  </div>
	  <div class="form-group">
	<label for="HostName"><b>HostName</label>
	<input type="text" class="form-control" id="HostName" name="HostName"  value="<?= $row->HostName ?>">
		</div>

		<div class="form-group">
	<label for="MailAdresi"><b>MailAdresi</label>
	<input type="text" class="form-control" id="MailAdresi" name="MailAdresi"  value="<?= $row->MailAdresi ?>">
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
	     <label for="HostName"><b>HostName</label>
	     <input type="text" class="form-control" id="HostName" name="HostName"  value="">
      </div>
      <div class="form-group">
	     <label for="MailAdresi"><b>MailAdresi</label>
	     <input type="text" class="form-control" id="MailAdresi" name="MailAdresi" value="">
      </div>  

      <div class="form-group text-center">
          <button type="submit" class="btn btn-dark" name="kaydet" class="form-control">Kaydet</button>
       </div>
	   
</form>
 
</div>
 </div>
<?}?>


<?php include('inc/footer.php') ?>

