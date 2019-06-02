
<div class="content-wrapper">
    <section class="content-header">
        <h1> Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Orders</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Orders</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url() ?>admin/products" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Order </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order No</th>
                        <th>Booked Date</th>
                        <th>Expected Date</th>
                        <th>Dealer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($orders)) {
                        $i = 1;
                        foreach ($orders as $order) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($order['order_no']) ? $order['order_no'] : ""; ?></td>
                                <td><?php echo !empty($order['order_date']) ? dateDB2SHOW($order['order_date']) : ""; ?></td>
                                <td><?php echo !empty($order['expected_date']) ? dateDB2SHOW($order['expected_date']) : ""; ?></td>
                                <td><?php echo !empty($order['dealer_name']) ? $order['dealer_name'] : ""; ?></td>
                                <td>
                                    <?php if ($order['order_status'] == 'PENDING') {
                                        echo "<label class='label label-warning'>Pending</label>";
                                    } else if ($order['order_status'] == 'PROGRESS') {
                                        echo "<label class='label label-primary'>In Progress</label>";
                                    } else {
                                        echo "<label class='label label-success'>Delivered</label>";
                                    }
                                    ?>
                                </td>

                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/orders/edit/<?php echo $order['order_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-primary"><i class="fa fa-pencil "></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/orders/po/<?php echo $order['order_id']; ?>" title='PO'
                                       class="btn btn-sm btn-warning"><i class="fa fa-bars "></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/orders/preview/<?php echo $order['order_id']; ?>" title='Print'
                                       class="btn btn-sm btn-success"><i class="fa fa-print "></i></a>


                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/orders/?act=del&order_id=<?php echo $order['order_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-danger"><i class="fa fa-trash "></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center'><td colspan='8'>No Order added</td></tr>";
                    } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                </div>
            </div>
        </div>
    </section>
</div>
