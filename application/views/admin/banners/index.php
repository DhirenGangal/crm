<div class="content-wrapper">
    <section class="content-header">
        <h1> Banners
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Banners</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Banners</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/banners/add" class="btn btn-info"><i
                            class="fa fa-plus"></i> Add
                        Banners</a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Banner Name</th>
                        <th>Banner Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php
                    if (!empty($banners)) {
                        $i=1;
                        foreach ($banners as $banner) {
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo !empty($banner['banner_name']) ? $banner['banner_name'] : ""; ?></td>
                                        <td><?php
                                            $img = (!empty($banner['banner_img']) && file_exists(FCPATH.'data/banners/')) ?   'data/banners/'.$banner['banner_img']  : '' ;
                                            ?>
                                            <img src="<?php echo !empty($img) ? base_url().$img : dummyLogo()  ?>" class="img-table" alt="Product Image">
                                        <td class="">
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               href="<?php echo base_url() ?>admin/banners/edit/<?php echo $banner['banner_id']; ?>"
                                               title='Edit' class="btn btn-sm btn-default"><i
                                                    class="fa fa-pencil text-info"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               href="<?php echo base_url() ?>admin/banners/?act=status&banner_id=<?php echo $banner['banner_id']; ?>&sta=<?php echo ($banner['is_active'] == "1") ? "0" : "1"; ?>"
                                               title='<?php echo ($banner['is_active'] == "1") ? "Active" : "Inactive"; ?>'
                                               class="btn btn-sm btn-default"><i
                                                    class="fa fa-star <?php echo ($banner['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               href="<?php echo base_url() ?>admin/banners/?act=del&banner_id=<?php echo $banner['banner_id']; ?>"
                                               title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                               class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }

                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='4'>No Banner added</td></tr>";
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
