@extends('layouts.admin')

@section('content')

<!--== BODY INNER CONTAINER ==-->
<div class="sb2-2">
    <!--== breadcrumbs ==-->
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Dashboard</a>
            </li>


        </ul>
    </div>

    <!-- CHRAT -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="chartdiv">


                <!-- HTML -->

            </div>
        </div>
    </div>



    <!-- CHART -->


    <!--== DASHBOARD INFO ==-->
    <div class="ad-v2-hom-info">
        <div class="ad-v2-hom-info-inn">
            <ul>
                <li>
                    <div class="ad-hom-box ad-hom-box-1">
                        <span class="ad-hom-col-com ad-hom-col-1"><i class="fa fa-bar-chart"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Packages
                            </p>
                            <h3>{{$total_packages}}</h3>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ad-hom-box ad-hom-box-2">
                        <span class="ad-hom-col-com ad-hom-col-2"><i class="fa fa-usd"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Events
                            </p>
                            <h3>{{$total_events}}</h3>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="ad-hom-box ad-hom-box-4">
                        <span class="ad-hom-col-com ad-hom-col-4"><i class="fa fa-envelope-open-o"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Sight Seeings
                            </p>
                            <h3>{{$total_sight}}</h3>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="ad-v2-hom-info">
        <div class="ad-v2-hom-info-inn">
            <ul>
                <li>
                    <div class="ad-hom-box ad-hom-box-1">
                        <span class="ad-hom-col-com ad-hom-col-1"><i class="fa fa-bar-chart"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Daytours
                            </p>
                            <h3>{{$total_packages}}</h3>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ad-hom-box ad-hom-box-2">
                        <span class="ad-hom-col-com ad-hom-col-2"><i class="fa fa-usd"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Transfers
                            </p>
                            <h3>{{$total_events}}</h3>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="ad-hom-box ad-hom-box-4">
                        <span class="ad-hom-col-com ad-hom-col-4"><i class="fa fa-envelope-open-o"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Cruises
                            </p>
                            <h3>{{$total_sight}}</h3>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- --}}



    <!--== DASHBOARD INFO ==-->
    <div class="ad-v2-hom-info">
        <div class="ad-v2-hom-info-inn">
            <ul>
                <li>
                    <div class="ad-hom-box ad-hom-box-1">
                        <span class="ad-hom-col-com ad-hom-col-1"><i class="fa fa-bar-chart"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total
                                Activities</p>
                            <h3>{{$total_activities}}</h3>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ad-hom-box ad-hom-box-2">
                        <span class="ad-hom-col-com ad-hom-col-2"><i class="fa fa-usd"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Cruises
                            </p>
                            <h3>{{$total_cruises}}</h3>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ad-hom-box ad-hom-box-3">
                        <span class="ad-hom-col-com ad-hom-col-3"><i class="fa fa-address-card-o"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Daytours</p>
                            <h3>{{$total_daytours}}</h3>
                        </div>
                    </div>
                </li>
                <!-- <li>
                    <div class="ad-hom-box ad-hom-box-4">
                        <span class="ad-hom-col-com ad-hom-col-4"><i class="fa fa-envelope-open-o"></i></span>
                        <div class="ad-hom-view-com">
                            <p style="color:orange;font-weight:bold;"><i class="fa  fa-arrow-up up"></i> Total Transfers
                            </p>
                            <h3>{{$total_transfers}}</h3>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>



    {{-- --}}
    <div class="row">
        <!--                    <div class="col-sm-12 col-lg-6">-->
        <!--                        <div class="sb2-2-add-blog sb2-2-1">-->
        <!--                            <div class="box-inn-sp">-->
        <!--                                <h3>Events</h3>-->
        <!--                                <div class="table-responsive">-->
        <!--                                    <table class="table table-hover">-->
        <!--                                        <thead>-->
        <!--                                        <tr>-->
        <!--                                            <th>Sr.</th>-->
        <!--                                            <th>Name</th>-->
        <!--                                            <th>Date</th>-->
        <!--                                            <th>Time</th>-->
        <!--{{--                                            <th>Description</th>--}}-->
        <!--                                            <th>Place</th>-->
        <!--                                            <th style="width: 200px;">Image</th>-->
        <!--                                        </tr>-->
        <!--                                        </thead>-->
        <!--                                        <tbody>-->
        <!--                                        @foreach(DB::table('events')->get() as $key=>$event)-->
        <!--                                            <tr>-->
        <!--                                                <th>{{++$key}}</th>-->
        <!--                                                <td>{{$event->name}}</td>-->
        <!--                                                <td>{{$event->date}}</td>-->
        <!--                                                <td>{{$event->time}}</td>-->
        <!--{{--                                                <td>{{substr($event->description,0,100)}}</td>--}}-->
        <!--                                                <td>{{$event->place}}</td>-->
        <!--                                                <td>-->
        <!--                                                    <div class="col-sm-12">-->
        <!--                                                        <img src="{{url('/').App\StoragePath::path()}}/storage/events/{{$event->banner}}"style="height: 100%;width: 100%">-->
        <!--                                                    </div>-->
        <!--                                                </td>-->
        <!--                                            </tr>-->
        <!--                                        @endforeach-->
        <!--                                        </tbody>-->
        <!--                                    </table>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <div class="col-sm-12 col-lg-12">
            <div class="sb2-2-1">
                <div class="table-responsive">
                    <h2>All Inquiries</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                {{-- <th>No of Travelers</th>--}}
                                {{-- <th>Teavelers' Description</th>--}}
                                <th>City</th>
                                <th>Arrival</th>
                                <th>Departure</th>
                                <th>Min Price</th>
                                <th>Max Price</th>
                                {{-- <th>Other Details</th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(DB::table('custom_inquries')->get() as $key=>$item)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    {{$item->type=="1"?"Package":""}}
                                    {{$item->type=="2"?"Sightseeing":""}}
                                    {{$item->type=="3"?"Events":""}}
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                {{-- <td>{{$item->number_of_travelers}}</td>--}}
                                {{-- <td>{{$item->travelers_description}}</td>--}}
                                <td>{{$item->city}}</td>
                                <td>{{$item->arrival}}</td>
                                <td>{{$item->departure}}</td>
                                <td>{{$item->max_price}}</td>
                                <td>{{$item->min_price}}</td>
                                {{-- <td>{{$item->description}}</td>--}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection