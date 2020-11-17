<?php 
include('inc/navbar.php');
if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
	include("db.php");
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

	include("db.php");
	$id = $_GET['id'];
	// echo isset($id);
	// die;

	 
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM adresblacklist WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3"); 
	}
	 
}
if($_GET["islem"]=="ekle"){

	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$MailAdresi = $_POST["MailAdresi"];
		$Ekleyen = $_POST["Ekleyen"];
		
		
		
		if(!empty($HostName) && !empty($MailAdresi)){
		

			$ekle = $baglan->prepare("
			insert into adresblacklist set 
	        ID= :ID,
         	HostName= :HostName,
        	MailAdresi= :MailAdresi,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "HostName" => $HostName,
				 "MailAdresi" => $MailAdresi,
				 "Ekleyen" => $Ekleyen	));
			
	 
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
<?php include('inc/header.php') ?>

<?php 	include('db.php');
		if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$MailAdresi = $_POST["MailAdresi"];
		$Duzenleyen = $_POST["Duzenleyen"];

		
		
		if(!empty($ID) ){
		

			$duzenle = $baglan->prepare("
			update adresblacklist set 
			ID =:ID,
			HostName =:HostName,
			MailAdresi= :MailAdresi,
			Duzenleyen= :Duzenleyen
			Where ID = :ID");
		
		 try {
			$result = $duzenle->execute(array(
				':ID' => ($ID),
				':HostName' => ($HostName),
				':MailAdresi' => $MailAdresi,
				 ':Duzenleyen' => $Duzenleyen ));
	
			
	 
				if($result){ echo "Güncellendi." ;
			header('Location:adresblacklist.php ');  }
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
	<label for="MailAdresi">MailAdresi</label>
	<input type="text" class="form-control" id="MailAdresi" name="MailAdresi"  value="<?= $row->MailAdresi ?>">
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
<?php echo date("d m Y H:i"); ?>
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
	     <input type="text" class="form-control" id="ID" name="ID" value="">
      </div>
      <div class="form-group">
	     <label for="HostName">HostName</label>
	     <input type="text" class="form-control" id="HostName" name="HostName"  value="">
      </div>
      <div class="form-group">
	     <label for="MailAdresi">MailAdresi</label>
	     <input type="text" class="form-control" id="MailAdresi" name="MailAdresi" value="">
      </div>  

<div class="form-group">
	<select class="custom-select" id="Ekleyen" placeholder="Ekleyen " name="Ekleyen">
	<?php 
		
		$Ekleyen = $baglan->prepare("SELECT ID, Ad FROM kullanicilar");
		$Ekleyen->execute(array());
		foreach($Ekleyen as $item) {
			
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Ad'] . "</option>";
			
		}
	?>
	 </select>
</div>	

       <div class="form-group">
           <button type="submit" class="btn btn-success" name="kaydet" class="form-control">Kaydet</button>
       </div>
	   
</form>
 
	   </div>
       </div>
<?}?>


<?php include('inc/footer.php') ?>

