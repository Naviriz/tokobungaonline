<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
$tabel = array(
	'article'
);
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Post Information</h3>
			
		<?php
		if($_GET['act']=="add" or $_GET['act']=="update"){
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=post"; ?>" size="10">Back</a></i>
		<?php
		}else{
		?>
			<i class="icon-plus-sign" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=post&act=add"; ?>" size="10">Add Article</a></i>
		<?php	
		}
		?>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
			default:
				include_once "select.php";
			break;
			
			case "add":
				include_once "add.php";
			break;
			
			case "update":
				include_once "update.php";
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