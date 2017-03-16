<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Article Category</h3>
		<?php
		if($_GET['act']==""){
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=article&act=view"; ?>" size="10">Back to Manage Article</a></i>
			<i class="icon-plus-sign" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=articleCategory&act=add"; ?>" size="10">Add Article Category</a></i>
		<?php
		}else{
		?>
			<i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="<?php echo "$_SERVER[PHP_SELF]?mod=articleCategory"; ?>" size="10">Back</a></i>
		<?php
		}
		?>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
		default:
			include_once "selectArticleCategory.php";
		break;
		
		case "add":
			include_once "addArticleCategory.php";
		break;
		
		case "update":
			include_once "updateArticleCategory.php";
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