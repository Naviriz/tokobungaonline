<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = array(
	'price P',
	'priceCategory PA'
);
$fild = "*";
$where = "PA.priceCategoryId=P.priceCategoryId AND P.priceId = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_price/actionPrice.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Price Title</label></td>
			<td><input type="text" name="priceTitle" class="login" size="" value="<?php echo $data['priceTitle']; ?>" required /></td>
		</tr>
		<tr>
			<td><label>Price Include</label></td>
			<td>
				<textarea rows="8" cols="30" name="priceInclude" style="width:450px;" required ><?php echo $data['priceInclude']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td><label>Price Category</label></td>
			<td>
				<input type="text" name="priceCategoryName" id="priceCategoryName" value="<?php echo $data['priceCategoryName']; ?>" onClick="window.open('mod/mod_price_category/viewPriceCategory.php?page=<?php echo $page; ?>','scrollwindow','top=200,left=350,width=550,height=370');"  required  />
				<input type="hidden" name="priceCategoryId" id="priceCategoryId" value=""  placeholder="Enter Article Category..."  />
			</td>
		</tr>
		<tr>
			<td><label>Price Budget</label></td>
			<td><input type="text" name="priceBudget" class="login" size="" value="<?php echo $data['priceBudget']; ?>" required /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="catId" value="<?php echo $data['priceCategoryId']; ?>" />
				<input type="hidden" name="id" value="<?php echo $data['priceId']; ?>" />
				<input type="hidden" name="page" value="<?php echo $page; ?>" />
				<!--<input type="hidden" name="userId" class="login" size="" value="<?php echo $dbase->check_userId($_SESSION['username']); ?>"  />-->
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>