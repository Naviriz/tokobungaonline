<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>New Transaksi</h3>
	</div>
	<div class="widget-content">
	<?php
		switch($_GET['act']){
			default:
				include_once "select.php";
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
