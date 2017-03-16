<form action="mod/mod_price/actionPrice.php?add" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Price Title</label></td>
			<td><input type="text" name="priceTitle" class="login" size="" placeholder="Enter Price Title..." required /></td>
		</tr>
		<tr>
			<td><label>Price Include</label></td>
			<td>
				<textarea rows="8" cols="30" name="priceInclude" style="width:450px;" placeholder="Enter Price Include..." required ></textarea>
			</td>
		</tr>
		<tr>
			<td><label>Price Category</label></td>
			<td>
				<input type="text" name="priceCategoryName" id="priceCategoryName" value="" onClick="window.open('mod/mod_price_category/viewPriceCategory.php?page=<?php echo $page; ?>','scrollwindow','top=200,left=350,width=550,height=370');" placeholder="Enter Price Category..." required  />
				<input type="hidden" name="priceCategoryId" id="priceCategoryId" value=""  placeholder="Enter Article Category..."  />
			</td>
		</tr>
		<tr>
			<td><label>Price Budget</label></td>
			<td><input type="text" name="priceBudget" class="login" size="" placeholder="Enter Price Budget..." required /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<!--<input type="hidden" name="userId" class="login" size="" value="<?php echo $dbase->check_userId($_SESSION['username']); ?>"  />-->
				<input type="hidden" name="page" value="<?php echo $page; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>