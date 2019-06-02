<style>
    .label-status{
        font-size: 100% !important;
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1> Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Users</li>
            </ol>
        </section>
        <section class="content">
            <?php echo getMessage(); ?>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">List Of Users</h3>


                </div>
                <div class="box-body">
                    <table class="table table-bordered data-table table-hover" id="example">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Account Name</th>
                            <th>User Name</th>
                            <th>Mac Id</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($users)) {
                            $i = 1;
                            foreach ($users as $user) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo !empty($user['account_name']) ? $user['account_name'] : ""; ?></td>
                                    <td><?php echo !empty($user['first_name']) ? $user['first_name'] : ""; ?></td>
                                    <td><?php echo !empty($user['mac_id']) ? $user['mac_id'] : ""; ?></td>
                                    <td><a data-toggle="tooltip" data-placement="bottom"
                                           href="<?php echo base_url() ?>dealer/view-users/?act=status&user_id=<?php echo $user['user_id']; ?>&sta=<?php echo ($user['is_active'] == "1") ? "0" : "1"; ?>"
                                           title='<?php echo ($user['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                           ><?php echo ($user['is_active'] == "1") ? '<label class="label label-success label-status">Active</label>' : '<label class="label label-danger label-status">InActive</label>'; ?></a></td>
                                </tr>
                                <?php $i++;
                            }
                        } else {
                            echo "<tr class='text-center text-danger'><td colspan='4'>No User Found</td></tr>";
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

