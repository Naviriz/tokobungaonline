	<thead>
	  <tr>
		<th> No </th>
		<th> Article Title </th>
		<th> Article Content </th>
		<th> Article Date </th>
		<th> Article Status </th>
		<th> Writer </th>
		<th> Category </th>
		<th class="td-actions"> </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = array(
			'article A',
			'articlecategory CA',
			'user U'
		);
		$fild = array(
			'A.articleTitle', 
			'A.articleContent',
			'A.articleDate',
			'A.articleStatus',
			'U.username',
			'CA.categoryName'
		);
		$where = "CA.categoryId=A.categoryId AND U.userId=A.userId";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['articleTitle']; ?> </td>
			<td> <?php echo substr($data['articleContent'],0,40)."..."; ?> </td>
			<td> <?php echo $data['articleDate']; ?> </td>
			<td> 
				<?php 
					if($data['articleStatus']=="D"){
						$status = "Disabled";
					}else{
						$status = "Enabled";
					}
					
					echo $status;
				?> 
			</td>
			<td> <?php echo $data['username']; ?> </td>
			<td> <?php echo $data['categoryName']; ?> </td>
			<td class="td-actions">
				<!--tombol edit-->
				<a href="#" onClick="window.open('action/actionUser.php?action=update&id=<?php echo $data['userId']; ?>','scrollwindow','top=100,left=350,width=550,height=450');" size="10" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
				
				<!--tombol delete-->
				<a href="action/actionUser.php?action=delete&id=<?php echo $data['userId']; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a>
			</td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>