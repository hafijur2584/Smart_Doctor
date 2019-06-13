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


    </style>
@endsection
@section('slider_homepage')


    <div style="width: 100%;height: 500px;" id="map">

    </div>


    <script>
        function initMap() {
            var location = {lat:23.876636,lng:90.320170};
            var map = new google.maps.Map(document.getElementById("map"),{
                zoom: 13,
                center:location
            });

            var marker = new google.maps.Marker({
                map: map,
                position: location,
                title: 'Hello World!'
            });


        }
    </script>
@endsection
@section('mainContent')
    <section id="contactUs">
        <div class="container">
            <div class="row">
                <div class="col-md-5">

                    <!-- Card -->
                    <div class="card">

                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Material form register -->
                            <form>
                                <p class="h4 text-center py-4">Contact Us</p>

                                <!-- Material input text -->
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="materialFormCardNameEx" class="form-control">
                                    <label for="materialFormCardNameEx" class="font-weight-light">Your name</label>
                                </div>

                                <!-- Material input email -->
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="email" id="materialFormCardEmailEx" class="form-control">
                                    <label for="materialFormCardEmailEx" class="font-weight-light">Your email</label>
                                </div>

                                <!-- Material textarea message -->
                                <div class="md-form">
                                    <i class="fa fa-pencil prefix grey-text"></i>
                                    <textarea type="text" id="materialFormContactMessageEx" class="form-control md-textarea" rows="3"></textarea>
                                    <label for="materialFormContactMessageEx">Your message</label>
                                </div>


                                <div class="text-center py-4 mt-3">
                                    <button class="btn btn-cyan" type="submit">SUBMIT</button>
                                </div>
                            </form>
                            <!-- Material form register -->

                        </div>
                        <!-- Card body -->

                    </div>
                    <!-- Card -->

                </div>
                    <div class="offset-md-2 col-md-5 address-grid">


                        <h4>For More <span>Information</span></h4>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Mobile </p><span>+8801729975293</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Mail </p><span>smartdoctor93@gmail.com</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Location</p><span>Daffodil International University,Dhaka</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection