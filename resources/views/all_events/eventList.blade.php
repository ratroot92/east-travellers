@extends('layouts.website')
@section('content')
<style>
nav{
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
         <h2><span>Book -</span> Your Favourite Activitiy Now!</h2>
         <ul>
            <li><a href="#inner-page-title">Home</a>
         </li>
         <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
         <li><a href="#inner-page-title" class="bread-acti">Activities</a>
      </li>
   </ul>
   <p>Book travel activities and enjoy your holidays with distinctive experience</p>
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
         <input type="checkbox" checked="checked" id="viewCheckbox1">
         <span class="lever"></span> LIST VIEW
      </label>
   </div>
   {{-- end of switch --}}
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
            <a data-toggle="collapse" href="#collapse1"><h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin:-7px;">Go</button> </h4></a>
            </h4>
         </div>
         <div id="collapse1" class="panel-collapse collapsed">
            <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
               <!--  <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin: -7px;">Go</button> </h4> -->
               <input class="form-control" placeholder="city" id="input1" required />
               <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                  <form>
                     <div id="cities">
                        <ul class="" >
                            <li>
                               <a href="{{  url('/activities/list') }}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="" class="cities city styled" value="all_cities" type="checkbox" >
                                 <label for="">All Cities </label>
                              </div>
                              </a>
                           </li>
                          @foreach($Event_Cities=DB::table('event__cities')->orderBy('id','desc')->take(5)->distinct()->get() as $key=>$city)

                           <li>
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="{{ $city->id }}" onClick="getCityNameForSearch(this.value)" class="cities city styled"  value="{{$city->id}}" type="checkbox" >
                                 <label for="{{ $city->id }}">{{$city->name ?? 'NA'}} </label>
                              </div>
                           </li>
                           @endforeach
                        </ul>
                     </div>

                     <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_city_btn">view more</a>
                     <div id="more_cities">
                        <ul class="" >
                           @foreach($cities=DB::table('cities')->where('of','activity')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get() as  $key=>$city)
                           @if($cities)
                           <li>
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="city{{ $city->id }}" onClick="getCityNameForSearch(this.value)" class="cities city styled" value="{{$city->id}}" type="checkbox" >
                                 <label for="{{ $city->id }}">{{$city->name ?? 'NA'}} </label>
                              </div>
                           </li>
                           @else
                           <p>no more cities</p>

                           @endif
                           @endforeach
                        </ul>
                        <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s"  id="less_city_btn">view less</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--END PART 4 : LEFT LISTINGS-->
   {{--  --}}
   <div class="panel-group">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2"><h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:-7px;">Go</button> </h4></a>
            </h4>
         </div>
         <div id="collapse2" class="panel-collapse collapse">
            <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
               <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:0px;">Go</button> </h4> -->
               <input class="form-control" placeholder="category" id="input3" required />
               <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                  <form>
                     <div id="categories">

                        <ul class="" >
                            <li>
                               <a href="{{  url('/activities/list') }}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="" class="categories city styled" value="all_categories" type="checkbox" >
                                 <label for="">All Categories </label>
                              </div>
                           </a>
                           </li>
                            @foreach($Event_Categories=DB::table('package_cat')->orderBy('id','desc')->take(5)->distinct()->get() as $key=>$category)

                           <li>
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="{{ $category->id }}" class="categories category styled" value="{{$category->id}}" type="checkbox" >
                                 <label for="{{ $category->id }}">{{$category->name ?? 'NA'}} </label>
                              </div>
                           </li>
                           @endforeach
                        </ul>
                     </div>

                     <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_category_btn">view more</a>
                     <div id="more_categories">
                        <ul class="" >
                           @foreach($Event_Categories=DB::table('package_cat')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get() as  $key=>$category)

                           <li>
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="more_{{ $category->id }}"  class="categories category styled" value="{{$category->id}}" type="checkbox" >
                                 <label for="more_{{ $category->id }}">{{$category->name ?? 'NA'}} </label>
                              </div>
                           </li>
                           @endforeach
                        </ul>
                        <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s"  id="less_category_btn">view less</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   {{--  --}}
   {{-- country --}}
   <div class="panel-group">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse3"><h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select  Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:-7px;">Go</button></h4></a>
            </h4>
         </div>
         <div id="collapse3" class="panel-collapse collapse">
            <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
               <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select  Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:0px;">Go</button></h4> -->
               <input class="form-control" placeholder="country" id="input2" required />
               <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                  <form>
                     <div id="countries">

                        <ul class="" >
                            <li>
                                <a href="{{  url('/activities/list') }}" style="padding:0px!important;margin:0px!important;color:white; border:none;"> <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="" class="countries city styled" value="all_countries" type="checkbox" >
                                 <label for="">All Countries </label>
                              </div>
                           </a>
                           </li>
                           @foreach($Event_Countries=DB::table('event__countries')->orderBy('id','desc')->take(5)->distinct()->get() as $key=>$country)

                           <li>
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="{{ $country->id }}" onClick="getCountryNameForSearch(this.value)" class="countries country styled" value="{{$country->id}}" type="checkbox" >
                                 <label for="{{ $country->id }}">{{$country->name ?? 'NA'}} </label>
                              </div>
                           </li>

                           @endforeach
                        </ul>
                     </div>

                     <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_country_btn">view more</a>
                     <div id="more_countries">
                        <ul class="" >
                        @foreach($Event_Countries=DB::table('event__countries')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get() as  $key=>$country)

                           <li>
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="country_{{ $country->id }}" onClick="getCountryNameForSearch(this.value)" class="countries country styled" value="{{$country->id}}" type="checkbox" >
                                 <label for="country_{{ $country->id }}">{{$country->name ?? 'NA'}} </label>
                              </div>
                           </li>

                           @endforeach
                        </ul>
                        <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s"  id="less_country_btn">view less</a>
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
            <a data-toggle="collapse" href="#collapse4"><h4><i class="fa fa-euro" aria-hidden="true"></i> Select Price Range</h4></a>
            </h4>
         </div>
         <div id="collapse4" class="panel-collapse collapse">
            <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
               <!-- <h4><i class="fa fa-euro" aria-hidden="true"></i> Select Price Range</h4> -->
               <div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
                  <form >
                     <ul>
                        <li>
                           <div class="checkbox checkbox-info checkbox-circle">
                              <input id="chp51" class="price styled" value="250"  type="checkbox">
                              <label for="chp51"> €250 - Above </label>
                           </div>
                        </li>

                        <li>
                           <div class="checkbox checkbox-info checkbox-circle">
                              <input id="chp52" class="price styled" value="250"  type="checkbox">
                              <label for="chp52"> €100 - €250 </label>
                           </div>
                        </li>
                        <li>
                           <div class="checkbox checkbox-info checkbox-circle">
                              <input id="chp53" class="price styled" value="100"  type="checkbox">
                              <label for="chp53"> €50 - €100 </label>
                           </div>
                        </li>
                        <li>
                           <div class="checkbox checkbox-info checkbox-circle">
                              <input id="chp54" class="price styled" value="50"  type="checkbox">
                              <label for="chp54"> €25 - €50 </label>
                           </div>
                        </li>
                        <li>
                           <div class="checkbox checkbox-info checkbox-circle">
                              <input id="chp55" class="price styled" value="25"  type="checkbox">
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
   @if(isset($All_Event))
   <div class="row">
   <div class="col-md-12 alert alert-success">
      <p class="text-dark font-weight-bold">Found Events for city <span class="text-primary font-weight-bold">{{ $Search_Param->name ?? '' }}</span> </p>
   </div>
</div>
   @foreach($All_Event as $key=>$item)

   <div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
      <div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
         <img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
      </div>
      <div class="col-md-6" >
         <div class="trav-list-bod">
            <a href="{{  url('event_detail/')}}/{{ $item->id }}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
            font-weight: 700;">{{$item->event_name}}</h3>
         <h4 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
            font-weight: 700;">Event Type : {{$item->event_type}}</h4></a>
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
            <a href="{{  url('event_detail/')}}/{{ $item->id }}" class="hot-page2-alp-quot-btn">Book Now</a>
         </span> </div>
      </div>
      <div>
         <div class="trav-ami">
            <h4>Detail and Includes</h4>
            {{--  --}}
            <ul>
               @foreach($item->GET_Icons as $Icon)
            @if($Icon->name == 'sightseeing')
           <li href="{{  url('event_detail/')}}/{{ $item->id }}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
            @endif
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
   <div class="container-fluid">
      <div class="row">
         <div  class="col-md-12">
            {{$All_Event->links()}}
         </div>
      </div>
   </div>
   @else
   <div class="col-md-9 " id="searchRendering">
<div class="row">
   @if(isset($Search_Param))
   <div class="col-md-12 alert alert-warning">
      <p class="text-info font-weight-bold">Found no events for  <span class="text-danger font-weight-bold">{{ $Search_Param->name ?? '' }}</span> </p>
   </div>
   @endif


</div>
         </div>


</div>

            @endif
   @endsection
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script>
      function getCityNameForSearch(city)                                 {
console.log(city);
window.location.href = "{{URL::to('all_events/city/')}}"+"/"+city;
                                 }
                                 function getCountryNameForSearch(country){
                                    console.log(country);
window.location.href = "{{URL::to('all_events/country/')}}"+"/"+country;
                                 }
   </script>
   <script>
      console.log(this.href.substring(this.href.lastIndexOf('/') + 1));
   </script>