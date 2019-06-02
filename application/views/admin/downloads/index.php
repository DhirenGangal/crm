<div class="content-wrapper">
    <section class="content-header">
        <h1> Attachments
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Attachments</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Attachments</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/downloads/add" class="btn btn-info"><i class="fa fa-plus"></i> Add Attachment</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($downloads)) {
                        $i = 1;
                        foreach ($downloads as $download) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($download['title']) ? $download['title'] : ""; ?></td>
                                <td> <?php
                                    $img = (!empty($download['download_file']) && file_exists(FCPATH."data/downloads/")) ? 'data/downloads/'.$download['download_file'] : '';
                                    ?>
                                    <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo() ?>" class="img-table" alt="File"/></td>
                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/downloads/edit/<?php echo $download['download_id']; ?>"
                                       title='Edit' class="btn btn-sm btn-default"><i
                                            class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/products/?act=status&download_id=<?php echo $download['download_id']; ?>&sta=<?php echo ($download['is_active'] == "1") ? "0" : "1"; ?>"
                                       title='<?php echo ($download['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                       class="btn btn-sm btn-default"><i
                                                class="fa fa-star <?php echo ($download['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       href="<?php echo base_url() ?>admin/downloads/?act=del&download_id=<?php echo $download['download_id']; ?>"
                                       title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                       class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='4'>No Attachment added</td></tr>";
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
