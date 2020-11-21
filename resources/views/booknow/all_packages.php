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
										<a href="/activities/list" style="padding:0px!important;margin:0px!important;color:white; border:none;">
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="" class="cities city styled" value="all_cities" type="checkbox" >
												<label for="">All Cities </label>
											</div>
										</a>
									</li>
									@foreach($cities=DB::table('cities')->orderBy('id','desc')->take(5)->get()->unique('name') as $key=>$city)


									<div >
										<input id="city{{$key}}"  value="{{$city->name}}" type="checkbox" >
										<label for="city{{$key}}">{{$city->name ?? 'NA'}} </label>
									</div>

									@endforeach
								</ul>
							</div>

							<a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s" id="more_city_btn">view more</a>
							<div id="more_cities">
								@foreach($cities=DB::table('cities')->orderBy('id','desc')->skip(5)->take(100)->get()->unique('name') as $key=>$city)


								<div >
									<input id="city{{$key}}"  value="{{$city->name}}" type="checkbox" >
									<label for="city{{$key}}">{{$city->name ?? 'NA'}} </label>
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
										<a href="/activities/list" style="padding:0px!important;margin:0px!important;color:white; border:none;">
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="" class="categories city styled" value="all_categories" type="checkbox" >
												<label for="">All Categories </label>
											</div>
										</a>
									</li>

									@foreach($categories=DB::table('categories')->orderBy('id','desc')->take(5)->get()->unique('name') as $key=>$category)


									<div >
										<input id="category{{$key}}" class="categories category styled" value="{{$category->name}}" type="checkbox" >
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
										<input id="more_category{{$key}}" class="categories category styled" value="{{$category->name}}" type="checkbox" >
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
										<a href="/activities/list" style="padding:0px!important;margin:0px!important;color:white; border:none;"> <div class="checkbox checkbox-info checkbox-circle">
											<input id="" class="countries city styled" value="all_countries" type="checkbox" >
											<label for="">All Countries </label>
										</div>
									</a>
								</li>

								@foreach($counstries=DB::table('countries')->orderBy('id','desc')->take(5)->get()->unique('name') as $key=>$country)


									<div class="checkbox checkbox-info checkbox-circle">
										<input id="country{{$key}}" class="countries country styled" value="{{$country->name}}" type="checkbox" >
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
										<input id="more_country{{$key}}" class="countries country styled" value="{{$country->name}}" type="checkbox" >
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
<div class="col-md-9 " id="searchRendering">



