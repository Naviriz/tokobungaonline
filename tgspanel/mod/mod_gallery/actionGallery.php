<?php
error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$tabel = "gallery";
$id = $_POST['id'];
$where = "galleryId = '$id'";

$galleryTitle = $_POST['galleryTitle'];
$galleryDescription = $_POST['galleryDescription'];
$galleryStatus = $_POST['galleryStatus'];

$currentImage = $_POST['currentImage'];

$foto = $_FILES['file']['name'];
$file = rand(1000,100000)."-".$foto;
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="../../../img/img_gallery/";

$new_file_name = strtolower($file);

$final_file = str_replace(' ','-',$new_file_name);

if(isset($_GET['add'])){
	if(move_uploaded_file($file_loc,$folder.$final_file)){
		$nilai = array(
			'galleryTitle' => $galleryTitle,
			'galleryDescription' => $galleryDescription,
			'galleryStatus' => $galleryStatus,
			'galleryImage' => $final_file
		);
		$dbase->add($tabel, $nilai);
		echo "<script>document.location.href='../../tableGallery.php';</script>"; 
	}else{
		echo "<script type='text/javascript'>alert('Error while uploading file')</script>";
		echo "<script>document.location.href='../../tableGallery.php?add';</script>"; 
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
		'galleryTitle' => $galleryTitle,
		'galleryDescription' => $galleryDescription,
		'galleryStatus' => $galleryStatus,
		'galleryImage' => $final_file
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../tableGallery.php';</script>";
}
?>