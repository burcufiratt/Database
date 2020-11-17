<?php 
include('inc/navbar.php');
if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
		include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM whitelist WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:whitelist.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');

	include("db.php");
	$id = $_GET['id'];
	// echo isset($id);
	// die;

	 
if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM whitelist WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
}
if($_GET["islem"]=="ekle"){

	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$IPTuru = $_POST["IPTuru"];
		$IPAdresi = $_POST["IPAdresi"];
		$KurumID= $_POST["KurumID"];
		$Ekleyen= $_POST["Ekleyen"];

		
	
		

			$ekle = $baglan->prepare("
			insert into whitelist set 
	        HostName= :HostName,
			IPTuru= :IPTuru,
			IPAdresi= :IPAdresi,
			KurumID= :KurumID,
         	ID= :ID,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "HostName" => $HostName,
				 "IPAdresi" => $IPAdresi,
				 "KurumID" => $KurumID,
				 "IPTuru" => $IPTuru,
				 "Ekleyen" => $Ekleyen ));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:whitelist.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}}




?>
<?php include('inc/header.php') ?>

<?php 	include('db.php');
		if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$IPTuru = $_POST["IPTuru"];
		$IPAdresi = $_POST["IPAdresi"];
		$KurumID = $_POST["KurumID"];
		$Duzenleyen = $_POST["Duzenleyen"];

		
		
		if(!empty($ID) ){
		

			$duzenle = $baglan->prepare("
			update whitelist set 
			ID =:ID,
			HostName =:HostName,
			IPTuru =:IPTuru,
			IPAdresi =:IPAdresi,
			KurumID =:KurumID,
			Duzenleyen =:Duzenleyen
			Where ID = :ID");
		
		 try {
			$result = $duzenle->execute(array(
				':ID' => ($ID),
				':HostName' => ($HostName),
				':IPTuru' => ($IPTuru),
				':IPAdresi' => ($IPAdresi),
				':KurumID' => ($KurumID),
				':Duzenleyen' => ($Duzenleyen)
			));
	 
				if($result){ echo "Güncellendi." ;
			header('Location:whitelist.php ');  }
				else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		   }
		
		catch(PDOException $e ) {
			echo $e->getMessage();
		}
	}}?>
	<?php if($_GET["islem"]=="guncelle"){ ?>
 <div class="container">
	  <div class="row justify-content-center">
<form method="post" action="?id=<?php echo $id;?>">
<?php foreach($result as $row){ ?>
<div class="form-group">
	<label for="ID">ID</label>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="text" class="form-control" id="ID" name="ID"  value="<?= $row->ID ?>">
</div>
<div class="form-group">
	<label for="HostName">HostName</label>
	<input type="text" class="form-control" id="HostName" name="HostName"  value="<?= $row->HostName ?>">
</div>





<div class="form-group">
<label for="IP Turu">IP Turu</label>
<select class="custom-select" id="IPTuru" placeholder="IPTuru " name="IPTuru">

<option value="Blok">Blok</option>
<option value="Tekil">Tekil</option>
</select>
</div>	




<div class="form-group">
	<label for="IPAdresi">IPAdresi</label>
	<input type="text" class="form-control" id="IPAdresi" name="IPAdresi"  value="<?= $row->IPAdresi ?>">
</div>
<div class="form-group">
	<label for="KurumID">KurumID</label>
	<input type="text" class="form-control" id="KurumID" name="KurumID"  value="<?= $row->KurumID ?>">
</div>

	<select class="custom-select" id="Duzenleyen" placeholder="Duzenleyen " name="Duzenleyen">
	<?php 
		
		$Duzenleyen = $baglan->prepare("SELECT ID, Ad FROM kullanicilar");
		$Duzenleyen->execute(array());
		foreach($Duzenleyen as $item) {
			
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Ad'] . "</option>";
			
		}
	?>
	 </select>
<div class="form-group">
<button type="submit" class="btn btn-success" class="form-control">Kaydet</button>
</div>
<?php } ?>
</form>
 
	</div>
</div>
<?	} ?>

<?php if($_GET["islem"]=="ekle"){ ?>
	 <div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	     <label for="ID">ID</label>
	     <input type="text" class="form-control" id="ID" name="ID" >
      </div>
      <div class="form-group">
	     <label for="HostName">HostName</label>
	     <input type="text" class="form-control" id="HostName" name="HostName" >
      </div>
 <div class="form-group">
<label for="IP Turu">IP Turu</label>
<select class="custom-select" id="IPTuru" placeholder="IPTuru " name="IPTuru">

<option value="Blok">Blok</option>
<option value="Tekil">Tekil</option>
</select>
</div>	
     <div class="form-group">
	     <label for="IPAdresi">IPAdresi</label>
	     <input type="text" class="form-control" id="IPAdresi" name="IPAdresi" >
      </div>
     <div class="form-group">
	     <label for="KurumID">KurumID</label>
	     <input type="text" class="form-control" id="KurumID" name="KurumID" >
      </div>
     
		<select class="custom-select" id="Ekleyen" placeholder="Ekleyen " name="Ekleyen">
	<?php 
		
		$Ekleyen = $baglan->prepare("SELECT ID, Ad FROM kullanicilar");
		$Ekleyen->execute(array());
		foreach($Ekleyen as $item) {
			
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Ad'] . "</option>";
			
		}
	?>
	 </select>
       <div class="form-group">
           <button type="submit" class="btn btn-success" name="kaydet" class="form-control">Kaydet</button>
       </div>
</form>
 
	   </div>
       </div>
<?}?>


<?php include('inc/footer.php') ?>

