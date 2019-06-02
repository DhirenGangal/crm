<div class="content-wrapper">
    <section class="content-header">
        <h1> Products Model Info
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Model Info</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Product Model Info</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/child-sub-products/" class="btn btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                <li><a href="#updates" data-toggle="tab">Updates</a></li>
                                <li><a href="#tickets" data-toggle="tab">Tickets</a></li>
                                <li><a href="#invoices" data-toggle="tab">Invoices</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="details">
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header">
                                                <h4><?php echo !empty($sub_product['child_product_name']) ? $sub_product['child_product_name'] : '' ?></h4>
                                            </div>
                                            <div class="box-body">
                                                <div class="col-md-5">
                                                    <?php
                                                    $img = (!empty($sub_product['product_logo']) && file_exists(FCPATH . "data/child-sub-products/" . $sub_product['product_logo'])) ? "data/child-sub-products/" . $sub_product['product_logo'] : '';
                                                    ?>
                                                    <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                         alt="Profile Pic" class="product-pic">
                                                </div>
                                                <div class="col-md-7">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th>Mfr.No</th>
                                                            <td><?php echo !empty($sub_product['mfr_no']) ? $sub_product['mfr_no'] : ''; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>HSN Code</th>
                                                            <td><?php echo !empty($sub_product['hsn_code']) ? $sub_product['hsn_code'] : ''; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Description</th>
                                                            <td><?php echo !empty($sub_product['description_1']) ? limit_words($sub_product['description_1'], "10") : ''; ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header">
                                                <h4>Pricing (INR)</h4>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Qty</th>
                                                        <th>Unit Price</th>
                                                        <th>Ext. Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if (!empty($sub_product['ranges'])) {
                                                        foreach ($sub_product['ranges'] as $range) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $range['value_range'] ?></td>
                                                                <td>
                                                                    <i class="fa fa-inr"></i> <?php echo $range['dealer_price'] ?>
                                                                </td>
                                                                <td>
                                                                    <i class="fa fa-inr"></i> <?php echo $range['value_range'] * $range['dealer_price'] ?>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    }

                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="updates">
                                    <h1>Updates</h1>
                                    <ul class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                        </li>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-envelope bg-blue"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                    email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Read more</a>
                                                    <a class="btn btn-danger btn-xs">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-user bg-aqua"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a>
                                                    accepted your friend request
                                                </h3>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-comments bg-yellow"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                    post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                        </li>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                                </h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <li>
                                            <i class="fa fa-clock-o bg-gray"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="tickets">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Title</th>
                                            <th>Priority</th>
                                            <th>User Name</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (!empty($tickets)){
                                            $i=1;
                                            foreach ($tickets as $ticket) {
                                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo !empty($ticket['ticket_issue_title']) ? $ticket['ticket_issue_title'] : '' ?></td>
                                            <td><?php echo !empty($ticket['priority']) ? $ticket['priority'] : '' ?></td>
                                            <td><?php echo !empty($ticket['user_name']) ? $ticket['user_name'] : '' ?></td>
                                            <td><?php echo !empty($ticket['issue_status']) ? $ticket['issue_status'] : '' ?></td>
                                            <td><?php echo !empty($ticket['description']) ? $ticket['description'] : '' ?></td>
                                        </tr>
                                                <?php
                                                $i++;
                                            }
                                        }else{
                                            echo '<tr class="text-center text-danger" ><td colspan="6"><h4>No Tickets Found</h4></td></tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane" id="invoices">
                                  <table class="table table-bordered data-table">
                                      <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Order By</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Discount(%)</th>
                                            <th>GST</th>
                                            <th>Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                      if(!empty($invoices)){
                                          $i=1;
                                          foreach ($invoices as $invoice){
                                              ?>
                                      <tr>
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo !empty($invoice['created_person']) ? $invoice['created_person'] : '' ?></td>
                                          <td><?php echo !empty($invoice['unit_price']) ? $invoice['unit_price'] : '' ?></td>
                                          <td><?php echo !empty($invoice['quantity']) ? $invoice['quantity'] : '' ?></td>
                                          <td><?php echo !empty($invoice['discount']) ? $invoice['discount'] : '0' ?></td>
                                          <td><?php echo !empty($invoice['gst']) ? $invoice['gst'] : '' ?></td>
                                          <td><?php echo !empty($invoice['total_amount']) ? $invoice['total_amount'] : '' ?></td>
                                      </tr>

                                      <?php
                                              $i++;
                                          }
                                      }else{
                                          echo '<tr class="text-danger text-center"><td colspan="7"><h4>No Invoice Found</h4></td></tr>';
                                      }
                                      ?>
                                      </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <h4>Latest Products</h4>

                        <?php
                        if (!empty($products)) {
                            foreach ($products as $p) {
                                if (!empty($p['sub_products'])) {
                                    foreach ($p['sub_products'] as $sp) {
                                        if (!empty($sp['child_products'])) {
                                            foreach ($sp['child_products'] as $child_product) {
                                                if (!empty($child_product['product_details'])) {
                                                    foreach ($child_product['product_details'] as $pd) {
                                                        ?>
                                                        <div class="col-md-4">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <?php
                                                                    $img = (!empty($pd['product_logo']) && file_exists(FCPATH . "data/child-sub-products/" . $pd['product_logo'])) ? "data/child-sub-products/" . $pd['product_logo'] : '';
                                                                    ?>
                                                                    <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>"
                                                                         alt="Profile Pic" height="150" width="150">
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading"><?php echo !empty($pd['child_product_name']) ? $pd['child_product_name'] : '' ?></h4>
                                                                    <p><?php echo !empty($pd['description_1']) ? limit_words($pd['description_1'], 10) : '' ?></p>
                                                                    <a href="<?php echo base_url() ?>admin/child-sub-products/view/<?php echo $pd['product_info_id'] ?>"
                                                                       class="btn btn-info btn-sm">View </a>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <?php
                                                    }
                                                }

                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
