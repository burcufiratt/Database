<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM domainextension WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:domainextension.php");
	 }
	 else
		echo("Kayıt silinemedi.");
}?>
<?php 