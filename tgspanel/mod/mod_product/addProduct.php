<form action="mod/mod_product/actionProduct.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td width="250px"><label>Product Name</label></td>
			<td><input type="text" name="productName" class="login" size="" placeholder="Enter Product Name..." required /></td>
		</tr>
		<tr>
			<td style="vertical-align:top;"><label>Product Description</label></td>
			<td><textarea rows="15" cols="5" name="productDescription" id="mytextarea" class="login" size="" placeholder="Enter Product Description..."></textarea></td>
		</tr>
        <tr>
			<td><label>Product Size</label></td>
			<td><input type="text" name="productSize" class="login" size="" placeholder="Enter Product Size..." /></td>
		</tr>
		<tr>
			<td><label>Product Price</label></td>
			<td><input type="text" name="productPrice" id="price" class="login" size="" required placeholder="Enter Product Price..." /></td>
		</tr>
		<tr>
			<td><label>Product Image</label></td>
			<td>
				<input type="file" name="file" />
			</td>
		</tr>
        <tr>
        	<td><label>Product Category</label></td>
            <td>
            	<select name="category" class="login">
                	<?php
						$category = "product_category";
						$fildct = array(
							'category_name',
							'id_category'
						);
						$wherect = "id_collection='$_GET[collection]'";
						foreach($dbase->select($category, $fildct, $wherect) as $pc){
							echo "<option value='$pc[id_category]'>".ucwords($pc['category_name'])."</option>";
						}
					?>
                </select>
            </td>
        </tr>
		<tr>
			<td></td>
			<td>
            	<input type="hidden" name="collection" value="<?php echo $_GET['collection']; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
