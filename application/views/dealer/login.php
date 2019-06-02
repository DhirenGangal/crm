<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCIE Technologies | Log in</title>
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
        background-image: url("../data/bg.jpg") !important;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        width:100%;
        height: 100%;
    }


</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <p><?php echo getMessage()?></p>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-logo">
            <a href="#"><b><?php echo !empty($title) ? $title : '' ?></b></a>
        </div>
        <p class="login-box-msg">Sign in to start your session</p>

        <form id="frm" method="post">
            <input type="hidden" name="LOGIN" value="true"/>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control required" placeholder="Email" autofocus="autofocus">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control required" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  <!--  <a href="<?php /*echo base_url() */?>dealer/dashboard" role="button" class="btn btn-primary btn-block btn-flat">Sign In</a>-->
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="<?php echo base_url() ?>dealer/forgot-password">I forgot my password</a><br>
        </div>



    </div>
</div>




<script src="<?php echo base_url() ?>assets/lib/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script>

        $(document).ready(function(){
            $('#frm').validate();

    });
</script>
</body>
</html>
