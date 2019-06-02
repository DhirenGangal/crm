<div class="content-wrapper">
    <div class="container">
    <section class="content-header">
        <h1>Product Orders</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Orders</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Product Orders</h3>
            </div>
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Select Products
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                                <form method="post" class="form-horizontal" id="indent1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Order Number</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="order_number" value="<?php echo !empty($order['order_number']) ? $order['order_number'] : '' ;?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Product Name</label>
                                                <div class="col-md-8">
                                                    <select class="form-control product" name="product" required>
                                                        <option value="">-- SELECT PRODUCT --</option>
                                                       <option value="">Mobiles</option>
                                                       <option value="">Touchnock</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Sub Products</label>
                                                <div class="col-md-8">
                                                    <select class="form-control category" name="category" required>
                                                        <option value="">-- SELECT SUB PRODUCT --</option>
                                                        <option value="">Sub Product 1</option>
                                                        <option value="">Sub Product 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Item Name</label>

                                                <span class="onchange2"></span>
                                                <div class="col-md-4 seconddiv">
                                                    <select class="form-control second" id="sbTwo" name="product_orders[]" multiple size="6"></select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                        <button class="btn btn-success pull-right" type="submit">NEXT</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-danger">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Product Delivery Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                <form class="form-horizontal" method="post"  id="frm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label col-md-4">Order Date </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="order_date" class="form-control" value="<?php echo !empty($order['order_date']) ? $order['order_date'] : '' ;  ?>" readonly required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Expected Date</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="expected_date" value="<?php echo !empty($order['expected_date']) ? $order['expected_date'] : '';  ?>" readonly required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Delivery Within</label>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="with_in" value="<?php echo !empty($order['with_in']) ? $order['with_in'] : '';  ?>"   readonly required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Remarks</label>
                                                <div class="col-md-9">
                                                    <textarea name="remarks" class="form-control" id="remarks" rows="5"  required ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <button type="submit" class="btn btn-success pull-right">NEXT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Products Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse result">

                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <a href="<?php echo base_url() ?>owner/tickets/" class="btn btn-danger">Cancel</a>
                    <button form="frm" type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </section>
    </div>
</div>

