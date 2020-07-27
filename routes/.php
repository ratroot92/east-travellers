<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\SessionCheck;

Route::get('/', function () {
    $data['events'] = DB::table('events')->where(DB::raw('MONTH(date)'), date('m'))->get();
    $data['packages'] = DB::table('packages')->get();
    $data['sightseeing'] = DB::table('sightseeing')->where(DB::raw('MONTH(sight_date)'), date('m'))->get();
    $data['sightseeinglast4'] = DB::table('sightseeing')->orderBy('id', 'desc')->take(4)->get();

    return view('website.index', $data);
});

//--------------------- G D P R ---------------------
Route::get('gdpr', function () {
    return view('website.gdpr');
});

//--------------------- B O O K I N G ---------------------
Route::get('booking/{id}', 'BookingController@index')->name('bookings');

//--------------------- E V E N T S ---------------------
Route::get('events', 'EventsController@AllEvents')->name('events.show');
Route::get('events/detail/{id}', 'EventsController@DetailEvents')->name('events.detail');

Route::get('/admin/dashboard', function () {
    $data['total_packages'] = DB::table('packages')->count();
    $data['total_sight'] = DB::table('sightseeing')->count();
    $data['total_events'] = DB::table('events')->count();
    $data['total_activities'] = DB::table('activities')->count();
    $data['total_cruises'] = DB::table('cruises')->count();
    $data['total_transfers'] = DB::table('transfers')->count();
    //    $data['total_packages'] = DB::table('packages')->count();
    return view('admin.index', $data);
})->middleware(SessionCheck::class);


Route::group(['middleware' => ['session']], function () {

    //--------------------- E V E N T S ---------------------

    Route::get('admin/events', 'EventsController@add')->name('events');
    Route::get('admin/events/all', 'EventsController@index')->name('events.all');
    Route::post('admin/events/create/{id}', 'EventsController@store_update')->name('add.event');
    Route::get('admin/events/update/{action}/{id}', 'EventsController@create_edit')->name('events.update');
    Route::get('admin/events/delete/{id}', 'EventsController@delete')->name('events.delete');
});




Route::prefix('auth')->group(function () {
    Route::get('signin', 'Auth@signinPage')->name('signin');
    Route::get('signup', 'Auth@signupPage')->name('signup');
    Route::post('signin', 'Auth@signin'); //use as action for the form when to submit for login
    Route::post('signup', 'Auth@signup'); //use as action for the form when to submit for login
    Route::get('email/verify/{token}/{id}', 'Auth@verifyEmail'); //when a new user sign up for website
    Route::get('verification/page', 'Auth@verificationPage');
    Route::post('user/change/password', 'Auth@reset_password');
    Route::get('user/setting/profile', 'Auth@user_settings')->name('user.setting')->middleware(SessionCheck::class);
    Route::get('signout', 'Auth@signout')->name('signout')->middleware(SessionCheck::class);
});


