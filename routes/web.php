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
		$result = DB::table('popularcities')->limit('10')->get();
		$cities = (array) $result;
		$Poland = DB::table('popularcities')->where('country', 'Poland')->limit('5')->get();
		$Poland_cities = (array) $Poland;
		$CzechRepublic = DB::table('popularcities')->where('country', 'Czech Republic')->limit('5')->get();
		$CzechRepubliccities = (array) $CzechRepublic;
		$Slovakia = DB::table('popularcities')->where('country', 'Slovakia')->limit('5')->get();
		$Slovakia_cities = (array) $Slovakia;
		$Austria = DB::table('popularcities')->where('country', 'Austria')->limit('5')->get();
		$Austria_cities = (array) $Austria;
		$Germany = DB::table('popularcities')->where('country', 'Germany ')->limit('5')->get();
		$Germany_cities = (array) $Germany;
		$France = DB::table('popularcities')->where('country', 'France')->limit('5')->get();
		$France_cities = (array) $France;
		$Switzerland = DB::table('popularcities')->where('country', 'Switzerland')->limit('5')->get();
		$Switzerland_cities = (array) $Switzerland;
		$Italy = DB::table('popularcities')->where('country', 'Italy')->limit('5')->get();
		$Italy_cities = (array) $Italy;
		$Slovenia = DB::table('popularcities')->where('country', 'Slovenia')->limit('5')->get();
		$Slovenia_cities = (array) $Slovenia;
		$Hungary = DB::table('popularcities')->where('country', 'Hungary')->limit('5')->get();
		$Hungary_cities = (array) $Hungary;
		$Croatia = DB::table('popularcities')->where('country', 'Croatia')->limit('5')->get();
		$Croatia_cities = (array) $Croatia;
		$activities_search = DB::table('activities')->limit('5')->get();
		$cruises_search = DB::table('cruises')->limit('5')->get();
		$daytours_search = DB::table('daytours')->limit('5')->get();
		$result1 = DB::table('packages')->limit('3')->get();
		$packages = (array) $result1;
		$result2 = DB::table('daytours')->limit('3')->get();
		$daytours = (array) $result2;
		return view('website.index', [
			'data'                => $data,
			'Poland_cities'       => $Poland_cities,
			'CzechRepubliccities' => $CzechRepubliccities,
			'Slovakia_cities'     => $Slovakia_cities,
			'Italy_cities'        => $Italy_cities,
			'Austria_cities'      => $Austria_cities,
			'France_cities'       => $France_cities,
			'Germany_cities'      => $Germany_cities,
			'Switzerland_cities'  => $Switzerland_cities,
			'Slovenia_cities'     => $Slovenia_cities,
			'Hungary_cities'      => $Hungary_cities,
			'Croatia_cities'      => $Croatia_cities,
			'cities'              => $cities,
			'packages'            => $packages,
			'activities_search'   => $activities_search,
			'cruises_search'      => $cruises_search,
			'daytours_search'     => $daytours_search,
			'daytours'            => $daytours
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
//activities
Route::get('activities', 'ahmed\activity_controller@activities')->name('activity.packages');
Route::get('activity/detail/{id}', 'ahmed\activity_controller@ActivityDetails')->name('activity.detail');
//grid and list views
Route::get('activities/list', 'ahmed\activity_controller@listView')->name('activity.list');
//search of list (acvitites)
Route::get('activities/customsearch/category/{category}', 'ahmed\activity_controller@searchByCategory')->name('activity.category');
Route::get('activities/customsearch/city/{city}', 'ahmed\activity_controller@searchByCity')->name('activity.city');
Route::get('activities/customsearch/country/{country}', 'ahmed\activity_controller@searchByCountry');
Route::get('activities/search1/{price}', 'ahmed\activity_controller@search1');
Route::get('activities/search2/{price}', 'ahmed\activity_controller@search2');
Route::get('activities/search3/{price}', 'ahmed\activity_controller@search3');
Route::get('activities/search4/{price}', 'ahmed\activity_controller@search4');
Route::get('activities/search5/{price}', 'ahmed\activity_controller@search5');
Route::get('activities/search', 'ahmed\activity_controller@search');
Route::get('activities/grid', 'ahmed\activity_controller@gridView')->name('activity.grid');
//search of grid(acvitites)
Route::get('activities/gridsearch/city/{city}', 'ahmed\activity_controller@grid_searchByCity');
Route::get('activities/gridsearch/country/{country}', 'ahmed\activity_controller@grid_searchByCountry');
Route::get('activities/gridsearch/category/{category}', 'ahmed\activity_controller@grid_searchByCategory');
Route::get('activities/gridsearch1/{price}', 'ahmed\activity_controller@grid_search1');
Route::get('activities/gridsearch2/{price}', 'ahmed\activity_controller@grid_search2');
Route::get('activities/gridsearch3/{price}', 'ahmed\activity_controller@grid_search3');
Route::get('activities/gridsearch4/{price}', 'ahmed\activity_controller@grid_search4');
Route::get('activities/gridsearch5/{price}', 'ahmed\activity_controller@grid_search5');
Route::get('activities/gridsearch', 'ahmed\activity_controller@grid_search');
Route::get('/activity/downloadPDF/{id}', 'ahmed\activity_controller@PDF');
Route::get('/activity/pdf', 'ahmed\activity_controller@returnpdf');
Route::get('/cityByCountry/{country}', 'ahmed\activity_controller@cityByCountry');
/*Activity Routes defined By Ahmad*/
Route::prefix('activity')->group(function () {
	Route::get('view/', 'ahmed\activity_controller@view')->name('activity.view')->middleware(SessionCheck::class);
	Route::get('add/', 'ahmed\activity_controller@add')->name('activity.add')->middleware(SessionCheck::class);
	Route::post('insert/', 'ahmed\activity_controller@insert')->name('activity.insert')->middleware(SessionCheck::class);
	Route::get('/update/{id}', 'ahmed\activity_controller@update')->name('activity.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'ahmed\activity_controller@delete')->name('activity.delete')->middleware(SessionCheck::class);
	Route::post('edit', 'ahmed\activity_controller@edit')->name('activity.edit')->middleware(SessionCheck::class);
	Route::get('category', 'ahmed\activity_controller@category')->name('activity.category')->middleware(SessionCheck::class);
	Route::get('add/category', 'ahmed\activity_controller@addcategory')->name('activity.addcategory')->middleware(SessionCheck::class);
	Route::post('category/insert', 'ahmed\activity_controller@insertcategory')->name('activity.insertcategory')->middleware(SessionCheck::class);
	Route::get('category/delete/{id}', 'ahmed\activity_controller@deletecategory')->middleware(SessionCheck::class);
	//
});
/*Activity Routes defined By Ahmad*/
Route::get('cruises', 'ahmed\cruise_controller@cruises')->name('cruise.packages');
Route::get('cruise/detail/{id}', 'ahmed\cruise_controller@CruiseDetails')->name('cruise.detail');
//grid and list views
Route::get('cruises/list', 'ahmed\cruise_controller@listView')->name('cruise.list');
//search of list (acvitites)
Route::get('cruises/customsearch/category/{category}', 'ahmed\cruise_controller@searchByCategory')->name('cruise.category');
Route::get('cruises/customsearch/city/{city}', 'ahmed\cruise_controller@searchByCity')->name('cruise.city');
Route::get('cruises/customsearch/category/{category}', 'ahmed\cruise_controller@searchByCategory');
Route::get('cruises/customsearch/country/{country}', 'ahmed\cruise_controller@searchByCountry');
Route::get('cruises/search1/{price}', 'ahmed\cruise_controller@search1');
Route::get('cruises/search2/{price}', 'ahmed\cruise_controller@search2');
Route::get('cruises/search3/{price}', 'ahmed\cruise_controller@search3');
Route::get('cruises/search4/{price}', 'ahmed\cruise_controller@search4');
Route::get('cruises/search5/{price}', 'ahmed\cruise_controller@search5');
Route::get('cruises/search', 'ahmed\cruise_controller@search');
Route::get('cruises/grid', 'ahmed\cruise_controller@gridView')->name('cruise.grid');
//search of grid(acvitites)
Route::get('cruises/gridsearch/city/{city}', 'ahmed\cruise_controller@grid_searchByCity');
Route::get('cruises/gridsearch/country/{country}', 'ahmed\cruise_controller@grid_searchByCountry');
Route::get('cruises/gridsearch/category/{category}', 'ahmed\cruise_controller@grid_searchByCategory');
Route::get('cruises/gridsearch1/{price}', 'ahmed\cruise_controller@grid_search1');
Route::get('cruises/gridsearch2/{price}', 'ahmed\cruise_controller@grid_search2');
Route::get('cruises/gridsearch3/{price}', 'ahmed\cruise_controller@grid_search3');
Route::get('cruises/gridsearch4/{price}', 'ahmed\cruise_controller@grid_search4');
Route::get('cruises/gridsearch5/{price}', 'ahmed\cruise_controller@grid_search5');
Route::get('cruises/gridsearch', 'ahmed\cruise_controller@grid_search');
Route::get('cruise/downloadPDF/{id}', 'ahmed\cruise_controller@PDF');
Route::get('cruise/pdf', 'ahmed\cruise_controller@returnpdf');
Route::get('cruise/cityByCountry/{country}', 'ahmed\cruise_controller@cityByCountry');
/*Cruise Routes defined By Ahmad*/
Route::prefix('cruise')->group(function () {
	Route::get('view/', 'ahmed\cruise_controller@view')->name('cruise.view')->middleware(SessionCheck::class);
	Route::get('add/', 'ahmed\cruise_controller@add')->name('cruise.add')->middleware(SessionCheck::class);
	Route::post('insert/', 'ahmed\cruise_controller@insert')->name('cruise.insert')->middleware(SessionCheck::class);
	Route::get('/update/{id}', 'ahmed\cruise_controller@update')->name('cruise.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'ahmed\cruise_controller@delete')->name('cruise.delete')->middleware(SessionCheck::class);
	Route::post('edit', 'ahmed\cruise_controller@edit')->name('cruise.edit')->middleware(SessionCheck::class);
	Route::get('category', 'ahmed\cruise_controller@category')->name('cruise.category')->middleware(SessionCheck::class);
	Route::get('add/category', 'ahmed\cruise_controller@addcategory')->name('cruise.addcategory')->middleware(SessionCheck::class);
	Route::post('category/insert', 'ahmed\cruise_controller@insertcategory')->name('cruise.insertcategory')->middleware(SessionCheck::class);
	Route::get('category/delete/{id}', 'ahmed\cruise_controller@deletecategory')->middleware(SessionCheck::class);
});
/*Cruise Routes defined By Ahmad*/
Route::get('transfers', 'ahmed\transfer_controller@transfers')->name('transfer.packages');
Route::get('transfers/detail/{id}', 'ahmed\transfer_controller@TransferDetails')->name('transfer.detail');
Route::get('transfers/grid', 'ahmed\transfer_controller@gridView')->name('transfer.grid');
//search of grid(acvitites)
Route::get('transfers/gridsearch/city/{city}', 'ahmed\transfer_controller@grid_searchByCity');
Route::get('transfers/gridsearch/country/{country}', 'ahmed\transfer_controller@grid_searchByCountry');
Route::get('transfers/gridsearch/category/{category}', 'ahmed\transfer_controller@grid_searchByCategory');
Route::get('transfers/gridsearch1/{price}', 'ahmed\transfer_controller@grid_search1');
Route::get('transfers/gridsearch2/{price}', 'ahmed\transfer_controller@grid_search2');
Route::get('transfers/gridsearch3/{price}', 'ahmed\transfer_controller@grid_search3');
Route::get('transfers/gridsearch4/{price}', 'ahmed\transfer_controller@grid_search4');
Route::get('transfers/gridsearch5/{price}', 'ahmed\transfer_controller@grid_search5');
Route::get('transfers/gridsearch', 'ahmed\transfer_controller@grid_search');
Route::get('transfers/list', 'ahmed\transfer_controller@listView')->name('transfer.list');
//search of list (acvitites)
Route::get('transfers/customsearch/city/{city}', 'ahmed\transfer_controller@searchByCity')->name('transfer.city');
Route::get('transfers/customsearch/country/{country}', 'ahmed\transfer_controller@searchByCountry');
Route::get('transfers/customsearch/category/{category}', 'ahmed\transfer_controller@searchByCategory');
Route::get('transfers/search1/{price}', 'ahmed\transfer_controller@search1');
Route::get('transfers/search2/{price}', 'ahmed\transfer_controller@search2');
Route::get('transfers/search3/{price}', 'ahmed\transfer_controller@search3');
Route::get('transfers/search4/{price}', 'ahmed\transfer_controller@search4');
Route::get('transfers/search5/{price}', 'ahmed\transfer_controller@search5');
Route::get('transfers/search', 'ahmed\transfer_controller@search');
Route::get('transfers/downloadPDF/{id}', 'ahmed\transfer_controller@PDF');
// Route::prefix('transfer')->group(function () {
// Route::get('view/', 'ahmed\transfer_controller@view')->name('transfer.view')->middleware(SessionCheck::class);
// Route::get('add/', 'ahmed\transfer_controller@add')->name('transfer.add')->middleware(SessionCheck::class);
// Route::post('insert/', 'ahmed\transfer_controller@insert')->name('transfer.insert')->middleware(SessionCheck::class);
// Route::get('/update/{id}', 'ahmed\transfer_controller@update')->name('transfer.update')->middleware(SessionCheck::class);
// Route::get('delete/{id}', 'ahmed\transfer_controller@delete')->name('transfer.delete')->middleware(SessionCheck::class);
// Route::post('edit', 'ahmed\transfer_controller@edit')->name('transfer.edit')->middleware(SessionCheck::class);
// Route::get('category', 'ahmed\transfer_controller@category')->name('transfer.category')->middleware(SessionCheck::class);
// Route::get('add/category', 'ahmed\transfer_controller@addcategory')->name('transfer.addcategory')->middleware(SessionCheck::class);
// Route::post('category/insert', 'ahmed\transfer_controller@insertcategory')->name('transfer.insertcategory')->middleware(SessionCheck::class);
// });
Route::prefix('transfer')->group(function () {
	Route::get('view/', 'ahmed\transfer_controller@view')->name('transfer.view')->middleware(SessionCheck::class);
	Route::get('add/', 'ahmed\transfer_controller@add')->name('transfer.add')->middleware(SessionCheck::class);
	Route::post('insert/', 'ahmed\transfer_controller@insert')->name('transfer.insert')->middleware(SessionCheck::class);
	Route::get('/update/{id}', 'ahmed\transfer_controller@update')->name('transfer.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'ahmed\transfer_controller@delete')->name('transfer.delete')->middleware(SessionCheck::class);
	Route::post('edit', 'ahmed\transfer_controller@edit')->name('transfer.edit')->middleware(SessionCheck::class);
	Route::get('category', 'ahmed\transfer_controller@category')->name('transfer.category')->middleware(SessionCheck::class);
	Route::get('add/category', 'ahmed\transfer_controller@addcategory')->name('transfer.addcategory')->middleware(SessionCheck::class);
	Route::post('category/insert', 'ahmed\transfer_controller@insertcategory')->name('transfer.insertcategory')->middleware(SessionCheck::class);
	Route::get('category/delete/{id}', 'ahmed\transfer_controller@deletecategory')->middleware(SessionCheck::class);
});
//packages
//grid and list views
Route::get('packages/list', 'ahmed\package_controller@listView')->name('package.list');
Route::get('packages/detail/{id}', 'ahmed\package_controller@PackageDetails')->name('package.detail');
//search of list (acvitites)
Route::get('packages/customsearch/city/{city}', 'ahmed\package_controller@searchByCity')->name('package.city');
Route::get('packages/customsearch/country/{country}', 'ahmed\package_controller@searchByCountry');
Route::get('packages/customsearch/category/{category}', 'ahmed\package_controller@searchByCategory');
Route::get('packages/search1/{price}', 'ahmed\package_controller@search1');
Route::get('packages/search2/{price}', 'ahmed\package_controller@search2');
Route::get('packages/search3/{price}', 'ahmed\package_controller@search3');
Route::get('packages/search4/{price}', 'ahmed\package_controller@search4');
Route::get('packages/search5/{price}', 'ahmed\package_controller@search5');
Route::get('packages/search', 'ahmed\package_controller@search');
Route::get('packages/grid', 'ahmed\package_controller@gridView')->name('package.grid');
//search of grid(acvitites)
Route::get('packages/gridsearch/city/{city}', 'ahmed\package_controller@grid_searchByCity');
Route::get('packages/gridsearch/country/{country}', 'ahmed\package_controller@grid_searchByCountry');
Route::get('packages/gridsearch/category/{category}', 'ahmed\package_controller@grid_searchByCategory');
Route::get('packages/gridsearch1/{price}', 'ahmed\package_controller@grid_search1');
Route::get('packages/gridsearch2/{price}', 'ahmed\package_controller@grid_search2');
Route::get('packages/gridsearch3/{price}', 'ahmed\package_controller@grid_search3');
Route::get('packages/gridsearch4/{price}', 'ahmed\package_controller@grid_search4');
Route::get('packages/gridsearch5/{price}', 'ahmed\package_controller@grid_search5');
Route::get('packages/gridsearch', 'ahmed\package_controller@grid_search');
Route::get('packages/downloadPDF/{id}', 'ahmed\package_controller@PDF');
/*package Routes defined By Ahmad*/
Route::prefix('package')->group(function () {
	Route::get('view/', 'ahmed\package_controller@view')->name('package.view')->middleware(SessionCheck::class);
	Route::get('add/', 'ahmed\package_controller@add')->name('package.add')->middleware(SessionCheck::class);
	Route::post('insert/', 'ahmed\package_controller@insert')->name('package.insert')->middleware(SessionCheck::class);
	Route::get('update/{id}', 'ahmed\package_controller@update')->name('package.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'ahmed\package_controller@delete')->name('package.delete')->middleware(SessionCheck::class);
	Route::post('edit', 'ahmed\package_controller@edit')->name('package.edit')->middleware(SessionCheck::class);
	Route::get('category', 'ahmed\package_controller@category')->name('package.category')->middleware(SessionCheck::class);
	Route::get('add/category', 'ahmed\package_controller@addcategory')->name('package.addcategory')->middleware(SessionCheck::class);
	Route::post('category/insert', 'ahmed\package_controller@insertcategory')->name('package.insertcategory')->middleware(SessionCheck::class);
	//
});
Route::get('packages', 'ahmed\package_controller@packages')->name('package.packages');
/*start sight viewing */
//grid and list views
Route::get('daytours/list', 'ahmed\daytour_controller@listView')->name('daytour.list');
//search of list (acvitites)
Route::get('daytours/customsearch/city/{city}', 'ahmed\daytour_controller@searchByCity')->name('daytour.city');
Route::get('daytours/customsearch/country/{country}', 'ahmed\daytour_controller@searchByCountry');
Route::get('daytours/customsearch/category/{category}', 'ahmed\daytour_controller@searchByCategory');
Route::get('daytours/search1/{price}', 'ahmed\daytour_controller@search1');
Route::get('daytours/search2/{price}', 'ahmed\daytour_controller@search2');
Route::get('daytours/search3/{price}', 'ahmed\daytour_controller@search3');
Route::get('daytours/search4/{price}', 'ahmed\daytour_controller@search4');
Route::get('daytours/search5/{price}', 'ahmed\daytour_controller@search5');
Route::get('daytours/search', 'ahmed\daytour_controller@search');
Route::get('daytours/grid', 'ahmed\daytour_controller@gridView')->name('daytour.grid');
//search of grid(acvitites)
Route::get('daytours/gridsearch/city/{city}', 'ahmed\daytour_controller@grid_searchByCity');
Route::get('daytours/gridsearch/country/{country}', 'ahmed\daytour_controller@grid_searchByCountry');
Route::get('daytours/gridsearch/category/{category}', 'ahmed\daytour_controller@grid_searchByCategory');
Route::get('daytours/gridsearch1/{price}', 'ahmed\daytour_controller@grid_search1');
Route::get('daytours/gridsearch2/{price}', 'ahmed\daytour_controller@grid_search2');
Route::get('daytours/gridsearch3/{price}', 'ahmed\daytour_controller@grid_search3');
Route::get('daytours/gridsearch4/{price}', 'ahmed\daytour_controller@grid_search4');
Route::get('daytours/gridsearch5/{price}', 'ahmed\daytour_controller@grid_search5');
Route::get('daytours/gridsearch', 'ahmed\daytour_controller@grid_search');
Route::get('daytours/downloadPDF/{id}', 'ahmed\daytour_controller@PDF');
/*package Routes defined By Ahmad*/
Route::prefix('daytour')->group(function () {
	Route::get('view/', 'ahmed\daytour_controller@view')->name('daytour.view')->middleware(SessionCheck::class);
	Route::get('add/', 'ahmed\daytour_controller@add')->name('daytour.add')->middleware(SessionCheck::class);
	Route::post('insert/', 'ahmed\daytour_controller@insert')->name('daytour.insert')->middleware(SessionCheck::class);
	Route::get('/update/{id}', 'ahmed\daytour_controller@update')->name('daytour.update')->middleware(SessionCheck::class);
	Route::get('delete/{id}', 'ahmed\daytour_controller@delete')->name('daytour.delete')->middleware(SessionCheck::class);
	Route::post('edit', 'ahmed\daytour_controller@edit')->name('daytour.edit')->middleware(SessionCheck::class);
	Route::get('category', 'ahmed\daytour_controller@category')->name('daytour.category')->middleware(SessionCheck::class);
	Route::get('add/category', 'ahmed\daytour_controller@addcategory')->name('daytour.addcategory')->middleware(SessionCheck::class);
	Route::post('category/insert', 'ahmed\daytour_controller@insertcategory')->name('daytour.insertcategory')->middleware(SessionCheck::class);
	Route::get('category/delete/{id}', 'ahmed\daytour_controller@deletecategory')->middleware(SessionCheck::class);
	//
});
Route::get('daytours', 'ahmed\daytour_controller@packages')->name('daytour.packages');
Route::get('daytour/detail/{id}', 'ahmed\daytour_controller@DaytourDetails')->name('daytour.detail');
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
/*
Route::prefix('sightseeing')->group(function () {
Route::get('get', 'Sightseeing_Controller@index')->name('sightseeing.get')->middleware(SessionCheck::class);
Route::get('/create_update/{action}/{id}', 'Sightseeing_Controller@create_edit')->name('sightseeing.create')->middleware(SessionCheck::class);
Route::get('create_update/{action}/{id}', 'Sightseeing_Controller@create_edit')->name('sightseeing.edit')->middleware(SessionCheck::class);
Route::post('store/{id}', 'Sightseeing_Controller@store_update')->name('sightseeing.store')->middleware(SessionCheck::class);
Route::post('update/{id}', 'Sightseeing_Controller@store_update')->name('sightseeing.update')->middleware(SessionCheck::class);
Route::get('delete/{id}', 'Sightseeing_Controller@delete')->name('sightseeing.delete')->middleware(SessionCheck::class);
});
 */
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
/*Cruise Routes defined By Ahmad*/
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
/*book now page routes*/
Route::get('/booknow', 'ahmed\BookNowController@index')->name('booknow');
Route::get('/booknow/list/city/{city}/{type}', 'ahmed\BookNowController@list_city')->name('booknow.list.city');
Route::get('/booknow/list/category/{category}/{type}', 'ahmed\BookNowController@list_category')->name('booknow.list.category');

Route::get('/booknow/list/country/{country}/{type}', 'ahmed\BookNowController@list_country')->name('booknow.list.country');
Route::get('/booknow/all_packages', 'ahmed\BookNowController@all_packages')->name('all_packages');
Route::get('/booknow/all_activities', 'ahmed\BookNowController@all_activities')->name('all_activities');
Route::get('/booknow/all_cruises', 'ahmed\BookNowController@all_cruises')->name('all_cruises');
Route::get('/booknow/all_transfers', 'ahmed\BookNowController@all_transfers')->name('all_transfers');
Route::get('/booknow/all_daytours', 'ahmed\BookNowController@all_daytours')->name('all_daytours');
Route::get('/booknow/grid', 'ahmed\BookNowController@index_grid')->name('booknow.grid');
//end book now routes

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
Route::get('event_detail/{id}', 'Event_Controller@eventDetail')->name('event.detail')->middleware(SessionCheck::class);