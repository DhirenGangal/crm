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
                <form method="post" enctype="multipart/form-data" id="frm">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control"  name="order_id" value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3 ">Order No</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control"  name="order_no"
                                               placeholder="Order no"
                                               value="<?php echo !empty($order['order_no']) ? $order['order_no'] : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Dealer Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control"  name="dealer_name"
                                               placeholder="Dealer Name"
                                               value="<?php echo !empty($order['dealer_name']) ? $order['dealer_name'] : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Order Date</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="order_date" name="order_date"
                                               placeholder="Order Date"
                                               value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Expected Date</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="expected_date"
                                               name="expected_date" placeholder="Expected Date"
                                               value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Delivery Within</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="delivery_within"
                                               id="date_diff" placeholder="Delivery with in...."
                                               value="<?php echo !empty($order['delivery_within']) ? $order['delivery_within'] : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <br/>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mac Id</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="mac_id"  placeholder="Mac Id" maxlength="12" value="<?php echo !empty($order['mac_id']) ? $order['mac_id'] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="order_status">
                                            <option value="">Select Status</option>
                                            <option value="DELIVERED">Delivered</option>
                                            <option value="PROGRESS">In Progress</option>
                                            <option value="PENDING">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered product_table" id="dynamic_field">
                            <thead>
                            <tr>
                                <td>S.No</td>
                                <th>Main Product</th>
                                <th>Sub product</th>
                                <th>Child Product</th>
                                <th>Unit Price</th>
                                <th>Quautity</th>
                                <th>Discount (%)</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($order['order_items'])){
                                foreach ($order['order_items'] as $order_item){
                                    ?>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select class="form-control main_product" name="" readonly>
                                                <option value="">---Select Main Product--</option>
                                                <?php if (!empty($main_products)) {
                                                    foreach ($main_products as $k => $v) {
                                                        ?>
                                                        <option value="<?php echo $k ?>"  <?php echo !empty($order_item['main_product_id']) && ($order_item['main_product_id'] == $k) ? 'selected=selected' : ''?>><?php echo $v ?></option>
                                                        <?php
                                                    }
                                                } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control sproduct_id" readonly>
                                                <option value="">---Select Sub Product--</option>
                                                <?php if (!empty($sub_products)) {
                                                    foreach ($sub_products as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key ?>" <?php echo !empty($order_item['sub_product_id']) && ($order_item['sub_product_id'] == $key) ? 'selected=selected' : ''?>><?php echo $value ?></option>
                                                        <?php
                                                    }
                                                } ?>
                                            </select>
                                        </td>
                                        <td>

                                            <select class="form-control child_product_id" name="product_id[]" readonly>
                                                <option value="">---Select Child Product--</option>
                                                <?php if (!empty($child_products)) {
                                                    foreach ($child_products as $key => $value) {
                                                        ?>
                                                        <option value="<?php echo $key ?>" <?php echo !empty($order_item['child_product_id']) && ($order_item['child_product_id'] == $key) ? 'selected=selected' : ''?>><?php echo $value ?></option>
                                                        <?php
                                                    }
                                                } ?>
                                            </select>
                                        </td>
                                        <td><input type="text" readonly class="form-control" name="dealer_price[]" value="<?php echo !empty($order_item['unit_price'])? $order_item['unit_price'] : '' ?>"/></td>
                                        <td><input type="text" readonly class="form-control qty" name="quantity[]" value="<?php echo !empty($order_item['quantity'])? $order_item['quantity'] : '' ?>"/></td>
                                        <td><input type="text" readonly class="form-control " name="discount_amount[]" value="<?php echo !empty($order_item['discount_amount'])? $order_item['discount_amount'] : '' ?>"/></td>
                                        <td><input type="text" readonly class="form-control input_amount" name="total_amount[]" value="<?php echo !empty($order_item['total_amount'])? $order_item['total_amount'] : '' ?>"/></td>
                                        <td class="hide">
                                            <button type="button" class="btn btn-sm btn-success add" id="add"><i
                                                    class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }

                            ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-center"><b>Payment Information</b></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>
                                            TOTAL AMOUNT
                                        </th>
                                        <td>
                                            <span><i class="fa fa-inr"></i> <span class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                            <input type="hidden" name="final_total" class="input_final_total" value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button form="frm" type="submit" class="btn btn-success">Submit</button>
                    <a href="<?php echo base_url() ?>admin/orders/" class="btn btn-danger">Cancel</a>

                </div>
            </div>
        </div>
    </section>

</div>
<script src="<?php echo base_url() ?>assets/lib/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap-datepicker.min.js"></script>
<script>
    $("body").on("change", ".qty,.discount_value,.discount_type", function () {
        var th, unit_price, qty, amount, discount, discount_type;
        th = $(this);
        unit_price = th.closest('tr').find('.mrp_price').val();
        qty = th.closest('tr').find('.qty').val();
        discount = th.closest('tr').find('.discount_value').val();
        // If Quantity Changed
        amount = parseFloat(unit_price) * parseInt(qty);
        amount = amount.toFixed(2);
        th.closest('tr').find('.amount').text(amount);
        th.closest('tr').find('.input_amount').val(amount);
        discount = (parseFloat(discount) * parseFloat(amount)) / 100;
        discount = discount.toFixed(2);
        th.closest('tr').find('.discount_value').val(discount);

        checkDiscounts();

    });

    function checkDiscounts() {
        var with_discount_amount, amount, discount;
        var discount_amount = 0;
        var final_amount = 0;
        var total_amount = 0;
        $(".product_table tbody tr").each(function () {
            amount = parseFloat($(this).find('.input_amount').val());
            discount = parseFloat($(this).find('.discount_value').val());
            with_discount_amount = amount - discount;
            with_discount_amount = with_discount_amount.toFixed(2);
            $(this).find('.input_with_discount_amount').val(with_discount_amount);
            discount_amount += parseFloat(discount);
            final_amount += parseFloat(with_discount_amount);
            total_amount += parseFloat(amount);
        });
        discount_amount = discount_amount.toFixed(2);
        $('.discount_total').text(discount_amount);
        $('.input_discount_total').val(discount_amount);
        final_amount = final_amount.toFixed(2);
        $('.net_total').text(final_amount);
        $('.input_net_total').val(final_amount);
        total_amount = total_amount.toFixed(2);
        $('.total').text(total_amount);
        $('.input_total').val(total_amount);
        // checkTaxes();
    }

    function checkTaxes() {
        var with_discount_amount, tax, tax_amt, cgst_amt, sgst_amt, igst_amt, client_state, selected_state;
        var tax_amount = 0;
        $("#itemTable tbody tr").each(function () {
            with_discount_amount = parseFloat($(this).find('.input_with_discount_amount').val());
            tax = parseFloat($(this).find('.input_tax').val());
            tax_amt = (with_discount_amount * tax) / 100;
            tax_amt = tax_amt.toFixed(2);
            $(this).find('.input_tax_amount').val(tax_amt);
            tax_amount += parseFloat(tax_amt);
        });
        tax_amount = isNaN(tax_amount) ? 0 : tax_amount;
        tax_amount = tax_amount.toFixed(2);
        cgst_amt = parseFloat(tax_amount / 2);
        cgst_amt = cgst_amt.toFixed(3);
        sgst_amt = cgst_amt;

        $('.input_tax_total').val(tax_amount);
        $('.tax_total').text(tax_amount);

        client_state = $('.client_state').val();
        selected_state = $('.state').val();
        console.log('Client state is ' + client_state);
        console.log('Selected State is ' + selected_state);
        if (client_state == selected_state) {
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
        net_total = $(".input_net_total").val();
        tax_total = $(".input_tax_total").val();
        final_total = parseFloat(net_total) + parseFloat(tax_total);
        final_total = final_total.toFixed(2);
        $('.final_total').text(final_total);
        $('.input_final_total').val(final_total);
    }
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
        });

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

    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            var row = '<tr>' +
                '<td>' + i + '</td>' +
                '<td>' +
                '<select class="form-control main_product" name="main_product">' +
                '<option value="">---Select Main Product--</option>' +
                <?php if (!empty($main_products)) {
                foreach ($main_products as $k => $v) {
                ?>
                '<option value="<?php echo $k ?>"><?php echo $v ?></option>' +
                <?php
                }
                } ?>
                '</select>' +
                '</td>' +
                '<td>' +
                '<select class="form-control sproduct_id" name="sproduct_id">' +
                '<option value="">---Select Sub Product--</option>' +
                <?php if (!empty($sub_products)) {
                foreach ($sub_products as $key => $value) {
                ?>
                '<option value="<?php echo $key ?>"><?php echo $value ?></option>' +
                <?php
                }
                } ?>
                '</select>' +
                '</td>' +
                '<td>' +
                '<select class="form-control child_product_id" name="product_id[]">' +
                '<option value="">---Select Child Product--</option>' +
                <?php if (!empty($child_products)) {
                foreach ($child_products as $key => $value) {
                ?>
                '<option value="<?php echo $key ?>"><?php echo $value ?></option>' +
                <?php
                }
                } ?>
                '</select>' +
                '</td>' +
                '<td><input type="text" class="form-control mrp_price" name="mrp_price[]" /></td>' +
                '<td><input type="text" class="form-control qty" name="quantity[]" /></td>' +
                '<td><input type="text" class="form-control input_amount" name="total_price[]" /></td>' +
                '<td><span class="btn btn-sm btn-danger delete_row"><i class="fa fa-trash"></i></span></td>' +
                '</td>' +


                '</tr>';
            $("table#dynamic_field tbody").append(row);

        });
        $("body").on("click", ".delete_row", function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
    });
