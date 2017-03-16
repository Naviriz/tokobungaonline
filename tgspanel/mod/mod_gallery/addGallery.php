<form action="mod/mod_gallery/actionGallery.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Gallery Title</label></td>
			<td><input type="text" name="galleryTitle" class="login" size="" placeholder="Enter Gallery Title..." required /></td>
		</tr>
		<tr>
			<td><label>Gallery Description</label></td>
			<td><textarea rows="8" cols="30" style="width:450px;" name="galleryDescription" style="width:450px;" placeholder="Enter Gallery Description..." ></textarea></td>
		</tr>
		<tr>
			<td><label>Gallery Status</label></td>
			<td>
				<input type="radio" name="galleryStatus" class="login" value="Y" />ON
				<input type="radio" name="galleryStatus" class="login" value="N" />OFF
			</td>
		</tr>
		<tr>
			<td><label>Gallery Image</label></td>
			<td>
				<input type="file" name="file" />
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