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
    <input type="checkbox"  id="viewCheckbox1">
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
         <ul class="" >
                            <li>
                           <a href="/activities/grid" style="padding:0px!important;margin:0px!important;color:white; border:none;">   <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="" class="cities city styled" value="all_cities" type="checkbox" >
                                 <label for="">All Cities </label>
                              </div>
                            </a>
                           </li>
         @foreach($cities=DB::table('cities')->where('of','activity')->orderBy('id','desc')->take(5)->distinct()->get() as $key=>$city)

         <li>

            <div class="checkbox checkbox-info checkbox-circle">
               <input id="city{{$key}}" class="cities city styled" value="{{$city->name}}" type="checkbox" >
               <label for="city{{$key}}">{{$city->name ?? 'NA'}} </label>
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
               <input id="more_city{{$key}}" class="cities city styled" value="{{$city->name}}" type="checkbox" >
               <label for="more_city{{$key}}">{{$city->name ?? 'NA'}} </label>
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
         <li>   <a href="/activities/grid" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="" class="categories city styled" value="all_categories" type="checkbox" >
                                 <label for="">All Categories </label>
                              </div>
                            </a>
                           </li>
         @foreach($categories=DB::table('categories')->where('of','activity')->orderBy('id','desc')->take(5)->distinct()->get() as $key=>$category)

         <li>
         <div class="checkbox checkbox-info checkbox-circle">
               <input id="category{{$key}}" class="categories category styled" value="{{$category->name}}" type="checkbox" >
               <label for="category{{$key}}">{{$category->name ?? 'NA'}} </label>
            </div>

         </li>
         @endforeach
      </ul>
   </div>

   <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_category_btn">view more</a>
   <div id="more_categories">
      <ul class="" >
         @foreach($counstries=DB::table('categories')->where('of','activity')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get() as  $key=>$category)

         <li>
            <div class="checkbox checkbox-info checkbox-circle">
               <input id="more_category{{$key}}" class="categories category styled" value="{{$category->name}}" type="checkbox" >
               <label for="more_category{{$key}}">{{$category->name ?? 'NA'}} </label>
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
       <li> <a href="/activities/grid" style="padding:0px!important;margin:0px!important;color:white; border:none;">
                              <div class="checkbox checkbox-info checkbox-circle">
                                 <input id="" class="countries city styled" value="all_countries" type="checkbox" >
                                 <label for="">All Countries </label>
                              </div>
                            </a> </li>

         @foreach($counstries=DB::table('countries')->where('of','activity')->orderBy('id','desc')->take(5)->distinct()->get() as $key=>$country)

         <li>
            <div class="checkbox checkbox-info checkbox-circle">
               <input id="country{{$key}}" class="countries country styled" value="{{$country->name}}" type="checkbox" >
               <label for="country{{$key}}">{{$country->name ?? 'NA'}} </label>
            </div>
         </li>
         @endforeach
      </ul>
   </div>

   <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_country_btn">view more</a>
   <div id="more_countries">
      <ul class="" >
         @foreach($counstries=DB::table('countries')->where('of','activity')->orderBy('id','desc')->skip(5)->take(10)->distinct()->get() as  $key=>$country)

         <li>
            <div class="checkbox checkbox-info checkbox-circle">
               <input id="more_country{{$key}}" class="countries country styled" value="{{$country->name}}" type="checkbox" >
               <label for="more_country{{$key}}">{{$country->name ?? 'NA'}} </label>
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

                 @foreach($activities  as $key=>$item)
                    <a href="/activity/detail/{{$item->id}}">
                    <div class="col-md-6 col-sm-6 col-xs-12 b_packages wow slideInUp" data-wow-duration="0.5s">
                        <!-- OFFER BRAND -->
                            @if($item->disc!=0)<div class="band"> <img src="{{url('/theme/travel')}}/images/icon/ribbon.png" alt="" /><span class="disc-text">{{$item->disc}}<br>OFF</span></div>
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
                            <img src="{{$item->banner}}" alt="Tour Booking" title="Tour Booking" style="height: 100%;width: 100%">
                        </div>
                        <!-- TOUR TITLE & ICONS -->
                        <div class="b_pack rows"><!-- TOUR TITLE -->
                            <div class="col-md-8 col-sm-8">
                                <h4>{{$item->name}}<span class="v_pl_name" style="color: black">{{$item->country}}</span></h4>
                            </div>


                            <div class="col-md-4 col-sm-4 pack_icon">
                                <ul>
                                    <li>
                                        <a href="/activity/detail/{{$item->id}}"><img src="{{url('/theme/travel')}}/images/clock.png" alt="Date" title="Tour Timing" /> </a>
                                    </li>
                                    <li>
                                        <a href="/activity/detail/{{$item->id}}"><img src="{{url('/theme/travel')}}/images/info.png" alt="Details" title="View more details" /> </a>
                                    </li>
                                    <li>
                                        <a href="/activity/detail/{{$item->id}}"><img src="{{url('/theme/travel')}}/images/price.png" alt="Price" title="Price" /> </a>
                                    </li>
                                    <li>
                                        <a href="/activity/detail/{{$item->id}}"><img src="{{url('/theme/travel')}}/images/map.png" alt="Location" title="Location" /> </a>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>
        </a>

        @endforeach

