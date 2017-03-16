<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	  <tr>
		<th> No </th>
		<th> Product Name </th>
		<th> Product Description </th>
		<th> Product Price </th>
        <th> Product Category </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
	  	$tabel = array(
			'product P',
			'product_category PC',
			'product_collection PCO'
		);
		$fild = array(
			'P.id_product',
			'P.product_name',
			'P.description',
			'P.price',
			'PC.category_name',
			'PCO.collection_name'
		);
		$where = "PC.id_category=P.id_category AND PC.id_collection=PCO.id_collection AND PCO.id_collection='$_GET[collection]'";
		$order = "P.product_name DESC";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where, $order) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['product_name']); ?> </td>
			<td> <?php echo $dbase->formatDescription($data['description'])."..."; ?> </td>
			<td> <?php echo "Rp ".$dbase->formatRupiah($data['price']); ?> </td>
            <td> <?php echo ucwords($data['category_name']); ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=product&act=update&id=$data[id_product]&collection=$_GET[collection]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>

				<!--tombol delete-->
				<a href="<?php echo "mod/mod_product/deleteProduct.php?id=$data[id_product]&collection=$_GET[collection]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>
