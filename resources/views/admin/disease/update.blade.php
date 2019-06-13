@extends('admin.app')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Disease
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- /.box -->
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Quickly</h3>
                    </div>

                @include('admin.partials._messeges')

                <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.disease.update',$disease->id) }}" class="repeater" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="name">Disease Name</label>
                                    <input type="text" class="form-control" value="{{ $disease->name }}" name="name" id="name">
                                </div>
                            </div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-warning" href="{{route('admin.disease.index')}}">Back</a>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection