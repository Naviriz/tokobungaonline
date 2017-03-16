<form action="mod/mod_user/actionUser.php?add" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Full Name</label></td>
			<td><input type="text" name="fullName" class="login" size="" placeholder="Enter Full Name" /></td>
		<tr/>
		<tr>
			<td width="200px"><label>Username</label></td>
			<td><input type="text" name="username" class="login" size="" placeholder="Enter Username" /></td>
		</tr>
		<tr>
			<td width="200px"><label>Job Position</label></td>
			<td>
				<input type="text" name="jobPosition" class="login" size="" placeholder="Enter Job Position" />
			</td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input type="password" id="password" name="password" value="" placeholder="Enter Password" class="login" /></td>
		</tr>
		<tr>
			<td><label>Confirm Password</label></td>
			<td><input type="password" id="conPass" name="conPass" value="" placeholder="Confirm Password" class="login"/></td>
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