<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
$page = $_GET['page'];
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Service</h3>
		<?php
		if($_GET['act']==""){
		?>
			<i class="icon-plus-sign" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=service&act=add"; ?>" size="10">Add Service</a></i>
		<?php
		}else if($_GET['act']=="add" or $_GET['act']=="update"){
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=service"; ?>" size="10">Back</a></i>
		<?php
		}
		?>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
		default:
			include_once "mod/mod_service/selectService.php";
		break;
		
		case "add":
			include_once "mod/mod_service/addService.php";
		break;
		
		case "update":
			include_once "mod/mod_service/updateService.php";
		break;
		
		case "delete":
			include_once "mod/mod_service/deleteService.php";
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