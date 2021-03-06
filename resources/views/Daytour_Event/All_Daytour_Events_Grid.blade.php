@extends('layouts.website')
@section('content')


<style>
nav {
    background-color: white;
    display: flex;
    justify-content: center;
    align-content: center;
    height: auto;
}
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div id="app">
                @include('flash-message')
                @yield('content')
            </div>
        </div>
    </div>
</div>

<section>
    <div class="rows inner_banner inner_banner_5">
        <div class="container">
            <h2><span>Book -</span> Your Favourite Daytours Now!</h2>
            <ul>
                <li><a href="#inner-page-title">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="#inner-page-title" class="bread-acti">Daytours</a>
                </li>
            </ul>
            <p>Book travel daytours and enjoy your holidays with distinctive experience</p>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " style="margin-top:20px;margin-bottom:20px;">
            <!-- Material checked -->
            <div class="switch  pull-right">{{-- start of switch --}}
                <label>
                    GRID VIEW
                    <input type="checkbox" id="DisplayStyle">
                    <span class="lever"></span> LIST VIEW
                </label>
            </div>{{-- end of switch --}}
        </div>
    </div>
</div>

<br />







<div class="container">
    <div class="row">

        <div class="col-md-3 ">
            <!--PART 4 : LEFT LISTINGS-->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select City <button
                                        type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1"
                                        style="margin:-7px;">Go</button> </h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!--  <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin: -7px;">Go</button> </h4> -->
                            <input class="form-control" placeholder="city" id="input1" required />
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                <form>
                                    <div id="cities">
                                        <ul class="">
                                            <li>
                                                <a href="{{route('all.events.daytour')}}"
                                                    style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                                    <div class="checkbox checkbox-info checkbox-circle">
                                                        <input id="all_cities" class="cities city styled"
                                                            value="all_cities" type="checkbox" />
                                                        <label for="all_cities">All Cities </label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <ul>
                                            @foreach($Event_Cities=DB::table('event__cities')->orderBy('id','desc')->take(5)->distinct()->get()
                                            as $key=>$city)

                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="city{{$city->id}}"
                                                        onClick="getCityNameForSearch(this.value)" value="{{$city->id}}"
                                                        class="price styled text-capitalize text-truncate"
                                                        type="checkbox">
                                                    <label for="city{{$city->id}}">{{$city->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                            <li></li>

                                        </ul>
                                    </div>

                                    <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCities"
                                        data-toggle="collapse" href="#moreCitiesDiv" role="button" aria-expanded="false"
                                        aria-controls="moreCitiesDiv">
                                        view more
                                    </a>
                                    <div class="collapse" id="moreCitiesDiv">
                                        <ul>
                                            @foreach($Event_Cities=DB::table('event__cities')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get()
                                            as $key=>$city)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="city{{$city->id}}"
                                                        onClick="getCityNameForSearch(this.value)" value="{{$city->id}}"
                                                        class="price styled text-capitalize text-truncate"
                                                        type="checkbox">
                                                    <label for="city{{$city->id}}">{{$city->name}}</label>
                                                </div>
                                            </li>


                                            @endforeach
                                            <li></li>

                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END PART 4 : LEFT LISTINGS-->
            {{-- --}}
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse2">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select Categories <button
                                        type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3"
                                        style="margin:-7px;">Go</button> </h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:0px;">Go</button> </h4> -->
                            <input class="form-control" placeholder="category" id="input3" required />
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                <form>
                                    <div id="categories">
                                        <ul class="">
                                            <li>
                                                <a href="{{route('all.events.daytour')}}"
                                                    style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                                    <div class="checkbox checkbox-info checkbox-circle">
                                                        <input id="all_categories" class="categories city styled"
                                                            value="all_categories" type="checkbox">
                                                        <label for="all_categories">All Categories </label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <ul>
                                            @foreach($Event_Categories=DB::table('event__categories')->orderBy('id','desc')->take(5)->distinct()->get()
                                            as $key=>$category)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="category{{$category->id}}"
                                                        onClick="getCategoryNameForSearch(this.value)"
                                                        value="{{$category->id}}"
                                                        class="price styled text-capitalize text-truncate"
                                                        type="checkbox">
                                                    <label for="category{{$category->id}}">{{$category->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                            <li></li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCategory"
                                        data-toggle="collapse" href="#moreCategoriesDiv" role="button"
                                        aria-expanded="false" aria-controls="moreCitiesDiv">
                                        view more
                                    </a>
                                    <div class="collapse" id="moreCategoriesDiv">
                                        <ul>
                                            @foreach($Event_Categories=DB::table('event__categories')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get()
                                            as $key=>$category)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="category{{$category->id}}"
                                                        onClick="getCategoryNameForSearch(this.value)"
                                                        value="{{$category->id}}"
                                                        class="price styled text-capitalize text-truncate"
                                                        type="checkbox">
                                                    <label for="category{{$category->id}}">{{$category->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                            <li></li>

                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- --}}
            {{-- country --}}
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select Country<button
                                        type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2"
                                        style="margin:-7px;">Go</button></h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select  Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:0px;">Go</button></h4> -->
                            <input class="form-control" placeholder="country" id="input2" required />
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                <form>
                                    <div id="countries">
                                        <ul class="">
                                            <li>
                                                <a href="{{route('all.events.daytour')}}"
                                                    style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                                    <div class="checkbox checkbox-info checkbox-circle">
                                                        <input id="all_countries" class="countries city styled"
                                                            value="all_countries" type="checkbox">
                                                        <label for="all_countries">All Countries </label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <ul>

                                            @foreach($Event_Countries=DB::table('event__countries')->orderBy('id','desc')->take(5)->distinct()->get()
                                            as $key=>$country)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="country{{$country->id}}"
                                                        onClick="getCountryNameForSearch(this.value)"
                                                        value="{{$country->id}}"
                                                        class="price styled text-capitalize text-truncate"
                                                        type="checkbox">
                                                    <label for="country{{$country->id}}">{{$country->name}}</label>
                                                </div>
                                            </li>

                                            @endforeach
                                            <li></li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCountry"
                                        data-toggle="collapse" href="#moreCountriesDiv" role="button"
                                        aria-expanded="false" aria-controls="moreCitiesDiv">
                                        view more
                                    </a>
                                    <div class="collapse" id="moreCountriesDiv">

                                        <ul>
                                            @foreach($Event_Countries=DB::table('event__countries')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get()
                                            as $key=>$country)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="country{{$country->id}}"
                                                        onClick="getCountryNameForSearch(this.value)"
                                                        value="{{$country->id}}"
                                                        class="price styled text-capitalize text-truncate"
                                                        type="checkbox">
                                                    <label for="country{{$country->id}}">{{$country->name}}</label>
                                                </div>
                                            </li>

                                            @endforeach
                                            <li></li>
                                        </ul>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- COUNTRY --}}
            <!--PART 5 : LEFT LISTINGS-->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse4">
                                <h4><i class="fa fa-euro" aria-hidden="true"></i> Select Price Range</h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!-- <h4><i class="fa fa-euro" aria-hidden="true"></i> Select Price Range</h4> -->
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
                                <form>
                                    <ul>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp51" onclick="getPriceForSearch(this.value)"
                                                    value="250,000" class="price styled" type="checkbox">
                                                <label for="chp51"> €250 - Above </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp52" onclick="getPriceForSearch(this.value)"
                                                    class="price styled" value="100,250" type="checkbox">
                                                <label for="chp52"> €100 - €250 </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp53" onclick="getPriceForSearch(this.value)"
                                                    class="price styled" value="50,100" type="checkbox">
                                                <label for="chp53"> €50 - €100 </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp54" onclick="getPriceForSearch(this.value)"
                                                    class="price styled" value="25,50" type="checkbox">
                                                <label for="chp54"> €25 - €50 </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp55" onclick="getPriceForSearch(this.value)"
                                                    class="price styled" value="0,25" type="checkbox">
                                                <label for="chp55"> €0 - €25 </label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END PART 5 : LEFT LISTINGS-->
        </div>
        <div class="col-md-9 " id="searchRendering">
            @if(isset($All_Daytour_Events))
            @if(isset($Search_Param))
            <div class="row">
                <div class="col-md-12 alert alert-success">
                    <p class="text-dark font-weight-bold">Found Events for {{$Serach_Type ?? ''}} <span
                            class="text-primary font-weight-bold">{{ $Search_Param ?? '' }}</span> </p>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-12 alert alert-success">
                    <p class="text-dark font-weight-bold">Showing All Daytour Events </p>
                </div>
            </div>
            @endif
            @foreach($All_Daytour_Events as $key=>$item)
            <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                <div class="col-md-6 col-sm-6 col-xs-12 b_packages wow slideInUp" data-wow-duration="0.5s">
                    <!-- OFFER BRAND -->
                    @if($item->discount!=0)<div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png"
                            alt="" /><span class="disc-text">{{$item->discount}}<br>OFF</span></div>
                    @else
                    <!--  <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">No Discount</span></div> -->
                    @endif
                    <!--<div class="band">-->
                    <!--    <div class="box">-->
                    <!--        <div class="ribbon"><span>{{$item->disc}}%off</span></div>-->
                    <!--    </div>-->
                    <!--    {{--<img src="{{url('/theme/travel')}}/images/band.png" alt="" />--}}-->
                    <!--</div>-->
                    <!-- IMAGE -->
                    <div class="v_place_img" style="height: 200px">
                        <img src="{{$item->banner}}" alt="Tour Booking" title="Tour Booking"
                            style="height: 100%;width: 100%">
                    </div>
                    <!-- TOUR TITLE & ICONS -->
                    <div class="b_pack rows">
                        <!-- TOUR TITLE -->
                        <div class="col-md-8 col-sm-8">
                            <h4>{{$item->event_name}}<span class="v_pl_name" style="color: black"></span>
                            </h4>
                        </div>


                        <div class="col-md-4 col-sm-4 pack_icon">
                            <ul>
                                <li>
                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"><img
                                            src="{{url('/theme/travel')}}/images/clock.png" alt="Date"
                                            title="Tour Timing" /> </a>
                                </li>
                                <li>
                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"><img
                                            src="{{url('/theme/travel')}}/images/info.png" alt="Details"
                                            title="View more details" /> </a>
                                </li>
                                <li>
                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"><img
                                            src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"><img
                                            src="{{url('/theme/travel')}}/images/map.png" alt="Location"
                                            title="Location" /> </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </a>

            @endforeach

        </div>
        {{--
          col-md-9 end here
          --}}
    </div>
</div>


{{--
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{$All_Daytour_Events->links()}}
</div>
</div>
</div>
--}}

@else

@endif


@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
function getCityNameForSearch(city) {
    console.log(city);
    window.location.href = "{{URL::to('search/daytour/grid/city')}}" + "/" + city;
}

function getCountryNameForSearch(country) {
    console.log(country);
    window.location.href = "{{URL::to('search/daytour/grid/country')}}" + "/" + country;
}

function getCategoryNameForSearch(category) {
    console.log(category);
    window.location.href = "{{URL::to('search/daytour/grid/category')}}" + "/" + category;
}

function getPriceForSearch(price) {
    console.log(price);
    var price_list = price.split(',');
    var min = price_list[0];
    var max = price_list[1];
    window.location.href = "{{URL::to('search/daytour/grid/price')}}" + "/" + min + "/" + max;
}
$(document).ready(function() {
    var URL_Array = window.location.href.split('/');
    if (URL_Array[4] == 'search') {
        if (URL_Array[5] == 'daytour') {
            if (URL_Array[7] == 'city') {
                $("#moreCitiesDiv").addClass("collpased show");
                $('#city' + URL_Array[8]).prop("checked", true);
            } else if (URL_Array[7] == "category") {
                $("#moreCategoriesDiv").addClass("collpased show");
                $('#category' + URL_Array[8]).prop("checked", true);
            } else if (URL_Array[7] == "country") {
                $("#moreCountriesDiv").addClass("collpased show");
                $('#country' + URL_Array[8]).prop("checked", true);
            } else if (URL_Array[7] == "price") {
                if (URL_Array[8] == '250' && URL_Array[9] == '000') {
                    $('#chp51').prop("checked", true);
                } else if (URL_Array[8] == '100' && URL_Array[9] == '250') {
                    $('#chp52').prop("checked", true);
                } else if (URL_Array[8] == '50' && URL_Array[9] == '100') {
                    $('#chp53').prop("checked", true);
                } else if (URL_Array[8] == '25' && URL_Array[9] == '50') {
                    $('#chp54').prop("checked", true);
                } else if (URL_Array[8] == '0' && URL_Array[9] == '25') {
                    $('#chp55').prop("checked", true);
                }

            }


        }
    }
})

$(document).ready(function() {
    $('#DisplayStyle').on('click', function() {
        console.log($('#DisplayStyle').prop("checked"));
        if ($('#DisplayStyle').prop("checked") == false || $('#DisplayStyle').prop("checked") ==
            'false') {
            window.location.href = "{{URL::to('all/events/daytour/grid')}}";
        } else {
            window.location.href = "{{URL::to('all/events/daytour')}}";
        }
    })
})
</script>