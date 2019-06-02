<div class="content-wrapper">
    <section class="content-header">
        <h1> Dealers
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Dealers</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Dealers</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>import/import-dealers/" class="btn btn-primary"><i class="fa fa-download"></i> Import</a>
                    <a href="<?php echo base_url(); ?>import/export-dealers/" class="btn btn-success"><i class="fa fa-upload"></i> Export</a>
                    <a href="<?php echo base_url(); ?>admin/dealers/add" class="btn btn-info"><i class="fa fa-plus"></i> Add Dealer</a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Dealer Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($dealers)) {
                        $i = 1;
                        foreach ($dealers as $dealer) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($dealer['user_name']) ? $dealer['user_name'] : ""; ?></td>
                                <td><?php echo !empty($dealer['phone_no']) ? $dealer['phone_no'] : ""; ?></td>
                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/dealers/edit/<?php echo $dealer['member_id']; ?>" title='Edit' class="btn btn-sm btn-default"><i class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="javascript:void(0)" data-id="<?php echo $dealer['member_id']; ?>" title='View' class="btn btn-sm btn-default view-details"><i class="fa fa-eye text-warning"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/dealers/?act=status&member_id=<?php echo $dealer['member_id']; ?>&sta=<?php echo ($dealer['is_active'] == "1") ? "0" : "1"; ?>" title='<?php echo ($dealer['is_active'] == "1") ? "Active" : "Inactive"; ?>' class="btn btn-sm btn-default"><i class="fa fa-star <?php echo ($dealer['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/dealers/?act=del&member_id=<?php echo $dealer['member_id']; ?>" title='Delete' onclick="return window.confirm('Do You Want to Delete?');" class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='4'>No Dealer added</td></tr>";
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

<script>
    $(document).ready(function () {
        $(".view-details").click(function () {
            var member_id = $(this).data("id");
            alert(member_id);
        })
    })
</script>















