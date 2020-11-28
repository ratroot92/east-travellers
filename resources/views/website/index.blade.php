@extends('layouts.website')
@section('content')
{{--
<style>
   table {
   display: block;
   overflow-x: auto;
   white-space: nowrap;
   }
</style>
--}}
<style>
@media screen and (min-width: 1230px) {
    .hot-page2-alp-quot-btn {
        font-size: 11px
    }
}

@media screen and (min-width: 1050px) {
    .hot-page2-alp-quot-btn {
        font-size: 11px;
        padding: 3px;
    }
}

/*the container must be positioned relative:*/
.autocomplete {
    position: relative;
    display: inline-block;
}

input {
    border: 1px solid transparent;
    background-color: #f1f1f1;
    padding: 10px;
    font-size: 16px;
}

input[type=text] {
    background-color: #f1f1f1;
    width: 100%;
}

input[type=submit] {
    background-color: DodgerBlue;
    color: #fff;
    cursor: pointer;
}

input.waves-button-input {
    width: 100%;
}

.autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    /*position the autocomplete items to be the same width as the container:*/
    top: 100%;
    left: 0;
    right: 0;
}

.select-wrapper input.select-dropdown {
    /* height: 45px; */
    /* background-color: white; */
    border: 2px solid white;
    color: white;
    font-weight: bold;
}



.autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff;
    border-bottom: 1px solid #d4d4d4;
}

i.waves-effect.waves-light.tourz-sear-btn.waves-input-wrapper {
    line-height: 24px;
}

/*when hovering an item:*/
.autocomplete-items div:hover {
    background-color: #e9e9e9;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
    background-color: DodgerBlue !important;
    color: #ffffff;
}

.list_3:hover {
    font-size: 17px;
    color: red;
}

.radio-toolbar {
    margin: 0;
    float: left;
}

.radio-toolbar input[type="radio"] {
    opacity: 0;
    position: fixed;
    width: 0;
}

.radio-toolbar label {
    display: inline-block !important;
    background-color: #fff;
    padding: 7px 30px;
    padding-left: 18px !important;
    font-size: 15px !important;
    border: none;
    border-radius: 0px;
    height: auto !important;
}

.radio-toolbar label:hover {
    background-color: #e72a43;
    color: #ffffff;
}

.radio-toolbar input[type="radio"]:focus+label {
    border: 2px dashed #444;
}

.radio-toolbar input[type="radio"]:checked+label {
    background-color: #e72a43;
    border-color: #e3263f;
    border: none;
    color: #fff;
}

/*autocomplete html*/
#country_list li a {
    font-size: 12px !important;
    font-weight: bold;
}

li {
    cursor: pointer !important;
}

/* Search Autocomplte CSS */
#autocomplete-input {
    border: 2px solid #fff;
    height: 40px !important;
    background-color: transparent !important;
    color: #fff;
}


#Search_Btn_Category,
#Search_Btn_CutomCity,
#Search_Btn_CutomCountry,
#Search_Btn_City,
#Search_Btn_Country {
    height: 42px !important;
    border: 2px solid #fff;
    font-weight: bold;
    font-size: 14px;
    margin-top: -5px;

}

#Autocomplete_Cities::-webkit-input-placeholder {
    color: #fff;
    padding-left: 7px;
    font-weight: bold;
    ;
}

#Autocomplete_Cities {
    border: 2px solid #fff;
    border-radius: 0px !important;
    height: 40px !important;
    color: #fff;
    font-weight: bold;
    background-color: transparent !important;
}

