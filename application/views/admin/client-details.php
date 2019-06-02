<style>
    .box {
        border-top: 1px solid #605ca8 !important;
    }
</style>

<?php if (!empty($client_details)) {
    ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Client Info</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 text-center">
                            <?php
                            $img = !empty($client_details['client_logo'] && file_exists(FCPATH . 'data/clients/' . $client_details['client_logo'])) ? 'data/clients/' . $client_details['client_logo'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" class="modal-img" alt="Product Image">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Client Name</th>
                                    <td><?php echo !empty($client_details['client_name']) ? $client_details['client_name'] : '' ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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
