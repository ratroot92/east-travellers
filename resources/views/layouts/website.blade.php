@php $counter = 0;
$whitelist = [
// IPv4 address
'127.0.0.1',
// IPv6 address
'::1'
];
$path = "";
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
$path = "";
}
else {
$path="../public/";
}
@endphp
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>East Traveler</title>
    <!--== META TAGS ==-->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> --}}
    <meta property="og:image" content="{{url('/theme/travel')}}/images/fav.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- FAV ICON -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css"
        integrity="sha256-bX+rnnNrWmSrL9BjREvIc3tU9uClWcKmoEFJ2VKnUBc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{url('/theme/travel')}}/css/font-awesome.min.css">
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{url('/theme/travel')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/theme/travel')}}/css/materialize.css">
    <link rel="stylesheet" href="{{url('/theme/travel')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/theme/travel')}}/css/mob.css">
    <link rel="stylesheet" href="{{url('/theme/travel')}}/css/animate.css">
    <link rel="stylesheet"
        href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="{{url('/theme/travel')}}/images/fav.png">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" /> --}}
    <link type="text/css" href="{{asset('public/css/pretty-checkbox.min.css')}}}" />
    <script src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_MAP_API_KEY&libraries=places®ion=in"></script>
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <![endif]-->
    <style>
    .fb_dialog.fb_dialog_advanced.fb_customer_chat_bubble_animated_no_badge.fb_customer_chat_bubble_pop_in {
        bottom: 50px !important;
    }

    .faq-block {
        margin: 20px 0;
        font-size: 15px;
        background: #ddd;
        padding: 20px 25px;
        border-left: 2px solid #fe0000;
    }

    .banner_book_1 ul .dl2 {
        width: 30%;
    }

    .skiptranslate.goog-te-gadget {
        font-size: 0;
    }

    select.goog-te-combo {
        display: block;
        margin: 0 5px !important;
        width: 135px;
    }

    .skiptranslate.goog-te-gadget span {
        display: none;
    }

    iframe {
        height: 30vh;
        width: 100%;
    }

    .cookies {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #C0392B;
        color: white;
        opacity: 1;
        text-align: center;
        height: 70px;
        margin-bottom: 0px;
    }

    .cookies p a {
        font-weight: 600;
        color: #fff;
    }

    .ribbon {
        position: absolute;
        left: -5px;
        top: -5px;
        z-index: 1;
        overflow: hidden;
        width: 75px;
        height: 75px;
        text-align: right;
    }

    .ribbon span {
        font-size: 10px;
        font-weight: bold;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        line-height: 20px;
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        width: 100px;
        display: block;
        background: #79A70A;
        background: linear-gradient(#F79E05 0%, #8F5408 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 19px;
        left: -21px;
    }

    .ribbon span::before {
        content: "";
        position: absolute;
        left: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid #8F5408;
        border-right: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #8F5408;
    }

    .ribbon span::after {
        content: "";
        position: absolute;
        right: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid transparent;
        border-right: 3px solid #8F5408;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #8F5408;
    }
    .custom-booknow-link{
        line-height: 22px!important;
        font-size: 12px!important;
        font-weight: bold!important;
        color:#000!important;
        /* padding: 2px!important; */
    }

    .custom-booknow-link:hover{
        text-decoration: underline!important;
        color: #e23464!important;
    }



    @media screen and (max-width: 960px) {
        body > section:nth-child(6) > div.tourz-search > div > div > div > div.row > div > div > div.input-field.col-md-3.s12.m12.l12.mt-5.mb-5
        {
            padding-left:0px!important;
            padding-right:0px!important;

        }
}

    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- MOBILE MENU -->
    <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="{{url('/')}}"><img src="{{url('/theme/travel')}}/images/logo.jpg" alt="" />
                        </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li class="about-menu"><a href="{{route('all.events.package')}}"
                                        class="mm-arr">Packages</a></li>
                                <li class="admi-menu"><a href="{{route('all.events.daytour')}}" class="mm-arr">Day
                                        Tour</a></li>
                                <li class="about-menu"><a href="{{route('all.events.activity')}}"
                                        class="mm-arr">Activites</a></li>
                                <li class="admi-menu"><a href="{{route('all.events.cruise')}}"
                                        class="mm-arr">Cruises</a></li>
                                <li class="about-menu"><a href="{{route('all.events.transfer')}}"
                                        class="mm-arr">Transfer</a></li>
                                <li><a href="{{route('events.show')}}">Events</a></li>
                                <li><a href="{{route('booknow.index')}}">Booknow</a></li>
                                <li><a href="{{route('blog.view')}}">Blogs</a></li>
                                <li><a href="{{url('/aboutus')}}">About us</a></li>
                                <li><a href="{{url('/custominquiry')}}">Custom Inquiry</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="">Whatsappp/Viber: +421-917-251-996</a>
                                </li>
                                <!--<li><a href="#"><a href="mailto:info@eastravels.com">info@eastravels.com</a></a>-->
                                <!--</li>-->
                                <li><a href="{{ url('contact/policy') }}">Contact us</a>
                                </li>
                                <li><a  href="{{url('/aboutus')}}">About Us</a>
                                </li>


                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                <li>
                                    @if(Session::has('id'))
                                    <a href="{{route('signout')}}">Sign out</a>
                                    @else
                                    <a href="{{route('signin')}}">Sign In</a>
                                    @endif
                                </li>
                                <li><a href="{{route('signup')}}">Sign Up</a>
                                </li>
                                <li>
                                    <div id="google_translate_element"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>

                                {{-- <li><a href="https://www.instagram.com/east_travel/" target="_blank"><i
                                            class="fa fa-instagram" aria-hidden="true"></i>English</a> </li> --}}
                                            <li><a href="https://www.instagram.com/east_travel/" target="_blank"><i
                                                class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                                <li><a href="https://www.linkedin.com/company/easttravels" target="_blank" class=""><i
                                            class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            {{-- <li><a href="https://www.facebook.com/Eastravels/" target="_blank"><i
                                                class="fa fa-facebook" aria-hidden="true"></i>English</a>
                                    </li> --}}
                                    <li><a href="https://www.facebook.com/Eastravels/" target="_blank"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                                    <li><a href="mailto:info@eastravels.com" class=""><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i></a> </li>
                                {{-- <li><a href="https://www.facebook.com/easttravels/" target="_blank" class=""><i
                                            class="fa fa-facebook" style="margin-right: 3px"
                                            aria-hidden="true"></i>الْعَرَبِيَّة</a> </li> --}}
                                {{-- <li><a href="https://www.instagram.com/eastravel.arabic" target="_blank"><i
                                            class="fa fa-instagram" aria-hidden="true"></i>الْعَرَبِيَّة</a> </li> --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="main-menu ">
                            <div class="wed-logo">
                                <a href="{{url('/')}}"><img src="{{url('/theme/travel')}}/images/logo.jpg" /></a>
                            </div>
                            <ul>
                                <li class="admi-menu"><a href="{{url('/')}}">Home</a></li>
                                <li class="about-menu"><a href="{{route('all.events.package')}}"
                                        class="mm-arr">Packages</a></li>
                                <li class="admi-menu"><a href="{{route('all.events.daytour')}}" class="mm-arr">Day
                                        Tour</a></li>
                                <li class="about-menu"><a href="{{route('all.events.activity')}}"
                                        class="mm-arr">Activites</a></li>
                                <li class="admi-menu"><a href="{{route('all.events.cruise')}}"
                                        class="mm-arr">Cruises</a></li>
                                <li class="about-menu"><a href="{{route('all.events.transfer')}}"
                                        class="mm-arr">Transfer</a></li>
                                        <li class="about-menu"><a href="{{url('/custominquiry')}}">Custom Inquiry</a></li>
                                <li class="about-menu"><a href="{{route('events.show')}}">Events</a></li>
                                {{-- <li class="admi-menu"><a href="{{url('/aboutus')}}">About us</a></li> --}}

                                <li class="about-menu"><a href="{{url('/contact/policy')}}">Contact Us </a></li>
                                <li class="admi-menu "><button class=" btn btn-warning btn-sm mt-3  custom-booknow-link
                                    "onclick="location.href='{{route('booknow.index')}}'" >Booknow</button></li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->
    <!--HEADER SECTION-->
    @yield('content')
    <!--====== FOOTER 2 ==========-->
    <section>
        <div class="rows">


        </div>
        <div class="footer">
            <div class="container">
                <br><br>
                <div class="foot-sec2">
                    <div>
                        <div class="row">
                            <div class="col-sm-3 foot-spec foot-com">
                                <h4><span>East</span> Travel s.r.o.</h4>
                                <p></p>
                                <ul class="alert" style="list-style: none; margin-left: -15px; margin-top: -17px">
                                    <li>DMC in Central Europe</li>
                                    <li>Registration number: 48279994</li>
                                    <li>Tax ID: SK2120152375</li>
                                    <li>SACKA License Number: 700</li>
                                    <li>Bankruptcy Insurance: Union insurance</li>
                                    <li>Member: ETOA, SACKA, JCI, SOPK</li>
                                    <li>
                                        <h5 style="color: #fff"><b>EMAIL: info@eastravels.com</b></h5>
                                    </li>
                                    <li>
                                        <h5 style="color: #fff"><b>PHONE: +421-917-251-996</b></h5>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-sm-4 foot-social foot-spec foot-com">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><span>Destination</span></h4>
                                        <ul style="list-style: none;display: grid;">
                                            @foreach($destinationCities as $key=>$item)
                                            <li><a href="{{ url('/popularcities/all') }}">{{ $item->name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><span>Information</span></h4>
                                        <ul style="list-style: none;">
                                            <li><a href="{{url('/gdpr')}}">GDPR</a>
                                            <li><a href="{{url('/termscondition')}}">Terms & Conditions</a></li>
                                            <li><a href="{{url('/cancellation/policy')}}">Cancellation Policy</a></li>
                                            <li><a href="{{url('/cookie/policy')}}">Cookie Policy</a></li>
                                            <li><a href="{{url('/contact/policy')}}">Contact Us</a></li>
                                            <li><a href="{{url('/payment/policy')}}">Payment Policy</a></li>
                                            <li><a href="{{url('/faq/policy')}}">FAQs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-5 foot-spec foot-com">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><span>East Travel</span></h4>
                                        <ul style="list-style: none; margin-left: -40px">
                                            <li><a href="{{url('/aboutus')}}">About Us</a></li>
                                            <li><a href="{{url('/contact/policy')}}">Contact Us</a></li>
                                            <li><a href="{{url('/blog/view')}}">Blogs</a></li>
                                        </ul>
                                        <h4 style="padding-top: 25px"><span>Gallery</span></h4>
                                        <ul style="list-style: none; margin-left: -40px">
                                            <li><a href="{{ route('gallery.traveller.review') }}">Traveller Reviews</a>
                                            </li>
                                            <li><a href="{{ route('gallery.index.group.photo.get') }}">Group Photos</a>
                                            </li>
                                            <li><a href="{{url('gallery')}}">Gallery Videos</a></li>
                                            <li><a href="{{url('gallery/photos')}}">Gallery Photos</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><span>Services</span></h4>
                                        <ul style="list-style: none; margin-left: -40px">
                                            <li><a href="{{ route('all.events.package') }}">Inbound Package Tour</a>
                                            <li><a href="{{ route('all.events.daytour') }}">Day Tours & Excursions</a>
                                            </li>
                                            <li><a href="{{ route('all.events.activity') }}">Indoor & Outdoor
                                                    Activites</a>
                                            </li>
                                            <li><a href="{{ route('all.events.transfer') }}">Transportation</a></li>
                                            <li><a href="{{ route('all.events.cruise') }}">Cruise Bookings</a></li>
                                            <li><a href="{{ url('custominquiry') }}">Tailor Made Itenerary</a></li>
                                            <li><a href="{{ route('events.show') }}">Events and Conference</a></li>
                                            <li><a href="#">Accomodation</a></li>
                                            <li><a href="#">Air Ticketing</a></li>
                                            <li><a href="{{ url('visa/index') }}">Visa Application</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 foot-spec foot-com">
                                <p><strong>Membership</strong></p>
                                <div class="membership-img">
                                    <a href="#">
                                        <img class="h-size2 payment-card" src="{{url('/theme/travel')}}/images/etoa.png"
                                            width="70px" alt="IMG-ETOA">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card"
                                            src="{{url('/theme/travel')}}/images/Sacka white.png" width="70px"
                                            alt="IMG-SACKA">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card"
                                            src="{{url('/theme/travel')}}/images/membership3.jpg" width="70px"
                                            alt="IMG-membership">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card"
                                            src="{{url('/theme/travel')}}/images/Trip Avisor.png" width="70px"
                                            alt="IMG-TRIP">
                                    </a>
                                </div>
                                <p style="padding-top: 25px"><strong>We Accept Credit Cards</strong></p>
                                <div class="payment-cards">
                                    <a href="#">
                                        <img class="h-size2 payment-card"
                                            src="{{url('/theme/travel')}}/images/mastercard.gif" alt="IMG-MASTERCARD">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card" src="{{url('/theme/travel')}}/images/visa.gif"
                                            alt="IMG-VISA">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card" src="{{url('/theme/travel')}}/images/amex.gif"
                                            alt="IMG-AMEX">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card"
                                            src="{{url('/theme/travel')}}/images/maestro.gif" alt="IMG-MAESTRO">
                                    </a>
                                    <a href="#">
                                        <img class="h-size2 payment-card" src="{{url('/theme/travel')}}/images/jcb.gif"
                                            alt="IMG-JCB">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-2 foot-spec foot-com">
                            </div>
                            <div class="col-sm-3 foot-social foot-spec foot-com">
                                <h4><span>Follow</span> with us</h4>
                                <p>Join the thousands of other There are many variations available</p>
                                <ul>
                                    <li><a href="https://www.facebook.com/Eastravels/" target="_blank"><i
                                                class="fa fa-facebook" aria-hidden="true"></i>{{--English--}}</a>
                                    </li>
                                    {{-- <li><a href="https://www.gmail.com/easttravels/" target="_blank" class=""><i class="fa fa-google-plus" style="margin-right: 3px" aria-hidden="true"></i></a> </li> --}}
                                    <li><a href="https://www.twitter.com/Eastravels1/" target="_blank"><i
                                                class="fa fa-twitter" aria-hidden="true"></i>{{--English--}}</a> </li>
                                    <li><a href="https://www.linkedin.com/company/easttravels" target="_blank"
                                            class=""><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                    <li><a href="https://www.youtube.com/eastravel.arabic" target="_blank"><i
                                                class="fa fa-youtube" aria-hidden="true"></i>{{--الْعَرَبِيَّة--}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--====== FOOTER - COPYRIGHT ==========-->
    <section>
        <div class="rows copy">
            <div class="container">
                <p>Copyrights © 2019 East Travel. All Rights Reserved</p>
            </div>
        </div>
    </section>
    <section>
        <div class="icon-float">
            <ul>
                <li><a href="https://www.facebook.com/Eastravels/" target="_blank" class="fb1"><i class="fa fa-facebook"
                            aria-hidden="true"></i></a> </li>
                <li><a href="https://wa.me/421917251996" target="_blank" style="background-color: lime"><i
                            class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                {{-- <li><a href="https://www.instagram.com/east_travel/" target="_blank" style="background-color: orange"><i
                            class="fa fa-instagram" aria-hidden="true"><br>Eng</i></a> </li> --}}
                            <li><a href="https://www.instagram.com/east_travel/" target="_blank" style="background-color: orange"><i
                                class="fa fa-instagram" aria-hidden="true"><br></i></a> </li>
                <li><a href="https://www.linkedin.com/company/easttravels" target="_blank" class="li1"><i
                            class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                {{-- <li><a href="https://www.facebook.com/easttravels/" target="_blank" class="fb1"><i
                            class="fa fa-facebook" aria-hidden="true"><br>الْعَرَبِيَّة</i></a> </li>
                <li><a href="https://www.instagram.com/eastravel.arabic" target="_blank"
                        style="background-color: orange"><i class="fa fa-instagram"
                            aria-hidden="true"><br>الْعَرَبِيَّة</i></a> </li> --}}
                <li><a href="mailto:info@eastravels.com" class="sh1"><i class="fa fa-envelope-o"
                            aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>
    <!--========= Scripts ===========-->
    <script src="{{url('/theme/travel')}}/js/jquery-latest.min.js"></script>
    <script>
    // Or with jQuery

    $(document).ready(function() {
        $('select').formSelect();
    });

    $(document).ready(function() {
        $('#Search_Btn_CutomCity').on('click', function() {
            console.log("cutom city clicked ");
            var City_Name = $('#Autocomplete_Cities').val();
            if (City_Name === '') {
                alert("Please Enter City Name ");
            } else {
                var Event_Type_CustomCity = $('#Event_Type_CustomCity').find(":selected").val();
                if (Event_Type_CustomCity === '' || Event_Type_CustomCity === null) {
                    alert("Please Select Event Type");
                } else {

                    window.location.href = "{{URL::to('search/booknow/cityname')}}" + "/" + City_Name +
                        "/" + Event_Type_CustomCity;

                }
            }
        })


        $('#Search_Btn_CutomCountry').on('click', function() {
            console.log("cutom country clicked ");
            var Country_Name = $('#autocomplete-input').val();
            if (Country_Name === '') {
                alert("Please Enter City Name ");
            } else {
                var Event_Type_CustomCountry = $('#Event_Type_CustomCountry').find(":selected").val();
                console.log(Event_Type_CustomCountry)
                if (Event_Type_CustomCountry === '' || Event_Type_CustomCountry === null) {
                    alert("Please Select Event Type");
                } else {

                    window.location.href = "{{URL::to('search/booknow/countryname')}}" + "/" +
                        Country_Name +
                        "/" + Event_Type_CustomCountry;

                }
            }
        })




        $('#Search_Btn_City').on('click', function() {
                var Event_Type_City = $('#Event_Type_City').find(":selected").val();
                var Event_City = $('#Event_City').find(":selected").val();
                console.log(Event_Type_City)
                console.log(Event_City)
                if (Event_Type_City != '' && Event_City != '') {
                    window.location.href = "{{URL::to('search/booknow/city')}}" + "/" + Event_City +
                        "/" + Event_Type_City;
                } else {
                    alert("Please Fill All The Fields ")
                }




            }

        )

        $('#Search_Btn_Country').on('click', function() {
            var Event_Type_Country = $('#Event_Type_Country').find(":selected").val();
            var Event_Country = $('#Event_Country').find(":selected").val();
            console.log(Event_Type_Country)
            console.log(Event_Country)
            if (Event_Type_Country != '' && Event_Country != '') {
                window.location.href = "{{URL::to('search/booknow/country')}}" + "/" + Event_Country +
                    "/" + Event_Type_Country;
            } else {
                alert("Please Fill All The Fields ")
            }

        });



        $('.Search_Btn_Category').on('click', function() {
            var Event_Type_Category = $('#Event_Type_Category').find(":selected").val();
            var Event_Category = $('#Event_Category').find(":selected").val();
            console.log(Event_Type_Category)
            console.log(Event_Category)
            if (Event_Type_Category != '' && Event_Category != '') {
                window.location.href = "{{URL::to('search/booknow/category')}}" + "/" + Event_Category +
                    "/" + Event_Type_Category;
            } else {
                alert("Please Fill All The Fields ")
            }
        })
    });
    </script>
    <script>
    $(document).ready(function() {
        //start of automcomplte cities
        $('#Autocomplete_Cities').keyup(function() {
            // var selected_type = $("input[type='radio'][name='options']:checked").val();;

            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('autocomplete/fetch') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token,

                    },
                    success: function(data) {
                        $('#Cities_List').fadeIn();
                        $('#Cities_List').empty().html(data)
                        console.log(data)
                    }
                })
            }

        }) //

        $('#Cities_List').on('click', '.search_list_name', function() {

            var value = $(this).text();
            console.log(value);
            $('#Autocomplete_Cities').val(value);
            $('#Cities_List').empty().html()
        })
        $('#Autocomplete_Countries').keyup(function() {
            //start of automcomplte countries
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    // url: "{{ url('autocomplete/event/countries') }}",
                    // method: "POST",
                    type: 'GET',
                    url: 'https://restcountries.eu/rest/v2/all?fields=name',
                    data: {
                        query: query,
                        _token: _token,

                    },
                    success: function(response) {
                        var countryArray = response;
                        var dataCountry = {};
                        for (var i = 0; i < countryArray.length; i++) {
                            //console.log(countryArray[i].name);
                            dataCountry[countryArray[i].name] = countryArray[i]
                                .flag; //countryArray[i].flag or null
                        }
                        $('input.autocomplete').autocomplete({
                            data: dataCountry,
                            limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
                        });
                    }
                })
            }

        });




    })
    </script>

    <script src="{{url('/theme/travel')}}/js/bootstrap.js"></script>
    <script src="{{url('/theme/travel')}}/js/wow.min.js"></script>
    <script src="{{url('/theme/travel')}}/js/materialize.min.js"></script>
    <script>
    $(document).ready(function() {


        $(document).ready(function() {
            //Autocomplete
            $(function() {
                $.ajax({
                    type: 'GET',
                    url: 'https://restcountries.eu/rest/v2/all?fields=name',
                    success: function(response) {
                        var countryArray = response;
                        var dataCountry = {};
                        for (var i = 0; i < countryArray.length; i++) {
                            //console.log(countryArray[i].name);
                            dataCountry[countryArray[i].name] = countryArray[i]
                                .flag; //countryArray[i].flag or null
                        }
                        $('input.autocomplete').autocomplete({
                            data: dataCountry,
                            limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
                        });
                    }
                });
            });
        });

    });
    </script>
    <script src="{{url('/theme/travel')}}/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script>
        @if($errors->any())

Command: toastr["success"]("Opearation successfull")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
@endif

    </script>


    <script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
    </script>
    <script>
    $('.hot-page2-alp-r-hot-page-rat:contains("No Discount")').css('display', 'none');
    </script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,de,fr,sk,pl,cs,ar,hu,ru,it,zh-CN,zh-TW,ko,ja,hi'
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>



</body>

@include('layouts.alerts')

</html>
