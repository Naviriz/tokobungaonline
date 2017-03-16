<?php
include_once "__class/db.php";
$dbase = new db();
$query = $dbase->prepare("SELECT * FROM bahanbaku");
$query->execute();
/*foreach($query as $data){
	echo $data['namaBahanBaku'];
}*/
echo $dbase->check_login("admin","admin");
?>