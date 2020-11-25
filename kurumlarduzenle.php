<?php 
include("inc/db.php");

if($_GET["islem"]=="sil"){
if(isset($_GET["id"]))
{
	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
	
	$sorgu= $baglan->prepare("DELETE FROM kurumlar WHERE KID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:kurumlar.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');
	$id = $_GET['id'];

	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM kurumlar WHERE KID = $id");

     $query->execute();
     $result=$query-> fetchAll(PDO::FETCH_OBJ);


    } else {
		 header("Refresh: 3; url=kurumlar.php"); 
	}
	 
}
if($_GET["islem"]=="ekle"){
	
	if (isset($_POST["kaydet"])) {
		
		
		
		$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));

		
		$Adi = $_POST["KurumAdi"];
		$Domain = $_POST["Domain"];
		$KTID = $_POST["KTID"];

		if(!empty($Domain) && !empty($KTID)){
		

			$ekle = $baglan->prepare("
			insert into kurumlar (KurumAdi,Domain,Ekleyen,KTID) VALUES (?,?,?,?)");
		
		    try {
		        $result = $ekle->execute(array($Adi,$Domain,$kullanici,$KTID));
				
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:kurumlar.php ');  }
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
		$KurumAdi = $_POST["KurumAdi"];
		$KID = $_POST["KID"];
		$Domain = $_POST["Domain"];
		$KTID = $_POST["KTID"];
		$Duzenleyen = $_POST["Duzenleyen"];
		
			 $requestUrl = $_SERVER['REQUEST_URI'];
			 $kullanici=$_SESSION['name'];
			 $sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
			 $sorgu->execute(array($kullanici, $requestUrl));
	
		if(!empty($KurumAdi)&& !empty($KID) && !empty($Domain)  && !empty($KTID)){
		
			$duzenle = $baglan->prepare("
			update kurumlar set KurumAdi =?, Domain =?, KTID =?, Duzenleyen =? Where KID = ?");
		
		 try {
			$result = $duzenle->execute(array($KurumAdi, $Domain,$KTID, $kullanici, $Form_id));
		
	 
				if($result){ echo "Kurum Bilgileri Güncellendi." ;
			header('Location:kurumlar.php ');  }
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
	<label for="KurumAdi"><b>Kurum Adı</label>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	<input type="text" class="form-control" id="KurumAdi" name="KurumAdi" placeholder="örn. sabahweb" value="<?= $row->KurumAdi ?>">
</div>
<div class="form-group">
	<input type="hidden" class="form-control" id="KID" name="KID" placeholder="örn. 1" value="<?= $row->KID ?>">
</div>
<div class="form-group">
	<label for="Domain"><b>Domain</label>
	<input type="text" class="form-control" id="Domain" name="Domain" placeholder="örn. *.sabahweb.com" value="<?= $row->Domain ?>">
</div>
	<label for="Domain"><b>Kurum Türü</label>
<div class="form-group">
	<select class="custom-select" id="KTID" placeholder="Kurum Türü " name="KTID">
	<?php 
		$seciliKTID = $row->Adi;//11
		$kurumturu = $baglan->prepare("SELECT ID, Adi FROM kurumtürleri");
		$kurumturu->execute(array());
		foreach($kurumturu as $item) {
			if ($seciliKTID == $item['Adi']) {
				echo "<option value='" . $item['ID'] . "' selected>" . $item['Adi'] . "</option>";
			} else {
				echo "<option value='" . $item['ID'] . "' >" . $item['Adi'] . "</option>";
			}
		}
	?>
	 </select>
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
	      <br><div class="container">
	  <div class="row justify-content-center">
<form method="post" action="#">

      <div class="form-group">
	     <label for="KurumAdi"><b>Kurum Adı</label>
	     <input type="text" class="form-control" id="KurumAdi" name="KurumAdi"  value="">
      </div>
      <div class="form-group">
	     <label for="Domain"><b>Domain Adresi</label>
	     <input type="text" class="form-control" id="Domain" name="Domain" value="">
      </div>  
<div class="form-group">
	  <label for="KTID"><b>Kurum Türü</label>
      <div class="form-group">
	      <select class="custom-select" id="KTID" placeholder="Kurum Türü " name="KTID">
<?php 
	      $qry = $baglan->prepare("SELECT ID, Adi FROM kurumtürleri");
          $qry->execute(array());
          //$srg=$qry-> fetchAll(PDO::FETCH_OBJ);

             foreach($qry as $rst){
                  echo "<option value='" . $rst['ID'] . "'>" . $rst['Adi'] . "</option>";}
          
 ?>       </select>
  
       </div></div>



      <div class="form-group text-center">
         <button type="submit" class="btn btn-dark" name="kaydet" class="form-control">Kaydet</button>
       </div>
	   
</form>
 
	   </div>
       </div>
<?}?>

<? $kullaniciLog->start($_SESSION['name']);?>
<?php include('inc/footer.php') ?>


