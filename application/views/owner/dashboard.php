<div class="content-wrapper">
    <div class="container">
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
                        <h3><?php echo !empty($p_cnt) ? $p_cnt : '0'; ?></h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>owner/products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo !empty($sp_cnt) ? $sp_cnt : '0'; ?></h3>

                        <p>Sub Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo !empty($cp_cnt) ? $cp_cnt : '0'; ?></h3>

                        <p>Child Sub Products</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo !empty($order_cnt) ? $order_cnt : '0'; ?></h3>

                        <p>Orders </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

    </section>
    </div>
</div>
