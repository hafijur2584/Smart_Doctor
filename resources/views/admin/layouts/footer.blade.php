<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Developed By <a href="www.antooba.com">Smart Doctor</a></b>
    </div>
    <strong>Copyright &copy; 2018 <a href="www.gravview.com">Smart Doctor</a>.</strong> All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/bower_components/jquery-ui/jquery-ui.min.j') }}s"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
{{--<script src="{{ asset('admin/bower_components/raphael/raphael.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/bower_components/morris.js/morris.min.js') }}"></script>--}}
<!-- Sparkline -->
<script src="{{ asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
{{--<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->

<script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<script>
    $(function () {

        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>

<script>
    $(document).ready(function () {
        $(".select2").select2();
    })
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
</body>
</html>