@extends('layouts.website')
@section('content')
<!--====== BANNER ==========-->
<section>
    @if(isset($Event->banner))
    <div class="rows inner_banner"
        style="background-image: url('{{str_replace('http://localhost:8000/public/','http://localhost:8000/',$Event->banner)}}');background-size: cover;">
        {{-- <!--<div class="container">-->
        <!--    <ul>-->
        <!--        <li><a href="#inner-page-title">Home</a>-->
        <!--        </li>-->
        <!--        <li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>-->
        <!--        <li><a href="#inner-page-title" class="bread-acti">@foreach($countries as $item){{$item->name}}/@endforeach</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--    <h3 style="color: white">{{$Event->name}} | @foreach($categories as $item){{$item->name}}/@endforeach</h3>-->
        <!--</div>-->
        --}}
    </div>
    @else
    @endif
</section>
<!--====== TOUR DETAILS - BOOKING ==========-->
<section>
    <div class="rows banner_book" id="inner-page-title">
        <div class="container">
            <div class="banner_book_1">
                <ul>
                    <li class="dl2">Location :@if($Event->GetActivityCity->count() > 1)
                        Multiple Cities
                        @else
                        @foreach($Event->GetActivityCity as $item)
                        {{$item->name}}
                        @endforeach
                        @endif</li>
                    <li class="dl2">Price : €{{$Event->price}}</li>
                    <li class="dl2">Duration : {{$Event->duration}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--====== TOUR DETAILS ==========-->
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg tb-space">
            <div class="col-md-8 col-md-push">
                <!--====== TOUR TITLE ==========-->
                <div class="tour_head">
                    <h2>{{$Event->name}}</h2>



                </div>

                <!--====== TOUR DESCRIPTION ==========-->
                <div class="row">
                    <div class="col-md-12">
                        <h3><i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Description
                        </h3>
                    </div>
                    <div class="col-md-12">
                        <p>{{$Event->description ?? 'N/A'}}</p>
                    </div>


                </div>
                <!--====== ROOMS: HOTEL BOOKING ==========-->
                <div class="hotel-book-room">
                    <h3><i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i> Photo
                        Gallery</h3>

                    @if(count($Event->GET_Images)>0)
                    <div id="myCarousel1" class="carousel slide photo-gallery-slider" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators carousel-indicators-1">
                            @foreach($Event->GET_Images as $key => $slider)
                            <li data-target="#myCarousel1" data-slide-to="{{$key}}"><img
                                    src="{{str_replace('http://localhost:8000/public/','http://localhost:8000/',$slider->src)}}"
                                    alt="banner">
                            </li>
                            @endforeach
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner carousel-inner1" role="listbox">
                            @foreach($Event->GET_Images as $key => $slider)
                            <div class="item  {{$key == 0 ? 'item active' : '' }}"> <img
                                    src="{{str_replace('http://localhost:8000/public/','http://localhost:8000/',$slider->src)}}"
                                    alt="Chania" width="460" height="345"> </div>
                            @endforeach

                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i
                                    class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
                        <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i
                                    class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1"
                                    aria-hidden="true"></i></span> </a>
                    </div>
                    @else
                    <p>no images </p>
                    @endif






                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            {{$Event->event_type ?? ''}} Files
                        </h3>
                    </div>
                    <div class="col-md-12 d-flex flex-row justify-content-start align-items-center">
                        @if($Event->GET_Files->count() > 0 )
                        <ul class="" style="list-style:none;">

                            @foreach($Event->GET_Files as $file)
                            <li><i class="fa fa-file text-primary mr-2 fa-2x " aria-hidden="true"></i><span
                                    class="font-weight-bold " style="font-size:18px;">{{$file->name ?? 'N/A'}}</span>
                            </li>
                            @endforeach

                        </ul>
                        @else
                        <i class="fa fa-info fa-2x text-danger mr-2"></i> <span style="font-size:18px;">No Files</span>
                        @endif
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            About The Tour
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->about ?? 'N/A' }}
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Detailed Day Wise Itinerary
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->itinerary ?? 'N/A'}}
                    </div>

                </div>


                <!--                 <div class="row">-->
                <!--                     <div class="col-md-12"style="padding: 0;">-->
                <!--                         <div class="db-2" style="width: 100%;margin: 0;">-->
                <!--    <div class="db-2-com db-2-main">-->
                <!--        <h4>More Information</h4>-->
                <!--        <div class="db-2-main-com db-2-main-com-table">-->
                <!--            <table class="responsive-table">-->
                <!--                <tbody>-->
                <!--                    <tr>-->
                <!--                        <td>Group Size</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->grpsize}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Tour Style</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tourstyle}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Tour Language</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tourlanguage}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Start/End Location</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->startloc}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Availablity</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->avalibilitydetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Transport Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tranportdetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Accomodation Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->accomodationdetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Meal Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->mealdetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Guide Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->guidedetails}}</td>-->
                <!--                    </tr>-->
                <!--                </tbody>-->
                <!--            </table>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--                     </div>-->
                <!--                 </div>-->

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Terms & Conditions
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->terms_conditions ?? 'N/A'}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Payment Policy
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->payment_policy ?? 'N/A'}}
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Cancellation Policy
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->cancellation_policy ?? 'N/A'}}
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Visa Info
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->visa_info ?? 'N/A'}}
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            Other Notes
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->notes ?? 'N/A'}}
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            FAQ
                        </h3>
                    </div>
                    <div class="col-md-12">
                        {{$Event->questions ?? 'N/A'}}
                    </div>

                </div>




                <!--<div class="row p-t-10">-->
                <!--   <div class="col-md-12">-->
                <!--      <a type="button" class="btn btn-danger btn-lg" style="border-radius: 0px;font-weight: bold;font-size:12px;"id="Btnpdf" href="{{URL::to('/activity/downloadPDF/').'/'.$Event->id}}">Download As PDF</a>-->
                <!--   </div>-->
                <!--</div>-->
                <!--====== TOUR LOCATION ==========-->
                {{-- <div class="tour_head1 tout-map map-container">
                        <h3>Location</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290415.157581651!2d-93.99661009218904!3d39.661150926343694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1467884030780" allowfullscreen></iframe>
                    </div>--}}
                <!--====== ABOUT THE TOUR ==========-->
                {{--<div class="tour_head1">
                        <h3>About The Tour</h3>
                        <table>
                            <tr>
                                <th>Places covered</th>
                                <th class="event-res">Inclusions</th>
                                <th class="event-res">Exclusions</th>
                                <th>Event Date</th>
                            </tr>
                            <tr>
                                <td>Rio De Janeiro ,Brazil</td>
                                <td class="event-res">Accommodation</td>
                                <td class="event-res">Return Airfare & Taxes</td>
                                <td>Nov 12, 2017</td>
                            </tr>
                            <tr>
                                <td>Iguassu Falls </td>
                                <td class="event-res">8 Breakfast, 3 Dinners</td>
                                <td class="event-res">Arrival & Departure transfers</td>
                                <td>Nov 14, 2017</td>
                            </tr>
                            <tr>
                                <td>Peru,Lima </td>
                                <td class="event-res">First-class Travel</td>
                                <td class="event-res">travel insurance</td>
                                <td>Nov 16, 2017</td>
                            </tr>
                            <tr>
                                <td>Cusco & Buenos Aires </td>
                                <td class="event-res">Free Sightseeing</td>
                                <td class="event-res">Service tax of 4.50%</td>
                                <td>Nov 18, 2017</td>
                            </tr>
                        </table>
                    </div>--}}
                <!--====== DURATION ==========-->
                {{--<div class="tour_head1 l-info-pack-days days">
                        <h3>Detailed Day Wise Itinerary</h3>
                        <ul>
                            <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h4><span>Day : 1</span> Arrival and Evening Dhow Cruise</h4>
                                <p>Arrive at the airport and transfer to hotel. Check-in time at the hotel will be at 2:00 PM. In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
                            </li>
                            <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h4><span>Day : 2</span> City Tour and Evening Free for Leisure</h4>
                                <p>After breakfast, proceed for tour of Dubai city. Visit Jumeirah Mosque, World Trade Centre, Palaces and Dubai Museum. Enjoy your overnight stay at the hotel.In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
                            </li>
                            <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h4><span>Day : 3</span> Desert Safari with Dinner</h4>
                                <p>Relish a yummy breakfast and later, proceed to explore the city on your own. Enjoy shopping at Mercato Shopping Mall, Dubai Mall and Wafi City. In the evening, enjoy the desert safari experience and belly dance performance. Relish a mouth-watering barbecue dinner and enjoy staying overnight in Dubai.</p>
                            </li>
                            <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h4><span>Day : 4</span> Day at leisure</h4>
                                <p>Savour a satiating breakfast and relax for a while. Day Free for leisure. Overnight stay will be arranged in Dubai. In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
                            </li>
                            <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h4><span>Day : 5</span> Departure</h4>
                                <p>Fill your tummy with yummy breakfast and relax for a while. Later, check out from the hotel and proceed for your onward journey.In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="dir-rat">
                            <div class="dir-rat-inn dir-rat-title">
                                <h3>Write Your Rating Here</h3>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4half" name="rating" value="4 and a half" />
                                    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3half" name="rating" value="3 and a half" />
                                    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label class="full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2half" name="rating" value="2 and a half" />
                                    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1half" name="rating" value="1 and a half" />
                                    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="starhalf" name="rating" value="half" />
                                    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </fieldset>
                            </div>
                            <div class="dir-rat-inn">
                                <form class="dir-rat-form">
                                    <div class="form-group col-md-6 pad-left-o">
                                        <input type="text" class="form-control" id="email11" placeholder="Enter Name"> </div>
                                    <div class="form-group col-md-6 pad-left-o">
                                        <input type="number" class="form-control" id="email12" placeholder="Enter Mobile"> </div>
                                    <div class="form-group col-md-6 pad-left-o">
                                        <input type="email" class="form-control" id="email13" placeholder="Enter Email id"> </div>
                                    <div class="form-group col-md-6 pad-left-o">
                                        <input type="text" class="form-control" id="email14" placeholder="Enter your City"> </div>
                                    <div class="form-group col-md-12 pad-left-o">
                                        <textarea placeholder="Write your message"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 pad-left-o">
                                        <input type="submit" value="SUBMIT" class="link-btn"> </div>
                                </form>
                            </div>
                            <!--COMMENT RATING-->
                            <div class="dir-rat-inn dir-rat-review">
                                <div class="row">
                                    <div class="col-md-3 dir-rat-left"> <img src="images/reviewer/4.jpeg" alt="">
                                        <p>Orange Fab & Weld <span>19th January, 2017</span> </p>
                                    </div>
                                    <div class="col-md-9 dir-rat-right">
                                        <div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        <p>Michael & his team have been helping us with our eqiupment finance for the past 5 years - I think that says a quite a lot.. Michael is always ready to go the extra mile, always available, always helpfull that goes the same for his team that work with him - definatley our first phone call.</p>
                                        <ul>
                                            <li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--COMMENT RATING-->
                            <div class="dir-rat-inn dir-rat-review">
                                <div class="row">
                                    <div class="col-md-3 dir-rat-left"> <img src="images/reviewer/3.jpeg" alt="">
                                        <p>Orange Fab & Weld <span>19th January, 2017</span> </p>
                                    </div>
                                    <div class="col-md-9 dir-rat-right">
                                        <div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        <p>Michael & his team have been helping us with our eqiupment finance for the past 5 years - I think that says a quite a lot.. Michael is always ready to go the extra mile, always available, always helpfull that goes the same for his team that work with him - definatley our first phone call.</p>
                                        <ul>
                                            <li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--COMMENT RATING-->
                            <div class="dir-rat-inn dir-rat-review">
                                <div class="row">
                                    <div class="col-md-3 dir-rat-left"> <img src="images/reviewer/1.jpg" alt="">
                                        <p>Orange Fab & Weld <span>19th January, 2017</span> </p>
                                    </div>
                                    <div class="col-md-9 dir-rat-right">
                                        <div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        <p>Michael & his team have been helping us with our eqiupment finance for the past 5 years - I think that says a quite a lot.. Michael is always ready to go the extra mile, always available, always helpfull that goes the same for his team that work with him - definatley our first phone call.</p>
                                        <ul>
                                            <li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
            </div>
            <div class="col-md-4 col-md-pull tour_r">
                <!--====== SPECIAL OFFERS ==========-->
                <div class="tour_right ">
                    <div class="col-sm-6" style="padding: 1px;">
                        <button type="button" class="btn btn-danger btn-lg"
                            style="border-radius: 0px;font-weight: bold;font-size:12px; width: 100%" data-toggle="modal"
                            data-target="#emailenquiry">Email Inquiry</button>
                        <!--<a type="button" href="#" onclick="javascript:window.location='mailto:?subject=Email Inquiry&body=I want some more detail about the package below: ' + window.location;" class="btn btn-danger btn-lg" style="border-radius: 0px;font-weight: bold;font-size:12px; width: 100%">Email Inquiry</a>-->
                    </div>
                    <div class="col-sm-6" style="padding: 1px;">
                        <a type="button" class="btn btn-danger btn-lg"
                            style="border-radius: 0px;font-weight: bold;font-size:12px; width: 100%" id="Btnpdf"
                            href="{{URL::to('/activity/downloadPDF/').'/'.$Event->id}}">Download PDF</a>
                    </div>
                </div>
                <div class="tour_right tour_offer" style="background: transparent">
                    <div class="band1"><img src="{{ url('images/offer.png')}}" alt="" /> </div>

                    {{--<p class="h3 text text-primary">Price $ {{$packages[0]->price}}</p>--}}
                    {{--<a class="link-btn">Book Now</a>--}}
                </div>

                {{ $Event->code }}

                <!--====== TRIP INFORMATION ==========-->
                <div class="tour_right tour_incl tour-ri-com">
                    <h3>Trip Information</h3>
                    <ul>
                        <li>Tour Code: {{ $Event->tour_code}}</li>
                        <li>Location: @if($Event->GetActivityCity->count() > 1)
                            Multiple Cities
                            @else
                            @foreach($Event->GetActivityCity as $item)
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
                </div>
                <!--        <div class="db-2" style="width: 100%;margin: 0;padding: 20px 0;">-->
                <!--    <div class="db-2-com db-2-main">-->
                <!--        <h4>Trip Information</h4>-->
                <!--        <div class="db-2-main-com db-2-main-com-table">-->
                <!--            <table class="responsive-table">-->
                <!--                <tbody>-->
                <!--                    <tr>-->
                <!--                        <td>Tour Code</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tourcode}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Location</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>@if($Event->GetActivityCity->count() > 1)-->
                <!--                                    Multiple Cities-->
                <!--                                    @else-->
                <!--                                    @foreach($Event->GetActivityCity as $item)-->
                <!--                                    {{$item->name}}-->
                <!--                                    @endforeach-->
                <!--                                    @endif</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Duration</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{$Event->duration}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Group Size</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->grpsize}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Tour Style</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tourstyle}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Tour Language</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tourlanguage}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Start/End Location</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->startloc}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Availablity</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->avalibilitydetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Transport Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->tranportdetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Accomodation Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->accomodationdetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Meal Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->mealdetails}}</td>-->
                <!--                    </tr>-->
                <!--                    <tr>-->
                <!--                        <td>Guide Details</td>-->
                <!--                        <td>:</td>-->
                <!--                        <td>{{  $Event->guidedetails}}</td>-->
                <!--                    </tr>-->
                <!--                </tbody>-->
                <!--            </table>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--====== PACKAGE SHARE ==========-->
                <div class="tour_right head_right tour_social tour-ri-com">
                    <h3>Share This Package</h3>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                    </ul>
                </div>
                <!--====== HELP PACKAGE ==========-->
                <div class="tour_right head_right tour_help tour-ri-com">
                    <h3>Help & Support</h3>
                    <div class="tour_help_1">
                        <h4 class="tour_help_1_call">Call Us Now</h4>
                        <h4><i class="fa fa-phone" aria-hidden="true"></i> +421-917-251-996</h4>
                    </div>
                </div>
                {{--  --}}

               {{-- countries --}}

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            {{$Event->event_type ?? ''}} Countries
                        </h3>
                    </div>
                    <div class="col-md-12">
                        <ul class="" style="list-style:none;">
                            @foreach($Event->GetActivityCountry as $country)
                            <li><i class="fa fa-flag text-primary mr-2 fa-2x " aria-hidden="true"></i><span
                                    class="font-weight-bold " style="font-size:18px;">{{$country->name}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{-- countries --}}
                {{-- cities --}}

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            {{$Event->event_type ?? ''}} Cities
                        </h3>
                    </div>
                    <div class="col-md-12">
                        @if($Event->GetActivityCity->count() > 0 )
                        <ul class="" style="list-style:none;">
                            @foreach($Event->GetActivityCity as $city)
                            <li><i class="fa fa-building-o text-primary mr-2 fa-2x " aria-hidden="true"></i><span
                                    class="font-weight-bold " style="font-size:18px;">{{$city->name ?? 'N/A'}}</span>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <i class="fa fa-info fa-2x text-danger mr-2"></i> <span style="font-size:18px;">No Cities</span>
                        @endif
                    </div>
                </div>
{{-- cities --}}
{{-- categories --}}

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <i class="fa fa-umbrella" style="background-color: darkorange;font-size: 20px"></i>
                            {{$Event->event_type ?? ''}} Categories
                        </h3>
                    </div>
                    <div class="col-md-12">
                        @if($Event->GetActivityCategory->count() > 0 )
                        <ul class="" style="list-style:none;">
                            @foreach($Event->GetActivityCategory as $category)
                            <li><i class="fa fa-list-alt text-primary mr-2 fa-2x " aria-hidden="true"></i><span
                                    class="font-weight-bold "
                                    style="font-size:18px;">{{$category->name ?? 'N/A'}}</span>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <i class="fa fa-info fa-2x text-danger mr-2"></i> <span style="font-size:18px;">No
                            Categories</span>
                        @endif
                    </div>
                </div>
                {{-- categoris --}}
                {{--  --}}
            </div>
        </div>
    </div>
