<link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap-datepicker.min.css">
<style>

    .item-list {
        float: left;
        list-style: none;
        margin-top: 0px;
        padding: 0;
        width: auto;
        min-width: 135px;
        z-index: 6666;
        border: 1px solid #dddddd;
        position: absolute
    }

    .item-list li {
        padding: 10px 10px 0;
        background: #f0f0f0;
        border-bottom: #bbb9b9 1px solid;
    }

    .item-list li:hover {
        background: #ece3d2;
        cursor: pointer;
    }

    .item_name {
        padding: 10px;
        border: #a8d4b1 1px solid;
        border-radius: 4px;
    }

    table th {
        vertical-align: middle !important;

    }

    thead {
        background-color: #f3f4f6 !important
    }
</style>
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
                    <a href="<?php echo base_url(); ?>admin/create-order/" class="btn btn-sm btn-danger"><i
                            class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form method="post" enctype="multipart/form-data" id="frm">
                    <div class="row">
                        <div class="col-md-12 ">
                            <input type="hidden" class="form-control ofc_state" name="state"
                                   value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">
                            <input type="hidden" class="form-control user_state" name="state"
                                   value="">
                            <input type="hidden" class="form-control" name="order_id"
                                   value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Select Customer<sup
                                                class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <select class="form-control select2 customer_id" name="user_id"
                                                    id="customer_id">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Order Date <sup
                                                class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="order_date"
                                                   name="order_date"
                                                   placeholder="Order Date"
                                                   value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Expected Date <sup
                                                class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="expected_date"
                                                   name="expected_date" placeholder="Expected Date" required
                                                   value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Delivery Within</label>
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
                    <?php
                    if (!empty($order)) {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered cart_table" id="cart">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>HSN Code</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Discount(%)</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($order['order_items'])) {
                                    $i = 1;
                                    foreach ($order['order_items'] as $cart_item) {
                                        ?>
                                        <tr>
                                            <input type="hidden" name="item_id[]"
                                                   value="<?php echo !empty($cart_item['product_id']) ? $cart_item['product_id'] : ''; ?>">
                                            <input type="hidden" class="gst" name="gst[]"
                                                   value="<?php echo !empty($cart_item['gst']) ? $cart_item['gst'] : ''; ?>">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                                            <td><?php echo !empty($cart_item['mfr_no']) ? $cart_item['mfr_no'] : '123456'; ?></td>
                                            <td><input type="hidden" name="quantity[]" class="w-100 quantity"
                                                       value="<?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>">
                                                <?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>
                                            </td>
                                            <td><input type="hidden" class="mrp_price" name="unit_price[]"
                                                       value="<?php echo !empty($cart_item['unit_price']) ? $cart_item['unit_price'] : ''; ?>">
                                                <?php echo !empty($cart_item['unit_price']) ? $cart_item['unit_price'] : ''; ?>
                                            </td>
                                            <td><input type="hidden" class="discount_amount" name="discount_amount[]"
                                                       value="<?php echo !empty($cart_item['discount_amount']) ? $cart_item['discount_amount'] : ''; ?>">
                                                <?php echo !empty($cart_item['discount_amount']) ? $cart_item['discount_amount'] : ''; ?>
                                            </td>
                                            <td><input type="hidden" class="input_amount" name="sub_total[]"
                                                       value="<?php echo !empty($cart_item['total_amount']) ? $cart_item['total_amount'] : ''; ?>">
                                                <?php echo !empty($cart_item['total_amount']) ? $cart_item['total_amount'] : ''; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered cart_table" id="itemTable">
                                <thead>
                                <tr>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Item Name</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">HSN / SAC</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Qty</th>
                                    <th colspan="1" rowspan="2" class="text-center w-10">Unit Price (Rs.)</th>
                                    <th colspan="1" rowspan="1" class="text-center w-10">Discount</th>
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
                                <tr id="row_1">
                                    <td class="red">
                                        <input type="hidden" class="form-control ofc_state" name="state"
                                               value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">
                                        <input type="hidden" class="form-control input_item_id" name="item_id[]"
                                               value="">

                                        <input type="text" name="item_name[]" id="item_1"
                                               class="form-control item_name input_item_name" placeholder="Item Name">
                                        <div class="suggesstion-box"></div>
                                    </td>
                                    <td>
                                        <input type="text" name="hsn_code[]"
                                               class="form-control input_hsn_code text-center"
                                               placeholder="HSN CODE"></td>
                                    <td><input type="text" name="quantity[]" class="form-control qty text-center"
                                               placeholder="Quantity"
                                               onkeypress="return isNumber(event)"></td>
                                    <td>
                                        <input type="text" name="mrp_price[]"
                                               class="form-control input_mrp_price text-center"
                                               placeholder="Unit Price"></td>

                                    <td>
                                        <input type="text" name="discount[]"
                                               class="form-control discount_value text-center" value="0"
                                               placeholder="Dcnt in %">


                                        <input type="hidden" name="" class="form-control input_discount_value"
                                               placeholder="Dcnt in %">

                                    </td>
                                    <td>
                                        <span class="amount_aft_discount pull-right"></span>
                                        <input type="hidden" class="form-control input_amount_aft_discount" value="">
                                    </td>
                                    <td>
                                        <input type="hidden" name="input_gst[]" class="form-control input_gst"
                                               value="<?php echo !empty($order['gst']) ? $order['gst'] : '' ?>"
                                               placeholder="gst">
                                        <span class="gst_text"><?php echo !empty($order['gst']) ? $order['gst'] : '' ?></span>
                                    </td>
                                    <td>
                                        <span class="cgst_text pull-right">0.00</span>
                                        <input type="hidden" name="input_cgst[]" class="form-control input_cgst"
                                               placeholder="CGST">
                                    </td>
                                    <td>
                                        <span class="sgst_text pull-right">0.00</span>
                                        <input type="hidden" name="input_sgst[]" class="form-control input_sgst"
                                               placeholder="SGST">
                                    </td>
                                    <td>
                                        <span class="igst_text pull-right">0.00</span>
                                        <input type="hidden" name="input_igst[]" class="form-control input_igst"
                                               placeholder="IGST">
                                    </td>
                                    <td class="text-right">
                                        <input type="hidden" name="indvidual_tax_amount[]" value=""
                                               class="input_tax_amount">
                                        <input type="hidden" class="input_item_amount" name="sub_total[]" value="">
                                        <span class="item_amount">0.00</span>
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="2"><a href="javascript:void(0)" class="" id="addRow"><i
                                                class="fa fa-plus"></i> Add newline</a></td>
                                    <td class="text-right" colspan="2">Total Inv. Val</td>
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

                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea class="form-control " name="remarks" rows="10"
                                              placeholder="Enter remarks"><?php echo !empty($order['remarks']) ? $order['remarks'] : '' ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <table class="table ">
                                    <input type="hidden" name="text_amount" class="input_text_amount"
                                           value="<?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00 ?>"/>
                                    <input type="hidden" name="" class="input_total"
                                           value="<?php echo !empty($order['sub_abmount']) ? $order['sub_abmount'] : 0.00 ?>"/>
                                    <input type="hidden" name="discount_total" class="input_discount_total"
                                           value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00 ?>"/>
                                    <input type="hidden" name="sub_amount" class="input_net_total"
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


            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button form="frm" type="submit" class="btn btn-success">Submit</button>
                    <a href="<?php echo base_url() ?>admin/create-order/" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Item</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" id="item_form">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Item Name
                        </label>
                        <div class="col-md-6">
                            <input type="hidden" name="id" id="item_row_id" class="form-control" required>
                            <input type="text" name="item_name" id="item_name_modal" class="form-control"
                                   placeholder="Enter Item Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            HSN Code
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="hsn_code" class="form-control" placeholder="Enter HSN Code"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Unit Pirce
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="mrp_price" class="form-control" placeholder="Enter Unit Price"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            GST
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="gst" class="form-control gst" placeholder="Enter GST %" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            Description
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="description" class="form-control gst" placeholder="Description"
                                   required>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success submit" id="submitButton" form="item_form">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/lib/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap-datepicker.min.js"></script>
<script>

</script>
<script>
    function itemName() {
        $(document).on('click', '.hi', function () {
            var val = $(this).html();
            var rowId1 = $(this).closest('tr').attr('id');
            $('#' + rowId1).children('td').find(".item_name").val(val);
            $('#' + rowId1).children('td').find(".suggesstion-box").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>" + "admin/get_item_deatils/?item_name=" + val,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('#' + rowId1).children('td').find(".input_hsn_code").val(data.hsn_code);
                    $('#' + rowId1).children('td').find(".input_item_name").val(data.item_name);
                    $('#' + rowId1).children('td').find(".input_mrp_price").val(data.mrp_price);
                    $('#' + rowId1).children('td').find(".input_gst").val(data.gst);
                    $('#' + rowId1).children('td').find(".gst_text").text(data.gst);
                }
            });
        });
    }

    /*function itemName(val) {


        var rowId1 =  $(this).closest('td').attr('class');
        console.log(rowId1);
       // gopi.find('.item_name').val(val);
      //  gopi.find('.suggesstion-box').hide();
        $.ajax({
            type: "GET",
            url: "" + "admin/get_item_deatils/?item_name=" + val,
            dataType: 'json',
            cache: false,
            success: function (data) {
                $('#' + rowId1).children('td').find(".input_hsn_code").val(data.hsn_code);
                 $('#' + rowId1).children('td').find(".input_item_name").val(data.item_name);
                 $('#' + rowId1).children('td').find(".input_mrp_price").val(data.mrp_price);
                 $('#' + rowId1).children('td').find(".gst").val(data.gst);
            }
        });
    }*/
    $(document).ready(function () {
        $('#item_form').on('submit', function (e) {
            e.preventDefault();
            $("#submitButton").prop('disabled', 'disabled');
            var th = $(this);
            var formData = th.serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "admin/add_item/",
                data: formData,
                dataType: 'json',
                cache: false,
                success: function (data) {


                    var rowId = $('#item_row_id').val();
                    $('#' + rowId).children('td').find(".input_hsn_code").val(data.hsn_code);
                    $('#' + rowId).children('td').find(".input_item_name").val(data.item_name);
                    $('#' + rowId).children('td').find(".input_mrp_price ").val(data.mrp_price);
                    $('#' + rowId).children('td').find(".input_gst ").val(data.gst);
                    $('#myModal').modal('hide');
                    document.getElementById('item_form').reset();

                }
            });
        });
        var i = 1;
        $("#addRow").on('click', function (e) {
            e.preventDefault();

            i++;
            var row = '<tr id="row_' + i + '">' +
                '<td>' +
                '<input type="hidden" class="form-control ofc_state" name="state" value="<?php echo !empty($site_info['state']) ? $site_info['state'] : ''; ?>">' +
                '<input type="hidden" class="form-control input_item_id" name="item_id[]"value="">' +
                '<input type="text" name="item_name[]" id="item_1" class="form-control item_name input_item_name" placeholder="Item Name">' +
                '<div class="suggesstion-box"></div>' +
                '</td>' +
                '<td>' +
                '<input type="text" name="hsn_code[]" class="form-control input_hsn_code text-center" placeholder="HSN CODE"></td>' +
                '<td><input type="text" name="quantity[]" class="form-control qty text-center" placeholder="Quantity" onkeypress="return isNumber(event)"></td>' +
                '<td>' +
                '<input type="text" name="mrp_price[]" class="form-control input_mrp_price text-center" placeholder="Unit Price"></td>' +
                '<td>' +
                '<input type="text" name="discount[]" class="form-control discount_value text-center" value="0" placeholder="Dcnt in %">' +
                '<input type="hidden" name="" class="form-control input_discount_value" placeholder="Dcnt in %">' +
                '</td>' +
                '<td>' +
                '<span class="amount_aft_discount pull-right"></span>' +
                '<input type="hidden" class="form-control input_amount_aft_discount" value="">' +
                '</td>' +
                '<td>' +
                '<input type="hidden" name="input_gst[]" class="form-control input_gst" value="" placeholder="gst">' +
                '<span class="gst_text">0.00</span>' +
                '</td>' +
                '<td>' +
                '<span class="cgst_text pull-right">0.00</span>' +
                '<input type="hidden" name="input_cgst[]" class="form-control input_cgst" placeholder="CGST">' +
                '</td>' +
                '<td>' +
                '<span class="sgst_text pull-right">0.00</span>' +
                '<input type="hidden" name="input_sgst[]" class="form-control input_sgst" placeholder="SGST">' +
                '</td>' +
                '<td>' +
                '<span class="igst_text pull-right">0.00</span>' +
                '<input type="hidden" name="input_igst[]" class="form-control input_igst" placeholder="IGST">' +
                '</td>' +
                '<td>' +
                '<span class=" pull-right amount_plus_tax">0.00</span>' +
                '<input type="hidden" name="total[]" class="form-control input_amount_plus_tax" placeholder="Total">' +
                '</td>' +
                '<td><span class="btn btn-xs btn-danger delete_row"><i class="fa fa-trash"></i></span></td>' +
                '</tr>';
            $("table#itemTable tbody").append(row);
        });
        $("body").on("click", ".delete_row", function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            checkDiscounts();
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
        $("body").on("change", ".qty,.discount_value", function (e) {
            e.preventDefault();
            var th, unit_price, qty, amount, discount, discount_type, input_gst, tax, total_tax, input_cgst, input_sgst,
                client_state, default_state, amnt_aft_discount, item_amount;
            th = $(this);
            unit_price = th.closest('tr').find('.input_mrp_price').val();
            qty = th.closest('tr').find('.qty').val();
            discount = th.closest('tr').find('.discount_value').val();
            discount_type = $('.discount_type').val();
            // If Quantity Changed
            amount = parseFloat(unit_price) * parseInt(qty);
            amount = amount.toFixed(2);
            if (discount_type == "PERCENTAGE") {
                discount = (parseFloat(discount) * parseFloat(amount)) / 100;
            } else {
                discount = parseFloat(discount);
            }
            discount = discount.toFixed(2);
            th.closest('tr').find('.input_discount_value').val(discount);

            //  amnt_aft_discount = amount - discount;
            //  amnt_aft_discount = isNaN(amnt_aft_discount) ? 0.00 : amnt_aft_discount;
            //  amnt_aft_discount = amnt_aft_discount.toFixed(2);
            th.closest('tr').find('.amount_aft_discount').text(amount);
            th.closest('tr').find('.input_amount_aft_discount').val(amount);
            th.closest('tr').find('.item_amount').text(amount);
            th.closest('tr').find('.input_item_amount').val(amount);
            $('.total').text(amount);
            $('.input_total').val(amount);
            $('.final_total').text(amount);
            $('.input_final_total').val(amount);
            checkDiscounts();
        });
        var total_amount = 0;
        var final_amount =0;
        function checkDiscounts() {
            var with_discount_amount, amount, discount, cal_discount;
            var discount_amount = 0;
            var final_amount = 0;
            var total_amount = 0;
            $(".cart_table tbody tr").each(function () {
                amount = parseFloat($(this).find('.input_mrp_price').val()) * parseFloat($(this).find('.qty').val());
                cal_discount = parseFloat($(this).find('.discount_value').val());
                discount = (amount * cal_discount) / 100;
                with_discount_amount = amount - discount;
                with_discount_amount = with_discount_amount.toFixed(2);
                $(this).find('.input_with_discount_amount').val(with_discount_amount);

                discount_amount += parseFloat(discount);

                final_amount += parseFloat(with_discount_amount);
                total_amount += parseFloat(amount);
                $(this).find('.amount_aft_discount').text(final_amount);
                $(this).find('.input_amount_aft_discount').val(final_amount);
                $(this).find('.item_amount').text(final_amount);
                $(this).find('.input_item_amount').val(final_amount);
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

            $('.total').text(final_amount);
            $('.input_total').val(final_amount);
            // checkTaxes();
            $('.final_total').text(final_amount);
            $('.input_final_total').val(final_amount);
            $('.input_text_amount').val(convertNumberToWords($('.input_final_total').val()) + 'Rupees Only');
        }


        function checkTaxes() {
            var tax, quantity,aft_disc, unit_price, tax_amt, total_tax, cgst_amt, sgst_amt, igst_amt, user_state, ofc_state,aft_tax;
            var tax_amount = 0;
            $(".cart_table tbody tr").each(function () {
                tax = $(this).find('.input_gst').val();
                quantity = $(this).find('.qty').val();
                unit_price = $(this).find('.input_mrp_price ').val();
                aft_disc = $(this).find('.input_amount_aft_discount ').val();
                // tax_amt = (tax * aft_disc) / 100;
                total_tax = (tax * aft_disc)/100;
                total_tax = total_tax.toFixed(2);
                cgst_amt = parseFloat(total_tax / 2);
                cgst_amt = cgst_amt.toFixed(2);
                sgst_amt = cgst_amt;
                user_state = $('.user_state').val();
                ofc_state = $('.ofc_state').val();
                if (user_state == ofc_state) {
                    $(this).find('.igst_text').text('0.00');
                    $(this).find('.input_igst').val('0');
                    $(this).find('.cgst_text').text(cgst_amt);
                    $(this).find('.input_cgst').val(cgst_amt);
                    $(this).find('.sgst_text').text(sgst_amt);
                    $(this).find('.input_sgst').val(sgst_amt);
                } else {
                    $(this).find('.input_cgst, .input_sgst').val('0');
                    $(this).find('.cgst_text, .sgst_text').text('0.00');
                    $(this).find('.igst_text').text(total_tax);
                    $(this).find('.input_igst').val(total_tax);
                }
                $(this).find('.input_tax_amount').val(total_tax);
                tax_amount += parseFloat(total_tax);
                aft_disc += parseFloat(aft_disc);
                aft_tax = parseFloat(aft_disc) + parseFloat(tax_amount);
                $(this).find('.item_amount').text(aft_tax);
                $(this).find('.input_item_amount').val(aft_tax);
            });
            $('.total').html(aft_disc.toFixed(2));
            $('.input_total').val(aft_disc);
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
            var net_total, tax_total, final_total = 0;
            net_total = $(".input_total").val();
            tax_total = $(".input_tax_total").val();
            final_total = parseFloat(net_total) + parseFloat(tax_total);
            final_total = isNaN(final_total) ? 0.00 : final_total;
            final_total = final_total.toFixed(2);
            $('.final_total').text(final_total);
            $('.input_final_total').val(final_total);
            $('.input_text_amount').val(convertNumberToWords($('.input_final_total').val()) + 'Rupees Only');

        }


        $('body').on('keyup', '.item_name', function (e) {
            e.preventDefault();
            var item_name = $(this).closest('tr').find('.item_name').val();
            var th = $(this).closest('tr');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url() ?>" + "admin/getItemMasterList",
                data: {item_name: item_name},
                beforeSend: function () {
                    $("#item_name").css("background", "#FFF url(../../data/LoaderIcon.gif) no-repeat 165px");
                },
                success: function (data) {
                    th.find('.suggesstion-box').show();
                    th.find('.suggesstion-box').html(data);
                    th.find('.item_name').css("background", "#FFF");
                }
            });
            return false;
        });
        $('body').on('click', '.modal-toggle', function (e) {
            e.preventDefault();
            $("#submitButton").prop('disabled', false);
            var id = $(this).closest('tr').attr('id');
            //var item_name = $('#'+id+'>td .item_name').val();
            var item_name = $('#' + id).find('.item_name').val();
            $('#item_name_modal').val(item_name);
            $('#item_row_id').val(id);
            $('#myModal').modal('show');
            $(".suggesstion-box").hide();
        });

    });


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
<script>


</script>
