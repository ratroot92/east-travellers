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
justify-content: space-around;
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
				<a data-toggle="collapse" href="#collapse1"><h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="city_search_btn" style="margin:-7px;">Go</button> </h4></a>
				</h4>
			</div>
			<div id="collapse1" class="panel-collapse collapsed">
				<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
					<!--  <h4><i class="fa fa-map-marker" aria-hidden="true" ></i> Select City <button type="button" class="btn btn-sm btn-primary pull-right " id="sbtn1" style="margin: -7px;">Go</button> </h4> -->
					<input class="form-control" placeholder="city" id="search_city_input"name="search_city_input" required />
					<div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
						<form>
							<div id="cities">
								<ul class="" >
									<li>
										<a href="{{ url('/booknow')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="" class="cities city styled" value="all_cities" type="checkbox" >
												<label for="">All Cities </label>
											</div>
										</a>
									</li>
									@foreach($cities=DB::table('cities')->orderBy('id','desc')->take(5)->get()->unique('name') as $key=>$city)
									<div >
										<input id="city{{$key}}" onClick="getCityNameForSearch(this.value)"  value="{{$city->name}}" type="checkbox" >
										<label for="city{{$key}}" >{{$city->name ?? 'NA'}} </label>
									</div>
									@endforeach
								</ul>
							</div>
							<a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_city_btn">view more</a>
							<div id="more_cities">
								@foreach($cities=DB::table('cities')->orderBy('id','desc')->skip(5)->take(100)->get()->unique('name') as $key=>$city)
								<div >
									<input id="city1{{$key}}" onClick="getCityNameForSearch(this.value)"   value="{{$city->name}}" type="checkbox" >
									<label for="city1{{$key}}" >{{$city->name ?? 'NA'}} </label>
								</div>
								@endforeach
								<a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s"  id="less_city_btn">view less</a>
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
										<a href="{{ url('/activities/list')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;">
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="" class="categories city styled" value="all_categories" type="checkbox" >
												<label for="">All Categories </label>
											</div>
										</a>
									</li>
									@foreach($categories=DB::table('categories')->orderBy('id','desc')->take(5)->get()->unique('name') as $key=>$category)
									<div >
										<input id="category{{$key}}"onClick="getCategoryNameForSearch(this.value)"  class="categories category styled" value="{{$category->name}}" type="checkbox" >
										<label for="category{{$key}}">{{$category->name ?? 'NA'}} </label>
									</div>
									@endforeach
								</ul>
							</div>
							<a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_category_btn">view more</a>
							<div id="more_categories">
								<ul class="" >
									@foreach($categories=DB::table('categories')->orderBy('id','desc')->skip(5)->take(100)->get()->unique('name') as $key=>$category)
									<div >
										<input id="more_category{{$key}}"onClick="getCategoryNameForSearch(this.value)"  class="categories category styled" value="{{$category->name}}" type="checkbox" >
										<label for="more_category{{$key}}">{{$category->name ?? 'NA'}} </label>
									</div>
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
										<a href="{{ url('/activities/list')}}" style="padding:0px!important;margin:0px!important;color:white; border:none;"> <div class="checkbox checkbox-info checkbox-circle">
											<input id="" class="countries city styled" value="all_countries" type="checkbox" >
											<label for="">All Countries </label>
										</div>
									</a>
								</li>
								@foreach($counstries=DB::table('countries')->orderBy('id','desc')->take(5)->get()->unique('name') as $key=>$country)
								<div class="checkbox checkbox-info checkbox-circle">
									<input id="country{{$key}}"onClick="getCountryNameForSearch(this.value)"  class="countries country styled" value="{{$country->name}}" type="checkbox" >
									<label for="country{{$key}}">{{$country->name ?? 'NA'}} </label>
								</div>
								@endforeach
							</ul>
						</div>
						<a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_country_btn">view more</a>
						<div id="more_countries">
							<ul class="" >
								@foreach($counstries=DB::table('countries')->orderBy('id','desc')->skip(5)->take(100)->get()->unique('name') as $key=>$country)
								<div class="checkbox checkbox-info checkbox-circle">
									<input id="more_country{{$key}}" class="countries country styled" value="{{$country->name}}"onClick="getCountryNameForSearch(this.value)"  type="checkbox" >
									<label for="more_country{{$key}}">{{$country->name ?? 'NA'}} </label>
								</div>
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
</div>
<style>


