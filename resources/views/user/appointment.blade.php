@extends('user.app')
@section('doc_min')
    <link rel="stylesheet" href="{{ asset('user/css/docs.theme.min.css/') }}">
@endsection
@section('styles')
    <style>
        header{
        height: 10%!important;
        }
    </style>
@endsection
@section('mainContent')
    <!--Main Layout-->
    <main class="text-center py-5 des">

        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="des-smart-doctor">
                        <h1 class="indigo-text">Doctor Appointment</h1>
                        <!-- Default form register -->
                        <form role="form" action="{{ route('admin.appointment.store') }}" method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
                            {{ csrf_field() }}
                            <div class="form-row mb-4">
                                <div class="col-md-6">
                                    <!-- First name -->
                                    <label style="text-align: left;" for="exampleInputEmail1">Doctor Name</label>
                                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="doctor_name" value="{{ $doctor->name }}" readonly placeholder="{{ $doctor->name }}">
                                </div>
                                <div class="col-md-6">
                                    <!-- Last name -->
                                    <label style="text-align: left;" for="exampleInputEmail1">Doctor Availability</label>
                                    <select name="availability" class="browser-default custom-select">
                                        <option selected>Select Date And Time</option>
                                        @foreach($availability as $availability)
                                        <option value="{{ $availability->day }} {{ $availability->from }} - {{ $availability->to }}">{{ $availability->day }} {{ $availability->from }} - {{ $availability->to }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- E-mail -->
                            <label style="text-align: left;" for="exampleInputEmail1">Hospital Name</label>
                            <input type="text" id="exampleInputEmail1" class="form-control" name="hospital_name" value="@foreach($hospitals as $hospital) @if($hospital->id == $doctor->hospital_id) {{ $hospital->name }} @endif @endforeach " readonly placeholder="@foreach($hospitals as $hospital) @if($hospital->id == $doctor->hospital_id) {{ $hospital->name }} @endif @endforeach ">

                            <!-- E-mail -->
                            <label style="text-align: left;" for="exampleInputEmail1">User Name</label>
                            <input type="text" id="exampleInputEmail1" class="form-control" name="user_name" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}">

                            <label style="text-align: left;" for="exampleInputEmail1">User Email</label>
                            <input type="text" id="exampleInputEmail1" name="user_email" class="form-control" value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}">
                            <input hidden type="text" id="exampleInputEmail1" name="user_id" value="{{ Auth::user()->id }}" >
                            <input hidden type="text" id="exampleInputEmail1" name="doctor_id" value="{{ $doctor->id }}" >




                            <!-- Sign up button -->
                            <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>

                            <hr>

                        </form>
                        <!-- Default form register -->
                    </div>

                </div>



            </div>
        </div>

    </main>
    <!--Main Layout-->
@endsection
