<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$collection = $_GET['collection'];
$tabel = "product";
$where = "id_product = '$id'";

$fild = "product_image";
foreach($dbase->select($tabel, $fild, $where) as $data){}
$currentImage = $data['product_image'];
$folder="../../../assets/images/product/";
$file_lama = $folder.$currentImage;
@unlink("$file_lama");

$dbase->delete($tabel, $where);
echo "<script>document.location.href='../../main.php?mod=product&collection=$collection';</script>"; 
?>