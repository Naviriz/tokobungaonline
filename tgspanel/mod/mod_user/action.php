<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$action= $_GET['action'];
$tabel = "user";
$id = $_POST['id'];
$where = "userId = '$id'";
if($action=="add"){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$conPass = md5($_POST['conPass']);
	$level = $_POST['level'];
	if($password=="$conPass"){
		$nilai = array(
			'userName' => $username,
			'userPassword' => $password,
			'levelId' => $level
		);
		$dbase->add($tabel, $nilai);
		echo "<script>document.location.href='../../tableUser.php';</script>"; 
	}else{
		echo "<script type='text/javascript'>alert('Password tidak sama!')</script>";
		echo "<script>document.location.href='../../tableUser.php?action=add';</script>"; 
	}
}else if($action=="update"){
	$username = $_POST['username'];
	$level = $_POST['level'];
	$nilai = 
		array(
			'userName' => $username,
			'levelId' => $level
		);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../tableUser.php';</script>"; 
}
?>