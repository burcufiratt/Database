<?php 
include("inc/db.php");
include("inc/header.php");
include('inc/navbar.php');?>

<form method="post" action="#">
<div class="container">

	  <br><div class="row justify-content-center">
		<div class="col">
		 <table class="table table-bordered table-striped table-light">
			<tr colspan = 5 ><b>KURUMLAR</tr>
			<tr>
			 <td><b>ID</td>
			 <td>KURUM ADI</td>
			 <td>DOMAIN</td>
			 <td>KURUM TÜRÜ</td>
			 <td class="text-right"><b>YÖNET</td>
			
			 </tr>
			 <?php
		
			$query = $baglan->prepare("select * from kurumlar INNER JOIN kurumtürleri ON kurumlar.KTID = kurumtürleri.ID where kurumlar.Silindi=0");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);

			 foreach($result as $row){?>
			  
			 	<tr>
			 	<td><?= $row->KID ?></td>
			 	<td><?= $row->KurumAdi ?></td>
				<td><?= $row->Domain ?></td>
				<td><?= $row->Adi ?></td>
		
			 		<td class="text-right">
					<a href="kurumlarduzenle.php?islem=guncelle&id=<?= $row->KID ?> " class="btn btn-warning">Guncelle</a>
					<a href="kurumlarduzenle.php?islem=sil&id=<?= $row->KID ?> " class="btn btn-danger">Sil</a>
				</td>
			    </tr>
				 
			 <?php } ?>

					
					
				
			</table> 
			<div class ="text-right">
			<td><a href="kurumlarduzenle.php?islem=ekle" class="btn btn-success">Kurum Ekle</a></td>
		  </div>  </div>
	  </div>
	</div>
 </form>
<? include("inc/footer.php")?>