/* End  */
/* Materilaize dropdown */
ul.dropdown-content.select-dropdown li span {
    color: #000;
    font-size: 13px !important;

     /* no need for !important :) */
}
.select-dropdown{
text-align: left!important;
}.select-wrapper+label {
    position: absolute!important;
    top: -27px!important;
    font-size: 1.3rem!important;
    color: #ffc107!important;
}
.package-form label, select, input {
    font-size: 12px !important;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<section>
    <div id="fb-root"></div>
    <div class="fb-customerchat" attribution=setup_tool page_id="411933035571511">
    </div>
    <div class="tourz-search">
        <div class="container">
            <div class="row">
                <div class="tourz-search-1">
                    <h1>Discover the Best of Central Europe!</h1>
                    <p>Make your choice and plan your trip at the best price in just a few minutes.</p>

                    <!--  -->

                    {{--
                    <div class="row">
                        <div class="col-md-12 ">
                            <ul class="nav nav-tabs border-0">
                                <li class="active"><a data-toggle="tab" class="text-danger border"
                                        href="#City_Search_Tab">Search By City</a></li>
                                <li><a data-toggle="tab" class="text-danger border" href="#Country_Search_Tab">Search By
                                        Country</a></li>
                                <li><a data-toggle="tab" class="text-danger border" href="#Category_Search_Tab">Search
                                        By
                                        Category</a></li>
                                <li><a data-toggle="tab" class="text-danger border" href="#CustomCity_Search_Tab">Custom
                                        City Search</a></li>
                                <li><a data-toggle="tab" class="text-danger border"
                                        href="#CustomCountry_Search_Tab">Custom
                                        Country Search</a></li>

                            </ul>
                            <div class="tab-content">
                                <div id="City_Search_Tab" class="tab-pane fade in active">
                                    <div class="row d-flex flex-row justify-content-center align-items-center">

                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5">

                                            <select name="Event_Type" class="Event_Type_City" id="Event_Type_City">
                                                <option value="" disabled selected>Event Type</option>
                                                <option value="All">
                                                    All</option>
                                                <option value="Activity">
                                                    Activity
                                                </option>
                                                <option value="Cruise">
                                                    Cruise
                                                </option>
                                                <option value="Transfer">
                                                    Transfer
                                                </option>
                                                <option value="Daytour">
                                                    Daytour
                                                </option>
                                                <option value="Package">
                                                    Package
                                                </option>
                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Type</label>
                                        </div>




                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5 m-0 p-0">

                                            <select name="Event_City" class="Event_City" id="Event_City">
                                                <option value="" disabled selected>Choose City</option>
                                                @foreach($Event_Cities as $City)

                                                <option value="{{$City->id}}">
                                                    {{$City->name}}</option>
                                                @endforeach

                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                City</label>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <button type="button" class="btn btn-danger btn-block Search_Btn_City"
                                                id="Search_Btn_City">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="Country_Search_Tab" class="tab-pane fade">
                                    <div class="row d-flex flex-row justify-content-center align-items-center">
                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5">

                                            <select name="Event_Type" class="Event_Type_Country"
                                                id="Event_Type_Country">
                                                <option value="" disabled selected>Event Type</option>
                                                <option value="All">
                                                    All</option>
                                                <option value="Activity">
                                                    Activity
                                                </option>
                                                <option value="Cruise">
                                                    Cruise
                                                </option>
                                                <option value="Transfer">
                                                    Transfer
                                                </option>
                                                <option value="Daytour">
                                                    Daytour
                                                </option>
                                                <option value="Package">
                                                    Package
                                                </option>
                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Type</label>
                                        </div>




                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5 p-0 m-0">

                                            <select name="Event_Country" class="Event_Country" id="Event_Country">
                                                <option value="" disabled selected>Choose Country</option>
                                                @foreach($Event_Countries as $Country)

                                                <option value="{{$Country->id}}">
                                                    {{$Country->name}}</option>
                                                @endforeach

                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Country</label>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <button type="button" class="btn btn-danger btn-block Search_Btn_Country"
                                                id="Search_Btn_Country">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div id="Category_Search_Tab" class="tab-pane fade">
                                    <div class="row d-flex flex-row justify-content-center align-items-center">
                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5 m-0 p-0">

                                            <select name="Event_Type_Category" class="Event_Type_Category"
                                                id="Event_Type_Category">
                                                <option value="" disabled selected>Event Type</option>
                                                <option value="All">
                                                    All</option>
                                                <option value="Activity">
                                                    Activity
                                                </option>
                                                <option value="Cruise">
                                                    Cruise
                                                </option>
                                                <option value="Transfer">
                                                    Transfer
                                                </option>
                                                <option value="Daytour">
                                                    Daytour
                                                </option>
                                                <option value="Package">
                                                    Package
                                                </option>
                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Type</label>
                                        </div>




                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5 ">

                                            <select name="Event_Category" class="Event_Category" id="Event_Category">
                                                <option value="" disabled selected>Choose Category</option>
                                                @foreach($Event_Categories as $Category)

                                                <option value="{{$Category->id}}">
                                                    {{$Category->name}}</option>
                                                @endforeach

                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Country</label>
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <button type="button" class="btn btn-danger btn-block Search_Btn_Category"
                                                id="Search_Btn_Category">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->


                                <!--  -->
                                <div id="CustomCity_Search_Tab" class="tab-pane fade">
                                    <div class="row d-flex flex-row justify-content-center align-items-center">
                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5">

                                            <select name="Event_Type_CustomCity" class="Event_Type_CustomCity"
                                                id="Event_Type_CustomCity">
                                                <option value="" disabled selected>Event Type</option>
                                                <option value="All">
                                                    All</option>
                                                <option value="Activity">
                                                    Activity
                                                </option>
                                                <option value="Cruise">
                                                    Cruise
                                                </option>
                                                <option value="Transfer">
                                                    Transfer
                                                </option>
                                                <option value="Daytour">
                                                    Daytour
                                                </option>
                                                <option value="Package">
                                                    Package
                                                </option>
                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Type</label>
                                        </div>




                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5 m-0 p-0 ">

                                            <input type="text" name="Autocomplete_Cities" id="Autocomplete_Cities"
                                                class=" typeahead form-control  " autocomplete="off"
                                                placeholder="Enter  City Name" />
                                            <div id="Cities_List" class=""></div>
                                            {{ csrf_field() }}
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <button type="button" class="btn btn-danger btn-block Search_Btn_CutomCity"
                                                id="Search_Btn_CutomCity">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <!--  -->
                                <div id="CustomCountry_Search_Tab" class="tab-pane fade">
                                    <div class="row d-flex flex-row justify-content-center align-items-center">
                                        <div class="input-field col-md-4 s12 m12 l12 mt-5 mb-5">

                                            <select name="Event_Type_CustomCountry" class="Event_Type_CustomCountry"
                                                id="Event_Type_CustomCountry">
                                                <option value="" disabled selected>Event Type</option>
                                                <option value="All">
                                                    All</option>
                                                <option value="Activity">
                                                    Activity
                                                </option>
                                                <option value="Cruise">
                                                    Cruise
                                                </option>
                                                <option value="Transfer">
                                                    Transfer
                                                </option>
                                                <option value="Daytour">
                                                    Daytour
                                                </option>
                                                <option value="Package">
                                                    Package
                                                </option>
                                            </select>
                                            <label class="text-white font-weight-bold">Event
                                                Type</label>
                                        </div>








                                        <div class="input-field col s12 m-0 p-0">

                                            <input type="text" id="autocomplete-input" class="autocomplete">
                                            <label for="autocomplete-input" class="text-white font-weight-bold "
                                                style="margin-top:-5px;">Enter
                                                Country
                                                Name</label>
                                        </div>




                                        <div class="col-md-4 mt-2">
                                            <button type="button"
                                                class="btn btn-danger btn-block Search_Btn_CutomCountry"
                                                id="Search_Btn_CutomCountry">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->



                            </div>
                        </div>

                    </div>
                   --}}

                   <div class="row">
                    <div class="col-md-12">

                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <div class="input-field col-md-3 s12 m12 l12 mt-5 mb-5">

                                    <select name="Event_Type" class="Event_Type_City" id="Event_Type_City">
                                        <option value="" disabled selected>Event Type</option>
                                        <option value="All">All</option>
                                        <option value="Activity">Activity</option>
                                        <option value="Cruise">Cruise</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="Daytour">Daytour</option>
                                        <option value="Package">Package</option>
                                    </select>
                                    {{-- <label class="text-white font-weight-bold">Event Type</label> --}}
                                </div>




                                <div class="input-field col-md-5 s12 m12 l12 mt-5 mb-5 m-0 p-0">

                                    <select name="Event_City" class="Event_City" id="Event_City">
                                        <option value="" disabled selected>Choose City</option>
                                        @foreach($Event_Cities as $City)<option value="{{$City->id}}">{{$City->name}}</option>@endforeach
                                    </select>
                                    {{-- <label class="text-white font-weight-bold">Event City</label> --}}
                                </div>

                                <div class="col-md-4 mt-2">
                                    <button type="button" class="btn btn-danger btn-block Search_Btn_City"
                                        id="Search_Btn_City">Search</button>
                                </div>
                            </div>



                    </div>
                   </div>

                    <!--  -->
                    <div class="tourz-hom-ser">
                        <ul>
                            <li>
                                <a href="{{route('all.events.package')}}"
                                    class="waves-effect waves-light tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="0.5s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/packages.png" alt="">Packages</a>
                            </li>
                            <li>
                                <a href="{{route('all.events.daytour')}}"
                                    class="waves-effect waves-light tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="1s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/day-tour.png" alt=""> <i
                                        class="fas fa-plane-departure"></i>Day Tour</a>
                            </li>
                            <li>
                                <a href="{{route('all.events.activity')}}"
                                    class="waves-effect waves-light  tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="1.5s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/activity.png" alt=""> Activities</a>
                            </li>
                            <li>
                                <a href="{{route('all.events.cruise')}}"
                                    class="waves-effect waves-light tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="0.5s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/cruiser.png" alt="">Cruises</a>
                            </li>
                            <li>
                                <a href="{{route('all.events.transfer')}}"
                                    class="waves-effect waves-light tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="1s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/transfers.png" alt=""> <i
                                        class="fas fa-plane-departure"></i>Transfers</a>
                            </li>
                            <li>
                                <a href="{{route('events.show')}}"
                                    class="waves-effect waves-light  tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="1.5s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/event.png" alt=""> Events</a>
                            </li>
                            <li>
                                <a href="{{route('booknow.index')}}"
                                    class="waves-effect waves-light tourz-pop-ser-btn wow fadeInUp"
                                    data-wow-duration="0.5s"><img style=""
                                        src="{{url('theme/travel/')}}/images/icon/dis2.png" alt="">Booknow</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
</section>
<!--====== POPULAR TOUR PLACES ==========-->
<section>
    <div class="rows pad-bot-redu tb-spaces pt-5">
        <div class="container-fluid">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>Tour Packages</span></h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>We offer tour packages all over Europe find the perfect tour packages that best suits your needs.</p>
            </div>
            <!-- TOUR PLACE 1 -->
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach(DB::table('all__events')->where('event_type','Package')->orderBy('id','desc')->take(10)->get()
                    as $key=>$s)
                    <div class="item">
                        <a href="{{  url('event_detail') }}/{{ $s->id }}">
                            <div class="col-md-12 col-sm-12 col-xs-12 b_packages wow slideInUp p-t-10"
                                data-wow-duration="0.5s">
                                <!-- OFFER BRAND -->
                                @if($s->discount!=0)
                                <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png"
                                        alt="" /><span class="disc-text">{{$s->discount}}%<br>OFF</span></div>
                                @else
                                <!--  <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">No Discount</span></div> -->
                                @endif
                                <!--    <div class="band">-->
                                <!--    <div class="box">-->
                                <!--        <div class="ribbon"><span>{{$s->discount}}%</span></div>-->
                                <!--    </div>-->
                                <!--    {{--<span class="w3-tag w3-yellow"></span>--}}-->
                                <!--    {{--  <img src="{{url('/theme/travel')}}/images/band.png" alt="" />--}}-->
                                <!--</div>-->
                                <!-- IMAGE -->
                                <div class="v_place_img" style="height: 200px">
                                    <img src="{{$s->banner}}" alt="Tour Booking" title="Tour Booking"
                                        style="height: 100%;width: 100%">
                                    <!--<img src="{{url('/').App\StoragePath::path()}}/storage/activities/{{$s->banner}}" alt="Tour Booking" title="Tour Booking" style="height: 100%;width: 100%">-->
                                </div>
                                <!-- TOUR TITLE & ICONS -->
                                <div class="b_pack rows">
                                    <!-- TOUR TITLE -->
                                    <div class="col-lg-8 col-md-6">
                                        <h4>{{$s->event_name}}<span class="v_pl_name" style="color: black"></span></h4>
                                    </div>
                                    <!-- TOUR ICONS -->
                                    <div class="col-lg-4 col-md-6 pack_icon">
                                        <a href="{{  url('event_detail') }}/{{ $s->id }}"
                                            class="hot-page2-alp-quot-btn">Book
                                            Now</a>
                                        <!--<ul>-->
                                        <!--    <li>-->
                                        <!--        <a  href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/clock.png" alt="Date" title="Tour Timing" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a  href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/info.png" alt="Details" title="View more details" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a  href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a  href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/map.png" alt="Location" title="Location" /> </a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <center>
            <div class="container">
                <a class="link-btn" href="{{route('all.events.package')}}"> See All Packages</a>
            </div>
        </center>
    </div>
</section>
<section>
    <div class="rows pad-bot-redu tb-spaces">
        <div class="container-fluid">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>
                        Day Tours</span>
                </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>We offer days tours all over Europe find the perfect days tours that best suits your needs.</p>
                {{--
            <p>World's leading tour and travels Booking website,Over 30,000 Events worldwide.</p>
            --}}
            </div>
            <!-- TOUR PLACE 1 -->
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach(DB::table('all__events')->where('event_type','Daytour')->orderBy('id','desc')->get() as
                    $key=>$s)
                    <div class="item">
                        <a href="{{  url('event_detail') }}/{{ $s->id }}">
                            <div class="col-md-12 col-sm-12 col-xs-12 b_packages wow slideInUp p-t-10"
                                data-wow-duration="0.5s">
                                <!-- OFFER BRAND -->
                                @if($s->discount!=0)
                                <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png"
                                        alt="" /><span class="disc-text">{{$s->discount}}%<br>OFF</span></div>
                                @else
                                <!--  <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">No Discount</span></div> -->
                                @endif
                                <!--    <div class="band">-->
                                <!--    <div class="box">-->
                                <!--        <div class="ribbon"><span>{{$s->discount}}%</span></div>-->
                                <!--    </div>-->
                                <!--    {{--<span class="w3-tag w3-yellow"></span>--}}-->
                                <!--    {{--  <img src="{{url('/theme/travel')}}/images/band.png" alt="" />--}}-->
                                <!--</div>-->
                                <!-- IMAGE -->
                                <div class="v_place_img" style="height: 200px">
                                    <img src="{{$s->banner}}" alt="Tour Booking" title="Tour Booking"
                                        style="height: 100%;width: 100%">
                                    <!--<img src="{{url('/').App\StoragePath::path()}}/storage/activities/{{$s->banner}}" alt="Tour Booking" title="Tour Booking" style="height: 100%;width: 100%">-->
                                </div>
                                <!-- TOUR TITLE & ICONS -->
                                <div class="b_pack rows">
                                    <!-- TOUR TITLE -->
                                    <div class="col-md-8 col-sm-8">
                                        <h4>{{$s->event_name}}<span class="v_pl_name" style="color: black"></span></h4>
                                    </div>
                                    <!-- TOUR ICONS -->
                                    <div class="col-md-4 col-sm-4 pack_icon">
                                        <a href="{{  url('event_detail') }}/{{ $s->id }}"
                                            class="hot-page2-alp-quot-btn">Book Now</a>
                                        <!--<ul>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/clock.png" alt="Date" title="Tour Timing" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/info.png" alt="Details" title="View more details" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/map.png" alt="Location" title="Location" /> </a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <center>
            <div class="container">
                <a class="link-btn" href="{{route('all.events.daytour')}}"> See All Day Tours</a>
            </div>
        </center>
    </div>
</section>
<section>
    <div class="rows pad-bot-redu tb-spaces">
        <div class="container-fluid">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>
                        Transfers</span>
                </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>We offer days tours all over Europe find the perfect days tours that best suits your needs.</p>
                {{--
            <p>World's leading tour and travels Booking website,Over 30,000 Events worldwide.</p>
            --}}
            </div>
            <!-- TOUR PLACE 1 -->
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach(DB::table('all__events')->where('event_type','Transfer')->orderBy('id','desc')->get() as
                    $key=>$s)
                    <div class="item">
                        <a href="{{  url('event_detail') }}/{{ $s->id }}">
                            <div class="col-md-12 col-sm-12 col-xs-12 b_packages wow slideInUp p-t-10"
                                data-wow-duration="0.5s">
                                <!-- OFFER BRAND -->
                                @if($s->discount!=0)
                                <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png"
                                        alt="" /><span class="disc-text">{{$s->discount}}%<br>OFF</span></div>
                                @else
                                <!--  <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">No Discount</span></div> -->
                                @endif
                                <!--    <div class="band">-->
                                <!--    <div class="box">-->
                                <!--        <div class="ribbon"><span>{{$s->discount}}%</span></div>-->
                                <!--    </div>-->
                                <!--    {{--<span class="w3-tag w3-yellow"></span>--}}-->
                                <!--    {{--  <img src="{{url('/theme/travel')}}/images/band.png" alt="" />--}}-->
                                <!--</div>-->
                                <!-- IMAGE -->
                                <div class="v_place_img" style="height: 200px">
                                    <img src="{{$s->banner}}" alt="Tour Booking" title="Tour Booking"
                                        style="height: 100%;width: 100%">
                                    <!--<img src="{{url('/').App\StoragePath::path()}}/storage/activities/{{$s->banner}}" alt="Tour Booking" title="Tour Booking" style="height: 100%;width: 100%">-->
                                </div>
                                <!-- TOUR TITLE & ICONS -->
                                <div class="b_pack rows">
                                    <!-- TOUR TITLE -->
                                    <div class="col-md-8 col-sm-8">
                                        <h4>{{$s->event_name}}<span class="v_pl_name" style="color: black"></span></h4>
                                    </div>
                                    <!-- TOUR ICONS -->
                                    <div class="col-md-4 col-sm-4 pack_icon">
                                        <a href="{{  url('event_detail') }}/{{ $s->id }}"
                                            class="hot-page2-alp-quot-btn">Book Now</a>
                                        <!--<ul>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/clock.png" alt="Date" title="Tour Timing" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/info.png" alt="Details" title="View more details" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="#"><img src="{{url('/theme/travel')}}/images/map.png" alt="Location" title="Location" /> </a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <center>
            <div class="container">
                <a class="link-btn" href="{{route('all.events.transfer')}}"> See All Transfers</a>
            </div>
        </center>
    </div>
</section>
<section>
    <div class="rows pad-bot-redu tb-spaces">
        <div class="container-fluid">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>
                        Activities</span>
                </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>We offer activities all over Europe find the perfect activities that best suits your needs.</p>
                {{--
            <p>World's leading tour and travels Booking website,Over 30,000 Events worldwide.</p>
            --}}
            </div>
            <!-- TOUR PLACE 1 -->
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach(DB::table('all__events')->where('event_type','Activity')->orderBy('id','desc')->take(10)->get()
                    as $key=>$s)
                    <div class="item">
                        <a href="{{  url('event_detail') }}/{{ $s->id }}">
                            <div class="col-md-12 col-sm-12 col-xs-12 b_packages wow slideInUp p-t-10"
                                data-wow-duration="0.5s">
                                <!-- OFFER BRAND -->
                                @if($s->discount!=0)
                                <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png"
                                        alt="" /><span class="disc-text">{{$s->discount}}%<br>OFF</span></div>
                                @else
                                <!--  <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">No Discount</span></div> -->
                                @endif
                                <!--    <div class="band">-->
                                <!--    <div class="box">-->
                                <!--        <div class="ribbon"><span>{{$s->discount}}%</span></div>-->
                                <!--    </div>-->
                                <!--    {{--<span class="w3-tag w3-yellow"></span>--}}-->
                                <!--    {{--  <img src="{{url('/theme/travel')}}/images/band.png" alt="" />--}}-->
                                <!--</div>-->
                                <!-- IMAGE -->
                                <div class="v_place_img" style="height: 200px">
                                    <img src="{{$s->banner}}" alt="Tour Booking" title="Tour Booking"
                                        style="height: 100%;width: 100%">
                                    <!--<img src="{{url('/').App\StoragePath::path()}}/storage/activities/{{$s->banner}}" alt="Tour Booking" title="Tour Booking" style="height: 100%;width: 100%">-->
                                </div>
                                <!-- TOUR TITLE & ICONS -->
                                <div class="b_pack rows">
                                    <!-- TOUR TITLE -->
                                    <div class="col-md-8 col-sm-8">
                                        <h4>{{$s->event_name}}<span class="v_pl_name" style="color: black"></span></h4>
                                    </div>
                                    <!-- TOUR ICONS -->
                                    <div class="col-md-4 col-sm-4 pack_icon">
                                        <a href="{{  url('event_detail') }}/{{ $s->id }}"
                                            class="hot-page2-alp-quot-btn">Book
                                            Now</a>
                                        <!--<ul>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/clock.png" alt="Date" title="Tour Timing" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/info.png" alt="Details" title="View more details" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/map.png" alt="Location" title="Location" /> </a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <center>
            <div class="container">
                <a class="link-btn" href="{{route('all.events.activity')}}"> See All Activity</a>
            </div>
        </center>
    </div>
</section>
<section>
    <div class="rows pad-bot-redu tb-spaces">
        <div class="container-fluid">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Top <span>
                        Cruises</span>
                </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>We cruises tours all over Europe find the perfect cruises that best suits your needs.</p>
                {{--
            <p>World's leading tour and travels Booking website,Over 30,000 Events worldwide.</p>
            --}}
            </div>
            <!-- TOUR PLACE 1 -->
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach(DB::table('all__events')->where('event_type','Cruise')->orderBy('id','desc')->take(10)->get()
                    as $key=>$s)
                    <div class="item">
                        <a href="{{  url('event_detail') }}/{{ $s->id }}">
                            <div class="col-md-12 col-sm-12 col-xs-12 b_packages wow slideInUp p-t-10"
                                data-wow-duration="0.5s">
                                <!-- OFFER BRAND -->
                                @if($s->discount!=0)
                                <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png"
                                        alt="" /><span class="disc-text">{{$s->discount}}%<br>OFF</span></div>
                                @else
                                <!--  <div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">No Discount</span></div> -->
                                @endif
                                <!--    <div class="band">-->
                                <!--    <div class="box">-->
                                <!--        <div class="ribbon"><span>{{$s->discount}}%</span></div>-->
                                <!--    </div>-->
                                <!--    {{--<span class="w3-tag w3-yellow"></span>--}}-->
                                <!--    {{--  <img src="{{url('/theme/travel')}}/images/band.png" alt="" />--}}-->
                                <!--</div>-->
                                <!-- IMAGE -->
                                <div class="v_place_img" style="height: 200px">
                                    <img src="{{$s->banner}}" alt="Tour Booking" title="Tour Booking"
                                        style="height: 100%;width: 100%">
                                </div>
                                <!-- TOUR TITLE & ICONS -->
                                <div class="b_pack rows">
                                    <!-- TOUR TITLE -->
                                    <div class="col-md-8 col-sm-8">
                                        <h4>{{$s->event_name}}<span class="v_pl_name" style="color: black"></span></h4>
                                    </div>
                                    <!-- TOUR ICONS -->
                                    <div class="col-md-4 col-sm-4 pack_icon">
                                        <a href="{{  url('event_detail') }}/{{ $s->id }}"
                                            class="hot-page2-alp-quot-btn">Book Now </a>
                                        <!--<ul>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/clock.png" alt="Date" title="Tour Timing" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/info.png" alt="Details" title="View more details" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" /> </a>-->
                                        <!--    </li>-->
                                        <!--    <li>-->
                                        <!--        <a href="{{  url('event_detail') }}/{{ $s->id }}"><img src="{{url('/theme/travel')}}/images/map.png" alt="Location" title="Location" /> </a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <center>
            <div class="container">
                <a class="link-btn" href="{{route('all.events.cruise')}}"> See All Cruises</a>
            </div>
        </center>
    </div>
</section>
<section>
    <div class="rows tb-spaces pad-top-o pad-bot-redu">
        <div class="container-fluid pl-5 pr-5">
            <!-- TITLE & DESCRIPTION -->
            <div class="spe-title">
                <h2>Popular <span>Cities</span> </h2>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>We offer tours all over Europe find the perfect tours that best suits your needs.</p>
            </div>
            <!-- CITY -->
            @if($cities->count() == 9 )
            @foreach($cities as $key=>$item)
@if($key==0)
{{-- start of first col-md-6 with 3 pics    --}}
<div class="col-md-6">
    <div class="row">
<div class="col-md-12 m-0 p-1 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}" style="height:450px;" >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==1)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}" style="height:213px;" >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==2)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
</div>
</div>
{{-- end of first with 3 pics  col-md-6  --}}
{{-- start  of second with 3 pics  col-md-6  --}}
@elseif($key==3)
<div class="col-md-6">
    <div class="row">
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==4)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>

