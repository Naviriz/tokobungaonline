<?php
session_start();
ob_start();
error_reporting(0);
include"system/system.php";
include"system/currency.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php $meta_title = get_title(); echo"$meta_title"; ?>
    </title>
    <meta name="keywords" content="<?php $meta_keyword = get_keyword(); echo" $meta_keyword "; ?>" />
    <meta name="description" content="<?php $meta_description = get_description(); echo" $meta_description "; ?>" />

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- CSS Global -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css">
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/plugins/owlcarousel2/assets/owl.carousel.css" rel="stylesheet">
    <link href="assets/plugins/owlcarousel2/assets/owl.theme.css" rel="stylesheet">
    <link href="assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">

    <link href="assets/css/theme.css" rel="stylesheet">

</head>

<body id="home" class="wide">

    <!-- Wrap all content -->
    <div class="wrapper">

        <!-- HEADER -->
        <header class="header fixed">
            <div class="topline">
                <div class="container">
                    <div class="pull-left">Selamat Datang, Customer Kami!</div>

                </div>
            </div>
            <div class="container">
                <div class="header-wrapper clearfix">
                    <div class="row header-info-wrapper">
                        <div class="col-xs-3">
                            <div class="header-info">
                                <i class="fa fa-clock-o"></i>
                                <h3>Jam Operasional Kerja</h3>
                                <div>09.00 WIB - 21.00 WIB</div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="header-info">
                                <i class="fa fa-car"></i>
                                <h3>Pengiriman Gratis</h3>
                                <div>Segala Macam Pesanan</div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="header-info">
                                <i class="fa fa-thumbs-up"></i>
                                <h3>Kepuasan Pelanggan</h3>
                                <div>Adalah Pedoman Kami</div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="header-info">
                                <i class="fa fa-phone"></i>
                                <h3>Telp: (031) 5481745</h3>
                                <div>Pemesanan Online!</div>
                            </div>
                        </div>
                    </div>
                    <div class="row header-logo-cart-wrapper">
                        <div class="col-xs-6">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="home" class="scroll-to"><img src="assets/images/logo.png" class="img-responsive" style="margin-left:-70px;"></a>
                            </div>
                            <!-- /Logo -->
                        </div>
                        <div class="col-xs-2">
                            <!--<div class="header-searchform">
                        <i class="fa fa-search"></i><input class="form-control topline-search" type="search" placeholder="Pencarian...">
                    </div>-->
                        </div>
                        <div class="col-xs-4">
                            <ul class="sf-menu header-menu">
                                <li>
                                    <?php
                              $items_in_cart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                            ?>
                                        <i class="fa fa-shopping-cart"></i> <a href="cart">Cart (<?php echo $items_in_cart; ?>)</a>
                                        <?php
                              if(isset($_SESSION['cart'])){
                                $sql_s = "SELECT * FROM product WHERE id_product IN (";
                                foreach($_SESSION['cart'] as $id => $value){
                                  $sql_s .=$id. ",";
                                }
                                $sql_s = substr($sql_s,0,-1).") ORDER BY id_product ASC";
                                $query_s = mysql_query($sql_s);
                                $total=0;
                                if(!empty($query_s)){
                                    $row_s = mysql_fetch_array($query_s);
                                    $subtotal = $_SESSION['cart'][$row_s['id_product']]['quantity']*$row_s['price'];
                                    $total += $subtotal;
                            ?>
                                            <ul class="sub-menu view-cart">
                                                <li>
                                                    <div class="view-cart-product">
                                                        <img src="assets/images/product/<?php echo $row_s['product_image']; ?>" class="img-responsive" />
                                                        <div class="view-cart-product-details">
                                                            <a href="shop-single.html">
                                                                <?php echo $row_s['product_name']; ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="view-cart-summary">
                                                        <div>Quantity:<span><?php echo $_SESSION['cart'][$row_s['id_product']]['quantity']; ?></span></div>
                                                        <div>Price:<span><?php echo "Rp ".format_rupiah($row_s['price']); ?></span></div>
                                                        <div>Total:<span><?php echo "Rp ".format_rupiah($subtotal); ?></span></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="view-cart-links">
                                                        <a href="cart">View cart</a> | <a href="checkout.html">Checkout</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                            <?php
                                }
                              }
                            ?>

                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div id="mobile-menu"></div>
                    <nav class="navigation closed clearfix">
                        <a href="#" class="menu-toggle btn"><i class="fa fa-bars"></i></a>
                        <ul class="sf-menu nav">
                            <li>
                                <a href="home"><i class="fa fa-home"></i></a>
                            </li>
                            <li>
                                <a href="">Produk Kami</a>
                                <ul class="sub-menu">
                                    <?php
          								$collection = mysql_query("SELECT collection_name, id_collection, collection_name_seo FROM product_collection ");
          								while($dcol = mysql_fetch_array($collection)){
          							?>
                                        <li>
                                            <a href="<?php echo " show_collection-$dcol[id_collection]-$dcol[collection_name_seo]
                                                "; ?>">
                                                <?php echo $dcol['collection_name']; ?>
                                            </a>
                                        </li>
                                        <?php
          								}
          							?>
                                </ul>
                            </li>
                            <li>
                                <a href="info">Informasi Kami</a>
                            </li>
                            <li>
                                <a href="about">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="contact">Kontak Kami</a>
                            </li>
                            <li>
                                <a href="instruction">Petunjuk Pemesanan</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Navigation -->

                </div>
            </div>
        </header>
        <!-- /HEADER -->

        <!-- Content area -->
        <div class="content-area">

            <!-- PAGE CONTACT -->
            <section class="page-section with-sidebar sidebar-right">
                <div class="container">

                    <div class="row">

                        <section id="content" class="content col-sm-8 col-md-9">

                            <div id="main">
                                <?php if($_GET['page']=="home"){ ?>
                                <!-- SLIDER -->

                                <div class="background-img-slider">

                                    <div id="main-slider" class="owl-carousel owl-theme">

                                        <!-- Slide -->
                                        <?php
          						$slide = mysql_query("
          							SELECT collection_name, collection_name_seo, info, id_collection
          							FROM product_collection
          							ORDER BY collection_name ASC
          							LIMIT 0,3
          						");
          						$no = 0;
          						while($dslide=mysql_fetch_array($slide)){
          					?>
                                            <div class="item page slide<?php echo $no; ?>">
                                                <div class="caption">
                                                    <div class="slide-block-1" data-animation="fadeInUp" data-animation-delay="300">
                                                        <div class="slide-header">
                                                            <?php echo $dslide['collection_name']; ?>
                                                        </div>
                                                        <div class="slide-slogan">
                                                            <?php echo $dslide['info']; ?>
                                                        </div>
                                                        <a href="<?php echo " show_collection-$dslide[id_collection]-$dslide[collection_name_seo] "; ?>" class="btn btn-theme">Pesan Sekarang</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </div>
                                </div>

                                <!-- /SLIDER -->

                                <hr class="transparent" />

                                <!--<div class="announcement">
                <div class="announcement-text">
                    <h2><i class="fa fa-car"></i> Free Shipping WorldWide Over $999</h2>
                </div>
            </div>-->

                                <hr class="transparent" />

                                <h2 class="section-title">
                                    <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Best Sellers</span>
                                </h2>
                                <div id="product-carousel1" class="owl-carousel product-carousel" data-animation="fadeInUp" data-animation-delay="100">
                                    <?php
        					$best = mysql_query("
        						SELECT product_name, price, product_image, product_name_seo, id_product
        						FROM product
        						WHERE price > 300
        						LIMIT 0,10
        					");
        					while($dbest=mysql_fetch_array($best)){
        				?>
                                        <div class="product-wrapper">
                                            <div class="product-image">
                                                <a href="<?php echo " read_product-$dbest[id_product]-$dbest[product_name_seo] "; ?>">
                            <img src="assets/images/product/<?php echo $dbest['product_image']; ?>" class="img-responsive" />
                        </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="<?php echo " read_product-$dbest[id_product]-$dbest[product_name_seo] "; ?>">
                                                    <?php echo $dbest['product_name']; ?>
                                                </a>
                                                <div class="price">IDR
                                                    <?php echo $dbest['price']; ?>
                                                </div>
                                                <!--<a class="btn btn-theme" href="#">Add to Cart</a>-->
                                            </div>
                                        </div>
                                        <?php } ?>
                                </div>
                                <?php } else if($_GET['page']=="show_product"){ ?>
                                <section id="content">

                                    <section class="breadcrumbs">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="home">Home</a>
                                            </li>
                                            <?php
              							$category = mysql_fetch_array(mysql_query("
              									SELECT C.category_name, CO.collection_name, CO.id_collection, CO.collection_name_seo
              									FROM product_category C, product_collection CO
              									WHERE C.id_collection=CO.id_collection AND C.id_category='$_GET[id]'"));
              							?>
                                                <li>
                                                    <a href="<?php echo " show_collection-$category[id_collection]-$category[collection_name_seo]
                                                        "; ?>">
                                                        <?php echo ucwords($category['collection_name']); ?>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <?php echo ucwords($category['category_name']); ?>
                                                </li>
                                        </ul>
                                    </section>

                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight"><?php echo ucwords($category['category_name']); ?></span>
                                    </h2>

                                    <div class="row">
                                        <?php
          							$query = mysql_query("SELECT * FROM product WHERE id_category='$_GET[id]'");
          							while($data=mysql_fetch_array($query)){
          						?>
                                            <div class="col-sm-6 col-md-3 col-xsp-6">
                                                <div class="product-wrapper">
                                                    <div class="product-image">
                                                        <a href="<?php echo " read_product-$data[id_product]-$data[product_name_seo] "; ?>">
                                        <img src="assets/images/product/<?php echo $data['product_image']; ?>" class="img-responsive">
                                    </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="">
                                                            <?php echo $data['product_name']; ?>
                                                        </a>
                                                        <div class="price">
                                                            <!--<span>$545</span>-->
                                                            <?php echo "Rp ".format_rupiah($data['price']); ?>
                                                        </div>
                                                        <div class="product-links">
                                                            <h3>
                                                                <a href="<?php echo " read_product-$data[id_product]-$data[product_name_seo]
                                                                    "; ?>">
                                                                    <?php echo $data['product_name']; ?>
                                                                </a>
                                                            </h3>
                                                            <!--<a href="#">Add to Cart</a> | --><a href="<?php echo " read_product-$data[id_product]-$data[product_name_seo]
                                                                "; ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
            							}
            						?>

                                                <div class="clearfix"></div>

                                    </div>
                                </section>
                                <?php }else if($_GET['page']=="about"){ ?>
                                <section id="content">
                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Tentang Kami</span>
                                    </h2>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
          								$query = mysql_query("SELECT thumb_image, title, content FROM article WHERE id_article='5'");
          								while($data=mysql_fetch_array($query)){
          							?>
                                                <img src="assets/images/post/<?php echo $data['thumb_image']; ?>" width="200px" class="img-responsive img-type-1 pull-left img-width-200"
                                                />
                                                <?php
								            echo $data['content'];
          								}
          							?>

                                        </div>

                                    </div>
                                </section>
                                <?php }else if($_GET['page']=="read_product"){ ?>
                                <section id="content">

                                    <section class="breadcrumbs">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="home">Home</a>
                                            </li>
                                            <?php
                            $query = mysql_query("
                                SELECT  P.product_name, P.price, P.description, PC.category_name, P.product_size,
										                    P.product_image, C.collection_name, C.collection_name_seo, C.id_collection,
										                    PC.id_category, PC.category_name, PC.category_name_seo
                                FROM product P, product_category PC, product_collection C
                                WHERE P.id_category=PC.id_category AND PC.id_collection=C.id_collection AND P.id_product='$_GET[id]'
                            ");
                            $data = mysql_fetch_array($query);
                        ?>
                                                <li>
                                                    <a href="<?php echo " show_collection-$data[id_collection]-$data[collection_name_seo]
                                                        "; ?>">
                                                        <?php echo ucwords($data['collection_name']); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo " show_product-$data[id_category]-$data[category_name_seo]
                                                        "; ?>">
                                                        <?php echo ucwords($data['category_name']); ?>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <?php echo ucwords($data['product_name']); ?>
                                                </li>
                                        </ul>
                                    </section>

                                    <div class="row shop-single">
                                        <div class="col-sm-6">
                                            <div class="product-image">
                                                <a href="" data-gal="prettyPhoto"><img src="assets/images/product/<?php echo $data['product_image']; ?>" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h1 class="product-title">
                                                <?php echo $data['product_name']; ?>
                                            </h1>
                                            <div class="product-description">
                                                <!--<div><span>Brand:</span>Consectretuer adipiscing</div>-->
                                                <?php if($data['product_size']!=""){ ?>
                                                <div><span>Product Size:</span>
                                                    <?php echo $data['product_size']; ?>
                                                </div>
                                                <?php } ?>
                                                <div><span>Availability:</span>in stock</div>
                                            </div>
                                            <div class="product-price">
                                                Price:
                                                <span class="price-new">IDR <?php echo format_rupiah($data['price']); ?></span>
                                                <!--<span class="price-tax">Biaya Kirim:IDR 15.000</span>-->
                                                <br>
                                            </div>
                                            <div class="product-cart">
                                                <div>
                                                    <!--Qty:-->
                                                    <form action="" method="POST">
                                                        <input style="margin:0px;" class="btn btn-theme" value="Add to Cart" name="cart" type="submit">
                                                    </form>
                                                    <?php
                                if(isset($_POST['cart'])){
                                  $id = $_GET['id'];
                                  if(isset($_SESSION['cart'][$id])){
                                    $_SESSION['cart'][$id]['quantity']++;
                                  }else{
                                    $sql = mysql_query("SELECT * FROM product WHERE id_product={$id}");
                                    if(mysql_num_rows($sql)!=0){
                                      $row = mysql_fetch_array($sql);
                                      $_SESSION['cart'][$row['id_product']]=array("quantity" => 1, "price" => $row['price']);
                                    }else{
                                      echo "Product id is invalid";
                                    }

                                  }
                                  header("Location:cart");
                                }
                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="transparent" />

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#pellentesque" role="tab" data-toggle="tab">Description</a></li>
                                        <li><a href="#habitant" role="tab" data-toggle="tab">Reviews (0)</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="pellentesque">
                                            <?php echo $data['description']; ?>
                                        </div>
                                        <div class="tab-pane" id="habitant">
                                            <!-- Contact form -->
                                            <form name="af-form" method="post" action="#contact" class="af-form" id="af-form">

                                                <div class="af-outer af-required">
                                                    <div class="form-group af-inner">
                                                        <input data-original-title="Name is required" name="name" id="name" value="Type Your Name..." size="30" data-toggle="tooltip"
                                                            title="" class="form-control placeholder" type="text">
                                                    </div>
                                                </div>

                                                <div class="af-outer af-required">
                                                    <div class="form-group af-inner">
                                                        <input data-original-title="Email is required" name="email" id="email" value="Type Your Email..." size="30" data-toggle="tooltip"
                                                            title="" class="form-control placeholder" type="text">
                                                    </div>
                                                </div>

                                                <div class="af-outer af-required">
                                                    <div class="form-group af-inner">
                                                        <textarea data-original-title="Message is required" name="message" id="input-message" rows="4" cols="50" data-toggle="tooltip"
                                                            title="" class="form-control placeholder">Type Your Message...</textarea>
                                                    </div>
                                                </div>

                                                <div class="af-outer af-required">
                                                    <div class="form-group af-inner">
                                                        <input name="submit" class="form-button form-button-submit btn btn-theme" id="submit_btn" value="Send message" type="submit">
                                                    </div>
                                                </div>

                                            </form>
                                            <!-- /Contact form -->
                                        </div>
                                    </div>


                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Other Product</span>
                                    </h2>
                                    <div id="product-carousel1" class="owl-carousel product-carousel" data-animation="fadeInUp" data-animation-delay="100">
                                        <?php
						            $id_category = get_idcategory($_GET['id']);
                        $best = mysql_query("
                            SELECT product_name, price, product_image, product_name_seo, id_product
                            FROM product
                            WHERE id_category ='$id_category'
                            LIMIT 0,10
                        ");
                        while($dbest=mysql_fetch_array($best)){
                    ?>
                                            <div class="product-wrapper">
                                                <div class="product-image">
                                                    <a href="<?php echo " read_product-$dbest[id_product]-$dbest[product_name_seo] "; ?>">
                                <img src="assets/images/product/<?php echo $dbest['product_image']; ?>" class="img-responsive" />
                            </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="<?php echo " read_product-$dbest[id_product]-$dbest[product_name_seo] "; ?>">
                                                        <?php echo $dbest['product_name']; ?>
                                                    </a>
                                                    <div class="price">IDR
                                                        <?php echo $dbest['price']; ?>
                                                    </div>
                                                    <!--<a class="btn btn-theme" href="#">Add to Cart</a>-->
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </div>
                                    <!--<div class="tags">
                    <strong>Tags:</strong> <a href="#">Lorem</a>, <a href="#">Libero</a>, <a href="#">Nulla</a>, <a href="#">Ipsum</a>
                </div>-->

                                    <hr class="transparent">

                                </section>
                                <?php } else if($_GET['page']=="show_collection"){ ?>
                                <section id="content">
                                    <section class="breadcrumbs">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="home">Home</a>
                                            </li>
                                            <?php
                        $collection = mysql_fetch_array(mysql_query("
                            SELECT collection_name
                            FROM product_collection
                            WHERE id_collection='$_GET[id]'"));
                        ?>
                                                <li class="active">
                                                    <?php echo ucwords($collection['collection_name']); ?>
                                                </li>
                                        </ul>
                                    </section>

                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight"><?php echo ucwords($collection['collection_name']); ?></span>
                                    </h2>

                                    <div class="row">
                                        <?php
                        $query = mysql_query("
          							SELECT P.product_name, P.product_image, P.price, P.id_product, P.product_name_seo
          							FROM product P, product_category PC, product_collection C
          							WHERE P.id_category=PC.id_category AND PC.id_collection=C.id_collection AND C.id_collection='$_GET[id]'
                        ORDER BY P.product_name ASC");
                        while($data=mysql_fetch_array($query)){
                    ?>
                                            <div class="col-sm-6 col-md-3 col-xsp-6">
                                                <div class="product-wrapper">
                                                    <div class="product-image">
                                                        <a href="<?php echo " read_product-$data[id_product]-$data[product_name_seo] "; ?>">
                                    <img src="assets/images/product/<?php echo $data['product_image']; ?>" class="img-responsive">
                                </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="">
                                                            <?php echo $data['product_name']; ?>
                                                        </a>
                                                        <div class="price">
                                                            <!--<span>$545</span>-->
                                                            <?php echo "IDR ".format_rupiah($data['price']); ?>
                                                        </div>
                                                        <div class="product-links">
                                                            <h3>
                                                                <a href="<?php echo " read_product-$data[id_product]-$data[product_name_seo]
                                                                    "; ?>">
                                                                    <?php echo $data['product_name']; ?>
                                                                </a>
                                                            </h3>
                                                            <!--<a href="#">Add to Cart</a> | -->
                                                            <a href="<?php echo " read_product-$data[id_product]-$data[product_name_seo] "; ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                        }
                    ?>

                                                <div class="clearfix"></div>

                                    </div>
                                </section>
                                <?php }else if($_GET['page']=="cart"){ ?>
                                <section id="content">
                                    <section class="breadcrumbs">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="home">Home</a>
                                            </li>
                                            <li class="active">Cart</li>
                                        </ul>
                                    </section>

                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Your Chart!</span>
                                    </h2>
                                    <p>To remove an item, set quantity to 0 (zero).</p>
                                    <div class="row">
                                        <form action="cart" method="POST">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                    <?php
                         $no=1;
                         if(isset($_SESSION['cart'])){
                           $sql_s = "SELECT * FROM product WHERE id_product IN (";
                           foreach($_SESSION['cart'] as $id => $value){
                             $sql_s .=$id. ",";
                           }
                           $sql_s = substr($sql_s,0,-1).") ORDER BY id_product ASC";
                           $query_s = mysql_query($sql_s);
                           $total=0;
                           $i=0;
                           if(!empty($query_s)){
                             while($row_s = mysql_fetch_array($query_s)){
                               $subtotal = $_SESSION['cart'][$row_s['id_product']]['quantity']*$row_s['price'];
                               $total += $subtotal;
                       ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $no; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row_s['product_name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo "Rp ".format_rupiah($row_s['price']); ?>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="quantity[<?php echo $row_s['id_product']; ?>]" size="6" value="<?php echo $_SESSION['cart'][$row_s['id_product']]['quantity']; ?>"
                                                                />
                                                            </td>
                                                            <td>
                                                                <?php echo "Rp ".format_rupiah($subtotal); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                               $i++;
                               $no++;
                             }
                       ?>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div>
                                                                        <span style="float:right;text-align: right;"><?php echo "<b style='margin-left:10px;'>Rp ".format_rupiah($total)."</b>"; ?></span>
                                                                        <span style="float:right;text-align: right;">Amount Payable: </span>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div style="padding-top:15px;">
                                                                        <a href="checkout" style="float:right; margin-left:10px; text-align: right;" class="btn btn-primary">Checkout</a>
                                                                        <a href="home" style="float:right; margin-left:10px; text-align: right;" class="btn btn-primary">Add more items</a>
                                                                        <input type="submit" style="float:right;text-align: right;" class="btn btn-primary" value="Update" name="update" title="Update qty in cart"
                                                                        />
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                            <?php
                           }
                         }
                       ?>
                                                                <tr>
                                                                    <td colspan="6"></td>
                                                                </tr>
                                                </table>
                                            </div>
                                        </form>
                                        <?php
                     //click update
                     if(isset($_POST['update'])){
                       if(!empty($_SESSION['cart'])){
                         foreach($_POST['quantity'] as $key => $val){
                           if($val==0){
                             unset($_SESSION['cart'][$key]);
                           }else{
                             $_SESSION['cart'][$key]['quantity']=$val;
                           }
                           header("location:cart");
                         }
                       }
                     }

                   ?>
                                    </div>
                                </section>

                                <?php }else if($_GET['page']=="checkout"){ ?>
                                <section id="content">
                                    <section class="breadcrumbs">
                                        <ul class="breadcrumb">
                                            <li>
                                                <a href="home">Home</a>
                                            </li>
                                            <li class="active">Checkout</li>
                                        </ul>
                                    </section>

                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Your account</span>
                                    </h2>
                                    <p>Please field this form bellow to checkout proces</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="sendemail.php" method="POST">
                                                <div class="form-group">
                                                    <label for="fullname">Full Name</label>
                                                    <input type="text" name="fullname" required class="form-control" id="fullname" placeholder="Full Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Phone Number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" required class="form-control" id="email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Adress</label>
                                                    <textarea class="form-control" rows="3" name="address" placeholder="Address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea class="form-control" rows="3" name="message" placeholder="Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <?php }else if($_GET['page']=="info"){ ?>
                                <section id="content">
                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Informasi Kami</span>
                                    </h2>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
          								$query = mysql_query("SELECT title, content FROM article_id LIMIT 0,5");
          								while($data=mysql_fetch_array($query)){
          							?>
                                                <div class="banner page-section">
                                                    <div class="banner-head">
                                                        <?php echo $data['title']; ?>
                                                    </div>
                                                    <p>
                                                        <?php echo $data['content']; ?>
                                                    </p>
                                                    <a href="#">Read More</a>
                                                </div>

                                                <hr class="transparent">
                                                <div class="filter-options"></div>
                                                <?php
          								}
          							?>
                                        </div>

                                    </div>
                                </section>
                                <?php }else if($_GET['page']=="instruction"){ ?>
                                <section id="content">
                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Petunjuk Pemesanan</span>
                                    </h2>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
            								$query = mysql_query("SELECT thumb_image, title, content FROM article WHERE id_article='1'");
            								$data=mysql_fetch_array($query);
            							?>
                                                <div class="instruction">
                                                    <?php echo $data['content']; ?>
                                                </div>
                                        </div>
                                    </div>
                                </section>
                                <?php }else if($_GET['page']=="contact"){ ?>
                                <section id="content">
                                    <h2 class="section-title">
                                        <span class="title-inner animated fadeInRight visible" data-animation-delay="100" data-animation="fadeInRight">Kontak Kami</span>
                                    </h2>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Pasar Bunga Kayoon Stand C-26 Surabaya</li>
                                                <li><b>Telp:</b> +62-31-5481745</li>
                                                <li><b>Fax:</b> +62-31-5326201</li>
                                                <li><b>E-mail:</b> aba_kayon@yahoo.com</li>
                                                <li><b>Phone:</b> 08121634844 /(031)77189091</li>
                                                <li><b>PIN BB:</b> 29F3B4EF</li>
                                                <li><b>Home:</b> Jl.Darmokali 86A Surabaya</li>
                                            </ul>

                                        </div>
                                    </div>
                                </section>
                                <?php } ?>

                            </div>

                        </section>

                        <hr class="page-divider transparent visible-xs" />

                        <!-- Sidebar -->
                        <aside id="sidebar" class="sidebar col-sm-4 col-md-3">
                            <div class="widget categories">
                                <h4 class="widget-title">Kategori</h4>
                                <div class="widget-inner">
                                    <ul class="widget-menu">
                                        <?php
        						$collection = mysql_query("SELECT collection_name, id_collection FROM product_collection");
        						while($dcole = mysql_fetch_array($collection)){
        					?>
                                            <li>
                                                <div class="sign"></div>
                                                <a href="#">
                                                    <?php echo ucwords($dcole['collection_name']); ?>
                                                </a>
                                                <ul class="sub-menu">
                                                    <?php
            								$category = mysql_query("
            									SELECT category_name, id_category, category_name_seo
            									FROM product_category
            									WHERE id_collection='$dcole[id_collection]'");
            								while($dcat=mysql_fetch_array($category)){
            							?>
                                                        <li>
                                                            <a href="<?php echo " show_product-$dcat[id_category]-$dcat[category_name_seo] "; ?>"><i class="fa fa-angle-double-right"></i><?php echo ucwords($dcat['category_name']); ?></a>
                                                        </li>
                                                        <?php
            								}
            							?>
                                                </ul>

                                            </li>
                                            <?php
          						}
          					?>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Populer</h4>
                                <div class="widget-inner">
                                    <?php
      					$populer = mysql_query("
      						SELECT product_name, product_name_seo, price, product_image, id_product
      						FROM product
      						WHERE price < 700000
      						LIMIT 0,5
      					");
      					while($dpopuler=mysql_fetch_array($populer)){
      				?>
                                        <div class="latest-product">
                                            <img src="assets/images/product/<?php echo $dpopuler['product_image']; ?>" class="img-responsive" />
                                            <div class="latest-product-info">
                                                <a href="<?php echo " read_product-$dpopuler[id_product]-$dpopuler[product_name_seo] "; ?>">
                                                    <?php echo $dpopuler['product_name']; ?>
                                                </a>
                                                <div class="price">IDR
                                                    <?php echo format_rupiah($dpopuler['price']); ?>
                                                </div>
                                                <!--<a href="#">Add to Cart</a>-->
                                            </div>
                                        </div>

                                        <?php } ?>
                                </div>
                            </div>

                        </aside>

                    </div>
                </div>
            </section>
        </div>
        <!-- /Content area -->

        <!-- FOOTER -->
        <footer class="footer">

            <div class="bottomline">
                <div class="container">
                    <div class="payment_icons"><img src="assets/images/payment_icons.png" /></div>
                    <div class="copyrights">&copy; 2015 Sekar Sari Florist. All rights reserved</div>
                </div>
            </div>
        </footer>
        <!-- /FOOTER -->

        <div class="to-top"><i class="fa fa-angle-up"></i></div>

    </div>


    <!-- /Wrap all content -->

    <!-- JS Global -->

    <!--[if lt IE 9]><script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="assets/plugins/jquery/jquery-2.1.1.min.js"></script>
    <!--<![endif]-->
    <script src="assets/plugins/modernizr.custom.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/plugins/superfish/js/superfish.js"></script>
    <script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <script src="assets/plugins/placeholdem.min.js"></script>
    <script src="assets/plugins/jquery.smoothscroll.min.js"></script>
    <script src="assets/plugins/jquery.easing.min.js"></script>
    <script src="assets/plugins/jquery.sticky.js"></script>
    <script src="assets/plugins/twitter/tweetie.min.js"></script>

    <!-- JS Page Level -->
    <script src="assets/plugins/owlcarousel2/owl.carousel.min.js"></script>
    <script src="assets/plugins/waypoints/waypoints.min.js"></script>
    <script src="assets/plugins/placeholders.jquery.min.js"></script>
    <script src="assets/plugins/countdown/jquery.plugin.min.js"></script>
    <script src="assets/plugins/jquery-ui.min.js"></script>

    <script src="assets/js/theme.js"></script>
    <script src="assets/js/custom.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            theme.init();
            theme.initMainSlider();
            theme.initPartnerSlider();
            theme.initProductCarousel(4, 4, 3, 3, 2);
            theme.initTestimonials();
        });
        jQuery(window).load(function () {
            theme.initAnimation();
        });

        jQuery(window).load(function () {
            jQuery('body').scrollspy({
                offset: 100,
                target: '.navigation'
            });
        });
        jQuery(window).load(function () {
            jQuery('body').scrollspy('refresh');
        });
        jQuery(window).resize(function () {
            jQuery('body').scrollspy('refresh');
        });

        jQuery(document).ready(function () {
            theme.onResize();
        });
        jQuery(window).load(function () {
            theme.onResize();
        });
        jQuery(window).resize(function () {
            theme.onResize();
        });

        jQuery(window).load(function () {
            if (location.hash != '') {
                var hash = '#' + window.location.hash.substr(1);
                if (hash.length) {
                    jQuery('html,body').delay(0).animate({
                        scrollTop: jQuery(hash).offset().top - 44 + 'px'
                    }, {
                        duration: 1200,
                        easing: "easeInOutExpo"
                    });
                }
            }
        });
    </script>

</body>

</html>