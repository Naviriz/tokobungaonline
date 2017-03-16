<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "level";
$id = $_POST['id'];
$where = "levelId = '$id'";
$serviceName = ucwords($_POST['serviceName']);
$serviceDescription = ucwords($_POST['serviceDescription']);
$serviceDate = date("y-m-d");
if(isset($_GET['add'])){
	$nilai = array(
		'levelName' => $serviceName,
		'levelDate' => $serviceDate,
		'levelDescription' => $serviceDescription
	);
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=service';</script>";
}else if(isset($_GET['update'])){
	$nilai = array(
		'levelName' => $serviceName,
		'levelDate' => $serviceDate,
		'levelDescription' => $serviceDescription
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=service';</script>"; 
}
?>