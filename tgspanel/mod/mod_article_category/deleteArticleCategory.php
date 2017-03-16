<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='../../index.php';</script>";
}else{
	include_once "../../__class/db.php";
	$dbase = new db();
	$id = $_GET['id'];
	$tabel = "category";
	$page = $_GET['page'];
	$where = "id_category = '$id'";
	
	$dbase->delete($tabel, $where);
	echo "<script>document.location.href='../../main.php?mod=articleCategory';</script>"; 
}
?>