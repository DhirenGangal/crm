<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <h1> Tickets
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Tickets</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Tickets</h3>

            </div>
            <div class="box-body">
                <table class="table table-bordered data-table table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Ticket Issue Title</th>
                        <th>Product Name</th>
                        <th>Issue Priority</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if (!empty($tickets)) {
                        $i = 1;
                        foreach ($tickets as $ticket) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($ticket['ticket_issue_title']) ? $ticket['ticket_issue_title'] : ""; ?></td>
                                <td><?php echo !empty($ticket['product_name']) ? $ticket['product_name'] : ""; ?></td>
                                <td><?php echo !empty($ticket['priority']) ? $ticket['priority'] : ""; ?></td>
                                <td><?php echo !empty($ticket['description']) ? $ticket['description'] : ""; ?></td>
                                <td><?php echo !empty($ticket['status']) ? $ticket['status'] : ""; ?></td>
                                <td class="">

                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/tickets/?act=status&pk_id=<?php echo $ticket['pk_id']; ?>&sta=<?php echo ($ticket['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($ticket['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                       class="btn btn-sm btn-default"><i
                                            class="fa fa-star <?php echo ($ticket['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/tickets/?act=del&pk_id=<?php echo $ticket['pk_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center'><td colspan='7'>No Tickets Found</td></tr>";
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

