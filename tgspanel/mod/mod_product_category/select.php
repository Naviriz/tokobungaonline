<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	  <tr>
		<th> No </th>
		<th> Product Category Name </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		$fild = array(
			'category_name',
			'id_category'
		);
		$where = "id_collection='$collection'";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['category_name']); ?> </td>
			<td>
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=product_category&act=update&id=$data[id_category]&collection=$collection"; ?>" size="10" class="btn btn-small btn-success" title="Update data"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "mod/mod_product_category/delete.php?id=$data[id_category]&collection=$collection"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small" title="Delete data"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>