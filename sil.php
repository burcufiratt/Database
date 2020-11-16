<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM kurumlar WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:index.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}?>
<?php 
