<?php
include_once "__class/db.php";
$dbase = new db();
$id = $_GET['id'];
$tabel = "gallery";
$fild = "*";
$where = "galleryId = '$id'";
foreach($dbase->select($tabel, $fild, $where) as $data){}
?>
<form action="mod/mod_gallery/actionGallery.php?update" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><label>Gallery Title</label></td>
			<td><input type="text" name="galleryTitle" class="login" size="" value="<?php echo $data['galleryTitle']; ?>" required /></td>
		</tr>
		<tr>
			<td><label>Gallery Description</label></td>
			<td><textarea rows="8" cols="30" name="galleryDescription" style="width:450px;" ><?php echo $data['galleryDescription']; ?></textarea></td>
		</tr>
		<tr>
			<td><label>Gallery Status</label></td>
			<td>
				<?php
				if($data['galleryStatus']=="Y"){
					echo "<input type='radio' name='galleryStatus' class='login' value='Y' checked />ON &nbsp;&nbsp";
					echo "<input type='radio' name='galleryStatus' class='login' value='N' />OFF";
				}else{
					echo "<input type='radio' name='galleryStatus' class='login' value='Y' />ON &nbsp;&nbsp";
					echo "<input type='radio' name='galleryStatus' class='login' value='N' checked />OFF";
				}
				?>
			</td>
		</tr>
		<tr>
			<td><label>Current Image</label></td>
			<td>
				<img src="../img/img_gallery/<?php echo $data['galleryImage']; ?>" width="150px" />
			</td>
		</tr>
		<tr>
			<td><label>Gallery Image</label></td>
			<td>
				<input type="file" name="file" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $data['galleryId']; ?>" />
				<input type="hidden" name="currentImage" value="<?php echo $data['galleryImage']; ?>" />
				<input type="submit" name="save" value="Save" class="btn btn-info" />
				<input type="reset" value="Cancel" class="btn btn-danger" />
			</td>
		</tr>
	</table>
</form>