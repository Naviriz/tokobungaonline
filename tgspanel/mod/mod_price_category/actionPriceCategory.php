<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "pricecategory";
$id = $_POST['id'];
$where = "priceCategoryId = '$id'";
$priceCategoryName = $_POST['priceCategoryName'];
$priceCategoryDate = date("y-m-d");
$page = $_POST['page'];
if(isset($_GET['add'])){
	$nilai = array(
		'priceCategoryName' => $priceCategoryName,
		'priceCategoryDate' => $priceCategoryDate,
		'idSubDomain' => $page
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=priceCategory&page=$page';</script>";
}else if(isset($_GET['update'])){
	$priceCategoryName = $_POST['priceCategoryName'];
	$nilai = 
		array(
			'priceCategoryName' => $priceCategoryName,
			'priceCategoryDate' => $priceCategoryDate,
		);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=priceCategory&page=$page';</script>"; 
}
?>