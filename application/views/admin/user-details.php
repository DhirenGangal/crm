<style>
    .box {
        border-top: 1px solid #605ca8 !important;
    }
</style>
<?php if (!empty($user_details)) {
    ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name'] ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 text-center">
                            <?php
                            $img = !empty($user_details['user_logo'] && file_exists(FCPATH . 'data/profile/' . $user_details['user_logo'])) ? 'data/profile/' . $user_details['user_logo'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" class="modal-img" alt="Product Image">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Account Name</th>
                                    <td><?php echo !empty($user_details['account_name']) ? $user_details['account_name'] : '' ?></td>
                                </tr>
                                <tr>
                                    <th>Installation Type</th>
                                    <td><?php echo !empty($user_details['installation_type']) ? $user_details['installation_type'] : '' ?></td>
                                </tr>
                                <tr>
                                    <th>Project Type</th>
                                    <td><?php echo !empty($user_details['project_type']) ? $user_details['project_type'] : '' ?></td>
                                </tr>
                                <tr>
                                    <th>Company Name</th>
                                    <td><?php echo !empty($user_details['company_name']) ? $user_details['company_name'] : '' ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo !empty($user_details['email']) ? $user_details['email'] : '' ?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td><?php echo !empty($user_details['phone_no']) ? $user_details['phone_no'] : '' ?></td>
                                </tr>
                                <tr>
                                    <th rowspan="4">Address</th>
                                    <td><?php echo !empty($user_details['address']) ? $user_details['address'] : '' ?></td>
                                    <td><?php echo !empty($user_details['city']) ? $user_details['city'] : '' ?></td>
                                    <td><?php echo !empty($user_details['state']) ? $user_details['state'] : '' ?></td>
                                    <td><?php echo !empty($user_details['postal_code']) ? $user_details['postal_code'] : '' ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            \
        </div>
        <!-- /.modal-content -->
    </div>
    <?php
} else {
    ?>
    <h1>No Data Found</h1>
    <?php
}
?>
