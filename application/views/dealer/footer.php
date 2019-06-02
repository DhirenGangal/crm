<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Developed by <a href="https://www.sentios.tech" target="_blank">Sentios Systems Private Limited </a></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="#"><?php echo !empty($site_title) ? $site_title : ''; ?></a>.</strong> All rights
    reserved.
</footer>
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/lib/js/jquery.validate.min.js"></script>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        tinymce.init({
            selector: "textarea.ckeditor",
            plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
            convert_urls: false,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
        $('#frm').validate();
        $('.sidebar-menu').tree()
        $('.data-table').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
        console.clear();
    })

</script>
</body>
</html>
