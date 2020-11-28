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
use Illuminate\Support\Facades\Route;

Route::get(
	'/',

	function () {
		$data['events'] = DB::table('events')->where(DB::raw('MONTH(date)'), date('m'))->get();
		$data['sightseeing'] = DB::table('sightseeing')->where(DB::raw('MONTH(sight_date)'), date('m'))->get();
		// $result = DB::table('popularcities')->limit('10')->get();
        $cities = DB::table('popularcities')->latest('created_at')->limit('9')->get();

		$Event_Cities = DB::table('event__cities')->groupby('name')->get();
		$Event_Countries = DB::table('event__countries')->groupby('name')->get();
		$Event_Categories = DB::table('event__categories')->groupby('name')->get();
		return view('website.index', [
			'data'              => $data,
			'Event_Cities'      => $Event_Cities,
			'Event_Countries'   => $Event_Countries,
			'Event_Categories'   => $Event_Categories,
			'cities'            => $cities,
		]);
	}
);
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
	$data['total_packages'] = DB::table('all__events')->where('event_type', 'Pacakge')->count();
	$data['total_sight'] = DB::table('sightseeing')->count();
	$data['total_events'] = DB::table('events')->count();
	$data['total_activities'] = DB::table('all__events')->where('event_type', 'Activity')->count();
	$data['total_cruises'] = DB::table('all__events')->where('event_type', 'Cruise')->count();
	$data['total_transfers'] = DB::table('all__events')->where('event_type', 'Transfer')->count();
	$data['total_daytours'] = DB::table('all__events')->where('event_type', 'Daytour')->count();
	$data['total_cities'] = DB::table('event__cities')->count();
	$data['total_icons'] = DB::table('event__icons')->count();
	$data['total_countries'] = DB::table('event__countries')->count();
	$data['total_categories'] = DB::table('event__categories')->count();
	$data['total_popularcities'] = DB::table('event__categories')->count();
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
//activities

Route::get('/activity/downloadPDF/{id}', 'ahmed\Activity_Controller@PDF');
Route::get('/activity/pdf', 'ahmed\Activity_Controller@returnpdf');

/*Activity Routes defined By Ahmad*/
Route::prefix('activity')->group(function () {
});


Route::get('cruise/downloadPDF/{id}', 'ahmed\Cruise_Controller@PDF');
Route::get('cruise/pdf', 'ahmed\Cruise_Controller@returnpdf');
Route::prefix('cruise')->group(function () {
});
Route::get('transfers/downloadPDF/{id}', 'ahmed\Transfer_Controller@PDF');
Route::get('packages/downloadPDF/{id}', 'ahmed\Package_Controller@PDF');
Route::get('daytours/downloadPDF/{id}', 'ahmed\Daytour_Controller@PDF');

