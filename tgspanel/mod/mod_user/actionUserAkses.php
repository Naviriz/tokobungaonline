<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
	echo "salah";
}else{
	include_once "../../__class/db.php";
	$dbase = new db();
?>
<html>
<head>
	<title>BlessfulPro Panel</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/pages/dashboard.css" rel="stylesheet">
</head>
<body>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        
        <div class="span12">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
				  <h3>User Level</h3>
				  <i class="icon-arrow-left" style="float:right; margin:10px 10px 0 0"> <a href="tableUser.php" size="10">Back</a></i>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<?php				
				$userId = $_GET['userId'];
				$levelId = $_GET['levelId'];
				if(isset($_GET['select'])){
					$tabel = array(
						'user U',
						'level L',
						'userAkses UA'
					);
					$fild = array(
						'L.levelName',
						'U.userName'
					);
					$where = "U.userId=UA.userId AND UA.levelId=L.levelId AND U.userId = '$userId'";
					foreach($dbase->select($tabel, $fild, $where) as $data){}
				?>
					<form action="" method="POST">
						<table class="table">
							<tr>
								<td width="200px"><label>Username</label></td>
								<td><input type="text" name="username" class="login" disabled  value="<?php echo $data['userName']; ?>" /></td>
							</tr>
							<tr>
								<td width="200px"><label>Level Name</label></td>
								<td>
									<select name="level" class="login">
										<?php
											$level = "level";
											$fildLevel = "*";
											foreach($dbase->select($level, $fildLevel) as $dataLevel){
												if($levelId==$dataLevel['levelId']){
													echo "<option value='$dataLevel[levelId]' selected>".ucwords($dataLevel['levelName'])."</option>";
												}else{
													echo "<option value='$dataLevel[levelId]'>".ucwords($dataLevel['levelName'])."</option>";
												}
												
											}
										?>
									</select>	
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="save" value="Save" class="btn btn-info" />
									<input type="reset" value="Cancel" class="btn btn-danger" />
								</td>
							</tr>
						</table>
					</form>
					<?php
						if(isset($_POST['save'])){
							$tabel1 = "userakses UA";
							$level = $_POST['level'];
							$value = array(
								'levelId' => $level
							);
							$where = "UA.userId='$userId' AND UA.levelId='$levelId'";
							$dbase->update($tabel1, $value, $where);
					?>
							<script type="text/javascript">
								window.close();
								if (window.opener && !window.opener.closed) {
									  window.opener.location.reload();
								} 
							</script>
					<?php
						}
					?>
				<?php
				}
				?>
				
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
          
        </div>
        <!-- /span6 --> 
		
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main
<!-- /footer --> 

</body>
</html>
<?php
}
?>