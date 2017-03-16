<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
$page = $_GET['page'];
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Price Category</h3>
		<?php
		if($_GET['act']==""){
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=price&act=view&page=$page"; ?>" size="10">Back to Manage Price</a></i>
			<i class="icon-plus-sign" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=priceCategory&act=add&page=$page"; ?>" size="10">Add Price Category</a></i>
		<?php
		}else if($_GET['act']=="add" or $_GET['act']=="update"){
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=priceCategory&page=$page"; ?>" size="10">Back</a></i>
		<?php
		}
		?>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
		default:
			include_once "mod/mod_price_category/selectPriceCategory.php";
		break;
		
		case "add":
			include_once "mod/mod_price_category/addPriceCategory.php";
		break;
		
		case "update":
			include_once "mod/mod_price_category/updatePriceCategory.php";
		break;
		
		case "delete":
			include_once "mod/mod_price_category/deletePriceCategory.php";
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