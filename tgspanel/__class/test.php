<?php
include_once "db.php";
$dbase = new db();
$query = $dbase->prepare("SELECT * FROM bahanbaku");
$query->execute();
foreach($query as $data){
	echo $data['namaBahanBaku'];
}
?>