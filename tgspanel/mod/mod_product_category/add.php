<form action="mod/mod_product_category/action.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td width="250px"><label>Product Category Name</label></td>
			<td><input type="text" name="categoryName" class="login" size="" placeholder="Enter Product Name..." required /></td>
		</tr>
		<tr>
			<td></td>
			<td>
            	<input type="hidden" name="collection" value="<?php echo $collection; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
