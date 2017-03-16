<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "roomcategory";
$id = $_POST['id'];
$where = "categoryId = '$id'";

$categoryId = $_POST['categoryId'];
$categoryName = $_POST['categoryName'];
$roomPrice = $_POST['roomPrice'];

$currentImage = $_POST['currentImage'];

$foto = $_FILES['file']['name'];
$file = rand(1000,100000)."-".$foto;
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="../../img/img_room/";

$new_file_name = strtolower($file);

$final_file = str_replace(' ','-',$new_file_name);

if(isset($_GET['add'])){
	if(move_uploaded_file($file_loc,$folder.$final_file)){
		$nilai = array(
			'categoryId' => $categoryId,
			'categoryName' => $categoryName,
			'roomPrice' => $roomPrice,
			'roomImage' => $final_file
		);
		echo $dbase->add($tabel, $nilai);
		echo "<script>document.location.href='../../tableRoomCategory.php';</script>"; 
	}else{
		echo "<script type='text/javascript'>alert('Error while uploading file')</script>";
		echo "<script>document.location.href='../../tableArticle.php?action=add';</script>"; 
	}
}else if(isset($_GET['update'])){
	if(!$foto==""){
		$file_lama = $folder.$currentImage;
		@unlink("$file_lama");
		move_uploaded_file($file_loc,$folder.$final_file);
	}else{
		$final_file = $currentImage;
	}
	$nilai = array(
		'articleTitle' => $articleTitle,
		'articleContent' => $articleContent,
		'articleStatus' => $articleStatus,
		'categoryId' => $categoryId,
		'articleImage' => $final_file,
		'articleDate' => $articleDate,
		'userId' => $userId
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../tableArticle.php';</script>";
}
?>