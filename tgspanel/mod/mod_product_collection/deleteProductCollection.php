<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "product_collection";
$where = "id_collection = '$id'";

$dbase->delete($tabel, $where);
echo "<script>document.location.href='../../main.php?mod=product_collection';</script>";
?>