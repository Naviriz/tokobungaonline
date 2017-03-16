<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Price Title </th>
		<th> Price Content </th>
		<th> Price Budget </th>
		<th> Price Category </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = array(
			'price P',
			'priceCategory PA'
		);
		$fild = array(
			'P.priceId',
			'P.priceTitle', 
			'P.priceInclude',
			'P.priceBudget',
			'PA.priceCategoryName'
		);
		$where = "P.priceCategoryId=PA.priceCategoryId AND PA.idSubDomain='$page'";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['priceTitle']; ?> </td>
			<td> <?php echo substr($data['priceInclude'],0,40)."..."; ?> </td>
			<td> <?php echo $data['priceBudget']."k"; ?> </td>
			<td> <?php echo $data['priceCategoryName']; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=price&act=update&page=$page&id=$data[priceId]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=price&act=delete&page=$page&id=$data[priceId]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>