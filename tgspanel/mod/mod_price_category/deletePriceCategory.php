<?php
error_reporting();
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "pricecategory";
$page = $_GET['page'];
$where = "priceCategoryId = '$id'";

$dbase->delete($tabel, $where);
echo "<script>document.location.href='?mod=priceCategory&page=$page';</script>"; 
?>