</div>{{-- end  col-md-8 --}}
</div>
</div>



<div class="container-fluid">
<div class="row">
<div  class="col-md-12">
            {{$activities->links()}}
</div>
</div>
</div>




@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){

//cities search

    $('#chp41').on('click',function(){
        if($('#chp41').prop('checked')) {
var city=$('#chp41').val();
if(city!='NA'){
window.location.href = "{{URL::to('activities/gridsearch/city/')}}"+"/"+city;
}
else{

}

}

    });




$('#chp42').on('click',function(){
if($('#chp42').prop('checked')) {
var city=$('#chp42').val();

if(city!='NA'){
window.location.href = "{{URL::to('activities/gridsearch/city/')}}"+"/"+city;
}
else{

}

}

});




$('#chp43').on('click',function(){
if($('#chp43').prop('checked')) {
var city=$('#chp43').val();
if(city!='NA'){
window.location.href = "{{URL::to('activities/gridsearch/city/')}}"+"/"+city;
}
else{

}

}

});





$('#chp44').on('click',function(){
if($('#chp44').prop('checked')) {
var city=$('#chp44').val();
if(city!='NA'){
window.location.href = "{{URL::to('activities/gridsearch/city/')}}"+"/"+city;
}
else{

}

}

});







$('#chp45').on('click',function(){
if($('#chp45').prop('checked')) {
var city=$('#chp45').val();
if(city!='NA'){
if(city!='NA'){
window.location.href = "{{URL::to('activities/gridsearch/city/')}}"+"/"+city;
}
}
else{

}


}

});


  //country search


    $('#chp31').on('click',function(){
        if($('#chp31').prop('checked')) {
var country=$('#chp31').val();
window.location.href = "{{URL::to('activities/gridsearch/country/')}}"+"/"+country;

}

    });




$('#chp32').on('click',function(){
if($('#chp32').prop('checked')) {
var country=$('#chp32').val();
window.location.href = "{{URL::to('activities/gridsearch/country/')}}"+"/"+country;

}

});




$('#chp33').on('click',function(){
if($('#chp33').prop('checked')) {
var country=$('#chp33').val();
window.location.href = "{{URL::to('activities/gridsearch/country/')}}"+"/"+country;

}

});





$('#chp34').on('click',function(){
if($('#chp34').prop('checked')) {
var country=$('#chp34').val();
window.location.href = "{{URL::to('activities/gridsearch/country/')}}"+"/"+country;

}

});







$('#chp35').on('click',function(){
if($('#chp35').prop('checked')) {
var country=$('#chp35').val();
window.location.href = "{{URL::to('activities/gridsearch/country/')}}"+"/"+country;

}

});





  //category serach


    $('#chp21').on('click',function(){
        if($('#chp21').prop('checked')) {
var category=$('#chp21').val();
window.location.href = "{{URL::to('activities/gridsearch/category/')}}"+"/"+category;

}

    });


     $('#chp22').on('click',function(){
        if($('#chp22').prop('checked')) {
var category=$('#chp22').val();
window.location.href = "{{URL::to('activities/gridsearch/category/')}}"+"/"+category;

}

    });





      $('#chp23').on('click',function(){
        if($('#chp23').prop('checked')) {
var category=$('#chp23').val();
window.location.href = "{{URL::to('activities/gridsearch/category/')}}"+"/"+category;

}

    });


   $('#chp24').on('click',function(){
        if($('#chp24').prop('checked')) {
var category=$('#chp24').val();
window.location.href = "{{URL::to('activities/gridsearch/category/')}}"+"/"+category;

}

    });




 $('#chp25').on('click',function(){
        if($('#chp25').prop('checked')) {
var category=$('#chp25').val();
window.location.href = "{{URL::to('activities/gridsearch/category/')}}"+"/"+category;

}

    });










//price search


    $('#chp51').on('click',function(){
        if($('#chp51').prop('checked')) {
var price=$('#chp51').val();
window.location.href = "{{URL::to('activities/gridsearch1/')}}"+"/"+price;

}

    });




$('#chp52').on('click',function(){
if($('#chp52').prop('checked')) {
var price=$('#chp52').val();
window.location.href = "{{URL::to('activities/gridsearch2/')}}"+"/"+price;

}

});




$('#chp53').on('click',function(){
if($('#chp53').prop('checked')) {
var price=$('#chp53').val();
window.location.href = "{{URL::to('activities/gridsearch3/')}}"+"/"+price;

}

});





$('#chp54').on('click',function(){
if($('#chp54').prop('checked')) {
var price=$('#chp54').val();
window.location.href = "{{URL::to('activities/gridsearch4/')}}"+"/"+price;

}

});







$('#chp55').on('click',function(){
if($('#chp55').prop('checked')) {
var price=$('#chp55').val();
window.location.href = "{{URL::to('activities/gridsearch5/')}}"+"/"+price;

}

});

//cutom search

$('#sbtn1').on('click',function(){
var city=$('#input1').val();
if(city!=''){
window.location.href = "{{URL::to('/activities/gridsearch/city')}}"+"/"+city;
}
else{
alert('City Name Is  Required')
}

});



$('#sbtn2').on('click',function(){
var country=$('#input2').val();

if(country!=''){
window.location.href = "{{URL::to('/activities/gridsearch/country')}}"+"/"+country;
}
else{
alert('Country Name Is  Required')
}

});




$('#sbtn3').on('click',function(){
var category=$('#input3').val();
if(category!=''){
window.location.href = "{{URL::to('/activities/gridsearch/category')}}"+"/"+category;
}
else{
alert('Category Name Is  Required');
}

});


$('#viewCheckbox1').on('click',function(){
window.location.href = "{{ route('booknow.grid') }}";
});



$('.countries').on('click',function(){
var country=$(this).val();
window.location.href = "{{URL::to('activities/customsearch/country/')}}"+"/"+country;
})
$('#more_countries').hide();
$('#more_country_btn').on('click',function(){
$('#more_countries').show();
$('#more_country_btn').hide();
})
$('#less_country_btn').on('click',function(){
$('#more_country_btn').show();
$('#more_countries').hide();
})










$('.categories').on('click',function(){
var category=$(this).val();
window.location.href = "{{URL::to('activities/customsearch/category/')}}"+"/"+category;
})
$('#more_categories').hide();
$('#more_category_btn').on('click',function(){
$('#more_categories').show();
$('#more_category_btn').hide();
})
$('#less_category_btn').on('click',function(){
$('#more_category_btn').show();
$('#more_categories').hide();
})



$('.cities').on('click',function(){
var city=$(this).val();
window.location.href = "{{URL::to('activities/customsearch/city/')}}"+"/"+city;
})
$('#more_cities').hide();
$('#more_city_btn').on('click',function(){
$('#more_cities').show();
$('#more_city_btn').hide();
})
$('#less_city_btn').on('click',function(){
$('#more_city_btn').show();
$('#more_cities').hide();
})






   });
</script>
