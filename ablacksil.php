<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM adresblacklist WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:blacklist.php"); 
	 }
	 else
		echo("Kayıt silinemedi.");
}?>