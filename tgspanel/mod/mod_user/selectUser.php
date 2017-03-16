<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Full Name </th>
		<th> Username </th>
        <th> Email </th>
		<th> Level </th>
		<th> Block </th>
		<!--<th class="td-actions"> </th>-->
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "user";
		$fild = "userName, id_user, full_name, email, level, block";
		$no = 1;
		foreach($dbase->select($tabel, $fild) as $user){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $user['full_name']; ?> </td>
			<td> <?php echo $user['userName']; ?> </td>
            <td> <?php echo $user['email']; ?> </td>
			<td> <?php echo $user['level']; ?> </td>
			<td> <?php echo $user['block']; ?> </td>
			<!--<td width="10%">
				<!--tombol edit
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=user&act=update&id=$user[userId]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=user&act=delete&id=$user[userId]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>-->
		</tr>
	  <?php
		}
	  ?>
	
	</tbody>
</table>