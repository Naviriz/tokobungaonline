<?php
if(!isset($_SESSION['username'])){
	echo "<script>document.location.href='login.php';</script>";
}else{
$page = $_GET['page'];
?>
<div class="widget widget-table action-table">
	<div class="widget-header"> <i class="icon-th-list"></i>
		<h3>Manage Password</h3>
	</div>
	<div class="widget-content">
		<form action="" method="POST">
			<table class="table">
				<tr>
					<td width="200px"><label>Username</label></td>
					<td><input type="text" name="username" class="login" size="" value="<?php echo $_SESSION['username']; ?>" /></td>
				</tr>
				<tr>
					<td><label>Old Password</label></td>
					<td><input type="password" id="password" name="oldPass" value="" placeholder="Enter Old Password" class="login" /></td>
				</tr>
				<tr>
					<td><label>New Password</label></td>
					<td><input type="password" id="password" name="newPass" value="" placeholder="Enter New Password" class="login" /></td>
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
	</div>
	<!-- /widget-content --> 
</div>
<?php 
	include_once "footer.php";
	if(isset($_POST['save'])){
		$tabel = "user";
		$where = "userName = '$_SESSION[username]'";
		$oldPass = md5($_POST['oldPass']);
		$newPass = md5($_POST['newPass']);
		$conPass = md5($_POST['conPass']);
		$check = $dbase->checkPassword($_SESSION['username'],$oldPass);
		if($check){
			if($newPass=="$conPass"){
				$nilai = array(
					'userPassword' => $conPass
				);
				$dbase->update($tabel, $nilai, $where);
				echo "<script type='text/javascript'>alert('Password berhasil di ubah!')</script>"; 
			}else{
				echo "<script type='text/javascript'>alert('Password dan confirm password tidak sama!')</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Password lama anda salah!')</script>";
		}
	}
?>
<!-- /widget --> 
<?php
}
?>