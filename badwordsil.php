<?php 
if(isset($_GET["id"]))
{
	include("db.php");
	$sorgu= $baglan->prepare("DELETE FROM badwords WHERE ID=?");
	$sonuc=$sorgu->execute([$_GET['id']]);
	 if($sonuc){
		header("Location:badwords.php"); //Silme tamamlandıktan sonra personelliste sayfasına yönlendiriyoruz.
	 }
	 else
		echo("Kayıt silinemedi.");
}?>
<?php 