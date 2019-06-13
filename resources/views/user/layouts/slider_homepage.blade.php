<div class="view intro-2" style="">
    <div class="full-bg-img">
        <div class="mask rgba-purple-light flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="container  white-text wow fadeInUp">
                            <h2>WE CARE FOR YOUR HEALTH</h2>
                            <br>
                            <h5>We Give Our Best To You</h5>
                            <br>
                            @if (Route::has('login'))
                                @auth
                                <a class="btn btn-success" href="{{ route('search_disease') }}">Get Started <i class="fa fa-play-circle"></i></a>
                            @else
                                <a class="btn btn-success" data-toggle="modal" data-target="#modalLRForm">Get Started <i class="fa fa-play-circle"></i></a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>