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
			<tr colspan = 5 ><b>WHITE LIST</tr>
			<tr>
			 <td><b>ID</b></td>
			 <td>HOST NAME</td>
			 <td>IP Türü</td>
			 <td>IP Adresi</td>
			 <td class="text-right"><b>YÖNET</b></td>
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM whitelist where Silindi=0");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->ID ?></td>
			 	<td><?= $row->HostName ?></td>
				<td><?= $row->IPTuru ?></td>
				<td><?= $row->IPAdresi ?></td>

	
		
			 	<td class="text-right">
					<a href="whitelistduzenle.php?islem=guncelle&id=<?= $row->ID ?> " class="btn btn-warning">Guncelle</a>
					<a href="whitelistduzenle.php?islem=sil&id=<?= $row->ID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<div class ="text-right">
			<a href="whitelistduzenle.php?islem=ekle" class="btn btn-success">Kayit Ekle</a>
			 </div> 
		  </div>  
	  </div>
	</div>

 
<?include('inc/footer.php')?>
 </form>
