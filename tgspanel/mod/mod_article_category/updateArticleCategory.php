<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "category";
$fild = "*";
$where = "id_category = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_article_category/actionArticleCategory.php?update" method="POST">
	<table class="table">
		<tr>
			<td width="200px"><label>Category Name</label></td>
			<td><input type="text" name="category" class="login" size="" value="<?php echo $data['category']; ?>" /></td>
		</tr>
        <tr>
        	<td><label>Headline</label></td>
            <td>
            	<select name="headline">
                	<?php if($data['headline']=="Y"){ ?>
                	<option value="Y" selected>Yes</option>
                    <option value="N">No</option>
                    <?php }else{ ?>
                    <option value="Y">Yes</option>
                    <option value="N" selected>No</option>
                    <?php } ?>
                </select>
            </td>            
        </tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>