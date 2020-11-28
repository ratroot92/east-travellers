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
        $Event_Cities = DB::table('event__cities')->groupby('name')->limit('5')->get();
        $Event_Countries = DB::table('event__countries')->groupby('name')->limit('5')->get();
        return view('website.index', [
            'data'              => $data,
            'Event_Cities'      => $Event_Cities,
            'Event_Countries'   => $Event_Countries,
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
Route::get('activities', 'ahmed\Activity_Controller@activities')->name('activity.packages');
Route::get('activity/detail/{id}', 'ahmed\Activity_Controller@ActivityDetails')->name('activity.detail');
//grid and list views
Route::get('activities/list', 'ahmed\Activity_Controller@listView')->name('activity.list');
//search of list (acvitites)

Route::get('activities/search', 'ahmed\Activity_Controller@search');
Route::get('activities/grid', 'ahmed\Activity_Controller@gridView')->name('activity.grid');
//search of grid(acvitites)
Route::get('activities/gridsearch/city/{city}', 'ahmed\Activity_Controller@grid_searchByCity');
Route::get('activities/gridsearch/country/{country}', 'ahmed\Activity_Controller@grid_searchByCountry');
Route::get('activities/gridsearch/category/{category}', 'ahmed\Activity_Controller@grid_searchByCategory');
Route::get('activities/gridsearch1/{price}', 'ahmed\Activity_Controller@grid_search1');
Route::get('activities/gridsearch2/{price}', 'ahmed\Activity_Controller@grid_search2');
Route::get('activities/gridsearch3/{price}', 'ahmed\Activity_Controller@grid_search3');
Route::get('activities/gridsearch4/{price}', 'ahmed\Activity_Controller@grid_search4');
Route::get('activities/gridsearch5/{price}', 'ahmed\Activity_Controller@grid_search5');
Route::get('activities/gridsearch', 'ahmed\Activity_Controller@grid_search');
Route::get('/activity/downloadPDF/{id}', 'ahmed\Activity_Controller@PDF');
Route::get('/activity/pdf', 'ahmed\Activity_Controller@returnpdf');
Route::get('/cityByCountry/{country}', 'ahmed\Activity_Controller@cityByCountry');
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
    Route::get('category/delete/{id}', 'ahmed\Activity_Controller@deletecategory')->middleware(SessionCheck::class);
    //
});
/*Activity Routes defined By Ahmad*/
Route::get('cruises', 'ahmed\Cruise_Controller@cruises')->name('cruise.packages');
Route::get('cruise/detail/{id}', 'ahmed\Cruise_Controller@CruiseDetails')->name('cruise.detail');
//grid and list views
Route::get('cruises/list', 'ahmed\Cruise_Controller@listView')->name('cruise.list');
//search of list (acvitites)
Route::get('cruises/customsearch/category/{category}', 'ahmed\Cruise_Controller@searchByCategory')->name('cruise.category');
Route::get('cruises/customsearch/city/{city}', 'ahmed\Cruise_Controller@searchByCity')->name('cruise.city');
Route::get('cruises/customsearch/category/{category}', 'ahmed\Cruise_Controller@searchByCategory');
Route::get('cruises/customsearch/country/{country}', 'ahmed\Cruise_Controller@searchByCountry');
Route::get('cruises/search1/{price}', 'ahmed\Cruise_Controller@search1');
Route::get('cruises/search2/{price}', 'ahmed\Cruise_Controller@search2');
Route::get('cruises/search3/{price}', 'ahmed\Cruise_Controller@search3');
Route::get('cruises/search4/{price}', 'ahmed\Cruise_Controller@search4');
Route::get('cruises/search5/{price}', 'ahmed\Cruise_Controller@search5');
Route::get('cruises/search', 'ahmed\Cruise_Controller@search');
Route::get('cruises/grid', 'ahmed\Cruise_Controller@gridView')->name('cruise.grid');
//search of grid(acvitites)
Route::get('cruises/gridsearch/city/{city}', 'ahmed\Cruise_Controller@grid_searchByCity');
Route::get('cruises/gridsearch/country/{country}', 'ahmed\Cruise_Controller@grid_searchByCountry');
Route::get('cruises/gridsearch/category/{category}', 'ahmed\Cruise_Controller@grid_searchByCategory');
Route::get('cruises/gridsearch1/{price}', 'ahmed\Cruise_Controller@grid_search1');
Route::get('cruises/gridsearch2/{price}', 'ahmed\Cruise_Controller@grid_search2');
Route::get('cruises/gridsearch3/{price}', 'ahmed\Cruise_Controller@grid_search3');
Route::get('cruises/gridsearch4/{price}', 'ahmed\Cruise_Controller@grid_search4');
Route::get('cruises/gridsearch5/{price}', 'ahmed\Cruise_Controller@grid_search5');
Route::get('cruises/gridsearch', 'ahmed\Cruise_Controller@grid_search');
Route::get('cruise/downloadPDF/{id}', 'ahmed\Cruise_Controller@PDF');
Route::get('cruise/pdf', 'ahmed\Cruise_Controller@returnpdf');
Route::get('cruise/cityByCountry/{country}', 'ahmed\Cruise_Controller@cityByCountry');
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
    Route::get('category/delete/{id}', 'ahmed\Cruise_Controller@deletecategory')->middleware(SessionCheck::class);
});
/*Cruise Routes defined By Ahmad*/
Route::get('transfers', 'ahmed\Transfer_Controller@transfers')->name('transfer.packages');
Route::get('transfers/detail/{id}', 'ahmed\Transfer_Controller@TransferDetails')->name('transfer.detail');
Route::get('transfers/grid', 'ahmed\Transfer_Controller@gridView')->name('transfer.grid');
//search of grid(acvitites)
Route::get('transfers/gridsearch/city/{city}', 'ahmed\Transfer_Controller@grid_searchByCity');
Route::get('transfers/gridsearch/country/{country}', 'ahmed\Transfer_Controller@grid_searchByCountry');
Route::get('transfers/gridsearch/category/{category}', 'ahmed\Transfer_Controller@grid_searchByCategory');
Route::get('transfers/gridsearch1/{price}', 'ahmed\Transfer_Controller@grid_search1');
Route::get('transfers/gridsearch2/{price}', 'ahmed\Transfer_Controller@grid_search2');
Route::get('transfers/gridsearch3/{price}', 'ahmed\Transfer_Controller@grid_search3');
Route::get('transfers/gridsearch4/{price}', 'ahmed\Transfer_Controller@grid_search4');
Route::get('transfers/gridsearch5/{price}', 'ahmed\Transfer_Controller@grid_search5');
Route::get('transfers/gridsearch', 'ahmed\Transfer_Controller@grid_search');
Route::get('transfers/list', 'ahmed\Transfer_Controller@listView')->name('transfer.list');
//search of list (acvitites)
Route::get('transfers/customsearch/city/{city}', 'ahmed\Transfer_Controller@searchByCity')->name('transfer.city');
Route::get('transfers/customsearch/country/{country}', 'ahmed\Transfer_Controller@searchByCountry');
Route::get('transfers/customsearch/category/{category}', 'ahmed\Transfer_Controller@searchByCategory');
Route::get('transfers/search1/{price}', 'ahmed\Transfer_Controller@search1');
Route::get('transfers/search2/{price}', 'ahmed\Transfer_Controller@search2');
Route::get('transfers/search3/{price}', 'ahmed\Transfer_Controller@search3');
Route::get('transfers/search4/{price}', 'ahmed\Transfer_Controller@search4');
Route::get('transfers/search5/{price}', 'ahmed\Transfer_Controller@search5');
Route::get('transfers/search', 'ahmed\Transfer_Controller@search');
Route::get('transfers/downloadPDF/{id}', 'ahmed\Transfer_Controller@PDF');
// Route::prefix('transfer')->group(function () {
// Route::get('view/', 'ahmed\Transfer_Controller@view')->name('transfer.view')->middleware(SessionCheck::class);
// Route::get('add/', 'ahmed\Transfer_Controller@add')->name('transfer.add')->middleware(SessionCheck::class);
// Route::post('insert/', 'ahmed\Transfer_Controller@insert')->name('transfer.insert')->middleware(SessionCheck::class);
// Route::get('/update/{id}', 'ahmed\Transfer_Controller@update')->name('transfer.update')->middleware(SessionCheck::class);
// Route::get('delete/{id}', 'ahmed\Transfer_Controller@delete')->name('transfer.delete')->middleware(SessionCheck::class);
// Route::post('edit', 'ahmed\Transfer_Controller@edit')->name('transfer.edit')->middleware(SessionCheck::class);
// Route::get('category', 'ahmed\Transfer_Controller@category')->name('transfer.category')->middleware(SessionCheck::class);
// Route::get('add/category', 'ahmed\Transfer_Controller@addcategory')->name('transfer.addcategory')->middleware(SessionCheck::class);
// Route::post('category/insert', 'ahmed\Transfer_Controller@insertcategory')->name('transfer.insertcategory')->middleware(SessionCheck::class);
// });
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
    Route::get('category/delete/{id}', 'ahmed\Transfer_Controller@deletecategory')->middleware(SessionCheck::class);
});
//packages
//grid and list views
Route::get('packages/list', 'ahmed\Package_Controller@listView')->name('package.list');
Route::get('packages/detail/{id}', 'ahmed\Package_Controller@PackageDetails')->name('package.detail');
//search of list (acvitites)
Route::get('packages/customsearch/city/{city}', 'ahmed\Package_Controller@searchByCity')->name('package.city');
Route::get('packages/customsearch/country/{country}', 'ahmed\Package_Controller@searchByCountry');
Route::get('packages/customsearch/category/{category}', 'ahmed\Package_Controller@searchByCategory');
Route::get('packages/search1/{price}', 'ahmed\Package_Controller@search1');
Route::get('packages/search2/{price}', 'ahmed\Package_Controller@search2');
Route::get('packages/search3/{price}', 'ahmed\Package_Controller@search3');
Route::get('packages/search4/{price}', 'ahmed\Package_Controller@search4');
Route::get('packages/search5/{price}', 'ahmed\Package_Controller@search5');
Route::get('packages/search', 'ahmed\Package_Controller@search');
Route::get('packages/grid', 'ahmed\Package_Controller@gridView')->name('package.grid');
//search of grid(acvitites)
Route::get('packages/gridsearch/city/{city}', 'ahmed\Package_Controller@grid_searchByCity');
Route::get('packages/gridsearch/country/{country}', 'ahmed\Package_Controller@grid_searchByCountry');
Route::get('packages/gridsearch/category/{category}', 'ahmed\Package_Controller@grid_searchByCategory');
Route::get('packages/gridsearch1/{price}', 'ahmed\Package_Controller@grid_search1');
Route::get('packages/gridsearch2/{price}', 'ahmed\Package_Controller@grid_search2');
Route::get('packages/gridsearch3/{price}', 'ahmed\Package_Controller@grid_search3');
Route::get('packages/gridsearch4/{price}', 'ahmed\Package_Controller@grid_search4');
Route::get('packages/gridsearch5/{price}', 'ahmed\Package_Controller@grid_search5');
Route::get('packages/gridsearch', 'ahmed\Package_Controller@grid_search');
Route::get('packages/downloadPDF/{id}', 'ahmed\Package_Controller@PDF');
/*package Routes defined By Ahmad*/
Route::prefix('package')->group(function () {
    Route::get('view/', 'ahmed\Package_Controller@view')->name('package.view')->middleware(SessionCheck::class);
    Route::get('add/', 'ahmed\Package_Controller@add')->name('package.add')->middleware(SessionCheck::class);
    Route::post('insert/', 'ahmed\Package_Controller@insert')->name('package.insert')->middleware(SessionCheck::class);
    Route::get('update/{id}', 'ahmed\Package_Controller@update')->name('package.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'ahmed\Package_Controller@delete')->name('package.delete')->middleware(SessionCheck::class);
    Route::post('edit', 'ahmed\Package_Controller@edit')->name('package.edit')->middleware(SessionCheck::class);
    Route::get('category', 'ahmed\Package_Controller@category')->name('package.category')->middleware(SessionCheck::class);
    Route::get('add/category', 'ahmed\Package_Controller@addcategory')->name('package.addcategory')->middleware(SessionCheck::class);
    Route::post('category/insert', 'ahmed\Package_Controller@insertcategory')->name('package.insertcategory')->middleware(SessionCheck::class);
    //
});
Route::get('packages', 'ahmed\Package_Controller@packages')->name('package.packages');
/*start sight viewing */
//grid and list views
Route::get('daytours/list', 'ahmed\Daytour_Controller@listView')->name('daytour.list');
//search of list (acvitites)
Route::get('daytours/customsearch/city/{city}', 'ahmed\Daytour_Controller@searchByCity')->name('daytour.city');
Route::get('daytours/customsearch/country/{country}', 'ahmed\Daytour_Controller@searchByCountry');
Route::get('daytours/customsearch/category/{category}', 'ahmed\Daytour_Controller@searchByCategory');
Route::get('daytours/search1/{price}', 'ahmed\Daytour_Controller@search1');
Route::get('daytours/search2/{price}', 'ahmed\Daytour_Controller@search2');
Route::get('daytours/search3/{price}', 'ahmed\Daytour_Controller@search3');
Route::get('daytours/search4/{price}', 'ahmed\Daytour_Controller@search4');
Route::get('daytours/search5/{price}', 'ahmed\Daytour_Controller@search5');
Route::get('daytours/search', 'ahmed\Daytour_Controller@search');
Route::get('daytours/grid', 'ahmed\Daytour_Controller@gridView')->name('daytour.grid');
//search of grid(acvitites)
Route::get('daytours/gridsearch/city/{city}', 'ahmed\Daytour_Controller@grid_searchByCity');
Route::get('daytours/gridsearch/country/{country}', 'ahmed\Daytour_Controller@grid_searchByCountry');
Route::get('daytours/gridsearch/category/{category}', 'ahmed\Daytour_Controller@grid_searchByCategory');
Route::get('daytours/gridsearch1/{price}', 'ahmed\Daytour_Controller@grid_search1');
Route::get('daytours/gridsearch2/{price}', 'ahmed\Daytour_Controller@grid_search2');
Route::get('daytours/gridsearch3/{price}', 'ahmed\Daytour_Controller@grid_search3');
Route::get('daytours/gridsearch4/{price}', 'ahmed\Daytour_Controller@grid_search4');
Route::get('daytours/gridsearch5/{price}', 'ahmed\Daytour_Controller@grid_search5');
Route::get('daytours/gridsearch', 'ahmed\Daytour_Controller@grid_search');
Route::get('daytours/downloadPDF/{id}', 'ahmed\Daytour_Controller@PDF');
/*package Routes defined By Ahmad*/
Route::prefix('daytour')->group(function () {
    Route::get('view/', 'ahmed\Daytour_Controller@view')->name('daytour.view')->middleware(SessionCheck::class);
    Route::get('add/', 'ahmed\Daytour_Controller@add')->name('daytour.add')->middleware(SessionCheck::class);
    Route::post('insert/', 'ahmed\Daytour_Controller@insert')->name('daytour.insert')->middleware(SessionCheck::class);
    Route::get('/update/{id}', 'ahmed\Daytour_Controller@update')->name('daytour.update')->middleware(SessionCheck::class);
    Route::get('delete/{id}', 'ahmed\Daytour_Controller@delete')->name('daytour.delete')->middleware(SessionCheck::class);
    Route::post('edit', 'ahmed\Daytour_Controller@edit')->name('daytour.edit')->middleware(SessionCheck::class);
    Route::get('category', 'ahmed\Daytour_Controller@category')->name('daytour.category')->middleware(SessionCheck::class);
    Route::get('add/category', 'ahmed\Daytour_Controller@addcategory')->name('daytour.addcategory')->middleware(SessionCheck::class);
    Route::post('category/insert', 'ahmed\Daytour_Controller@insertcategory')->name('daytour.insertcategory')->middleware(SessionCheck::class);
    Route::get('category/delete/{id}', 'ahmed\Daytour_Controller@deletecategory')->middleware(SessionCheck::class);
    //
});
Route::get('daytours', 'ahmed\Daytour_Controller@packages')->name('daytour.packages');
Route::get('daytour/detail/{id}', 'ahmed\Daytour_Controller@DaytourDetails')->name('daytour.detail');
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
    Mail::to('info@eastravels.com')->send(new App\Mail\SendMailable($object));
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
