@extends('admin.app')
@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Table For Medicine
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
                        <h3 class="box-title">Medicine Table</h3>
                        <a class="col-lg-offset-10 btn btn-success" href="{{ route('admin.medicine.create') }}">Add New Medicine</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Medicine Name</th>
                                <th>Company Name</th>
                                <th>Disease Name</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicines as $medicine)

                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicine->company }}</td>
                                    <td>@foreach($diseases as $disease)
                                        @if($medicine->disease_id == $disease->id)
                                            {{ $disease->name }}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td><a class="btn btn-primary" href="{{ route('admin.medicine.edit',$medicine->id) }}"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>

                                    <td>
                                        <form id="delete-form{{ $medicine->id }}" method="post" action="{{ route('admin.medicine.destroy',$medicine->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a class="btn btn-danger" href="" onclick="
                                                if (confirm('Are You Sure To Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form{{ $medicine->id }}').submit();
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
