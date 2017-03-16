<form action="mod/mod_service/actionService.php?add" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Service Name</label></td>
			<td><input type="text" name="serviceName" class="login" size="" placeholder="Enter Service Name" /></td>
		</tr>
		<tr>
			<td><label>Service Description</label></td>
			<td>
				<textarea rows="8" cols="30" name="serviceDescription" style="width:450px;" placeholder="Enter Article Content..." required ></textarea>
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