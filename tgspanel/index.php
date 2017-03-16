<?php
error_reporting(0);
session_start();
if(isset($_SESSION['username'])){
	echo "<script>document.location.href='index.php';</script>"; 
}else{
	include_once "__class/db.php";
	$dbase = new db();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$FUSER = $_POST['FUSER'];
		$FPASS = $_POST['FPASS'];
		$login = $dbase->check_login($FUSER, $FPASS);
		if($login){
			header("Location:main.php");
		}else{
			echo "<script type='text/javascript'>alert('Login Gagal')</script>";
			echo "<script>document.location.href='index.php';</script>"; 
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Ten CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes"> 

<!-- CSS Style -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="account-container" style="margin-top:10%">
	<div class="content clearfix">
		<form action="#" method="post">
			<h1>Login Admin</h1>		
			<div class="login-fields">
				<div class="field">
					<label for="username">Username</label>
					<input style="padding-left:50px;" type="text" id="username" name="FUSER" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				<div class="field">
					<label for="password">Password:</label>
					<input style="padding-left:50px;" type="password" id="password" name="FPASS" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
			</div> <!-- /login-fields -->
			<div class="login-actions">
				<button class="btn btn-success btn-large">Login</button>
			</div> <!-- .actions -->
		</form>
	</div> <!-- /content -->
</div> <!-- /account-container -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/signin.js"></script>
</body>
</html>
<?php
}
?>
