<?php 
require_once 'kullaniciLog.php';
 $kullaniciLog = new kullaniciLog();
 header("content-type:text/html;charset=utf8");
 try{
	 $baglan= new PDO("mysql:hostname=localhost;dbname=demo;charset=utf8","root","");
	 $baglan->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $ex){
	 die("bağlantı hatası");
 }
 $query=$baglan->query("select * from kurumlar");
 ?>
