<link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap-datepicker.min.css">
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
                    <div class="box-tools">
                        <a href="<?php echo base_url(); ?>dealer/orders/" class="btn btn-sm btn-danger"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="box-body">
                    <form method="post" enctype="multipart/form-data" id="frm">
                        <?php
                        if (!empty($order)) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control ofc_state" name="state"
                                           value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">
                                    <input type="hidden" class="form-control user_state" name="state"
                                           value="<?php echo !empty($user['state']) ? $user['state'] : ''; ?>">
                                    <input type="hidden" class="form-control" name="order_id"
                                           value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Order ID </label>
                                            <div class="col-md-7">
                                                <?php echo !empty($order['order_no']) ? $order['order_no'] : ''; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Order By </label>
                                            <div class="col-md-7">
                                                <?php echo !empty($order['dealer_name']) ? $order['dealer_name'] : ''; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Order Date </label>
                                            <div class="col-md-7">
                                                <?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Expected Date </label>
                                            <div class="col-md-7">
                                                <?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered cart_table" id="cart">
                                <thead>
                                <tr>
                                    <th colspan="1" rowspan="2" class="text-center">S.No</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Image</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Name</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">HSN / SAC</th>
                                    <th colspan="1" rowspan="2" class="text-center">Qty</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Unit Price (Rs.)</th>
                                    <th colspan="1" rowspan="1" class="text-center w-20">Discount</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Taxable Value</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Taxable Rate</th>
                                    <th colspan="3" rowspan="1" class="text-center w-10">Tax Values (Rs.)</th>
                                    <th colspan="1" rowspan="2" class="text-center ">Mac Id</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Total</th>
                                </tr>
                                <tr>
                                    <th class="discountType-header text-center">
                                        <label class="radio-inline"> <input type="radio" checked value="PERCENTAGE" class="discount_type" id="discount_rate" name="discount_type"> %</label>
                                        <label class="radio-inline"><input type="radio" class="discount_type" value="" id="discount_value" name="discount_type">Rs.</label>
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
                                        $tot =  $cart_item['unit_price'] * $cart_item['quantity'] ;
                                        $discount = $cart_item['discount'];
                                        $dis_cal = ($tot * $discount) / 100;
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
                                            <td><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                            <td class="text-center"><?php echo !empty($cart_item['hsn_code']) ? $cart_item['hsn_code'] : ''; ?></td>
                                            <td class="text-center"> <?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?></td>
                                            <td class="text-right"><?php echo !empty($cart_item['unit_price']) ? $cart_item['unit_price'] : ''; ?></td>
                                            <td class="text-right">
                                                <input type="hidden" class="input_discount" name="discount[]" value="<?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?>">
                                                <input type="hidden" class="input_discount_val" name="" value="<?php echo !empty($dis_cal) ? $dis_cal : '' ?>">
                                            <span class="discount"> <?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?></span>
                                            </td>
                                            <td class="text-right"><?php echo !empty($cart_item['amnt_aft_discount']) ? $cart_item['amnt_aft_discount'] : ''; ?></td>
                                            <td class="text-right"><?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?></td>


                                            <td class="text-right"><?php echo !empty($cart_item['cgst_amount']) ? $cart_item['cgst_amount'] : ''; ?></td>
                                            <td class="text-right"><?php echo !empty($cart_item['sgst_amount']) ? $cart_item['sgst_amount'] : ''; ?></td>
                                            <td class="text-right"><?php echo !empty($cart_item['igst_amount']) ? $cart_item['igst_amount'] : ''; ?></td>
                                            <td class="text-center">
                                                <?php echo !empty($cart_item['mac_id']) ? $cart_item['mac_id'] : ''; ?>
                                            </td>

                                            <td class="text-right"><?php echo !empty($cart_item['total_amount']) ? $cart_item['total_amount'] : ''; ?></td>


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
                                    <td colspan="1"><span
                                                class="pull-right"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span>
                                    </td>
                                    <td></td>
                                    <td colspan="1"><span
                                                class="pull-right"> <?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?></span>
                                    </td>
                                    <td colspan="1"><span
                                                class="pull-right"> <?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?></span>
                                    </td>
                                    <td colspan="1"><span
                                                class="pull-right"> <?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?></span>
                                    </td>
                                    <td></td>

                                    <td colspan="1"><span
                                                class="pull-right"> <?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span>
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
                                                <td>
                                                    <span><i class="fa fa-inr "></i> <?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00 ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Tax</th>
                                                <td>
                                                    <span> <i class="fa fa-inr "></i> <?php echo !empty($order['tax_amount']) ? $order['tax_amount'] : 0.00 ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Value</th>
                                                <td>
                                                    <span> <i class="fa fa-inr "></i> <?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control ofc_state" name="state"
                                           value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">
                                    <input type="hidden" class="form-control user_state" name="state"
                                           value="<?php echo !empty($user['state']) ? $user['state'] : ''; ?>">
                                    <input type="hidden" class="form-control" name="order_id"
                                           value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Order No.</label>
                                            <div class="col-md-8">
                                              <span class="order_no">  <?php echo !empty($sequence['sequence']) ? $sequence['sequence'] : ''; ?></span>
                                                <input type="hidden" name="order_no" id="order_no" value="<?php echo !empty($sequence['sequence']) ? $sequence['sequence'] : ''; ?>"/><br/>
                                           <span class="order_no_status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Order Date <sup
                                                        class="text-danger">*</sup></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="order_date" name="order_date" placeholder="Order Date" readonly value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Expected Date <sup class="text-danger">*</sup></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="expected_date"
                                                       name="expected_date" placeholder="Expected Date" required
                                                       value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>">
                                                <input type="hidden" class="form-control" name="delivery_within" id="date_diff" placeholder="Delivery with in...."
                                                       value="<?php echo !empty($order['delivery_within']) ? $order['delivery_within'] : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <br/>
                            <table class="table table-bordered cart_table" id="cart">
                                <thead>
                                <tr>
                                    <th colspan="1" rowspan="2" class="text-center">S.No</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Image</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Name</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">HSN / SAC</th>
                                    <th colspan="1" rowspan="2" class="text-center">Qty</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Unit Price (Rs.)</th>
                                    <th colspan="1" rowspan="1" class="text-center w-20">Discount</th>
                                    <th colspan="1" rowspan="2" class="text-right w-10">Taxable Value</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Taxable Rate</th>
                                    <th colspan="3" rowspan="1" class="text-center w-10">Tax Values (Rs.)</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Total</th>
                                </tr>
                                <tr>
                                    <th class="discountType-header text-center">
                                        <label class="radio-inline"> <input type="radio" checked value="PERCENTAGE"
                                                                            class="discount_type" id="discount_rate"
                                                                            name="discount_type"> %</label>

                                        <label class="radio-inline"><input type="radio" class="discount_type" value=""
                                                                           id="discount_value" name="discount_type">Rs.</label>
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

                                        $unit_price = $cart_item['full_total'] / $cart_item['quantity'];
                                        $gst = $cart_item['gst'];
                                        $sub_total = $cart_item['sub_total'];
                                        $discount = $cart_item['discount'];
                                        $dis_cal = ($cart_item['full_total'] * $discount) / 100;

                                        $calc_amount = ($sub_total * $gst) / 100;
                                        $cgst = 0;
                                        $sgst = 0;
                                        $igst = 0;
                                        if ($_SESSION['STATE'] == 'KA') {
                                            $cgst = $calc_amount / 2;
                                            $sgst = $calc_amount / 2;
                                            $final_total_withGst = $sub_total + $calc_amount;
                                        } else {
                                            $igst = $calc_amount;
                                            $final_total_withGst = $sub_total + $calc_amount;
                                        }
                                        ?>

                                        <tr>
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
                                            <td class="text-center"><?php echo !empty($cart_item['hsn_code']) ? $cart_item['hsn_code'] : ''; ?></td>
                                            <td class="text-center"><input type="hidden" name="quantity[]" class="w-100 quantity" value="<?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>">
                                                <?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>
                                            </td>
                                            <td class="text-right"><input type="hidden" class="mrp_price" name="mrp_price[]" value=" <?php echo !empty($cart_item['mrp_price']) ? $cart_item['mrp_price'] : ''; ?>">
                                                <?php echo number_format($unit_price, 2) ?></td>
                                            <td class="text-right">
                                                <input type="hidden" class="input_discount" name="discount[]" value="<?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : ''; ?>">
                                                <input type="hidden" class="input_discount_val" name="" value="<?php echo !empty($dis_cal) ? $dis_cal : '' ?>">
                                                <span class="discount"> <?php echo !empty($cart_item['discount']) ? $cart_item['discount'] : '' ?></span>
                                            </td>
                                            <td class="text-right"><input type="hidden" class="input_amount" name="input_amount[]" value="<?php echo $cart_item['sub_total'] ?>">
                                                <span class="input_amount_text"><?php echo $cart_item['sub_total'] ?></span>
                                            </td>
                                            <td class="text-right"><input type="hidden" class="input_gst" name="gst[]" value="<?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?>">
                                                <span class="text_gst"> <?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?></span>
                                            </td>


                                            <td class="text-right"><input type="hidden" name="input_cgst[]"
                                                                          value="<?php echo $cgst; ?>">
                                                <span class="cgst"> <?php echo number_format($cgst, 2); ?></span>

                                            </td>
                                            <td class="text-right"><input type="hidden" name="input_sgst[]" value="<?php echo $sgst; ?>">
                                                <span class="sgst"><?php echo number_format($sgst, 2); ?></span>

                                            </td>
                                            <td class="text-right"><input type="hidden" name="input_igst[]" value="<?php echo $igst; ?>">
                                                <span class="igst"><?php echo number_format($igst, 2); ?></span></td>
                                            <td class="text-right"><input type="hidden" class="input_item_amount" name="sub_total[]" value="<?php echo !empty($final_total_withGst) ? $final_total_withGst : ''; ?>">
                                                <span class="item_amount"><?php echo !empty($final_total_withGst) ? number_format($final_total_withGst, 2) : '0.00'; ?></span>
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
                                                    class="total pull-right"><?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?></span></span>
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
                            <?php
                        }
                        ?>

                    </form>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <?php
                        if (!empty($order) && $order['admin_visible'] == 0) {
                            ?>
                            <button form="frm" type="submit" class="btn btn-success">Send to Admin</button>
                            <?php
                        } else {
                            ?>
                            <button form="frm" type="submit" class="btn btn-success btn-submit">Save</button>
                            <?php
                        }
                        ?>
                        <a href="<?php echo base_url() ?>dealer/orders/" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </section>


    </div>
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
                    $('#order_no').css('color','red');
                    $('span.order_no').css('color','red');
                    $('.order_no_status').html('Order No already Exists..!<br/> Please Contact Admin,..!').css('color','red');
                    $('.btn-submit').attr('disabled','disabled');
                }
            }
        })
        var amount;
        var total_amount = 0;
        $(".cart_table tbody tr").each(function () {
            amount = $(this).find('.input_amount').text();
            total_amount += parseFloat(amount);
            checkDiscounts();
        });

        function checkDiscounts() {
            var amount, discount, disc_type;
            var with_discount_amount = 0;
            var discount_amount = 0;
            var final_amount = 0;
            var total_amount = 0;
            $(".cart_table tbody tr").each(function () {
                amount = parseFloat($(this).find('.input_amount').val());
                discount = parseFloat($(this).find('.input_discount_val').val());
                with_discount_amount = amount - discount;
                with_discount_amount = with_discount_amount.toFixed(2);
                $(this).find('.input_with_discount_amount').val(with_discount_amount);
                discount_amount += parseFloat(discount);
                final_amount += parseFloat(with_discount_amount);
                total_amount += parseFloat(amount);
                // var isChecked = $('.discount_type').attr('checked') ? ;


                // console.log(isChecked);
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
            var amnt, tax, quantity, unit_price, discount, tax_amt, total_tax, cgst_amt, sgst_amt, igst_amt, user_state,
                ofc_state;
            var tax_amount = 0;
            $(".cart_table tbody tr").each(function () {
                tax = $(this).find('.input_gst').val();
                amnt = $(this).find('.input_amount').val();
                //  quantity = $(this).find('.quantity').val();
                //  unit_price = $(this).find('.mrp_price').val();
                tax_amt = (amnt * tax) / 100;
                // total_tax = tax_amt * quantity;
                total_tax = tax_amt.toFixed(2);
                $(this).find('.input_tax_amount').val(total_tax);
                tax_amount += parseFloat(total_tax);
            });
            tax_amount = isNaN(tax_amount) ? 0 : tax_amount;
            tax_amount = tax_amount.toFixed(2);
            cgst_amt = parseFloat(tax_amount / 2);
            cgst_amt = cgst_amt.toFixed(3);
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
               discount=discount.toFixed(2);
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
