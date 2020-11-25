<?php
include("inc/db.php");
session_start();

class kullaniciLog 
{
public function start($id= 0){
	if($id !=0){
	$requestUrl = $_SERVER['REQUEST_URI'];
	$kullanici=$_SESSION['name'];
	$sorgu = $this->prepare("INSERT INTO log (ID, kullanici,islem) VALUES (?,?,?)");
	$sorgu->execute(array($id, $kullanici, $requestUrl));
	}
}}?>