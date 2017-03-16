<form action="mod/mod_product_collection/actionProductCollection.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td width="250px"><label>Product Collection Name</label></td>
			<td><input type="text" name="collectionName" class="login" size="" placeholder="Enter Product Collection Name..." required /></td>
		</tr>
        <tr>
        	<td width="250px"><label>Product Collection Info</label></td>
			<td>
            	<textarea rows="5" cols="30" name="collectionInfo" class="login" placeholder="Enter Product Collection Info..." id="mytextarea"></textarea>
            </td>
        </tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
