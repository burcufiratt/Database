<?php 
include("inc/db.php");

if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
	$sorgu= $baglan->prepare("DELETE FROM blacklist WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:blacklist.php");
	 }
	 else
		echo("Kayıt silinemedi.");
}}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');
	$id = $_GET['id'];
	if(isset($id)){
	 
	  $query = $baglan->prepare("SELECT * FROM blacklist WHERE ID = $id");
      $query->execute();
      $result=$query-> fetchAll(PDO::FETCH_OBJ);

    } 
	else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
}
if($_GET["islem"]=="ekle"){
	if (isset($_POST["kaydet"])) {
		
		$requestUrl = $_SERVER['REQUEST_URI'];
		$kullanici=$_SESSION['name'];
		$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
		$sorgu->execute(array($kullanici, $requestUrl));

			$HostName = $_POST["HostName"];
			$IPTuru = $_POST["IPTuru"];
			$IPAdresi = $_POST["IPAdresi"];
			$KurumID = $_POST["KurumID"];

		if(!empty($HostName)){
		

			$ekle = $baglan->prepare("
			insert into blacklist (HostName,IPTuru,IPAdresi,KurumID,Ekleyen) VALUES (?,?,?,?,?)");
		
		    try {
		        $result = $ekle->execute(array($HostName,$IPTuru,$IPAdresi,$KurumID,$kullanici));
				
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:blacklist.php ');  }
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
			$IPTuru = $_POST["IPTuru"];
			$IPAdresi = $_POST["IPAdresi"];
			$KurumID = $_POST["KurumID"];

	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
		
		
		if(!empty($ID) ){
		

			$duzenle = $baglan->prepare("
			update blacklist set HostName =?,IPTuru =?,IPAdresi =?,KurumID =?,
			Duzenleyen =?
			Where ID = ?");
		
		 try {
			$result = $duzenle->execute(array($HostName, $IPTuru,$IPAdresi,$KurumID,$kullanici,$ID ));
	 
				if($result){ echo "Güncellendi." ;
			header('Location:blacklist.php ');  }
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
	<label for="IP Turu"><b>IP Turu</label>
	<select class="custom-select" id="IPTuru" placeholder="IPTuru " name="IPTuru">
		<option value="Blok">Blok</option>
		<option value="Tekil">Tekil</option>
	</select>
</div>	
<div class="form-group">
	<label for="IPAdresi"><b>IP Adresi</label>
	<input type="text" class="form-control" id="IPAdresi" name="IPAdresi"  value="<?= $row->IPAdresi ?>">
</div>
<div class="form-group">
	<label for="KurumID"><b>Kurum ID</label>
	<input type="text" class="form-control" id="KurumID" name="KurumID"  value="<?= $row->KurumID ?>">
</div>

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
	    <br> <div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	    
	     <input type="hidden" class="form-control" id="ID" name="ID" value="">
      </div>
      <div class="form-group">
	     <label for="HostName">HostName</label>
	     <input type="text" class="form-control" id="HostName" name="HostName"  value="">
      </div>
<div class="form-group">
<label for="IP Turu"><b>IP Turu</label>
<select class="custom-select" id="IPTuru" placeholder="IPTuru " name="IPTuru">

<option value="Blok">Blok</option>
<option value="Tekil">Tekil</option>
</select>
</div>	

 <div class="form-group">
	     <label for="IPAdresi"><b>IP Adresi</label>
	     <input type="text" class="form-control" id="IPAdresi" name="IPAdresi" >
      </div>
	  
	  
  <div class="form-group">
	     <label for="KurumID"><b>Kurum ID</label>
	     <input type="text" class="form-control" id="KurumID" name="KurumID" value="">
      </div> 	  

      <div class="form-group text-center">
        <button type="submit" class="btn btn-dark" name="kaydet" class="form-control">Kaydet</button>
       </div>
</form>
 
	   </div>
       </div>
<?}?>


<?php include('inc/footer.php') ?>

