
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

       <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo !empty($p_cnt) ? $p_cnt :'0'; ?></h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/products/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo !empty($sp_cnt) ? $sp_cnt :'0'; ?></h3>

                        <p>Sub Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/sub-products/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo !empty($cp_cnt) ? $cp_cnt :'0'; ?></h3>

                        <p>Child Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/child-sub-products/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo !empty($dealers_cnt) ? $dealers_cnt :'0'; ?></h3>

                        <p>Dealers </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/dealers/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo !empty($users_cnt) ? $users_cnt :'0'; ?></h3>

                        <p>Users </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo !empty($o_cnt) ? $o_cnt :'0'; ?></h3>

                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-basket"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/orders/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo !empty($co_cnt) ? $co_cnt :'0'; ?></h3>

                        <p>Custom Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/create-order/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

    </section>
</div>
