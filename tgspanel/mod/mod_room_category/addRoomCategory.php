<form action="mod/mod_room_category/actionRoomCategory.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Category Id</label></td>
			<td><input type="text" name="categoryId" class="login" size="" readonly value="<?php echo $dbase->formatCategoryId(); ?>" /></td>
		</tr>
		<tr>
			<td><label>Category Name</label></td>
			<td><input type="text" name="categoryName" class="login" size="" placeholder="Enter Category Name..." /></td>
		</tr>
		<tr>
			<td><label>Room Price</label></td>
			<td><input type="text" name="roomPrice" class="login" size="" placeholder="Enter Room Price..." /></td>
		</tr>
		<tr>
			<td><label>Room Image</label></td>
			<td>
				<input type="file" name="file" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="userId" class="login" size="" value="<?php echo $dbase->check_userId($_SESSION['username']); ?>"  />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>