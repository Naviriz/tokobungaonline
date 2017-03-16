<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='../../index.php';</script>";
}else{
	include_once "../../__class/db.php";
	$dbase = new db();
	$tabel = "article";
	$id = $_GET['id'];
	$where = "id_article = '$id'";
	
	$fild = "thumb_image";
	foreach($dbase->select($tabel, $fild, $where) as $data){}
	$currentImage = $data['thumb_image'];
	$folder="../../../assets/images/post/";
	$file_lama1 = $folder.$currentImage;
	$file_lama2 = $folder."thumb_".$currentImage;
	@unlink("$file_lama1");
	@unlink("$file_lama2");
	
	$dbase->delete($tabel, $where);
	echo "<script>document.location.href='../../main.php?mod=post';</script>";
}
?>