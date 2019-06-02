<style>
    .sub-fa{
        width: 30px;
        height: 30px;
        font-size: 15px;
        line-height: 30px;

        color: #666;
        background: #d2d6de;
        border-radius: 50%;
        text-align: center;

    }
    p.subscr{
        font-size: 18px;
        font-weight: 600;
    }
</style>
<div class="content-wrapper">
    <div class="container">
    <section class="content-header">
        <h1>Profile</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Profile</h3>
                <div class="box-tools">
                    <?php
                    $created_date =  date('Y-m-d');
                    $end_date =  !empty($profile['subscr_end_date']) ? $profile['subscr_end_date'] : '';
                    $output = round(abs(strtotime($end_date)-strtotime($created_date))/86400);
                    ?>
                    <p class="text-danger subscr">Your subscription ends in <i class="fa sub-fa bg-purple"><?php echo !empty($output) ? $output :'0' ?></i> days </p>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="hidden" name="user_id" value="<?php echo !empty($profile['user_id']) ? $profile['user_id'] : ''; ?>"/>
                            <input type="hidden" name="dealer_id" value="<?php echo !empty($profile['dealer_id']) ? $profile['dealer_id'] : ''; ?>"/>
                            <input type="hidden" name="mac_id" value="<?php echo !empty($profile['mac_id']) ? $profile['mac_id'] : ''; ?>"/>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Account Name </label>
                                    <div class="col-md-8">
                                        <input type="text" name="account_name" data-validation="alphanumeric" class="form-control" readonly  placeholder="Account Name" value="<?php echo !empty($profile['account_name']) ? $profile['account_name'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Installation Type <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="installation_type" class="form-control" required placeholder="Installation Type" value="<?php echo !empty($profile['installation_type']) ? $profile['installation_type'] : '' ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Project Type <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="project_type" class="form-control" required placeholder="Project Type" value="<?php echo !empty($profile['project_type']) ? $profile['project_type'] : '' ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date Installed <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="date_installed" class="form-control" required placeholder="Date Installed" value="<?php echo !empty($profile['date_installed']) ? dateDB2SHOW($profile['date_installed']) : '' ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Subs. End Date <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="subscr_end_date" class="form-control" required placeholder="Subsription End Date"  value="<?php echo !empty($profile['subscr_end_date']) ? dateDB2SHOW($profile['subscr_end_date']) : '' ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Dealer Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="dealer_name" class="form-control" placeholder="Dealer Name" value="<?php echo !empty($profile['dealer_name']) ? $profile['dealer_name'] : '' ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="first_name" class="form-control" required  placeholder="First Name" value="<?php echo !empty($profile['first_name']) ? $profile['first_name'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo !empty($profile['last_name']) ? $profile['last_name'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Company Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="<?php echo !empty($profile['company_name']) ? $profile['company_name'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" required placeholder="Email" value="<?php echo !empty($profile['email']) ? $profile['email'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Password <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password" required placeholder="Password" value="<?php echo !empty($profile['password']) ? $profile['password'] : '' ?>"/>
                                            <span  class="input-group-addon" ><i id="pwd_eye" class="fa fa-eye" data-click-state="1"></i></span>

                                    </div>
                                        <div class="process" style="display:none"><p> </p>
                                            <div class="progress">
                                                <div id="bar"
                                                     class="progress-bar progress-bar-danger progress-bar-striped active"
                                                     style="width: 10%;">
                                                    Poor 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Confirm Password <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="password" name="confirm_password" required class="form-control" placeholder="Confirm Password" value="<?php echo !empty($profile['confirm_password']) ? $profile['confirm_password'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Setting Password <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                        <input type="password" name="setting_password" class="form-control" id="setting_password" required placeholder="Setting Password" value="<?php echo !empty($profile['setting_password']) ? $profile['setting_password'] : '' ?>"/>
                                            <span  class="input-group-addon" ><i id="set_pwd_eye" class="fa fa-eye" data-click-state="1"></i></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label col-md-4">Confirm Setting Password <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">

                                            <input type="password" name="confirm_password1" required class="form-control" placeholder="Confirm Password" value="<?php echo !empty($profile['confirm_password1']) ? $profile['confirm_password1'] : '' ?>"/>

                                        </div>

                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <?php
                                        if($profile['is_active'] == '1'){
                                            $sta = 'ACTIVE';
                                        }else{
                                            $sta = 'IN-ACTIVE';
                                        }
                                        ?>
                                        <input type="text" name="status" class="form-control" placeholder="Status" value="<?php echo !empty($sta) ? $sta : '' ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone </label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone_no" class="form-control" placeholder="Phone" value="<?php echo !empty($profile['phone_no']) ? $profile['phone_no'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <input type="text" name="address" class="form-control"  placeholder="Address" value="<?php echo !empty($profile['address']) ? $profile['address'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">City <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="city" class="form-control" required placeholder="City" value="<?php echo !empty($profile['city']) ? $profile['city'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">State/Province <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="state" required>
                                            <option value="">Select State</option>
                                            <?php
                                            if(!empty($states)){
                                                foreach ($states as $k=>$v){
                                                    ?>
                                                    <option value="<?php echo $k ?>" <?php echo !empty($profile['state']) && ($k==$profile['state']) ? 'selected=selected' : ''; ?>><?php echo $v; ?></option>
                                                    <?php
                                                }
                                            }

                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Postal Code <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <input type="text" name="postal_code" class="form-control" required placeholder="Postal Code" value="<?php echo !empty($profile['postal_code']) ? $profile['postal_code'] : '' ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Country <sup class="text-danger">*</sup></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="country_code" id="country_code" required>
                                            <option value="">Select Country</option>
                                            <?php
                                            if(!empty($countries)){
                                                foreach ($countries as $k=>$v){
                                                    ?>
                                            <option value="<?php echo $k ?>" <?php echo !empty($profile['country_code']) && ($k==$profile['country_code']) ? 'selected=selected' : ''; ?>><?php echo $v; ?></option>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Time zone  </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="zone_id" id="zone_id">
                                            <option value="">--Select Zone--</option>
                                            <?php
                                            if(!empty($zones)){
                                                foreach ($zones as $k=>$v){
                                                    ?>
                                                    <option value="<?php echo $k ?>" <?php echo !empty($profile['zone_id']) && ($k==$profile['zone_id']) ? 'selected=selected' : ''; ?>><?php echo $v; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4"> Profile Picture</label>
                                    <div class="col-md-8">
                                        <input type="file" name="user_logo" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h4>Profile Picture</h4>
                            <?php
                            $img = (!empty($profile['user_logo']) && file_exists(FCPATH."data/profile/".$profile['user_logo']))? "data/profile/".$profile['user_logo'] : '';
                            ?>
                            <img src="<?php echo !empty($img) ?base_url(). $img : dummyLogo()  ?>" alt="Profile Pic" class="profile-pic">
                        </div>
                    </div>

                </form>
            </div>
            <div class="box-footer">
                <div class="pull-right">
                    <button form="frm" type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </section>
    </div>
</div>
<script>
    $("#pwd_eye").click(function () {
        if ($(this).attr('data-click-state') == 1) {
            $(this).attr('data-click-state', 0).removeClass("fa-eye").addClass("fa-eye-slash");
            $("#password").attr('type', 'text');

        } else {
            $(this).attr('data-click-state', 1).removeClass("fa-eye-slash").addClass("fa-eye");
            $("#password").attr('type', 'password');

        }


    });
    $("#set_pwd_eye").click(function () {
        if ($(this).attr('data-click-state') == 1) {
            $(this).attr('data-click-state', 0).removeClass("fa-eye").addClass("fa-eye-slash");
            $("#setting_password").attr('type', 'text');

        } else {
            $(this).attr('data-click-state', 1).removeClass("fa-eye-slash").addClass("fa-eye");
            $("#setting_password").attr('type', 'password');

        }


    });
    $('#country_code').on("change", function () {
        var country_code = $(this).val();
        console.log(country_code);
        if ((country_code == "") || (country_code == null)) {
            $('#zone_id').empty();
        }
        else {
            $('#zone_id').empty();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>" + "admin/fetch_zones/?country_code=" + country_code,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $('#zone_id').append($("<option></option>").attr("value", "").text("-- Select a Zone --"));
                    $.each(data, function (key, value) {
                        $('#zone_id').append($("<option></option>").attr("value", key).text(value));
                    });
                }
            });
        }
    });

    $(document).ready(function () {
        $("#frm").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                setting_password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                confirm_password1: {
                    required: true,
                    minlength: 5,
                    equalTo: "#setting_password"
                }
            },
            messages: {
                password: " Enter Password(minimum 5 characters)",
                confirm_password: " Enter Confirm Password Same as Password",
                setting_password: " Enter Setting Password(minimum 5 characters)",
                confirm_password1: " Enter Confirm Password Same as Setting Password"
            }
        });
        $("#password").keyup(function () {

            var value = $("#password").val();
            var strength = value.length;
            if (strength > 0) {
                $(".process").show();
                $("#bar").addClass("progress-bar-danger").html("poor");
                $("#eye").show();

                if (strength > 2) {
                    $("#bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar-warning").css("width", "30%").html("Weak ");
                }
                if (strength > 4) {
                    $("#bar").css("width", "60%").html("Medium").removeClass("progress-bar-success").addClass("progress-bar-warning");
                }
                if (strength > 6) {
                    $("#bar").removeClass("progress-bar-warning").addClass("progress-bar-success").css("width", "100%").html("Strong ");
                }

            } else {
                $("#bar").removeClass("progress-bar-warning").removeClass("progress-bar-success").addClass("progress-bar-danger").css("width", "10%").html("poor ");
                $("#eye").hide();
                $(".process").hide();
            }

        });
    });
</script>
