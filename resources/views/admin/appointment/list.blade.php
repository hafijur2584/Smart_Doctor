@extends('admin.app')
@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Appointment Table
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
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Doctor Name</th>
                                <th>User Name</th>
                                <th>Hospital Name</th>
                                <th>User Email</th>
                                <th>Code</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)

                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $appointment->doctor_name }}</td>
                                    <td>{{ $appointment->user_name }}</td>
                                    <td>{{ $appointment->hospital_name }}</td>
                                    <td>{{ $appointment->user_email }}</td>
                                    <td>{{ $appointment->code }}</td>

                                    <td>
                                        <form id="delete-form{{ $appointment->id }}" method="post" action="{{ route('admin.appointment.destroy',$appointment->id) }}" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a class="btn btn-danger" href="" onclick="
                                                if (confirm('Are You Sure To Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form{{ $appointment->id }}').submit();
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
