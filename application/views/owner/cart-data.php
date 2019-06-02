<?php
if (!empty($cart_items)) {
    ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Cart <i class="fa fa-cart-plus"></i>
        <span class="label label-warning cart-cnt"><?php echo !empty($cart_items) ? count($cart_items) : '0' ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have <?php echo !empty($cart_items) ? count($cart_items) : '0' ?> items in cart</li>
        <li>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>HSN/SAC</th>
                    <th class="w-20">Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($cart_items)) {
                    foreach ($cart_items as $cart_item) {
                        ?>

                        <tr>
                            <td><?php echo !empty($cart_item['product_name']) ? $cart_item['product_name'] : ''; ?></td>
                            <td><?php echo !empty($cart_item['hsn_code']) ? $cart_item['hsn_code'] : ''; ?></td>
                            <td><?php echo !empty($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?></td>
                            <td><?php echo !empty($cart_item['sub_total']) ? $cart_item['sub_total'] : ''; ?></td>
                            <td><a data-toggle="tooltip" data-placement="bottom"
                                   href="<?php echo base_url() ?>admin/add_to_cart/?act=del&pk_id=<?php echo $cart_item['pk_id']; ?>"
                                   title='Delete' onclick="return window.confirm('Do You Want to Delete?');"
                                   class="btn btn-sm btn-default"><i class="fa fa-trash text-danger"></i></a></td>
                        </tr>


                        <?php
                    }
                }
                ?>
                <tr>

                </tr>
                </tbody>
            </table>
        </li>
        <li class="footer">
            <ul class="list-inline list-unstyled text-center">
                <li><a class="btn btn-sm btn-primary" href="<?php echo base_url()  ?>owner/view-cart">View all</a></li>
                <li><a class="btn btn-sm btn-danger clear-cart"  href="<?php echo base_url() ?>owner/clear_cart/?created_by=<?php echo $_SESSION['USER_ID'] ?>">ClearCart</a></li>
            </ul>
        </li>
    </ul>
    <?php
}
?>
<script>
    $(document).ready(function () {
        $('.clear-cart').click(function () {
            var created_by = $(this).data('id');
            //  console.log(user_id);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "owner/clear_cart/?created_by=" + created_by,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    if(data==="TRUE"){
                        window.location.reload();
                    }
                }
            });
        })

    })
</script>
