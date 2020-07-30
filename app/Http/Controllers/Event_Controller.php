<?php

namespace App\Http\Controllers;

use App\All_Events;
use App\Event_Category;
use App\Event_Icons;
use App\Category_All__Events;
use App\City_All__Events;
use App\Country_All__Events;
use App\Event_City;
use App\Event_Country;
use App\File;
use App\Image;
use App\Package_Icon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Event_Controller extends Controller
{

	private $base_url;

	public function __construct()
	{

		$this->base_url = url('/');
	}
	public function viewAddEvent($action)
	{

		$countries_list    = DB::table('event__countries')->get();
		$events_categories = DB::table('event__categories')->groupby('name')->get();
		$event__cities     = DB::table('event__cities')->groupby('name')->get();
		$icons             = DB::table('event__icons')->get();
		$event_types       = array("Activity", "Cruise", "Daytour", "Transfer", "Package");
		// dd($countries_list);
		return view('all_events/addEvent', [
			'action'        => $action,
			'country_list'  => $countries_list,
			'packagecat'    => $events_categories,
			'icons'         => $icons,
			'event_types'   => $event_types,
			'event__cities' => $event__cities,
		]);
	}

	public function allEvents()
	{
		$All_Events = All_Events::PaginateAllEvents();
		return view('all_events/allEvents', ['All_Events' => $All_Events]);
	}

	public function viewupdateEvent($action, $id)
	{

		$Event             = All_Events::Find($id);
		$countries_list    = DB::table('event__countries')->get();
		$events_categories = DB::table('event__categories')->groupby('name')->get();
		$event__cities     = DB::table('event__cities')->groupby('name')->get();
		$icons             = DB::table('event__icons')->get();
		$event_types       = array("Activity", "Cruise", "Daytour", "Transfer", "Package");
		// dd($countries_list);
		return view('all_events/addEvent', [
			'action'        => $action,
			'country_list'  => $countries_list,
			'packagecat'    => $events_categories,
			'icons'         => $icons,
			'event_types'   => $event_types,
			'Event'         => $Event,
			'event__cities' => $event__cities,
		]);
	}

	public function addEvent(Request $request)
	{

		$input = $request->all();

		$New_Event              = new All_Events;
		$New_Event->event_type  = $request->input('event_type');
		$New_Event->event_name  = $request->input('name');
		$New_Event->description = $request->input('desc');
		$New_Event->discount    = $request->input('disc');
		$New_Event->price       = $request->input('price');
		$New_Event->event_type  = $request->input('event_type');
		$New_Event->inclusion   = $request->input('inclusion');
		$New_Event->exclusion   = $request->input('exclusion');
		$New_Event->code        = $request->input('code');
		$New_Event->duration    = $request->input('duration');
		// fill with actual later
		$New_Event->added_by = $request->input('startloc');
		//
		$New_Event->terms_conditions     = $request->input('terms');
		$New_Event->payment_policy       = $request->input('payment_policy');
		$New_Event->payment_methods      = $request->input('payment_methods');
		$New_Event->cancellation_policy  = $request->input('cancellation_policy');
		$New_Event->notes                = $request->input('notes');
		$New_Event->questions            = $request->input('questions');
		$New_Event->group_size           = $request->input('grpsize');
		$New_Event->tour_code            = $request->input('tourcode');
		$New_Event->destinations         = $request->input('destinations');
		$New_Event->start_location       = $request->input('startloc');
		$New_Event->end_location         = $request->input('endloc');
		$New_Event->tour_style           = $request->input('tourstyle');
		$New_Event->tour_language        = $request->input('tourlanguage');
		$New_Event->visa_info            = $request->input('visa_info');
		$New_Event->avalibility_details  = $request->input('avalibilitydetails');
		$New_Event->transport_details    = $request->input('tranportdetails');
		$New_Event->accomodation_details = $request->input('accomodationdetails');
		$New_Event->meals_details        = $request->input('mealdetails');
		$New_Event->guide_details        = $request->input('guidedetails');
		$New_Event->itinerary            = $request->input('itinerary');
		$New_Event->status               = $request->input('status');
		$New_Event->save();

		// MANT TO MANY CITIES
		$cities_arr = $request->input('city');
		$cities = Event_City::find($cities_arr);
		$New_Event->Event_Cities()->attach($cities);

		// MANT TO MANY COUNTRIES
		$countries_arr = $request->input('country');
		$countries = Event_Country::find($countries_arr);
		$New_Event->Event_Countries()->attach($countries);


		// MANT TO MANY CATEGORIES
		// $categories = $request->input('cat');
		$categories_arr = $request->input('cat');
		$categories = Event_Category::find($categories_arr);
		$New_Event->Event_Categories()->attach($categories);

		// MANT TO MANY ICONS
		$icons_arr = $request->input('icons');
		$icons = Event_Icons::find($icons_arr);
		$New_Event->Event_Icons()->attach($icons);

		// ONE TO MANY IMAAGES

		if ($images = $request->file('img')) {

			foreach ($images as $key => $img) {

				//SAVE IMAGE TO LOCAL SERVER
				$extension  = $img->getClientOriginalExtension();
				$image_name = time() . rand(1000, 9999) . "_." . $extension;
				$path       = public_path('/storage/Event_Images/');
				$img->move($path, $image_name);
				$img_path        = $this->base_url . '/public/storage/Event_Images/' . $image_name;
				$New_Image       = new Image;
				$New_Image->src  = $img_path;
				$New_Image->name = $image_name;
				$New_Image->of   = $New_Event->event_type;
				$New_Image->fkey = $New_Event->id;
				$New_Image->save();
				if ($key == 0) {
					$Update_NewEvent_Banner = All_Events::where('id', $New_Event->id)->update(['banner' => $img_path]);
				}
			}
		}

		//ONE TO MANY FILES
		// if ($files = $request->file('file')) {

		// 	foreach ($files as $key => $file) {

		// 		//SAVE FILE TO LOCAL SERVER
		// 		$extension = $file->getClientOriginalExtension();
		// 		$file_name = time().rand(1000, 9999)."_.".$extension;
		// 		$path      = public_path('/storage/Event_Files/');
		// 		$file->move($path, $file_name);
		// 		$file_path      = $this->base_url.'/public/storage/Event_Files/'.$file_name;
		// 		$New_File       = new File;
		// 		$New_File->src  = $file_path;
		// 		$New_File->name = $file_name;
		// 		$New_File->of   = $New_Event->event_type;
		// 		$New_File->fkey = $New_Event->id;
		// 		$New_File->save();
		// 	}
		// }

		return redirect()->back()->with('success', '' . $New_Event->event_type . ' added successfully ');
	}
	// END ADD EVENT

	// UPDATE EVENT
	public function updateEvent(Request $request)
	{

		$input       = $request->all();
		$server_name = $this->base_url;

		// DELETE COUNTRIES
		$Updateable_Event = All_Events::Find($request->input('event_id'));
		if ($Updateable_Event) {
			########################################
			// DELETE ALL FILES (ONE TO MANY )
			// UNLINK

			// UNLINK END
			$Updateable_Event->GET_Files()->delete();
			########################################
			// DELETE ALL IMAGES (ONE TO MANY )
			// UNLINK
			$All_Images = $Updateable_Event->GET_Images;
			if ($All_Images->count() > 0) {

				foreach ($All_Images as $img) {
					$db_path  = $img->src;
					$len      = strlen($this->base_url . "/");
					$new_path = substr($db_path, $len, strlen($db_path) - $len);

					if (strstr($server_name, 'localhost')) {
						$new_path = str_replace("public/", "", $new_path);
					}
					unlink($new_path);
				}
			}

			// UNLINK END
			$Updateable_Event->GET_Images()->delete();


			// UPDATE EVENT
			$Updateable_Event->update([
				'event_type'  => $request->input('event_type'),
				'event_name'  => $request->input('name'),
				'description' => $request->input('desc'),
				'discount'    => $request->input('disc'),
				'price'       => $request->input('price'),
				'event_type'  => $request->input('event_type'),
				'inclusion'   => $request->input('inclusion'),
				'exclusion'   => $request->input('exclusion'),
				'code'        => $request->input('code'),
				'duration'    => $request->input('duration'),
				// fill with actual later
				'added_by' => $request->input('startloc'),
				//
				'terms_conditions'     => $request->input('terms'),
				'payment_policy'       => $request->input('payment_policy'),
				'payment_methods'      => $request->input('payment_methods'),
				'cancellation_policy'  => $request->input('cancellation_policy'),
				'notes'                => $request->input('notes'),
				'questions'            => $request->input('questions'),
				'group_size'           => $request->input('grpsize'),
				'tour_code'            => $request->input('tourcode'),
				'destinations'         => $request->input('destinations'),
				'start_location'       => $request->input('startloc'),
				'end_location'         => $request->input('endloc'),
				'tour_style'           => $request->input('tourstyle'),
				'tour_language'        => $request->input('tourlanguage'),
				'visa_info'            => $request->input('visa_info'),
				'avalibility_details'  => $request->input('avalibilitydetails'),
				'transport_details'    => $request->input('tranportdetails'),
				'accomodation_details' => $request->input('accomodationdetails'),
				'meals_details'        => $request->input('mealdetails'),
				'guide_details'        => $request->input('guidedetails'),
				'itinerary'            => $request->input('itinerary'),
				'status'               => $request->input('status'),
			]);

			// MANT TO MANY CITIES
			$cities_arr = $request->input('city');
			$Delete_Old_Cities = $Updateable_Event->Event_Cities()->allRelatedIds()->toArray();

			$Updateable_Event->Event_Cities()->detach($Delete_Old_Cities);
			$cities = Event_City::find($cities_arr);
			$Updateable_Event->Event_Cities()->attach($cities);

			// MANT TO MANY COUNTRIES
			$countries_arr = $request->input('country');
			$Delete_Old_Countries = $Updateable_Event->Event_Countries()->allRelatedIds()->toArray();
			$Updateable_Event->Event_Countries()->detach($Delete_Old_Countries);
			$countries = Event_Country::find($countries_arr);
			$Updateable_Event->Event_Countries()->attach($countries);


			// MANT TO MANY CATEGORIES
			// $categories = $request->input('cat');
			$categories_arr = $request->input('cat');
			$Delete_Old_Categories = $Updateable_Event->Event_Categories()->allRelatedIds()->toArray();
			$Updateable_Event->Event_Categories()->detach($Delete_Old_Categories);
			$categories = Event_Category::find($categories_arr);
			$Updateable_Event->Event_Categories()->attach($categories);

			// MANT TO MANY ICONS
			$icons_arr = $request->input('icons');
			$Delete_Old_Icons = $Updateable_Event->Event_Icons()->allRelatedIds()->toArray();
			$Updateable_Event->Event_Icons()->detach($Delete_Old_Icons);
			$icons = Event_Icons::find($icons_arr);
			$Updateable_Event->Event_Icons()->attach($icons);

			// ONE TO MANY IMAAGES

			if ($images = $request->file('img')) {

				foreach ($images as $key => $img) {

					//SAVE IMAGE TO LOCAL SERVER
					$extension  = $img->getClientOriginalExtension();
					$image_name = time() . rand(1000, 9999) . "_." . $extension;
					$path       = public_path('/storage/Event_Images/');
					$img->move($path, $image_name);
					$img_path        = $this->base_url . '/public/storage/Event_Images/' . $image_name;
					$New_Image       = new Image;
					$New_Image->src  = $img_path;
					$New_Image->name = $image_name;
					$New_Image->of   = $Updateable_Event->event_type;
					$New_Image->fkey = $Updateable_Event->id;
					$New_Image->save();
					if ($key == 0) {
						$Update_NewEvent_Banner = All_Events::where('id', $Updateable_Event->id)->update(['banner' => $img_path]);
					}
				}
			}

			//ONE TO MANY FILES
			// if ($files = $request->file('file')) {

			// 	foreach ($files as $key => $file) {

			// 		//SAVE FILE TO LOCAL SERVER
			// 		$extension = $file->getClientOriginalExtension();
			// 		$file_name = time() . rand(1000, 9999) . "_." . $extension;
			// 		$path      = public_path('/storage/Event_Files/');
			// 		$file->move($path, $file_name);
			// 		$file_path      = $this->base_url . '/public/storage/Event_Files/' . $file_name;
			// 		$New_File       = new File;
			// 		$New_File->src  = $file_path;
			// 		$New_File->name = $file_name;
			// 		$New_File->of   = $Updateable_Event->event_type;
			// 		$New_File->fkey = $Updateable_Event->id;
			// 		$New_File->save();
			// 	}
			// }
			return redirect()->route('view.all.events')->with('success', 'Event Added Successfully');
		} else {
			return redirect()->route('view.all.events')->with('error', 'Failed to Add Event');
		}
	}

	// END UPDATE EVENT

	//DELETE EVENT START
	public function deleteEvent($id)
	{
		$server_name = $this->base_url;

		// DELETE COUNTRIES
		$Deleteable_Event = All_Events::Find($id);
		if ($Deleteable_Event) {
			########################################
			// DELETE ALL FILES (ONE TO MANY )
			// UNLINK
			$All_Files = $Deleteable_Event->GET_Files;
			if ($All_Files->count() > 0) {

				foreach ($All_Files as $fil) {
					$db_path  = $fil->src;
					$len      = strlen($this->base_url . "/");
					$new_path = substr($db_path, $len, strlen($db_path) - $len);

					if (strstr($server_name, 'localhost')) {
						$new_path = str_replace("public/", "", $new_path);
					}
					unlink($new_path);
				}
			}

			// UNLINK END
			$Deleteable_Event->GET_Files()->delete();
			########################################
			// DELETE ALL IMAGES (ONE TO MANY )
			// UNLINK
			$All_Images = $Deleteable_Event->GET_Images;
			if ($All_Images->count() > 0) {

				foreach ($All_Images as $img) {
					$db_path  = $img->src;
					$len      = strlen($this->base_url . "/");
					$new_path = substr($db_path, $len, strlen($db_path) - $len);

					if (strstr($server_name, 'localhost')) {
						$new_path = str_replace("public/", "", $new_path);
					}
					unlink($new_path);
				}
			}

			$Delete_Old_Cities = $Deleteable_Event->Event_Cities()->allRelatedIds()->toArray();
			$Deleteable_Event->Event_Cities()->detach($Delete_Old_Cities);

			$Delete_Old_Countries = $Deleteable_Event->Event_Countries()->allRelatedIds()->toArray();
			$Deleteable_Event->Event_Countries()->detach($Delete_Old_Countries);

			$Delete_Old_Categories = $Deleteable_Event->Event_Categories()->allRelatedIds()->toArray();
			$Deleteable_Event->Event_Categories()->detach($Delete_Old_Categories);

			$Delete_Old_Icons = $Deleteable_Event->Event_Icons()->allRelatedIds()->toArray();
			$Deleteable_Event->Event_Icons()->detach($Delete_Old_Icons);
		}
		$Deleteable_Event = $Deleteable_Event->delete();
		if ($Deleteable_Event) {
			return redirect()->route('view.all.events')->with('success', 'Successfully Deleted Event ');
		} else {
			return redirect()->route('view.all.events')->with('error', 'Failed To Delete Event');
		}
	}

	// END DELETE EVENT
	public function eventDetail($id)
	{
		$Event = All_Events::Find($id);
		return view('all_events/eventDetail', ['Event' => $Event]);
	}
	########################################
	########################################
	########################################
	//EVENT CITY START
	########################################
	########################################
	########################################
	public function viewAddCity($action)
	{
		if ($action == 'add') {
			return view('all_events/addEventCity', ['action' => $action]);
		}
	}

	public function addEventCity(Request $request)
	{

		$input                       = $request->all();
		$city_name                   = trim($request->input('name'));
		$New_Event_City              = new Event_City;
		$New_Event_City->name        = $city_name;
		$New_Event_City->description = $request->input('description');
		// $New_Event_City->for         = $request->input('for');
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_City/');
			$img->move($path, $image_name);
			$img_path              = $this->base_url . '/public/storage/Event_City/' . $image_name;
			$New_Event_City->image = $img_path;
		}

		$New_Event_City->save();
		return redirect()->route('view.all.cities');
	}

	// ALL EVENT CITIES\
	public function allEventCities()


	{
		$All_Event_Cities = Event_City::PaginateAllCities();
		return view('all_events/allEventCities', ['Event_Cities' => $All_Event_Cities]);
	}
	//UPDATE EVENT CITY
	public function viewupdateEventCity($action, $id)
	{
		$Event_City = Event_City::Find($id);
		return view('all_events/addEventCity', ['action' => $action, 'Event_City' => $Event_City]);
	}
	//UPDATE CITY POST
	public function updateEventCity(Request $request)
	{
		$input = $request->all();

		$Updateable_Event_City = Event_City::Find($request->input('id'));
		if ($Updateable_Event_City->image) {

			$db_path  = $Updateable_Event_City->image;
			$len      = strlen($this->base_url . "/");
			$new_path = substr($db_path, $len, strlen($db_path) - $len);
			// if (strstr($server_name, 'localhost')) {
			//  $new_path = str_replace("public/", "", $new_path);
			// }
			unlink($new_path);
		}
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_City/');
			$img->move($path, $image_name);
			$img_path = $this->base_url . '/public/storage/Event_City/' . $image_name;
			$Updateable_Event_City->update([
				'name' => $request->input('name'),
				'description'                        => $request->input('description'),
				'image'                              => $img_path,

			]);
			$Sync_City = $Updateable_Event_City->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_City->All_Events()->sync($Sync_City);
			return redirect()->route('view.all.cities');
		} else {
			$Updateable_Event_City->update([
				'name' => $request->input('name'),
				'description'                        => $request->input('description'),

			]);
			$Sync_City = $Updateable_Event_City->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_City->All_Events()->sync($Sync_City);
			return redirect()->route('view.all.cities');
		}
	}
	// UPDATE

	public function deleteEventCity($id)
	{
		$Deleteable_Event_City = Event_City::Find($id);
		if ($Deleteable_Event_City) {
			if ($Deleteable_Event_City->image) {

				$db_path  = $Deleteable_Event_City->image;
				$len      = strlen($this->base_url . "/");
				$new_path = substr($db_path, $len, strlen($db_path) - $len);
				// if (strstr($server_name, 'localhost')) {
				//  $new_path = str_replace("public/", "", $new_path);
				// }
				unlink($new_path);
				$Sync_City = $Deleteable_Event_City->All_Events()->allRelatedIds()->toArray();
				$Deleteable_Event_City->All_Events()->detach($Sync_City);
				$Deleteable_Event_City->delete();
				return redirect()->route('view.all.cities');
			}
		} else {
			return redirect()->route('view.all.cities');
		}
	}
	//END UDPATE EVENT CITY

	########################################
	########################################
	########################################
	//EVENT COUNTRY START
	########################################
	########################################
	########################################

	public function viewAddCountry($action)
	{

		if ($action == 'add') {
			return view('all_events/addEventCountry', ['action' => $action]);
		}
	}

	public function addEventCountry(Request $request)
	{

		$input                          = $request->all();
		$city_name                      = trim($request->input('name'));
		$New_Event_Country              = new Event_Country;
		$New_Event_Country->name        = $city_name;
		$New_Event_Country->description = $request->input('description');
		// $New_Event_Country->for         = $request->input('for');
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_Country/');
			$img->move($path, $image_name);
			$img_path                 = $this->base_url . '/public/storage/Event_Country/' . $image_name;
			$New_Event_Country->image = $img_path;
		}

		$New_Event_Country->save();
		return redirect()->route('view.all.countries');
	}
	//END ADD COUNTRY
	// ALL COUNTRIES
	public function allEventCountries()
	{
		$All_Event_Countries = Event_Country::PaginateAllCountries();
		return view('all_events/allEventCountries', ['Event_Country' => $All_Event_Countries]);
	}

	public function viewupdateEventCountry($action, $id)
	{
		$Event_Country = Event_Country::Find($id);
		return view('all_events/addEventCountry', ['action' => $action, 'Event_Country' => $Event_Country]);
		// END
	}

	public function updateEventCountry(Request $request)
	{
		$input = $request->all();

		$Updateable_Event_Country = Event_Country::Find($request->input('id'));
		if ($Updateable_Event_Country->image) {

			$db_path  = $Updateable_Event_Country->image;
			$len      = strlen($this->base_url . "/");
			$new_path = substr($db_path, $len, strlen($db_path) - $len);
			// if (strstr($server_name, 'localhost')) {
			//  $new_path = str_replace("public/", "", $new_path);
			// }
			unlink($new_path);
		}
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_Country/');
			$img->move($path, $image_name);
			$img_path = $this->base_url . '/public/storage/Event_Country/' . $image_name;
			$Updateable_Event_Country->update([
				'name' => $request->input('name'),
				'description'                           => $request->input('description'),
				'image'                                 => $img_path,

			]);
			$Sync_Country = $Updateable_Event_Country->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_Country->All_Events()->sync($Sync_Country);
			return redirect()->route('view.all.countries');
		} else {
			$Updateable_Event_Country->update([
				'name' => $request->input('name'),
				'description'                           => $request->input('description'),

			]);
			$Sync_Country = $Updateable_Event_Country->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_Country->All_Events()->sync($Sync_Country);
			return redirect()->route('view.all.countries');
		}
		// UPDATE
	}

	public function deleteEventCountry($id)
	{
		$Deleteable_Event_Country = Event_Country::Find($id);
		if ($Deleteable_Event_Country) {
			if ($Deleteable_Event_Country->image) {

				$db_path  = $Deleteable_Event_Country->image;
				$len      = strlen($this->base_url . "/");
				$new_path = substr($db_path, $len, strlen($db_path) - $len);
				// if (strstr($server_name, 'localhost')) {
				//  $new_path = str_replace("public/", "", $new_path);
				// }
				unlink($new_path);
				$Sync_Country = $Deleteable_Event_Country->All_Events()->allRelatedIds()->toArray();
				$Deleteable_Event_Country->All_Events()->detach($Sync_Country);
				$Deleteable_Event_Country->delete();
				return redirect()->route('view.all.countries');
			}
		} else {
			return redirect()->route('view.all.countries');
		}
	}
	//All Events by list
	public function listAllEvents()
	{
		$All_Events = All_Events::paginate(6);
		// $All_Events = $All_Events->paginate(6);
		$icons = DB::table('icons')->get();
		if ($All_Events) {
			return view('all_events/allEventsList', ['All_Events' => $All_Events, 'icons' => $icons]);
		}
	}

	//EVENT CATEGORIES VIEWS
	public function viewAddCategory($action)
	{
		return view('all_events/addEventCategory', ['action' => $action]);
	}

	public function addEventCategory(Request $request)
	{
		$input                          = $request->all();
		$Category_Name                      = trim($request->input('name'));
		$New_Event_Category              = new Event_Category;
		$New_Event_Category->name        = $Category_Name;
		$New_Event_Category->description = $request->input('description');
		// $New_Event_Category->for         = $request->input('for');
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_Category/');
			$img->move($path, $image_name);
			$img_path                 = $this->base_url . '/public/storage/Event_Category/' . $image_name;
			$New_Event_Category->image = $img_path;
		}

		$New_Event_Category->save();
		return redirect()->route('view.all.categories');
	}

	public function allEventCategories()
	{
		$All_Event_Categories = Event_Category::PaginateAllCategories();
		return view('all_events/allEventCategories', ['Event_Categories' => $All_Event_Categories]);
	}
	public function viewupdateEventCategory($action, $id)
	{
		$Event_Category = Event_Category::Find($id);
		return view('all_events/addEventCategory', ['action' => $action, 'Event_Category' => $Event_Category]);
	}
	public function updateEventCategory(Request $request)
	{
		$input = $request->all();

		$Updateable_Event_Category = Event_Category::Find($request->input('id'));
		if ($Updateable_Event_Category->image) {

			$db_path  = $Updateable_Event_Category->image;
			$len      = strlen($this->base_url . "/");
			$new_path = substr($db_path, $len, strlen($db_path) - $len);
			// if (strstr($server_name, 'localhost')) {
			//  $new_path = str_replace("public/", "", $new_path);
			// }
			unlink($new_path);
		}
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_Category/');
			$img->move($path, $image_name);
			$img_path = $this->base_url . '/public/storage/Event_Category/' . $image_name;
			$Updateable_Event_Category->update([
				'name' => $request->input('name'),
				'description'                           => $request->input('description'),
				'image'                                 => $img_path,

			]);
			$Sync_Category = $Updateable_Event_Category->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_Category->All_Events()->sync($Sync_Category);
			return redirect()->route('view.all.categories')->with('success', 'Event Category Updated Successfully ');
		} else {
			$Updateable_Event_Category->update([
				'name' => $request->input('name'),
				'description'                           => $request->input('description'),

			]);
			$Sync_Category = $Updateable_Event_Category->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_Category->All_Events()->sync($Sync_Category);
			return redirect()->route('view.all.categories')->with('success', 'Event Category Updated Successfully ');
		}
		// UPDATE
	}

	public function deleteEventCategory($id)
	{
		$Deleteable_Event_Category = Event_Category::Find($id);
		if ($Deleteable_Event_Category) {
			if ($Deleteable_Event_Category->image) {

				$db_path  = $Deleteable_Event_Category->image;
				$len      = strlen($this->base_url . "/");
				$new_path = substr($db_path, $len, strlen($db_path) - $len);
				// if (strstr($server_name, 'localhost')) {
				//  $new_path = str_replace("public/", "", $new_path);
				// }
				unlink($new_path);
				$Sync_Category = $Deleteable_Event_Category->All_Events()->allRelatedIds()->toArray();
				$Deleteable_Event_Category->All_Events()->detach($Sync_Category);
				$Deleteable_Event_Category->delete();
				return redirect()->route('view.all.categories')->with('success', 'Event Category Deleted Successfully ');;
			}
		} else {
			return redirect()->route('view.all.categories')->with('success', 'Failed to Delete Event Category  ');;
		}
	}
	// EVENTS ICONS VIEWS
	public function viewAddIcon($action)
	{

		return view('all_events/addEventIcons', ['action' => $action]);
	}
	public function addEventIcon(Request $request)
	{
		$input                          = $request->all();
		$Icon_Name                      = trim($request->input('name'));
		$New_Event_Icon              = new Event_Icons;
		$New_Event_Icon->name        = $Icon_Name;
		$New_Event_Icon->description = $request->input('description');
		// $New_Event_Icon->for         = $request->input('for');
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_Icons/');
			$img->move($path, $image_name);
			$img_path                 = $this->base_url . '/public/storage/Event_Icons/' . $image_name;
			$New_Event_Icon->image = $img_path;
		}

		$New_Event_Icon->save();
		return redirect()->route('view.all.icons');
	}

	public function allEventIcons()
	{
		$All_Event_Icons = Event_Icons::PaginateAllIcons();
		return view('all_events/allEventIcons', ['Event_Icons' => $All_Event_Icons]);
	}
	public function viewupdateEventIcon($action, $id)
	{
		$Event_Icons = Event_Icons::Find($id);
		return view('all_events/addEventIcons', ['action' => $action, 'Event_Icons' => $Event_Icons]);
	}
	public function updateEventIcon(Request $request)
	{
		$input = $request->all();

		$Updateable_Event_Icon = Event_Icons::Find($request->input('id'));
		if ($Updateable_Event_Icon->image) {

			$db_path  = $Updateable_Event_Icon->image;
			$len      = strlen($this->base_url . "/");
			$new_path = substr($db_path, $len, strlen($db_path) - $len);
			// if (strstr($server_name, 'localhost')) {
			//  $new_path = str_replace("public/", "", $new_path);
			// }
			unlink($new_path);
		}
		//SAVE IMAGE TO LOCAL SERVER
		if ($img = $request->file('image')) {

			$extension  = $img->getClientOriginalExtension();
			$image_name = time() . rand(1000, 9999) . "_." . $extension;
			$path       = public_path('/storage/Event_Icons/');
			$img->move($path, $image_name);
			$img_path = $this->base_url . '/public/storage/Event_Icons/' . $image_name;
			$Updateable_Event_Icon->update([
				'name' => $request->input('name'),
				'description'                           => $request->input('description'),
				'image'                                 => $img_path,

			]);
			$Sync_Icon = $Updateable_Event_Icon->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_Icon->All_Events()->sync($Sync_Icon);
			return redirect()->route('view.all.icons')->with('success', 'Event Icon Updated Successfully ');
		} else {
			$Updateable_Event_Icon->update([
				'name' => $request->input('name'),
				'description'                           => $request->input('description'),

			]);
			$Sync_Icon = $Updateable_Event_Icon->All_Events()->allRelatedIds()->toArray();
			$Updateable_Event_Icon->All_Events()->sync($Sync_Icon);
			return redirect()->route('view.all.icons')->with('success', 'Event Icon Updated Successfully ');
		}
		// UPDATE
	}

	public function deleteEventIcon($id)
	{
		$Deleteable_Event_Icon = Event_Icons::Find($id);


		if ($Deleteable_Event_Icon) {
			if ($Deleteable_Event_Icon->image) {

				$db_path  = $Deleteable_Event_Icon->image;
				$len      = strlen($this->base_url . "/");
				$new_path = substr($db_path, $len, strlen($db_path) - $len);
				// if (strstr($server_name, 'localhost')) {
				//  $new_path = str_replace("public/", "", $new_path);
				// }
				unlink($new_path);
				$Sync_Icons = $Deleteable_Event_Icon->All_Events()->allRelatedIds()->toArray();
				$Deleteable_Event_Icon->All_Events()->detach($Sync_Icons);
				$Deleteable_Event_Icon->delete();

				return redirect()->route('view.all.icons')->with('success', 'Event Icon Deleted Successfully ');;
			}
		} else {
			return redirect()->route('view.all.icons')->with('success', 'Failed to Delete Event Icon  ');;
		}
	}
}