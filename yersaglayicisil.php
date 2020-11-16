<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM yersaglayicilari WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:yersaglayici.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}?>
<?php 