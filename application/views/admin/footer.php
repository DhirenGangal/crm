<footer class="main-footer  hidden-print">
    <div class="pull-right hidden-xs">
        <b>Developed by <a href="https://www.sentios.tech" target="_blank">Sentios Systems Private Limited </a></b>
    </div>
    <strong class="">Copyright &copy; <?php echo date('Y') ?> <a  href="#"><?php echo !empty($site_title) ? $site_title : ''; ?></a>.</strong> All rightsreserved.
</footer>
</div>
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.4.1/js/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/pwdstrength.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/custom-script.js"></script>
<script>
    $(document).ready(function () {
        $('form').attr('autocomplete', 'off');
        $('.AlphabetsOnly').keypress(function (e) {
            var regex = new RegExp(/^[a-zA-Z\s]+$/);
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            else {
                alert('Plz enter alphabets only');
                e.preventDefault();
                return false;
            }
        });
        $('.select2').select2({});
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-mask]').inputmask();
        $('.ckeditor').wysihtml5();
        $('#frm').validate();
        $('.sidebar-menu').tree();

        var table = $('.data-table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'colReorder': true,
            'stateSave': true
        });
        $('a.toggle-vis').addClass('btn btn-primary btn-xs');
        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();
            var column = table.column($(this).attr('data-column'));
            column.visible(!column.visible());
            //column.visible(column.visible()) ? ($(this).addClass('btn-danger').removeClass('btn-primary')) : ($(this).removeClass('btn-danger').addClass('btn-primary'));
        });


    })

</script>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
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
    });
    $(document).ready(function () {
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('[data-mask]').inputmask();
    });

</script>
<script>
    $("#frm").validate({
        rules: {
            email: {
                required: true,
                // remote: '<?php echo base_url() ?>' + 'admin/check-email'
            },
            confirm_password: {
                required: true,
                minlength:
                    5,
                equalTo:
                    "#password"
            },
            setting_password: {
                required: true,
                minlength:
                    5
            },
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
    })
    ;
    $(document).ready(function () {
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

        $("#eye").click(function () {

            if ($(this).attr('data-click-state') == 1) {
                $(this).attr('data-click-state', 0).removeClass("glyphicon-eye-open").addClass("glyphicon-eye-close");
                $("#password").attr('type', 'text');

            } else {
                $(this).attr('data-click-state', 1).removeClass("glyphicon-eye-close").addClass("glyphicon-eye-open");
                $("#password").attr('type', 'password');
            }
        });


    });


</script>

</body>
</html>
