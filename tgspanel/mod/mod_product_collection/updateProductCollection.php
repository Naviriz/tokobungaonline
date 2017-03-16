<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "product_collection";
$fild = "*";
$where = "id_collection = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_product_collection/actionProductCollection.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td width="250px"><label>Product Collection Name</label></td>
			<td><input type="text" name="collectionName" class="login" size="" value="<?php echo $data['collection_name'] ?>" required /></td>
		</tr>
        <tr>
        	<td width="250px"><label>Product Collection Info</label></td>
			<td>
            	<textarea rows="5" cols="30" name="collectionInfo" id="mytextarea">
					<?php echo $data['info'] ?>
                </textarea>
            </td>
        </tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $data['id_collection']; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript"> 
	$('#price').priceFormat({ prefix: 'Rp ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0 }); 
</script>