Route::get('sightseeingview', function () {
	$data['sightseeing'] = DB::table('sightseeing')->get();
	return view('sightseeing.sightseeingview', $data);
});
Route::get('sightseeingview/details/{id}', function ($id) {
	$data['sightseeing'] = DB::table('sightseeing')->where('id', $id)->get();
	return view('sightseeing.sightseeingviewdetail', $data);
});
/*end sight viewing */
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
Route::get('blog/view', 'ahmed\blog_controller@view')->name('blog.view');
Route::get('blog/detail/{id}', 'ahmed\blog_controller@detail')->name('blog.detail');
Route::get('/send/email/verify', 'SendEmail@send_verification');
Route::get('/send/email/booking', 'SendEmail@send_booking_email');
Route::prefix('packages')->group(function () {
	Route::get('get/', 'PackagesController@index')->name('packages.get')->middleware(SessionCheck::class);
	Route::get('/create_update/{action}/{id}', 'PackagesController@create_edit')->name('packages.create')->middleware(SessionCheck::class);
	Route::get('create_update/{action}/{id}', 'PackagesController@create_edit')->name('packages.edit')->middleware(SessionCheck::class);
	Route::post('store/{id}', 'PackagesController@store_update')->name('packages.store')->middleware(SessionCheck::class);
	Route::post('update/{id}', 'PackagesController@store_update')->name('packages.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'PackagesController@delete')->name('packages.delete')->middleware(SessionCheck::class);
	Route::get('map/{lng}/{lat}/{city}', 'PackagesController@geolocation')->name('geolocate_packages')->middleware(SessionCheck::class);
});

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
	Route::get('all', 'PopularCitiesController@all')->name('popularcities.all');
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
	Route::get('/aboutus', 'ahmed\websitebuilder@viewaboutus')->name('aboutus.get')->middleware(SessionCheck::class);
	//dynamic content update
	Route::post('/updateTerms', 'ahmed\websitebuilder@updateTerms')->name('updateterms')->middleware(SessionCheck::class);
	Route::post('/updateCancellation', 'ahmed\websitebuilder@updateCancellation')->name('updatecancellation')->middleware(SessionCheck::class);
	Route::post('/updatePayment', 'ahmed\websitebuilder@updatePayment')->name('updatepayment')->middleware(SessionCheck::class);
	Route::post('/updateContactus1', 'ahmed\websitebuilder@updateContactus1')->name('updatecontactus1')->middleware(SessionCheck::class);
	Route::post('/updateContactus2', 'ahmed\websitebuilder@updateContactus2')->name('updatecontactus2')->middleware(SessionCheck::class);
	Route::post('/updateContactus3', 'ahmed\websitebuilder@updateContactus3')->name('updatecontactus3')->middleware(SessionCheck::class);
	Route::post('/updateContactus4', 'ahmed\websitebuilder@updateContactus4')->name('updatecontactus4')->middleware(SessionCheck::class);
	Route::post('/updateCookie', 'ahmed\websitebuilder@updateCookie')->name('updatecookie')->middleware(SessionCheck::class);
	Route::post('/updateFaq', 'ahmed\websitebuilder@updateFaq')->name('updatefaq')->middleware(SessionCheck::class);
	Route::post('/updateabout', 'ahmed\websitebuilder@updateabout')->name('updateabout')->middleware(SessionCheck::class);
	Route::get('/create_update/{action}/{id}', 'PopularCitiesController@create_edit')->name('popularcities.create')->middleware(SessionCheck::class);
	Route::get('create_update/{action}/{id}', 'PopularCitiesController@create_edit')->name('popularcities.edit')->middleware(SessionCheck::class);
	Route::post('store/{id}', 'PopularCitiesController@store_update')->name('popularcities.store')->middleware(SessionCheck::class);
	Route::post('update/{id}', 'PopularCitiesController@store_update')->name('popularcities.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'PopularCitiesController@delete')->name('popularcities.delete')->middleware(SessionCheck::class);
	//Route::get('map/{lng}/{lat}/{city}' , 'PackagesController@geolocation')->name('geolocate_packages')->middleware(SessionCheck::class);
});
/*end webiste builder */
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
// Route::get('aboutus' , 'AboutUsController@index');
Route::get('/aboutus', function () {
	$content = DB::table('dynamic_content')
		->where('id', '1')
		->first();
	return view('website.aboutus', ['content' => $content]);
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
Route::get('/customInquiry/cruiseDetails', function () {
	return view('website.inquiry.cruiseDetails');
});
Route::get('/customInquiry/eventDetails', function () {
	return view('website.inquiry.eventDetails');
});
Route::get('homepage/searchbox', 'ahmed\SearchController@getSearchData');
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
		'type'                  => $_POST['type'],
		'description'           => $_POST['description'],
		'email'                 => $_POST['email'],
		'name'                  => $_POST['name'],
		'phone'                 => $_POST['phone'],
		'number_of_travelers'   => $_POST['number_of_travelers'],
		'travelers_description' => $_POST['travelers_description'],
		'city'                  => $_POST['city'],
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
Route::post('activity/detail_inquiry', 'ahmed\email_controller@activity_detail_inquiry');
Route::post('cruise/detail_inquiry', 'ahmed\email_controller@cruise_detail_inquiry');
Route::post('daytour/detail_inquiry', 'ahmed\email_controller@daytour_detail_inquiry');
Route::post('transfer/detail_inquiry', 'ahmed\email_controller@transfer_detail_inquiry');
Route::post('package/detail_inquiry', 'ahmed\email_controller@package_detail_inquiry');
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
Route::get('search/result', 'ahmed\SearchController@search_results');
Route::get('/migrate', function () {
	Artisan::call('migrate');
	echo "done";
});
Route::get('/clear', function () {
	Artisan::call('cache:clear');
	return "Cache is cleared";
});
Route::get('csrf', function () {
	return csrf_taken();
});
Route::get('/cities', 'ahmed\SearchController@cities_index');
Route::get('/gallery', 'ahmed\GalleryController@index');
Route::get('/gallery/add', 'ahmed\GalleryController@add')->name('gallery.add');
Route::post('/gallery/add_video', 'ahmed\GalleryController@add_url');
Route::get('/gallery/all/videos', 'ahmed\GalleryController@all_videos')->name('gallery..videos.all');
Route::get('/gallery/video/delete/{id}', 'ahmed\GalleryController@delete_video')->name('gallery.video.delete');
Route::get('/gallery/video/edit/{id}', 'ahmed\GalleryController@edit_video')->name('gallery.video.edit');
Route::get('/gallery/video/edit', 'ahmed\GalleryController@edit_video_view')->name('gallery.video.edit.view');
Route::post('/gallery/video/update', 'ahmed\GalleryController@edit_video_update')->name('gallery.video.edit.update');
Route::get('/gallery/photos', 'ahmed\GalleryController@photo_index');
Route::get('/gallery/add_photos', 'ahmed\GalleryController@addphotos')->name('gallery.addphotos');
Route::post('/gallery/insert_photos', 'ahmed\GalleryController@insert_photos')->name('gallery.insert_photos');
Route::get('/gallery/all_photos', 'ahmed\GalleryController@all_photos')->name('gallery.all_photos');
Route::get('/gallery/delete/photo/{id}', 'ahmed\GalleryController@delete_photo')->name('gallery.del.photo');
Route::get('/gallery/edit_view/photo/{id}', 'ahmed\GalleryController@editview_photo')->name('gallery.editview.photo');
Route::post('/gallery/edit/photo/', 'ahmed\GalleryController@edit_photo')->name('gallery.edit.photo');

// Add Traveller Reviews
Route::get('/gallery/add/travellerReviews', 'ahmed\GalleryController@addTravellerReviewGET')->name('gallery.add.traveller.review')->middleware(SessionCheck::class);
Route::post('/gallery/add/travellerReviews', 'ahmed\GalleryController@addTravellerReviewPOST')->name('gallery.add.traveller.review')->middleware(SessionCheck::class);
Route::get('/gallery/all/travellerReviews', 'ahmed\GalleryController@allTravellerReviewGET')->name('gallery.all.traveller.review')->middleware(SessionCheck::class);
Route::get('/gallery/update/travellerReviews/{id}', 'ahmed\GalleryController@updateTravellerReviewGET')->name('gallery.update.traveller.review.get')->middleware(SessionCheck::class);
Route::post('/gallery/update/travellerReviews', 'ahmed\GalleryController@updateTravellerReviewPOST')->name('gallery.update.traveller.review')->middleware(SessionCheck::class);
Route::get('/gallery/delete/travellerReviews/{id}', 'ahmed\GalleryController@deleteTravellerReviewGET')->name('gallery.update.traveller.review.delete')->middleware(SessionCheck::class);
Route::get('/gallery/travellerReviews', 'ahmed\GalleryController@galleryTravellerReviewGET')->name('gallery.traveller.review');

// End Traveller Reviews
//Add group photos
Route::get('/gallery/add/groupPhoto', 'ahmed\GalleryController@addGroupPhotoGET')->name('gallery.add.group.photo.get')->middleware(SessionCheck::class);
Route::post('/gallery/add/groupPhoto', 'ahmed\GalleryController@addGroupPhotoPOST')->name('gallery.add.group.photo.post')->middleware(SessionCheck::class);
Route::get('/gallery/all/groupPhoto', 'ahmed\GalleryController@allGroupPhotoGET')->name('gallery.all.group.photo.get')->middleware(SessionCheck::class);
Route::get('/gallery/delete/groupPhoto/{id}', 'ahmed\GalleryController@deleteGroupPhotoGET')->name('gallery.delete.group.photo.get')->middleware(SessionCheck::class);
Route::get('/gallery/update/groupPhoto/{id}', 'ahmed\GalleryController@updateGroupPhotoGET')->name('gallery.update.group.photo.get')->middleware(SessionCheck::class);
Route::post('/gallery/update/groupPhoto', 'ahmed\GalleryController@updateGroupPhotoPOST')->name('gallery.update.group.photo.post')->middleware(SessionCheck::class);
Route::get('/gallery/update/groupPhoto', 'ahmed\GalleryController@indexGroupPhotoPOST')->name('gallery.index.group.photo.get');
//End Group photos

//services page routes
Route::get('services/index', 'ahmed\ServiceController@index')->name('services.get.index');
Route::get('admin/services/add', 'ahmed\ServiceController@admin_index')->name('admin.get.index');

//admin services
Route::get('admin/services/view/vision', 'ahmed\ServiceController@view_vision')->name('services.view.vision');
Route::post('admin/services/add/service', 'ahmed\ServiceController@add_service')->name('services.add.service');
Route::get('admin/services/all/services', 'ahmed\ServiceController@all_service')->name('services.all.services');
Route::get('admin/services/update/services/{id}', 'ahmed\ServiceController@update_service')->name('services.update.services');
Route::post('admin/services/postupdate/services/', 'ahmed\ServiceController@post_update_service')->name('services.postupdate.services');
Route::get('admin/services/getdelete/services/{id}', 'ahmed\ServiceController@post_delete_service')->name('services.postdelete.services');

// visa routes
Route::get('visa/index', function () {
	return view('visa/index');
});

//NEW WORK
Route::get('view_add_event/{action}', 'Event_Controller@viewAddEvent')->name('view.add.event')->middleware(SessionCheck::class);
Route::post('view_add_event', 'Event_Controller@addEvent')->name('view.add.event.post')->middleware(SessionCheck::class);
Route::get('view_update_event/{action}/{id}', 'Event_Controller@viewupdateEvent')->name('view.update.event')->middleware(SessionCheck::class);
Route::post('view_update_event', 'Event_Controller@updateEvent')->name('view.update.event.post')->middleware(SessionCheck::class);
Route::get('view_all_event', 'Event_Controller@allEvents')->name('view.all.events')->middleware(SessionCheck::class);
Route::get('delete_event/{id}', 'Event_Controller@deleteEvent')->name('delete.event')->middleware(SessionCheck::class);
Route::get('event_detail/{id}', 'Event_Controller@eventDetail')->name('event.detail');
// event city
Route::get('view_add_city/{action}', 'Event_Controller@viewAddCity')->name('view.add.city')->middleware(SessionCheck::class);
Route::post('view_add_city', 'Event_Controller@addEventCity')->name('view.add.city.post')->middleware(SessionCheck::class);
Route::get('view_all_city', 'Event_Controller@allEventCities')->name('view.all.cities')->middleware(SessionCheck::class);
Route::get('view_update_city/{action}/{id}', 'Event_Controller@viewupdateEventCity')->name('view.update.eventcity')->middleware(SessionCheck::class);
Route::post('view_update_eventcity', 'Event_Controller@updateEventCity')->name('view.update.eventcity.post')->middleware(SessionCheck::class);
Route::get('delete/event_city/{id}', 'Event_Controller@deleteEventCity')->name('view.delete.eventcity')->middleware(SessionCheck::class);

// event country
Route::get('view_add_country/{action}', 'Event_Controller@viewAddCountry')->name('view.add.country')->middleware(SessionCheck::class);
Route::post('view_add_country', 'Event_Controller@addEventCountry')->name('view.add.country.post')->middleware(SessionCheck::class);
Route::get('view_all_country', 'Event_Controller@allEventCountries')->name('view.all.countries')->middleware(SessionCheck::class);
Route::get('view_update_country/{action}/{id}', 'Event_Controller@viewupdateEventCountry')->name('view.update.eventcountry')->middleware(SessionCheck::class);
Route::post('view_update_eventcountry', 'Event_Controller@updateEventCountry')->name('view.update.eventcountry.post')->middleware(SessionCheck::class);
Route::get('delete/event_country/{id}', 'Event_Controller@deleteEventCountry')->name('view.delete.eventcountry')->middleware(SessionCheck::class);
// event category
Route::get('view_add_category/{action}', 'Event_Controller@viewAddCategory')->name('view.add.category')->middleware(SessionCheck::class);
Route::post('view_add_category', 'Event_Controller@addEventCategory')->name('view.add.category.post')->middleware(SessionCheck::class);
Route::get('view_all_category', 'Event_Controller@allEventCategories')->name('view.all.categories')->middleware(SessionCheck::class);
Route::get('view_update_category/{action}/{id}', 'Event_Controller@viewupdateEventCategory')->name('view.update.eventcategory')->middleware(SessionCheck::class);
Route::post('view_update_eventcategory', 'Event_Controller@updateEventCategory')->name('view.update.eventcategory.post')->middleware(SessionCheck::class);
Route::get('delete/event_category/{id}', 'Event_Controller@deleteEventCategory')->name('view.delete.eventcategory')->middleware(SessionCheck::class);
// event icons
Route::get('view_add_icon/{action}', 'Event_Controller@viewAddIcon')->name('view.add.icon')->middleware(SessionCheck::class);
Route::post('view_add_icon', 'Event_Controller@addEventIcon')->name('view.add.icon.post')->middleware(SessionCheck::class);
Route::get('view_all_icon', 'Event_Controller@allEventIcons')->name('view.all.icons')->middleware(SessionCheck::class);
Route::get('view_update_icon/{action}/{id}', 'Event_Controller@viewupdateEventIcon')->name('view.update.eventicon')->middleware(SessionCheck::class);
Route::post('view_update_eventicon', 'Event_Controller@updateEventIcon')->name('view.update.eventicon.post')->middleware(SessionCheck::class);
Route::get('delete/event_icon/{id}', 'Event_Controller@deleteEventIcon')->name('view.delete.eventicon')->middleware(SessionCheck::class);
// automcplete
// Autocomplete cities and countries
Route::post('autocomplete/fetch', 'ahmed\blog_controller@autocompleteFetch');
Route::post('autocomplete/event/countries', 'ahmed\blog_controller@Autocomplete_Countries');
//city search all events
Route::get('all_events/city/{id}', 'ahmed\SearchController@allEventsByCity')->name('allevents.search.city');
Route::get('all_events/country/{id}', 'ahmed\SearchController@allEventsByCountry')->name('allevents.search.country');
//All events page --displays all events
Route::get('list/events/all', 'Event_Controller@listAllEvents')->name('list.all.events');

// Activity Events LIST
Route::get('all/events/activity', 'ahmed\Activity_Controller@All_Activity_Events')->name('all.events.activity');
Route::get('search/activity/city/{id}', 'ahmed\Activity_Controller@Activity_By_City')->name('search.activity.city');
Route::get('search/activity/country/{id}', 'ahmed\Activity_Controller@Activity_By_Country')->name('search.activity.country');
Route::get('search/activity/category/{id}', 'ahmed\Activity_Controller@Activity_By_Category')->name('search.activity.category');
Route::get('search/activity/price/{min}/{max}', 'ahmed\Activity_Controller@Activity_By_Price')->name('search.activity.price');
// Activity Events GRID
Route::get('all/events/activity/grid', 'ahmed\Activity_Controller@All_Activity_Events_Grid')->name('all.events.activity.grid');
Route::get('search/activity/grid/city/{id}', 'ahmed\Activity_Controller@Activity_By_City_Grid')->name('search.activity.city.grid');
Route::get('search/activity/grid/country/{id}', 'ahmed\Activity_Controller@Activity_By_Country_Grid')->name('search.activity.country.grid');
Route::get('search/activity/grid/category/{id}', 'ahmed\Activity_Controller@Activity_By_Category_Grid')->name('search.activity.category.grid');
Route::get('search/activity/grid/price/{min}/{max}', 'ahmed\Activity_Controller@Activity_By_Price_Grid')->name('search.activity.price.grid');



// Cruise Events LIST
Route::get('all/events/cruise', 'ahmed\Cruise_Controller@All_Cruise_Events')->name('all.events.cruise');
Route::get('search/cruise/city/{id}', 'ahmed\Cruise_Controller@Cruise_By_City')->name('search.cruise.city');
Route::get('search/cruise/country/{id}', 'ahmed\Cruise_Controller@Cruise_By_Country')->name('search.cruise.country');
Route::get('search/cruise/category/{id}', 'ahmed\Cruise_Controller@Cruise_By_Category')->name('search.cruise.category');
Route::get('search/cruise/price/{min}/{max}', 'ahmed\Cruise_Controller@Cruise_By_Price')->name('search.cruise.price');
// Cruise Events GRID
Route::get('all/events/cruise/grid', 'ahmed\Cruise_Controller@All_Cruise_Events_Grid')->name('all.events.cruise.grid');
Route::get('search/cruise/grid/city/{id}', 'ahmed\Cruise_Controller@Cruise_By_City_Grid')->name('search.cruise.city.grid');
Route::get('search/cruise/grid/country/{id}', 'ahmed\Cruise_Controller@Cruise_By_Country_Grid')->name('search.cruise.country.grid');
Route::get('search/cruise/grid/category/{id}', 'ahmed\Cruise_Controller@Cruise_By_Category_Grid')->name('search.cruise.category.grid');
Route::get('search/cruise/grid/price/{min}/{max}', 'ahmed\Cruise_Controller@Cruise_By_Price_Grid')->name('search.cruise.price.grid');




// Daytour Events LIST
Route::get('all/events/daytour', 'ahmed\Daytour_Controller@All_Daytour_Events')->name('all.events.daytour');
Route::get('search/daytour/city/{id}', 'ahmed\Daytour_Controller@Daytour_By_City')->name('search.daytour.city');
Route::get('search/daytour/country/{id}', 'ahmed\Daytour_Controller@Daytour_By_Country')->name('search.daytour.country');
Route::get('search/daytour/category/{id}', 'ahmed\Daytour_Controller@Daytour_By_Category')->name('search.daytour.category');
Route::get('search/daytour/price/{min}/{max}', 'ahmed\Daytour_Controller@Daytour_By_Price')->name('search.daytour.price');
// Daytour Events GRID
Route::get('all/events/daytour/grid', 'ahmed\Daytour_Controller@All_Daytour_Events_Grid')->name('all.events.daytour.grid');
Route::get('search/daytour/grid/city/{id}', 'ahmed\Daytour_Controller@Daytour_By_City_Grid')->name('search.daytour.city.grid');
Route::get('search/daytour/grid/country/{id}', 'ahmed\Daytour_Controller@Daytour_By_Country_Grid')->name('search.daytour.country.grid');
Route::get('search/daytour/grid/category/{id}', 'ahmed\Daytour_Controller@Daytour_By_Category_Grid')->name('search.daytour.category.grid');
Route::get('search/daytour/grid/price/{min}/{max}', 'ahmed\Daytour_Controller@Daytour_By_Price_Grid')->name('search.daytour.price.grid');



// Pacakge Events LIST
Route::get('all/events/package', 'ahmed\Package_Controller@All_Package_Events')->name('all.events.package');
Route::get('search/package/city/{id}', 'ahmed\Package_Controller@Package_By_City')->name('search.package.city');
Route::get('search/package/country/{id}', 'ahmed\Package_Controller@Package_By_Country')->name('search.package.country');
Route::get('search/package/category/{id}', 'ahmed\Package_Controller@Package_By_Category')->name('search.package.category');
Route::get('search/package/price/{min}/{max}', 'ahmed\Package_Controller@Package_By_Price')->name('search.package.price');
// Pacakge Events GRID
Route::get('all/events/package/grid', 'ahmed\Package_Controller@All_Package_Events_Grid')->name('all.events.package.grid');
Route::get('search/package/grid/city/{id}', 'ahmed\Package_Controller@Package_By_City_Grid')->name('search.package.city.grid');
Route::get('search/package/grid/country/{id}', 'ahmed\Package_Controller@Package_By_Country_Grid')->name('search.package.country.grid');
Route::get('search/package/grid/category/{id}', 'ahmed\Package_Controller@Package_By_Category_Grid')->name('search.package.category.grid');
Route::get('search/package/grid/price/{min}/{max}', 'ahmed\Package_Controller@Package_By_Price_Grid')->name('search.package.price.grid');


// Transfer Events LIST
Route::get('all/events/transfer', 'ahmed\Transfer_Controller@All_Transfer_Events')->name('all.events.transfer');
Route::get('search/transfer/city/{id}', 'ahmed\Transfer_Controller@Transfer_By_City')->name('search.transfer.city');
Route::get('search/transfer/country/{id}', 'ahmed\Transfer_Controller@Transfer_By_Country')->name('search.transfer.country');
Route::get('search/transfer/category/{id}', 'ahmed\Transfer_Controller@Transfer_By_Category')->name('search.transfer.category');
Route::get('search/transfer/price/{min}/{max}', 'ahmed\Transfer_Controller@Transfer_By_Price')->name('search.transfer.price');
// Transfer Events GRID
Route::get('all/events/transfer/grid', 'ahmed\Transfer_Controller@All_Transfer_Events_Grid')->name('all.events.transfer.grid');
Route::get('search/transfer/grid/city/{id}', 'ahmed\Transfer_Controller@Transfer_By_City_Grid')->name('search.transfer.city.grid');
Route::get('search/transfer/grid/country/{id}', 'ahmed\Transfer_Controller@Transfer_By_Country_Grid')->name('search.transfer.country.grid');
Route::get('search/transfer/grid/category/{id}', 'ahmed\Transfer_Controller@Transfer_By_Category_Grid')->name('search.transfer.category.grid');
Route::get('search/transfer/grid/price/{min}/{max}', 'ahmed\Transfer_Controller@Transfer_By_Price_Grid')->name('search.transfer.price.grid');

//Book Now and search by id
Route::get('booknow/index', 'ahmed\Booknow_Controller@Index')->name('booknow.index');
Route::get('search/booknow/city/{id}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_City')->name('search.booknow.city');
Route::get('search/booknow/country/{id}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_Country')->name('search.booknow.country');
Route::get('search/booknow/category/{id}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_Category')->name('search.booknow.category');
Route::get('search/booknow/price/{min}/{max}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_Price')->name('search.booknow.price');
//Boonow seach by name
Route::get('search/booknow/categoryname/{name}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_CategoryName')->name('search.booknow.categoryname');
Route::get('search/booknow/cityname/{name}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_CityName')->name('search.booknow.citynamename');
Route::get('search/booknow/countryname/{name}/{tab}', 'ahmed\Booknow_Controller@Booknow_By_CountryName')->name('search.booknow.countryname');
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
