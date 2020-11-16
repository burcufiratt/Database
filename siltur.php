<?php
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM kurumtürleri WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:kurumtur.php");
	 }
	 else
		echo("Kayıt silinemedi.");
}?>

