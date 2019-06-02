<!doctype html>
<html lang="en">

<head>
    <title><?php  echo !empty($title) ? $title : ''?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo !empty($site_info) ? $site_info['meta_description'] : '' ;?>" />
    <meta name="title" content="<?php echo !empty($title) ? $title : '' ;?>" />
    <meta name="keywords" content="<?php echo empty($site_info) ? "SCI-E , product realization, embedded, Domain,Systems, Engineering, Solutions" : $site_info['meta_keywords'].',SCIE Technologies'; ?>"/>
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
                    <p class="text-gray text-left"><?php echo !empty($site_info['email']) ? $site_info['email'] : '' ;?></p>
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
                            <?php
                            if(!empty($products)){
                                foreach ($products as $product){
                                    if(!empty($product['sub_products'])){
                                        foreach ($product['sub_products'] as $sub_product){
                                            if(!empty($sub_product['child_products'])){
                                                foreach ($sub_product['child_products'] as $child_product){
                                                    ?>
                                                    <div class="col text-center hide">
                                                        <a href="<?php echo base_url() ?>product">
                                                            <?php
                                                            $img = !empty($child_product['product_logo']) && file_exists(FCPATH.'data/child-sub-products/')? 'data/child-sub-products/'.$child_product['product_logo'] : '';
                                                            ?>
                                                            <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" class="mega-menu-product-img">

                                                            <h5><?php echo !empty($child_product['main_product_name']) ? $child_product['main_product_name'] : '' ?></h5>
                                                            <span class="product-price ">From <i class="fa fa-inr"></i> <?php echo !empty($child_product['mrp_price']) ? $child_product['mrp_price'] : ''; ?></span>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }

                                            }
                                        }
                                    }
                                }
                            }else{
                                echo '<h4>No Product Found</h4>';
                            }

                            ?>

                        </ul>
                    </li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="<?php echo base_url() ?>contact">Contact Us</a></li>
                    <li class="dropdown login">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span class="dropme"></span></a>
                        <ul class="dropdown-menu login_menu" role="menu">
                            <li><a class="text-gray" href="<?php echo base_url() ?>owner/">Owner Login</a></li>
                            <li><a class="text-gray" href="<?php echo base_url() ?>dealer">Dealer Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>


    </nav>
</header>