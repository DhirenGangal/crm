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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/scie-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/hover.css">

    <script src="<?php echo base_url(); ?>assets/lib/js/jquery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .skin-blue .main-header .navbar {
            background-color: #605ca8;
        }

        .skin-blue .main-header li.user-header {
            background-color: #605ca8 !important;
        }
    </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?php echo base_url() ?>owner/dashboard" class="navbar-brand"> <span
                                class="logo-lg"><b><?php echo !empty($site_title) ? $site_title : ''; ?></b></span></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url() ?>owner/products">Products <span
                                        class="sr-only">(current)</span></a></li>
                        <!-- <li><a href="<?php /*echo base_url() */ ?>owner/product-orders">Product Orders</a></li>
                        <li><a href="<?php /*echo base_url() */ ?>owner/view-orders">View Orders</a></li>-->
                        <li><a href="<?php echo base_url() ?>owner/orders">Product Orders</a></li>
                        <li><a href="<?php echo base_url() ?>owner/tickets">Ticketing System</a></li>
                    </ul>
                </div>
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
                                                    <td><a data-toggle="tooltip" data-placement="bottom"
                                                           href="<?php echo base_url() ?>owner/add_to_cart/?act=del&pk_id=<?php echo $cart_item['pk_id']; ?>"
                                                           title='Delete'
                                                           onclick="return window.confirm('Do You Want to Delete?');"
                                                           class="btn btn-sm btn-default"><i
                                                                    class="fa fa-trash text-danger"></i></a></td>
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
                                               href="<?php echo base_url() ?>owner/view-cart">View all</a></li>
                                        <li><a class="btn btn-sm btn-danger clear-cart"  href="<?php echo base_url() ?>owner/clear_cart/?created_by=<?php echo $_SESSION['USER_ID'] ?>">ClearCart</a></li>
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
                                     class="user-image">
                                <span class="hidden-xs"> <?php echo !empty($user_data['first_name']) ? $user_data['first_name'] : 'SCIE Technologies' ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header text-center">
                                    <img src="<?php echo base_url(); ?><?php echo !empty($img) ? $img : 'assets/images/avatar.jpeg' ?>"
                                         class="img-circle" alt="User Image">
                                    <p> <?php echo !empty($user_data['first_name']) ? $user_data['first_name'] : 'SCIE Technologies' ?></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url() ?>owner/profile"
                                           class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url() ?>owner/logout" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <script>
        $(document).ready(function () {
            $('.clear-cart').click(function () {
                var created_by = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url() ?>" + "owner/clear_cart/?created_by=" + created_by,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        if(data==="TRUE"){
                            window.location.reload();
                        }
                    }
                });
            })
        })
    </script>