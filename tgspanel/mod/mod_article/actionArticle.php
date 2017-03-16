<?php
error_reporting(0);
include_once "../../__class/db.php";
include'../../../system/gdlibrary.php';
include'../../../system/fungsi_seo.php';
$dbase = new db();
$tabel = "article_id";
$id = $_POST['id'];
$where = "id_article = '$id'";

$articleTitle = mysql_real_escape_string(ucfirst($_POST['articleTitle']));
$titleSeo = seo_title($articleTitle);
$articleContent = $_POST['articleContent'];
$articleStatus = $_POST['articleStatus'];
$categoryId = $_POST['categoryId'];
$fullname = $_POST['fullname'];

$articleDate = date("y-m-d");

$currentImage = $_POST['current'];

$folder="../../img/img_article/";
$foto = $_FILES['fupload']['name'];
$file = rand(1000,100000)."-".$foto;
$file_loc = $_FILES['fupload']['tmp_name'];
$file_size = $_FILES['fupload']['size'];
$file_type = $_FILES['fupload']['type'];

$new_file_name = strtolower($file);

$final_file = str_replace(' ','-',$new_file_name);

if(isset($_GET['add'])){
	
	if(!empty($file_loc)){
		UploadArticle($final_file);
		$nilai = array(
			'writer' => $fullname,
			'title' => $articleTitle,
			'status' => $articleStatus,
			'content' => $articleContent,
			'date' => $articleDate,
			'thumb_image' => $final_file,
			'id_category' => $categoryId
			
		);
	}else{
		$nilai = array(
			'writer' => $fullname,
			'title' => $articleTitle,
			'title_seo' => $titleSeo,
			'status' => $articleStatus,
			'content' => $articleContent,
			'date' => $articleDate,
			'id_category' => $categoryId
		);
		
	}
	$dbase->add($tabel, $nilai);
	echo "<script>document.location.href='../../main.php?mod=article';</script>";
	
}else if(isset($_GET['update'])){
	if(!empty($file_loc)){
		$file_lama1 = $folder.$currentImage;
		$file_lama2 = $folder."thumb_".$currentImage;
		@unlink("$file_lama1");
		@unlink("$file_lama2");
		UploadArticle($final_file);
		$nilai = array(
			'writer' => $fullname,
			'title' => $articleTitle,
			'status' => $articleStatus,
			'content' => $articleContent,
			'date' => $articleDate,
			'thumb_image' => $final_file,
			'id_category' => $categoryId
			
		);
	}else{
		$nilai = array(
			'writer' => $fullname,
			'title' => $articleTitle,
			'title_seo' => $titleSeo,
			'status' => $articleStatus,
			'content' => $articleContent,
			'date' => $articleDate,
			'id_category' => $categoryId
		);
	}
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=article';</script>";
}
?>