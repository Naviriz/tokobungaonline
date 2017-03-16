<?php
error_reporting(0);
include_once "../../__class/db.php";
include'../../../system/gdlibrary.php';
include'../../../system/fungsi_seo.php';
$dbase = new db();
$tabel = "product_category";
$collection = $_POST['collection'];

//only update action
$id = $_POST['id'];
$where = "id_category = '$id'";

$categoryName = mysql_real_escape_string(ucwords($_POST['categoryName']));
$categorySeo = seo_title($categoryName);

if(isset($_GET['add'])){
	$nilai = array(
		'category_name' => $categoryName,
		'category_name_seo' => $categorySeo,
		'id_collection' => $collection
	);
	echo $dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=product_category&collection=$collection';</script>";
}else if(isset($_GET['update'])){
	$nilai = array(
		'category_name' => $categoryName,
		'category_name_seo' => $categorySeo,
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=product_category&collection=$collection';</script>";
}
?>