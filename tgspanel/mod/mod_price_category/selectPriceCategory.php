<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Price Category Name </th>
		<th> Price Category Date </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "pricecategory";
		$fild = "*";
		$no = 1;
		$where = "idSubDomain='$page'";
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['priceCategoryName']); ?> </td>
			<td> <?php echo $data['priceCategoryDate']; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=priceCategory&act=update&page=$page&id=$data[priceCategoryId]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=priceCategory&act=delete&page=$page&id=$data[priceCategoryId]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>