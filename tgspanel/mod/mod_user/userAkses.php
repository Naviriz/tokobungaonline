<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = array(
	'user U',
	'userAkses UA'
);
$fild = array(
	'U.userName',
	'UA.userId',
	'UA.levelId'
);
$where = "UA.userId=U.userId AND UA.userId = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $user){}
?>
<form action="mod/mod_user/actionUser.php?userAkses" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Username</label></td>
			<td><input type="text" name="username" class="login" size="" readonly value="<?php echo $dbase->check_userName($id); ?>"  /></td>
		</tr>
		
		<tr>
			<td><label>Level Akses</label></td>
			<td>
				<?php
					$idUser = $_GET['id'];
					$count = count($dbase->checkLevelId($id));
					$levelId = $dbase->checkLevelId($id);
					$tabel1 = "level";
					$fild1 = "*";
					foreach($dbase->select($tabel1, $fild1) as $data){	
				?>
						<input type="checkbox" name="level[]" value="<?php echo $data['levelId']; ?>" />&nbsp;<?php echo ucwords($data['levelName']); ?>&nbsp;&nbsp;
				<?php
					}
				?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>