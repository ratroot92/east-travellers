@extends('layouts.website')
@section('content')
<style>


.heading-highlight{
    font-size:25px;
    letter-spacing: 3px;
    color:#253d52;
    font-family: 'Roboto', sans-serif;
    margin-top:15px;
    margin-bottom: 15px;
}
nav{
    background: transparent!important;
    margin-bottom:20px;

}
.custom-center{
    display: flex!important;
    justify-content: center!important;
    align-items: ceneter!important;
    flex-direction:row!important;
}
.page-link{
    font-weight: bold;

}
</style>


	<div class="container-fluid"style="padding-right: 150px;padding-left:150px;">
		<div class="row">
			<div class="col-md-12 text-center mt-5">
				<a href="{{ route('popularcities.all') }}" ><h2 style="color: #253d52; padding-left: 15px;font-size: 36px;">Popular <span style="color: #f4364f;font-size: 36px;">Cities</span></h2>
</a>
<p class="heading-highlight">Here, a list of the world's most popular cities by overnight visitors</p>
			</div>
		</div>

<!-- put row here -->
<div class="row	mt-5 list-unstyled  mt-2"style="margin:0px;padding:0px;" >

@if(isset($all_popularcities) )
@if($all_popularcities->count()==9)
@foreach($all_popularcities as $key=>$item)
@if($key==0)
{{-- start of first col-md-6 with 3 pics    --}}
<div class="col-md-6">
<div class="col-md-12 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}" style="height:530px;" >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==1)
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}" style="height:255px;" >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==2)
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
</div>
{{-- end of first with 3 pics  col-md-6  --}}
{{-- start  of second with 3 pics  col-md-6  --}}
@elseif($key==3)
<div class="col-md-6">
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==4)
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
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
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==6)
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
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
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($key==8)
<div class="col-md-6 ">
    <a href="">
        <div class="tour-mig-like-com">
            <div class="tour-mig-lc-img">
                <img src="{{$item->banner}}" alt="" title="{{ $item->description }}"style="height:255px;"  >
            </div>
            <div class="tour-mig-lc-con">
                <h5>{{$item->name}}</h5>
                <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
            </div>
        </div>
    </a>
</div>
</div>
@endif
@endforeach
{{-- pagination cont is not seven  --}}

@else
@foreach($all_popularcities as $key=>$item)
<div class="col-md-6">
    <div class="col-md-12 ">
        <a href="">
            <div class="tour-mig-like-com">
                <div class="tour-mig-lc-img">
                    <img src="{{$item->banner}}" alt="" title="{{ $item->description }}" style="height:530px;" >
                </div>
                <div class="tour-mig-lc-con">
                    <h5>{{$item->name}}</h5>
                    <p><span>{{--12 Packages--}}</span> {{$item->country}}</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endforeach
@endif
</div>

<div class="row ">

	<div class="col-md-12 custom-center ">
		{{ $all_popularcities->links() }}
	</div>
</div>

	@else
	<p>
		No cities
	</p>
	@endif
</div>
</div>

@endsection