{{--  --}}
@elseif($key==5)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==6)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
{{--  --}}
@elseif($key==7)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==8)
<div class="col-md-6 m-0 p-1">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:213px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
</div>
</div>
@endif
@endforeach
            @else
            {{-- start --}}
            <div class="col-md-3 ">
                <a href="">
                    <div class="tour-mig-like-com">
                        <div class="tour-mig-lc-img">
                            <img src="https://1.bp.blogspot.com/-xp-Lh56Y3OU/VWXZt2cZqxI/AAAAAAAAQpM/8QaXlnwyvfc/s1600/most-beautiful-places-to-visit-in-Spain-2.jpg"
                                alt=""
                                title="Moscow, on the Moskva River in western Russia, is the nation’s cosmopolitan capital. In its historic core is the Kremlin, a complex that’s home to the president and tsarist treasures in the Armoury. Outside its walls is Red Square, Russia's symbolic center. It's home to Lenin’s Mausoleum, the State Historical Museum's comprehensive collection and St. Basil’s Cathedral, known for its colorful, onion-shaped domes."
                                style="height: 200px;width: 100%;">
                            {{--<img src="{{url('/theme/travel')}}/images/listing/home.jpg" alt="">--}}
                        </div>
                        <div class="tour-mig-lc-con">
                            <h5>Moscow</h5>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end --}}
            {{-- start --}}
            <div class="col-md-3 ">
                <a href="">
                    <div class="tour-mig-like-com">
                        <div class="tour-mig-lc-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS0cHMNmEDwm6liafyMIl_A4qO-CEj6fwVY3xNQbDxyncBfHAjG&usqp=CAU"
                                alt=""
                                title="Tokyo, Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city's many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum)."
                                style="height: 200px;width: 100%;">
                            {{--<img src="{{url('/theme/travel')}}/images/listing/home.jpg" alt="">--}}
                        </div>
                        <div class="tour-mig-lc-con">
                            <h5>Tokyo</h5>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end --}}
            {{-- start --}}
            <div class="col-md-3 ">
                <a href="">
                    <div class="tour-mig-like-com">
                        <div class="tour-mig-lc-img">
                            <img src="https://1.bp.blogspot.com/-xp-Lh56Y3OU/VWXZt2cZqxI/AAAAAAAAQpM/8QaXlnwyvfc/s1600/most-beautiful-places-to-visit-in-Spain-2.jpg"
                                alt=""
                                title="Moscow, on the Moskva River in western Russia, is the nation’s cosmopolitan capital. In its historic core is the Kremlin, a complex that’s home to the president and tsarist treasures in the Armoury. Outside its walls is Red Square, Russia's symbolic center. It's home to Lenin’s Mausoleum, the State Historical Museum's comprehensive collection and St. Basil’s Cathedral, known for its colorful, onion-shaped domes."
                                style="height: 200px;width: 100%;">
                            {{--<img src="{{url('/theme/travel')}}/images/listing/home.jpg" alt="">--}}
                        </div>
                        <div class="tour-mig-lc-con">
                            <h5>Moscow</h5>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end --}}
            {{-- start --}}
            <div class="col-md-3 ">
                <a href="">
                    <div class="tour-mig-like-com">
                        <div class="tour-mig-lc-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS0cHMNmEDwm6liafyMIl_A4qO-CEj6fwVY3xNQbDxyncBfHAjG&usqp=CAU"
                                alt=""
                                title="Tokyo, Japan’s busy capital, mixes the ultramodern and the traditional, from neon-lit skyscrapers to historic temples. The opulent Meiji Shinto Shrine is known for its towering gate and surrounding woods. The Imperial Palace sits amid large public gardens. The city's many museums offer exhibits ranging from classical art (in the Tokyo National Museum) to a reconstructed kabuki theater (in the Edo-Tokyo Museum)."
                                style="height: 200px;width: 100%;">
                            {{--<img src="{{url('/theme/travel')}}/images/listing/home.jpg" alt="">--}}
                        </div>
                        <div class="tour-mig-lc-con">
                            <h5>Tokyo</h5>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end --}}
            @endif
            <div style="height:300px">
            </div>
            <div class="col-md-12 col-md-offset-2 mx-auto text-center" style="margin: 15px 0;">
                <a class="link-btn" href="{{ route('popularcities.all') }}"> All Destinations</a>
            </div>
        </div>
    </div>
