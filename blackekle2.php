<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	


	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$IPTuru = $_POST["IPTuru"];
		$IPAdresi = $_POST["IPAdresi"];
		$KurumID = $_POST["KurumID"];
		$Ekleyen = $_POST["Ekleyen"];
		
		
		if(!empty($HostName) && !empty($IPAdresi)){
		

			$ekle = $baglan->prepare("
			insert into blacklist set 
	        ID= :ID,
         	HostName= :HostName,
			IPTuru= :IPTuru,
			IPAdresi= :IPAdresi,
        	KurumID= :KurumID,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "HostName" => $HostName,
				 "IPTuru" => $IPTuru,
				 "IPAdresi" => $IPAdresi,
				 "KurumID" => $KurumID,
				 "Ekleyen" => $Ekleyen));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:blacklist2.php ');  }
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
	     <input type="text" class="form-control" id="ID" name="ID" value="">
      </div>
      <div class="form-group">
	     <label for="HostName">HostName</label>
	     <input type="text" class="form-control" id="HostName" name="HostName"  value="">
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
	     <input type="text" class="form-control" id="KurumID" name="KurumID" value="">
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
<html>