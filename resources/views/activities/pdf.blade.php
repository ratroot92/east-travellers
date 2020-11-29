<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <section>
        @if(isset($Event->banner))
        <p class="rows inner_banner"
            style="background-image: url('{{str_replace('http://localhost:8000/public/','http://localhost:8000/',$Event->banner)}}');background-size: cover;">

        </p>
        @else
        @endif
    </section>

    <section>
        <p class="rows banner_book" id="inner-page-title">
            <p class="container">
                <p class="banner_book_1">
                    <ul>
                        <li class="dl2">Location :@if($Event->Event_Cities->count() > 1)
                            Multiple Cities
                            @else
                            @foreach($Event->Event_Cities as $item)
                            {{$item->name}}
                            @endforeach
                            @endif</li>
                        <li class="dl2">Price : €{{$Event->price}}</li>
                        <li class="dl2">Duration : {{$Event->duration}}</li>
                    </ul>
                </p>
            </p>
        </p>
    </section>

    <section>
        <p class="rows inn-page-bg com-colo">
            <p class="container inn-page-con-bg tb-space">
                <p class="col-md-8 col-md-push">

                    <p class="tour_head">
                        <h3>   {{$Event->event_type}}:          {{$Event->event_name}}</h3>



                    </p>


                    <p class="row">
                        <p class="col-md-12">
                            <h3><i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Description
                            </h3>
                        </p>
                        <p class="col-md-12">
                            <p>@php echo $Event->description ?? 'N/A' @endphp</p>
                        </p>


                    </p>

                    <p class="text-center">


                        @if(count($Event->GET_Images)>0)
                        @foreach($Event->GET_Images as $key => $slider)
                               <img
                                        src="{{str_replace('http://localhost:8000/public/','http://localhost:8000/',$slider->src)}}"
                                        style="width:50%;height:300px;"alt="banner">

                       @endforeach
                        @endif






                    </p>






                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                About The Tour
                            </h3>
                        </p>
                        <p class="col-md-12">
                            {{$Event->about ?? 'N/A' }}
                        </p>

                    </p>

                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Detailed Day Wise Itinerary
                            </h3>
                        </p>
                        <p class="col-md-12">

                            {{ $Event->itinerary }}
                        </p>

                    </p>




                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Terms & Conditions
                            </h3>
                        </p>
                        <p class="col-md-12">

                           {{   $Event->terms_conditions}}
                        </p>

                    </p>
                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Payment Policy
                            </h3>
                        </p>
                        <p class="col-md-12">

                           {{   $Event->payment_policy}}
                        </p>

                    </p>


                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Cancellation Policy
                            </h3>
                        </p>
                        <p class="col-md-12">

                           {{   $Event->cancellation_policy}}
                        </p>

                    </p>

                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Visa Info
                            </h3>
                        </p>
                        <p class="col-md-12">

                           {{   $Event->visa_info}}
                        </p>

                    </p>

                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                Other Notes
                            </h3>
                        </p>
                        <p class="col-md-12">

                           {{   $Event->notes}}
                        </p>

                    </p>

                    <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                FAQ
                            </h3>
                        </p>
                        <p class="col-md-12">

                           {{   $Event->questions}}
                        </p>

                    </p>



                </p>
                <p class="col-md-4 col-md-pull tour_r">




                    <p>

                       {{   $Event->code}}
                    </p>


                    <p class="tour_right tour_incl tour-ri-com">
                        <h3>Trip Information</h3>
                        <ul>
                            <li>Tour Code: {{ $Event->tour_code}}</li>
                            <li>Location: @if($Event->Event_Cities->count() > 1)
                                Multiple Cities
                                @else
                                @foreach($Event->Event_Cities as $item)
                                {{$item->name}}
                                @endforeach
                                @endif</li>

                            <li>Duration: {{$Event->duration ?? 'N/A'}}</li>
                            <li>Group Size: {{ $Event->group_size ?? 'N/A'}}</li>
                            <li>Tour Style: {{ $Event->tour_style ?? 'N/A'}}</li>
                            <li>Tour Language: {{ $Event->tour_language ?? 'N/A'}}</li>
                            <li>Start: {{ $Event->start_location ?? 'N/A'}}</li>
                            <li>End Location: {{ $Event->end_location ?? 'N/A'}}</li>
                            <li>Availablity: {{ $Event->avalibility_details ?? 'N/A'}}</li>
                            <li>Transport Details: {{ $Event->tranport_details ?? 'N/A'}}</li>
                            <li>Accomodation Details: {{ $Event->accomodation_details ?? 'N/A'}}</li>

                            <li>Meal Details: {{ $Event->meal_details ?? 'N/A'}}</li>
                            <li>Guide Details: {{ $Event->guide_details ?? 'N/A'}}</li>
                        </ul>
                    </p>



                    <p class="tour_right head_right tour_help tour-ri-com">
                        <h3>Help & Support</h3>
                        <p class="tour_help_1">
                            <h4 class="tour_help_1_call">Call Us Now</h4>
                            <h4><i class="fa fa-phone" aria-hidden="true"></i> +421-917-251-996</h4>
                        </p>
                    </p>


                    {{-- <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                {{$Event->event_type ?? ''}} Countries
                            </h3>
                        </p>
                        <p class="col-md-12">
                            <ul class="" style="list-style:none;">
                                @foreach($Event->Event_Countries as $country)
                                <li><img src="{{$country->description}}" alt="" class="img-fluid mr-2 img-thumbnail"
                                        style="height:30px;width:30px;"><span class="font-weight-bold "
                                        style="font-size:18px;">{{$country->name}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </p>
                    </p> --}}


                    {{-- <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                {{$Event->event_type ?? ''}} Cities
                            </h3>
                        </p>
                        <p class="col-md-12">
                            @if($Event->Event_Cities->count() > 0 )
                            <ul class="" style="list-style:none;">
                                @foreach($Event->Event_Cities as $city)
                                <li><img src="{{$city->description}}" alt="" class="img-fluid mr-2 img-thumbnail"
                                        style="height:30px;width:30px;"><span class="font-weight-bold "
                                        style="font-size:18px;">{{$city->name ?? 'N/A'}}</span>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <i class="fa fa-info fa-2x text-danger mr-2"></i> <span style="font-size:18px;">No Cities</span>
                            @endif
                        </p>
                    </p> --}}


                    {{-- <p class="row">
                        <p class="col-md-12">
                            <h3>
                                <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                                {{$Event->event_type ?? ''}} Categories
                            </h3>
                        </p>
                        <p class="col-md-12">
                            @if($Event->Event_Categories->count() > 0 )
                            <ul class="" style="list-style:none;">
                                @foreach($Event->Event_Categories as $category)
                                <li><img src="{{$category->description}}" alt="" class="img-fluid mr-2 img-thumbnail"
                                        style="height:30px;width:30px;"><span class="font-weight-bold "
                                        style="font-size:18px;">{{$category->name ?? 'N/A'}}</span>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <i class="fa fa-info fa-2x text-danger mr-2"></i> <span style="font-size:18px;">No
                                Categories</span>
                            @endif
                        </p>
                    </p> --}}

                </p>
            </p>
        </p>
    </section>




    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
