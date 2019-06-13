@extends('admin.app')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Added New Medicine
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
                    <form role="form" action="{{ route('admin.medicine.update',$medicine->id) }}" class="repeater" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ $medicine->name }}" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" value="{{ $medicine->company }}" name="company" id="company">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Medicine For Disease</label>
                                    <select name="disease_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option selected="selected">Select Here</option>
                                        @foreach($diseases as $disease)
                                            <option @if($medicine->disease_id == $disease->id) selected @endif value="{{ $disease->id }}" >{{ $disease->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-warning" href="{{route('admin.medicine.index')}}">Back</a>
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