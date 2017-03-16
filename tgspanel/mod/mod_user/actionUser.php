<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "user";
$id = $_POST['id'];
$where = "userId = '$id'";
$username = $_POST['username'];
$password = md5($_POST['password']);
$conPass = md5($_POST['conPass']);
$fullName = $_POST['fullName'];
$jobPosition = ucwords($_POST['jobPosition']);
$block = $_POST['block'];
if(isset($_GET['add'])){
	if($password=="$conPass"){
		$value = array(
			'fullName' => $fullName,
			'userName' => $username,
			'userPassword' => $password,
			'jobPosition' => $jobPosition,
			'block' => 'N'
		);
		$dbase->add($tabel, $value);
		echo "<script>document.location.href='../../main.php?mod=user';</script>"; 
	}else{
		echo "<script type='text/javascript'>alert('Password tidak sama!')</script>";
		echo "<script>document.location.href='../../main.php?mod=user&act=add';</script>"; 
	}
}else if(isset($_GET['update'])){
	$value = 
		array(
			'userName' => $username,
			'jobPosition' => $jobPosition,
			'block' => $block
		);
	$dbase->update($tabel, $value, $where);
	echo "<script>document.location.href='../../main.php?mod=user';</script>"; 
}else if(isset($_GET['userAkses'])){
	$tabelAkses = "userakses";
	$count = count($_POST['level']);
	for($i=0; $i<$count; $i++){
		$level = $_POST['level'][$i];
		$value = array(
			'userId' => $id,
			'levelId' => $level
		);
		$dbase->add($tabelAkses, $value);
	}
	echo "<script>document.location.href='../../main.php?mod=user';</script>"; 
}
?>