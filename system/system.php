<?php
// DATABASE CONNECTION
$server = "localhost";
$username = "root";
$password = "070412";
$database = "sekarsari";
$conn =mysql_connect($server,$username,$password) or die("Connection failed");
mysql_connect($server,$username,$password) or die("Connection failed");
mysql_select_db($database) or die("Cannot open database");

// Get Level
function get_article($param){
  // PISAHKAN VARIABEL
  $var = explode(",",$param);
  // BUAT VARIABEL
  $id = $var[0];
  $fetch = $var[1];
  // AMBIL DATA
  $Query_level = mysql_query("SELECT * FROM article WHERE id_article = '$id'");
  $Fetch_level = mysql_fetch_array($Query_level);
  $result = $Fetch_level[$fetch];
  return $result;
}

function get_idcategory($id){
	$query_category = mysql_query("SELECT id_category FROM product WHERE id_product='$id'");
	$fetch_category = mysql_fetch_array($query_category);
	$result = $fetch_category['id_category'];
	return $result;
}
/*
function get_product($param){
  // PISAHKAN VARIABEL
  $var = explode(",",$param);
  // BUAT VARIABEL
  $id = $var[0];
  $fetch = $var[1];
  // AMBIL DATA
  $Query_level = mysql_query("SELECT * FROM product p WHERE p.id_category='$id'");
  $Fetch_level = mysql_fetch_array($Query_level);
  $result = $Fetch_level[$fetch];
  return $result;
}*/

function get_product($param){
  // PISAHKAN VARIABEL
  $var = explode(",",$param);
  // BUAT VARIABEL
  $id = $var[0];
  $fetch = $var[1];
  // AMBIL DATA
  $Query_level = mysql_query("SELECT * FROM product p WHERE p.id_product='$id'");
  $Fetch_level = mysql_fetch_array($Query_level);
  $result = $Fetch_level[$fetch];
  return $result;
}

//STRIP TAGS
function prep($text){
	$result = strip_tags($text,'<p><a><br />');
	return $result;
}

// Get collection
function get_collection($param){
  // PISAHKAN VARIABEL
  $var = explode(",",$param);
  // BUAT VARIABEL
  $id = $var[0];
  $fetch = $var[1];
  // AMBIL DATA
  $Query_level = mysql_query("SELECT * FROM product_collection WHERE id_collection = '$id'");
  $Fetch_level = mysql_fetch_array($Query_level);
  $result = $Fetch_level[$fetch];
  return $result;
}

function get_category($param){
  // PISAHKAN VARIABEL
  $var = explode(",",$param);
  // BUAT VARIABEL
  $id = $var[0];
  $fetch = $var[1];
  // AMBIL DATA
  $Query_level = mysql_query("SELECT * FROM category WHERE id_category = '$id'");
  $Fetch_level = mysql_fetch_array($Query_level);
  $result = $Fetch_level[$fetch];
  return $result;
}

function get_product_category($param){
  // PISAHKAN VARIABEL
  $var = explode(",",$param);
  // BUAT VARIABEL
  $id = $var[0];
  $fetch = $var[1];
  // AMBIL DATA
  $Query_level = mysql_query("SELECT * FROM product_category WHERE id_category = '$id'");
  $Fetch_level = mysql_fetch_array($Query_level);
  $result = $Fetch_level[$fetch];
  return $result;
}

// Get Level
function get_title(){

  if($_GET['page']=='home'){ $result = "Home | Sekar Sari Florist"; }
  elseif($_GET['page']=='contact') { $result = "Contact Us"; }
  elseif($_GET['page']=='about') { $result = "About Us | Sekar Sari Florist"; }
  elseif($_GET['page']=='info') { $result = "Informasi Kami | Sekar Sari Florist"; }
  elseif($_GET['page']=='contact') { $result = "Contact Us | Sekar Sari Florist"; }
  elseif($_GET['page']=='cart') { $result = "Cart | Sekar Sari Florist"; }
  elseif($_GET['page']=='instruction') { $result = "Instruction Order | Sekar Sari Florist"; }
  elseif($_GET['page']=='checkout') { $result = "Checkout | Sekar Sari Florist"; }
  elseif($_GET['page']=='show_product'){ $title = get_product_category("$_GET[id],category_name"); $result = ucwords($title)." | Sekar Sari Florist";}
  elseif($_GET['page']=='show_collection'){ $title = get_collection("$_GET[id],collection_name"); $result = ucwords($title)." | Sekar Sari Florist";}
  elseif($_GET['page']=='read_product'){ $title = get_product("$_GET[id],product_name"); $result = "$title";}
  elseif($_GET['page']=='read') { $title = get_article("$_GET[id],title"); $result = "$title"; }
  elseif($_GET['page']=='category') { $title = get_category("$_GET[id],category"); $result = "$title"; }
return $result;
}


function get_keyword(){
  if($_GET['page']=='home'){ $result = "bali destination, tour,ubud , lovina, gili trawangan lombok, bali tour travel, spa trekking dinner"; }
  elseif($_GET['page']=='contact') { $result = "bali destination, tour,ubud , lovina, gili trawangan lombok, bali tour travel, spa trekking dinner, contact"; }
  elseif($_GET['page']=='about') { $result = "bali destination, tour,ubud , lovina, gili trawangan lombok, bali tour travel, spa trekking dinner, about"; }
  return $result;
}

function get_description(){
  if($_GET['page']=='home'){ $result = "Air Resort Swimwear is inspired by the reflection of ethnicity from Bali"; }
  elseif($_GET['page']=='contact') { $result = "AIR fall under the company P.T Bali Balance"; }
  elseif($_GET['page']=='about') { $result = "AIR fall under the company P.T Bali Balance"; }
  elseif($_GET['page']=='category') { $result = "Check out our Blog and get more updated information about Air Resort"; }
   elseif($_GET['page']=='read') { $result = "Check out our Blog and get more updated information about Air Resort"; }
  return $result;
}

?>
