@extends('admin.app')
@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @foreach($disease as $disease)
                @if($id== $disease->id)
                    Set Symptom For {{ $disease->name }}
                @endif
            @endforeach
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
                        <h3 class="box-title">Symptom Table</h3>
                        @include('admin.partials._errors')
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($disease_symptoms->count())
                            @foreach($disease_symptoms as $disease_symptom)

                                <div class="" style="margin:1%;position: relative;width: 18%;background-color: #dceddd;display: inline-block;border-radius: 10px;padding: 10px;">
                                    <span>{{ $disease_symptom->symptom->symptom }}</span>
                                    <a href="{{ route('admin.deletesymptom',$disease_symptom->id) }}" style="position: absolute;top: -5px;right: -5px;background-color: red;height: 20px;width: 20px;border-radius: 50%;padding-left: 7px;color: #ffffff;font-weight: bold;z-index: 10;">&times;</a>
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('admin.updatesymptom',$id) }}" method="post">
                            {{csrf_field()}}
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Symptom Name</th>
                                <th>Select</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($symptoms as $symptom)

                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $symptom->symptom }}</td>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="selectSymptom_{{ $symptom->id }}" style="height: 30px;width: 30px;">
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="row">
                                <div class="col-xs-2 col-xs-offset-10">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
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
