<?php
include_once "../../__class/db.php";
$dbase = new db();
$page = $_GET['page'];
?>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<h2>Price Category</h2>
<table class="table table-striped table-bordered">
	<thead>
	  <tr>
		<th> No </th>
		<th> Price Category Name </th>
		<th> Price Category Date </th>
	  </tr>
	</thead>
	<tbody>
	  <?php
		//user data
		$tabel = "pricecategory";
		$fild = "*";
		$where = "idSubDomain='$page'";
		$no = 1;
		foreach($dbase->select($tabel, $fild, $where) as $data){
	  ?>
		<tr onClick="
			window.opener.document.getElementById('priceCategoryName').value='<?php echo $data['priceCategoryName']; ?>';
			window.opener.document.getElementById('priceCategoryId').value='<?php echo $data['priceCategoryId']; ?>';
			window.close();">
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['priceCategoryName']); ?> </td>
			<td> <?php echo $data['priceCategoryDate']; ?> </td>
		</tr>
	  <?php
		}
	  ?>
	</tbody>
</table>