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
    <!-- DATATABLES CSS -->

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/keytable/2.5.2/css/keyTable.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/scroller/2.0.2/css/scroller.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/searchpanes/1.1.1/css/searchPanes.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css" />


    <!-- DATATABLES CSS  -->


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











            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-calendar-o"
                        aria-hidden="true"></i>
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

            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i>
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

            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i>
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




            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i>
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







            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-umbrella"
                        aria-hidden="true"></i>
                    Website Builder</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{url('websitebuilder/terms')}}"> Terms and Conditions</a></li>
                        <li><a href="{{url('websitebuilder/cancellations')}}">Cancellation Policy</a></li>
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
                <a href="{{route('signout')}}" class="alert alert-danger"><i class="fa fa-sign-in"
                        aria-hidden="true"></i>
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
    <!-- DATA TABLES JS  -->
    <script>
    $(document).ready(function() {
        $('#CategoryTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>
    <script>
    $(document).ready(function() {
        $('#Icons_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('#City_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('#Country_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('#Event_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('#PopularCity_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>


    <script>
    $(document).ready(function() {
        $('#TravellerReview_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>

    <script>
    $(document).ready(function() {
        $('#AllgroupPhotos_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>
    <script>
    $(document).ready(function() {
        $('#AllGalleryPhotos_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>
    <script>
    $(document).ready(function() {
        $('#AllGalleryVideo_Table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "paging": false,
            "ordering": true,
            "info": true
        });

    });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.2/js/dataTables.keyTable.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.2/js/dataTables.scroller.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.1.1/js/dataTables.searchPanes.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.1.1/js/searchPanes.bootstrap4.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
    </style>

    <!-- Resources -->

    <!-- Chart code -->
    <script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.padding(40, 40, 40, 40);

        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "Object_Name";
        categoryAxis.renderer.minGridDistance = 1;
        categoryAxis.renderer.inversed = true;
        categoryAxis.renderer.grid.template.disabled = true;

        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryY = "Object_Name";
        series.dataFields.valueX = "Count";
        series.tooltipText = "{valueX.value}"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.column.cornerRadiusBottomRight = 5;
        series.columns.template.column.cornerRadiusTopRight = 5;

        var labelBullet = series.bullets.push(new am4charts.LabelBullet())
        labelBullet.label.horizontalCenter = "left";
        labelBullet.label.dx = 10;
        labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
        labelBullet.locationX = 1;

        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
        series.columns.template.adapter.add("fill", function(fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        categoryAxis.sortBySeries = series;
        chart.data = [{
                "Object_Name": "Activities",
                "Count": 2255250000
            },
            {
                "Object_Name": "Cruises",
                "Count": 430000000
            },
            {
                "Object_Name": "Packages",
                "Count": 1000000000
            },
            {
                "Object_Name": "Daytours",
                "Count": 246500000
            },
            {
                "Object_Name": "Transfers",
                "Count": 355000000
            },
            {
                "Object_Name": "Events",
                "Count": 500000000
            },
            {
                "Object_Name": "Booking",
                "Count": 624000000
            },
            {
                "Object_Name": "Event Cities",
                "Count": 329500000
            },
            {
                "Object_Name": "Event Categories",
                "Count": 1000000000
            },
            {
                "Object_Name": "Event Icons",
                "Count": 431000000
            },
            {
                "Object_Name": "Event Countries",
                "Count": 1433333333
            },
            {
                "Object_Name": "Traveller Reviews",
                "Count": 1900000000
            }
        ]



    }); // end am4core.ready()
    </script>
    <!-- DATATBLES JS  -->
</body>
@include('layouts.alerts')

</html>