<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "pricecategory";
$fild = "*";
$where = "priceCategoryId = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_price_category/actionPriceCategory.php?update" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Price Category Name</label></td>
			<td><input type="text" name="priceCategoryName" class="login" size="" value="<?php echo $data['priceCategoryName']; ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="page" value="<?php echo $page; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>