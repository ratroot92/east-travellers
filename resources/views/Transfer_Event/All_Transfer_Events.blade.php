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

<section>
    <div class="rows inner_banner inner_banner_5">
        <div class="container">
            <h2><span>Book -</span> Your Favourite Transfer Now!</h2>
            <ul>
                <li><a href="#inner-page-title">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="#inner-page-title" class="bread-acti">Transfers</a>
                </li>
            </ul>
            <p>Book travel transfer and enjoy your holidays with distinctive experience</p>
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
                    <input type="checkbox" checked="checked" id="DisplayStyle">
                    <span class="lever"></span> LIST VIEW
                </label>
            </div>
            {{-- end of switch --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div id="app">
                @include('flash-message')
                @yield('content')
            </div>
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
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin:-7px;">Go</button> </h4>
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
                                                <a href="{{route('all.events.transfer')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                                    <div class="checkbox checkbox-info checkbox-circle">
                                                        <input id="all_cities" class="cities city styled" value="all_cities" type="checkbox" />
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
                                                    <input id="city{{$city->id}}" onClick="getCityNameForSearch(this.value)" value="{{$city->id}}" class="price styled text-capitalize text-truncate" type="checkbox">
                                                    <label for="city{{$city->id}}">{{$city->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                            <li></li>

                                        </ul>
                                    </div>

                                    <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCities" data-toggle="collapse" href="#moreCitiesDiv" role="button" aria-expanded="false" aria-controls="moreCitiesDiv">
                                        view more
                                    </a>
                                    <div class="collapse" id="moreCitiesDiv">
                                        <ul>
                                            @foreach($Event_Cities=DB::table('event__cities')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get()
                                            as $key=>$city)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="city{{$city->id}}" onClick="getCityNameForSearch(this.value)" value="{{$city->id}}" class="price styled text-capitalize text-truncate" type="checkbox">
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
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:-7px;">Go</button> </h4>
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
                                                <a href="{{route('all.events.transfer')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                                    <div class="checkbox checkbox-info checkbox-circle">
                                                        <input id="all_categories" class="categories city styled" value="all_categories" type="checkbox">
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
                                                    <input id="category{{$category->id}}" onClick="getCategoryNameForSearch(this.value)" value="{{$category->id}}" class="price styled text-capitalize text-truncate" type="checkbox">
                                                    <label for="category{{$category->id}}">{{$category->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                            <li></li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCategory" data-toggle="collapse" href="#moreCategoriesDiv" role="button" aria-expanded="false" aria-controls="moreCitiesDiv">
                                        view more
                                    </a>
                                    <div class="collapse" id="moreCategoriesDiv">
                                        <ul>
                                            @foreach($Event_Categories=DB::table('event__categories')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get()
                                            as $key=>$category)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="category{{$category->id}}" onClick="getCategoryNameForSearch(this.value)" value="{{$category->id}}" class="price styled text-capitalize text-truncate" type="checkbox">
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
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:-7px;">Go</button></h4>
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
                                                <a href="{{route('all.events.transfer')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                                    <div class="checkbox checkbox-info checkbox-circle">
                                                        <input id="all_countries" class="countries city styled" value="all_countries" type="checkbox">
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
                                                    <input id="country{{$country->id}}" onClick="getCountryNameForSearch(this.value)" value="{{$country->id}}" class="price styled text-capitalize text-truncate" type="checkbox">
                                                    <label for="country{{$country->id}}">{{$country->name}}</label>
                                                </div>
                                            </li>

                                            @endforeach
                                            <li></li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCountry" data-toggle="collapse" href="#moreCountriesDiv" role="button" aria-expanded="false" aria-controls="moreCitiesDiv">
                                        view more
                                    </a>
                                    <div class="collapse" id="moreCountriesDiv">

                                        <ul>
                                            @foreach($Event_Countries=DB::table('event__countries')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get()
                                            as $key=>$country)
                                            <li>
                                                <div class="checkbox checkbox-info checkbox-circle">
                                                    <input id="country{{$country->id}}" onClick="getCountryNameForSearch(this.value)" value="{{$country->id}}" class="price styled text-capitalize text-truncate" type="checkbox">
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
                                                <input id="chp51" onclick="getPriceForSearch(this.value)" value="250,000" class="price styled" type="checkbox">
                                                <label for="chp51"> €250 - Above </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp52" onclick="getPriceForSearch(this.value)" class="price styled" value="100,250" type="checkbox">
                                                <label for="chp52"> €100 - €250 </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp53" onclick="getPriceForSearch(this.value)" class="price styled" value="50,100" type="checkbox">
                                                <label for="chp53"> €50 - €100 </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp54" onclick="getPriceForSearch(this.value)" class="price styled" value="25,50" type="checkbox">
                                                <label for="chp54"> €25 - €50 </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input id="chp55" onclick="getPriceForSearch(this.value)" class="price styled" value="0,25" type="checkbox">
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
            @if(isset($All_Transfer_Events))
            @if(isset($Search_Param))
            <div class="row">
                <div class="col-md-12 alert alert-success">
                    <p class="text-dark font-weight-bold">Found Events for {{$Serach_Type ?? ''}} <span class="text-primary font-weight-bold">{{ $Search_Param ?? '' }}</span> </p>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-12 alert alert-success">
                    <p class="text-dark font-weight-bold">Showing All Transfer Events </p>
                </div>
            </div>
            @endif
            @foreach($All_Transfer_Events as $key=>$item)

            <div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                <div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
                    <img src="{{$item->banner}}" width="100%" height="150px" alt="" style="padding:0px; margin:0px;">
                </div>
                <div class="col-md-6">
                    <div class="trav-list-bod">
                        <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                            <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
            font-weight: 700;">{{$item->event_name}}</h3>
                            <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
            font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                        </a>
                        <p>{!!substr($item->description,0,150)!!}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                        @if($item->discount !=0)
                        <div class="hot-page2-alp-r-hot-page-rat pull">{{$item->discount}} % Off</div>
                        @else
                        <div class="hot-page2-alp-r-hot-page-rat pull">No Discount</div>
                        @endif
                        <span class="hot-list-p3-1">From</span> <span class="hot-list-p3-2">€{{$item->price}}</span><span class="hot-list-p3-4">
                            <a href="{{  url('event_detail/')}}/{{ $item->id }}" class="hot-page2-alp-quot-btn">Book
                                Now</a>
                        </span> </div>
                </div>
                <div>
                    <div class="trav-ami">
                        <h4>Detail and Includes</h4>
                        {{-- --}}
                        <ul>
                            @foreach($item->Event_Icons as $Icon)

                            <li href="{{  url('event_detail/')}}/{{ $item->id }}">
                                <img src="{{$Icon->description}}" alt="">
                                <span>{{$Icon->name}}</span></li>
                            @endforeach

                            @foreach($item->Event_Categories as $category)

                            <li href="{{  url('event_detail/')}}/{{ $item->id }}">
                                <img src="{{$category->description}}" alt="">
                                <span>{{$category->name}}</span></li>
                            @endforeach

                            @foreach($item->Event_Countries as $country)

                            <li href="{{  url('event_detail/')}}/{{ $item->id }}">
                                <img src="{{$country->description}}" alt="">
                                <span>{{$country->name}}</span></li>
                            @endforeach

                            @foreach($item->Event_Cities as $city)

                            <li href="{{  url('event_detail/')}}/{{ $item->id }}">
                                <img src="{{$city->description}}" alt="">
                                <span>{{$city->name}}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>

            @endforeach

        </div>
        {{-- end  col-md-8 --}}
    </div>
</div>
{{--
   <div class="container-fluid">
      <div class="row">
         <div  class="col-md-12">
            {{$All_Transfer_Events->links()}}
</div>
</div>
</div>
--}}
@else
<div class="col-md-9 " id="searchRendering">
    <div class="row">
        @if(isset($Search_Param))
        <div class="col-md-12 alert alert-warning">
            <p class="text-info font-weight-bold">Found no events for <span class="text-danger font-weight-bold">{{ $Search_Param->name ?? '' }}</span> </p>
        </div>
        @endif


    </div>
</div>


</div>

@endif
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
    function getCityNameForSearch(city) {
        console.log(city);
        window.location.href = "{{URL::to('search/transfer/city')}}" + "/" + city;
    }

    function getCountryNameForSearch(country) {
        console.log(country);
        window.location.href = "{{URL::to('search/transfer/country')}}" + "/" + country;
    }

    function getCategoryNameForSearch(category) {
        console.log(category);
        window.location.href = "{{URL::to('search/transfer/category')}}" + "/" + category;
    }

    function getPriceForSearch(price) {
        console.log(price);
        var price_list = price.split(',');
        var min = price_list[0];
        var max = price_list[1];
        window.location.href = "{{URL::to('search/transfer/price')}}" + "/" + min + "/" + max;
    }
    $(document).ready(function() {
        console.log(window.location.href);
        var URL_Array = window.location.href.split('/');
        console.log(URL_Array);
        if (URL_Array[4] == 'search') {
            console.log("search");
            if (URL_Array[5] == 'transfer') {
                console.log("transfer");
                if (URL_Array[6] == 'city') {
                    $("#moreCitiesDiv").addClass("collpased show");
                    $('#city' + URL_Array[7]).prop("checked", true);
                } else if (URL_Array[6] == "category") {
                    console.log(URL_Array[7]);
                    $("#moreCategoriesDiv").addClass("collpased show");
                    $('#category' + URL_Array[7]).prop("checked", true);

                } else if (URL_Array[6] == "country") {
                    console.log("country");
                    $("#moreCountriesDiv").addClass("collpased show");
                    $('#country' + URL_Array[7]).prop("checked", true);
                } else if (URL_Array[6] == "price") {
                    if (URL_Array[7] == '250' && URL_Array[8] == '000') {
                        $('#chp51').prop("checked", true);
                    } else if (URL_Array[7] == '100' && URL_Array[8] == '250') {
                        $('#chp52').prop("checked", true);
                    } else if (URL_Array[7] == '50' && URL_Array[8] == '100') {
                        $('#chp53').prop("checked", true);
                    } else if (URL_Array[7] == '25' && URL_Array[8] == '50') {
                        $('#chp54').prop("checked", true);
                    } else if (URL_Array[7] == '0' && URL_Array[8] == '25') {
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
                window.location.href = "{{URL::to('all/events/transfer/grid')}}";
            } else {
                window.location.href = "{{URL::to('all/events/transfer')}}";
            }
        })
    })
</script>