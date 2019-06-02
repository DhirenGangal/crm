<div class="content-wrapper">
    <div class="container">
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

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order No</th>
                        <th>Booked Date</th>
                        <th>Delivery Date</th>
                        <th>Remarks</th>
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
                                <td><?php echo !empty($order['booked_date']) ? $order['booked_date'] : ""; ?></td>
                                <td><?php echo !empty($order['expected_date']) ? $order['expected_date'] : ""; ?></td>
                                <td><?php echo !empty($order['order_by']) ? $order['order_by'] : ""; ?></td>
                                <td><?php echo !empty($order['remarks']) ? $order['remarks'] : ""; ?></td>
                                <td><?php echo !empty($order['status']) ? $order['status'] : ""; ?></td>
                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/orders/edit/<?php echo $order['pk_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-default"><i
                                            class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/orders/?act=status&pk_id=<?php echo $order['pk_id']; ?>&sta=<?php echo ($order['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($order['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                       class="btn btn-sm btn-default"><i
                                            class="fa fa-star <?php echo ($order['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/orders/?act=del&pk_id=<?php echo $order['pk_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center'><td colspan='8'>No Order Found</td></tr>";
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
</div>
