<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "price";
$where = "priceId = '$id'";
$page = $_GET['page'];

$dbase->delete($tabel, $where);
echo "<script>document.location.href='?mod=price&act=view&page=$page';</script>";
?>