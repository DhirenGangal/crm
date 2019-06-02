<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VSCIE Technologies | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/bootstrap-datepicker.min.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/scie-style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>



        .register-box-body {
            background: #a7949424;
            padding: 50px 20px;
            border-top: 0;
            color: #fff;
        }

        .register-box {
            width: 1000px;
            margin: 0 auto !important;
        }

        .checkbox label {
            font-size: 16px;
        }


        .modal-body p {
            color: #000;
            line-height: 25px;
            font-size: 16px;
        }
        .close {
            float: right;
            font-size: 30px;
            font-weight: 700;
            line-height: 1;
            color: red;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: 1.5;
        }
        .modal-title{
            color: #000;
        }

         .parallax {
             /* The image used */
             background-image: url("../data/reg_bg.jpg") !important;
            min-height: 700px;
             background-attachment: fixed;
             background-position: center;
             background-repeat: no-repeat;
             background-size: cover;
         }

    </style>
</head>
<body class="hold-transition register-page">
<div class="parallax">
<div class="register-box">

    <div class="register-box-body">
        <div class="text-center logo-bg">
        <img src="<?php echo base_url() ?>data/logo.png" />
        </div>
        <h3 class="login-box-msg">Register a new membership</h3>

        <form class="form-horizontal" method="post" id="frm">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Account Name <sup class="text-danger">*</sup>
                                :</label>
                            <div class="col-md-8">
                                <input type="text" name="account_name" class="form-control" required
                                       placeholder="Account name">
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
                                    <option value="RESIDENTIAL">Residential</option>
                                    <option value="COMMERCIAL">Commercial</option>
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
                                    <option value="NEW CONSTRUCTION">New Construction</option>
                                    <option value="REMODEL">Remodel</option>
                                    <option value="RETROFIT">Retrofit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Date Installed :</label>
                            <div class="col-md-8">
                                <input type="text" name="date_installed" class="form-control"
                                       placeholder="Installed Date" id="datepicker">
                                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Mac Id :</label>
                            <div class="col-md-8">
                                <input type="text" name="mac_id" class="form-control" placeholder="Mac Id">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
                                <input type="text" class="form-control" name="company_name" placeholder="Company name">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">First Name :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="first_name" placeholder="First name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Last Name :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Email <sup class="text-danger">*</sup> : </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" required placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="pwd-container">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Password <sup class="text-danger">*</sup> :</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" id="password" required
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
                                       placeholder="Confirm Password">
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
                                       id="setting_password" required
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
                                <input type="password" class="form-control" name="confirm_password1" required
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
                                       data-mask placeholder="Phone Number">
                                <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Address :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address" placeholder="Address">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">City :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="city" placeholder="City">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">State :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="state" placeholder="State">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label col-md-4">Postal Code :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="postal_code" placeholder="Postal Code">

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
                                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
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
                                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-offset-1 col-md-11">
                    <h4>Agreement</h4>
                    <div class="agreement-block text-justify">
                        <?php echo !empty($settings) ? $settings['agreement'] : ''; ?>
                    </div>
                    <div class="checkbox">
                        <label><input name="f1" type="checkbox" required data-validation="required"
                                      data-validation-error-msg="You have to agree to our terms"> <sup
                                    class="text-danger"> * </sup> I have read and accept the above Terms of Use.</label>
                    </div>
                    <div class="checkbox">
                        <label><input name="f1" type="checkbox" value="" data-validation="required"
                                      data-validation-error-msg="You have to agree to our Privacy Policy"> <sup
                                    class="text-danger"> * </sup> I have read and accept the <a href="#" class="privacy"
                                                                                                data-toggle="modal"
                                                                                                data-target="#myModal">
                                Privacy Policy</a></label>
                    </div>
                    <div class="checkbox">
                        <label><input name="f1" type="checkbox" value="" data-validation="required"
                                      data-validation-error-msg="you have to agree to the condition"> <sup
                                    class="text-danger"> * </sup>I allow my system to be remotely accessed by my
                            dealer/installer or Vscie technical support personnel.</label>
                    </div>
                    <div class="checkbox">
                        <label><input name="f1" type="checkbox" value="" data-validation="required"
                                      data-validation-error-msg="you have to agree to the condition"> <sup
                                    class="text-danger"> * </sup>I wish to receive periodic product and
                            promotionalinformation from Vscie via e-mail.</label>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Privacy Policy</h4>
                        </div>
                        <div class="modal-body text-justify">
                            <?php echo !empty($settings) ? $settings['privacy_policy'] : ''; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-8">

                    </div>


                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Register</button>
                    </div>
                </div>
            </div>

        </form>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url() ?>owner/" class="text-center privacy">I already have a membership</a>
            </div>
        </div>


    </div>
    <!-- /.form-box -->
</div>
</div>


<script src="<?php echo base_url() ?>assets/lib/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/pwdstrength.js"></script>

<script>
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
    })
    $(document).ready(function () {

        $('#datepicker').datepicker({
            autoclose: true
        });
        $('[data-mask]').inputmask();

    });

</script>
<script>

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
            email : "Email already exists, please try with another email",
            confirm_password:
                " Enter Confirm Password Same as Password",
            setting_password:
                " Enter Password(minimum 5 characters)",
            confirm_password1:
                " Enter Confirm Password Same as Password"
        }
    })
    ;
    $(document).ready(function(){
        $("#password").keyup(function(){

            var value = $("#password").val();
            var strength = value.length;
            if(strength > 0){
                $(".process").show();
                $("#bar").addClass("progress-bar-danger").html("poor") ;
                $("#eye").show();

                if(strength > 2){
                    $("#bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar-warning").css("width","30%").html("Weak ") ;
                }if(strength > 4){
                    $("#bar").css("width","60%").html("Medium").removeClass("progress-bar-success").addClass("progress-bar-warning") ;
                }
                if(strength > 6){
                    $("#bar").removeClass("progress-bar-warning").addClass("progress-bar-success").css("width","100%").html("Strong ") ;
                }

            }else{
                $("#bar").removeClass("progress-bar-warning").removeClass("progress-bar-success").addClass("progress-bar-danger").css("width","10%").html("poor ") ;
                $("#eye").hide();
                $(".process").hide();
            }

        });

        $("#eye").click(function(){

            if($(this).attr('data-click-state') == 1) {
                $(this).attr('data-click-state', 0).removeClass("glyphicon-eye-open").addClass("glyphicon-eye-close");
                $("#password").attr('type','text');

            } else {
                $(this).attr('data-click-state', 1).removeClass("glyphicon-eye-close").addClass("glyphicon-eye-open");
                $("#password").attr('type','password');

            }


        });

    });


</script>
</body>
</html>
