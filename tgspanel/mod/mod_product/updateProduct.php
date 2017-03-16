<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "product";
$fild = "*";
$where = "id_product = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_product/actionProduct.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td width="250px"><label>Product Name</label></td>
			<td><input type="text" name="productName" class="login" size="" value="<?php echo $data['product_name']; ?>" required /></td>
		</tr>
		<tr>
			<td><label>Product Description</label></td>
			<td><textarea rows="15" cols="5" name="productDescription" id="mytextarea" class="login" size=""><?php echo $data['description']; ?></textarea></td>
		</tr>
        <tr>
			<td><label>Product Size</label></td>
			<td><input type="text" name="productSize" class="login" size="" value="<?php echo $data['product_size']; ?>" /></td>
		</tr>
		<tr>
			<td><label>Product Price</label></td>
			<td><input type="text" name="productPrice" id="price" class="login" size="" value="<?php echo $data['price']; ?>" required /></td>
		</tr>
		<tr>
			<td><label>Current Image</label></td>
			<td>
				<img src="../assets/images/product/<?php echo $data['product_image']; ?>" width="150px" />
			</td>
		</tr>
		<tr>
			<td><label>Product Image</label></td>
			<td>
				<input type="file" name="file" />
			</td>
		</tr>
        <tr>
        	<td><label>Product Category</label></td>
            <td>
            	<select name="category" class="login">
                	<?php
						$category = "product_category";
						$fildct = array(
							'category_name',
							'id_category'
						);
						$wherect = "id_collection='$_GET[collection]'";
						foreach($dbase->select($category, $fildct, $wherect) as $pc){
							if($data['id_category']==$pc['id_category']){
								echo "<option value='$pc[id_category]' selected>".ucwords($pc['category_name'])."</option>";
							}else{
								echo "<option value='$pc[id_category]'>".ucwords($pc['category_name'])."</option>";
							}
						}
					?>
                </select>
            </td>
        </tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="currentImage" value="<?php echo $data['product_image']; ?>" />
				<input type="hidden" name="id" value="<?php echo $data['id_product']; ?>" />
                <input type="hidden" name="collection" value="<?php echo $_GET['collection']; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript"> 
	$('#price').priceFormat({ prefix: 'Rp ', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0 }); 
</script>