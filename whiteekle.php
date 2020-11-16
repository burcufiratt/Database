<?<?php
	include("db.php");

	// echo isset($id);
	// die;
	

	 
	if (isset($_POST["kaydet"])) {
		
		$ID = $_POST["ID"];
		$HostName = $_POST["HostName"];
		$MailAdresi = $_POST["MailAdresi"];
		$Ekleyen = $_POST["Ekleyen"];
		
		
		
		if(!empty($HostName) && !empty($MailAdresi)){
		

			$ekle = $baglan->prepare("
			insert into adreswhitelist set 
	        ID= :ID,
         	HostName= :HostName,
        	MailAdresi= :MailAdresi,
			Ekleyen= :Ekleyen");
		
		    try {
		        $result = $ekle->execute(array(
				 "ID" => $ID,
				 "HostName" => $HostName,
				 "MailAdresi" => $MailAdresi,
				 "Ekleyen" => $Ekleyen	));
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:whitelist.php ');  }
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
	     <label for="MailAdresi">MailAdresi</label>
	     <input type="text" class="form-control" id="MailAdresi" name="MailAdresi" value="">
      </div>  

<div class="form-group">
	<select class="custom-select" id="Ekleyen" placeholder="Ekleyen " name="Ekleyen">
	<?php 
		
		$Ekleyen = $baglan->prepare("SELECT ID, Ad FROM kullanicilar");
		$Ekleyen->execute(array());
		foreach($Ekleyen as $item) {
			
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Ad'] . "</option>";
			
		}
	?>
	 </select>
</div>	
       <div class="form-group">
           <button type="submit" class="btn btn-success" name="kaydet" class="form-control">Kaydet</button>
       </div>
</form>
 
	   </div>
       </div>
<?php include('footer.php') ?>