</section>
<!--====== TIPS BEFORE TRAVEL ==========-->
{{--<section>
        <div class="rows tips tips-home tb-space home_title">
            <div class="container tips_1">
                <!-- TIPS BEFORE TRAVEL -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <h3>Tips Before Travel</h3>
                    <div class="tips_left tips_left_1">
                        <h5>Bring copies of your passport</h5>
                        <p>Aliquam pretium id justo eget tristique. Aenean feugiat vestibulum blandit.</p>
                    </div>
                    <div class="tips_left tips_left_2">
                        <h5>Register with your embassy</h5>
                        <p>Mauris efficitur, ante sit amet rhoncus malesuada, orci justo sollicitudin.</p>
                    </div>
                    <div class="tips_left tips_left_3">
                        <h5>Always have local cash</h5>
                        <p>Donec et placerat ante. Etiam et velit in massa. </p>
                    </div>
                </div>
                <!-- CUSTOMER TESTIMONIALS -->
                <div class="col-md-8 col-sm-6 col-xs-12 testi-2">
                    <!-- TESTIMONIAL TITLE -->
                    <h3>Customer Testimonials</h3>
                    <div class="testi">
                        <h4>John William</h4>
                        <p>Ut sed sem quis magna ultricies lacinia et sed tortor. Ut non tincidunt nisi, non elementum lorem. Aliquam gravida sodales</p> <address>Illinois, United States of America</address> </div>
                    <!-- ARRANGEMENTS & HELPS -->
                    <h3>Arrangement & Helps</h3>
                    <div class="arrange">
                        <ul>
                            <!-- LOCATION MANAGER -->
                            <li>
                                <a href="#"><img src="images/Location-Manager.png" alt=""> </a>
                            </li>
                            <!-- PRIVATE GUIDE -->
                            <li>
                                <a href="#"><img src="images/Private-Guide.png" alt=""> </a>
                            </li>
                            <!-- ARRANGEMENTS -->
                            <li>
                                <a href="#"><img src="images/Arrangements.png" alt=""> </a>
                            </li>
                            <!-- EVENT ACTIVITIES -->
                            <li>
                                <a href="#"><img src="images/Events-Activities.png" alt=""> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
@endsection

<!-- The Modal -->
<div class="modal" id="emailenquiry">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Email Inquiry <button style="float: right" type="button" class="close"
                        data-dismiss="modal">&times;</button></h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('activity/detail_inquiry ') }}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="event_name" value="activity" />
                    <input type="hidden" name="event_id" value="{{ $Event->id }}" />
                    <div class="form-group">
                        <label for="name" style="font-size: 18px;">Name*:</label>
                        <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" style="font-size: 18px;">Email*:</label>
                        <input type="email" class="form-control" placeholder="Your email" id="email" name="email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="font-size: 18px;">Phone*:</label>
                        <input type="phone" class="form-control" placeholder="Phone number" id="phone" name="phone"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="adult" style="font-size: 18px;">Adults*:</label>
                        <input type="text" class="form-control" placeholder="Adults" id="adult" name="adult" required>
                    </div>
                    <div class="form-group">
                        <label for="child" style="font-size: 18px;">Childrens*:</label>
                        <input type="text" class="form-control" placeholder="Childrens" id="child" name="child"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="date" style="font-size: 18px;">Select a date*:</label>
                        <input type="date" class="form-control" placeholder="date" id="date" name="date" required>
                    </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Send Inquiry</button>
            </div>
            </form>
        </div>
    </div>
</div>