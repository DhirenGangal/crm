<?php isLoginExists(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo !empty($title) ? $title : ''; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.4.1/css/colReorder.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/scie-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/bootstrap3-wysihtml5.min.css">
    <script src="<?php echo base_url(); ?>assets/lib/js/jquery-2.1.4.min.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>admin/dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b><?php echo getSmallTitle($site_title); ?></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><?php echo !empty($site_title) ? $site_title : ''; ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu cart-data">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Cart <i class="fa fa-cart-plus"></i>
                            <span class="label label-warning cart-cnt"><?php echo !empty($cart_items) ? count($cart_items) : '0' ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php echo !empty($cart_items) ? count($cart_items) : '0' ?>
                                items in cart
                            </li>
                            <li>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>HSN/SAC</th>
                                        <th class="w-20">Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($cart_items)) {
                                        foreach ($cart_items as $cart_item) {
                                            ?>
                                            <tr>
                                                <td><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                                <td><?php echo !empty($cart_item['hsn_code']) ? $cart_item['hsn_code'] : ''; ?></td>
                                                <td><?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?></td>
                                                <td><?php echo !empty($cart_item['sub_total']) ? $cart_item['sub_total'] : ''; ?></td>
                                                <td><a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/add_cart_info/?act=del&pk_id=<?php echo $cart_item['pk_id']; ?>" title='Delete' onclick="return window.confirm('Do You Want to Delete?');" class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li class="footer">
                                <ul class="list-inline list-unstyled text-center">
                                    <li><a class="btn btn-sm btn-primary"
                                           href="<?php echo base_url() ?>admin/view-cart">View all</a></li>
                                    <li><a class="btn btn-sm btn-danger clear-cart"
                                           href="<?php echo base_url() ?>admin/clear_cart/?created_by=<?php echo $_SESSION['USER_ID'] ?>">ClearCart</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            $img = (!empty($user_data['profile_logo']) && file_exists(FCPATH . "data/profile/" . $user_data['profile_logo'])) ? "data/profile/" . $user_data['profile_logo'] : '';
                            ?>
                            <img src="<?php echo base_url(); ?><?php echo !empty($img) ? $img : 'assets/images/avatar.jpeg' ?>"
                                 class="user-image" alt="User Image">

                            <span class="hidden-xs"> <?php echo !empty($user_data['first_name']) ? $user_data['first_name'] : 'SCIE Technologies' ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?><?php echo !empty($img) ? $img : 'assets/images/avatar.jpeg' ?>"
                                     class="img-circle"
                                     alt="User Image">
                                <p>
                                    <?php echo !empty($user_data['first_name']) ? $user_data['first_name'] : 'SCIE Technologies' ?>

                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url() ?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url() ?>admin/logout" class="btn btn-default btn-flat">Sign
                                        out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header text-center"><?php echo !empty($_SESSION) ? $_SESSION['ROLE'] : '' ?></li>
                <li class="active"><a href="<?php echo base_url() ?>admin/dashboard/"><i class="fa fa-dashboard"></i>
                        <span>Dashboard</span></a></li>
                <li class="treeview hide">
                    <a href="#">
                        <i class="fa fa-product-hunt"></i> <span>Products</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url() ?>admin/main-products/"><i class="fa fa-product-hunt"></i>
                                Main
                                Products</a></li>
                        <li><a href="<?php echo base_url() ?>admin/sub-products/"><i class="fa fa-product-hunt"></i> Sub
                                Products</a></li>
                        <li><a href="<?php echo base_url() ?>admin/child-sub-products/"><i
                                        class="fa fa-product-hunt"></i> Child Sub Products</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/child-sub-products/"><i
                                class="fa fa-product-hunt"></i>Products</a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/dealers/">
                        <i class="fa fa-users"></i> <span>Dealers</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/customers/">
                        <i class="fa fa-users"></i> <span>Customers</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cart-plus"></i> <span>Orders</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url() ?>admin/products"><i class="fa fa-product-hunt"></i>Products
                                List</a></li>
                        <li><a href="<?php echo base_url() ?>admin/orders/"><i class="fa fa-cart-plus"></i> <span>View Orders</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/create-order/">
                        <i class="fa fa-cart-plus"></i> <span>Custom Order</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/downloads/">
                        <i class="fa fa-download"></i> <span>Downloads</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>admin/clients/">
                        <i class="fa fa-users"></i> <span>Clients</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>More</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li> <a href="<?php echo base_url() ?>sequence/"><i class="fa fa-bars"></i> <span>Sequence No's</span></a></li>
                        <li> <a href="<?php echo base_url() ?>admin/item_master/"><i class="fa fa-bars"></i> <span>Item Master</span></a></li>
                        <li> <a href="<?php echo base_url() ?>admin/tickets/"><i class="fa fa-ticket"></i> <span>View Tickets</span></a></li>
                        <li><a href="<?php echo base_url() ?>admin/settings/"><i class="fa fa-cogs"></i> <span>Site Info</span></a></li>
                        <li><a href="<?php echo base_url() ?>admin/banners/"><i class="fa fa-picture-o"></i> <span>Banners</span></a></li>
                    </ul>
                </li>

            </ul>
        </section>
    </aside>