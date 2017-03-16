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
		$where = "status='Y'";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['transaksi_date']); ?> </td>
			<td> <?php echo ucwords($data['full_name']); ?> </td>
			<td> <?php echo $data['phone_number']; ?> </td>
			<td> <?php echo $data['address']; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="mod/mod_new_transaksi/detiltrans.php?id=<?php echo $data['id_transaksi']; ?>" size="10" class="fancybox fancybox.iframe btn btn-small btn-info"><i class="btn-icon-only icon-external-link"> </i></a>

				<!--tombol delete-->
				<a href="<?php echo "mod/mod_new_transaksi/ok.php?id=$data[id_transaksi]"; ?>" onclick="return confirm('Apakah anda sudah konfirmasi?')" class="btn btn-success btn-small"><i class="btn-icon-only icon-ok"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>
