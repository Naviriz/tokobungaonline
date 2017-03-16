<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	  <tr>
		<th> No </th>
		<th> Product Collection Name </th>
        <th> Product Collection Info </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		$fild = "*";
		$no = 1;
		foreach($dbase->select($tabel, $fild) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['collection_name']); ?> </td>
            <td> <?php echo ucwords($data['info']); ?> </td>
			<td width="10%">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=product_collection&act=update&id=$data[id_collection]"; ?>" size="10" class="btn btn-small btn-success" title="Update data"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "mod/mod_product_collection/deleteProductCollection.php?id=$data[id_collection]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small" title="Delete data"><i class="btn-icon-only icon-remove"> </i></a>
                
                <!-- tombol to category -->
                <a href="<?php echo "$_SERVER[PHP_SELF]?mod=product_category&collection=$data[id_collection]"; ?>" size="10" class="btn btn-small btn-info" title="Category Collection"><i class="btn-icon-only icon-th-list"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>