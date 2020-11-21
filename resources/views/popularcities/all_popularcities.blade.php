{{-- --}}

@extends('layouts.website')
@section('content')
    <style>
        .heading-highlight {
            font-size: 25px;
            letter-spacing: 3px;
            color: #253d52;
            font-family: 'Roboto', sans-serif;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .custom-tour-mig-lc-img img {
    width: 100%;
    /* height: 320px; */
    border-radius: 5px;
}
.cities-cover{
    height: 250px;
    width: 100%;
    object-fit: cover; // here
}

    </style>


    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <a href="{{ route('popularcities.all') }}">
                    <h2 style="color: #253d52; padding-left: 15px;font-size: 36px;">Popular <span
                            style="color: #f4364f;font-size: 36px;">Cities</span></h2>
                </a>
                {{-- <p class="heading-highlight">Here, a list of the world's most popular cities by overnight visitors</p> --}}
            </div>
        </div>

        <!-- put row here -->
        <div class="row	mt-5 list-unstyled  mt-2" >

            @if (isset($all_popularcities))
                @foreach ($all_popularcities as $item)
                    <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 col-xl-4  ">
                        <a href="">
                            <div class="tour-mig-like-com">
                                <div class="custom-tour-mig-lc-img img">
                                    <img class="cities-cover" src="{{ $item->banner }}" alt="{{ $item->description }}" title="{{ $item->description }}" class="img-fluid "
                                        >
                                </div>
                                <div class="tour-mig-lc-con">
                                    <h5>{{ $item->name }}</h5>
                                    <p><span></span> {{ $item->country }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            @else
                <p>
                    No cities
                </p>
            @endif
        </div>
    </div>

@endsection
