@extends('admin.app')
@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Hospital Table</h3>
                        @include('admin.partials._errors')
                        <a class="col-lg-offset-10 btn btn-success" href="{{ route('admin.hospitals.create') }}">Add New Hospital</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Address</th>
                                <th>Discount</th>
                                <th>Slug</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hospitals as $hospital)

                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $hospital->name }}</td>
                                    <td width="20%"><img style="width: 20%;height: auto;" src="{{ asset('images/' . $hospital->logo) }}" alt=""></td>
                                    <td>{{ $hospital->address }}</td>
                                    <td>{{ $hospital->discount }}</td>
                                    <td>{{ $hospital->slug }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.hospitals.edit',$hospital->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>

                                    <td>
                                        <form id="delete-form{{ $hospital->id }}" method="post" action="{{ route('admin.hospitals.destroy',$hospital->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a class="btn btn-danger" href="" onclick="
                                                if (confirm('Are You Sure To Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form{{ $hospital->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }
                                                "><i class="fa fa-fw fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->


@endsection
