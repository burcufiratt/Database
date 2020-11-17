<?php 
include('inc/navbar.php');
if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM domainextension WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:domainextension.php");
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
	 
	 $query = $baglan->prepare("SELECT * FROM domainextension WHERE ID = $id");

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
		$Kelime = $_POST["Kelime"];
		$Ekleyen = $_POST["Ekleyen"];

		
		
		
		if(!empty($ID)&& !empty($Kelime)){
		

			$ekle = $baglan->prepare("
			insert into domainextension set 
	        Kelime= :Kelime,
         	ID= :ID,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "Kelime" => $Kelime,
				 "Ekleyen" =>$Ekleyen ));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:domainextension.php ');  }
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
		$Kelime = $_POST["Kelime"];
		$Duzenleyen = $_POST["Duzenleyen"];

		
		
		if(!empty($ID)&& !empty($Kelime) ){
		

			$duzenle = $baglan->prepare("
			update domainextension set 
			Kelime =:Kelime,
			ID =:ID,
			Duzenleyen =:Duzenleyen Where ID = :ID");
		
		 try {
			$result = $duzenle->execute(array(
				':Kelime' => ($Kelime),
				':ID' => ($ID),
	            ':Duzenleyen' => ($Duzenleyen)
			));
	 
				if($result){ echo "Güncellendi." ;
			header('Location:domainextension.php ');  }
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
	<input type="text" class="form-control" id="ID" name="ID" value="<?= $row->ID ?>">
</div>
<div class="form-group">
	<label for="ID">Kelime</label>
	<input type="text" class="form-control" id="Kelime" name="Kelime"  value="<?= $row->Kelime ?>">
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
	     <label for="Kelime">Kelime</label>
	     <input type="text" class="form-control" id="Kelime" name="Kelime" >
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

