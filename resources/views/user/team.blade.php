@extends('user.app')
@section('doc_min')
    <link rel="stylesheet" href="{{ asset('user/css/docs.theme.min.css/') }}">
@endsection
@section('styles')
    <style>
        /*header{*/
            /*height: 10%!important;*/
        /*}*/
    </style>
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
                        <h1 class="indigo-text">We Are</h1>
                        <p align="justify">We Are try to best to develop this project.Our Supervisor very helpful person.
                            She help us every times when we faces in problem. We Work together with a great responsibilities. Our Team bonding also so good. So this is a great works for us. </p>
                    </div>

                </div>
            </div>
        </div>

    </main>

    <section id="team_section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @if(isset($teams[0]))
                    <div class="team_main_wrapper">
                        <div class="team_img_div">
                            <img class="img-responsive" src="{{ asset('images/'.$teams[0]->images) }}" alt="">
                        </div>
                        <div class="team_des_div">
                            <h3>{{ $teams[0]->name }}</h3>
                            <h4>{{ $teams[0]->title }}</h4>
                            <h5>{{ $teams[0]->institution }}</h5>
                            <p>{{ $teams[0]->description }}</p>
                        </div>
                        <div class="team_social">
                            <a href="{{ $teams[0]->fb }}" type="button" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $teams[0]->tw }}" type="button" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $teams[0]->lin }}" type="button" class="btn-floating btn-lg btn-ins"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    @endif
                </div>
                <div style="padding: 0px 80px;" class="col-md-6">
                    @if(isset($teams[1]))
                    <div class="team_main_wrapper">
                        <div class="team_img_div">
                            <img class="img-responsive" src="{{ asset('images/'.$teams[1]->images) }}" alt="">
                        </div>
                        <div style="margin-top: -25px;" class="team_des_div">
                            <h3>{{ $teams[1]->name }}</h3>
                            <h4>{{ $teams[1]->title }}</h4>
                            <h5>{{ $teams[1]->institution }}</h5>
                            <p> {{ $teams[1]->description }} </p>
                        </div>
                        <div class="team_social">
                            <a href="{{ $teams[1]->fb }}" type="button" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $teams[1]->tw }}" type="button" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $teams[1]->lin }}" type="button" class="btn-floating btn-lg btn-ins"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                     @endif
                </div>
                <div class="col-md-3">
                    @if(isset($teams[2]))
                    <div class="team_main_wrapper">
                        <div class="team_img_div">
                            <img class="img-responsive" src="{{ asset('images/'.$teams[2]->images) }}" alt="">
                        </div>
                        <div class="team_des_div">
                            <h3>{{ $teams[2]->name }}</h3>
                            <h4>{{ $teams[2]->title }}</h4>
                            <h5>{{ $teams[2]->institution }}</h5>
                            <p>{{ $teams[2]->description }}</p>
                        </div>
                        <div class="team_social">
                            <a href="{{ $teams[2]->fb }}" type="button" class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $teams[2]->tw }}" type="button" class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $teams[2]->lin }}" type="button" class="btn-floating btn-lg btn-ins"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection