@extends('user.app')
@section('doc_min')
    <link rel="stylesheet" href="{{ asset('user/css/docs.theme.min.css/') }}">
@endsection
@section('styles')
    <style>
        /*header{*/
        /*height: 10%!important;*/
        /*}*/
        .ng-binding:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .pagination-sm li a, .pagination li a {
            color: #222;
        }
        ul.pagination li{
            color: #222;
            font-size: .875rem;
            height: 2.3rem;
            margin-left: .3125rem;
        }
        .pagination-page, .pagination-prev, .pagination-next {
            height: 35px;
            width: 35px;
            border: 1px solid #ddd;
            padding: 5px;
            padding-left: 10px;
        }

        .pagination-prev {
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }

        .pagination-next {
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
        }
        ._favourite_food_details>h3.food-title {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Source Sans Pro', sans-serif;
            text-transform: capitalize;
            color: #646363;
        }
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
                        <h2 class="header-title">Doctors</h2>
                        <div style="margin-bottom: 40px;" class="headerbordertitle-img"><img src="{{ asset('user/images/4hearbeat.png') }}" alt=""></div>
                        <p align="justify">We have list of doctor that user can directly get appointmnet .User can see doctor profile,
                            also contact with him.Every hospital has some special doctor.
                            So user can contact and also get appointment. So it is save time and also consume cost of money.</p>
                    </div>

                </div>
            </div>
        </div>

    </main>
    <section ng-app="myModule" class="restaurent-page-wrapper mt-100 mb-100">
        <div class="container" ng-controller="myController">
            <div class="row">

                <!--                populat company-->
                <div class="col-xl-12 col-md-12 col-sm-12">
                    {{--<div class="input-search">--}}
                        {{--<div class="input-group">--}}
                            {{--<input ng-model="queryStr" placeholder="Search" class="form-control search-input py-2" type="search" value="search">--}}
                            {{--<div class="input-group-append"><i class="fa fa-search"></i></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="featured">

                        <!-- single company-->
                        <div class="company-post-list">
                            <div class="row ">
                                <!--single item-->
                                @foreach($doctors as $doctor)
                                <div class="col-xl-3 col-md-3 col-sm-6 col-xs-12" ng-repeat="item in filterData = (totalItems | filter: searchFunc) | limitTo:8:8*(page-1)">
                                    <a href="{{ route('doctor_profile',$doctor->id) }}">
                                        <div class="food_p-inner food_p-inner-home">
                                            <!-- ribbon-->
                                            <!-- iMage-->
                                            <div class="_food_p-image"><img style="width: 100%;height: auto;" class="_favourite_f_img"
                                                                            src="{{asset('images/'.$doctor->images)}}"
                                                                            alt=""></div>
                                            <!-- food footer -->
                                            <div class="_favourite-food-item">
                                                <div class="_favourite_food_details">
                                                    <h3 class="food-title">{{ $doctor->name }}</h3>
                                                    <h3 style="margin-top: 24px;" class="food-title">{{ $doctor->specialist }}</h3>
                                                    <small class="extra-item">
                                                        <span class="item-list">@foreach($hospitals as $hospital)
                                                                @if($doctor->hospital_id == $hospital->id)
                                                                    {{ $hospital->name }}
                                                                @endif
                                                            @endforeach</span>
                                                    </small>
                                                </div>
                                                <div style="margin-top: 10px;" class="food-item clearfix mt-10">
                                                    <div class="pull-left"><a
                                                                href="{{ route('doctor_profile',$doctor->id) }}"
                                                                class="add-tocart-btn">View More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <uib-pagination class="pagination-sm pagination" total-items="filterData.length"
                                                    ng-model="page"
                                                    ng-change="pageChanged()" previous-text="&lsaquo;"
                                                    next-text="&rsaquo;" items-per-page=12>

                                    </uib-pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('js/angular.js') }}"></script>
    <script src="{{ asset('js/angular.ui.js') }}"></script>
    <script type="text/javascript">
        var items = [
                @foreach($doctors as $doctor)

            {
                h_url: '{{url('/doctor/profile/'.$doctor->id)}}',
                h_name: '{{$doctor->name}}',
                h_logo: '{{asset('images/'.$doctor->images)}}',
                h_hospital: '@foreach($hospitals as $hospital)
                        @if($doctor->hospital_id == $hospital->id)
                        {{ $hospital->name }}
                        @endif
                        @endforeach',
                h_qualification: '{{$doctor->qualification}}',
                h_specialist: '{{$doctor->specialist}}'
            },
            @endforeach
        ];
        console.log(items);
        // Code goes here
        var myModule = angular.module('myModule', ["ui.bootstrap"]);

        myModule.controller('myController', function ($scope) {
            $scope.page = 1;
            $scope.totalItems = items;
            $scope.displayItems = $scope.totalItems.slice(0, 3);
            $scope.pageChanged = function () {
                var startPos = ($scope.page - 1) * 3;
                //$scope.displayItems = $scope.totalItems.slice(startPos, startPos + 3);
                console.log($scope.page);
            };
            // This function is called for each item in the array to be filtered
            $scope.searchFunc = function (item) {
                //Convert the item into JSON string
                var jsonStr = angular.lowercase(JSON.stringify(item));

                var result = true;
                // Check if the search query is not empty
                if ($scope.queryStr && $scope.queryStr.trim()) {
                    // The query may have multiple parts separated by space, so split them
                    var query = $scope.queryStr.trim().split(" ");
                    // Assume that the current item is a valid result

                    // Iterate over the parts of the search query
                    for (var partIndex in query) {
                        // Check if the JSON string contains the current query part
                        if (jsonStr.indexOf(angular.lowercase(query[partIndex])) > -1) {
                            // Let this item feature in the result set only if other parts of the
                            // query have been found too
                            result = result && true;
                        }
                        else {
                            // Even if a single part of the query was not found, this item
                            // should not feature in the results
                            result = false;
                        }
                    }
                    return result;
                }
                // The search queryStr is empty, so there's no need for filtering
                // return true for all items
                else {
                    return true;
                }
            };

        });

    </script>
@endsection