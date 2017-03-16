<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	  <tr>
		<th> No </th>
		<th> Transaksi Date </th>
		<th> Full Name </th>
		<th> Phone Number </th>
    <th> Address </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
	  $tabel = "transaksi";
		$fild = array(
			'id_transaksi',
			'transaksi_date',
			'full_name',
			'phone_number',
			'address',
			'status'
		);
		$no = 1;
		foreach($dbase->select($tabel, $fild) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['transaksi_date']); ?> </td>
			<td> <?php echo ucwords($data['full_name']); ?> </td>
			<td> <?php echo $data['phone_number']; ?> </td>
			<td> <?php echo $data['address']; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="mod/mod_all_transaksi/detiltrans.php?id=<?php echo $data['id_transaksi']; ?>" size="10" class="fancybox fancybox.iframe btn btn-small btn-info"><i class="btn-icon-only icon-external-link"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>
