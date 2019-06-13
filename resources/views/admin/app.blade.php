

@include('admin/layouts/header')
    <!-- Left side column. contains the logo and sidebar -->

@include('admin/layouts/sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.partials._errors')

        <!-- Main content -->
        @section('main-content')
            @show
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin/layouts/footer')
@section('scripts')
@show


