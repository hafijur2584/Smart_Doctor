@extends('admin.app')
@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">We Are</h3>
                    <a class="col-lg-offset-10 btn btn-success" href="{{ route('admin.work.create') }}">Add New Works</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>image</th>
                            <th>Number</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($works as $work)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $work->title }}</td>
                                <td width="400" height="auto"><img style="width: 10%;height: auto;" src="{{ asset('images/' . $work->images) }}" alt=""></td>
                                <td>{{ $work->number }}</td>
                                <td><a href="{{ route('admin.work.edit',$work->id) }}" class="btn btn-primary"><i class="fa fa-fw fa-pencil-square-o"></i></a></td>
                                <td>
                                    <form id="delete-form{{ $work->id }}" method="post" action="{{ route('admin.work.destroy',$work->id) }}" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a class="btn btn-danger" href="" onclick="
                                            if (confirm('Are You Sure To Delete This?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form{{ $work->id }}').submit();
                                            }else {
                                            event.preventDefault();
                                            }
                                            "><i class="fa fa-fw fa-trash-o"></i></a>
                                </td>
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