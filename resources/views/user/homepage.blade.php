@extends('user.app')
@section('doc_min')
    <link rel="stylesheet" href="{{ asset('user/css/docs.theme.min.css/') }}">
@endsection
@section('slider_homepage')
    @include('user.layouts.slider_homepage')
@endsection
@section('mainContent')
    <!--Main Layout-->
    <main class="text-center py-5 des">

        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <div class="des-smart-doctor">
                        <h2 class="header-title">Smart Online Doctor</h2>
                        <div style="    margin-bottom: 55px;" class="headerbordertitle-img"><img src="{{ asset('user/images/4hearbeat.png') }}" alt=""></div>
                        <p align="justify">Bangladesh is a small country with a lot of probabilities. Besides many other sectors our health care sector is improving day by day. Though health care facility of the country is not adequate according to its demand, the government is sincere to improve the present condition. . I think this small step, providing a computer based patient information recording and preserving system will contribute to minimize the problem in the health sector of the country.

                            The purpose of the online smart doctor system is to serve the people by providing computer based information recording system and allowing a complete prescribing facility to the physicians or the doctors with the related options of medical terminology. The authority or the doctors from another location or from the remote location will be able to retrieve the information provided by the patients through ensuring proper authentication from a central database.
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </main>
    <!--Main Layout-->

    <section class="main-content-wrapper text-center section-padding">
        <div class="container">
            <style>
                ._how-it-works p{
                    font-size: 14px;
                    font-family: 'Source Sans Pro', sans-serif;
                    text-transform: capitalize;
                    margin-top: 10px;
                    color: #555555!important;
                }
            </style>
            <h2 class="header-title">How It Works</h2>
            <div class="headerbordertitle-img"><img src="{{ asset('user/images/4hearbeat.png') }}" alt=""></div>
            <div class="row">
                @foreach($works as $work)
                <div class="col-xl-3 col-md-3 col-sm-12" style="margin-bottom: 35px;">
                    <div class="_how-it-works">
                        <img class="process_logo" src="{{ asset('images/' . $work->images) }}" alt="">
                        <h3 class="process-title">{{ $work->title }}</h3>
                        {{--<p class="process-details">{{ $work->description }}</p>--}}
                        {!! $work->description !!}
                        <span class="badge badge-light num-badge">{{ $work->number }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section style="background: #efebe9;" id="demos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-title">Popular Doctors</h2>
                    <div style="margin-bottom: 40px;" class="headerbordertitle-img"><img src="{{ asset('user/images/4hearbeat.png') }}" alt=""></div>
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
                                        <p>
                                            @foreach($hospitals as $hospital)
                                                @if($doctor->hospital_id == $hospital->id)
                                                 {{ $hospital->name }}
                                                @endif
                                            @endforeach
                                        </p>
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