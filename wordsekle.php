<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$Kelime = $_POST["Kelime"];
		$Ekleyen = $_POST["Ekleyen"];

		
		
		
		if(!empty($ID)&& !empty($Kelime)){
		

			$ekle = $baglan->prepare("
			insert into badwords set 
	        Kelime= :Kelime,
         	ID= :ID,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "Kelime" => $Kelime,
				 "Ekleyen" => $Ekleyen));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:badwords.php ');  }
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
<?php include('footer.php') ?>