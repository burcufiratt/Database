<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$Ad = $_POST["Ad"];
		$Soyad = $_POST["Soyad"];

		
		
		
		if(!empty($ID)){
		

			$ekle = $baglan->prepare("
			insert into kullanicilar set 
	        Ad= :Ad,
         	ID= :ID,
			Soyad= :Soyad");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "Ad" => $Ad,
				 "Soyad" => $Soyad));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:kullanıcılar.php ');  }
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
	     <label for="Ad">Ad</label>
	     <input type="text" class="form-control" id="Ad" name="Ad" >
      </div>
	   <div class="form-group">
	     <label for="Soyad">Soyad</label>
	     <input type="text" class="form-control" id="Soyad" name="Soyad" >
      </div>
     
	
       <div class="form-group">
           <button type="submit" class="btn btn-success" name="kaydet" class="form-control">Kaydet</button>
       </div>
</form>
 
	   </div>
       </div>
<?php include('footer.php') ?>