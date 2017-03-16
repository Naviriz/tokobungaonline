<form action="mod/mod_article_category/actionArticleCategory.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Category Name</label></td>
			<td><input type="text" name="category" class="login" size="" placeholder="Enter Article Category Name..." /></td>
		</tr>
        <tr>
        	<td><label>Headline</label></td>
            <td>
            	<select name="headline">
                	<option value="Y">Yes</option>
                    <option value="N">No</option>
                </select>
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