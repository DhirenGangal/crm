<div class="content-wrapper">
    <section class="content-header">
        <h1> Add Customer
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Add Customer</li>
        </ol>
    </section>

    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add Customer</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/customers/" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>  Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" id="frm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Account Name <sup class="text-danger">*</sup>
                                        :</label>
                                    <div class="col-md-8">
                                        <input type="hidden" name="user_id"  value="<?php echo !empty($customer['user_id']) ? $customer['user_id'] : ''  ?>">
                                        <input type="text" name="account_name" class="form-control" required placeholder="Account name" value="<?php echo !empty($customer['account_name']) ? $customer['account_name'] : ''  ?>">
                                        <input type="hidden" name="product_id" class="form-control"  value="<?php echo !empty($customer['product_id']) ? $customer['product_id'] : ''  ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Installation Type <sup class="text-danger">*</sup>
                                        :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="installation_type" required>
                                            <option value="">---Select Type---</option>
                                            <option value="RESIDENTIAL" <?php echo !empty($customer['installation_type']) &&  $customer['installation_type'] == 'RESIDENTIAL' ?  'selected=selected' :''; ?>>Residential</option>
                                            <option value="COMMERCIAL" <?php echo !empty($customer['installation_type']) &&  $customer['installation_type'] == 'COMMERCIAL' ?  'selected=selected' :''; ?>>Commercial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Project Type <sup class="text-danger">*</sup>
                                        :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="project_type" required>
                                            <option value="">---Select Type---</option>
                                            <option value="NEW CONSTRUCTION" <?php echo !empty($customer['project_type']) &&  $customer['project_type'] == 'NEW CONSTRUCTION' ?  'selected=selected' :''; ?>>New Construction</option>
                                            <option value="REMODEL" <?php echo !empty($customer['project_type']) &&  $customer['project_type'] == 'REMODEL' ?  'selected=selected' :''; ?>>Remodel</option>
                                            <option value="RETROFIT" <?php echo !empty($customer['project_type']) &&  $customer['project_type'] == 'RETROFIT' ?  'selected=selected' :''; ?>>Retrofit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Date Installed :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="date_installed" class="form-control" readonly
                                               placeholder="Installed Date"  value="<?php echo !empty($customer['date_installed']) ? date('d/m/Y',strtotime($customer['date_installed'])) : ''  ?>">
                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Mac Id :</label>
                                    <div class="col-md-8">
                                        <input type="hidden" name="dealer_id" class="form-control" placeholder="" value="<?php echo !empty($customer['dealer_id']) ? $customer['dealer_id'] : ''  ?>">
                                        <input type="text" name="mac_id" id="mac_id" class="form-control" maxlength="12" placeholder="Mac Id" value="<?php echo !empty($customer['mac_id']) ? $customer['mac_id'] : ''  ?>">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <span id="statusmac"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Subscr. End Date :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="subscr_end_date" class="form-control"
                                                id="datepicker" value="<?php echo !empty($customer['subscr_end_date']) ? date('d/m/Y',strtotime($customer['subscr_end_date'])) : ''  ?>">
                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h3 class="text-center">Primary Account Holder</h3>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Company Name :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="company_name" placeholder="Company name" value="<?php echo !empty($customer['company_name']) ? $customer['company_name'] : ''  ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">First Name :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="first_name" placeholder="First name" value="<?php echo !empty($customer['first_name']) ? $customer['first_name'] : ''  ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Last Name :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last name" value="<?php echo !empty($customer['last_name']) ? $customer['last_name'] : ''  ?>">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Email <sup class="text-danger">*</sup> : </label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email" required placeholder="Email" value="<?php echo !empty($customer['email']) ? $customer['email'] : ''  ?>">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="pwd-container">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Password <sup class="text-danger">*</sup> :</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password" id="password" required value="<?php echo !empty($customer['password']) ? $customer['password'] : ''  ?>"
                                               placeholder="Password">
                                        <span id="eye" style="display:none" data-click-state="1" class="glyphicon glyphicon-eye-open "></span>
                                        <div class="process" style="display:none"><p> </p>
                                            <div class="progress">
                                                <div id="bar" class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 10%;">
                                                    Poor 
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Confirm Password <sup
                                            class="text-danger">*</sup>:</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="confirm_password" required
                                               placeholder="Confirm Password" value="<?php echo !empty($customer['confirm_password']) ? $customer['confirm_password'] : ''  ?>">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Setting Password <sup
                                            class="text-danger">*</sup>:</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="setting_password"
                                               id="setting_password" required value="<?php echo !empty($customer['setting_password']) ? $customer['setting_password'] : ''  ?>"
                                               placeholder="Setting Password">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Confirm Setting Password <sup
                                            class="text-danger">*</sup>:</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="confirm_password1" required value="<?php echo !empty($customer['confirm_password1']) ? $customer['confirm_password1'] : ''  ?>"
                                               placeholder="Confirm Setting Password">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Phone Number :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="phone_no"
                                               data-inputmask='"mask": "(999) 999-9999"'
                                               data-mask placeholder="Phone Number" value="<?php echo !empty($customer['phone_no']) ? $customer['phone_no'] : ''  ?>">
                                        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Address :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo !empty($customer['address']) ? $customer['address'] : ''  ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">City :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo !empty($customer['city']) ? $customer['city'] : ''  ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">State :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="state" id="">
                                            <option value="">---Select State---</option>
                                            <?php
                                            if (!empty($states)) {
                                                foreach ($states as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $key ?>" <?php echo !empty($customer['state']) && $customer['state'] == $key ? 'selected=selected' : ''  ?>><?php echo $value ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Postal Code :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" value="<?php echo !empty($customer['postal_code']) ? $customer['postal_code'] : ''  ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">User Logo :</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="user_logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Country :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="country_code" id="country_code">
                                            <option value="">---Select Country---</option>
                                            <?php
                                            if (!empty($countries)) {
                                                foreach ($countries as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $key ?>" <?php echo !empty($customer['country_code']) && $customer['country_code'] == $key ? 'selected=selected' : ''  ?>><?php echo $value ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label col-md-4">Zone :</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="zone_id" id="zone_id">
                                            <option value="">---Select Zone---</option>
                                            <?php
                                            if (!empty($zones)) {
                                                foreach ($zones as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $key ?>" <?php echo !empty($customer['zone_id']) && $customer['zone_id'] == $key ? 'selected=selected' : ''  ?>><?php echo $value ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-xs-8">
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-success btn-block btn-flat btn-submit">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $("#frm").validate({
            rules: {
                email: {
                    required: true,
                    remote: '<?php echo base_url() ?>' + 'admin/check-email'
                },
                confirm_password: {
                    required: true,
                    minlength:
                        5,
                    equalTo:
                        "#password"
                }
                ,
                setting_password: {
                    required: true,
                    minlength:
                        5
                }
                ,
                confirm_password1: {
                    required: true,
                    minlength:
                        5,
                    equalTo:
                        "#setting_password"
                }
            },
            messages: {
                email: "Email already exists, please try with another email",
                confirm_password:
                    " Enter Confirm Password Same as Password",
                setting_password:
                    " Enter Password(minimum 5 characters)",
                confirm_password1:
                    " Enter Confirm Password Same as Password"
            }
        });
        $("#mac_id").change(function () {
            var mac_id = $("#mac_id").val();
            var msgbox1 = $("#statusmac");
            if (mac_id.length == 12) {
                $('.btn-submit').attr('disabled',false);
                $("#statusmac").html('<img src="<?php echo base_url() ?>data/loader.gif">&nbsp;Checking availability.');
                $("#statusmac").html('<span class="text-danger">Mac id is correct..!</span>');
            }
            else {
                $("#statusmac").html('<span class="text-danger">Please enter your 12 digit Mac Id</span>');
                $('.btn-submit').attr('disabled',true);
                console.log('Enter 12 digit Mac Id' );
            }
            return false;
        });
    })
</script>