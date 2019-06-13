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
                        <h3 class="box-title">Doctor Table</h3>
                        <a class="col-lg-offset-10 btn btn-success" href="{{ route('admin.doctor.create') }}">Add New Doctor</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Qualification</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)

                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td width="20%"><img style="width: 10%;height: auto;" src="{{ asset('images/' . $doctor->images) }}" alt=""></td>
                                    <td>{{ $doctor->qualification }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.doctor.edit',$doctor->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>

                                    <td>
                                        <form id="delete-form{{ $doctor->id }}" method="post" action="{{ route('admin.doctor.destroy',$doctor->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a class="btn btn-danger" href="" onclick="
                                                if (confirm('Are You Sure To Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form{{ $doctor->id }}').submit();
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
