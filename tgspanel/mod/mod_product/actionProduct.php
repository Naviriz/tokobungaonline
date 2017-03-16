<?php
error_reporting(0);
$collection = $_POST['collection'];
include_once "../../__class/db.php";
include'../../../system/fungsi_seo.php';
$dbase = new db();
$tabel = "product";
$id = $_POST['id'];
$where = "id_product = '$id'";

$productName = mysql_real_escape_string(ucwords($_POST['productName']));
$productSeo = seo_title($productName);
$productDescription = $_POST['productDescription'];
$productSize = $_POST['productSize'];
$category = $_POST['category'];
$price = $_POST['productPrice'];
$productPrice = $dbase->standarNumber($price);
$coming_date = date("y-m-d");

$currentImage = $_POST['currentImage'];

$foto = $_FILES['file']['name'];
$file = rand(1000,100000)."-".$foto;
$file_loc = $_FILES['file']['tmp_name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$folder="../../../assets/images/product/";

$new_file_name = strtolower($file);

$final_file = str_replace(' ','-',$new_file_name);

if(isset($_GET['add'])){
	if(move_uploaded_file($file_loc,$folder.$final_file)){
		$nilai = array(
			'product_name' => $productName,
			'id_category' => $category,
			'product_name_seo' => $productSeo,
			'product_size' => $productSize,
			'description' => $productDescription,
			'price' => $productPrice,
			'coming_date' => $coming_date,
			'product_image' => $final_file
		);
		echo $dbase->add($tabel, $nilai);
		echo "<script>document.location.href='../../main.php?mod=product&collection=$collection';</script>"; 
	}else{
		echo "error";	
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
		'product_name' => $productName,
		'id_category' => $category,
		'product_name_seo' => $productSeo,
		'product_size' => $productSize,
		'description' => $productDescription,
		'price' => $productPrice,
		'coming_date' => $coming_date,
		'product_image' => $final_file
	);
	$dbase->update($tabel, $nilai, $where);
	echo "<script>document.location.href='../../main.php?mod=product&collection=$collection';</script>"; 
}
?>