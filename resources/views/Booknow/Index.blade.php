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

.alert {
    font-size: 13px !important;
    font-weight: bold !important;
    height: 35px !important;
    text-align: left !important;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #f4364f !important;
    letter-spacing: 3px;
    border-radius: 0px !important;
    margin-top: 5px;
    ;
}
</style>

<section>
    <style>
    .custom-red-text {
        color: #f4364f !important;
    }

    .custom-border-red {
        border: 1px solid #f4364f !important
    }

    .custom-background-red {
        background-color: #f4364f !important
    }
    </style>
    <div class="rows inner_banner inner_banner_5">
        <div class="container-fluid">
            <h2><span>Book-</span>Now</h2>
            <ul>
                <li><a href="#inner-page-title">Home</a>
                </li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                <li><a href="{{route('booknow.index')}}" class="bread-acti">Booknow</a>
                </li>
            </ul>
            <p>Book travel activities and enjoy your holidays with distinctive experience</p>
        </div>
    </div>
</section>
<div class="container">
    {{--
    <div class="row">
        <div class="col-md-12 " style="margin-top:20px;margin-bottom:20px;">
            <!-- Material checked -->
            <div class="switch  pull-right">
    <label>
        GRID VIEW
        <input type="checkbox" checked="checked" id="DisplayStyle">
        <span class="lever"></span> LIST VIEW
    </label>
</div>

</div>
</div>
--}}

</div>
<br />
<div class="container">
    <div class="row p-5">
        <div class="col-md-3 ">
            <!--PART 4 : LEFT LISTINGS-->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">
                                <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select City <button
                                        type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1"
                                        style="margin:-7px;" onclick="getCityNameForSearch()">Go</button> </h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!--  <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin: -7px;">Go</button> </h4> -->
                            <input class="form-control" placeholder="city" id="City_Name" required />
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                <form>
                                    <div id="cities">
                                        <ul class="">
                                            <li>
                                                <a href="{{route('all.events.activity')}}"
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
                                                        onClick="getCityIdForSearch(this.value)" value="{{$city->id}}"
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
                                                    <input id="city{{$city->id}}" onClick="getCityIcontainer-fluid