Route::prefix('blogs')->group(function () {
    Route::get('get', 'Blogs_Controller@index')->name('blog.get')->middleware(SessionCheck::class);
    Route::get('/create_update/{action}/{id}', 'Blogs_Controller@create_edit')->name('blog.create')->middleware(SessionCheck::class);
    Route::get('create_update/{action}/{id}', 'Blogs_Controller@create_edit')->name('blog.edit')->middleware(SessionCheck::class);
    Route::post('store/{id}', 'Blogs_Controller@store_update')->name('blog.store')->middleware(SessionCheck::class);
    Route::post('update/{id}', 'Blogs_Controller@store_update')->name('blog.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'Blogs_Controller@delete')->name('blog.delete')->middleware(SessionCheck::class);
});


Route::prefix('sightseeing')->group(function () {
    Route::get('get', 'Sightseeing_Controller@index')->name('sightseeing.get')->middleware(SessionCheck::class);
    Route::get('/create_update/{action}/{id}', 'Sightseeing_Controller@create_edit')->name('sightseeing.create')->middleware(SessionCheck::class);
    Route::get('create_update/{action}/{id}', 'Sightseeing_Controller@create_edit')->name('sightseeing.edit')->middleware(SessionCheck::class);
    Route::post('store/{id}', 'Sightseeing_Controller@store_update')->name('sightseeing.store')->middleware(SessionCheck::class);
    Route::post('update/{id}', 'Sightseeing_Controller@store_update')->name('sightseeing.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'Sightseeing_Controller@delete')->name('sightseeing.delete')->middleware(SessionCheck::class);
});


Route::get('/send/email/verify', 'SendEmail@send_verification');
Route::get('/send/email/booking', 'SendEmail@send_booking_email');

/*--------------Packages-------------*/
/*Route::get('admin/package', 'PackagesController@index')->name('package');
Route::post('admin/package-add/{action}/{id}', 'PackagesController@store_update')->name('package.create');
Route::get('admin/package-add/{action}/{id}', 'Blogs_Controller@create_edit')->name('package.edit');*/
Route::prefix('packages')->group(function () {
    Route::get('get/', 'PackagesController@index')->name('packages.get')->middleware(SessionCheck::class);
    Route::get('/create_update/{action}/{id}', 'PackagesController@create_edit')->name('packages.create')->middleware(SessionCheck::class);
    Route::get('create_update/{action}/{id}', 'PackagesController@create_edit')->name('packages.edit')->middleware(SessionCheck::class);
    Route::post('store/{id}', 'PackagesController@store_update')->name('packages.store')->middleware(SessionCheck::class);
    Route::post('update/{id}', 'PackagesController@store_update')->name('packages.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'PackagesController@delete')->name('packages.delete')->middleware(SessionCheck::class);
    Route::get('map/{lng}/{lat}/{city}', 'PackagesController@geolocation')->name('geolocate_packages')->middleware(SessionCheck::class);
});
/*Activity Routes defined By Ahmad*/

Route::prefix('activity')->group(function () {
    Route::get('view/', 'ahmed\Activity_Controller@view')->name('activity.view')->middleware(SessionCheck::class);
    Route::get('add/', 'ahmed\Activity_Controller@add')->name('activity.add')->middleware(SessionCheck::class);
    Route::post('insert/', 'ahmed\Activity_Controller@insert')->name('activity.insert')->middleware(SessionCheck::class);
    Route::get('/update/{id}', 'ahmed\Activity_Controller@update')->name('activity.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'ahmed\Activity_Controller@delete')->name('activity.delete')->middleware(SessionCheck::class);
    Route::post('edit', 'ahmed\Activity_Controller@edit')->name('activity.edit')->middleware(SessionCheck::class);
    Route::get('category', 'ahmed\Activity_Controller@category')->name('activity.category')->middleware(SessionCheck::class);
    Route::get('add/category', 'ahmed\Activity_Controller@addcategory')->name('activity.addcategory')->middleware(SessionCheck::class);
    Route::post('category/insert', 'ahmed\Activity_Controller@insertcategory')->name('activity.insertcategory')->middleware(SessionCheck::class);

    //

});
/*Activity Routes defined By Ahmad*/




/*Cruise Routes defined By Ahmad*/

Route::prefix('cruise')->group(function () {
    Route::get('view/', 'ahmed\Cruise_Controller@view')->name('cruise.view')->middleware(SessionCheck::class);
    Route::get('add/', 'ahmed\Cruise_Controller@add')->name('cruise.add')->middleware(SessionCheck::class);
    Route::post('insert/', 'ahmed\Cruise_Controller@insert')->name('cruise.insert')->middleware(SessionCheck::class);
    Route::get('/update/{id}', 'ahmed\Cruise_Controller@update')->name('cruise.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'ahmed\Cruise_Controller@delete')->name('cruise.delete')->middleware(SessionCheck::class);
    Route::post('edit', 'ahmed\Cruise_Controller@edit')->name('cruise.edit')->middleware(SessionCheck::class);
    Route::get('category', 'ahmed\Cruise_Controller@category')->name('cruise.category')->middleware(SessionCheck::class);
    Route::get('add/category', 'ahmed\Cruise_Controller@addcategory')->name('cruise.addcategory')->middleware(SessionCheck::class);
    Route::post('category/insert', 'ahmed\Cruise_Controller@insertcategory')->name('cruise.insertcategory')->middleware(SessionCheck::class);
});
/*Cruise Routes defined By Ahmad*/



/*Cruise Routes defined By Ahmad*/

Route::prefix('transfer')->group(function () {
    Route::get('view/', 'ahmed\Transfer_Controller@view')->name('transfer.view')->middleware(SessionCheck::class);
    Route::get('add/', 'ahmed\Transfer_Controller@add')->name('transfer.add')->middleware(SessionCheck::class);
    Route::post('insert/', 'ahmed\Transfer_Controller@insert')->name('transfer.insert')->middleware(SessionCheck::class);
    Route::get('/update/{id}', 'ahmed\Transfer_Controller@update')->name('transfer.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'ahmed\Transfer_Controller@delete')->name('transfer.delete')->middleware(SessionCheck::class);
    Route::post('edit', 'ahmed\Transfer_Controller@edit')->name('transfer.edit')->middleware(SessionCheck::class);
    Route::get('category', 'ahmed\Transfer_Controller@category')->name('transfer.category')->middleware(SessionCheck::class);
    Route::get('add/category', 'ahmed\Transfer_Controller@addcategory')->name('transfer.addcategory')->middleware(SessionCheck::class);
    Route::post('category/insert', 'ahmed\Transfer_Controller@insertcategory')->name('transfer.insertcategory')->middleware(SessionCheck::class);
});
/*Cruise Routes defined By Ahmad*/









/**/
Route::group(['middleware' => ['session']], function () {
    /*--------------Packages Categories-------------*/
    Route::get('admin/package_cat/show', 'PackageCategoriesController@index')->name('package_cat')->middleware(SessionCheck::class);
    Route::get('admin/package_cat/{action}/{id}', 'PackageCategoriesController@create_edit')->name('package_cat.create')->middleware(SessionCheck::class);
    Route::get('admin/package_cat/{action}/{id}', 'PackageCategoriesController@create_edit')->name('package_cat.edit')->middleware(SessionCheck::class);
    Route::post('admin/package_cat/data/store/{id}', 'PackageCategoriesController@store_update')->name('package_cat.store')->middleware(SessionCheck::class);
    Route::post('admin/package_cat/data/update/{id}', 'PackageCategoriesController@store_update')->name('package_cat.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'PackageCategoriesController@delete')->name('package_cat.delete')->middleware(SessionCheck::class);
});

/*-----------Popular Cities-------------*/

Route::prefix('popularcities')->group(function () {
    Route::get('get/', 'PopularCitiesController@index')->name('popularcities.get')->middleware(SessionCheck::class);
    Route::get('/create_update/{action}/{id}', 'PopularCitiesController@create_edit')->name('popularcities.create')->middleware(SessionCheck::class);
    Route::get('create_update/{action}/{id}', 'PopularCitiesController@create_edit')->name('popularcities.edit')->middleware(SessionCheck::class);
    Route::post('store/{id}', 'PopularCitiesController@store_update')->name('popularcities.store')->middleware(SessionCheck::class);
    Route::post('update/{id}', 'PopularCitiesController@store_update')->name('popularcities.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'PopularCitiesController@delete')->name('popularcities.delete')->middleware(SessionCheck::class);
    //Route::get('map/{lng}/{lat}/{city}' , 'PackagesController@geolocation')->name('geolocate_packages')->middleware(SessionCheck::class);

});


/*website builder */
Route::prefix('websitebuilder')->group(function () {
    Route::get('/terms', 'ahmed\websitebuilder@viewterms')->name('viewterms.get')->middleware(SessionCheck::class);
    Route::get('/cancellations', 'ahmed\websitebuilder@viewcancelaltion')->name('cancellationpolicy.get')->middleware(SessionCheck::class);
    Route::get('/contactus', 'ahmed\websitebuilder@viewcontactus')->name('contactus.get')->middleware(SessionCheck::class);
    Route::get('/faq', 'ahmed\websitebuilder@viewfaq')->name('faq.get')->middleware(SessionCheck::class);
    Route::get('/paymentpolicy', 'ahmed\websitebuilder@viewpaymentpolicy')->name('paymentpolicy.get')->middleware(SessionCheck::class);
    Route::get('/cookies', 'ahmed\websitebuilder@viewcookies')->name('cookies.get')->middleware(SessionCheck::class);



    //dynamic content update

    Route::post('/updateTerms', 'ahmed\websitebuilder@updateTerms')->name('updateterms')->middleware(SessionCheck::class);
    Route::post('/updateCancellation', 'ahmed\websitebuilder@updateCancellation')->name('updatecancellation')->middleware(SessionCheck::class);

    Route::post('/updatePayment', 'ahmed\websitebuilder@updatePayment')->name('updatepayment')->middleware(SessionCheck::class);

    Route::post('/updateContactus', 'ahmed\websitebuilder@updateContactus')->name('updatecontactus')->middleware(SessionCheck::class);

    Route::post('/updateCookie', 'ahmed\websitebuilder@updateCookie')->name('updatecookie')->middleware(SessionCheck::class);

    Route::post('/updateFaq', 'ahmed\websitebuilder@updateFaq')->name('updatefaq')->middleware(SessionCheck::class);




    Route::get('/create_update/{action}/{id}', 'PopularCitiesController@create_edit')->name('popularcities.create')->middleware(SessionCheck::class);
    Route::get('create_update/{action}/{id}', 'PopularCitiesController@create_edit')->name('popularcities.edit')->middleware(SessionCheck::class);
    Route::post('store/{id}', 'PopularCitiesController@store_update')->name('popularcities.store')->middleware(SessionCheck::class);
    Route::post('update/{id}', 'PopularCitiesController@store_update')->name('popularcities.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'PopularCitiesController@delete')->name('popularcities.delete')->middleware(SessionCheck::class);
    //Route::get('map/{lng}/{lat}/{city}' , 'PackagesController@geolocation')->name('geolocate_packages')->middleware(SessionCheck::class);

});

/*end webiste builder */




//Route::get('packages', 'PackagesController@PackagesDetails')->name('packages.packages');
Route::get('packages', 'PackagesController@Packages')->name('packages.packages');
Route::get('packages/detail/{id}', 'PackagesController@PackagesDetails')->name('packages.detail');

//activities
Route::get('activities', 'ahmed\Activity_Controller@activities')->name('activity.packages');
Route::get('activity/detail/{id}', 'ahmed\Activity_Controller@ActivityDetails')->name('activity.detail');
Route::get('cruises', 'ahmed\Cruise_Controller@cruises')->name('cruise.packages');
Route::get('cruises/detail/{id}', 'ahmed\Cruise_Controller@CruiseDetails')->name('cruise.detail');
Route::get('transfers', 'ahmed\Transfer_Controller@transfers')->name('transfer.packages');
Route::get('transfers/detail/{id}', 'ahmed\Transfer_Controller@TransferDetails')->name('transfer.detail');



Route::get('/en/page/payment', function () {
    return view('website.payments');
});

Route::get('/blogs/all', function () {
    return view('blogs');
});

Route::get('/blog/full/{id}', function ($id) {
    $data['blogid'] = $id;
    return view('blogs-full', $data);
});
/*----------About Us-----------*/

Route::get('aboutus', 'AboutUsController@index');
Route::get('sightseeingview', function () {
    $data['sightseeing'] = DB::table('sightseeing')->get();

    return view('sightseeing.sightseeingview', $data);
});

Route::get('sightseeingview/details/{id}', function ($id) {
    $data['sightseeing'] = DB::table('sightseeing')->where('id', $id)->get();

    return view('sightseeing.sightseeingviewdetail', $data);
});


Route::get('aboutus', function () {
    return view('website.aboutus');
});

Route::get('custominquiry', function () {
    return view('website.custominquiry');
});


Route::get('/customInquiry/flighDetails', function () {
    return view('website.inquiry.flightDetails');
});



Route::get('/customInquiry/airportDetails', function () {
    return view('website.inquiry.airportDetails');
});

Route::get('/customInquiry/accomodationDetails', function () {
    return view('website.inquiry.accomodationDetails');
});


Route::get('/customInquiry/toursDetails', function () {
    return view('website.inquiry.toursDetail');
});


Route::get('/customInquiry/tripDetails', function () {
    return view('website.inquiry.tripDetails');
});








Route::get('termscondition', function () {
    $content = DB::table('dynamic_content')
        ->where('id', '1')
        ->first();

    return view('website.termscondition', ['content' => $content]);
});


Route::get('payment/policy', function () {
    $content = DB::table('dynamic_content')
        ->where('id', '1')
        ->first();

    return view('policy.payment', ['content' => $content]);
})->name('payment.policy');

Route::get('faq/policy', function () {
    $content = DB::table('dynamic_content')
        ->where('id', '1')
        ->first();

    return view('policy.faq', ['content' => $content]);
});


Route::get('contact/policy', function () {
    $content = DB::table('dynamic_content')
        ->where('id', '1')
        ->first();

    return view('policy.contact', ['content' => $content]);
})->name('contact.policy');





Route::get('cookie/policy', function () {
    $content = DB::table('dynamic_content')
        ->where('id', '1')
        ->first();

    return view('policy.cookie', ['content' => $content]);
})->name('cookie.policy');



Route::get('cancellation/policy', function () {
    $content = DB::table('dynamic_content')
        ->where('id', '1')
        ->first();

    return view('policy.cancellation', ['content' => $content]);
})->name('cancellation.policy');



Route::get('packages/show', function () {
    return view('website.termscondition');
});

Route::get('packages/show', function () {
    return view('website.termscondition');
});


Route::post('/submitinquiry', function () {
    DB::table('custom_inquries')->insert([
        'type' => $_POST['type'],
        'description' => $_POST['description'],
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'number_of_travelers' => $_POST['number_of_travelers'],
        'travelers_description' => $_POST['travelers_description'],
        'city' => $_POST['city'],
        // 'arrival'=>$_POST['arrival'],
        // 'departure'=>$_POST['departure'],
        'max_price' => $_POST['max_price'],
        'min_price' => $_POST['min_price'],

    ]);

    $Object = DB::table('custom_inquries')
        ->orderBy('created_at', 'desc')
        ->first();




    $type = $Object->type;
    $description = $Object->description;
    $email = $Object->email;
    $name = $Object->name;
    $phone = $Object->phone;
    $number_of_travelers = $Object->number_of_travelers;
    $city = $Object->city;
    $travelers_description = $Object->travelers_description;
    // $arrival=$Object->arrival;
    // $departure=$Object->departure;
    $max_price = $Object->max_price;
    $min_price = $Object->min_price;

    Mail::to('maliksblr92@gmail.com')->send(new App\Mail\SendMailable($object));



    return back()->with('submit');
});



Route::post('/submitinquiry_email', 'ahmed\email_controller@insert_email_inquiry');




Route::get('inquiries/get/packages', function () {

    $packages = DB::table('inquiries')
        ->where('type', 'Tour Package')
        ->get();
    return view('inquiries.packages', ['packages' => $packages]);
});


Route::get('inquiries/get/events', function () {

    $packages = DB::table('inquiries')
        ->where('type', 'Event')
        ->get();
    return view('inquiries.events', ['packages' => $packages]);
});




Route::get('inquiries/get/activities', function () {

    $packages = DB::table('inquiries')
        ->where('type', 'Activity')
        ->get();
    return view('inquiries.activities', ['packages' => $packages]);
});





Route::get('inquiries/get/cruises', function () {

    $packages = DB::table('inquiries')
        ->where('type', 'Cruise')
        ->get();
    return view('inquiries.cruises', ['packages' => $packages]);
});




Route::get('inquiries/get/transfers', function () {

    $packages = DB::table('inquiries')
        ->where('type', 'Transfer')
        ->get();
    return view('inquiries.transfers', ['packages' => $packages]);
});




Route::get('inquiries/get/daytours', function () {

    $packages = DB::table('inquiries')
        ->where('type', 'Sight Seeing')
        ->get();
    return view('inquiries.daytours', ['packages' => $packages]);
});




Route::get('commingsoon/{type}', function ($type) {
    $data['type'] = $type;
    return view('website.commingsoon', $data);
});

Route::get('search/result', function () {
    return view('website.search-result');
});


Route::get('/migrate', function () {
    Artisan::call('migrate');
    echo "done";
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
