<?php

namespace App\Http\Controllers\ahmed;

use App\City;
use App\Country;
use App\Event_City;
use App\Event_Country;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class SearchController extends Controller {
	public function search_results(Request $request) {

		// $Poland              = DB::table('popularcities')->where('country', 'Poland')->limit('5')->get();
		// $Poland_cities       = (array) $Poland;
		// $CzechRepublic       = DB::table('popularcities')->where('country', 'Czech Republic')->limit('5')->get();
		// $CzechRepubliccities = (array) $CzechRepublic;
		// $Slovakia            = DB::table('popularcities')->where('country', 'Slovakia')->limit('5')->get();
		// $Slovakia_cities     = (array) $Slovakia;
		// $Austria             = DB::table('popularcities')->where('country', 'Austria')->limit('5')->get();
		// $Austria_cities      = (array) $Austria;
		// $Germany             = DB::table('popularcities')->where('country', 'Germany ')->limit('5')->get();
		// $Germany_cities      = (array) $Germany;
		// $France              = DB::table('popularcities')->where('country', 'France')->limit('5')->get();
		// $France_cities       = (array) $France;
		// $Switzerland         = DB::table('popularcities')->where('country', 'Switzerland')->limit('5')->get();
		// $Switzerland_cities  = (array) $Switzerland;
		// $Italy               = DB::table('popularcities')->where('country', 'Italy')->limit('5')->get();
		// $Italy_cities        = (array) $Italy;
		// $Slovenia            = DB::table('popularcities')->where('country', 'Slovenia')->limit('5')->get();
		// $Slovenia_cities     = (array) $Slovenia;
		// $Hungary             = DB::table('popularcities')->where('country', 'Hungary')->limit('5')->get();
		// $Hungary_cities      = (array) $Hungary;
		// $Croatia             = DB::table('popularcities')->where('country', 'Croatia')->limit('5')->get();
		// $Croatia_cities      = (array) $Croatia;

		//if value=1   => packages
		//if value=2   => daytours
		//if value=3   => activities
		//if value=4   => cruises
		//if value=5   => treansfers
		$packages;
		$type;
		$tags    = $request->input('myCountry');
		$options = $request->input('options');
		if ($options == '1') {
			$type = 'packages';
		}
		if ($options == '2') {
			$type = 'daytours';
		}
		if ($options == '3') {
			$type = 'activities';
		}
		if ($options == '4') {
			$type = 'cruises';
		}
		if ($options == '5') {
			$type = 'transfers';
		}
		//
		$Poland              = DB::table('popularcities')->where('country', 'Poland')->limit('5')->get();
		$Poland_cities       = (array) $Poland;
		$CzechRepublic       = DB::table('popularcities')->where('country', 'Czech Republic')->limit('5')->get();
		$CzechRepubliccities = (array) $CzechRepublic;
		$Slovakia            = DB::table('popularcities')->where('country', 'Slovakia')->limit('5')->get();
		$Slovakia_cities     = (array) $Slovakia;
		$Austria             = DB::table('popularcities')->where('country', 'Austria')->limit('5')->get();
		$Austria_cities      = (array) $Austria;
		$Germany             = DB::table('popularcities')->where('country', 'Germany ')->limit('5')->get();
		$Germany_cities      = (array) $Germany;
		$France              = DB::table('popularcities')->where('country', 'France')->limit('5')->get();
		$France_cities       = (array) $France;
		$Switzerland         = DB::table('popularcities')->where('country', 'Switzerland')->limit('5')->get();
		$Switzerland_cities  = (array) $Switzerland;
		$Italy               = DB::table('popularcities')->where('country', 'Italy')->limit('5')->get();
		$Italy_cities        = (array) $Italy;
		$Slovenia            = DB::table('popularcities')->where('country', 'Slovenia')->limit('5')->get();
		$Slovenia_cities     = (array) $Slovenia;
		$Hungary             = DB::table('popularcities')->where('country', 'Hungary')->limit('5')->get();
		$Hungary_cities      = (array) $Hungary;
		$Croatia             = DB::table('popularcities')->where('country', 'Croatia')->limit('5')->get();
		$Croatia_cities      = (array) $Croatia;
		//

		$packages = DB::table($type)
			->select(''.$type.'.*')
			->join('cities', 'cities.fkey', '=', ''.$type.'.id')
			->join('countries', 'countries.fkey', '=', ''.$type.'.id')
			->where('cities.name', 'LIKE', '%'.$tags.'%')
			->where('countries.name', 'LIKE', '%'.$tags.'%')
			->groupBy('cities.fkey', ''.$type.'.id')
			->paginate(3);
		// dd($packages);
		$icons = DB::table('package_icons')->get();

		return
		view('website/search-result')->with([
				'packages'            => $packages,
				'type'                => $type,
				'icons'               => $icons,
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

			]);

	}

	function cities_index() {
		$blogs = DB::table('blogs')->get();

		$Poland              = DB::table('popularcities')->where('country', 'Poland')->limit('5')->get();
		$Poland_cities       = (array) $Poland;
		$CzechRepublic       = DB::table('popularcities')->where('country', 'Czech Republic')->limit('5')->get();
		$CzechRepubliccities = (array) $CzechRepublic;
		$Slovakia            = DB::table('popularcities')->where('country', 'Slovakia')->limit('5')->get();
		$Slovakia_cities     = (array) $Slovakia;
		$Austria             = DB::table('popularcities')->where('country', 'Austria')->limit('5')->get();
		$Austria_cities      = (array) $Austria;
		$Germany             = DB::table('popularcities')->where('country', 'Germany ')->limit('5')->get();
		$Germany_cities      = (array) $Germany;
		$France              = DB::table('popularcities')->where('country', 'France')->limit('5')->get();
		$France_cities       = (array) $France;
		$Switzerland         = DB::table('popularcities')->where('country', 'Switzerland')->limit('5')->get();
		$Switzerland_cities  = (array) $Switzerland;
		$Italy               = DB::table('popularcities')->where('country', 'Italy')->limit('5')->get();
		$Italy_cities        = (array) $Italy;
		$Slovenia            = DB::table('popularcities')->where('country', 'Slovenia')->limit('5')->get();
		$Slovenia_cities     = (array) $Slovenia;
		$Hungary             = DB::table('popularcities')->where('country', 'Hungary')->limit('5')->get();
		$Hungary_cities      = (array) $Hungary;
		$Croatia             = DB::table('popularcities')->where('country', 'Croatia')->limit('5')->get();
		$Croatia_cities      = (array) $Croatia;

		$result = DB::table('popularcities')->limit('10')->get();
		$cities = (array) $result;
		return view('website/cities')->with(['cities' => $cities,
				'CzechRepubliccities'                       => $CzechRepubliccities,
				'Slovakia_cities'                           => $Slovakia_cities,
				'Italy_cities'                              => $Italy_cities,
				'Austria_cities'                            => $Austria_cities,
				'France_cities'                             => $France_cities,
				'Germany_cities'                            => $Germany_cities,
				'Switzerland_cities'                        => $Switzerland_cities,
				'Slovenia_cities'                           => $Slovenia_cities,
				'Hungary_cities'                            => $Hungary_cities,
				'Croatia_cities'                            => $Croatia_cities]);
	}

	public function showAllEvent() {

	}

	public function allEventsByCity($id) {
		$City  = Event_City::Find($id);
		$icons = DB::table('icons')->get();

		if ($City) {
			$All_Events_by_City = City::where('name', '=', $City->name)->first();

			if ($All_Events_by_City) {
				$All_Events = $All_Events_by_City->GetEventsbyCityName();
				// dd($All_Events->count());
				if ($All_Events->count() > 0) {
					$All_Events = $All_Events->paginate(6);
					return view('all_events/allEventsList', ['All_Events' => $All_Events, 'icons' => $icons, 'Search_Param' => $City, 'Display_Type' => 'list']);
				} else {
					return view('all_events/allEventsList', ['icons' => $icons, 'Search_Param' => $City, 'Display_Type' => 'list']);
				}

			} else {
				return view('all_events/allEventsList', ['icons' => $icons, 'Search_Param' => $City, 'Display_Type' => 'list']);
			}
		} else {
			return view('all_events/allEventsList', ['icons' => $icons, 'Search_Param' => $City, 'Display_Type' => 'list']);
		}

	}
	public function allEventsByCountry($id) {
		$Country = Event_Country::Find($id);
		$icons   = DB::table('icons')->get();
		// if country found
		if ($Country) {
			$All_Events_by_Country = Country::where('name', '=', $Country->name)->first();

			if ($All_Events_by_Country) {
				$All_Events = $All_Events_by_Country->GetEventsbyCountryName();
				if ($All_Events->count() > 0) {
					$All_Events = $All_Events->paginate(6);
					return view('all_events/allEventsList', ['All_Events' => $All_Events, 'icons' => $icons, 'Search_Param' => $Country, 'Display_Type' => 'list']);
				} else {
					return view('all_events/allEventsList', ['icons' => $icons, 'Search_Param' => $Country, 'Display_Type' => 'list']);
				}

			} else {
				return view('all_events/allEventsList', ['icons' => $icons, 'Search_Param' => $Country, 'Display_Type' => 'list']);
			}
		} else {
			return view('all_events/allEventsList', ['icons' => $icons, 'Search_Param' => $Country, 'Display_Type' => 'list']);
		}

	}
}
