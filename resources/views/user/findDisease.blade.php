@extends('user.app')
@section('css_for_doctor_profile')
    <style>
        header {
            height: auto!important;
        }
        .navbar{
            background-color: #b1bace;
        }
        .address-grid{
            margin-top: 50px;
        }
        .address-grid h4, h4.white-w3ls {
            font-weight: 700;
            font-size: 2em;
            text-transform: uppercase;
            color: #181919;
            letter-spacing: 1px;
        }
        .mail-agileits-w3layouts {
            margin-top: 3em;
        }
        .mail-agileits-w3layouts i {
            color: #0e0e0e;
            font-size: 23px;
            float: left;
            width: 70px;
            height: 70px;
            border: 2px solid #ddd;
            text-align: center;
            line-height: 67px;
        }
        .contact-right {
            padding-left: 2em;
            float: left;
        }
        .card-body p{
            font-size: 35px;
            font-weight: bold;

        }
        table.table thead th {
            border-top: none;
            font-size: 20px;
            font-weight: bold;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            margin-top: 30px;
        }
        .download_button{
            margin-top: 50px;
        }
    </style>
@endsection
@section('mainContent')
    <section id="contactUs">
        <div class="container">
            <div style="    margin-top: 150px;margin-bottom: 150px;" class="row">
                <div class="col-md-12">
                    <div class="show-disease-title-div">
                        <h2 style="font-size: 38px;" class="header-title">Probability Of Of Disease(%)</h2>
                        <div style="margin-bottom: 40px;" class="headerbordertitle-img"><img src="{{ asset('user/images/4hearbeat.png') }}" alt=""></div>

                </div>
                <div class="col-md-12">
                    <div class="show-disease-wrapper">
                        <ul>
                            <?php $hightp = '';$flag = true; ?>
                            @foreach($output as $key=>$o)
                                <?php if($flag){ $hightp=$key;$flag=false; } ?>
                            <li><i class="fa fa-arrow-right"></i><p>Probability Of Having {{$key}}: {{$o}}</p></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="medicine_wrapper">
                        <h3>Height Percentage of disease is: "<span style="font-weight: bold;">{{$hightp}}</span>"</h3>
                        <p>To get best solution please contact with doctor.</p>
                        <p style="color: red;font-size: 20px;">To Get Doctor Appointment: <a href="{{ route('doctor') }}">Click Here</a></p>
                    </div>

                    <div class="medicine_table_wrapper">
                        <h4>Suggestion For Primary Treatment </h4>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Disease Name</th>
                                <th scope="col">Company</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($medicines as $medicine)
                            @foreach($medicine as $m)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$m->name}}</td>
                                    <td>@foreach($diseases as $disease) @if($disease->id == $m->disease_id) {{ $disease->name }} @endif @endforeach</td>
                                    <td>{{$m->company}}</td>
                                </tr>
                            @endforeach
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="download_button pull-right">
                        <a class="btn btn-primary" onclick="javascript:printDiv('contactUs')">Print</a>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;


        }
    </script>

    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--@foreach($doctors as $doctor)--}}
                    {{--<div class="com-md-3">--}}
                        {{--<div class="view">--}}
                            {{--<img src="{{ asset('images/' . $doctor->images) }}" class="img-fluid" alt="Example photo">--}}
                            {{--<a>--}}
                                {{--<div class="mask rgba-white-slight waves-effect waves-light"></div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<!--/.Card image-->--}}

                        {{--<!--Card content-->--}}
                        {{--<div class="card-body text-center">--}}
                            {{--<!--Title-->--}}
                            {{--<h4 class="card-title"><strong>{{ $doctor->specialist }}</strong></h4>--}}
                            {{--<h5>{{ $doctor->name }}</h5>--}}
                            {{--<h6>{{ $doctor->qualification }}</h6>--}}
                            {{--<p>--}}
                                {{--@foreach($hospitals as $hospital)--}}
                                    {{--@if($doctor->hospital_id == $hospital->id)--}}
                                        {{--{{ $hospital->name }}--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</p>--}}
                            {{--<!--Facebook-->--}}
                            {{--<a target="_blank" href="{{ $doctor->fb }}" type="button" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"></i></a>--}}
                            {{--<!--Twitter-->--}}
                            {{--<a target="_blank" href="{{ $doctor->tw }}" type="button" class="btn-floating btn-small btn-tw waves-effect waves-light"><i class="fa fa-twitter"></i></a>--}}
                            {{--<!--instagram +-->--}}
                            {{--<a target="_blank" href="{{ $doctor->ins }}" type="button" class="btn-floating btn-lg btn-ins"><i class="fa fa-instagram"></i></a>--}}

                        {{--</div>--}}
                        {{--<!--/.Card content-->--}}
                        {{--<div class="doctor-profile-overlay">--}}
                            {{--<a class="btn view-pro btn-primary" href="{{ route('doctor_profile',$doctor->id) }}" role="button">View Profile</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection