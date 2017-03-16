<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "transaksi";
$id = $_GET['id'];
$where = "id_transaksi = '$id'";
$nilai = array(
	'status' => "N"
);
$dbase->update($tabel, $nilai, $where);
echo "<script>document.location.href='../../main.php?mod=newtransaksi';</script>";
?>
