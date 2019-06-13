@extends('admin.app')

@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Team Member
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
                        <h3 class="box-title">Quick Example</h3>
                        @include('admin.partials._messeges')

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.team.update',$team->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{ $team->name }}" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="{{ $team->title }}" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="institution">Institution</label>
                                <input type="text" class="form-control" value="{{ $team->institution }}" name="institution" id="institution">
                            </div>
                            <div class="form-group">
                                <label for="fb">Facebook</label>
                                <input type="text" class="form-control" value="{{ $team->fb }}" name="fb" id="fb">
                            </div>
                            <div class="form-group">
                                <label for="tw">Tweeter</label>
                                <input type="text" class="form-control" value="{{ $team->tw }}" name="tw" id="tw">
                            </div>
                            <div class="form-group">
                                <label for="lin">Linked In</label>
                                <input type="text" class="form-control" value="{{ $team->lin }}" name="lin" id="lin">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input name="images" type="file" id="exampleInputFile">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Description
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                            title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">



                <textarea name="description" class="textarea"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{ $team->description }}
                </textarea>


                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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