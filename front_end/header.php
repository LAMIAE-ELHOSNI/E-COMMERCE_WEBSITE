<?php require "../admin/connectDB.php";
require "../admin/function.php";
require "add_to_cart.php";
$category=mysqli_query($con,"select * from category where stauts=1");
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce HTML5 Templatee</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a href="#">Category</a>
                                            <ul class="dropdown mega_dropdown">
                                                <?php foreach($category as $list){ ?>
                                                    <li><a href="product_by_category.php?id=<?php echo $list['id']?>"><?php echo $list['category']?></a></li>
                                                <?php }?>   
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>
                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="#">Category</a>
                                                <ul>
                                                <?php foreach($category as $list){ ?>
                                                    <li><a href="product_by_category.php?id=<?php echo $row['id']?>"><?php echo $list['category']?></a></li>
                                                <?php }?>  
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        <!-- <a href="#"><i class="icon-user icons"></i></a> -->
                                        <?php
                                        // if(isset($_SESSION['USER_LOGIN'])){
											//echo '<a href="logout.php"><i class="icon-user icons"></i></a>';
										//}else{
											//echo '<a href="login.php">Login</a>';
										//}
										?> 
                                    </div>

                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                                    </div>
                                    <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop">
                                            <?php
                                                if(isset($_SESSION['USER_LOGIN'])){
											    echo '<a><i class="icon-user icons"></i></a>';?>
                                                    <ul class="dropdown ">
                                                        <li><a href="show_orders_user.php">MY Orders</a></li>
                                                        <li></li>
                                                        <li><a href="logout.php">Logout</a></li>
                                                    </ul>
										      <?php  }else{
										    	echo '<a href="login.php">Login</a>';
									            	}
                                            ?>

                                        </li>
                                    </ul>
                                </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
