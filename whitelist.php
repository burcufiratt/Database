<?php 
include('inc/navbar.php');
include("db.php");
include('inc/header.php');
?>


<form method="post" action="#">
<div class="container">

	  <div class="row justify-content-center">
		<div class="col">
		 <table class="table table-bordered table-striped table-dark">
			<tr>
			 <td>ID</td>
			 <td>HOST NAME</td>
			 <td>IP Türü</td>
			 <td>IP Adresi</td>
			 <td>Kurum ID</td>
			 <td class="text-right">YÖNET</td>
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM whitelist");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->ID ?></td>
			 	<td><?= $row->HostName ?></td>
				<td><?= $row->IPTuru ?></td>
				<td><?= $row->IPAdresi ?></td>
				<td><?= $row->KurumID ?></td>
	
		
			 	<td class="text-right">
					<a href="whitelistduzenle.php?islem=guncelle&id=<?= $row->ID ?> " class="btn btn-warning">Güncelle</a>
					<a href="whitelistduzenle.php?islem=sil&id=<?= $row->ID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<a href="whitelistduzenle.php?islem=ekle" class="btn btn-success">EKLE</a>
		  </div>  
	  </div>
	</div>

 
<?include('inc/footer.php')?>
 </form>
