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
   .radio-toolbar {
   display: flex;
   flex-direction: row;
   justify-content: space-between;
   align-items: center;
   margin-bottom:5px;
   margin-top: 0px;
   }
   .radio-toolbar input[type="radio"] {
   opacity: 0;
   position: fixed;
   width: 0;
   }
   .radio-toolbar a {
   display: inline-block !important;
   background-color: #fff;
   padding: 7px 30px;
   padding-left: 18px !important;
   font-size: 15px !important;
   border: none;
   border-radius: 0px;
   height: auto !important;
   border: 1px solid #000;
   }
   .radio-toolbar a:hover {
   background-color: #e72a43;
   color: #ffffff;
   font-weight:bold;
   border: 0px solid ;
   }
   .radio-toolbar input[type="radio"]:focus + a {
   border: 2px dashed #444;
   }
   .radio-toolbar input[type="radio"]:checked + a {
   background-color: #e72a43;
   border-color: #e3263f;
   border: none;
   color: #fff;
   }
   label{
   font-size: 15px!important
   }
   .card-body,.card{
   border :0px!important;
   }
   .panel-title{
   background-color: #f5f5f5;
   }
   .custom-label:hover{
   color: #e72a43;
   }
   #moreCitiesDiv{
   height: 120px;
   overflow-y: auto;
   }
   #moreCategoriesDiv{
   height: 120px;
   overflow-y: auto;
   }
   #moreCountriesDiv{
   height: 120px;
   overflow-y: auto;
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
         <!--
            <div class="switch  pull-right">{{-- start of switch --}}
               <label>
                  GRID VIEW
                  <input type="checkbox" checked="checked" id="viewCheckbox1">
                  <span class="lever"></span> LIST VIEW
               </label>
            </div>
            -->
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
                     <a data-toggle="collapse" href="#cities_collapsed">
                        <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin:-7px;">Go</button> </h4>
                     </a>
                  </h4>
               </div>
               <div id="cities_collapsed" class="panel-collapse collapsed">
                  <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                     <!--  <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin: -7px;">Go</button> </h4> -->
                     <input class="form-control" placeholder="city" id="input1" required />
                     <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                        <form>
                           <div id="cities">
                              <ul class="" >
                                 <li>
                                    <a href="{{route('all_daytours')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                       <div class="checkbox checkbox-info checkbox-circle">
                                          <input id="all_cities" class="cities city styled" value="all_cities" type="checkbox" />
                                          <label for="all_cities">All Cities </label>
                                       </div>
                                    </a>
                                 </li>
                                 @if(count($cities)>0)
                                 @foreach($cities as $key=>$city)
                                 <div >
                                    <input id="city{{$city}}" onClick="getCityNameForSearch(this.value)" value="{{$city}}" type="checkbox" />
                                    <label class="text-capitalize text-truncate" for="city{{$city}}">{{$city}} </label>
                                 </div>
                                 @endforeach
                                 @else
                                 <p>No  Cities</p>
                                 @endif
                              </ul>
                           </div>
                           <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCities" data-toggle="collapse" href="#moreCitiesDiv" role="button" aria-expanded="false" aria-controls="moreCitiesDiv">
                           view more
                           </a>
                           <div class="collapse" id="moreCitiesDiv">
                              <div class="card card-body m-0 p-1">
                                  @if(count($more_cities)>0)
                                 @foreach($more_cities as $key=>$more_city)
                                 <div>
                                    <input id="city_more{{$more_city}}" onClick="getCityNameForSearch(this.value)" value="{{$more_city}}" type="checkbox" />
                                    <label class="text-capitalize text-truncate" for="city_more{{$more_city}}">{{$more_city}} </label>
                                 </div>
                                 @endforeach
                                 @else
                                 <p>No  More Cities</p>
                                 @endif
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--END PART 4 : LEFT LISTINGS-->
         <div class="panel-group">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" href="#categories_collapse">
                        <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:-7px;">Go</button> </h4>
                     </a>
                  </h4>
               </div>
               <div id="categories_collapse" class="panel-collapse collapse">
                  <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                     <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select Categories <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn3" style="margin:0px;">Go</button> </h4> -->
                     <input class="form-control" placeholder="category" id="input3" required />
                     <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                        <form>
                           <div id="categories">
                              <ul class="" >
                                 <li>
                                    <a href="{{route('all_daytours')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                       <div class="checkbox checkbox-info checkbox-circle">
                                          <input id="all_categories" class="categories city styled" value="all_categories" type="checkbox" >
                                          <label for="all_categories">All Categories </label>
                                       </div>
                                    </a>
                                 </li>
                                 @if(count($categories)>0)
                                 @foreach($categories as $key=>$category)
                                 <div >
                                    <input id="category{{$category}}" onClick="getCategoryNameForSearch(this.value)" data-id="{{ $category }}" value="{{$category}}" type="checkbox" >
                                    <label class="text-capitalize text-truncate" for="category{{$category}}">{{$category}} </label>
                                 </div>
                                 @endforeach
                                 @else
                                 <p>No  Categories</p>
                                 @endif
                              </ul>
                           </div>
                           <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCategory" data-toggle="collapse" href="#moreCategoriesDiv" role="button" aria-expanded="false" aria-controls="moreCitiesDiv">
                           view more
                           </a>
                           <div class="collapse" id="moreCategoriesDiv">
                              <div class="card card-body m-0 p-1">
                                 @if(count($more_categories)>0)
                                 @foreach($more_categories as $key=>$more_category)
                                 <div >
                                    <input id="category_more{{$more_category}}" onClick="getCategoryNameForSearch(this.value)" value="{{$more_category}}" type="checkbox" >
                                    <label class="text-capitalize text-truncate" for="category_more{{$more_category}}">{{$more_category}} </label>
                                 </div>
                                 @endforeach
                                 @else
                                 <p>No More Categories</p>
                                 @endif
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="panel-group">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" href="#countries_collapse">
                        <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select  Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:-7px;">Go</button></h4>
                     </a>
                  </h4>
               </div>
               <div id="countries_collapse" class="panel-collapse collapse">
                  <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                     <!-- <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select  Country<button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn2" style="margin:0px;">Go</button></h4> -->
                     <input class="form-control" placeholder="country" id="input2" required />
                     <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                        <form>
                           <div id="countries">
                              <ul class="" >
                                 <li>
                                    <a href="{{route('all_daytours')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                                       <div class="checkbox checkbox-info checkbox-circle">
                                          <input id="all_countries" class="countries city styled" value="all_countries" type="checkbox" >
                                          <label for="all_countries">All Countries </label>
                                       </div>
                                    </a>
                                 </li>
                                  @if(count($countries)>0)
                                 @foreach($countries as $key=>$country)
                                 <div >
                                    <input id="country{{$country}}" onClick="getCountryNameForSearch(this.value)" value="{{$country}}" type="checkbox" >
                                    <label class="text-capitalize text-truncate" for="country{{$country}}">{{$country}} </label>
                                 </div>
                                 @endforeach
                                 @else
                                 <p>No Country</p>
                                 @endif
                              </ul>
                           </div>
                           <a class="btn btn-success btn-sm font-weight-bold" id="btnMoreCountry" data-toggle="collapse" href="#moreCountriesDiv" role="button" aria-expanded="false" aria-controls="moreCitiesDiv">
                           view more
                           </a>
                           <div class="collapse" id="moreCountriesDiv">
                              <div class="card card-body m-0 p-1">
                                  @if(count($more_countries)>0)
                                 @foreach($more_countries as $key=>$more_country)
                                 <div >
                                    <input id="country_more{{$more_country}}" onClick="getCountryNameForSearch(this.value)" value="{{$more_country}}" type="checkbox" >
                                    <label class="text-capitalize text-truncate" for="country_more{{$more_country}}">{{$more_country}} </label>
                                 </div>
                                 @endforeach
                                 @else
                                 <p>No More Countries</p>
                                 @endif
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PART 5 : LEFT LISTINGS-->
         <div class="panel-group">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h4 class="panel-title">
                     <a data-toggle="collapse" href="#price_collpased">
                        <h4><i class="fa fa-euro" aria-hidden="true"></i> Select Price Range</h4>
                     </a>
                  </h4>
               </div>
               <div id="price_collpased" class="panel-collapse collapse">
                  <div class="hot-page2-alp-l3 hot-page2-alp-l-com">
                     <!-- <h4><i class="fa fa-euro" aria-hidden="true"></i> Select Price Range</h4> -->
                     <div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
                        <form >
                           <ul>
                              <li>
                                 <div class="checkbox checkbox-info checkbox-circle">
                                    <input id="chp51" onClick="getPriceForSearch(this.value)"  class="price styled" value="250|0"   type="checkbox">
                                    <label for="chp51"> €250 - Above </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-info checkbox-circle">
                                    <input id="chp52" onClick="getPriceForSearch(this.value)"  class="price styled" value="100|250"  type="checkbox">
                                    <label for="chp52"> €100 - €250 </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-info checkbox-circle">
                                    <input id="chp53" onClick="getPriceForSearch(this.value)"  class="price styled" value="50|100"  type="checkbox">
                                    <label for="chp53"> €50 - €100 </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-info checkbox-circle">
                                    <input id="chp54" onClick="getPriceForSearch(this.value)"  class="price styled" value="25|50"  type="checkbox">
                                    <label for="chp54"> €25 - €50 </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-info checkbox-circle">
                                    <input id="chp55" onClick="getPriceForSearch(this.value)"  class="price styled" value="0|25"  type="checkbox">
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
      </div>
      <div class="col-md-9 " id="searchRendering">
          <div class="row ">
            <div class="col-md-12 ">
               <div class="radio-toolbar border-dark d-fle">
                  <input type="radio" id="radioPackages" name="options" value="1" >
                  <a class="custom_anchors "  href="{{route('booknow')}}" id="all"  >All</a>
                  <input type="radio" id="radioPackages" name="options" value="1" >
                  <a class="custom_anchors" href="{{route('all_packages')}}" id="packages"   >Packages</a>
                  <input type="radio" id="radioDaytours" name="options" value="2" checked>
                  <a class="custom_anchors font-weight-bold" href="{{route('all_daytours')}}" id="daytours"  >Day Tours</a>
                  <input type="radio" id="radioActivites" name="options" value="3" >
                  <a class="custom_anchors " href="{{route('all_activities')}}" id="activities"  >Activities</a>
                  <input type="radio" id="radioCruises" name="options" value="4">
                  <a class="custom_anchors" href="{{route('all_cruises')}}" id="cruises"  >Cruises</a>
                  <input type="radio" id="radioTransfer" name="options" value="5" >
                  <a class="custom_anchors" href="{{route('all_transfers')}}" id="transfers"  >Transfers</a>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 alert alert-info font-weight-bold d-flex flex-row justify-content-start align-items-center text-capitalize" id="message_div">

            </div>
         </div>


         @foreach($daytours as $key=>$item)
  <div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
            <div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
               @if(isset($item->banner))
               <img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">

               @else
                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAY1BMVEX///9wcHBpaWltbW1nZ2fx8fFxcXHh4eGOjo57e3v4+Pj09PR/f3+UlJS8vLzPz8/JycmEhITV1dW5ubmcnJxiYmLn5+fDw8Pf39+ysrKqqqqioqKKiors7OzX19esrKxaWlrsS8x/AAANYUlEQVR4nO2di5aqLBiGFRDFNDXFs9X9X+XPB9bUpDNhWMz+fddeM1O7A08g3wnIcTZt2rRp06ZNmzZt2rRp06ZNego/3YDV1QZdnpT/MmeAMCIcsaD9V0Ej7LrUdTHGSJCyvt0f/N2nG2VSA3Ndiah+ACjGVPRodfC9TzfOiHxgc7H8KRmpukP0qMuiuK2Opfe3x26CBBLNmItE3+EroTtyYkJc1senqh52fxR0jwRI6wz+oepiRuUgvRJSCv9khxLCgqKp6r/XoZ3gQdXllucf9l0mgNAISq+jd5yLEOtPeTp8ssmaCoAw+XZn6Cd512NOyG2Pfs1FiHPcN+IS/UiTNQWNRjMtlaABEx13N3Qv1yh0NA1O1cFqM+pJwh9bGHp+mhdx78oexfiO0xWc2GUsK9JjaaUZraHB+JlHht5wzNu4Z5igCye92hbRo8SN+uCU1qVdZjQRTcWBxhPCoU72RRYp0JtrVMCquQiLSfeU+rZMurkyFvpSoJRidY3eWlFJKqxL3DXp5y9RaSz2y5/v1WnTZYSP16jSFVQ4uuDp5on/OVAxTSI+GouQUEqFn7ZgbgxrMC/RKOCFF5YigpKfOcnaffIBlz7cg0YgL4cbeQ6/Xhpe4ZBU6ajxjwZhOevSrKuS+i85DM8qRSpGk0MXsyjr9kf/nwJNyb0VBVDEsvrT7TKnhLoTjhH/E27fk9qVh6oNsPL1Lpw/O1N/U2F52J8Cl3MEhOwfJLxokK5GYejF/NdVLpY/06ojWehMTai58TaWii6VG8+0CvoQ5WYIc+R+TniOENxFcrCRcLKjFhBmgpAbMvmS8PWBukAQUM0RQiKamwFUAVLwAcU/9OEALhwzSPhKgLRYJfoiTCPwuL+i/yPSjLx/0scI/VtCAqEFY0GXytsJNKox9EZ2EI7THUaq4/YmG2UVoYs7ebvAwhU3ZCwsIpSZS2XlI3c+TastewhBRF2HMntu6o0sI5QdNwCga+qNLCOUyaijbpr2R90R7ry3aDdHiFVImJo0FveEKWVvEE1mCeOvNlVTrX2dkLzDRSXzhCokLKZqeoYI0U+RgCnNE45Dk0GqxlgayipC9T8Od00mab6P0s8Syo7bEWousgBCagshdbnsuJqYNBY2EQrJWxUMq9M/SEgvHdcAYfoPEgosZSxkGuq4EuFbEm/zhCqygDSUO5dJ/eOEyljAVBqZq5baRDgaC2EOcW8M0C7CL2Mxl2ZcRGiPxUfyRmU0srCKEGfyxgmZ9LttIqRjGkoaC4MFbnsIx5Aw7MFYGFymYBOh9GN2AGjQWNwTJjOE+jHVT8+YvQ6llR+4GK8Gp9JnCDFZIoSnXusHQkxlx0ljYajA/SQhDg5LSt95NIc414cqJKzAQBs0Fr8T4qXv5vUziHN9qCKLFhuNLH4lpKOREg0+NVednvKLS03CS83i4r69hZB+fZwlv6wnRJg/9xnHeHLCmSG8GgvqEpMLiX8bpddArbz5v9Hl8PbVnOQrFtOdOEOo7vbYNTH8LsJLkavk14TnZc1pe10m+k0YSSdaj1CFhKVhv/s74WNscSXcde1VnXSqhsn2K2F9QiaHpjQW3UcIH3X6IbuqTzhOaaYjiycJd1Mrto7sB9dlAaEKeuVUatJYPEdYcViPffFWxF/y79kOXEaohmZg2lh8z+pPE46rlG9Ev/1+nXAsNoGbwI0uu/wttlCERLvApE2ozJI0FtQk4HOESZRpKtLvQzk0ayTcKHMZ/acJnVBbji6hMhYHQi+J4fcSLpMO4TiVmjcWLxCGaVPEcZfPp1S0CNWfnenIYjnh0I2bmRBx55ZyPE9IKFbFpgy71PAuhIWEOcFqq7MLOQA2HU3p9OFoLGD/v6mFpS8RtkRWw2SyQkQ72J3Mb+oQqvyhtzrhk37pScZzUXuoj2lBoanu1MO0CGX+0MdXB/WjhJXs6sumtqGAtrKJDKfGdegymYYCt9HULoQXCAd5fIT/7TUmYjqNPsS9/LyEsaCm16AtIGyvHsiQqnQDjFr8aDV0CMeMvtkCt1SlTegxrD7nMuPnsYnCX54IzDVG6Tg0ofyLzZV/FxKKa0UujSwpCfKxNQd0qY0tJCTKWMgnGN7QpU8I+4jgEw/Il3cVRngiqtMYpcpYhPL4FLOACwhjMUhTmNhvK9EicCUPNlGDkKskDTZb4F5IKK45yCYezrcOcownZgid61AOzTWMxQLCQBEO8e3k+SqhsvJmF5YuJizEKH1ohejYqUc+S8hvyr8GC9xS+oR7MdN8twyDsCD8IRWvQahGPJSrJuzqa9InhHXm6FuNFja5PM6BGoRqUMiFpaYPP9EnBMuA7rPSOzYZmT9PeFbGAsq/kVE8Zwmh7LD7pG0Mo+sxbtUglGNC1ixMG4slhKG8XL4mm7BA0+kjDcJrW8zWLC6vqhs9HREUFovRY0siiIGzCV/reUJV4Da8sPQFQifh0Isk6pqmoJDPwJPzw/OE6nd7TQx/nNA5yDSNOugKtg1mkxPg04SVmqV6d/Jy/gih4/fk2nyM2ulw4Pk+lA0IYZ+FcWOxlNAJ05iqei/r5gK65/tQDs0dpytMpYsJhcrjvsnTev5Df55QJnmEsTC7Gmp8cSuy+urnKsbiOcIh1VWygLBdI7J4kjDlc6supkUQ16quqXDC9MJSLcLH6/MX6VVIVa7VfIFbg1C7Boy0CKWxAffdpeaPVXyK8NDrnnrRaxFKDTCVBuZPTrJiLpXygdDkwtJRvxG+MH3vmBYhbO80noZyfid8IavQzMxPM4SndYzF74RL33Xo5ibgGcJ4HWPxBKGLF+1hd6cXl84TBuIJj9mstxAu0uw69jlCT161KxxCtxbhD5omLNfI6FtFaH5hqW2EcuWXuf3NFhK2eB1jYQ+h9LsNl38nCD90agRIroZa4zxPWwili2d4rZBdhHKtkPGahU2EB/C71zAW1hDCW5s6sfQ7IbWCsIVD6NYwFtYQQj0LrXKAty2EMJWuc7y1JddhCG9M1gC0hdCX0da/THizt+sfJZTNWCENZQ+h8f3Nc4T6+5sWaIpQLiw1XuCeIGQsihj8kLr8jm7vfF1sghDycitk9B8IP3X2peNAYGruELp5wnfqjlAefb1KZGEL4UrlX6k7r+2duiNc8yRcOwihZmF8YekoOwiDNRaWjrLjOgRHYGpfkQlZQSgXlq7jlVpCuM7C0lFWECYrFbilrCBMV9iydpUthCssLB1lD+EaNQuQNYRrGQtrCMdNpCvIGkLzC0tHWeG1pRyTtYyFHYRldSpWyeiDrCBcVeo6DHfvVij3i76L0DWWZNJQ5r6T8CNfLfdewg/pPYRvSQLP6R2E+6mFhzJve72x7PtyntI7CPXPuDKqNxBu2rTJbqUp7NHx08dktPqfv68zgdPfG06/T3nhma8WCrxVXJ4s0KCHg4tDvlJF+t3israuCMMqLqrLWRGScIiLtOuO3r6AbbK7qisKOZzLNt43MZTKjl3crJV9MSMuPHLq5UA4MDh1lo1XnyQsOUYEuQzO+R6c5Mw5ggM8aoIIwYiJzoenUKsvWI5jimJJGCC0z68rXhQhwVkjPoKmwKRywiJNAtiW32Oa7qGgWyOc+9nUKWf2SHDsEaaYOQOGdYMpGr+GaexDdHQYVG45JAkOTXPCosc4rKHsUASju0q76bMIbBEXWDGG77ErCXw975HgO0IsCGGZDxAWBPUMCBFsKSgkIeZnDiPYXgHhQDFmYRjhbBiC8SsoJgg9OB0rAcIYuU2LxSitCE12x9zgt42YF4dT1BICx9xXBFGKLktcQ07GUUpHwpDhqJV9WDLEkbjl7DJEe8pXWfdrSsgFoo7CscdJRml2MYIhdgUhpqIPaQuP2zsJozRgMNke93nawwQzFIyyzuo+HAZoXjioK2nwbv8nVD88uFc+LhQ/4J6aB10wfj/EbrCab6FSxIXMHnZsmwbfaiv//9Ounlnm4tel49W3Zc2yHK+6sK7/UALmxPn0WiV2jp387N5MJQSPlsE/87VK1ua1Y3jmmPs4Ojn7u8CKX/a8+GSt9U0rKCXY5YMT5o0wjXUjgqE6bxpof5UnI+Exb3KYWzhqjg0cwTASioevtFTNpHrcM3A0O86Ft8mpczzDF3gIY8B4oQj38p5UBlvCToh7FGEHVsPs1xysoBqjQ4toKFxvctgxIoZhdMp7zEMnQiOhlzU5eGlA2LaINIowJTTfU/KJ0qSOOsTKA4IjBAPUJQjC2ToVIRUpvwjhnhMSQRKHZU0x6hWh+KOuY7vDQ8fxqOsymGvA9WayuTkiTB6UcyUU3SYeAoQw04ioUBH2WARPhEydxWeRKiQAGXWRD842hpNciMA4EvRFOBARN1WqD4OdCCgCRVig7OhXleXuDcOB53kiwG/hFCf5NcQIx/se3/Shh3Cxj2QfuijLMK8U4QHhvqCWm43j+azO7OJYWImzdKdTmC4JL+VcmnMREjecnxl3PedMRGgID1IWP6XioYXdg9Qr1RgLS1801C9DdWMQ/pmYXcVv9YBd6cl7/HIXyseEpXro1Y3btGnTpk2bNm3atGnTpk2bNm36f+o/LtQjBj74YuUAAAAASUVORK5CYII=" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
               @endif
            </div>
            <div class="col-md-6" >
               <div class="trav-list-bod">
                  <a href="{{ url('/daytour/detail') }}/{{$item->id}}">
                     <h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
                        font-weight: 700;">{{$item->name}}</h3>
                  </a>
                  <p>{!!substr($item->desc,0,150)!!}</p>
               </div>
            </div>
            <div class="col-md-3">
               <div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
                  @if($item->disc !=0)
                  <div class="hot-page2-alp-r-hot-page-rat pull">{{$item->disc}}%Off</div>
                  @else
                  <div class="hot-page2-alp-r-hot-page-rat pull">No Discount</div>
                  @endif
                  <span class="hot-list-p3-1">From</span> <span class="hot-list-p3-2">€{{$item->price}}</span><span class="hot-list-p3-4">
                  <a href="{{ url('/daytour/detail') }}/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
                  </span>
               </div>
            </div>
            <div>
               <div class="trav-ami">
                  <h4>Detail and Includes</h4>
                  <ul>
                     @if(count($icons)>1 )
                     @foreach($icons as $icon )
                     @if($icon->name=='sightseeing' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon )
                     @if($icon->name=='hotel' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='transfer' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a16.png')}}"alt=""> <span>Transfer</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='days' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a18.png')}}"alt=""> <span>{{$item->duration}}</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='multiple_cities' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a19.png')}}" alt="">
                        <span style="font-size: 11px">  Multiple Cities</span>
                        @else
                        @endif
                        @endforeach
                        @foreach($icons as $icon )
                        @if($icon->name=='breakfast' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon )
                     @if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
                        <span style="font-size: 11px">  Cruise</span>
                        @else
                        @endif
                        @endforeach
                        @foreach($icons as $icon)
                        @if($icon->name=='flight_icon' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
                     @else
                     @endif
                     @endforeach
                     @foreach($icons as $icon)
                     @if($icon->name=='activity_icon' && $icon->fkey==$item->id)
                     <li href="{{ url('/daytour/detail') }}/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-activities-1/64/16-512.png" alt="">
                        <span style="font-size: 11px">  Activity</span>
                        @else
                        @endif
                        @endforeach
                        @else
                        @endif
                        <span>@if(count($cities)>1)
                        Multiple Cities
                        @else
                        @foreach($cities as $item)
                        {{$item->name}}
                        @endforeach
                        @endif</span>
                     </li>
                  </ul>
               </div>
            </div>
  </div>
         @endforeach

      </div>
      <div class="col-md-3"></div>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div  class="col-md-12">
            {{$daytours->links()}}
         </div>
      </div>
   </div>

</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
   function getCityNameForSearch(city)
                                 {
   var type =window.location.pathname.split("/").pop()
   console.log(type);
   console.log(city);
   window.location.href = "{{URL::to('booknow/list/city/')}}"+"/"+city+"/"+type;
                                 }
                                 function getCategoryNameForSearch(category){
                                    var type =window.location.pathname.split("/").pop()
   console.log(type);
   console.log(category);
   window.location.href = "{{URL::to('booknow/list/category/')}}"+"/"+category+"/"+type;
                                 }

                                 function getCountryNameForSearch(country){
                                    var type =window.location.pathname.split("/").pop()
   console.log(type);
   console.log(country);
   window.location.href = "{{URL::to('booknow/list/country/')}}"+"/"+country+"/"+type;
                                 }


                                 function getPriceForSearch(price){
                                    var type =window.location.pathname.split("/").pop()
   console.log(type);
   var arr=price.split('|');
  var  minprice=arr[0];
  var  maxprice=arr[1];
console.log(minprice,maxprice);
   window.location.href = "{{URL::to('booknow/list/price/')}}"+"/"+minprice+"/"+maxprice+"/"+type;
                                 }
</script>
<script>
   $(document).ready(function(){
   $('#btnMoreCities').on('click',function(){
   var classes=$('#moreCitiesDiv').attr('class');
   if(classes == 'collapse in'){
   $('#btnMoreCities').text("view more ");
   $('#btnMoreCities').addClass("btn-success ");
   $('#btnMoreCities').removeClass("btn-warning ");
   }
   else{
   $('#btnMoreCities').text("view less");
   $('#btnMoreCities').removeClass("btn-success ");
   $('#btnMoreCities').addClass("btn-warning ");
   }
   console.log(classes);
   })

   //categories

   $('#btnMoreCategories').on('click',function(){
   var classes=$('#moreCategoriesDiv').attr('class');
   if(classes == 'collapse in'){
   $('#btnMoreCategories').text("view more ");
   $('#btnMoreCategories').addClass("btn-success ");
   $('#btnMoreCategories').removeClass("btn-warning ");
   }
   else{
   $('#btnMoreCities').asdasdasext("view less");

   $('#btnMoreCities').removeClass("btn-success ");
   $('#btnMoreCities').addClass("btn-warning ");
   }
   console.log(classes);
   })

//countries

$('#btnMoreCountries').on('click',function(){
   var classes=$('#moreCountryDiv').attr('class');
   if(classes == 'collapse in'){
   $('#btnMoreCategories').text("view more ");
   $('#btnMoreCategories').addClass("btn-success ");
   $('#btnMoreCategories').removeClass("btn-warning ");
   }
   else{
   $('#btnMoreCities').asdasdasext("view less");

   $('#btnMoreCities').removeClass("btn-success ");
   $('#btnMoreCities').addClass("btn-warning ");
   }
   console.log(classes);
   })

   })
</script>

<script>
   $(document).ready(function(){

//bold activities button font

//global_data
var type_name="daytours";
var daytours_count="{{ count($daytours) }}"
//end glocal data

            var url_array =window.location.pathname.split("/");
             var key2=url_array[5];
            var key1=url_array[4];
            if(url_array[3]=='all_daytours'){


               console.log(daytours_count)
               $('#message_div').show();
    $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' ('+daytours_count+') <span class="font-weight-bold text-danger ml-2"></span>');
                //higlighting all cities
      $("input[value=all_cities]").prop( "checked", true );
      $("label[for=all_cities]").addClass("text-danger");
      //


       //higlighting all categories
      $("input[value=all_categories]").prop( "checked", true );
      $("label[for=all_categories]").addClass("text-danger");
      //



       //higlighting all countries
      $("input[value=all_countries]").prop( "checked", true );
      $("label[for=all_countries]").addClass("text-danger");
            }
else if(url_array[3]=='list'){
   if(url_array[4]=='city'){
      console.log("city searched");

      var val=$('#city'+key2).prop( "checked", true );
    var city_name=$('#city'+key2).val();
    var label=$("label[for=city"+key2+"]").addClass("text-danger")
    $('#message_div').show();
    if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no  '+type_name+' results for city <span class="font-weight-bold text-danger ml-2">'+city_name+'</span>');
    }
    else{


    $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' results for city <span class="font-weight-bold text-danger ml-2">'+city_name+'</span>');
   }
}
   else if (url_array[4]=='country'){
      console.log("country serached");
         $('#cities_collapsed').removeClass("collapsed");
         $('#cities_collapsed').addClass("collapse");
         $('#countries_collapse').removeClass("collapse");
         $('#countries_collapse').addClass("collpased");
       var val=$('#country'+key2).prop( "checked", true );
       var country_name=$('input[value='+key2+']').val();
        var label=$("label[for=country"+key2+"]").addClass("text-danger")

    $('#message_div').show();
    if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no '+type_name+' results for country <span class="font-weight-bold text-danger ml-2">'+country_name+'</span>');
    }
    else{


    $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' results for country <span class="font-weight-bold text-danger ml-2">'+country_name+'</span>');
   }
}
   else if(url_array[4]=='category'){
       console.log("category  serached");
       $('#cities_collapsed').removeClass("collapsed");
         $('#cities_collapsed').addClass("collapse");
         $('#categories_collapse').removeClass("collapse");
         $('#categories_collapse').addClass("collpased");
         new_key2= key2.replace(/%20/g, " ");
              console.log(key2);
    var  input_colon_value="'"+new_key2+"'";
       var  label_colon_value="'category"+new_key2+"'";
       console.log(new_key2);
    var category_name=$("input[value="+input_colon_value+"]").prop( "checked", true );
    var label=$("label[for="+label_colon_value+"]").addClass("text-danger")
    $('#message_div').show();
    if(daytours_count == '0' || daytours_count == 0){
 $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no '+type_name+' results for category <span class="font-weight-bold text-danger ml-2">'+new_key2+'</span>');
    }
    else{


    $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' results for category <span class="font-weight-bold text-danger ml-2">'+new_key2+'</span>');
   }
}
   //price
    if(url_array[4] == 'price'){
      console.log("price searched");
      //collapse
         $('#cities_collapsed').removeClass("collapsed");
         $('#cities_collapsed').addClass("collapse");
         $('#price_collpased').removeClass("collapse");
         $('#price_collpased').addClass("collpased");
      //end collpase
      var minprice=url_array[5];
      var maxprice=url_array[6];




      if(minprice=='250' && maxprice == '0'){
  console.log(minprice,maxprice);
  $('#chp51').prop("checked",true);
  $('label[for=chp51]').addClass("text-danger");
  $('#message_div').show();
  if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no   '+type_name+' results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }else{
   $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' ('+daytours_count+') results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }

      }




      else if(minprice =='100' && maxprice == '250'){
  console.log(minprice,maxprice);
   $('#chp52').prop("checked",true);
  $('label[for=chp52]').addClass("text-danger");
  $('#message_div').show();
  if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no   '+type_name+' results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }else{
   $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' ('+daytours_count+') results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }

      }





      else if(minprice =='50' && maxprice == '100'){
  console.log(minprice,maxprice);
   $('#chp53').prop("checked",true);
  $('label[for=chp53]').addClass("text-danger");
  $('#message_div').show();
  if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no   '+type_name+' results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }else{
   $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' ('+daytours_count+') results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }

      }





      else if(minprice =='25' && maxprice == '50'){
  console.log(minprice,maxprice);
   $('#chp54').prop("checked",true);
  $('label[for=chp54]').addClass("text-danger");
  $('#message_div').show();
  if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no   '+type_name+' results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }else{
   $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' ('+daytours_count+') results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }

      }





      else if(minprice =='0' && maxprice == '25'){
  console.log(minprice,maxprice);
   $('#chp55').prop("checked",true);
  $('label[for=chp55]').addClass("text-danger");
  $('#message_div').show();
  if(daytours_count == '0' || daytours_count == 0){
$('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> no   '+type_name+' results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }else{
   $('#message_div').empty().append('<i class="fa fa-list-alt text-danger  fa-2x mr-5" aria-hidden="true"></i> found all '+type_name+' ('+daytours_count+') results for price range  <span class="font-weight-bold text-danger ml-2">[ min price = '+minprice+' &&  maxprice = '+maxprice+']</span>');
  }

      }
      else{
           console.log(minprice,maxprice);
      }
   }
}


   })

</script>

<script>
   $(document).ready(function (){
      $('#all_cities').on('click',function(){
        window.location.href = "{{URL::to('booknow/all_daytours')}}";
      });
       $('#all_categories').on('click',function(){
        window.location.href = "{{URL::to('booknow/all_daytours')}}";
      });
        $('#all_countries').on('click',function(){
        window.location.href = "{{URL::to('booknow/all_daytours')}}";
      });
   })
</script>