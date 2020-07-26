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
<html lang="en">

<head>
    <title>Travel East Admin Panel</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="{{url('/theme/travel')}}/images/fav.png">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{url('/theme/admin')}}/css/font-awesome.min.css">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{url('/theme/admin')}}/css/style.css">
    <link rel="stylesheet" href="{{url('/theme/admin')}}/css/mob.css">
    <link rel="stylesheet" href="{{url('/theme/admin')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/theme/admin')}}/css/materialize.css" />



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>

    <style>
    #mapid {
        height: 200px;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{url('theme/admin')}}/js/html5shiv.js"></script>
    <script src="{{url('theme/admin')}}/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!--== MAIN CONTRAINER ==-->

    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{url('/')}}" class="logo"><img src="{{url('theme/travel')}}/images/logo.jpg" alt="" />
                </a>
            </div>
            <!--== SEARCH ==-->

            <!--== NOTIFICATION ==-->
            <div class="col-md-8 tab-hide">

            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    {{-- <img src="{{url('theme/admin')}}/images/user/6.png" alt="" />--}}
                    My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{route('user.setting')}}" class="waves-effect"><i class="fa fa-cogs"
                                aria-hidden="true"></i>Admin Setting</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{route('signout')}}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in"
                                aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li>
                            {{-- <img src="{{url('theme/admin')}}/images/placeholder.jpg" alt="">--}}
                        </li>
                        <li>
                            <h3 class="text-danger">{{Session::get('name')}} <span></span></h3>
                        </li>
                        <li></li>
                    </ul>
                </div>
                <!--== LEFT MENU ==-->
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li><a href="{{url('admin/dashboard')}}" class="menu-active"><i class="fa fa-bar-chart"
                                    aria-hidden="true"></i> Dashboard</a>
                        </li>

                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                                    aria-hidden="true"></i> Tour Packages</a>
                            <div class="collapsible-body left-sub-menu">
                                {{-- <ul>
                                <li><a href="{{route('packages.get')}}">All Packages</a>
                        </li>
                        <li><a href="{{url('packages/create_update/create/-1')}}">Add New Package</a>
                        </li>
                        <li><a href="{{route('package_cat')}}">All Package Categories</a>
                        </li>
                        <li><a href="{{url('admin/package_cat/create/-1')}}">Add Package Categories</a>
                        </li>
                    </ul> --}}
                    {{--
                    <ul>
                        <li><a href="{{route('package.view')}}">All Packages</a>
                    </li>
                    <li><a href="{{route('package.add')}}">Add New Package</a>
                    </li>
                    <li><a href="{{route('package.category')}}">All Package Categories</a>
                    </li>
                    <li><a href="{{route('package.addcategory')}}">Add Package Categories</a>
                    </li>
                    </ul> --}}



                </div>
                </li>



                {{-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                            aria-hidden="true"></i> Activities</a>
                    <div class="collapsible-body left-sub-menu">
                        <ul>
                            <li><a href="{{route('activity.view')}}">All Activities</a>
                </li>
                <li><a href="{{route('activity.add')}}">Add New Activity</a>
                </li>
                <li><a href="{{route('activity.category')}}">All Activity Categories</a>
                </li>
                <li><a href="{{route('activity.addcategory')}}">Add Activity Categories</a>
                </li>
                </ul>
            </div>
            </li> --}}



            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i> Events</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{route('view.add.event',['action'=>'addEvent'])}}">Add Events</a>
                        </li>
                        <li><a href="{{route('view.all.events')}}">All Events</a>
                        </li>





                    </ul>
                </div>
            </li>


            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i> Events Countries</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{route('view.add.country',['action'=>'add'])}}"> Add Event Country</a>
                        </li>
                        <li><a href="{{route('view.all.countries')}}">All Event Countries</a>
                        </li>

                    </ul>
                </div>
            </li>



            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i> Events Cities</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{route('view.add.city',['action'=>'add'])}}"> Add Event City</a>
                        </li>
                        <li><a href="{{route('view.all.cities')}}">All Event Cities</a>
                        </li>

                    </ul>
                </div>
            </li>



            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i> Events Categories</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{route('view.add.category',['action'=>'add'])}}"> Add Event Category</a>
                        </li>
                        <li><a href="{{route('view.all.categories')}}">All Event Categories</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i> Events Icons</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{route('view.add.icon',['action'=>'add'])}}"> Add Event Icon</a>
                        </li>
                        <li><a href="{{route('view.all.icons')}}">All Event Icons</a>
                        </li>
                    </ul>
                </div>
            </li>






            {{-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                            aria-hidden="true"></i> Transfer</a>
                    <div class="collapsible-body left-sub-view">
                        <ul>
                            <li><a href="{{route('transfer.view')}}">All Transfer</a>
            </li>
            <li><a href="{{route('transfer.add')}}">Add New Transfer</a>
            </li>
            <li><a href="{{route('transfer.category')}}">All Transfer Categories</a>
            </li>
            <li><a href="{{route('transfer.addcategory')}}">Add Transfer Categories</a>
            </li>
            </ul>
        </div>
        </li>
        --}}



        {{-- --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-picture-o" aria-hidden="true"></i>
                Day
                Tours</a>
            <div class="collapsible-body left-sub-menu">
                {{-- <ul>
                                <li><a href="{{route('/')}}/sightseeing/get">All Day Tours</a>
        </li>
        <li><a href="{{route('/')}}/sightseeing/create_update/store/-1">Add New Day Tour</a>
        </li>
        </ul> --}}
        <ul>
            <li><a href="{{route('daytour.view')}}">All Daytours</a>
            </li>
            <li><a href="{{route('daytour.add')}}">Add New Daytour</a>
            </li>
            <li><a href="{{route('daytour.category')}}">All Daytour Categories</a>
            </li>
            <li><a href="{{route('daytour.addcategory')}}">Add Daytour Categories</a>
            </li>
        </ul>
    </div>
    </li>
    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-calendar-o" aria-hidden="true"></i>
            Events</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{route('events.all')}}">All Events</a>

                </li>
                <li><a href="{{route('events')}}">Add New Events</a>
                </li>
            </ul>
        </div>
    </li>
    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-ticket" aria-hidden="true"></i>
            Booking & Enquiry</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{url('inquiries/get/packages')}}">Package</a></li>
                <li><a href="{{url('inquiries/get/daytours')}}">Day Tours</a></li>
                <li><a href="{{url('inquiries/get/activities')}}">Activities</a></li>
                <li><a href="{{url('inquiries/get/events')}}">Events</a></li>
                <li><a href="{{url('inquiries/get/cruises')}}">Cruise</a></li>
                <li><a href="{{url('inquiries/get/transfers')}}">Transfers</a></li>
            </ul>
        </div>
    </li>
    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-rss" aria-hidden="true"></i>
            Blog & Articals</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{route('blog.get')}}">All Blogs</a>
                </li>
                <li><a href="{{url('blogs/create_update/create/-1')}}">Add Blog</a>
                </li>
            </ul>
        </div>
    </li>

    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella" aria-hidden="true"></i>
            Popular Cities</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{route('popularcities.get')}}">All Popular Cities</a>
                </li>
                <li><a href="{{url('popularcities/create_update/create/-1')}}">Add New Popular Cities</a>
                </li>

            </ul>
        </div>
    </li>

    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella" aria-hidden="true"></i>
            Gallery</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{url('/gallery/add')}}">Add Gallery Video</a>
                </li>
                <li><a href="{{url('/gallery/all/videos')}}">All Gallery Videos</a>
                </li>
                <li><a href="{{url('/gallery/add_photos')}}">Add Gallery Photo </a>
                </li>
                <li><a href="{{route('gallery.all_photos')}}">All Gallery Photos</a>
                </li>
                <li><a href="{{url('/gallery/add/travellerReviews')}}">Add Traveller Reviews </a>
                </li>
                <li><a href="{{url('/gallery/all/travellerReviews')}}">All Traveller Reviews </a>
                </li>

                <li><a href="{{route('gallery.add.group.photo.get')}}">Add Group Photo </a>
                </li>
                <li><a href="{{route('gallery.all.group.photo.get')}}">All Group Photos </a>
                </li>


            </ul>
        </div>
    </li>




    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella" aria-hidden="true"></i>
            Services</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{url('admin/services/view/vision')}}">Add Service</a>
                </li>


                <li><a href="{{url('admin/services/all/services')}}">All Services</a>
                </li>




            </ul>
        </div>
    </li>







    <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella" aria-hidden="true"></i>
            Website Builder</a>
        <div class="collapsible-body left-sub-menu">
            <ul>
                <li><a href="{{url('websitebuilder/terms')}}"> Terms and Conditions</a></li>
                <li><a href="{{url('websitebuilder/cancellations')}}">>Cancellation Policy</a></li>
                <li><a href="{{url('websitebuilder/contactus')}}"> Contact Us</a></li>
                <li><a href="{{url('websitebuilder/cookies')}}"> Cookies Policy</a></li>
                <li><a href="{{url('websitebuilder/paymentpolicy')}}"> Payment Policy</a></li>
                <li><a href="{{url('websitebuilder/faq')}}">FAQs</a></li>
                <li><a href="{{url('websitebuilder/aboutus')}}">About Us</a></li>


            </ul>
        </div>
    </li>
    {{-- end settings --}}

    <li>
        <br>
        <a href="{{route('signout')}}" class="alert alert-danger"><i class="fa fa-sign-in" aria-hidden="true"></i>
            Logout</a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    @yield('content')


    <!--======== SCRIPT FILES =========-->
    <script src="{{url('/theme/admin')}}/js/jquery.min.js"></script>
    <script src="{{url('/theme/admin')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/theme/admin')}}/js/materialize.min.js"></script>
    <script src="{{url('/theme/admin')}}/js/custom.js"></script>
</body>
@include('layouts.alerts')

</html>