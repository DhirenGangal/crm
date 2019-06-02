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
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>import/import-customers/" class="btn btn-primary"><i class="fa fa-download"></i> Import</a>
                    <a href="<?php echo base_url(); ?>import/export-customers/" class="btn btn-success"><i class="fa fa-upload"></i> Export</a>
                    <a href="<?php echo base_url(); ?>admin/customers/add" class="btn btn-info"><i class="fa fa-plus"></i> Add Customer</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline text-center" method="get">
                            <div class="form-group">
                                <select class="form-control" name="select_type">
                                    <option value="account_name" <?php echo !empty($_GET['select_type']) && $_GET['select_type'] == 'account_name' ? 'selected=selected' : '' ?>>Account Name</option>
                                    <option value="mac_id"  <?php echo !empty($_GET['select_type']) && $_GET['select_type'] == 'mac_id' ? 'selected=selected' : '' ?>>Mac Id</option>
                                    <option value="email"  <?php echo !empty($_GET['select_type']) && $_GET['select_type'] == 'email' ? 'selected=selected' : '' ?>>Email</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter Your Input" value="<?php echo !empty($_GET['name']) ? $_GET['name'] : ''?>" class="form-control">
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="toggle-col">
                    Show/Hide column : <a class="toggle-vis"  data-column="0">S.No</a> -- <a class="toggle-vis" data-column="1">Account Name</a> -- <a class="toggle-vis" data-column="2">Mac Id</a> -- <a class="toggle-vis" data-column="3">Email</a> -- <a class="toggle-vis" data-column="4">Subscription Ends In</a> -- <a class="toggle-vis" data-column="5">Action</a>
                </div>
                <table class="table table-bordered table-hover data-table">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Account Name</th>
                        <th>Mac Id</th>
                        <th>Email</th>
                        <th>Subscription Ends In</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($users)) {
                        $i = 1;
                        foreach ($users as $user)
                        {
                            ?>
                            <tr>
                                <?php
                                $created_date =  date('Y-m-d');
                                $end_date =  !empty($user['subscr_end_date']) ? $user['subscr_end_date'] : '';
                                $output = round(abs(strtotime($end_date)-strtotime($created_date))/86400);
                                ?>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($user['account_name']) ? $user['account_name'] : ""; ?></td>
                                <td><?php echo !empty($user['mac_id']) ? $user['mac_id'] : ""; ?></td>
                                <td><?php echo !empty($user['email']) ? $user['email'] : ""; ?></td>
                                <td><?php echo !empty($output) ? $output.' ' .'days' : ''  ?></td>
                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/customers/edit/<?php echo $user['user_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-default"><i class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/customers/?act=status&user_id=<?php echo $user['user_id']; ?>&sta=<?php echo ($user['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($user['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                       class="btn btn-sm btn-default"><i
                                            class="fa fa-star <?php echo ($user['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/customers/?act=del&user_id=<?php echo $user['user_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"  href="<?php echo base_url() ?>admin/customers/view/<?php echo $user['user_id'] ; ?>" data-id="<?php echo $user['user_id'] ?>"  title='View' class="btn btn-default btn-sm" ><i class="fa fa-eye text-warning"></i> </a>
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

            </div>
        </div>
    </section>
</div>
