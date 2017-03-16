<?php
session_start();
error_reporting(0);
include_once "__class/db.php";
include_once "__class/event-date.php";
$dbase = new db();
$action = $_GET['action'];
if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
	echo "<script>document.location.href='index.php';</script>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Ten CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/pages/dashboard.css" rel="stylesheet" />
<link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.4" media="screen" />

<script src="js/jquery-1.7.2.min.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>

<!-- Jquery TinyMCE -->
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "#mytextarea"
	});
</script>
</head>

<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
	  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		  <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">
	  </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-user"></i> <?php echo $_SESSION['username']; ?><b class="caret"></b>
			</a>
            <ul class="dropdown-menu">
              <li><a href="?mod=profil">Profil</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="?mod=dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="?mod=user"><i class="icon-user"></i><span>User</span> </a> </li>
        <li><a href="?mod=article"><i class="icon-list-alt"></i><span>Article</span> </a> </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            	<i class="icon-briefcase"></i>
                <span>Product</span>
                <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
                <?php
					$collection = "product_collection";
					$fild = "id_collection, collection_name";
					foreach($dbase->select($collection, $fild) as $collect){
						echo "<li><a href='?mod=product&collection=$collect[id_collection]'>$collect[collection_name]</a></li>";
					}
				?>
            </ul>
        </li>
        <li><a href="?mod=product_collection"><i class="icon-briefcase"></i><span>Product Colletion</span> </a> </li>
        <li><a href="?mod=post"><i class="icon-list-alt"></i><span>Post Information</span> </a> </li>
				<li><a href="?mod=newtransaksi"><i class="icon-table"></i><span>New Transaksi</span> </a> </li>
				<li><a href="?mod=alltransaksi"><i class="icon-table"></i><span>All Transaksi</span> </a> </li>
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
            <?php
						if(empty($_GET['mod'])){ include'mod/mod_dashboard/default.php'; }
						elseif($_GET['mod']=='article'){ include'mod/mod_article/default.php'; }
						elseif($_GET['mod']=='articleCategory'){ include'mod/mod_article_category/default.php'; }
						elseif($_GET['mod']=='product'){ include'mod/mod_product/default.php'; }
						elseif($_GET['mod']=='product_category'){ include'mod/mod_product_category/default.php'; }
						elseif($_GET['mod']=='product_collection'){ include'mod/mod_product_collection/default.php'; }
						elseif($_GET['mod']=='post'){ include'mod/mod_post/default.php'; }
						elseif($_GET['mod']=='profil'){ include'mod/mod_profil/default.php'; }
						elseif($_GET['mod']=='newtransaksi'){ include'mod/mod_new_transaksi/default.php'; }
						elseif($_GET['mod']=='alltransaksi'){ include'mod/mod_all_transaksi/default.php'; }
						else { include'mod/mod_dashboard/default.php'; }
						?>
        </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /main-inner -->
</div>
<!-- /main -->
<div class="footer navbar-fixed-bottom" style="margin-top:20px;">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015. </div>
        <!-- /span12 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</div>

<script src="js/bootstrap.js"></script>
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="js/jquery.price_format.1.3.js" type="text/javascript"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function(){
    $('#dataTables-example').dataTable();
});
</script>

<script type="text/javascript">
    $('#price').priceFormat({ prefix: 'Rp ', centsSeparator: '', thousandsSeparator: '.', centsLimit: 0 });
</script>
<!-- /footer -->

</body>
</html>
<?php
}
?>
