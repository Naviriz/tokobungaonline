<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='../../index.php';</script>";
}else{
	include_once "../../__class/db.php";
	include'../../../system/gdlibrary.php';
	include'../../../system/fungsi_seo.php';
	$dbase = new db();
	
	// table article category
	$tabel = "category";
	$id = $_POST['id'];
	$where = "id_category = '$id'";
	
	$fild = "max(sort) as max";
	//echo $dbase->select($tabel, $fild);
	foreach($dbase->select($tabel, $fild) as $maxsort){}
	$sort = $maxsort['max']+1;
	
	$categoryName = mysql_escape_string($_POST['category']);
	$headline = $_POST['headline'];
	$categorySeo = seo_title($categoryName);
	$categoryDate = date("y-m-d");
	if(isset($_GET['add'])){
		$nilai = array(
			'category' => $categoryName,
			'category_seo' => $categorySeo,
			'headline' => $headline,
			'sort' => $sort
		);
		$dbase->add($tabel, $nilai);
		echo "<script>document.location.href='../../main.php?mod=articleCategory';</script>";
	}else if(isset($_GET['update'])){
		$nilai = array(
			'category' => $categoryName,
			'category_seo' => $categorySeo,
			'headline' => $headline,
		);
		$dbase->update($tabel, $nilai, $where);
		echo "<script>document.location.href='../../main.php?mod=articleCategory';</script>";
	}
}
?>