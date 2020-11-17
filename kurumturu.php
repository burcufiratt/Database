<?php 
include('inc/navbar.php');
include("inc/db.php");
include('inc/header.php')
?>

<form method="post" action="#">
<div class="container">

	  <div class="row justify-content-center">
		<div class="col">
		 <table class="table table-bordered table-striped table-dark">
			<tr>
			 <td>ID</td>
			 <td>KURUM TÜRÜ</td>
			 <td class="text-right">YÖNET</td>
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM kurumtürleri");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->ID ?></td>
			 	<td><?= $row->Adi ?></td>
	
		
			 		<td class="text-right">
					<a href="kurumturuduzenle.php?islem=guncelle&id=<?= $row->ID ?> " class="btn btn-warning">Güncelle</a>
					<a href="kurumturuduzenle.php?islem=sil&id=<?= $row->ID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<a href="kurumturuduzenle.php?islem=ekle" class="btn btn-success">EKLE</a>
		  </div>  
	  </div>
	</div>

 
  <?php include('inc/footer.php') ?>
 </form>
