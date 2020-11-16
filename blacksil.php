<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM blacklist WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:blacklist2.php"); //Silme tamamlandıktan sonra personelliste sayfasına yönlendiriyoruz.
	 }
	 else
		echo("Kayıt silinemedi.");
}?>