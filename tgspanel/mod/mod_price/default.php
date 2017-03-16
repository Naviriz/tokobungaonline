<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
$page = $_GET['page'];
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Price</h3>
		<?php
		if($_GET['act']=="view"){
		?>
			<i class="icon-list-alt" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=priceCategory&page=$page"; ?>" size="10">View Price Category</a></i>
			<i class="icon-plus-sign" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=price&act=add&page=$page"; ?>" size="10">Add Price</a></i>
		<?php
		}else if($_GET['act']=="add" or $_GET['act']=="update"){
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=price&act=view&page=$page"; ?>" size="10">Back</a></i>
		<?php
		}
		?>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
		default:
	?>	
			<div class="shortcuts" style="padding-top:10px;"> 
			<?php
				$count = count($dbase->checkLevelId($_SESSION['userId']));
				$levelId = $dbase->checkLevelId($_SESSION['userId']);
				$levelName = $dbase->checkLevelName($_SESSION['userId']);
				$levelAdmin = $dbase->levelAdmin($_SESSION['userId']);
				$table = array(
					'subdomain SD',
					'level L'
				);
				$field = array(
					'SD.idSubDomain',
					'SD.subDomainName',
					'SD.icon',
					'L.levelName',
					'SD.levelId'
				);
				for($j=0; $j<$count; $j++){
					if($levelAdmin=="administrator"){
						$where = "SD.levelId=L.levelId";
					}else{
						$where = "SD.levelId=L.levelId AND SD.levelId='$levelId[$j]'";
					}
					foreach($dbase->select($table, $field, $where) as $data){
						if($data['levelId']!=""){		
			?>
					<a href="<?php echo "$_SERVER[PHP_SELF]?mod=price&act=view&page=$data[idSubDomain]"; ?>" class="shortcut">
						<i class="shortcut-icon icon-<?php echo $data['icon']; ?>"></i><span class="shortcut-label"><?php echo ucwords($data['levelName'])." - Price"; ?></span> 
					</a>
			<?php
						}
					}
				}
			?>
			</div>
	<?php
		break;
		
		case "view":
			include_once "mod/mod_price/selectPrice.php";
		break;
		
		case "add":
			include_once "mod/mod_price/addPrice.php";
		break;
		
		case "update":
			include_once "mod/mod_price/updatePrice.php";
		break;
		
		case "delete":
			include_once "mod/mod_price/deletePrice.php";
		break;
		
	}
	?>
	</div>
	<!-- /widget-content --> 
</div>
<!-- /widget --> 
<?php
}
?>