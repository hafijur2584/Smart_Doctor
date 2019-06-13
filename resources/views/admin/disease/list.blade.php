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
                        <h3 class="box-title">Disease Table</h3>
                        <a class="col-lg-offset-10 btn btn-success" href="{{ route('admin.disease.create') }}">Add New Disease</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Disease Name</th>
                                <th>Update</th>
                                <th>Delete</th>
                                <th>Set Symptom</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($diseases as $disease)

                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $disease->name }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.disease.edit',$disease->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>

                                    <td>
                                        <form id="delete-form{{ $disease->id }}" method="post" action="{{ route('admin.disease.destroy',$disease->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a class="btn btn-danger" href="" onclick="
                                                if (confirm('Are You Sure To Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form{{ $disease->id }}').submit();
                                                }else {
                                                event.preventDefault();
                                                }
                                                "><i class="fa fa-fw fa-trash-o"></i></a>
                                    </td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.setsymptom',$disease->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>
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
