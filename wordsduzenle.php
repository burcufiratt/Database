<?<?php
	include("db.php");
	$id = $_GET['id'];
	// echo isset($id);
	// die;
	
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM badwords WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
	if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$Kelime = $_POST["Kelime"];
		$Duzenleyen = $_POST["Duzenleyen"];

		
		
		if(!empty($ID)&& !empty($Kelime) ){
		

			$duzenle = $baglan->prepare("
			update badwords set 
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
			header('Location:badwords.php ');  }
				else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		   }
		
		catch(PDOException $e ) {
			echo $e->getMessage();
		}
	}}
?>
<?php include('header.php') ?>
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

<div class="form-group">
	<select class="custom-select" id="Duzenleyen" placeholder="Duzenleyen " name="Duzenleyen">
	<?php 
		
		$Duzenleyen = $baglan->prepare("SELECT ID, Ad FROM kullanicilar");
		$Duzenleyen->execute(array());
		foreach($Duzenleyen as $item) {
			
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Ad'] . "</option>";
			
		}
	?>
	 </select>
</div>
<div class="form-group">	
<button type="submit" class="btn btn-success" class="form-control">Kaydet</button>
</div>
<?php } ?>
</form>
 
	</div>
</div>
<?php include('footer.php') ?>