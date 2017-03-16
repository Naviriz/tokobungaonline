<?php
$id = $_GET['id'];
$tabel = array(
	'article'
);
$fild = "*";
$where = "id_article = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_post/action.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Article Title</label></td>
			<td><input type="text" name="articleTitle" class="login" size="" value="<?php echo $data['title']; ?>" required /></td>
		</tr>
		<tr>
			<td><label>Article Content</label></td>
			<td><textarea rows="8" cols="30" name="articleContent" id="mytextarea"><?php echo $data['content']; ?></textarea></td>
		</tr>
		<tr>
			<td><label>Article Status</label></td>
			<td>
				<?php
				if($data['status']=="P"){
					echo "<input type='radio' name='articleStatus' class='login' value='P' checked />Pubished &nbsp;&nbsp";
					echo "<input type='radio' name='articleStatus' class='login' value='U' />Unpublished";
				}else{
					echo "<input type='radio' name='articleStatus' class='login' value='P' />Published &nbsp;&nbsp";
					echo "<input type='radio' name='articleStatus' class='login' value='U' checked />Unpublished";
				}
				?>
			</td>
		</tr>
        <?php if($data['thumb_image']!=""){ ?>
		<tr>
			<td><label>Current Image</label></td>
			<td>
				<img src="../assets/images/post/<?php echo $data['thumb_image']; ?>" width="150px" />
			</td>
		</tr>
        <?php } ?>
		<tr>
			<td><label>Article Image</label></td>
			<td>
				<input type="file" name="fupload" />
			</td>
		</tr>
		<!--<tr>
			<td><label>Article Category</label></td>
			<td>
				<select name="categoryId">
                	<?php
						$tabel = "category";
						$fild = "*";
						foreach($dbase->select($tabel, $fild) as $category){
							if($data['id_category']==$category['id_category']){
					?>
                    			<option value="<?php echo $category['id_category']; ?>" selected><?php echo $category['category']; ?></option>
                    <?php
							}else{
					?>
                    		<option value="<?php echo $category['id_category']; ?>"><?php echo $category['category']; ?></option>
                    <?php
							}
						}
					?>
                </select>
			</td>
		</tr>-->
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="current" value="<?php echo $data['thumb_image']; ?>" />
                <input type="hidden" name="fullname" value="<?php echo $_SESSION['full_name']; ?>" />
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>