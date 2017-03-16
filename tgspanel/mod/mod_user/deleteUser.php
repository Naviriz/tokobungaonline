<?php
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "user";
$where = "userId = '$id'";
$dbase->delete($tabel, $where);
echo "<script>document.location.href='?mod=user';</script>"; 
?>