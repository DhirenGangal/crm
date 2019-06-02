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
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" class="form-control"  name="order_id" value="<?php echo !empty($order['order_id']) ? $order['order_id'] : ''; ?>">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Order Date <sup class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="order_date" name="order_date" required
                                                   placeholder="Order Date"
                                                   value="<?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ''; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Expected Date <sup class="text-danger">*</sup></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="expected_date" required
                                                   name="expected_date" placeholder="Expected Date"
                                                   value="<?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Delivery Within </label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="delivery_within"
                                                   id="date_diff" placeholder="Delivery with in...."
                                                   value="<?php echo !empty($order['delivery_within']) ? $order['delivery_within'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <br/>
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
                                $i=1;
                                foreach ($order['order_items'] as $order_item){
                                    ?>
                                    <tr>
                                        <input type="hidden" name="order_item_id[]" value="<?php echo !empty($order_item['order_item_id']) ? $order_item['order_item_id'] : ''; ?>"/>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <select class="form-control main_product" name="">
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
                                            <select class="form-control sproduct_id">
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
                                            <input type="hidden" class="p_name" name="product_name[]" value="<?php echo !empty($order_item['product_name']) ? $order_item['product_name'] : ''; ?>"/>
                                            <select class="form-control child_product_id" name="product_id[]">
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
                                        <td><input type="text" class="form-control dealer_price" name="dealer_price[]" value="<?php echo !empty($order_item['unit_price'])? $order_item['unit_price'] : '' ?>"/></td>
                                        <td><input type="text" class="form-control qty" name="quantity[]" value="<?php echo !empty($order_item['quantity'])? $order_item['quantity'] : '' ?>"/></td>
                                        <td><input type="text" class="form-control discount_value" name="discount_amount[]" value="<?php echo !empty($order_item['discount_amount'])? $order_item['discount_amount'] : '' ?>" placeholder="Discount(%)"/></td>
                                        <td><input type="text" class="form-control input_amount" name="item_amount[]" value="<?php echo !empty($order_item['total_amount'])? $order_item['total_amount'] : '' ?>"/></td>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }else{
                                ?>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select class="form-control main_product" name="">
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
                                        <select class="form-control sproduct_id">
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
                                        <input type="hidden" class="p_name" name="product_name[]" value="<?php echo !empty($order_item['product_name']) ? $order_item['product_name'] : ''; ?>"/>
                                        <select class="form-control child_product_id" name="product_id[]">
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
                                    <td><input type="text" class="form-control dealer_price" name="dealer_price[]" value="<?php echo !empty($order_item['unit_price'])? $order_item['unit_price'] : '' ?>" placeholder="Unit Price" readonly/></td>
                                    <td><input type="text" class="form-control qty" name="quantity[]" value="<?php echo !empty($order_item['quantity'])? $order_item['quantity'] : '' ?>" placeholder="Quantity (1,2,..)"/></td>
                                    <td><input type="text" class="form-control discount_value" name="discount_amount[]" value="<?php echo !empty($order_item['discount'])? $order_item['discount'] : '' ?>" placeholder="Discount (%)"/></td>
                                    <td><input type="text" class="form-control input_amount" name="item_amount[]" value="<?php echo !empty($order_item['total_amount'])? $order_item['total_amount'] : '' ?>" placeholder="Product Price" readonly/></td>
                                    <td class="">
                                        <button type="button" class="btn btn-sm btn-success add" id="add"><i
                                                class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php
                            }

                            ?>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remarks" rows="5"
                                                  placeholder="Enter remarks"><?php echo !empty($order['remarks'])? $order['remarks'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <table class="table table-bordered">
                                        <h4 class="text-center"><b>Payment Information</b></h4>
                                        <tbody>
                                        <tr>
                                            <th>TOTAL AMOUNT</th>
                                            <td>
                                                <span><i class="fa fa-inr"></i> <span class="total"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?></span></span>
                                                <input type="hidden" name="sub_amount" class="input_total" value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th> DISCOUNT TOTAL</th>
                                            <td>
                                                <span><i class="fa fa-inr"></i> <span class="discount_total"><?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00; ?></span> </span>
                                                <input type="hidden" name="discount_total" class="input_discount_total" value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00; ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>FINAL TOTAL</th>
                                            <td>
                                                <span><i class="fa fa-inr"></i> <span class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                                <input type="hidden" name="final_total" class="input_final_total" value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row hide">
                                        <div class="col-md-7">
                                            TOTAL AMOUNT
                                        </div>
                                        <div class="col-md-5">
                                            <span><i class="fa fa-inr"></i> <span class="total"><?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?></span></span>
                                            <input type="hidden" name="sub_amount" class="input_total" value="<?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0; ?>"/>
                                            <!-- <input type="hidden" name="discount_amount" class="discount_amount" value="<?php /*echo !empty($order['discount_amount']) ? $order['discount_amount'] : 0.00; */?>"/>-->
                                        </div>
                                    </div>
                                    <div class="row hide">
                                        <div class="col-md-7">
                                            DISCOUNT TOTAL
                                        </div>
                                        <div class="col-md-5">
                                            <span><i class="fa fa-inr"></i> <span class="discount_total"><?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00; ?></span> </span>
                                            <input type="hidden" name="discount_total" class="input_discount_total" value="<?php echo !empty($order['discount_total']) ? $order['discount_total'] : 0.00; ?>"/>
                                        </div>
                                    </div>
                                    <div class="row hide">
                                        <div class="col-md-7">
                                            <h4 class="h4">FINAL TOTAL</h4>
                                        </div>
                                        <div class="col-md-5">
                                            <span><i class="fa fa-inr"></i> <span class="final_total"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span> </span>
                                            <input type="hidden" name="final_total" class="input_final_total" value="<?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button form="frm" type="submit" class="btn btn-success">Submit</button>
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

    $("body").on("change", ".qty,.discount_value,.discount_type", function () {
        var th, unit_price, qty, amount, discount, discount_type;
        th = $(this);
        unit_price = th.closest('tr').find('.dealer_price').val();
        qty = th.closest('tr').find('.qty').val();
        discount = th.closest('tr').find('.discount_value').val();
        // If Quantity Changed
        amount = parseFloat(unit_price) * parseInt(qty);
        amount = amount.toFixed(2);
        th.closest('tr').find('.amount').text(amount);
        th.closest('tr').find('.input_amount').val(amount);
        // discount = (parseFloat(discount) * parseFloat(amount)) / 100;
        // discount = discount.toFixed(2);
        // th.closest('tr').find('.discount_value').val(discount);

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
            discount = (parseFloat(discount) * parseFloat(amount)) / 100;
            discount = discount.toFixed(2);
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
        finalTotal();
    }

    function finalTotal() {
        var net_total, tax_total, final_total;
        net_total = $(".input_total").val();
        tax_total = $(".input_discount_total").val();
        final_total = parseFloat(net_total) - parseFloat(tax_total);
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
                '<input type="hidden" class="p_name" name="product_name[]" value="<?php echo !empty($order_item['product_name']) ? $order_item['product_name'] : ''; ?>"/>'+
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
                '<td><input type="text" class="form-control dealer_price" name="dealer_price[]" placeholder="Unit Price" readonly/></td>' +
                '<td><input type="text" class="form-control qty" name="quantity[]" placeholder="Quantity(1,2,..)"/></td>' +
                '<td><input type="text" class="form-control discount_value" name="discount_amount[]" placeholder="Discount(%)"/></td>' +
                '<td><input type="text" class="form-control input_amount" name="item_amount[]" placeholder="Product Price" readonly/></td>' +
                '<td><span class="btn btn-sm btn-danger delete_row"><i class="fa fa-trash"></i></span></td>' +
                '</td>' +


                '</tr>';
            $("table#dynamic_field tbody").append(row);

        });
        $("body").on("click", ".delete_row", function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            finalTotal();
            checkDiscounts();
        });
    });
