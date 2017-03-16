<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Service Name </th>
		<th> Service Date </th>
		<th> Service Description </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "level";
		$fild = "*";
		$no = 1;
		foreach($dbase->select($tabel, $fild) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['levelName']; ?> </td>
			<td> <?php echo $data['levelDate']; ?> </td>
			<td> <?php echo substr($data['levelDescription'],0,40)."..."; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=service&act=update&id=$data[levelId]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=service&act=delete&id=$data[levelId]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	
	</tbody>
</table>