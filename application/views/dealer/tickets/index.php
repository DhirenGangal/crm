<div class="content-wrapper">
    <div class="container">
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
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>dealer/tickets/add" class="btn btn-info"><i class="fa fa-plus"></i> Add Ticket</a>
                </div>

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
                                <td><?php
                                        if($ticket['issue_status'] == 'Pending'){
                                            $label = 'label-danger';
                                        }elseif ($ticket['issue_status'] == 'In Progress'){
                                            $label = 'label-warning';
                                        } else{
                                            $label = 'label-success';
                                        }
                                    ?>

                                    <?php echo !empty($ticket['issue_status']) ?  '<label class="label '.$label .'">'.$ticket["issue_status"].'</label>' : '' ; ?></td>
                                <td>

                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>dealer/tickets/edit/<?php echo $ticket['ticket_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-default"><i class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>dealer/tickets/?act=del&ticket_id=<?php echo $ticket['ticket_id']; ?>"
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
</div>

