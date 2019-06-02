<!doctype html>
<html lang="en">

<head>
    <title><?php  echo !empty($title) ? $title : ''?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/front/css/skitter.css" type="text/css" media="all" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/front/css/styles.css" type="text/css" media="all" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/front/css/style.css" type="text/css" media="all" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/front/css/owl.carousel.css" type="text/css" media="all" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/front/css/owl.theme.css" type="text/css" media="all" rel="stylesheet"/>
    <style>
        .login-menu{
            display: block !important;
        }
    </style>
</head>

<body>
<header>
    <div class="top-bar  py-2">
        <div class="container ">
            <div class="row">
                <div class="col-md-10">
                    <p class="text-gray text-left"><?php echo !empty($site_info['email']) ? $site_info['email'] : '' ?></p>
                </div>
                <div class="col-md-2 d-inline-flex pull-right">
                    <!-- <p class="text-gray  mr-5">My Account</p>-->
                    <a href="#" role="button" class="text-gray dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i> Login </a>
                    <div class="dropdown">
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <nav class="">
        <div class="container">
            <div class="d-inline-flex">
                <div class="navbar-brand">
                    <?php
                    $img = !empty($site_info['logo']) && file_exists(FCPATH.'data/settings/') ?'data/settings/'.$site_info['logo'] : '';
                    ?>
                    <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" class="img-fluid">
                </div>
                <ul class="drop-nav">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="submenu"><a href="#" title="Unser Produktsortiment">Products</a>
                        <ul class="megamenu">
                            <div class="col text-center">
                                <a href="<?php echo base_url() ?>product">
                                    <img src="<?php echo base_url() ?>data/images/navbar-product/product1.jpg" class="img-fluid ">

                                    <h5>Retis lapen casen</h5>
                                    <span class="product-price ">From ₹ 9,999</span>
                                </a>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url() ?>data/images/navbar-product/product2.jpg" class="img-fluid ">
                                <h5>Retis lapen casen</h5>
                                <span class="product-price ">From ₹ 9,999</span>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url() ?>data/images/navbar-product/product3.jpg" class="img-fluid ">
                                <h5>Retis lapen casen</h5>
                                <span class="product-price ">From ₹ 9,999</span>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url() ?>data/images/navbar-product/product4.jpg" class="img-fluid ">
                                <h5>Retis lapen casen</h5>
                                <span class="product-price ">From ₹ 9,999</span>
                            </div>
                            <div class="col">
                                <img src="<?php echo base_url() ?>data/images/navbar-product/product5.jpg" class="img-fluid ">
                                <h5>Retis lapen casen</h5>
                                <span class="product-price ">From ₹ 9,999</span>
                            </div>

                        </ul>
                    </li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Login</a></li>

                </ul>
            </div>


        </div>


    </nav>
</header>