<?php 
include("inc/db.php");
session_start();

if($_GET["islem"]=="sil"){

		$ID = $_GET["id"];

	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
		
$query = $baglan->prepare("UPDATE kurumtürleri SET
Silen = :kullanici, Silindi = :Silindi
WHERE ID = :ID");
$sil = $query->execute(array(
     "kullanici" => $kullanici,
     "Silindi" => "1",
	 "ID" => $ID 
));
if ( $sil ){
      header('Location:kurumturu.php ');
}
		   
		
		
}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');

	$id = $_GET['id'];
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kurumtürleri WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
}
if($_GET["islem"]=="sil"){
date_default_timezone_set('Europe/Istanbul');

	$id = $_GET['id'];
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kurumtürleri WHERE ID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=index.php"); 
	}
	 
}
if($_GET["islem"]=="ekle"){


	if (isset($_POST["kaydet"])) {
		
	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
		
	$Adi = $_POST["Adi"];
	$YerSaglayici = $_POST["YerSaglayici"];


		if(!empty($Adi)){
		

			$ekle = $baglan->prepare("
			insert into kurumtürleri (Adi,YerSaglayici,Ekleyen) VALUES (?,?,?)");
	  
		
		    try {
		        $result = $ekle->execute(array($Adi,$kullanici,$YerSaglayici));
				
			
	 
				  if($result){ echo "Kurum Türü Eklendi." ;
			      header('Location:kurumturu.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}}
}

?>
<?php include('inc/header.php');
include('inc/navbar.php');?>
<?php 
if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$Adi = $_POST["Adi"];
		$YerSaglayici = $_POST["YerSaglayici"];
		
		
	

		$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
		
		if(!empty($ID) ){
		

			$duzenle = $baglan->prepare("
			update kurumtürleri set  Adi=?, YerSaglayici=?, Duzenleyen =? where ID =?");

		
		 try {
			$result = $duzenle->execute(array( $Adi,$YerSaglayici,$kullanici,$ID ));
	
			
	 
				if($result){ echo "Güncellendi." ;
			header('Location:kurumturu.php ');  }
				else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		   }
		
		catch(PDOException $e ) {
			echo $e->getMessage();
		}
	}}?>
	<?php if($_GET["islem"]=="guncelle"){ ?>
   <br><div class="container">
	  <div class="row justify-content-center">
<form method="post" action="?id=<?php echo $id;?>">
<?php foreach($result as $row){ ?>
<div class="form-group">
	
		<input type="hidden" name="id" value="<?php echo $id;?>">

	<input type="hidden" class="form-control" id="ID" name="ID"  value="<?= $row->ID ?>">
</div>
<div class="form-group">
	<label for="KurumAdi"><b>Kurum Türü</label>
	<input type="text" class="form-control" id="Adi" name="Adi"  value="<?= $row->Adi ?>">
</div>
<div class="form-group">
	<label for="YerSaglayici"><b>Yer Saglayici</label>
	<input type="text" class="form-control" id="YerSaglayici" name="YerSaglayici"  value="<?= $row->YerSaglayici ?>">
</div>


<div class="form-group text-center">
<button type="submit" class="btn btn-dark" class="form-control">Kaydet</button>
</div>
<?php } ?>

</form>
 
	</div>
</div>
<?	} ?>
<?php if($_GET["islem"]=="ekle"){ ?>
	    <br> <div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	     <label for="KurumAdi"><b>Kurum Türü</label>
	     <input type="text" class="form-control" id="Adi" name="Adi" placeholder="örn. Devlet Kurumları" value="">
      </div>
	    <div class="form-group">
	     <label for="YerSaglayici"><b>Yer Saglayici</label>
	     <input type="text" class="form-control" id="YerSaglayici" name="YerSaglayici" placeholder="" value="">
      </div>
      <div class="form-group">
	   
	     <input type="hidden" class="form-control" id="ID" name="ID" placeholder="örn. 1" value="">
      </div>

        <div class="form-group text-center">	
           <button type="submit" class="btn btn-dark" name="kaydet" class="form-control">Kaydet</button>
       </div>
</form>
 
	   </div>
       </div>
<?}?>




<?php include('inc/footer.php') ?>

