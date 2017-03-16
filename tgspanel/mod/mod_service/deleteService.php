<?php
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "level";
$where = "levelId = '$id'";
$dbase->delete($tabel, $where);
echo "<script>document.location.href='?mod=service';</script>"; 
?>