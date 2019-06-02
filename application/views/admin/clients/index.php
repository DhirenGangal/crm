<div class="content-wrapper">
    <section class="content-header">
        <h1> Clients
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Clients</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Clients</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>import/import_clients/" class="btn btn-primary"><i
                                class="fa fa-download"></i> Import </a>
                    <a href="<?php echo base_url(); ?>import/export_clients/" class="btn btn-success"><i
                                class="fa fa-upload"></i> Export </a>
                    <a href="<?php echo base_url(); ?>admin/clients/add" class="btn btn-info"><i class="fa fa-plus"></i>
                        Add Clients</a>
                </div>
            </div>
            <div class="box-body">
                <div class="toggle-col">
                    Show/Hide column : <a class="toggle-vis" data-column="0">S.No</a> -- <a class="toggle-vis"
                                                                                            data-column="1">Client
                        Name</a> -- <a class="toggle-vis" data-column="2">Image</a> -- <a class="toggle-vis"
                                                                                          data-column="3">Action</a>
                </div>
                <table class="table table-bordered table-hover data-table">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Client Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($clients)) {
                        $i = 1;
                        foreach ($clients as $client) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($client['client_name']) ? $client['client_name'] : ""; ?></td>
                                <td><?php
                                    $img = (!empty($client['client_logo']) && file_exists(FCPATH . 'data/clients/')) ? 'data/clients/' . $client['client_logo'] : '';
                                    ?>
                                    <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo(); ?>"
                                         class="img-table" alt="CLient Pic"></td>
                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/clients/edit/<?php echo $client['client_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-default"><i
                                                class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="modal" data-target="#view-details" href="javascript:void(0)"
                                       data-id="<?php echo $client['client_id']; ?>" title='View'
                                       class="btn btn-sm btn-default view-details"><i
                                                class="fa fa-eye text-warning"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/clients/?act=status&client_id=<?php echo $client['client_id']; ?>&sta=<?php echo ($client['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($client['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                       class="btn btn-sm btn-default"><i
                                                class="fa fa-star <?php echo ($client['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/clients/?act=del&client_id=<?php echo $client['client_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='4'>No Client added</td></tr>";
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
<div id="view-details" class="modal fade" role="dialog">
    <div id="client_details"></div>
</div>

<script>
    $(document).ready(function () {
        $(".view-details").click(function () {
            var client_id = $(this).data("id");

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/fetchClientDetails/?client_id=' + client_id,
                success: function (result) {
                    $("#client_details").html(result);
                }
            })
        })
    })
</script>