</script>
<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url();?>";

    $(document).ready(function () {

        // Main Product change
        $(document).on('change', '.main_product', function () {
            var main_product_id = $(this).val();

            // AJAX request
            $.ajax({
                url: "<?php echo base_url() ?>" + "dealer/fetch_sub_products/?main_product_id=" + main_product_id,
                method: 'post',
                data: {main_product_id: main_product_id},
                dataType: 'json',
                success: function (response) {

                    // Remove options
                    $('.sproduct_id').find('option').not(':first').remove();
                    $('.child_product_id').find('option').not(':first').remove();

                    // Add options
                    $.each(response, function (key, value) {
                        $('.sproduct_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        });

        // Sub Product change
        $(document).on('change', '.sproduct_id', function () {
            var sub_product_id = $(this).val();

            // AJAX request
            $.ajax({
                url: "<?php echo base_url() ?>" + "dealer/fetch_child_products/?sub_product_id=" + sub_product_id,
                method: 'post',
                data: {sub_product_id: sub_product_id},
                dataType: 'json',
                success: function (response) {

                    // Remove options
                    $('.child_product_id').find('option').not(':first').remove();

                    // Add options
                    $.each(response, function (key, value) {
                        $('.child_product_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        });
        $(document).on("change", ".child_product_id", function () {
            var product_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "dealer/fetch_product_price/?product_id=" + product_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('.mrp_price').val(data.mrp_price);
                }
            });

        })

    });
</script>
<!--<script>
    $(document).on("change", ".main_product", function () {
        var main_product_id = $(this).val();
        if ((main_product_id == "") || (main_product_id == null)) {
            $(this).closest('td').find('.sproduct_id').empty();
        }
        else {
            $(this).closest('td').find('.sproduct_id').empty();
            $.ajax({
                type: 'POST',
                url: "<?php /*echo base_url() */ ?>" + "dealer/fetch_sub_products/?main_product_id=" + main_product_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('.sproduct_id').append($("<option></option>").attr("value", "").text("-- Select Sub Product --"));
                    $.each(data, function (key, value) {
                        $('.sproduct_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        }
    });

    $(document).on("change", ".sproduct_id", function () {
        var sub_product_id = $(this).val();
        if ((sub_product_id == "") || (sub_product_id == null)) {
            $(this).closest('td').find('.child_product_id').empty();
        }
        else {
            $(this).closest('td').find('.child_product_id').empty();
            $.ajax({
                type: 'POST',
                url: "<?php /*echo base_url() */ ?>" + "dealer/fetch_child_products/?sub_product_id=" + sub_product_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('.child_product_id').append($("<option></option>").attr("value", "").text("-- Select Child Sub Product --"));
                    $.each(data, function (key, value) {
                        $('.child_product_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        }
    });
    $(document).on("change", ".child_product_id", function () {
        var product_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "<?php /*echo base_url() */ ?>" + "dealer/fetch_product_price/?product_id=" + product_id,
            dataType: 'json',
            cache: false,
            success: function (data) {
                $(document).find('.mrp_price').val(data.mrp_price);
            }
        });

    });

</script>-->

