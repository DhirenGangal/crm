<link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap-datepicker.min.css">
<div class="content-wrapper">
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
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/orders/" class="btn btn-sm btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>

            <div class="box-body">
                <?php
                if (!empty($order)) {
                    ?>
                    <form method="post" enctype="multipart/form-data" id="frm">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" name="order_id" value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                                <input type="hidden" class="form-control" name="order_no" placeholder="Order no" value="<?php echo !empty($order['order_no']) ? $order['order_no'] : ''; ?>">
                                <input type="hidden" class="form-control" id="order_date" name="order_date" placeholder="Order Date" value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>">
                                <input type="hidden" class="form-control" id="expected_date" name="expected_date" placeholder="Expected Date" value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>">
                                <input type="hidden" class="form-control" name="dealer_name" placeholder="Dealer Name" value="<?php echo !empty($order['first_name']) ? $order['dealer_name'] : ''; ?>">
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <br/>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Status <sup
                                                    class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <select class="form-control" name="order_status" required>
                                                <option value="">Select Status</option>
                                                <option value="DELIVERED" <?php echo !empty($order['order_status']) && $order['order_status'] == 'DELIVERED' ? 'selected=selected' : ''; ?>>
                                                    Delivered
                                                </option>
                                                <option value="PROGRESS" <?php echo !empty($order['order_status']) && $order['order_status'] == 'PROGRESS' ? 'selected=selected' : ''; ?>>
                                                    In Progress
                                                </option>
                                                <option value="PENDING" <?php echo !empty($order['order_status']) && $order['order_status'] == 'PENDING' ? 'selected=selected' : ''; ?>>
                                                    Pending
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <ul class="list-unstyled">
                                        <li><span class="pull-left"><b>Order No</b></span><span class="pull-right"><?php echo !empty($order['order_no']) ? $order['order_no'] : ''; ?></span>
                                        </li>
                                        <br/>
                                        <li><span class="pull-left"><b>Order Date</b></span><span class="pull-right"><?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?></span>
                                        </li>
                                        <br/>
                                        <li><span class="pull-left"><b>Expected Date</b></span><span class="pull-right"><?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?></span>
                                        </li>
                                        <br/>
                                        <li><span class="pull-left"><b>Dealer Name</b></span><span class="pull-right"><?php echo !empty($order['dealer_name']) ? $order['dealer_name'] : ''; ?></span>
                                        </li>
                                        <br/>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered cart_table">
                                <thead>
                                <tr>
                                    <th colspan="1" rowspan="2" class="text-center">S.No</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Image</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Name</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">HSN / SAC</th>
                                    <th colspan="1" rowspan="2" class="text-center">Qty</th>
                                    <th colspan="1" rowspan="2" class="text-center">Unit Price (Rs.)</th>
                                    <th colspan="1" rowspan="1" class="text-center w-15">Discount</th>
                                    <th colspan="1" rowspan="2" class="text-center">Taxable Value</th>
                                    <th colspan="1" rowspan="2" class="text-center ">Taxable Rate</th>
                                    <th colspan="3" rowspan="1" class="text-center w-10">Tax Values (Rs.)</th>
                                    <th colspan="1" rowspan="2" class="text-center w-20">Mac Id</th>
                                    <th colspan="1" rowspan="2" class="text-center">Total</th>
                                </tr>
                                <tr>
                                    <th class="discountType-header text-center">
                                        <label class="radio-inline"> <input type="radio" checked value="PERCENTAGE" class="discount_type" id="discount_rate" name="discount_type"> %</label>
                                        <label class="radio-inline"><input type="radio" class="discount_type" value="NUMBER" id="discount_value" name="discount_type">Rs.</label>
                                    </th>
                                    <th class="text-right">CGST</th>
                                    <th class="text-right">SGST</th>
                                    <th class="text-right">IGST</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($order['order_items'])) {
                                    $i = 1;
                                    foreach ($order['order_items'] as $cart_item) {
                                        $tot = $cart_item['unit_price'] * $cart_item['quantity'];
                                        $discount = $cart_item['discount'];
                                        $dis_cal = ($tot * $discount) / 100;
                                        $sub_total = $tot - $dis_cal;
                                        ?>
                                        <tr>
                                            <input type="hidden" class="form-control" name="dealer_id[]" value="<?php echo !empty($order['created_by']) ? $order['created_by'] : ''; ?>">
                                            <input type="hidden" class="form-control" name="created_by[]" value="<?php echo !empty($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : ''; ?>">
                                            <input type="hidden" name="order_item_id[]" value="<?php echo !empty($cart_item['order_item_id']) ? $cart_item['order_item_id'] : ''; ?>">
                                            <input type="hidden" name="order_id1[]" value="<?php echo !empty($cart_item['order_id']) ? $cart_item['order_id'] : ''; ?>">
                                            <input type="hidden" name="product_info_id[]" value="<?php echo !empty($cart_item['product_info_id']) ? $cart_item['product_info_id'] : ''; ?>">
                                            <input type="hidden" name="product_id[]" value="<?php echo !empty($cart_item['product_id']) ? $cart_item['product_id'] : ''; ?>">
                                            <input type="hidden" name="product_name[]" value="<?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?>">
                                            <input type="hidden" class="gst" name="gst[]" value="<?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?>">
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php
                                                $img = !empty($cart_item['product_logo']) && file_exists(FCPATH . 'data/child-sub-products/') ? 'data/child-sub-products/' . $cart_item['product_logo'] : '';
                                                ?>
                                                <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                     alt="product image" class="img-table">
                                            </td>
                                            <td class="text-center"><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                            <td class="text-center"><?php echo !empty($cart_item['hsn_code']) ? $cart_item['hsn_code'] : '123456'; ?></td>
                                            <td class="text-center"><input type="hidden" name="quantity[]" class="w-100 quantity" value="<?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>">
                                                <?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>
                                            </td>
                                            <td class="text-right"><input type="hidden" class="mrp_price" name="unit_price[]" value="<?php echo !empty($cart_item['unit_price']) ? $cart_item['unit_price'] : ''; ?>">
                                                <?php echo !empty($cart_item['unit_price']) ? $cart_item['unit_price'] : ''; ?>
                                            </td>
                                            <td class="text-right">
                                                <input type="hidden" class="input_discount" name="discount[]" value="<?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?>">
                                                <input type="hidden" class="input_discount_val" name="" value="<?php echo !empty($dis_cal) ? $dis_cal : '' ?>">
                                                <span class="discount"> <?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?></span>
                                            </td>
                                            <td class="text-right">
                                                <input type="hidden" class="input_amount" name="input_amount[]" value="<?php echo !empty($sub_total) ? $sub_total : '0.00'; ?>">
                                                <input type="hidden" name="amnt_aft_discount[]" class="form-control input_amount_aft_discount" value="">
                                                <span class="input_amount_text"> <?php echo !empty($sub_total) ? number_format($sub_total, 2) : '0.00'; ?></span>
                                            </td>
                                            <!--  <td class="text-right">  <?php /*echo !empty($cart_item['amnt_aft_discount']) ? $cart_item['amnt_aft_discount'] : ''; */ ?></td>-->
                                            <td class="text-right"> <?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?></td>
                                            <td class="text-right"> <?php echo !empty($cart_item['cgst_amount']) ? $cart_item['cgst_amount'] : ''; ?></td>
                                            <td class="text-right"> <?php echo !empty($cart_item['sgst_amount']) ? $cart_item['sgst_amount'] : ''; ?></td>
                                            <td class="text-right"> <?php echo !empty($cart_item['igst_amount']) ? $cart_item['igst_amount'] : ''; ?></td>
                                            <td>
                                                <input type="hidden" name="set_mac[]" value="<?php echo !empty($cart_item['mac_id']) ? $cart_item['mac_id'] : ''; ?>">
                                                <?php if (!empty($cart_item['old_mac_id'])) { ?>
                                                    <input type="hidden" class="form-control" name="old_mac_id[]" value="<?php echo !empty($cart_item['old_mac_id']) ? $cart_item['old_mac_id'] : ''; ?>">
                                                    <input type="hidden" class="form-control" name="old_user_id[]" value="<?php echo !empty($cart_item['old_user_id']) ? $cart_item['old_user_id'] : ''; ?>">
                                                    <input type="text" class="form-control" name="mac_id[]" value="<?php echo !empty($cart_item['mac_id']) ? $cart_item['mac_id'] : ''; ?>" maxlength="12" placeholder="Enter Mac Id">
                                                <?php } else {
                                                    ?>

                                                    <input type="text" class="form-control mac_id" name="mac_id[]" value="<?php echo !empty($cart_item['mac_id']) ? $cart_item['mac_id'] : ''; ?>" maxlength="12" placeholder="Enter Mac Id">
                                                    <span class="mac_status_msg"></span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td class="text-right"><input type="hidden" class="input_amount" name="sub_total[]" value="<?php echo !empty($cart_item['total_amount']) ? $cart_item['total_amount'] : ''; ?>">
                                                <?php echo !empty($cart_item['total_amount']) ? $cart_item['total_amount'] : ''; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="text-right" colspan="6">Total Inv. Val</td>
                                    <td>
                                        <span class="pull-right"> <?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?></span>
                                    </td>
                                    <td colspan="1"><span><span class="pull-right"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span>
                                    </td>
                                    <td></td>
                                    <td colspan="1"><span class="pull-right"> <?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?> </span></td>
                                    <td colspan="1"><span class="pull-right"><?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?> </span></td>
                                    <td colspan="1"><span class="pull-right"><?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?> </span></td>
                                    <td></td>
                                    <td colspan="1"><span class="pull-right"> <span><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <table class="table ">
                                        <input type="hidden" name="text_amount"
                                               value="<?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00 ?>"/>
                                        <input type="hidden" name="sub_amount"
                                               value="<?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?>"/>
                                        <input type="hidden" name="discount_total"
                                               value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?>"/>
                                        <input type="hidden" name=""
                                               value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="cgst_amount"
                                               value="<?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="sgst_amount"
                                               value="<?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="igst_amount"
                                               value="<?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="tax_amount"
                                               value="<?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="final_total"
                                               value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                        <tr>
                                            <th>Taxable Amount</th>
                                            <td><span><i class="fa fa-inr "></i>  <span><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total Tax</th>
                                            <td><span> <i class="fa fa-inr "></i> <span><?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00 ?></span></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Total Value</th>
                                            <td><span> <i class="fa fa-inr "></i> <span><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                            </td>
                                        </tr>

                                    </table>

                                </div>
                                <p class="pull-right"><strong>Total Amount in Words
                                        :</strong> <?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00; ?>
                                </p>
                            </div>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form method="post" enctype="multipart/form-data form" id="frm">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control ofc_state" name="state"
                                       value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">
                                <input type="hidden" class="form-control user_state" name="state" value="">
                                <input type="hidden" class="form-control" name="order_id"
                                       value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Order No <sup
                                                        class="text-danger">*</sup></label>
                                            <div class="col-md-7">
                                                <span class="order_no_status"></span>
                                                <input type="text" name="order_no" id="order_no" class="form-control"
                                                       value="<?php echo !empty($sequence['sequence']) ? $sequence['sequence'] : ''; ?>"/>
                                                <a href="<?php echo base_url() ?>sequence/" class="pull-right">SetSequence</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Select Customer<sup
                                                        class="text-danger">*</sup></label>
                                            <div class="col-md-7">
                                                <select class="form-control select2" name="user_id" id="customer_id">
                                                    <option value="">--Select Customer--</option>
                                                    <?php
                                                    if (!empty($customers)) {
                                                        foreach ($customers as $k => $v) {
                                                            ?>
                                                            <option value="<?php echo $k ?>"><?php echo $v ?></option>
                                                            <?php
                                                        }
                                                    } ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Order Date <sup
                                                        class="text-danger">*</sup></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="order_date"
                                                       name="order_date" placeholder="Order Date"
                                                       value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Expected Date <sup
                                                        class="text-danger">*</sup></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="expected_date"
                                                       name="expected_date" placeholder="Expected Date" required
                                                       value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Delivery Within</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="delivery_within"
                                                       id="date_diff" placeholder="Delivery with in...."
                                                       value="<?php echo !empty($order['delivery_within']) ? $order['delivery_within'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <br/>
                        <table class="table table-bordered cart_table " id="cart">
                            <thead>
                            <tr>
                                <th colspan="1" rowspan="2" class="text-center">S.No</th>
                                <th colspan="1" rowspan="2" class="text-center">Image</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Name</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">HSN / SAC</th>
                                <th colspan="1" rowspan="2" class="text-center">Qty</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Unit Price (Rs.)</th>
                                <th colspan="1" rowspan="1" class="text-center w-15">Discount</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Taxable Value</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Taxable Rate</th>
                                <th colspan="3" rowspan="1" class="text-center w-10">Tax Values (Rs.)</th>
                                <th colspan="1" rowspan="2" class="text-center w-10">Total</th>
                            </tr>
                            <tr>
                                <th class="discountType-header text-center">
                                    <label class="radio-inline"> <input type="radio" checked value="PERCENTAGE"
                                                                        class="discount_type" id="discount_rate"
                                                                        name="discount_type"> %</label>
                                    <label class="radio-inline"><input type="radio" class="discount_type" value="NUMBER"
                                                                       id="discount_value"
                                                                       name="discount_type">Rs.</label>
                                </th>
                                <th class="text-right">CGST</th>
                                <th class="text-right">SGST</th>
                                <th class="text-right">IGST</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($cart_items)) {
                                $i = 1;
                                foreach ($cart_items as $cart_item) {
                                    $discount = $cart_item['discount'];
                                    $sub_total1 = $cart_item['mrp_price'] * $cart_item['quantity'];
                                    $dis_cal = ($sub_total1 * $discount) / 100;
                                    $sub_total = $sub_total1 - $dis_cal;
                                    ?>
                                    <tr>
                                        <input type="hidden" name="product_info_id[]"
                                               value="<?php echo !empty($cart_item['product_info_id']) ? $cart_item['product_info_id'] : ''; ?>">
                                        <input type="hidden" name="product_id[]"
                                               value="<?php echo !empty($cart_item['product_id']) ? $cart_item['product_id'] : ''; ?>">
                                        <input type="hidden" name="product_name[]"
                                               value="<?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?>">
                                        <input type="hidden" class="gst" name="gst[]"
                                               value="<?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php
                                            $img = !empty($cart_item['product_logo']) && file_exists(FCPATH . 'data/child-sub-products/') ? 'data/child-sub-products/' . $cart_item['product_logo'] : '';
                                            ?>
                                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                 alt="product image" class="img-table">
                                        </td>
                                        <td class="text-center"><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                        <td class="text-center"><?php echo !empty($cart_item['mfr_no']) ? $cart_item['mfr_no'] : '123456'; ?></td>
                                        <td class="text-center"><input type="hidden" name="quantity[]"
                                                                       class="w-100 quantity"
                                                                       value="<?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>">
                                            <?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>
                                        </td>
                                        <td class="text-right"><input type="hidden" class="mrp_price" name="mrp_price[]"
                                                                      value="<?php echo !empty($cart_item['mrp_price']) ? $cart_item['mrp_price'] : ''; ?>">
                                            <?php echo !empty($cart_item['mrp_price']) ? $cart_item['mrp_price'] : ''; ?>
                                        </td>
                                        <td class="text-right">
                                            <input type="hidden" class="input_discount" name="discount[]"
                                                   value="<?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?>">
                                            <input type="hidden" class="input_discount_val" name=""
                                                   value="<?php echo $dis_cal ?>">
                                            <span class="discount"> <?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?></span>
                                        </td>
                                        <td class="text-right">
                                            <input type="hidden" class="input_amount" name="input_amount[]"
                                                   value="<?php echo !empty($sub_total) ? $sub_total : '0.00'; ?>">
                                            <input type="hidden" name="amnt_aft_discount[]"
                                                   class="form-control input_amount_aft_discount" value="">
                                            <span class="input_amount_text"> <?php echo !empty($sub_total) ? number_format($sub_total, 2) : '0.00'; ?></span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text_gst"><?php echo !empty($cart_item['gst']) ? $cart_item['gst'] . ' ' . '%' : ''; ?></span>
                                            <input type="hidden" class="form-control input_gst" name="gst"
                                                   value="<?php echo !empty($cart_item['gst']) ? $cart_item['gst'] . ' ' . '%' : ''; ?>">
                                        </td>


                                        <td class="text-right"><input type="hidden" class="input_cgst"
                                                                      name="input_cgst[]" value="">
                                            <span class="cgst">0.00</span>

                                        </td>
                                        <td class="text-right"><input type="hidden" class="input_sgst"
                                                                      name="input_sgst[]" value="">
                                            <span class="sgst">0.00</span>

                                        </td>
                                        <td class="text-right"><input type="hidden" class="input_igst"
                                                                      name="input_igst[]" value="">
                                            <span class="igst">0.00</span>
                                        </td>
                                        <td class="text-right">
                                            <input type="hidden" name="indvidual_tax_amount[]" value=""
                                                   class="input_tax_amount"/>
                                            <input type="hidden" class="input_item_amount" name="sub_total[]"
                                                   value="<?php echo !empty($sub_total) ? $sub_total : '0.00'; ?>">
                                            <span class="item_amount"><?php echo !empty($sub_total) ? number_format($sub_total, 2) : '0.00'; ?></span>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-right" colspan="6">Total Inv. Val</td>
                                <td><span class="pull-right"> <span
                                                class="discount_total"><?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?></span></span>
                                </td>
                                <td colspan="1"><span><span
                                                class="total pull-right"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span></span>
                                </td>
                                <td></td>
                                <td colspan="1"><span class="pull-right"> <span
                                                class="cgst_total"><?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?></span> </span>
                                </td>
                                <td colspan="1"><span class="pull-right"> <span
                                                class="sgst_total"><?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?></span> </span>
                                </td>
                                <td colspan="1"><span class="pull-right"> <span
                                                class="igst_total"><?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?></span> </span>
                                </td>
                                <td colspan="1"><span class="pull-right"> <span
                                                class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remarks" rows="3"
                                                  placeholder="Enter remarks"><?php echo !empty($order['remarks']) ? $order['remarks'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <table class="table ">
                                        <input type="hidden" name="text_amount" class="input_text_amount"
                                               value="<?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00 ?>"/>
                                        <input type="hidden" name="sub_amount" class="input_total"
                                               value="<?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?>"/>
                                        <input type="hidden" name="discount_total" class="input_discount_total"
                                               value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?>"/>
                                        <input type="hidden" name="" class="input_net_total"
                                               value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="cgst_amount" class="input_cgst_total"
                                               value="<?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="sgst_amount" class="input_sgst_total"
                                               value="<?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="igst_amount" class="input_igst_total"
                                               value="<?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="tax_amount" class="input_tax_total"
                                               value="<?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00; ?>"/>
                                        <input type="hidden" name="final_total" class="input_final_total"
                                               value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                        <tr>
                                            <th>Taxable Amount</th>
                                            <td><span><i class="fa fa-inr "></i>  <span
                                                            class="total"><?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?></span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total Tax</th>
                                            <td><span> <i class="fa fa-inr "></i> <span
                                                            class="tax_total"><?php echo !empty($order['total_tax']) ? $order['total_tax'] : 0.00 ?></span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total Value</th>
                                            <td><span> <i class="fa fa-inr "></i> <span
                                                            class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button form="frm" type="submit" class="btn btn-success btn-submit">Submit</button>
                    <a href="<?php echo base_url() ?>admin/orders/" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function () {

        var order_no = $('#order_no').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>" + "admin/check_order_no_exists/?order_no=" + order_no,
            success: function (data) {
                if (data == 'false') {
                    $('#order_no').css('color', 'red');
                    $('.order_no_status').html('Order No already Exists..!').css('color', 'red');
                    $('.btn-submit').attr('disabled', 'disabled');
                }
            }
        })
        $(".mac_id").change(function () {
            var th, dom;
            th = $(this);
            dom = th.next('span');
            var mac_id = th.val();
            var msgbox1 = dom.find('.mac_status_msg');
            if (mac_id.length == 12) {
                dom.html('<img src="<?php echo base_url() ?>data/loader.gif">&nbsp;Checking availability.');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>owner/check_macIid_exists",
                    data: {mac_id: mac_id},
                    success: function (msg1) {
                        if (msg1 == 'OK') {
                            th.removeClass("red");
                            th.addClass("green");
                            dom.html('<span class="text-danger"> Mac id is  incorrect </span>');
                        }
                        else {
                            th.removeClass("green");
                            th.addClass("red");
                            dom.html(msg1);
                        }

                    }
                });

            }
            else {

                $(this).addClass("red");
                dom.html('<span class="text-danger" ">Please enter your 12 digit Mac Id</span>');
            }
            return false;
        });
        $('#customer_id').change(function () {
            var user_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>" + "admin/get_state/?user_id=" + user_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('.user_state').val(data.state);
                    checkTaxes();
                }
            })
        });
        var amount;
        var total_amount = 0;
        $(".cart_table tbody tr").each(function () {
            amount = $(this).find('.input_amount').val();
            total_amount += parseFloat(amount);
            checkDiscounts();
        });

        function checkDiscounts() {
            var with_discount_amount, amount, discount;
            var discount_amount = 0;
            var final_amount = 0;
            var total_amount = 0;
            $(".cart_table tbody tr").each(function () {
                amount = parseFloat($(this).find('.input_amount').val());
                discount = parseFloat($(this).find('.input_discount_val').val());
                with_discount_amount = amount - discount;
                with_discount_amount = with_discount_amount.toFixed(2);
                $(this).find('.input_with_discount_amount').val(with_discount_amount);
                $(this).find('.input_amount_aft_discount').val(amount);
                discount_amount += parseFloat(discount);

                final_amount += parseFloat(with_discount_amount);
                total_amount += parseFloat(amount);

            });
            discount_amount = isNaN(discount_amount) ? 0.00 : discount_amount;
            discount_amount = discount_amount.toFixed(2);
            $('.discount_total').text(discount_amount);
            $('.input_discount_total').val(discount_amount);
            final_amount = final_amount.toFixed(2);
            $('.net_total').text(final_amount);
            $('.input_net_total').val(final_amount);
            total_amount = isNaN(total_amount) ? 0.00 : total_amount;
            total_amount = total_amount.toFixed(2);

            $('.total').text(total_amount);
            $('.input_total').val(total_amount);
            checkTaxes();
        }

        function checkTaxes() {
            var tax, quantity, unit_price, tax_amt, amnt_aft_disc, total_tax, aft_tax_amount, cgst_amt, sgst_amt,
                igst_amt, user_state, ofc_state;
            var tax_amount = 0;
            $(".cart_table tbody tr").each(function () {
                tax = $(this).find('.gst').val();
                quantity = $(this).find('.quantity').val();
                unit_price = $(this).find('.mrp_price').val();
                amnt_aft_disc = $(this).find('.input_amount_aft_discount').val();

                tax_amt = (tax * amnt_aft_disc) / 100;
                total_tax = tax_amt * quantity;
                total_tax = total_tax.toFixed(2);

                cgst_amt = parseFloat(total_tax / 2);
                cgst_amt = cgst_amt.toFixed(2);
                sgst_amt = cgst_amt;
                user_state = $('.user_state').val();
                ofc_state = $('.ofc_state').val();
                if (user_state == ofc_state) {
                    $(this).find('.igst').text('0.00');
                    $(this).find('.input_igst').val('0');
                    $(this).find('.cgst').text(cgst_amt);
                    $(this).find('.input_cgst').val(cgst_amt);
                    $(this).find('.sgst').text(sgst_amt);
                    $(this).find('.input_sgst').val(sgst_amt);
                } else {
                    $(this).find('.input_cgst, .input_sgst').val('0');
                    $(this).find('.cgst, .sgst').text('0.00');
                    $(this).find('.igst').text(total_tax);
                    $(this).find('.input_igst').val(total_tax);
                }
                $(this).find('.input_tax_amount').val(total_tax);
                tax_amount += parseFloat(total_tax);
                aft_tax_amount = parseFloat(total_tax) + parseFloat(amnt_aft_disc);
                $(this).find('.input_item_amount').val(aft_tax_amount.toFixed(2));
                $(this).find('.item_amount').text(aft_tax_amount.toFixed(2));
                total_amount += parseFloat(amnt_aft_disc);
                console.log(total_amount);
            });
            //   $('.total').html(total_amount.toFixed(2));
            //    $('.input_total').val(total_amount);
            tax_amount = isNaN(tax_amount) ? 0 : tax_amount;
            tax_amount = tax_amount.toFixed(2);
            cgst_amt = parseFloat(tax_amount / 2);
            cgst_amt = cgst_amt.toFixed(2);
            sgst_amt = cgst_amt;
            $('.input_tax_total').val(tax_amount);
            $('.tax_total').text(tax_amount);
            user_state = $('.user_state').val();
            ofc_state = $('.ofc_state').val();
            if (user_state == ofc_state) {
                $('.igst_total').text('0.00');
                $('.input_igst_total').val('0');
                $('.cgst_total').text(cgst_amt);
                $('.input_cgst_total').val(cgst_amt);
                $('.sgst_total').text(sgst_amt);
                $('.input_sgst_total').val(sgst_amt);
            } else {
                $('.input_cgst_total, .input_sgst_total').val('0');
                $('.cgst_total, .sgst_total').text('0.00');
                $('.igst_total').text(tax_amount);
                $('.input_igst_total').val(tax_amount);
            }
            finalTotal();
        }

        function finalTotal() {
            var net_total, tax_total, final_total;
            net_total = $(".input_total").val();
            tax_total = $(".input_tax_total").val();
            final_total = parseFloat(net_total) + parseFloat(tax_total);
            final_total = final_total.toFixed(2);
            $('.final_total').text(final_total);
            $('.input_final_total').val(final_total);
            $('.input_text_amount').val(convertNumberToWords($('.final_total').text()) + 'Rupees Only');
        }

        $('.discount_type').change(function () {
            var val = $(this).val();
            $(".cart_table tbody tr").each(function () {
                var discount = parseFloat($(this).find('.input_discount_val').val());
                var discount_val = parseFloat($(this).find('.input_discount').val());
                discount = discount.toFixed(2);
                if (val == 'PERCENTAGE') {
                    $(this).find('.discount').text(discount_val);
                } else {
                    $(this).find('.discount').text(discount);
                }
            })
        })

    })
</script>
<script>
    $(function ($) {
        var $from = $('#order_date');
        var $to = $("#expected_date");
        $from.datepicker({
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            startDate: '+0d',
            endDate: '+0d',
            onClose: function (selectedDate) {
                $to.datepicker("option", "minDate", selectedDate);
            }
        }).datepicker("setDate", 'now');
        $to.datepicker({
            todayBtn: "linked",
            autoclose: true,
            format: 'dd/mm/yyyy',
            startDate: '+1d',
            onClose: function (selectedDate) {
                $from.datepicker("option", "maxDate", selectedDate);
            }
        });
        $from.add($to).change(function () {
            var dayFrom = $from.datepicker('getDate');
            var dayTo = $to.datepicker('getDate');
            if (dayFrom && dayTo) {
                var days = calcDaysBetween(dayFrom, dayTo);
                (days == 0 || days == 1) ?
                    $('#date_diff').val(days + " Day") :
                    $('#date_diff').val(days + " Days");
            }
        });

        function calcDaysBetween(startDate, endDate) {
            return (endDate - startDate) / (1000 * 60 * 60 * 24);
        }
    });
</script>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
