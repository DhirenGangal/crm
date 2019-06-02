<div class="content-wrapper">
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
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Account Name</th>
                        <th>Mac Id</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($users)) {
                        $i = 1;
                        foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($user['account_name']) ? $user['account_name'] : ""; ?></td>
                                <td><?php echo !empty($user['mac_id']) ? $user['mac_id'] : ""; ?></td>
                                <td><?php echo !empty($user['email']) ? $user['email'] : ""; ?></td>
                                <td><a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>dealer/view-users/?act=status&user_id=<?php echo $user['user_id']; ?>&sta=<?php echo ($user['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($user['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                    ><?php echo ($user['is_active'] == "1") ? '<label class="label label-success label-status">Active</label>' : '<label class="label label-danger label-status">InActive</label>'; ?></a></td>
                                <td>
                                    <a data-toggle="modal"  data-target="#view-details" data-id="<?php echo $user['user_id'] ?>"  title='View' class="btn btn-sm btn-success view-details" ><i class="fa fa-eye"></i>  View Details</a>
                                </td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center'><td colspan='5'>No User added</td></tr>";
                    } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <?php echo !empty($PAGING) ? $PAGING : ""; ?>
                </div>
                <div class="modal fade" id="view-details">
                    <div id="user_details"></div>

                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('.view-details').click(function(e) {
            e.preventDefault();
            var user_id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "admin/fetch_user_details/?user_id=" + user_id,
                success: function (data) {
                    $("#user_details").html(data);
                }
            });

        });
    });
</script>