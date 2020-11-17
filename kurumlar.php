<?php 
include('inc/navbar.php');

include("inc/db.php");
include("inc/header.php")?>

<form method="post" action="#">
<div class="container">

	  <div class="row justify-content-center">
		<div class="col">
		 <table class="table table-bordered table-striped table-dark">
			<tr>
			 <td>ID</td>
			 <td>KURUM ADI</td>
			 <td>KURUM TÜRÜ</td>
			 <td class="text-right">YÖNET</td>
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM kurumlar");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->KID ?></td>
			 	<td><?= $row->KurumAdi ?></td>
				<td><?= $row->KTID ?></td>
		
			 		<td class="text-right">
					<a href="kurumlarduzenle.php?islem=guncelle&id=<?= $row->ID ?> " class="btn btn-warning">Güncelle</a>
					<a href="kurumlarduzenle.php?islem=sil&id=<?= $row->ID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<td><a href="kurumlarduzenle.php?islem=ekle" class="btn btn-success">EKLE</a></td>
		  </div>  
	  </div>
	</div>
 </form>
<? include("inc/footer.php")?>


