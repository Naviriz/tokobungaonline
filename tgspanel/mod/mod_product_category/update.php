<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "product_category";
$fild = "*";
$where = "id_category = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_product_category/action.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td width="250px"><label>Product Category Name</label></td>
			<td><input type="text" name="categoryName" class="login" size="" value="<?php echo $data['category_name'] ?>" required /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $data['id_category']; ?>" />
                <input type="hidden" name="collection" value="<?php echo $collection; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>