<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <a class="navbar-brand" href="{{ route('homepage') }}"><img class="logo" src="{{ asset('user/images/1.png') }}" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto hh">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}">HOME </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('hospitals') }}">HOSPITALS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('doctor') }}">DOCTORS</a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="#">SERVICES</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('team') }}">WE ARE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">CONTACT US</a>
            </li>

        </ul>


        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                @guest
                <a style="color: #fff;" href="{{ route('login') }}" class=" dropdown-item d-item" data-toggle="modal" data-target="#modalLRForm">LogIn/Register</a>
                @else
                <div class="dropdown">
                    <button class="  dropdown-toggle login" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                        {{--<a href="{{ url('/') }}">Homepage</a>--}}
                        <!-- Material input -->




                        <ul class="login_ul">
                            <li><a style="color: #fff!important;" href="">Profile</a></li>
                            <li><a style="color: #fff!important;" class="dropdown-item d-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form></li>

                        </ul>
                        @endguest
                    </div>
                </div>

            </li>
        </ul>
    </div>
</nav>

<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Register</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <form  method="POST" action="{{ route('login.custom') }}">
                        {{ csrf_field() }}
                        <!--Body-->
                        <div class="modal-body mb-1">

                            <div class="md-form form-sm mb-5{{ $errors->has('email') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" id="modalLRInput10" name="email" value="{{ old('email') }}" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput10">Your email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form form-sm mb-4{{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="modalLRInput11" name="password" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                                <p>Forgot <a href="{{ route('password.request') }}" class="blue-text">Password?</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    <!--/.Panel 7-->

                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form form-sm mb-5{{ $errors->has('name') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="text" id="modalLRInput9" name="name" value="{{ old('name') }}" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput9">Your Name</label>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="md-form form-sm mb-5{{ $errors->has('email') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" name="email" id="modalLRInput12" value="{{ old('email') }}" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="md-form form-sm mb-5{{ $errors->has('name') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="date" id="birthDate" name="date_of_birth" required="" class="form-control r-shadow">
                                <label style="margin-top: -22px;" data-error="wrong" data-success="right" for="modalLRInput9">Date Of Birth</label>
                            </div>
                            <div class="md-form form-sm mb-5{{ $errors->has('name') ? ' has-error' : '' }}">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="number" name="age" id="birthDate" class="form-control r-shadow">
                                <label data-error="wrong" data-success="right" for="modalLRInput9">Age</label>
                            </div>
                            <div class="md-form form-sm mb-5{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{--<label for="exampleFormControlSelect1" class="col-sm-4 col-md-4 control-label birth-cloor">Gendar</label>--}}
                                <select class="form-control" name="gender" id="exampleFormControlSelect1" style="">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="md-form form-sm mb-5{{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="modalLRInput13" name="password" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="md-form form-sm mb-4">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="modalLRInput14" name="password_confirmation" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
                            </div>

                            <div class="text-center form-sm mt-2">
                                <button class="btn btn-info">Sign up <i class="fa fa-sign-in ml-1"></i></button>
                            </div>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-right">
                                <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->
