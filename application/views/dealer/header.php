<?php isLoginExists();?>
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/scie-style.css">

    <script src="<?php echo base_url(); ?>assets/lib/js/jquery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>dealer/dashboard/" class="logo">
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
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>assets/images/avatar.jpeg" class="user-image" alt="User Image">
                            <span class="hidden-xs"> <?php echo !empty($user_data['name']) ? $user_data['name']:''?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?>assets/images/avatar.jpeg" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo !empty($user_data['name']) ? $user_data['name']:''?>

                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url()  ?>dealer/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url()  ?>dealer/logout" class="btn btn-default btn-flat">Sign out</a>
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

                <li>
                    <a href="<?php echo base_url()  ?>dealer/dashboard/">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li >
                    <a href="<?php echo base_url()  ?>dealer/products/">
                        <i class="fa fa-product-hunt"></i> <span>Products</span>
                    </a>
                </li>
                <li >
                    <a href="<?php echo base_url()  ?>dealer/product-orders/">
                        <i class="fa fa-shopping-cart"></i> <span>Product Orders</span>
                    </a>
                </li>
                <li >
                    <a href="<?php echo base_url()  ?>dealer/orders/">
                        <i class="fa fa-cart-plus"></i> <span>View Orders</span>
                    </a>
                </li>
                <li >
                    <a href="<?php echo base_url()  ?>dealer/view-users/">
                        <i class="fa fa-users"></i> <span>View Users</span>
                    </a>
                </li>
                <li >
                    <a href="<?php echo base_url()  ?>dealer/tickets/">
                        <i class="fa fa-ticket"></i> <span>View Tickets</span>
                    </a>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->