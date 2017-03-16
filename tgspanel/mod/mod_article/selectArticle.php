<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	  <tr>
		<th> No </th>
		<th> Title </th>
		<th> Author </th>
        <th> Category </th>
		<th> Status </th>
		<th> Last Update </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		
		$fild = array(
			'A.id_article',
			'A.writer', 
			'A.title',
			'A.status',
			'A.date',
			'C.category'
		);
		$where = "C.id_category=A.id_category";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['title']; ?> </td>
			<td> <?php echo $data['writer']; ?> </td>
            <td> <?php echo $data['category']; ?> </td>
			<td> 
				<?php 
				if($data['status']=="P"){
					$status = "Published";
				}else{
					$status = "Unpublished";
				}
				echo $status;
				?> 
			</td>
			<td> <?php echo tgl_indo($data['date']); ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=article&act=update&id=$data[id_article]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "mod/mod_article/deleteArticle.php?id=$data[id_article]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>