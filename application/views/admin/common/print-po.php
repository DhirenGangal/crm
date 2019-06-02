<link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/print-styles.css">
<?php
if (!empty($_GET['type'])) {
    $msg = '';
    $msg1 = '';
    if ($_GET['type'] == 'customer') {
        $msg = 'ORIGINAL';
        $msg1 = 'Recipient';
    } else if ($_GET['type'] == 'transporter') {
        $msg = 'DUPLICATE';
        $msg1 = 'Transporter';
    } else if ($_GET['type'] == 'supplier') {
        $msg = 'TRIPLICATE';
        $msg1 = 'Supplier';
    }
}
?>
<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1> Preview
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Preview</li>
            </ol>
        </section>

        <section class="content">
            <?php echo getMessage(); ?>
            <div class="box box-info">
                <div class="box-header with-border hidden-print">
                    <div class="form-group text-center">
                        <label>Print for &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label class="radio-inline"><input type="radio" class="radio" name="print_type" value="customer"
                                                           checked>Customer</label>
                        <label class="radio-inline"><input type="radio" class="radio" name="print_type" value="transporter">Transporter</label>
                        <label class="radio-inline"><input type="radio" class="radio" name="print_type" value="supplier">Supplier</label>
                    </div>
                    <div class="box-tools">
                        <a href="<?php echo base_url() ?>admin/common/print/<?php echo $order['order_id'] ?>?type=customer" class="btn btn-success ptype"
                           target="_blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center po-title">PURCHASE ORDER</h3>
                            <div class="block pull-right text-center">
                                <p class="print-for"><?php echo !empty($msg) ? $msg : 'ORIGINAL' ?></p>
                                <div class="line"></div>
                                <p class="m-0">For <span
                                            class="print-to"><?php echo !empty($msg1) ? $msg1 : 'Recipient' ?></span></p>
                            </div>
                        </div>
                        <div class="col-md-12  p-t-b-20">
                            <div class="col-md-3 owner-info-1">
                                <ul class="list-unstyled ofc-addr">
                                    <li>VSCIE Apartments</li>
                                    <li>Beside Tcs,Santhipura Road,</li>
                                    <li>Ecity-2,Bangalore</li>
                                    <li>9620132023</li>
                                </ul>


                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3  owner-info-2">
                                <ul class="list-unstyled">
                                    <li><span class="pull-left"><b>Order Date</b></span><span
                                                class="pull-right"><?php echo !empty($order['order_date']) ? $order['order_date'] : '' ?></span>
                                    </li>
                                    <br/>
                                    <li><span class="pull-left"><b>Order no</b></span><span
                                                class="pull-right"><?php echo !empty($order['order_no']) ? $order['order_no'] : '' ?></span>
                                    </li>
                                    <br/>
                                    <li><span class="pull-left"><b>Approved By</b></span><span
                                                class="pull-right"><?php echo !empty($order['approved_by_name']) ? $order['approved_by_name'] : '' ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-md-12 w-100">
                            <div class="line"></div>

                            <div class="col-md-3 p-0 w-40">
                                <h4 class="bill-title">Customer Name</h4>
                                <h4>Raghu Dandu</h4>
                            </div>
                            <div class="col-md-offset-2 col-md-3 w-20">
                                <h4 class="bill-title">Billing Address</h4>
                                <h4>Raghu Dandu</h4>
                            </div>
                            <div class="col-md-3 w-20">
                                <h4 class="bill-title">Shipping Address</h4>
                                <h4>Raghu Dandu</h4>
                                <h4>KARNATAKA</h4>
                                <h4>INDIA</h4>
                            </div>
                            <div class="clearfix"></div>

                            <div class="line"></div>
                        </div>
                        <div class="col-md-12">
                            <p class="place-supply"><b>Place of Supply </b> : <b>Karnataka</b></p>
                            <div class="clearfix"></div>
                            <div class="line"></div>
                        </div>

                        <div class="col-md-12 p-t-20">
                            <table class="table table-bordered product_table" id="dynamic_field">
                                <thead>
                                <tr>
                                    <td>S.No</td>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Quautity</th>
                                    <th>Unit Price</th>
                                    <th>Discount(%)</th>
                                    <th>CGST</th>
                                    <th>SGST</th>
                                    <th>IGST</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($order['order_items'])) {
                                    $i = 1;
                                    foreach ($order['order_items'] as $order_item) {
                                        ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php
                                                $img = !empty($order_item['product_logo']) && file_exists(FCPATH . 'data/child-sub-products/') ? 'data/child-sub-products/' . $order_item['product_logo'] : '';
                                                ?>
                                                <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                     alt="product image" class="img-table">
                                            </td>
                                            <td><?php echo !empty($order_item['child_product']) ? $order_item['child_product'] : '' ?></td>
                                            <td><?php echo !empty($order_item['quantity']) ? $order_item['quantity'] : '' ?></td>
                                            <td><?php echo !empty($order_item['unit_price']) ? $order_item['unit_price'] : '' ?></td>
                                            <td><?php echo !empty($order_item['discount']) ? $order_item['discount'].' '.'%' : '0'.' '.'%' ?></td>
                                            <td><?php echo !empty($order_item['cgst_amount']) ? $order_item['cgst_amount'] : '' ?><br/>
                                                <?php  echo !empty($order_item['cgst_amount']) ? '@'.' '.$order_item['gst'].' '.'%' : '' ; ?>
                                            </td>
                                            <td><?php echo !empty($order_item['sgst_amount']) ? $order_item['sgst_amount'] : '' ?>
                                                <br/>
                                                <?php  echo !empty($order_item['sgst_amount']) ? '@'.' '.$order_item['gst'].' '.'%' : '' ; ?>
                                            </td>
                                            <td>
                                                <?php echo !empty($order_item['igst_amount']) ? $order_item['igst_amount'] : '' ?><br/>
                                                <?php  echo !empty($order_item['igst_amount']) ? '@'.' '.$order_item['gst'].' '.'%' : '' ; ?>
                                            </td>
                                            <td><?php echo !empty($order_item['total_amount']) ? $order_item['total_amount'] : '' ?></td>
                                            <td class="hide">
                                                <button type="button" class="btn btn-sm btn-success add" id="add"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr class="text-center">
                                    <td colspan="10">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED
                                        COMPLETE ON OR
                                        BEFORE: <?php echo dateDB2SHOW($order['expected_date']) ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-9">

                            </div>
                            <div class="col-md-3 w-30">
                                <table class="table ">
                                    <tbody>
                                    <tr>
                                        <th>Net Amount</th>
                                        <td>
                                            <i class="fa fa-inr "></i> <?php echo !empty($order['sub_amount']) ? $order['sub_amount'] : 0.00; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    if ($order['cgst_amount'] != '0.00') {
                                        ?>
                                        <tr>
                                            <th>CGST Amount</th>
                                            <td>
                                                <i class="fa fa-inr "></i> <?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>SGST Amount</th>
                                            <td>
                                                <i class="fa fa-inr "></i> <?php echo !empty($order['sgst_amount']) ? $order['sgst_amount'] : 0.00; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($order['igst_amount'] != '0.00') {
                                        ?>
                                        <tr>
                                            <th>IGST Amount</th>
                                            <td>
                                                <i class="fa fa-inr "></i> <?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th>Amount Payable</th>
                                        <td>
                                            <span class="final_total hidden"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span>
                                            <i class="fa fa-inr "></i> <?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="col-md-12 ">

                            <div class="pull-right "> <b>Amount (In words)</b>   : <?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00; ?>  </div>
                        </div>

                    </div>

                </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function () {

        <?php if($this->uri->segment(3) == 'print'){?>
        window.print();
        <?php } ?>
        $('.radio').change(function () {
            var val = $(this).val();
            console.log(val);
            $('.ptype').attr("href", "<?php echo base_url() ?>admin/common/print/1?type=" + val);
            if (val == 'customer') {
                $('.print-for').text('ORIGINAL');
                $('.print-to').text('Recipient');
            } else if (val == 'transporter') {
                $('.print-for').text('DUPLICATE');
                $('.print-to').text('Transporter');
            }
            else if (val == 'supplier') {
                $('.print-for').text('TRIPLICATE');
                $('.print-to').text('Supplier');
            }

        });
        $('.text_amount').text(convertNumberToWords($('.final_total').text()) + 'Rupees Only');
    })
</script>