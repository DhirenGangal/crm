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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/css/scie-style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>

        .login-page, .register-page{
            background-image: url("../../data/bg.jpg") !important;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            width:100%;
            height: 100%;
        }

        .has-feedback label~.form-control-feedback {
            top: 0;
        }
        body{
            overflow: hidden;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <p><?php echo getMessage()?></p>
    <div class="login-box-body">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>admin/"><b><img src="<?php echo base_url(); ?>data/logo.png"> </b></a>
        </div>
        <div class="login-box-msg">

            <h4><i class="fa fa-key"></i> Reset Password</h4>
        </div>
        <form id="frm"  method="post">
            <input type="hidden" name="RESET" value="TRUE" />
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autofocus="autofocus" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="confirm_password"  class="form-control" placeholder="Confirm Password"  required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                </div>
            </div>
        </form>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="<?php echo base_url() ?>"><i class="fa fa-arrow-left"></i> Back to Home</a><br>
        </div>
    </div>
</div>



<script src="<?php echo base_url() ?>assets/lib/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap.min.js"></script>


<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script>
    $(function () {

            $("#frm").validate({
                rules: {
                    password: {
                        required: true,
                        minlength:
                            5
                    }
                    ,

                    confirm_password: {
                        required: true,
                        minlength:
                            5,
                        equalTo:
                            "#password"
                    }

                },
                messages: {
                    password: " Enter Password(minimum 5 characters)",
                    confirm_password: " Enter Confirm Password Same as Password",

                }
            });

    });
</script>
</body>
</html>