</script>
<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url();?>";

    $(document).ready(function () {

        // Main Product change
        $("body").on('change', '.main_product', function () {
            var main_product_id = $(this).val();
            var tr = $(this).closest('tr');
            // AJAX request
            $.ajax({
                url: "<?php echo base_url() ?>" + "dealer/fetch_sub_products/?main_product_id=" + main_product_id,
                method: 'post',
                data: {main_product_id: main_product_id},
                dataType: 'json',
                success: function (response) {

                    // Remove options
                    tr.find('.sproduct_id').find('option').not(':first').remove();
                    tr.find('.child_product_id').find('option').not(':first').remove();
                    tr.find('.dealer_price').val('0.00');
                    tr.find('.qty').val('0.00');
                    tr.find('.discount_value').val('0');
                    tr.find('.input_amount').val('0.00');
                    finalTotal();
                    checkDiscounts();
                    // Add options
                    $.each(response, function (key, value) {
                        tr.find('.sproduct_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        });

        // Sub Product change
        $("body").on('change', '.sproduct_id', function () {
            var sub_product_id = $(this).val();
            var tr = $(this).closest('tr');
            // AJAX request
            $.ajax({
                url: "<?php echo base_url() ?>" + "dealer/fetch_child_products/?sub_product_id=" + sub_product_id,
                method: 'post',
                data: {sub_product_id: sub_product_id},
                dataType: 'json',
                success: function (response) {

                    // Remove options
                    tr.find('.child_product_id').find('option').not(':first').remove();
                    tr.find('.dealer_price').val('0.00');
                    tr.find('.qty').val('0.00');
                    tr.find('.discount_value').val('0');
                    tr.find('.input_amount').val('0.00');
                    finalTotal();
                    checkDiscounts();
                    // Add options
                    $.each(response, function (key, value) {
                        tr.find('.child_product_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        });
        $("body").on("change", ".child_product_id", function () {
            var product_id = $(this).val();
            var tr = $(this).closest('tr');
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "dealer/fetch_product_price/?product_id=" + product_id,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    tr.find('.dealer_price').val(data.dealer_price);
                    tr.find('.p_name').val(data.product_name);
                    tr.find('.qty').val('0.00');
                    tr.find('.discount_value').val('0');
                    tr.find('.input_amount').val('0.00');
                    finalTotal();
                    checkDiscounts();
                    // tr.find('.qty').val(data.quantity);
                    //tr.find('.discount').val(data.discount);
                }
            });

        })
        $("body").on("change", ".child_product_id,.qty", function () {
            var th= $(this);
            var product_id = th.closest('tr').find('.child_product_id').val();
            var quantity = th.closest('tr').find('.qty').val();
            console.log(quantity);
            var tr = $(this).closest('tr');
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "dealer/fetch_price_ranges/",
                data:{quantity:quantity,product:product_id},
                cache: false,
                success: function (data) {

                    tr.find('.input_amount ').val(data);
                    // tr.find('.dealer_price').val(data.dealer_price);
                    // tr.find('.p_name').val(data.product_name);
                    //  tr.find('.qty').val('0.00');
                    //  tr.find('.discount_value').val('0');
                    //  tr.find('.input_amount').val('0.00');
                    //  finalTotal();
                    //  checkDiscounts();
                    // tr.find('.qty').val(data.quantity);
                    //tr.find('.discount').val(data.discount);
                }
            });

        })
    });
</script>
<!--<script>
    $("body").on("change", ".main_product", function () {
        var main_product_id = $(this).val();
        if ((main_product_id == "") || (main_product_id == null)) {
            $(this).closest('td').find('.sproduct_id').empty();
        }
        else {
            $(this).closest('td').find('.sproduct_id').empty();
            $.ajax({
                type: 'POST',
                url: "<?php /*echo base_url()  */?>" + "dealer/fetch_sub_products/?main_product_id=" + main_product_id,
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

    $("body").on("change", ".sproduct_id", function () {
        var sub_product_id = $(this).val();
        if ((sub_product_id == "") || (sub_product_id == null)) {
            $(this).closest('td').find('.child_product_id').empty();
        }
        else {
            $(this).closest('td').find('.child_product_id').empty();
            $.ajax({
                type: 'POST',
                url: "<?php /*echo base_url()  */?>" + "dealer/fetch_child_products/?sub_product_id=" + sub_product_id,
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
    $("body").on("change", ".child_product_id", function () {
        var product_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "<?php /*echo base_url()  */?>" + "dealer/fetch_product_price/?product_id=" + product_id,
            dataType: 'json',
            cache: false,
            success: function (data) {
                $(document).find('.mrp_price').val(data.mrp_price);
            }
        });

    });

</script>-->

