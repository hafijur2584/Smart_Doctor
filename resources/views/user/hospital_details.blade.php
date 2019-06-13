@extends('user.app')
@section('doc_min')
    <link rel="stylesheet" href="{{ asset('user/css/docs.theme.min.css/') }}">
@endsection
@section('styles')
    <style>
        header{
            height: 11%!important;
        }
        .page-title-details.text-center {
            background-color: #fff;
            padding: 10px;
            color: #00B1E3;
            margin-bottom: 50px;
            box-shadow: 0px 10px 20px 3px #e1e1e1;

        }

        a.border-title {
            border: 1px solid #fff;
            width: 30%;
            margin: 0 auto;
            font-size: 2rem;
            color: #fff;
        }

        .hospital-wrapper-details {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .service-list ul li {
            list-style: none;
            margin-bottom: 10px;
            border-bottom: solid 3px rgba(0,177,227,0.5);
            padding-bottom: 10px;

        }

        .service-list ul span {
            margin-right: 10px;
            color: #00B1E3;
            font-size: 20px;
        }

        .wel-details-left {
            position: relative;
            padding-right: 25px;
        }
        .wel-details-left p{
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
            text-transform: capitalize;
        }
        .wel-details-title{
            font-size: 20px;
            font-family: 'Roboto', sans-serif;
            text-transform: uppercase;
            font-weight: 500;
        }
        .wel-details-left p{
            color:#555555 ;
        }
        .wel-details-left::before {
            content: " ";
            right: 0;
            bottom: 0;
            top: 30px;
            background-color: #f5f5f5;
            height: 100%;
            width: 2px;
            position: absolute;
        }

        .active-day {
            background-color: #00C0F3 !important;
        }

        .day-work ul li {
            display: inline-block;
            list-style: none;
            background-color: #222;
            color: #fff;
            height: 40px;
            width: 40px;
            padding: 8px;
            text-transform: capitalize;
            margin-bottom: 10px;
        }

        .candidate-list-wrapper {
            margin-bottom: 30px;
            box-shadow: 0px 10px 20px 3px #e1e1e1;
            -webkit-transition: 0.5s ease-in-out;
            -moz-transition: 0.5s ease-in-out;
            -ms-transition: 0.5s ease-in-out;
            -o-transition: 0.5s ease-in-out;
            transition: 0.5s ease-in-out;
        }

        .candodate-profile {
            padding: 10px;
        }

        .candidate-img img {
            height: 250px;
            width: 100%;
        }

        .combine-all-work {
            padding: 15px;
        }

        .time-time-c {
            background-color: #00B1E3;
            color: #fff;
            padding: 5px 10px;
        ;
        }

        .work-time {
            margin-bottom: 10px;
        }
        input.form-control.footr-search {
            border-radius: 0;
        }
        .hidden {display:none;}

    </style>
@endsection
@section('mainContent')
    {{--<!--Main Layout-->--}}
    {{--<main class="text-center py-5 des">--}}

        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="offset-md-1 col-md-10">--}}
                    {{--<div class="des-smart-doctor">--}}
                        {{--<h1 class="indigo-text">Smart Doctor</h1>--}}
                        {{--<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit,--}}
                            {{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
                            {{--Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip--}}
                            {{--ex ea commodo consequat. Duis aute irure dolor in reprehenderit in--}}
                            {{--voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
                            {{--Excepteur sint occaecat cupidatat non proident, sunt in culpa--}}
                            {{--qui officia deserunt mollit anim id est laborum. Lorem ipsum--}}
                            {{--dolor sit amet, consectetur adipiscing elit, sed do eiusmod--}}
                            {{--tempor incididunt ut labore et dolore magna aliqua. Ut enim--}}
                            {{--ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</main>--}}
    {{--<!--Main Layout-->--}}

    <!--   food details page-->
    <section style="background-image: url({{ asset('images/'.$hospital->images) }});background-size: cover;background-position: center;" class="food-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-md-8 offset-md-2">
                    <div class="banner-content text-center"> <img src="{{ asset('images/' . $hospital->logo) }}" class="single-item-img" alt="">
                        <div class="restaurent-description mt-10">
                            <h4 class="r-title">{{ $hospital->name }}</h4> <small class="company-type">
                                <span class="item-list">{{ $hospital->address }}</span>
                            </small> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hospital-wrapper-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="wel-details-left">
                        <h3 class="wel-details-title">{{ $hospital->title }}</h3>
                        {!! $hospital->description !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wel-details-right">
                        <h3 class="wel-details-title">Supported Service</h3>
                        <div class="service-list">
                            <ul>
                                @foreach($service as $service)
                                    <li><span><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>{{$service->service}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #efebe9;" id="demos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="popular_doctor_div">
                        <h2>Doctors</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                        @foreach($doctors as $doctor)
                        <div class="item">
                            <div class="card card-cascade">

                                <!--Card image-->
                                <div class="view">
                                    <img src="{{ asset('images/' . $doctor->images) }}" class="img-fluid" alt="Example photo">
                                    <a>
                                        <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->

                                <!--Card content-->
                                <div class="card-body text-center">
                                    <!--Title-->
                                    <h4 class="card-title"><strong>{{ $doctor->specialist }}</strong></h4>
                                    <h5>{{ $doctor->name }}</h5>
                                    <h6>{{ $doctor->qualification }}</h6>
                                    <p>{{ $hospital->name }}</p>
                                    <!--Facebook-->
                                    <a target="_blank" href="{{ $doctor->fb }}" type="button" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                                    <!--Twitter-->
                                    <a target="_blank" href="{{ $doctor->tw }}" type="button" class="btn-floating btn-small btn-tw waves-effect waves-light"><i class="fa fa-twitter"></i></a>
                                    <!--instagram +-->
                                    <a target="_blank" href="{{ $doctor->ins }}" type="button" class="btn-floating btn-lg btn-ins"><i class="fa fa-instagram"></i></a>

                                </div>
                                <!--/.Card content-->
                                <div class="doctor-profile-overlay">
                                    <a class="btn view-pro btn-primary" href="{{ route('doctor_profile',$doctor->id) }}" role="button">View Profile</a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <script>
                        $(document).ready(function() {
                            var owl = $('.owl-carousel');
                            owl.owlCarousel({
//                                items: 3,
                                loop: true,
                                margin: 10,
                                autoplay: true,
                                autoplayTimeout: 3000,
                                autoplayHoverPause: true,
                                responsive:{
                                    0:{
                                        items:1
                                    },
                                    600:{
                                        items:2
                                    },
                                    1000:{
                                        items:4
                                    }
                                }
                            });
                            $('.play').on('click', function() {
                                owl.trigger('play.owl.autoplay', [1000])
                            })
                            $('.stop').on('click', function() {
                                owl.trigger('stop.owl.autoplay')
                            })
                        })
                    </script>
                </div>
            </div>
        </div>
    </section>
@endsection
