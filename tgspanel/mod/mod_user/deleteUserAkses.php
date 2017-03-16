<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$userId = $_GET['userId'];
$levelId = $_GET['levelId'];
$tabel = "userakses";
$where = "userId = '$userId' AND levelId='$levelId'";
$dbase->delete($tabel, $where);
echo "<script>document.location.href='?mod=user&act=update&id=$userId';</script>";
?>