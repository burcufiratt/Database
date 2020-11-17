<?php 
include('inc/navbar.php');
if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
	include("inc/db.php");
	$sorgu= $baglan->prepare("DELETE FROM kurumlar WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:kurumlar.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');

	include("inc/db.php");
	$id = $_GET['id'];
	// echo isset($id);
	// die;

	 
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kurumlar WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=kurumlar.php"); 
	}
	 
}
if($_GET["islem"]=="ekle"){

	include("inc/db.php");

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
			         header('Location:kurumlar.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}}
}



?>
<?php include('inc/header.php') ?>

<?php 	include('inc/db.php');
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
			header('Location:kurumlar.php ');  }
				else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		   }
		
		catch(PDOException $e ) {
			echo $e->getMessage();
		}
	}}?>
	<?php if($_GET["islem"]=="guncelle"){ ?>
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
<?	} ?>

<?php if($_GET["islem"]=="ekle"){ ?>
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
<?}?>


<?php include('inc/footer.php') ?>

