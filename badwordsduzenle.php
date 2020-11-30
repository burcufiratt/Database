<?php 
include("inc/db.php");
session_start();
if($_GET["islem"]=="sil"){
		$ID = $_GET["id"];

	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
	$sorgu->execute(array($kullanici, $requestUrl));
		
$query = $baglan->prepare("UPDATE badwords SET
Silen = :kullanici, Silindi = :Silindi
WHERE ID = :ID");
$sil = $query->execute(array(
     "kullanici" => $kullanici,
     "Silindi" => "1",
	 "ID" => $ID 
));
if ( $sil ){
      header('Location:badwords.php ');
}
		   
	}

if($_GET["islem"]=="guncelle"){
date_default_timezone_set('Europe/Istanbul');

	$id = $_GET['id'];
	 
	if(isset($id)){
	 
	 $query = $baglan->prepare("SELECT * FROM badwords WHERE ID = $id");

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

	$Kelime = $_POST["Kelime"];
		if(!empty($Kelime) ){
		

			$ekle = $baglan->prepare("
			insert into badwords (Kelime,Ekleyen) VALUES (?,?)");
		
		    try {
		        $result = $ekle->execute(array($Kelime,$kullanici));
				
			
	 
				  if($result){ echo "Eklendi." ;
			         header('Location:badwords.php ');  }
				  else{ '<script>alert("Welcome to Geeks for Geeks")</script>'; }
		        }
		
		    catch(PDOException $e ) {
			echo $e->getMessage();
		                            }
	}}
}

?>
<?php 
include('inc/header.php');
include('inc/navbar.php');?>

<?php
		if (isset($_POST["id"])) {
		$Form_id = $_POST["id"];
		$ID = $_POST["ID"];
		$Kelime = $_POST["Kelime"];
	

		$requestUrl = $_SERVER['REQUEST_URI'];
		$kullanici=$_SESSION['name'];
		$sorgu = $baglan->prepare("INSERT INTO log (kullanici,tablo) VALUES (?,?)");
		$sorgu->execute(array($kullanici, $requestUrl));
		
		if(!empty($ID) ){
		
			$duzenle = $baglan->prepare("
			update badwords set  Kelime=?,Duzenleyen =? where ID =?");
		
		 try {
			$result = $duzenle->execute(array( $Kelime,$kullanici,$ID ));
	
				if($result){ echo "Güncellendi." ;
					header('Location:badwords.php ');  }
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
		<input type="hidden" class="form-control" id="ID" name="ID" value="<?= $row->ID ?>">
</div>
<div class="form-group">
	<label for="ID"><b>Kelime</label>
	<input type="text" class="form-control" id="Kelime" name="Kelime"  value="<?= $row->Kelime ?>">
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
	     <input type="hidden" class="form-control" id="ID" name="ID" >
      </div>
      <div class="form-group">
	     <label for="Kelime"><b>Kelime</label>
	     <input type="text" class="form-control" id="Kelime" name="Kelime" >
      </div>

      <div class="form-group text-center">
        <button type="submit" class="btn btn-dark" name="kaydet" class="form-control">Kaydet</button>
       </div>
</form>
 
	   </div>
       </div>
<?}?>


<?php include('inc/footer.php') ?>