</style>
<div class="col-md-9 " id="searchRendering">


<div class="row">
	<div class="col-md-12">
		<div class="radio-toolbar border-dark d-fle">


             	<input type="radio" id="radioPackages" name="options" value="1" checked>
             	<a class="custom_anchors "  href="{{route('booknow')}}" id="all" class="all" >All</a>
             	<input type="radio" id="radioPackages" name="options" value="1" >
             	 <a class="custom_anchors" href="{{route('all_packages')}}" id="packages" class="packages" >Packages</a>
                <input type="radio" id="radioDaytours" name="options" value="2">
               	<a class="custom_anchors" href="{{route('all_daytours')}}" id="daytours" class="daytours" >Day Tours</a>
                <input type="radio" id="radioActivites" name="options" value="3">
               <a class="custom_anchors" href="{{route('all_activities')}}" id="activities" class="activities" >Activities</a>
                <input type="radio" id="radioCruises" name="options" value="4">
               <a class="custom_anchors" href="{{route('all_cruises')}}" id="cruises" class="cruises" >Cruises</a>
                <input type="radio" id="radioTransfer" name="options" value="5">
               <a class="custom_anchors" href="{{route('all_transfers')}}" id="transfers" class="transfers" >Transfers</a>
              </div>
	</div>
</div>
@foreach($activities as $key=>$item)
<div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
	<div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
		<img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
	</div>
	<div class="col-md-6" >
		<div class="trav-list-bod">
			<a href="{{ url('/activity/detail')}}/{{$item->id}}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
			font-weight: 700;">{{$item->name}}</h3></a>
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
			<a href="{{ url('/activity/detail')}}/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
		</span> </div>
	</div>
	<div>
		<div class="trav-ami">
			<h4>Detail and Includes</h4>
			<ul>
				@if(count($icons)>1 )
				@foreach($icons as $icon )
				@if($icon->name=='sightseeing' && $icon->fkey==$item->id)
				<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon )
				@if($icon->name=='hotel' && $icon->fkey==$item->id)
				<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon)
				@if($icon->name=='transfer' && $icon->fkey==$item->id)
				<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a16.png')}}"alt=""> <span>Transfer</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon)
				@if($icon->name=='days' && $icon->fkey==$item->id)
				<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a18.png')}}"alt=""> <span>{{$item->duration}}</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon)
				@if($icon->name=='multiple_cities' && $icon->fkey==$item->id)
				<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a19.png')}}" alt="">
					<span style="font-size: 11px">  Multiple Cities</span>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon )
					@if($icon->name=='breakfast' && $icon->fkey==$item->id)
					<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon )
					@if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
					<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon)
					@if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
					<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon)
					@if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
					<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon)
					@if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
					<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
						<span style="font-size: 11px">  Cruiser</span>
						@else
						@endif
						@endforeach
						@foreach($icons as $icon)
						@if($icon->name=='flight_icon' && $icon->fkey==$item->id)
						<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
						@else
						@endif
						@endforeach
						@foreach($icons as $icon)
						@if($icon->name=='activity_icon' && $icon->fkey==$item->id)
						<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-activities-1/64/16-512.png" alt="">
							<span style="font-size: 11px">  Activity</span>
							@else
							@endif
							@endforeach
							@else
							@endif
							{{-- <span>@if(count($cities)>1)
								Multiple Cities
								@else
								@foreach($cities as $item)
								{{$item->name}}
								@endforeach
							@endif</span> --}}</li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			@foreach($cruises as $key=>$item)
			<div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
				<div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
					<img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
				</div>
				<div class="col-md-6" >
					<div class="trav-list-bod">
						<a href="{{  url('/cruise/detail') }}/{{$item->id}}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
						font-weight: 700;">{{$item->name}}</h3></a>
						<p>{!!substr($item->desc,0,150)!!}</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
						@if($item->disc !=0)
						<div class="hot-page2-alp-r-hot-page-rat pull">{{$item->disc}}%Off</div>
						@else
						<div class="hot-page2-alp-r-hot-page-rat pull">No Discount</div>
						@endif <span class="hot-list-p3-1">From</span> <span class="hot-list-p3-2">€{{$item->price}}</span><span class="hot-list-p3-4">
						<a href="{{  url('/cruise/detail') }}/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
					</span> </div>
				</div>
				<div>
					<div class="trav-ami">
						<h4>Detail and Includes</h4>
						<ul>
							@if(count($icons)>1 )
							@foreach($icons as $icon )
							@if($icon->name=='sightseeing' && $icon->fkey==$item->id)
							<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
							@else
							@endif
							@endforeach
							@foreach($icons as $icon )
							@if($icon->name=='hotel' && $icon->fkey==$item->id)
							<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
							@else
							@endif
							@endforeach
							@foreach($icons as $icon)
							@if($icon->name=='transfer' && $icon->fkey==$item->id)
							<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a16.png')}}"alt=""> <span>Transfer</span></li>
							@else
							@endif
							@endforeach
							@foreach($icons as $icon)
							@if($icon->name=='days' && $icon->fkey==$item->id)
							<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a18.png')}}"alt=""> <span>{{$item->duration}}</span></li>
							@else
							@endif
							@endforeach
							@foreach($icons as $icon)
							@if($icon->name=='multiple_cities' && $icon->fkey==$item->id)
							<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a19.png')}}" alt="">
								<span style="font-size: 11px">  Multiple Cities</span>
								@else
								@endif
								@endforeach
								@foreach($icons as $icon )
								@if($icon->name=='breakfast' && $icon->fkey==$item->id)
								<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
								@else
								@endif
								@endforeach
								@foreach($icons as $icon )
								@if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
								<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
								@else
								@endif
								@endforeach
								@foreach($icons as $icon)
								@if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
								<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
								@else
								@endif
								@endforeach
								@foreach($icons as $icon)
								@if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
								<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
								@else
								@endif
								@endforeach
								@foreach($icons as $icon)
								@if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
								<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
									<span style="font-size: 11px">  Cruiser</span>
									@else
									@endif
									@endforeach
									@foreach($icons as $icon)
									@if($icon->name=='flight_icon' && $icon->fkey==$item->id)
									<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
									@else
									@endif
									@endforeach
									@foreach($icons as $icon)
									@if($icon->name=='cruise_icon' && $icon->fkey==$item->id)
									<li href="{{  url('/cruise/detail') }}/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-cruises-1/64/16-512.png" alt="">
										<span style="font-size: 11px">  Activity</span>
										@else
										@endif
										@endforeach
										@else
										@endif
										{{-- <span>@if(count($cities)>1)
											Multiple Cities
											@else
											@foreach($cities as $item)
											{{$item->name}}
											@endforeach
										@endif</span> --}}</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- </a> -->
						@endforeach
						@foreach($transfers as $key=>$item)
						<div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
							<div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
								<img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
							</div>
							<div class="col-md-6" >
								<div class="trav-list-bod">
									<a href="{{ url('/transfers/detail') }}/{{$item->id}}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
									font-weight: 700;">{{$item->name}}</h3></a>
									<p>{!!substr($item->desc,0,150)!!}</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
									@if($item->disc !=0)
									<div class="hot-page2-alp-r-hot-page-rat pull">{{$item->disc}}%Off</div>
									@else
									<div class="hot-page2-alp-r-hot-page-rat pull">No Discount</div>
									@endif<span class="hot-list-p3-1">From</span> <span class="hot-list-p3-2">€{{$item->price}}</span><span class="hot-list-p3-4">
									<a href="{{ url('/transfers/detail') }}/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
								</span> </div>
							</div>
							<div>
								<div class="trav-ami">
									<h4>Detail and Includes</h4>
									<ul>
										@if(count($icons)>1 )
										@foreach($icons as $icon )
										@if($icon->name=='sightseeing' && $icon->fkey==$item->id)
										<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
										@else
										@endif
										@endforeach
										@foreach($icons as $icon )
										@if($icon->name=='hotel' && $icon->fkey==$item->id)
										<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
										@else
										@endif
										@endforeach
										@foreach($icons as $icon)
										@if($icon->name=='transfer' && $icon->fkey==$item->id)
										<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a16.png')}}"alt=""> <span>Transfer</span></li>
										@else
										@endif
										@endforeach
										@foreach($icons as $icon)
										@if($icon->name=='days' && $icon->fkey==$item->id)
										<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a18.png')}}"alt=""> <span>{{$item->duration}}</span></li>
										@else
										@endif
										@endforeach
										@foreach($icons as $icon)
										@if($icon->name=='multiple_cities' && $icon->fkey==$item->id)
										<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="{{asset('public/images/icon/a19.png')}}" alt="">
											<span style="font-size: 11px">  Multiple Cities</span>
											@else
											@endif
											@endforeach
											@foreach($icons as $icon )
											@if($icon->name=='breakfast' && $icon->fkey==$item->id)
											<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
											@else
											@endif
											@endforeach
											@foreach($icons as $icon )
											@if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
											<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
											@else
											@endif
											@endforeach
											@foreach($icons as $icon)
											@if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
											<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
											@else
											@endif
											@endforeach
											@foreach($icons as $icon)
											@if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
											<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
											@else
											@endif
											@endforeach
											@foreach($icons as $icon)
											@if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
											<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
												<span style="font-size: 11px">  Cruiser</span>
												@else
												@endif
												@endforeach
												@foreach($icons as $icon)
												@if($icon->name=='flight_icon' && $icon->fkey==$item->id)
												<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
												@else
												@endif
												@endforeach
												@foreach($icons as $icon)
												@if($icon->name=='transfers_icon' && $icon->fkey==$item->id)
												<li href="{{ url('/transfers/detail')}}/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-activities-1/64/16-512.png" alt="">
													<span style="font-size: 11px">  Activity</span>
													@else
													@endif
													@endforeach
													@else
													@endif
													{{-- <span>@if(count($cities)>1)
														Multiple Cities
														@else
														@foreach($cities as $item)
														{{$item->name}}
														@endforeach
													@endif</span> --}}</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- </a> -->
									@endforeach
									@foreach($packages as $key=>$item)
									<div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
										<div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
											<img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
										</div>
										<div class="col-md-6" >
											<div class="trav-list-bod">
												<a href="{{ url('/packages/detail') }}/{{$item->id}}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
												font-weight: 700;">{{$item->name}}</h3></a>
												<p>{!!substr($item->desc,0,150)!!}</p>
											</div>
										</div>
										<div class="col-md-3">
											<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
												@if($item->disc !=0)
												<div class="hot-page2-alp-r-hot-page-rat pull">{{$item->disc}}%Off</div>
												@else
												<div class="hot-page2-alp-r-hot-page-rat pull">No Discount</div>
												@endif <span class="hot-list-p3-1">From</span> <span class="hot-list-p3-2">€{{$item->price}}</span><span class="hot-list-p3-4">
												<a href="{{ url('/packages/detail') }}/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
											</span> </div>
										</div>
										<div>
											<div class="trav-ami">
												<h4>Detail and Includes</h4>
												<ul>
													@if(count($icons)>1 )
													@foreach($icons as $icon )
													@if($icon->name=='sightseeing' && $icon->fkey==$item->id)
													<li href="{{ url('/packages/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
													@else
													@endif
													@endforeach
													@foreach($icons as $icon )
													@if($icon->name=='hotel' && $icon->fkey==$item->id)
													<li href="{{ url('/packages/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
													@else
													@endif
													@endforeach
													@foreach($icons as $icon)
													@if($icon->name=='transfer' && $icon->fkey==$item->id)
													<li href="{{ url('/packages/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a16.png')}}"alt=""> <span>Transfer</span></li>
													@else
													@endif
													@endforeach
													@foreach($icons as $icon)
													@if($icon->name=='days' && $icon->fkey==$item->id)
													<li href="{{ url('/packages/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a18.png')}}"alt=""> <span>{{$item->duration}}</span></li>
													@else
													@endif
													@endforeach
													@foreach($icons as $icon)
													@if($icon->name=='multiple_cities' && $icon->fkey==$item->id)
													<li href="{{ url('/packages/detail') }}/{{$item->id}}"><img src="{{asset('public/images/icon/a19.png')}}" alt="">
														<span style="font-size: 11px">  Multiple Cities</span>
														@else
														@endif
														@endforeach
														@foreach($icons as $icon )
														@if($icon->name=='breakfast' && $icon->fkey==$item->id)
														<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
														@else
														@endif
														@endforeach
														@foreach($icons as $icon )
														@if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
														<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
														@else
														@endif
														@endforeach
														@foreach($icons as $icon)
														@if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
														<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
														@else
														@endif
														@endforeach
														@foreach($icons as $icon)
														@if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
														<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
														@else
														@endif
														@endforeach
														@foreach($icons as $icon)
														@if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
														<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
															<span style="font-size: 11px">  Cruiser</span>
															@else
															@endif
															@endforeach
															@foreach($icons as $icon)
															@if($icon->name=='flight_icon' && $icon->fkey==$item->id)
															<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
															@else
															@endif
															@endforeach
															@foreach($icons as $icon)
															@if($icon->name=='activity_icon' && $icon->fkey==$item->id)
															<li href="{{ url('/packages/detail')}}/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-packages-1/64/16-512.png" alt="">
																<span style="font-size: 11px">  Activity</span>
																@else
																@endif
																@endforeach
															</li>
														</ul>
														@else
														@endif
														{{-- <span>@if(count($cities)>1)
															Multiple Cities
															@else
															@foreach($cities as $item)
															{{$item->name}}
															@endforeach
														@endif</span> --}}
													</div>
												</div>
											</div>
											@endforeach
											@foreach($daytours as $key=>$item)
											<!-- <a href="/daytour/detail/{{$item->id}}"> -->
											<div class="row" style="border:1px solid #e9ecef;background-color: white!important;margin-bottom: 10px;">
												<div class="col-md-3 img-thumbnail  " style="padding:0px; margin:0px;border-radius:0px;">
													<img src="{{$item->banner}}" width="100%" height="150px"  alt="" style="padding:0px; margin:0px;">
												</div>
												<div class="col-md-6" >
													<div class="trav-list-bod">
														<a href="{{ url('/daytour/detail') }}/{{$item->id}}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
														font-weight: 700;">{{$item->name}}</h3></a>
														<p>{!!substr($item->desc,0,150)!!}</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="hot-page2-alp-ri-p3 tour-alp-ri-p3">
														@if($item->disc !=0)
														<div class="hot-page2-alp-r-hot-page-rat pull">{{$item->disc}}%Off</div>
														@else
														<div class="hot-page2-alp-r-hot-page-rat pull">No Discount</div>
														@endif <span class="hot-list-p3-1">From</span> <span class="hot-list-p3-2">€{{$item->price}}</span><span class="hot-list-p3-4">
														<a href="{{ url('/daytour/detail') }}/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
													</span> </div>
												</div>
												<div>
													<div class="trav-ami">
														<h4>Detail and Includes</h4>
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
															<li href="{{ url('/daytour/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
															@else
															@endif
															@endforeach
															@foreach($icons as $icon )
															@if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
															<li href="{{ url('/activity/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
															@else
															@endif
															@endforeach
															@foreach($icons as $icon)
															@if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
															<li href="{{ url('/daytour/detail')}}/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
															@else
															@endif
															@endforeach
															@foreach($icons as $icon)
															@if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
															<li href="{{ url('/daytour/detail')}}/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
															@else
															@endif
															@endforeach
															@foreach($icons as $icon)
															@if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
															<li href="{{ url('/daytour/detail')}}/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
																<span style="font-size: 11px">  Cruiser</span>
																@else
																@endif
																@endforeach
																@foreach($icons as $icon)
																@if($icon->name=='flight_icon' && $icon->fkey==$item->id)
																<li href="{{ url('/daytour/detail')}}/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
																@else
																@endif
																@endforeach
																@foreach($icons as $icon)
																@if($icon->name=='activity_icon' && $icon->fkey==$item->id)
																<li href="{{ url('/daytour/detail')}}/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-daytours-1/64/16-512.png" alt="">
																	<span style="font-size: 11px">  Activity</span>
																	@else
																	@endif
																	@endforeach
																</li>
																@else
																@endif
																{{-- <span>@if(count($cities)>1)
																	Multiple Cities
																	@else
																	@foreach($cities as $item)
																	{{$item->name}}
																	@endforeach
																@endif</span> --}}
															</div>
														</div>
													</div>
													@endforeach
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


											$(document).ready(function(){
												$('#city_search_btn').on('click',function(){
												var city_name=$('#search_city_input').val();
												if(city_name==''){
													alert('Please enter city name');
												}
												else{
													getCityNameForSearch(city_name);
												}
												})
											})
										</script>
