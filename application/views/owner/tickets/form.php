<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>Ticket System</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Ticket System</li>
            </ol>
        </section>
        <section class="content">
            <?php echo getMessage(); ?>
            <div class="box box-info">
                <div class="box-header with-border"><h3 class="box-title">Add Ticket System</h3>
                    <div class="box-tools">
                        <a href="<?php echo base_url(); ?>owner/tickets/" class="btn btn-danger"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="ticket_id"
                                   value="<?php echo !empty($ticket['ticket_id']) ? $ticket['ticket_id'] : ''; ?>"/>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Ticket Issue Title <sup
                                                class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="ticket_issue_title" class="form-control" required
                                               placeholder="Ticket Issue Title"
                                               value="<?php echo !empty($ticket['ticket_issue_title']) ? $ticket['ticket_issue_title'] : '' ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Priority <sup
                                                class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="priority" required>
                                            <option value="">Select Priority</option>
                                            <option value="High" <?php echo !empty($ticket['priority']) && $ticket['priority'] == "High" ? 'selected=selected' : '' ?>>High</option>
                                            <option value="Medium" <?php echo !empty($ticket['priority']) && $ticket['priority'] == "Medium" ? 'selected=selected' : '' ?>>Medium</option>
                                            <option value="Low" <?php echo !empty($ticket['priority'])  && $ticket['priority']  == "Low" ? 'selected=selected' : '' ?>>Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Select Product <sup
                                                class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="product_name" required>
                                            <option value="">Select Product</option>
                                            <?php
                                            if(!empty($products)){
                                                foreach ($products as $product){
                                                    if(!empty($product['sub_products'])){
                                                        foreach ($product['sub_products'] as $sub_product){
                                                            if(!empty($sub_product['child_products'])){
                                                                foreach ($sub_product['child_products'] as $child_product){

                                                            if(!empty($child_product['product_details'])){
                                                                foreach ($child_product['product_details'] as $info){
                                                                    ?>
                                            <option value="<?php echo $info['child_product_name'] ?>"  <?php echo !empty($ticket['product_name']) && $ticket['product_name'] == $info['child_product_name'] ? 'selected=selected' : '' ?>><?php echo $info['child_product_name'] ?></option>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" class="form-control" name="description"><?php echo !empty($ticket['description']) ? $ticket['description'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button form="frm" type="submit" class="btn btn-success">Submit</button>
                        <a href="<?php echo base_url() ?>owner/tickets/" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