<div class="row">
	<div class="col-md-12 d-flex flex-row justify-content-around align-items-center">
		<a href="{{route('all_packages')}}" id="all" class="all" >ALL</a>
		<a href="" id="packages" class="packages" >Pacakegs</a>
		<a href="" id="transfers" class="transfers" >Transfers</a>
		<a href="" id="cruises" class="cruises" >Cruises</a>
		<a href="" id="daytours" class="daytours" >Day tours</button>

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
			<a href="/activity/detail/{{$item->id}}"><h3 style="color:#f4364f;font-family: 'Quicksand', sans-serif;
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
			<a href="/activity/detail/{{$item->id}}" class="hot-page2-alp-quot-btn">Book Now</a>
		</span> </div>
	</div>
	<div>
		<div class="trav-ami">
			<h4>Detail and Includes</h4>
			<ul>
				@if(count($icons)>1 )
				@foreach($icons as $icon )
				@if($icon->name=='sightseeing' && $icon->fkey==$item->id)
				<li href="/activity/detail/{{$item->id}}"><img src="{{asset('public/images/icon/a14.png')}}" alt=""> <span>Sightseeing</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon )
				@if($icon->name=='hotel' && $icon->fkey==$item->id)
				<li href="/activity/detail/{{$item->id}}"><img src="{{asset('public/images/icon/a15.png')}}" alt=""> <span>Hotel</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon)
				@if($icon->name=='transfer' && $icon->fkey==$item->id)
				<li href="/activity/detail/{{$item->id}}"><img src="{{asset('public/images/icon/a16.png')}}"alt=""> <span>Transfer</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon)
				@if($icon->name=='days' && $icon->fkey==$item->id)
				<li href="/activity/detail/{{$item->id}}"><img src="{{asset('public/images/icon/a18.png')}}"alt=""> <span>{{$item->duration}}</span></li>
				@else
				@endif
				@endforeach
				@foreach($icons as $icon)
				@if($icon->name=='multiple_cities' && $icon->fkey==$item->id)
				<li href="/activity/detail/{{$item->id}}"><img src="{{asset('public/images/icon/a19.png')}}" alt="">
					<span style="font-size: 11px">  Multiple Cities</span>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon )
					@if($icon->name=='breakfast' && $icon->fkey==$item->id)
					<li href="/activity/detail/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Breakfast</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon )
					@if($icon->name=='breakfast_halfboard' && $icon->fkey==$item->id)
					<li href="/activity/detail/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png" alt=""> <span>Half_board</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon)
					@if($icon->name=='breakfast_full_board' && $icon->fkey==$item->id)
					<li href="/activity/detail/{{$item->id}}"><img src="https://image.flaticon.com/icons/png/512/84/84072.png"alt=""> <span>Full_board</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon)
					@if($icon->name=='transfer_icon' && $icon->fkey==$item->id)
					<li href="/activity/detail/{{$item->id}}"><img src="http://simpleicon.com/wp-content/uploads/car.png"alt=""> <span>Transfer</span></li>
					@else
					@endif
					@endforeach
					@foreach($icons as $icon)
					@if($icon->name=='cruiser_icon' && $icon->fkey==$item->id)
					<li href="/activity/detail/{{$item->id}}"><img src="https://www.pngrepo.com/png/193576/170/cruiser-war.png" alt="">
						<span style="font-size: 11px">  Cruiser</span>
						@else
						@endif
						@endforeach
						@foreach($icons as $icon)
						@if($icon->name=='flight_icon' && $icon->fkey==$item->id)
						<li href="/activity/detail/{{$item->id}}"><img src="http://cdn.onlinewebfonts.com/svg/img_528940.png"alt=""> <span>Flight</span></li>
						@else
						@endif
						@endforeach
						@foreach($icons as $icon)
						@if($icon->name=='activity_icon' && $icon->fkey==$item->id)
						<li href="/activity/detail/{{$item->id}}"><img src="https://cdn1.iconfinder.com/data/icons/recreational-activities-1/64/16-512.png" alt="">
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
						window.location.href = "{{URL::to('activities/customsearch/city/')}}"+"/"+city;
						}
						else{
						}
						}
						});
						$('#chp42').on('click',function(){
						if($('#chp42').prop('checked')) {
						var city=$('#chp42').val();
						if(city!='NA'){
						window.location.href = "{{URL::to('activities/customsearch/city/')}}"+"/"+city;
						}
						else{
						}
						}
						});
						$('#chp43').on('click',function(){
						if($('#chp43').prop('checked')) {
						var city=$('#chp43').val();
						if(city!='NA'){
						window.location.href = "{{URL::to('activities/customsearch/city/')}}"+"/"+city;
						}
						else{
						}
						}
						});
						$('#chp44').on('click',function(){
						if($('#chp44').prop('checked')) {
						var city=$('#chp44').val();
						if(city!='NA'){
						window.location.href = "{{URL::to('activities/customsearch/city/')}}"+"/"+city;
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
						window.location.href = "{{URL::to('activities/customsearch/city/')}}"+"/"+city;
						}
						}
						else{
						}
						}
						});
						//price search
						$('#chp51').on('click',function(){
						if($('#chp51').prop('checked')) {
						var price=$('#chp51').val();
						window.location.href = "{{URL::to('activities/search1/')}}"+"/"+price;
						}
						});
						$('#chp52').on('click',function(){
						if($('#chp52').prop('checked')) {
						var price=$('#chp52').val();
						window.location.href = "{{URL::to('activities/search2/')}}"+"/"+price;
						}
						});
						$('#chp53').on('click',function(){
						if($('#chp53').prop('checked')) {
						var price=$('#chp53').val();
						window.location.href = "{{URL::to('activities/search3/')}}"+"/"+price;
						}
						});
						$('#chp54').on('click',function(){
						if($('#chp54').prop('checked')) {
						var price=$('#chp54').val();
						window.location.href = "{{URL::to('activities/search4/')}}"+"/"+price;
						}
						});
						$('#chp55').on('click',function(){
						if($('#chp55').prop('checked')) {
						var price=$('#chp55').val();
						window.location.href = "{{URL::to('activities/search5/')}}"+"/"+price;
						}
						});
						//cutom search
						$('#sbtn1').on('click',function(){
						var city=$('#input1').val();
						if(city!=''){
						window.location.href = "{{URL::to('/activities/customsearch/city')}}"+"/"+city;
						}
						else{
						//alert('City Name Is  Required')
						}
						});
						$('#sbtn2').on('click',function(){
						var country=$('#input2').val();
						if(country!=''){
						window.location.href = "{{URL::to('/activities/customsearch/country')}}"+"/"+country;
						}
						else{
						//alert('Country Name Is  Required')
						}
						});
						$('#sbtn3').on('click',function(){
						var category=$('#input3').val();
						if(category!=''){
						window.location.href = "{{URL::to('/activities/customsearch/category')}}"+"/"+category;
						}
						else{
						//alert('Category Name Is  Required');
						}
						});
						$('#viewCheckbox1').on('click',function(){
						window.location.href = "{{URL::to('/activities/grid')}}";
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