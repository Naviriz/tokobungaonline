<?php
session_start();
//error_reporting(0);
include_once "../../__class/db.php";
$dbase = new db();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detil Transaksi</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="padding:10px;">
<table>
	<?php
		$trans = "transaksi";
		$fild_trans = "*";
		$where1 = "id_transaksi='$id'";
		foreach($dbase->select($trans, $fild_trans, $where1) as $trans){}
	?>
	<tr>
		<td width="150px">Full Name</td>
		<td>:</td>
		<td><?php echo $trans['full_name']; ?></td>
	</tr>
	<tr>
		<td>Phone Number</td>
		<td>:</td>
		<td><?php echo $trans['phone_number']; ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $trans['address']; ?></td>
	</tr>
</table>
<table class="table table-striped table-bordered table-hover">
	<thead>
	  <tr>
		<th> No </th>
		<th> Product Name </th>
		<th> Qty </th>
		<th> Price </th>
    <th> Sub Total</th>
	  </tr>
	</thead>
	<tbody>
	  <?php
	  $tabel = array(
			'detil_transaksi DT',
			'product P'
		);
		$fild = array(
			'DT.qty',
			'DT.price',
			'P.product_name'
		);
		$where = "DT.id_product=P.id_product AND DT.id_transaksi='$id'";
		$no = 1;
		$total=0;
		foreach($dbase->select($tabel, $fild, $where) as $data){
			$subtotal = $data['qty']*$data['price'];
			$total = $total+$subtotal;
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo ucwords($data['product_name']); ?> </td>
			<td> <?php echo ucwords($data['qty']); ?> </td>
			<td> <?php echo $data['price']; ?> </td>
			<td> <?php echo $subtotal; ?> </td>
		</tr>
	  <?php
		}
	  ?>
		<tr>
			<td colspan="4">Total</td>
			<td><?php echo $total; ?></td>
		</tr>
	</tbody>
</table>
</body>
</html>
