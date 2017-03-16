<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "user";
$fild = "username, fullName, block, jobPosition";
$where = "userId = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_user/actionUser.php?update" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Full Name</label></td>
			<td><input type="text" readonly name="fullName" value="<?php echo $data['fullName']; ?>" class="login" size="" /></td>
		<tr/>
		<tr>
			<td width="200px"><label>Username</label></td>
			<td><input type="text" name="username" class="login" size="" value="<?php echo $data['username']; ?>" /></td>
		</tr>
		<tr>
			<td width="200px"><label>Job Position</label></td>
			<td>
				<input type="text" name="jobPosition" class="login" size="" value="<?php echo $data['jobPosition']; ?>" />
			</td>
		</tr>
		<tr>
			<td width="200px"><label>Block</label></td>
			<td>
				<?php if($data['block']=="Y"){ ?>
				<input type="radio" name="block" class="login" size="" value="Y" checked />Y			
				<input type="radio" name="block" class="login" size="" value="N" />N			
				<?php }else{ ?>
				<input type="radio" name="block" class="login" size="" value="Y" />Y			
				<input type="radio" name="block" class="login" size="" value="N" checked />N
				<?php } ?>
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
<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Level Name </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel1 = array(
			'level L',
			'userAkses UA'
		);
		$fild1 = array(
			'UA.userId',
			'L.levelName',
			'L.levelId'
		);
		$where1 = "L.levelId=UA.levelId AND UA.userId='$id'";
		$no = 1;
		foreach($dbase->select($tabel1, $fild1, $where1) as $user){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $user['levelName']; ?></td>
			<td>
				<!--tombol edit-->
				<a href="" onClick="window.open('mod/mod_user/actionUserAkses.php?select&userId=<?php echo $user['userId']; ?>&levelId=<?php echo $user['levelId']; ?>','scrollwindow','top=200,left=350,width=550,height=370');" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=user&act=deleteAkses&userId=$user[userId]&levelId=$user[levelId]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	
	</tbody>
</table>