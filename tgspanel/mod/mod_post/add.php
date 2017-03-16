<form action="mod/mod_post/action.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Post Title</label></td>
			<td><input type="text" name="articleTitle" class="login" size=""  required /></td>
		</tr>
		<tr>
			<td><label>Post Content</label></td>
			<td><textarea rows="8" cols="30" name="articleContent" id="mytextarea"></textarea></td>
		</tr>
		<tr>
			<td><label>Post Status</label></td>
			<td>
				<input type='radio' name='articleStatus' class='login' value='P' checked />Pubished
				<input type='radio' name='articleStatus' class='login' value='U' />Unpublished
			</td>
		</tr>
		<tr>
			<td><label>Post Image</label></td>
			<td>
				<input type="file" name="fupload" />
			</td>
		</tr>
		<!--<tr>
			<td><label>Post Category</label></td>
			<td>
				<select name="categoryId">
                	<?php
						$tabel = "category";
						$fild = "*";
						foreach($dbase->select($tabel, $fild) as $category){
					?>
                    		<option value="<?php echo $category['id_category']; ?>"><?php echo $category['category']; ?></option>
                    <?php
						}
					?>
                </select>
			</td>
		</tr>-->
		<tr>
			<td></td>
			<td>
                <input type="hidden" name="fullname" value="<?php echo $_SESSION['full_name']; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>