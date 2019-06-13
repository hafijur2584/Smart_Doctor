@extends('user.app')
@section('css_for_doctor_profile')
    <style>
        header {
            height: 60%!important;
        }
        #slider_title{
            color: #fff;
        }
        #slider_title h1{
            font-weight: bold;
            font-size: 60px;
        }
        #slider_title h5{
            line-height: 30px;
        }
        .view {
            background: url({{ asset('user/images/find_doctor_slider.jpg') }})no-repeat center center;
            background-size: cover;
        }
    </style>
@endsection
@section('slider_homepage')
    <div class="view intro-2" style="">
        <div class="full-bg-img">
            <div class="mask rgba-purple-light flex-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8" id="slider_title">
                            <h1>Find A Doctor</h1>
                            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('mainContent')

    <section id="doctor">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="wrapper-pro">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="doctor_pro_img_div">
                                    <img src="{{ asset('images/' . $doctor->images) }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-12 doctor_element_div">
                                <h6>{{ $doctor->name }}</h6>
                                <p>{{ $doctor->specialist }}</p>
                            </div>
                            <div class="col-md-12 doctor_element_div">
                                <h6>SPECIALITIES</h6>
                                <p>Orthopedic Surgery, M.D, Ph.D</p>
                            </div>
                            <div class="col-md-12 doctor_element_div">
                                <h6>CONTACT INFO</h6>
                                <p>{{ $doctor->phone }}</p>
                                <p>{{ $doctor->email }}</p>
                                <a target="_blank" href="{{ $doctor->fb }}" class="fb-ic mr-3"><i class="fa fa-lg fa-facebook"> </i></a>
                                <a target="_blank" href="{{ $doctor->tw }}" class="tw-ic mr-3"><i class="fa fa-lg fa-twitter"> </i></a>
                                <a target="_blank" href="{{ $doctor->ins }}" class="ins-ic mr-3"><i class="fa fa-lg fa-instagram"> </i></a>
                            </div>
                            <div class="col-md-12 doctor_element_div">
                                <h6>AVAILABLE HOURS</h6>
                                @foreach($availability as $availability)
                                <p><strong>{{ $availability->day }}:-</strong><span>   {{ $availability->from }} - {{ $availability->to }}</span></p>
                                @endforeach
                            </div>
                            <div class="col-md-12 doctor_element_div">
                                @if (Route::has('login'))
                                    @auth
                                    <a class="btn btn-primary" href="{{ route('appointment',$doctor->id) }}" role="button">APPOINTMENT</a>
                                @else
                                    <a class="btn btn-success" data-toggle="modal" data-target="#modalLRForm">Get Started <i class="fa fa-play-circle"></i></a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-md-1 col-md-8">
                    <div class="row">
                        <div class="col-md-12 doctor_h1">
                            <h1>About The Doctor</h1>
                            {!! $doctor->description !!}
                        </div>
                        <div class="col-md-12 doctor_profile_des">
                            <div class="row">
                                <div class="col-md-12 doctor_h1">
                                    <h1>Work Experience</h1>
                                </div>
                                <div class="col-md-12 nm">
                                    <div class="row">
                                        @foreach($experiences as $experience)
                                        <div class="col-md-2 doctor_h6_bold">
                                            <h6>{{ $experience->year }}</h6>
                                        </div>
                                        <div class="offset-md-1 col-md-8 doctor_h6">
                                            <h6>{{ $experience->designation }}</h6>
                                            <h6>{{ $experience->institution }}</h6>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 doctor_profile_des">
                            <div class="row">
                                <div class="col-md-12 doctor_h1">
                                    <h1>Awards & Honors</h1>
                                </div>
                                <div class="col-md-12 nm">
                                    <div class="row">
                                        @foreach($awards as $award)
                                            <div class="col-md-2 doctor_h6_bold">
                                                <h6>{{ $award->year }}</h6>
                                            </div>
                                            <div class="offset-md-1 col-md-8 doctor_h6">
                                                <h6>{{ $award->award }}</h6>
                                                <h6>{{ $award->institution }}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 doctor_profile_des">
                            <div class="row">
                                <div class="col-md-12 doctor_h1">
                                    <h1>Education & Certification</h1>
                                </div>
                                <div class="col-md-12 nm">
                                    <div class="row">
                                        @foreach($educations as $education)
                                            <div class="col-md-2 doctor_h6_bold">
                                                <h6>{{ $education->year }}</h6>
                                            </div>
                                            <div class="offset-md-1 col-md-8 doctor_h6">
                                                <h6>{{ $education->certification }}</h6>
                                                <h6>{{ $education->institution }}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection