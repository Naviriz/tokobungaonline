<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "level";
$fild = "*";
$where = "levelId = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_service/actionService.php?update" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Service Name</label></td>
			<td><input type="text" name="serviceName" class="login" size="" value="<?php echo $data['levelName']; ?>" /></td>
		</tr>
		<tr>
			<td><label>Service Description</label></td>
			<td>
				<textarea rows="8" cols="30" name="serviceDescription" style="width:450px;" required ><?php echo $data['levelDescription']; ?></textarea>
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