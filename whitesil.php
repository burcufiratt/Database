<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM whitelist WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:whitelist2.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}?>