<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$collection = $_GET['collection'];
$tabel = "product_category";
$where = "id_category = '$id'";

$dbase->delete($tabel, $where);
echo "<script>document.location.href='../../main.php?mod=product_category&collection=$collection';</script>";
?>