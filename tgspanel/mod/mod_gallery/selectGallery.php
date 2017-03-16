<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Gallery Title </th>
		<th> Gallery Description </th>
		<th> Gallery Status </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "gallery";
		$fild = "*";
		$no = 1;
		foreach($dbase->select($tabel, $fild) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['galleryTitle']; ?> </td>
			<td> <?php echo substr($data['galleryDescription'],0,40)."..."; ?> </td>
			<td> 
				<?php 
				if($data['galleryStatus']=="Y"){
					$status = "ON";
				}else{
					$status = "OFF";
				}
				echo $status;
				?> 
			</td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="tableGallery.php?update&id=<?php echo $data['galleryId']; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="mod/mod_gallery/deleteGallery.php?id=<?php echo $data['galleryId']; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>