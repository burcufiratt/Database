<?<?php
	include("db.php");
	$id = $_GET['id'];
	// echo isset($id);
	// die;
	
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kurumlar WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
	if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$KurumAdi = $_POST["KurumAdi"];
		$KID = $_POST["KID"];
		$Domain = $_POST["Domain"];
		$KTID = $_POST["KTID"];
		$Duzenleyen = $_POST["Duzenleyen"];
		
		
		if(!empty($KurumAdi)&& !empty($KID) && !empty($Domain)  && !empty($KTID)){
		

			$duzenle = $baglan->prepare("
			update kurumlar set 
			KurumAdi =:KurumAdi,
			KID =:KID,
			Domain =:Domain,
            KTID =:KTID,		
			Duzenleyen =:Duzenleyen Where ID = :ID");
		
		 try {
			$result = $duzenle->execute(array(
				':KurumAdi' => ($KurumAdi),
				':KID' => ($KID),
				':Domain' => ($Domain),
				':ID' => ($Form_id),
				':KTID'=> ($KTID),
				'Duzenleyen' => ($Duzenleyen)
			));
	 
				if($result){ echo "Kurum Bilgileri Güncellendi." ;
			header('Location:index.php ');  }
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
	<label for="KurumAdi">Kurum Adı</label>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="text" class="form-control" id="KurumAdi" name="KurumAdi" placeholder="örn. sabahweb" value="<?= $row->KurumAdi ?>">
</div>
<div class="form-group">
	<label for="KID">Kurum ID</label>
	<input type="text" class="form-control" id="KID" name="KID" placeholder="örn. 1" value="<?= $row->KID ?>">
</div>
<div class="form-group">
	<label for="Domain">Domain</label>
	<input type="text" class="form-control" id="Domain" name="Domain" placeholder="örn. *.sabahweb.com" value="<?= $row->Domain ?>">
</div>

<div class="form-group">
	<select class="custom-select" id="KTID" placeholder="Kurum Türü " name="KTID">
	<?php 
		$seciliKTID = $row->KTID;//11
		$kurumturu = $baglan->prepare("SELECT ID, Adi FROM kurumtürleri");
		$kurumturu->execute(array());
		foreach($kurumturu as $item) {
			if ($seciliKTID == $item['ID']) {
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Adi'] . "</option>";
			} else {
				echo "<option value='" . $item['ID'] . "' >" . $item['Adi'] . "</option>";
			}
		}
	?>
	 </select>
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
<?php include('footer.php') ?>