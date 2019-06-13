@extends('user.app')
@section('css_for_doctor_profile')
    <link href="{{ asset('user/css/bootstrap-multiselect.css') }}" rel="stylesheet">
    <style>
        header {
            height: 60%!important;
        }
        #slider_title{
            color: #fff;
        }
        #slider_title h1{
            font-weight: bold;
            font-size: 50px;
        }
        #slider_title h5{
            line-height: 30px;
        }
        .view {
            background: url(../user/images/1-1.jpg)no-repeat center center;
            background-size: cover;
        }
        .select-wrapper {
            position: relative;
        }

    </style>
@endsection
@section('js_for_search_disease')
    <script type="text/javascript" src="{{ asset('user/js/bootstrap-multiselect.js') }}"></script>
@endsection
@section('slider_homepage')
    <div class="view intro-2" style="">
        <div class="full-bg-img">
            <div class="mask rgba-purple-light flex-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8" id="slider_title">
                            <h1>Search Disease By System</h1>
                            <h5>By using this you can find your disease without doctor.Please select symptom and submit to get best result.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('mainContent')
    <section id="search_disease">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="search_doctor_title">
                        <h1>Find Your Disease By Symptom</h1>
                        <p>Please select your symptom from list and get proper result and suggestion.</p>
                    </div>
                </div>
                <style>
                    .hidden {display:none;}
                    .symtrom_ul li{
                        text-align: left;
                        list-style-type: circle;
                        margin-bottom: 7px;

                    }
                </style>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="searchDiseaseWrapper">
                                <input style="margin: 20px 0px;" placeholder="Search test.." type="text" id="searchTest" class="form-control r-shadow">
                                <ul class="symtrom_ul">
                                    @foreach($symptoms as $symptom)
                                    <li><a href="" onclick="selecTest('{{$symptom->id}}',this,event)" data-select="false">{{ $symptom->symptom }}</a></li>
                                    @endforeach
                                </ul>

                                <form action="{{url('find-disease')}}" style="margin-top: 20px;" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{csrf_field()}}
                                            <input type="hidden" name="tests" id="tests">
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btnRegister btn btn-primary" onclick="testExist(event)">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="about_find_disease">
                                <h2>About Find Disease</h2>
                                <p>This is like a artificial doctor also made by us. This system get input from user like symptom.
                                    when it get input, it try to find disease name. The result show probability of disease with percentage.
                                This system also suggest medicine name for higher probability of disease. System also suggest best doctor for you.
                                    So this ia a very helpful system for every people (specially village people).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        var tests = [];
        Array.prototype.remove = function() {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };

        $(document).ready(function() {
            $("#searchTest").keyup(function(){

                // Retrieve the input field text and reset the count to zero
                escape = function(text) {
                    return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
                };

                var filter = escape($(this).val());

                // Loop through the comment list
                $(".symtrom_ul li").each(function(){

                    // If the list item does not contain the text phrase fade it out
                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).addClass('hidden');
                        // Show the list item if the phrase matches and increase the count by 1
                    } else {
                        $(this).removeClass('hidden');

                    }
                });


            });
        });
        function selecTest(val,el,event){
            event.preventDefault();
            el.getAttribute('data-select');
            if(el.getAttribute('data-select')!='false'){
                el.style = "color: #555555;";
                el.setAttribute('data-select','false');
                tests.remove(val);
                $('#tests').val(tests);
            } else {
                el.style = "color: #fff;";
                el.setAttribute('data-select','true');
                tests.push(val);
                $('#tests').val(tests);
            }
        }
        function testExist(event){
            var val = $('#tests').val();
            if(val==''){
                event.preventDefault();
                alert('Please select test');
            }

        }
    </script>
@endsection