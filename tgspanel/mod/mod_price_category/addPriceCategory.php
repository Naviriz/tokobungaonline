<form action="mod/mod_price_category/actionPriceCategory.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Price Category Name</label></td>
			<td><input type="text" name="priceCategoryName" class="login" size="" placeholder="Enter Price Category Name..." /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="page" value="<?php echo $page; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>