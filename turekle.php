<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$Adi = $_POST["Adi"];
		$ID = $_POST["ID"];
		$Ekleyen = $_POST["Ekleyen"];

		
		
		
		if(!empty($Adi)&& !empty($ID)){
		

			$ekle = $baglan->prepare("
			insert into kurumtürleri set 
	        Adi= :Adi,
         	ID= :ID,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "Adi" => $Adi,
				 "ID" => $ID,
                 "Ekleyen" => $Ekleyen ));
			
	 
				  if($result){ echo "Kurum Türü Eklendi." ;
			      header('Location:kurumtur.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}}?>

<?php include('header.php') ?>
      <div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	     <label for="KurumAdi">Kurum Türü</label>
	     <input type="text" class="form-control" id="Adi" name="Adi" placeholder="örn. Devlet Kurumları" value="">
      </div>
      <div class="form-group">
	     <label for="KID">Tür ID</label>
	     <input type="text" class="form-control" id="ID" name="ID" placeholder="örn. 1" value="">
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
<?php include('footer.php') ?>