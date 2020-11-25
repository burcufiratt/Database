<?php 

include("inc/db.php");
include('inc/header.php');
include('inc/navbar.php');
?>

<form method="post" action="#">
<br><div class="container">

	  <div class="row justify-content-center">
		<div class="col">
		 <table class="table table-bordered table-striped table-light">
			<tr colspan = 5 ><b>YER SAĞLAYICILAR</tr>
			<tr>
			 <td><b>ID</b></td>
			 <td>Yer Saglayıcı Adı</td>
			 <td class="text-right"><b>YÖNET</b></td>
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM yersaglayicilari");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->ID ?></td>
			 	<td><?= $row->YerSaglayiciAdi ?></td>
	
		
			 	<td class="text-right">
					<a href="yersaglayiciduzenle.php?islem=guncelle&id=<?= $row->ID ?> " class="btn btn-warning">Güncelle</a>
					<a href="yersaglayiciduzenle.php?islem=sil&id=<?= $row->ID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<div class ="text-right">
			<a href="yersaglayiciduzenle.php?islem=ekle" class="btn btn-success" >Yer Saglayıcı Ekle</a>
			</div>
		  </div>  
	  </div>
	</div>

 
<?include('inc/footer.php')?>

 </form>
