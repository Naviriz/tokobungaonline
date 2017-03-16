<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	  <tr>
		<th> No </th>
		<th> Category Name </th>
        <th> Headline </th>
		<th> Category Sort </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "category";
		$fild = "*";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['category']); ?> </td>
            <td> 
				<?php 
					if($data['headline']=="Y"){
						echo "Yes";
					}else{
						echo "No";
					} 
				?> 
            </td>
			<td> <?php echo $data['sort']; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="<?php echo "$_SERVER[PHP_SELF]?mod=articleCategory&act=update&id=$data[id_category]"; ?>" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="<?php echo "mod/mod_article_category/deleteArticleCategory.php?id=$data[id_category]"; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>