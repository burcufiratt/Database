<?php 

include("inc/db.php");
include('inc/header.php');
include('inc/navbar.php');?>

<form method="post" action="#">
<div class="container">

	  <br><div class="row justify-content-center">
		<div class="col">
		 <table class="table table-bordered table-striped table-light">
			<tr colspan = 5 ><b>BAD WORDS</tr>
			<tr>
			 <td><b>ID</td>
			 <td>Kelime</td>
			 <td class="text-right"><b>YÖNET</td>
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM badwords");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->ID ?></td>
			 	<td><?= $row->Kelime ?></td>
	
		
			 	<td class="text-right">
					<a href="badwordsduzenle.php?islem=guncelle&id=<?= $row->ID ?> " class="btn btn-warning">Güncelle</a>
					<a href="badwordsduzenle.php?islem=sil&id=<?= $row->ID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<div class ="text-right">
			<a href="badwordsduzenle.php?islem=ekle" class="btn btn-success">Kayıt Ekle</a>
		  </div>   </div> 
	  </div>
	</div>

<?include('inc/footer.php');?>

 </form>
