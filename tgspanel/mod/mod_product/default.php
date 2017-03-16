<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Product - Collection Name: <?php echo $dbase->collectionName($_GET['collection']); ?></h3>	
		<?php
		if($_GET['act']=="add" or $_GET['act']=="update"){
		?>
        	<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=product&collection=$_GET[collection]"; ?>" size="10">Back</a></i>
        <?php
		}else{
		?>
			<i class="icon-plus-sign" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=product&act=add&collection=$_GET[collection]"; ?>" size="10">Add Product</a></i>
		<?php	
		}
		?>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
			default:
				include_once "selectProduct.php";
			break;
			
			case "add":
				include_once "addProduct.php";
			break;
			
			case "update":
				include_once "updateProduct.php";
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