container-fluiddForSearch(this.value)" value="{{$city->id}}" class="price styled text-capitalize text-truncate"
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
                                        type="button" class="btn btn-sm btn-primary pull-right "
                                        onClick="getCategoryNameForSearch()" id="" style="margin:-7px;">Go</button>
                                </h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:0px;">Go</button> </h4> -->
                            <input class="form-control" placeholder="category" id="Category_Name" required />
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                <form>
                                    <div id="categories">
                                        <ul class="">
                                            <li>
                                                <a href="{{route('all.events.activity')}}"
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
                                                        onClick="getCategoryIdForSearch(this.value)"
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
                                                        onClick="getCategoryIdForSearch(this.value)"
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
                                        style="margin:-7px;" onclick="getCountryNameForSearch()">Go</button></h4>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapsed">
                        <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                            <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select  Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:0px;">Go</button></h4> -->
                            <input class="form-control" placeholder="country" id="Country_Name" required />
                            <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                <form>
                                    <div id="countries">
                                        <ul class="">
                                            <li>
                                                <a href="{{route('all.events.activity')}}"
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
                                                        onClick="getCountryIdForSearch(this.value)"
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
                                                        onClick="getCountryIdForSearch(this.value)"
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
        <!-- COL-MD-3 ENDS HERE  -->
        <!-- COL-MD-9 STARTS HERE -->
        <div class="col-md-9 " id="searchRendering">
            <div class="row">
                <div class="col-md-12 text-center">

                    @include('flash-message')
                    @yield('content')

                </div>
            </div>
            <div class="row">
                <div class="col-md-12  border ">
                    <!--  -->
                    <ul class="nav nav-tabs d-flex flex-row justify-content-md-around align-items-center">
                        @if(@isset($Active_Tab))
                        <li @if($Active_Tab=='All' ) class="active" @endif><a data-toggle="tab" id="All"
                                class="custom-red-text" href="#all">All
                            </a>
                        </li>
                        @else
                        <li class="active"><a data-toggle="tab" class="custom-red-text" id="All" href="#all">All </a>
                        </li>
                        @endif

                        <li @isset($Active_Tab)@if($Active_Tab=='Activity' ) class="active" @else @endif @endisset><a
                                data-toggle="tab" class="custom-red-text" id="Activity" href="#activities">All
                                Activities</a></li>
                        <li @isset($Active_Tab) @if($Active_Tab=='Cruise' ) class="active" @else @endif @endisset><a
                                data-toggle="tab" class="custom-red-text" id="Cruise" href="#cruises">All Cruises</a>
                        </li>
                        <li @isset($Active_Tab) @if($Active_Tab=='Transfer' ) class="active" @else @endif @endisset><a
                                data-toggle="tab" class="custom-red-text" id="Transfer" href="#transfers">All
                                Transfers</a></li>
                        <li @isset($Active_Tab) @if($Active_Tab=='Daytour' ) class="active" @else @endif @endisset><a
                                data-toggle="tab" class="custom-red-text" id="Daytour" href="#daytours">All Daytours</a>
                        </li>
                        <li @isset($Active_Tab) @if($Active_Tab=='Package' ) class="active" @else @endif @endisset><a
                                data-toggle="tab" class="custom-red-text" id="Package" href="#pacakges">All Packages</a>
                        </li>


                    </ul>

                    <div class="tab-content">
                        <!-- ALL TAB STARTS  -->


                        @if(@isset($Active_Tab))
                        @if($Active_Tab == 'All')
                        <div id="all" class="tab-pane fade in active show">
                            @else
                            <div id="all" class="tab-pane fade ">
                                @endif
                                @else
                                <div id="all" class="tab-pane  fade  in active ">
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12  ">
                                            @if(count($All_Events) >0)

                                            <div class="alert alert-secondary text-white">
                                                <i class="fa fa-bell text-danger fa-2x ml-3 mr-3"
                                                    aria-hidden="true"></i> Showing All Events
                                                @if(@isset($Results_For))
                                                @if($Results_For == 'All_City')
                                                For City <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @elseif($Results_For == 'All_Country')
                                                For Country <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @elseif($Results_For == 'All_Category')
                                                For Category <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @elseif($Results_For == 'All_Price')
                                                For Price <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @endif
                                                @endif

                                            </div>
                                            @foreach($All_Events as $key=>$item)

                                            <div class="row mt-3 mb-5 "
                                                style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                                                <div class="col-md-4 img-thumbnail  "
                                                    style="padding:0px; margin:0px;border-radius:0px;">
                                                    <img src="{{$item->banner}}" width="100%" height="100%" alt=""
                                                        style="padding:0px; margin:0px;">
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="trav-list-bod">
                                                        <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                                                            <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">{{$item->event_name}}</h3>
                                                            <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                                                        </a>
                                                        <p><span class="text-dark font-weight-bold">Event Description
                                                            </span></p>
                                                        <p>{!!substr($item->description,0,150)!!}</p>
                                                        <p><span class=" text-dark font-weight-bold">Start Location
                                                            </span>
                                                            {{$item->start_location ?? ''}}</p>
                                                        <p><span class="text-dark font-weight-bold">End Location</span>
                                                            {{$item->end_location ?? ''}}</p>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                        @if($item->discount !=0)
                                                        <div class="hot-page2-alp-r-hot-page-rat pull">
                                                            {{$item->discount}} %
                                                            Off
                                                        </div>
                                                        @else
                                                        <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                            Discount</div>
                                                        @endif
                                                        <span class="hot-list-p3-1">From</span> <span
                                                            class="hot-list-p3-2">€{{$item->price}}</span><span
                                                            class="hot-list-p3-4">
                                                            <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                                class="hot-page2-alp-quot-btn">Book
                                                                Now</a>
                                                        </span> </div>
                                                </div>
                                                <div>
                                                    <div class="trav-ami">
                                                        <h4>Event Detail and Includes</h4>
                                                        <ul class="">
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
                                            {{-- <div class="row">
                                                <div class="col-md-12">
                                                    {{$All_Events->links()}}
                                        </div>
                                    </div>
                                    --}}
                                    @else
                                    <div class="row mt-2 mb-2">
                                        <div class="alert alert-warning text-white">
                                            <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                            No Events To Show

                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>


                        </div>
                        <!-- ALL TAB ENDS HERE -->
                        @if(@isset($Active_Tab))
                        @if($Active_Tab == 'Activity')
                        <div id="activities" class="tab-pane fade active in ">
                            @else
                            <div id="activities" class="tab-pane fade">
                                @endif
                                @else
                                <div id="activities" class="tab-pane fade">
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12  ">
                                            @if(count($All_Activity_Events) >0)

                                            <div class="alert alert-secondary text-white">
                                                <i class="fa fa-bell text-danger fa-2x ml-3 mr-3"
                                                    aria-hidden="true"></i>
                                                Showing
                                                All Activity Events
                                                @if(@isset($Results_For))
                                                @if($Results_For == 'Activity_City')
                                                For City <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @elseif($Results_For == 'Activity_Country')
                                                For Country <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @elseif($Results_For == 'Activity_Category')
                                                For Category <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @elseif($Results_For == 'Activity_Price')
                                                For Price <span class="text-primary font-weight-bold  ">"
                                                    {{$Param_Name }} "</span>
                                                @endif
                                                @endif
                                            </div>

                                            @foreach($All_Activity_Events as $key=>$item)
                                            {{-- <div class="row">
                                                <div class="col-md-3 border m-0 p-0 ">
                                                    <img src="{{$item->banner}}" class="img-fluid w-100 h-100" alt="">
                                        </div>
                                        <!-- col-md-6 -->
                                        <div class="col-md-6 border">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="text-danger font-weight-bold text-uppercase">
                                                        {{$item->event_name}}</h3>

                                                </div>
                                                <div class="col-md-12">
                                                    <p>
                                                        <a class="btn btn-success" data-toggle="collapse"
                                                            href="#collapseExample" role="button" aria-expanded="false"
                                                            aria-controls="collapseExample">
                                                            Event Description
                                                        </a>

                                                    </p>
                                                    <div class="collapse" id="collapseExample">

                                                        {!!substr($item->description,0,150)!!}

                                                    </div>


                                                </div>
                                                <div class="col-md-6 text-left  font-weight-bold">Start Location
                                                </div>
                                                <div class="col-md-6 text-left text-danger  font-weight-bold">
                                                    {{$item->start_location ?? ''}} </div>
                                                <div class="col-md-6 mt-1 text-left  font-weight-bold">End
                                                    Location </div>
                                                <div class="col-md-6 mt-1 text-left text-danger font-weight-bold">
                                                    {{$item->end_location ?? ''}}</div>




                                            </div>

                                        </div>

                                        <!-- col-md-6 -->
                                        <div class="col-md-3 border">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                @if($item->discount !=0)
                                                <div class="hot-page2-alp-r-hot-page-rat pull">
                                                    {{$item->discount}} %
                                                    Off
                                                </div>
                                                @else
                                                <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                    Discount</div>
                                                @endif
                                                <span class="hot-list-p3-1">From</span> <span
                                                    class="hot-list-p3-2">€{{$item->price}}</span><span
                                                    class="hot-list-p3-4">
                                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                        class="hot-page2-alp-quot-btn">Book
                                                        Now</a>
                                                </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <a class="btn btn-sm btn-info text-white font-weight-bold"
                                                    data-toggle="collapse" href="#multiCollapseExample1" role="button"
                                                    aria-expanded="false" aria-controls="multiCollapseExample1">Event
                                                    Countries
                                                </a>
                                                <a class="btn btn-sm btn-info text-white font-weight-bold" role="button"
                                                    data-toggle="collapse" data-target="#multiCollapseExample2"
                                                    aria-expanded="false" aria-controls="multiCollapseExample2">Event
                                                    Cities</a>
                                                <a class="btn btn-sm btn-info text-white font-weight-bold" role="button"
                                                    data-toggle="collapse" data-target=".multi-collapse"
                                                    aria-expanded="false"
                                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Cities
                                                    & Countries</a>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                        <div class="card card-body">
                                                            @foreach($item->Event_Countries as
                                                            $key=>$country)
                                                            <span class="w-100"
                                                                style="font-size:12px;">{{$key+1}}-{{$country->name}}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                                        <div class="card card-body">
                                                            @foreach($item->Event_Cities as
                                                            $key=>$city)
                                                            <span class="w-100"
                                                                style="font-size:12px;">{{$key+1}}-{{$city->name}}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="trav-ami col-md-12">
                                            <h4>Event Detail and Includes</h4>
                                            <ul class="">
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
                                    --}}

                                    <div class="row mt-3 mb-5 "
                                        style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                                        <div class="col-md-4 img-thumbnail  "
                                            style="padding:0px; margin:0px;border-radius:0px;">
                                            <img src="{{$item->banner}}" width="100%" height="100%" alt=""
                                                style="padding:0px; margin:0px;">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="trav-list-bod">
                                                <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                                                    <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">{{$item->event_name}}</h3>
                                                    <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                                                </a>
                                                <p><span class="text-dark font-weight-bold">Event Description
                                                    </span></p>
                                                <p>{!!substr($item->description,0,150)!!}</p>
                                                <p><span class=" text-dark font-weight-bold">Start Location
                                                    </span>
                                                    {{$item->start_location ?? ''}}</p>
                                                <p><span class="text-dark font-weight-bold">End Location</span>
                                                    {{$item->end_location ?? ''}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                @if($item->discount !=0)
                                                <div class="hot-page2-alp-r-hot-page-rat pull">
                                                    {{$item->discount}} %
                                                    Off
                                                </div>
                                                @else
                                                <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                    Discount</div>
                                                @endif
                                                <span class="hot-list-p3-1">From</span> <span
                                                    class="hot-list-p3-2">€{{$item->price}}</span><span
                                                    class="hot-list-p3-4">
                                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                        class="hot-page2-alp-quot-btn">Book
                                                        Now</a>
                                                </span> </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Event Detail and Includes</h4>
                                                <ul class="">
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
                                    {{-- <div class="row">
                                                        <div class="col-md-12">
                                                            {{$All_Activity_Events->links()}}
                                </div>
                            </div>
                            --}}
                            @else
                            <div class="row mt-2 mb-2">
                                <div class="alert alert-warning text-white">
                                    <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                    No Activity Events To Show

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
                @if(@isset($Active_Tab))
                @if($Active_Tab == 'Cruise')
                <div id="cruises" class="tab-pane fade show active ">
                    @else
                    <div id="cruises" class="tab-pane fade">
                        @endif
                        @else
                        <div id="cruises" class="tab-pane fade">
                            @endif

                            <div class="row">
                                <div class="col-md-12  ">
                                    @if(count($All_Cruise_Events) >0)
                                    <div class="alert alert-secondary text-white">
                                        <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                        Showing All Cruise Events
                                        @if(@isset($Results_For))
                                        @if($Results_For == 'Cruise_City')
                                        For City <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For == 'Cruise_Country')
                                        For Country <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For == 'Cruise_Category')
                                        For Category <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For == 'Cruise_Price')
                                        For Price <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @endif
                                        @endif

                                    </div>
                                    @foreach($All_Cruise_Events as $key=>$item)

                                    <div class="row mt-3 mb-5 "
                                        style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                                        <div class="col-md-4 img-thumbnail  "
                                            style="padding:0px; margin:0px;border-radius:0px;">
                                            <img src="{{$item->banner}}" width="100%" height="100%" alt=""
                                                style="padding:0px; margin:0px;">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="trav-list-bod">
                                                <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                                                    <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">{{$item->event_name}}</h3>
                                                    <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                                                </a>
                                                <p><span class="text-dark font-weight-bold">Event Description
                                                    </span></p>
                                                <p>{!!substr($item->description,0,150)!!}</p>
                                                <p><span class=" text-dark font-weight-bold">Start Location
                                                    </span>
                                                    {{$item->start_location ?? ''}}</p>
                                                <p><span class="text-dark font-weight-bold">End Location</span>
                                                    {{$item->end_location ?? ''}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                @if($item->discount !=0)
                                                <div class="hot-page2-alp-r-hot-page-rat pull">
                                                    {{$item->discount}} %
                                                    Off
                                                </div>
                                                @else
                                                <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                    Discount</div>
                                                @endif
                                                <span class="hot-list-p3-1">From</span> <span
                                                    class="hot-list-p3-2">€{{$item->price}}</span><span
                                                    class="hot-list-p3-4">
                                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                        class="hot-page2-alp-quot-btn">Book
                                                        Now</a>
                                                </span> </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Event Detail and Includes</h4>
                                                <ul class="">
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
                                    {{-- <div class="row">
                                                                <div class="col-md-12">
                                                                    {{$All_Cruise_Events->links()}}
                                </div>
                            </div>
                            --}}
                            @else
                            <div class="row mt-2 mb-2">
                                <div class="alert alert-warning text-white">
                                    <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                    No Cruise Events To Show

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
                @if(@isset($Active_Tab))
                @if($Active_Tab == 'Transfer')
                <div id="transfers" class="tab-pane fade show active ">
                    @else
                    <div id="transfers" class="tab-pane fade">
                        @endif
                        @else
                        <div id="transfers" class="tab-pane fade">
                            @endif

                            <div class="row">
                                <div class="col-md-12  ">
                                    @if(count($All_Transfer_Events) >0)
                                    <div class="alert alert-secondary text-white">
                                        <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                        Showing All Transfer Events
                                        @if(@isset($Results_For))
                                        @if($Results_For == 'Transfer_City')
                                        For City <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For ==
                                        'Transfer_Country')
                                        For Country <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For ==
                                        'Transfer_Category')
                                        For Category <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For ==
                                        'Transfer_Price')
                                        For Price <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @endif
                                        @endif

                                    </div>
                                    @foreach($All_Transfer_Events as $key=>$item)

                                    <div class="row mt-3 mb-5 "
                                        style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                                        <div class="col-md-4 img-thumbnail  "
                                            style="padding:0px; margin:0px;border-radius:0px;">
                                            <img src="{{$item->banner}}" width="100%" height="100%" alt=""
                                                style="padding:0px; margin:0px;">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="trav-list-bod">
                                                <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                                                    <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">{{$item->event_name}}</h3>
                                                    <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                                                </a>
                                                <p><span class="text-dark font-weight-bold">Event Description
                                                    </span></p>
                                                <p>{!!substr($item->description,0,150)!!}</p>
                                                <p><span class=" text-dark font-weight-bold">Start Location
                                                    </span>
                                                    {{$item->start_location ?? ''}}</p>
                                                <p><span class="text-dark font-weight-bold">End Location</span>
                                                    {{$item->end_location ?? ''}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                @if($item->discount !=0)
                                                <div class="hot-page2-alp-r-hot-page-rat pull">
                                                    {{$item->discount}} %
                                                    Off
                                                </div>
                                                @else
                                                <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                    Discount</div>
                                                @endif
                                                <span class="hot-list-p3-1">From</span> <span
                                                    class="hot-list-p3-2">€{{$item->price}}</span><span
                                                    class="hot-list-p3-4">
                                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                        class="hot-page2-alp-quot-btn">Book
                                                        Now</a>
                                                </span> </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Event Detail and Includes</h4>
                                                <ul class="">
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
                                    {{-- <div class="row">
                                                                        <div class="col-md-12">
                                                                            {{$All_Transfer_Events->links()}}
                                </div>
                            </div>
                            --}}
                            @else
                            <div class="row mt-2 mb-2">
                                <div class="alert alert-warning text-white">
                                    <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                    No Transfer Events To Show

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
                @if(@isset($Active_Tab))
                @if($Active_Tab == 'Daytour')
                <div id="daytours" class="tab-pane fade show active ">
                    @else
                    <div id="daytours" class="tab-pane fade">
                        @endif
                        @else
                        <div id="daytours" class="tab-pane fade">
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    @if(count($All_Daytour_Events) >0)
                                    <div class="alert alert-secondary text-white">
                                        <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                        Showing All Daytour Events
                                        @if(@isset($Results_For))
                                        @if($Results_For ==
                                        'Daytour_City')
                                        For City <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For ==
                                        'Daytour_Country')
                                        For Country <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @elseif($Results_For ==
                                        'Daytour_Category')
                                        For Category " {{$Param_Name }}
                                        ""
                                        @elseif($Results_For ==
                                        'Daytour_Price')
                                        For Price <span class="text-primary font-weight-bold  ">"
                                            {{$Param_Name }} "</span>
                                        @endif
                                        @endif

                                    </div>
                                    @foreach($All_Daytour_Events as $key=>$item)

                                    <div class="row mt-3 mb-5 "
                                        style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                                        <div class="col-md-4 img-thumbnail  "
                                            style="padding:0px; margin:0px;border-radius:0px;">
                                            <img src="{{$item->banner}}" width="100%" height="100%" alt=""
                                                style="padding:0px; margin:0px;">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="trav-list-bod">
                                                <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                                                    <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">{{$item->event_name}}</h3>
                                                    <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                                                </a>
                                                <p><span class="text-dark font-weight-bold">Event Description
                                                    </span></p>
                                                <p>{!!substr($item->description,0,150)!!}</p>
                                                <p><span class=" text-dark font-weight-bold">Start Location
                                                    </span>
                                                    {{$item->start_location ?? ''}}</p>
                                                <p><span class="text-dark font-weight-bold">End Location</span>
                                                    {{$item->end_location ?? ''}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                @if($item->discount !=0)
                                                <div class="hot-page2-alp-r-hot-page-rat pull">
                                                    {{$item->discount}} %
                                                    Off
                                                </div>
                                                @else
                                                <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                    Discount</div>
                                                @endif
                                                <span class="hot-list-p3-1">From</span> <span
                                                    class="hot-list-p3-2">€{{$item->price}}</span><span
                                                    class="hot-list-p3-4">
                                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                        class="hot-page2-alp-quot-btn">Book
                                                        Now</a>
                                                </span> </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Event Detail and Includes</h4>
                                                <ul class="">
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
                                    {{-- <div class="row">
                                                                                <div class="col-md-12">
                                                                                    {{$All_Daytour_Events->links()}}
                                </div>
                            </div>
                            --}}
                            @else
                            <div class="row mt-2 mb-2">
                                <div class="alert alert-warning text-white">
                                    <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                    No Daytour Events To Show

                                </div>
                            </div>
                            @endif
                        </div>
                    </div>


                </div>
                @if(@isset($Active_Tab))
                @if($Active_Tab == 'Package')
                <div id="pacakges" class="tab-pane fade show active ">
                    @else
                    <div id="pacakges" class="tab-pane fade">
                        @endif
                        @else
                        <div id="pacakges" class="tab-pane fade">
                            @endif

                            <div class="row">
                                <div class="col-md-12 ">
                                    @if(count($All_Package_Events) >
                                    0)
                                    <div class="alert alert-secondary text-white">
                                        <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                        Showing All Package
                                        Events
                                        @if(@isset($Results_For))
                                        @if($Results_For ==
                                        'Package_City')
                                        For City
                                        <span class="text-primary font-weight-bold  ">" {{$Param_Name }}
                                            "</span>
                                        @elseif($Results_For ==
                                        'Package_Country')
                                        For Country
                                        <span class="text-primary font-weight-bold  ">" {{$Param_Name }}
                                            "</span>
                                        @elseif($Results_For ==
                                        'Package_Category')
                                        For Category
                                        <span class="text-primary font-weight-bold  ">" {{$Param_Name }}
                                            "</span>
                                        @elseif($Results_For ==
                                        'Package_Price')
                                        For Price "
                                        {{$Param_Name }} "
                                        @endif
                                        @endif

                                    </div>
                                    @foreach($All_Package_Events as
                                    $key=>$item)

                                    <div class="row mt-3 mb-5 "
                                        style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
                                        <div class="col-md-4 img-thumbnail  "
                                            style="padding:0px; margin:0px;border-radius:0px;">
                                            <img src="{{$item->banner}}" width="100%" height="100%" alt=""
                                                style="padding:0px; margin:0px;">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="trav-list-bod">
                                                <a href="{{  url('event_detail/')}}/{{ $item->id }}">
                                                    <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">{{$item->event_name}}</h3>
                                                    <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
font-weight: 700;">Event Type : {{$item->event_type}}</h4>
                                                </a>
                                                <p><span class="text-dark font-weight-bold">Event Description
                                                    </span></p>
                                                <p>{!!substr($item->description,0,150)!!}</p>
                                                <p><span class=" text-dark font-weight-bold">Start Location
                                                    </span>
                                                    {{$item->start_location ?? ''}}</p>
                                                <p><span class="text-dark font-weight-bold">End Location</span>
                                                    {{$item->end_location ?? ''}}</p>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                                                @if($item->discount !=0)
                                                <div class="hot-page2-alp-r-hot-page-rat pull">
                                                    {{$item->discount}} %
                                                    Off
                                                </div>
                                                @else
                                                <div class="hot-page2-alp-r-hot-page-rat pull">No
                                                    Discount</div>
                                                @endif
                                                <span class="hot-list-p3-1">From</span> <span
                                                    class="hot-list-p3-2">€{{$item->price}}</span><span
                                                    class="hot-list-p3-4">
                                                    <a href="{{  url('event_detail/')}}/{{ $item->id }}"
                                                        class="hot-page2-alp-quot-btn">Book
                                                        Now</a>
                                                </span> </div>
                                        </div>
                                        <div>
                                            <div class="trav-ami">
                                                <h4>Event Detail and Includes</h4>
                                                <ul class="">
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
                                    {{-- <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            {{$All_Package_Events->links()}}
                                </div>
                            </div>
                            --}}
                            @else
                            <div class="row mt-2 mb-2">
                                <div class="alert alert-warning text-white">
                                    <i class="fa fa-bell text-danger fa-2x ml-3 mr-3" aria-hidden="true"></i>
                                    No Package Events To
                                    Show

                                </div>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
            </div>

            <!--  -->
        </div>
    </div>


</div>
<!-- COL-MD-9 ENDS HERE -->
</div>
</div>
<!-- END CONTAINER -->
<button id="button">asd</button>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
</script>

<script>
//
function getCityIdForSearch(city) {
    console.log(city);
    var Get_Active_Tab = $('.nav-tabs li.active a');
    var Active_Tab = Get_Active_Tab.attr("id");
    console.log(Active_Tab);
    window.location.href = "{{URL::to('search/booknow/city')}}" +
        "/" + city +
        "/" + Active_Tab;
}

function getCountryIdForSearch(country) {
    console.log(country);
    var Get_Active_Tab = $('.nav-tabs li.active a');
    var Active_Tab = Get_Active_Tab.attr("id");
    console.log(Active_Tab);
    window.location.href = "{{URL::to('search/booknow/country')}}" +
        "/" +
        country + "/" +
        Active_Tab;
}

function getCategoryIdForSearch(category) {
    console.log(category);
    var Get_Active_Tab = $('.nav-tabs li.active a');
    var Active_Tab = Get_Active_Tab.attr("id");
    console.log(Active_Tab);
    window.location.href =
        "{{URL::to('search/booknow/category')}}" + "/" +
        category + "/" +
        Active_Tab;
}

function getPriceForSearch(price) {
    console.log(price)
    var Get_Active_Tab = $('.nav-tabs li.active a');
    var Active_Tab = Get_Active_Tab.attr("id");
    console.log(Active_Tab);
    var price_list = price.split(',');
    var min = price_list[0];
    var max = price_list[1];
    window.location.href = "{{URL::to('search/booknow/price')}}" +
        "/" + min +
        "/" + max + "/" +
        Active_Tab;
}
$(document).ready(function() {
    console.log(window.location.href);
    var URL_Array = window.location.href.split('/');
    console.log(URL_Array);
    if (URL_Array[4] == 'search') {
        console.log("search");
        if (URL_Array[5] == 'booknow') {

            if (URL_Array[6] == 'city') {
                $("#moreCitiesDiv").addClass(
                    "collpased show");
                $('#city' + URL_Array[7]).prop("checked",
                    true);
            } else if (URL_Array[6] == "category") {
                console.log(URL_Array[7]);
                $("#moreCategoriesDiv").addClass(
                    "collpased show");
                $('#category' + URL_Array[7]).prop(
                    "checked", true);

            } else if (URL_Array[6] == "country") {
                console.log("country");
                $("#moreCountriesDiv").addClass(
                    "collpased show");
                $('#country' + URL_Array[7]).prop("checked",
                    true);
            } else if (URL_Array[6] == "price") {
                if (URL_Array[7] == '250' && URL_Array[8] ==
                    '000') {
                    $('#chp51').prop("checked", true);
                } else if (URL_Array[7] == '100' &&
                    URL_Array[8] ==
                    '250') {
                    $('#chp52').prop("checked", true);
                } else if (URL_Array[7] == '50' &&
                    URL_Array[8] ==
                    '100') {
                    $('#chp53').prop("checked", true);
                } else if (URL_Array[7] == '25' &&
                    URL_Array[8] ==
                    '50') {
                    $('#chp54').prop("checked", true);
                } else if (URL_Array[7] == '0' && URL_Array[
                        8] ==
                    '25') {
                    $('#chp55').prop("checked", true);
                }

            }


        }
    }
})

$(document).ready(function() {
    $('#DisplayStyle').on('click', function() {
        console.log($('#DisplayStyle').prop(
            "checked"));
        if ($('#DisplayStyle').prop("checked") ==
            false || $(
                '#DisplayStyle').prop(
                "checked") ==
            'false') {
            window.location.href =
                "{{URL::to('booknow/grid')}}";
        } else {
            window.location.href =
                "{{URL::to('booknow')}}";
        }
    })



})
</script>

<script>
function getCategoryNameForSearch() {
    var Category_Name = $('#Category_Name').val();
    if (Category_Name == '' || Category_Name == null) {
        alert("Please enter category name ")
    } else {
        console.log(Category_Name);
        var Get_Active_Tab = $('.nav-tabs li.active a');
        var Active_Tab = Get_Active_Tab.attr("id");
        console.log(Active_Tab);
        window.location.href =
            "{{URL::to('search/booknow/categoryname')}}" + "/" +
            Category_Name + "/" +
            Active_Tab;
    }
}

function getCityNameForSearch() {
    var City_Name = $('#City_Name').val();
    if (City_Name == '' || City_Name == null) {
        alert("Please enter city name ")
    } else {
        console.log(City_Name);
        var Get_Active_Tab = $('.nav-tabs li.active a');
        var Active_Tab = Get_Active_Tab.attr("id");
        console.log(Active_Tab);
        window.location.href =
            "{{URL::to('search/booknow/cityname')}}" + "/" +
            City_Name + "/" +
            Active_Tab;
    }
}

function getCountryNameForSearch() {
    var Country_Name = $('#Country_Name').val();
    if (Country_Name == '' || Country_Name == null) {
        alert("Please enter city name ")
    } else {
        console.log(Country_Name);
        var Get_Active_Tab = $('.nav-tabs li.active a');
        var Active_Tab = Get_Active_Tab.attr("id");
        console.log(Active_Tab);
        window.location.href =
            "{{URL::to('search/booknow/countryname')}}" + "/" +
            Country_Name + "/" +
            Active_Tab;
    }
}
</script>

<script>
$(document).ready(function() {
    var URL_Array = window.location.href.split('/');
    console.log(URL_Array[8]);
    if (URL_Array[8] == 'Transfer') {
        $('#Activity,#Cruise,#Daytour,#All,#Package').on('click', function() {
            $('#transfers').removeClass("show")

        });
        $('#Transfer').on('click', function() {
            $('#transfers').addClass("show")
        })
    }
    if (URL_Array[8] == 'Cruise') {
        $('#Activity,#Transfer,#Daytour,#All,#Package').on('click', function() {
            $('#cruises').removeClass("show")

        });
        $('#Cruise').on('click', function() {
            $('#cruises').addClass("show")
        })
    }


    if (URL_Array[8] == 'Package') {
        $('#Activity,#Transfer,#Daytour,#All,#Cruise').on('click', function() {
            $('#packages').removeClass("show")

        });
        $('#Package').on('click', function() {
            $('#packages').addClass("show")
        })
    }


    if (URL_Array[8] == 'Daytour') {
        $('#Activity,#Transfer,#Package,#All,#Cruise').on('click', function() {
            $('#daytours').removeClass("show")

        });
        $('#Daytour').on('click', function() {
            $('#daytours').addClass("show")
        })
    }

    if (URL_Array[8] == 'Activity') {
        $('#Daytour,#Transfer,#Package,#All,#Cruise').on('click', function() {
            $('#activities').removeClass("show")

        });
        $('#Activity').on('click', function() {
            $('#activities').addClass("show")
        })
    }

    if (URL_Array[8] == 'All') {
        $('#Daytour,#Transfer,#Package,#Activity,#Cruise').on('click', function() {
            $('#all').removeClass("show")

        });
        $('#All').on('click', function() {
            $('#all').addClass("show")
        })
    }
})
</script>