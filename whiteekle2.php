<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$IPTuru = $_POST["IPTuru"];
		$IPAdresi = $_POST["IPAdresi"];
		$KurumID= $_POST["KurumID"];
		$Ekleyen= $_POST["Ekleyen"];

		
	
		

			$ekle = $baglan->prepare("
			insert into whitelist set 
	        HostName= :HostName,
			IPTuru= :IPTuru,
			IPAdresi= :IPAdresi,
			KurumID= :KurumID,
         	ID= :ID,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "HostName" => $HostName,
				 "IPAdresi" => $IPAdresi,
				 "KurumID" => $KurumID,
				 "IPTuru" => $IPTuru,
				 "Ekleyen" => $Ekleyen ));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:whitelist2.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}?>

<?php include('header.php') ?>
      <div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	     <label for="ID">ID</label>
	     <input type="text" class="form-control" id="ID" name="ID" >
      </div>
      <div class="form-group">
	     <label for="HostName">HostName</label>
	     <input type="text" class="form-control" id="HostName" name="HostName" >
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
	     <input type="text" class="form-control" id="KurumID" name="KurumID" >
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