<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?=ucwords($page)?> | <?=$this->header_data['title']?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->
	<link rel="stylesheet" href="<?=base_url("assets/plugins/font-awesome/css/font-awesome.min.css")?>"/>
	<link href="<?=base_url("assets/plugins/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet" />
	<link href="<?=base_url("assets/plugins/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet" />
	<link href="<?=base_url("assets/css/style.min.css")?>" rel="stylesheet" />
	<link href="<?=base_url("assets/css/style-responsive.min.css")?>" rel="stylesheet" />
	<link href="<?=base_url("assets/css/theme/default.css")?>" id="theme" rel="stylesheet" />
	<link href="<?=base_url("assets/css/animate.min.css")?>" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url("assets/plugins/pace/pace.min.js")?>"></script>
	<!-- ================== END BASE JS ================== -->
    <style type="text/css">
        .header-nav .nav>li>a { color: #fff !important; }
        .header-nav .nav > li.active > a {color: #00acac !important; font-weight: bolder;}
    </style>
</head>
<body>
	 <!-- BEGIN #page-container -->
    <div id="page-container" class="fade">
    	<!-- BEGIN #top-nav -->
        <div id="top-nav" class="top-nav">
            <!-- BEGIN container -->
            <!-- <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-hover">
                            <a href="#" data-toggle="dropdown"><img src="<?=base_url("assets/img/english.png")?>" class="flag-img" alt="" /> English <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><img src="<?=base_url("assets/img/english.png")?>"class="flag-img" alt="" /> English</a></li>
                                <li><a href="#"><img src="<?=base_url("assets/img/german.png")?>" class="flag-img" alt="" /> German</a></li>
                                <li><a href="#"><img src="<?=base_url("assets/img/spanish.png")?>" class="flag-img" alt="" /> Spanish</a></li>
                                <li><a href="#"><img src="<?=base_url("assets/img/french.png")?>" class="flag-img" alt="" /> French</a></li>
                                <li><a href="#"><img src="<?=base_url("assets/img/chinese.png")?>" class="flag-img" alt="" /> Chinese</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Customer Care</a></li>
                        <li><a href="#">Order Tracker</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Our Forum</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#"><i class="fa fa-facebook f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus f-s-14"></i></a></li>
                    </ul>
                </div>
            </div> -->
            <!-- END container -->
        </div>
        <!-- END #top-nav -->
    
        <!-- BEGIN #header -->
        <div id="header" class="header" id="top-nav" class="top-nav" style="background-color: #242a30 !important; ">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN header-container -->
                <div class="header-container">
                    <!-- BEGIN navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="<?=base_url("home")?>">
                                <img src="<?=base_url("assets/img/logo.png")?>" class="flag-img" alt="" />
                                <!-- <span class="brand"></span>
                                <span>Color</span>Admin
                                <small>e-commerce frontend theme</small> -->
                            </a>
                        </div>
                    </div>
                    <!-- END navbar-header -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav">
                                <li class="<?=$page=='home'? 'active' : ''?>"><a href="<?= base_url('home')?>">Home</a></li>
                                <li class="dropdown dropdown-hover <?=$page=='products'? 'active' : ''?>">
                                    <a href="<?= base_url('products')?>" data-toggle="dropdown">
                                        Products 
                                        <i class="fa fa-angle-down"></i> 
                                        <span class="arrow top"></span>
                                    </a>
                                    
                                    <ul class="dropdown-menu">
                                        <?php foreach (get_main_products() as $key => $p) {?>
                                        <li><a href="<?= base_url('products/').$p['product_id']?>"><?= $p['main_product_name']?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="<?=$page=='new arrival'? 'active' : ''?>"><a href="<?=base_url('home')?>">New Arrival</a></li>
                                <li class="<?=$page=='contact us'? 'active' : ''?>">
                                    <a href="<?=base_url('contact-us')?>">Contact US</a>
                                </li>
                                <li class="<?=$page=='about us'? 'active' : ''?>">
                                    <a href="<?=base_url('about-us')?>">About US</a>
                                </li>
                                <!-- <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        Pages
                                        <i class="fa fa-angle-down"></i> 
                                        <span class="arrow top"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html">Home (Default)</a></li>
                                        <li><a href="index_fixed_header.html">Home (Fixed Header)</a></li>
                                        <li><a href="index_inverse_header.html">Home (Inverse Header)</a></li>
                                        <li><a href="search_results.html">Search Results</a></li>
                                        <li><a href="product.html">Product Page</a></li>
                                        <li><a href="product_detail.html">Product Details Page</a></li>
                                        <li><a href="checkout_cart.html">Checkout Cart</a></li>
                                        <li><a href="checkout_info.html">Checkout Shipping</a></li>
                                        <li><a href="checkout_payment.html">Checkout Payment</a></li>
                                        <li><a href="checkout_complete.html">Checkout Complete</a></li>
                                        <li><a href="my_account.html">My Account</a></li>
                                        <li><a href="contact_us.html">Contact Us</a></li>
                                        <li><a href="about_us.html">About Us</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li> -->
                                <li class="dropdown dropdown-hover">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="fa fa-search search-btn"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <div class="dropdown-menu p-15">
                                        <form action="search_results.html" method="POST" name="search_form">
                                            <div class="input-group">
                                                <input type="text" placeholder="Search" class="form-control bg-silver-lighter" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-inverse" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END header-nav -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            <li class="dropdown dropdown-hover">
                                <a href="#" class="header-cart" data-toggle="dropdown">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="total">2</span>
                                    <span class="arrow top"></span>
                                </a>
                    
                                <div class="dropdown-menu dropdown-menu-cart p-0">
                                    <div class="cart-header">
                                        <h4 class="cart-title">Shopping Bag (1) </h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
                                            <li>
                                                <div class="cart-item-image"><img src="<?=base_url("assets/img/ipad.jpg")?>" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>iPad Pro Wi-Fi 128GB - Silver</h4>
                                                    <p class="price">$699.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-item-image"><img src="<?=base_url("assets/img/imac.jpg")?>" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>21.5-inch iMac</h4>
                                                    <p class="price">$1299.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="cart-item-image"><img src="<?=base_url("assets/img/iphone.png")?>" alt="" /></div>
                                                <div class="cart-item-info">
                                                    <h4>iPhone 6s 16GB - Silver</h4>
                                                    <p class="price">$649.00</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-footer">
                                        <div class="row row-space-10">
                                            <div class="col-xs-6">
                                                <a href="checkout_cart.html" class="btn btn-default btn-block">View Cart</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="checkout_cart.html" class="btn btn-inverse btn-block">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <?php if ($this->session->has_userdata('user')) {?>
                            <li>
                                <a href="<?=base_url('login/logout')?>">
                                    <img src="<?=base_url("assets/img/user-1.jpg")?>" class="user-img" alt="" /> 
                                    <span class="hidden-md hidden-sm hidden-xs">Logout</span>
                                </a> 
                            </li>
                            <?php } else {?>
                            <li class="<?=$page=='login'? 'active' : ''?>">
                                <a href="<?=base_url('login')?>">
                                    <span class="hidden-md hidden-sm hidden-xs">Login</span>
                                </a> 
                            </li>
                            <li>
                                <a href="<?=base_url('register')?>">
                                    <span class="hidden-md hidden-sm hidden-xs">Register</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- END header-nav -->
                </div>
                <!-- END header-container -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #header -->