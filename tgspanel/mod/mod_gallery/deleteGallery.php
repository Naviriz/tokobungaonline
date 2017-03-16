<?php
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "gallery";
$where = "galleryId = '$id'";

$fild = "galleryImage";
foreach($dbase->select($tabel, $fild, $where) as $data){}
$currentImage = $data['galleryImage'];
$folder="../../img_gallery/";
$file_lama = $folder.$currentImage;
echo $file_lama;
@unlink("$file_lama");

$dbase->delete($tabel, $where);
echo "<script>document.location.href='../../tableGallery.php';</script>"; 
?>