</section>
<!--====== FOOTER 1 ==========-->
<div class="alert cookies" style="z-index: 10000; position: fixed; bottom: -10px;height:45px;">
    <p style="font-size: 12px"><i class="fa fa-close" style="float: right;margin-right: 10px"
            onclick="$(this).parent().parent().toggle()"></i>WE AND OUR PARTNERS USE COOKIES ON THIS SITE TO IMPROVE OUR
        SERVICE, PERFORM ANALYTICS, PERSONALIZE ADVERTISING, MEASURE ADVERTISING PERFORMANCE, AND REMEMBER WEBSITE
        PREFERENCES. <a href="{{url('/cookie/policy')}}">COOKIE POLICY</a>
    </p>
</div>
@endsection
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script> --}}

{{-- <script>
   window.fbAsyncInit = function() {
   FB.init({
   appId      : '207766477231808',
   autoLogAppEvents : true,
   xfbml      : true,
   version    : 'v5.0'
   });
   FB.AppEvents.logPageView();

   };
   (function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s);
    js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> --}}
<script>
window.fbAsyncInit = function() {
    FB.init({
        appId: '207766477231808',
        xfbml: true,
        version: 'v6.0'
    });
};
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
{{--
<div class="fb-customerchat"
   page_id="411933035571511"></div>
--}}
<!-- Load Facebook SDK for JavaScript -->
<!-- Your customer chat code -->
