<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$KurumAdi = $_POST["KurumAdi"];
		$KID = $_POST["KID"];
		$Domain = $_POST["Domain"];
		$KTID = $_POST["KTID"];
		$Ekleyen = $_POST["Ekleyen"];
		
		
		
		if(!empty($KurumAdi)&& !empty($KID) && !empty($Domain)  && !empty($KTID)){
		

			$ekle = $baglan->prepare("
			insert into kurumlar set 
	        KurumAdi= :KurumAdi,
         	KID= :KID,
        	KTID= :KTID,
	        Domain= :Domain,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "KurumAdi" => $KurumAdi,
				 "KID" => $KID,
				 "KTID" => $KTID,
				 "Domain" => $Domain,
				 "Ekleyen" => $Ekleyen ));
			
	 
				  if($result){ echo "Kurum Eklendi." ;
			         header('Location:index.php ');  }
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
	     <label for="KurumAdi">Kurum Adı</label>
	     <input type="text" class="form-control" id="KurumAdi" name="KurumAdi" placeholder="örn. sabahweb" value="">
      </div>
      <div class="form-group">
	     <label for="KID">Kurum ID</label>
	     <input type="text" class="form-control" id="KID" name="KID" placeholder="örn. 1" value="">
      </div>
      <div class="form-group">
	     <label for="Domain">Domain</label>
	     <input type="text" class="form-control" id="Domain" name="Domain" placeholder="örn. *.sabahweb.com" value="">
      </div>  
      <div class="form-group">
	      <select class="custom-select" id="KTID" placeholder="Kurum Türü " name="KTID">
<?php 
	      $qry = $baglan->prepare("SELECT ID, Adi FROM kurumtürleri");
          $qry->execute(array());
          //$srg=$qry-> fetchAll(PDO::FETCH_OBJ);

             foreach($qry as $rst){
                  echo "<option value='" . $rst['ID'] . "'>" . $rst['Adi'] . "</option>";}
          
 ?>       </select>
  
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