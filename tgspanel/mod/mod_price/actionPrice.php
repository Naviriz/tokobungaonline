<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "price";
$id = $_POST['id'];
$where = "priceId = '$id'";

$priceTitle = $_POST['priceTitle'];
$priceInclude = $_POST['priceInclude'];
$priceBudget = $_POST['priceBudget'];
$priceCategoryId = $_POST['priceCategoryId'];
$page = $_POST['page'];

if($priceCategoryId==""){
	$priceCategoryId = $_POST['catId'];
}

if(isset($_GET['add'])){
	$nilai = array(
		'priceTitle' => $priceTitle,
		'priceInclude' => $priceInclude,
		'priceBudget' => $priceBudget,
		'priceCategoryId' => $priceCategoryId
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=price&act=view&page=$page';</script>"; 
}else if(isset($_GET['update'])){
	$nilai = array(
		'priceTitle' => $priceTitle,
		'priceInclude' => $priceInclude,
		'priceBudget' => $priceBudget,
		'priceCategoryId' => $priceCategoryId
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=price&act=view&page=$page';</script>";
}
?>