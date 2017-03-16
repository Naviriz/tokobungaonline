<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Category Name </th>
		<th> Room Price </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "roomcategory";
		$fild = array(
			'categoryName',
			'roomPrice', 
			'categoryId'
		);
		$no = 1;
		foreach($dbase->select($tabel, $fild) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['categoryName']; ?> </td>
			<td> <?php echo "Rp ".$dbase->formatRupiah($data['roomPrice']); ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="tableCategoryRoom.php?update&id=<?php echo $data['categoryId']; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="mod/mod_room_category/deleteRoomCategory.php?id=<?php echo $data['categoryId']; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>