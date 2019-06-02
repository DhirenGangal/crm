<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php  echo !empty($title) ? $title : '' ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->  <link rel="stylesheet" href="<?php  echo base_url() ?>assets/lib/css/print-styles.css">
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/lib/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/lib/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/lib/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/lib/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
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
<body onload="window.print();" onfocus="window.close();">
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
                <a href="<?php echo base_url() ?>admin/orders/print/1?type=customer" class="btn btn-success ptype"
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
                        <thead style=" background: #fffac3 !important;">
                        <tr>
                            <td>S.No</td>
                            <th>Product Name</th>
                            <th>HSN Code</th>
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
                                    <td><?php echo !empty($order_item['child_product']) ? $order_item['child_product'] : '' ?></td>
                                    <td><?php echo !empty($order_item['hsn_code']) ? $order_item['hsn_code'] : '' ?></td>
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
                                    <td><?php echo !empty($order_item['igst_amount']) ? $order_item['igst_amount'] : '' ?><br/>
                                        <?php  echo !empty($order_item['igst_amount']) ? '@'.' '.$order_item['gst'].' '.'%' : '' ; ?>
                                    </td>
                                    <td><?php echo !empty($order_item['total_amount']) ? $order_item['total_amount'] : '' ?></td>
                                    <td class="hide">
                                        <button type="button" class="btn btn-sm btn-success add" id="add"><i
                                                class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                        </tbody>
                        <tfoot class=" background: #fffac3 !important;">
                        <tr class="text-center">
                            <td colspan="10">PLEASE NOTIFY US IMMEDIATELY IF THIS ORDER CANNOT BE SHIPPED
                                COMPLETE ON OR
                                BEFORE: <?php echo dateDB2SHOW($order['expected_date']) ?></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="col-md-9"></div>
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
                                    <th>CGST </th>
                                    <td>
                                        <i class="fa fa-inr "></i> <?php echo !empty($order['cgst_amount']) ? $order['cgst_amount'] : 0.00; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>SGST </th>
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
                                    <th>IGST </th>
                                    <td>
                                        <i class="fa fa-inr "></i> <?php echo !empty($order['igst_amount']) ? $order['igst_amount'] : 0.00; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <th>Amount Payable</th>
                                <td><span class="final_total hidden"><?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?></span>
                                    <i class="fa fa-inr "></i> <?php echo !empty($order['final_total']) ? $order['final_total'] : 0.00; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 ">
                    <div class="pull-right "> <b>Amount (In words)</b>   : <?php echo !empty($order['text_amount']) ? $order['text_amount'] : 0.00; ?>  </div>
                </div>
            </div>
        </div>
</section>
<script src="<?php  echo base_url() ?>assets/lib/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php  echo base_url() ?>assets/lib/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php  echo base_url() ?>assets/lib/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php  echo base_url() ?>assets/lib/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php  echo base_url() ?>assets/lib/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php  echo base_url() ?>assets/lib/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/custom-script.js"></script>
<script>
    $(document).ready(function () {

    })
</script>
</body>
</html>
