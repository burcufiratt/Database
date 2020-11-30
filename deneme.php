<?php 
include("inc/db.php");
include('inc/header.php');
include('inc/navbar.php');


$sorgu= $baglan->prepare("DELETE FROM log WHERE tarih < DATE_SUB(NOW(), INTERVAL 1 DAY");
$result=$sorgu-> fetchAll(PDO::FETCH_OBJ);
?>
<form method="post" action="#">
 <div class="col-4 col-lg-6 text-center align-right" style= "margin:0px auto">
<table class="table">
  <caption>Son Hareketler</caption>
  <thead>
    <tr>
			 
			 <td><b>KULLANICI</td>
			  <td><b>HAREKET</td>
			  <td><b>TARIH/SAAT</td>
			 
			
			 </tr>
			 <?php
			$query = $baglan->prepare("SELECT * FROM log order by ID desc LIMIT 5");

			 $query->execute();
			 $result=$query-> fetchAll(PDO::FETCH_OBJ);
			 foreach($result as $row){?>
			  
			 	<tr>
			 	
			 	<td><?= $row->kullanici ?></td>
				<td><?= $row->tablo ?></td>
				<td><?= $row->tarih ?></td>
			<? }?>
		
  </tbody>
</table>
</div>

 

 </form>
<?include('inc/footer.php')?>