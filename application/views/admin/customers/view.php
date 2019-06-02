<div class="content-wrapper">
    <section class="content-header">
        <h1> Users </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Users</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">User Details</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/customers" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
               <div class="row">
                   <div class="col-md-12">
                       <div class="nav-tabs-custom">
                           <ul class="nav nav-tabs">
                               <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                               <li><a href="#orders" data-toggle="tab">Orders</a></li>
                           </ul>
                           <div class="tab-content">
                               <div class="active tab-pane" id="details">
                                   <div class="col-md-4 text-center">
                                       <?php
                                       $img = !empty($customer['user_logo'] && file_exists(FCPATH . 'data/profile/' . $customer['user_logo'])) ? 'data/profile/' . $customer['user_logo'] : '';
                                       ?>
                                       <img src="<?php echo !empty($img) ? base_url() . $img : dummyLogo() ?>" class="modal-img" alt="Product Image">
                                   </div>
                                   <div class="col-md-8">
                                       <table class="table table-bordered">
                                           <tbody>
                                           <tr>
                                               <th>Account Name</th>
                                               <td><?php echo !empty($customer['account_name']) ? $customer['account_name'] : '' ?></td>
                                           </tr>
                                           <tr>
                                               <th>Installation Type</th>
                                               <td><?php echo !empty($customer['installation_type']) ? $customer['installation_type'] : '' ?></td>
                                           </tr>
                                           <tr>
                                               <th>Project Type</th>
                                               <td><?php echo !empty($customer['project_type']) ? $customer['project_type'] : '' ?></td>
                                           </tr>
                                           <tr>
                                               <th>Company Name</th>
                                               <td><?php echo !empty($customer['company_name']) ? $customer['company_name'] : '' ?></td>
                                           </tr>
                                           <tr>
                                               <th>Email</th>
                                               <td><?php echo !empty($customer['email']) ? $customer['email'] : '' ?></td>
                                           </tr>
                                           <tr>
                                               <th>Phone Number</th>
                                               <td><?php echo !empty($customer['phone_no']) ? $customer['phone_no'] : '' ?></td>
                                           </tr>
                                           <tr>
                                               <th rowspan="4">Address</th>
                                               <td><?php echo !empty($customer['address']) ? $customer['address'] : '' ?></td>
                                               <td><?php echo !empty($customer['city']) ? $customer['city'] : '' ?></td>
                                               <td><?php echo !empty($customer['state']) ? $customer['state'] : '' ?></td>
                                               <td><?php echo !empty($customer['postal_code']) ? $customer['postal_code'] : '' ?></td>
                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                               <div class="tab-pane" id="orders">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Order No</th>
                                            <th>Order Date</th>
                                            <th>Expected Date</th>
                                            <th>Dealer Name</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(!empty($orders)){
                                            $i=1;
                                            foreach ($orders as $order){
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $order['order_no'] ?></td>
                                                <td><?php echo $order['order_date'] ?></td>
                                                <td><?php echo $order['expected_date'] ?></td>
                                                <td><?php echo $order['dealer_name'] ?></td>
                                                <td><?php echo $order['order_status'] ?></td>
                                            </tr>

                                        <?php
                                                $i++;
                                            }
                                        }else{
                                            echo '<tr class="text-center text-danger"><td colspan="6"><h4>No Order Found</h4></td></tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
</div>
