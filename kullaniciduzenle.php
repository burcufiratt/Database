<?<?php
	include("db.php");
	$id = $_GET['id'];
	// echo isset($id);
	// die;
	
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kullanicilar WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
	if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$Ad = $_POST["Ad"];
		$Soyad = $_POST["Soyad"];

		
		
		if(!empty($ID) ){
		

			$duzenle = $baglan->prepare("
			update kullanicilar set 
			Ad =:Ad,
			Soyad =:Soyad,
			ID =:ID	Where ID = :ID");
		
		 try {
			$result = $duzenle->execute(array(
				':Ad' => ($Ad),
				':Soyad' => ($Soyad),
				':ID' => ($ID)
	
			));
	 
				if($result){ echo "Güncellendi." ;
			header('Location:kullanıcılar.php ');  }
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
	<label for="Ad">Ad</label>
	<input type="text" class="form-control" id="Ad" name="Ad"  value="<?= $row->Ad ?>">
</div>
<div class="form-group">
	<label for="Soyad">Soyad</label>
	<input type="text" class="form-control" id="Soyad" name="Soyad"  value="<?= $row->Soyad ?>">
</div>


	
<button type="submit" class="btn btn-success" class="form-control">Kaydet</button>
<?php } ?>
</form>
 
	</div>
</div>
<?php include('footer.php') ?>