@extends('admin.app')
@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">We Are</h3>
                    @include('admin.partials._errors')


                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>image</th>
                            <th>Update</th>
                        </tr>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->title }}</td>
                                <td width="400" height="auto"><img style="width: 10%;height: auto;" src="{{ asset('images/' . $team->images) }}" alt=""></td>
                                <td><a href="{{ route('admin.team.edit',$team->id) }}" class="btn btn-primary"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


@endsection