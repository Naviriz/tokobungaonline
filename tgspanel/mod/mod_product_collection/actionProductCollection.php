<?php
error_reporting(0);
include_once "../../__class/db.php";
include'../../../system/gdlibrary.php';
include'../../../system/fungsi_seo.php';
$dbase = new db();
$tabel = "product_collection";
$id = $_POST['id'];
$where = "id_collection = '$id'";

$collectionName = mysql_real_escape_string(ucwords($_POST['collectionName']));
$collectionSeo = seo_title($collectionName);
$collectionInfo = mysql_real_escape_string(ucfirst($_POST['collectionInfo']));

$new_file_name = strtolower($file);


if(isset($_GET['add'])){
	$nilai = array(
		'collection_name' => $collectionName,
		'collection_name_seo' => $collectionSeo,
		'info' => $collectionInfo
	);
	echo $dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=product_collection';</script>";
}else if(isset($_GET['update'])){
	$nilai = array(
		'collection_name' => $collectionName,
		'collection_name_seo' => $collectionSeo,
		'info' => $collectionInfo
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=product_collection';</script>";
}
?>