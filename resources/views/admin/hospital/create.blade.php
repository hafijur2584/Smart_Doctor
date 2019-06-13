@extends('admin.app')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create New Hospital
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
                    <form role="form" action="{{ route('admin.hospitals.store') }}" class="repeater" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" value="" name="title" id="name">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="" name="address" id="address">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="text" class="form-control" value="" name="discount" id="discount">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" value="" name="slug" id="slug">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Select Logo</label>
                                    <input type="file" name="logo" id="exampleInputFile">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Select Image</label>
                                    <input type="file" name="images" id="exampleInputFile">
                                </div>
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

                                 <textarea id="editor1" name="description"
                                           style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                                 </textarea>

                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 style="margin-left: 30px;">Hospital Services</h3>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <div data-repeater-list="group_a" class="form-group">
                                    <div data-repeater-item style="margin-bottom: 10px;">
                                        <div class="row">
                                            <div class="col-xs-11">
                                                <div class="form-group">
                                                    <label for="service">Service</label>
                                                    <input type="text" class="form-control" value="" name="service" id="service">
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <input data-repeater-delete type="button" style="margin-top: 25px;" class="btn btn-warning" value="Delete"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success" value="Add"/>

                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a class="btn btn-warning" href="{{route('admin.hospitals.index')}}">Back</a>
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
@section('scripts')
    <script src="{{ asset('js/repeater.js') }}"></script>
    <script>
        function addImage(val, el) {
            var images = $('#images').val();
            console.log(images.indexOf('_'+val+'_'));
            if(images.indexOf('_'+val+'_')>=0){
                images = images.replace('_'+val+'_,','');
                if(images.indexOf('_'+val+'_')>=0){
                    images = images.replace(',_'+val+'_','');
                }
                el.style.border = '1px solid #ddd';
                $('#images').val(images);
            } else {
                if(images!==''){
                    images =images+',_'+val+'_';
                } else {
                    images = '_'+val+'_';
                }
                el.style.border = '2px solid green';
                $('#images').val(images);
            }
        }

        function addImage2(val, el) {
            var images = $('#images2').val();
            console.log(images.indexOf('_'+val+'_'));
            if(images.indexOf('_'+val+'_')>=0){
                images = images.replace('_'+val+'_,','');
                if(images.indexOf('_'+val+'_')>=0){
                    images = images.replace(',_'+val+'_','');
                }
                el.style.border = '1px solid #ddd';
                $('#images2').val(images);
            } else {
                if(images!==''){
                    images =images+',_'+val+'_';
                } else {
                    images = '_'+val+'_';
                }
                el.style.border = '2px solid green';
                $('#images2').val(images);
            }
        }

        var i = 0;

        $('.repeater').repeater({
            initEmpty: true,
            show: function () {
                if(i==0){
                    $(this).slideDown();
                    i++;
                } else {
                    i=0;
                }
            },
            hide: function (deleteElement) {
                if(i==0){
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                    i++;
                } else {
                    i=0;
                }

            },
            ready: function (setIndexes) {
                $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: true
        });

        $('#has_video').change(function() {
            if($(this).is(":checked")) {
                $('#3rd_slider').css('display','none');
                $('#video_content').css('display','block');
            } else {
                $('#3rd_slider').css('display','block');
                $('#video_content').css('display','none');
            }
        });

    </script>
@endsection