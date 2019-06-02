<div class="content-wrapper">
    <section class="content-header">
        <h1> Items
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Items</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Of Items</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/item_master/add" class="btn btn-info"><i class="fa fa-plus"></i> Add Item</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Item Name</th>
                        <th>HSN/SAC</th>
                        <th>Selling Price</th>
                        <th>Discount (%)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    <?php if (!empty($items)) {
                        $i = 1;
                        foreach ($items as $item) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo !empty($item['item_name']) ? $item['item_name'] : ""; ?></td>
                                <td><?php echo !empty($item['hsn_code']) ? $item['hsn_code'] : ""; ?></td>
                                <td><?php echo !empty($item['mrp_price']) ? $item['mrp_price'] : ""; ?></td>
                                <td><?php echo !empty($item['discount']) ? $item['discount'].' '.'%' : ""; ?></td>


                                <td class="">
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/item_master/edit/<?php echo $item['item_id']; ?>" title='Edit' class="btn btn-sm btn-default"><i class="fa fa-pencil text-info"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/item_master/?act=status&item_id=<?php echo $item['item_id']; ?>&sta=<?php echo ($item['is_active'] == "1") ? "0" : "1"; ?>" title='<?php echo ($item['is_active'] == "1") ? "Active" : "Inactive"; ?>' class="btn btn-sm btn-default"><i class="fa fa-star <?php echo ($item['is_active'] == "1") ? "text-success" : "text-danger"; ?>"></i></a>
                                    <a data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url() ?>admin/item_master/?act=del&item_id=<?php echo $item['item_id']; ?>" title='Delete' onclick="return window.confirm('Do You Want to Delete?');" class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                            <?php $i++;
                        }
                    } else {
                        echo "<tr class='text-center text-danger'><td colspan='6'>No Item added</td></tr>";
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
