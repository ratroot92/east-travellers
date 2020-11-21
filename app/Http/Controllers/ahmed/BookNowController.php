<?php

namespace App\Http\Controllers\ahmed;

use App;
use App\Http\Controllers\Controller;
use DB;

class BookNowController extends Controller {

	public function index() {
		$activities = DB::table('activities')->paginate(3);
		$cruises    = DB::table('cruises')->paginate(3);
		$daytours   = DB::table('daytours')->paginate(3);
		$transfers  = DB::table('transfers')->paginate(3);
		$packages   = DB::table('packages')->paginate(3);
		$icons      = DB::table('package_icons')->paginate(3);
		return view('booknow/index')->with([
				'activities' => $activities,
				'cruises'    => $cruises,
				'daytours'   => $daytours,
				'transfers'  => $transfers,
				'packages'   => $packages,
				'icons'      => $icons,

			]);

	}

	public function all_packages() {
		$packages = DB::table('packages')->paginate(3);
		$icons    = DB::table('package_icons')->get();
		//cities from DB
		$cities = DB::table('cities')->where('of', '=', 'package')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		// dd($cities);
		$more_cities     = DB::table('cities')->where('of', '=', 'package')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_cities      = [];
		$arr_more_cities = [];
		foreach ($cities as $counter => $city) {
			$arr_cities[$counter] = $city->name;
		}
		foreach ($more_cities as $counter => $city) {
			$arr_more_cities[$counter] = $city->name;
		}
		$cities      = $arr_cities;
		$more_cities = array_diff($arr_more_cities, $arr_cities);

		//countries from DB
		$countries          = DB::table('countries')->where('of', '=', 'package')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_countries     = DB::table('countries')->where('of', '=', 'package')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_countries      = [];
		$arr_more_countries = [];
		foreach ($countries as $counter => $country) {
			$arr_countries[$counter] = $country->name;
		}
		foreach ($more_countries as $counter => $country) {
			$arr_more_countries[$counter] = $country->name;
		}
		$countries      = $arr_countries;
		$more_countries = array_diff($arr_more_countries, $arr_countries);

		//categories from DB
		$categories          = DB::table('categories')->where('of', '=', 'package')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_categories     = DB::table('categories')->where('of', '=', 'package')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_categories      = [];
		$arr_more_categories = [];
		foreach ($categories as $counter => $category) {
			$arr_categories[$counter] = $category->name;
		}
		foreach ($more_categories as $counter => $category) {
			$arr_more_categories[$counter] = $category->name;
		}
		$categories      = $arr_categories;
		$more_categories = array_diff($arr_more_categories, $arr_categories);
		//dd($packages);
		return view('booknow/all_packages')->with([
				'packages'        => $packages,
				'icons'           => $icons,
				'cities'          => $arr_cities,
				'more_cities'     => $more_cities,
				'countries'       => $arr_countries,
				'more_countries'  => $more_countries,
				'categories'      => $arr_categories,
				'more_categories' => $more_categories,

			]);

	}

	public function all_activities() {

		$activities = DB::table('activities')->paginate(3);
		$icons      = DB::table('package_icons')->get();
		//cities from DB
		$cities = DB::table('cities')->where('of', '=', 'activity')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		// dd($cities);
		$more_cities     = DB::table('cities')->where('of', '=', 'activity')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_cities      = [];
		$arr_more_cities = [];
		foreach ($cities as $counter => $city) {
			$arr_cities[$counter] = $city->name;
		}
		foreach ($more_cities as $counter => $city) {
			$arr_more_cities[$counter] = $city->name;
		}
		$cities      = $arr_cities;
		$more_cities = array_diff($arr_more_cities, $arr_cities);

		//countries from DB
		$countries          = DB::table('countries')->where('of', '=', 'activity')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_countries     = DB::table('countries')->where('of', '=', 'activity')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_countries      = [];
		$arr_more_countries = [];
		foreach ($countries as $counter => $country) {
			$arr_countries[$counter] = $country->name;
		}
		foreach ($more_countries as $counter => $country) {
			$arr_more_countries[$counter] = $country->name;
		}
		$countries      = $arr_countries;
		$more_countries = array_diff($arr_more_countries, $arr_countries);

		//categories from DB
		$categories          = DB::table('categories')->where('of', '=', 'activity')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_categories     = DB::table('categories')->where('of', '=', 'activity')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_categories      = [];
		$arr_more_categories = [];
		foreach ($categories as $counter => $category) {
			$arr_categories[$counter] = $category->name;
		}
		foreach ($more_categories as $counter => $category) {
			$arr_more_categories[$counter] = $category->name;
		}
		$categories      = $arr_categories;
		$more_categories = array_diff($arr_more_categories, $arr_categories);
		//dd($activities);
		return view('booknow/all_activities')->with([
				'activities'      => $activities,
				'icons'           => $icons,
				'cities'          => $arr_cities,
				'more_cities'     => $more_cities,
				'countries'       => $arr_countries,
				'more_countries'  => $more_countries,
				'categories'      => $arr_categories,
				'more_categories' => $more_categories,

			]);

	}

	public function all_cruises() {

		$cruises = DB::table('cruises')->paginate(3);
		$icons   = DB::table('package_icons')->get();
		//cities from DB
		$cities = DB::table('cities')->where('of', '=', 'cruise')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		// dd($cities);
		$more_cities     = DB::table('cities')->where('of', '=', 'cruise')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_cities      = [];
		$arr_more_cities = [];
		foreach ($cities as $counter => $city) {
			$arr_cities[$counter] = $city->name;
		}
		foreach ($more_cities as $counter => $city) {
			$arr_more_cities[$counter] = $city->name;
		}
		$cities      = $arr_cities;
		$more_cities = array_diff($arr_more_cities, $arr_cities);

		//countries from DB
		$countries          = DB::table('countries')->where('of', '=', 'cruise')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_countries     = DB::table('countries')->where('of', '=', 'cruise')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_countries      = [];
		$arr_more_countries = [];
		foreach ($countries as $counter => $country) {
			$arr_countries[$counter] = $country->name;
		}
		foreach ($more_countries as $counter => $country) {
			$arr_more_countries[$counter] = $country->name;
		}
		$countries      = $arr_countries;
		$more_countries = array_diff($arr_more_countries, $arr_countries);

		//categories from DB
		$categories          = DB::table('categories')->where('of', '=', 'cruise')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_categories     = DB::table('categories')->where('of', '=', 'cruise')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_categories      = [];
		$arr_more_categories = [];
		foreach ($categories as $counter => $category) {
			$arr_categories[$counter] = $category->name;
		}
		foreach ($more_categories as $counter => $category) {
			$arr_more_categories[$counter] = $category->name;
		}
		$categories      = $arr_categories;
		$more_categories = array_diff($arr_more_categories, $arr_categories);

		return view('booknow/all_cruises')->with([
				'cruises'         => $cruises,
				'icons'           => $icons,
				'cities'          => $arr_cities,
				'more_cities'     => $more_cities,
				'countries'       => $arr_countries,
				'more_countries'  => $more_countries,
				'categories'      => $arr_categories,
				'more_categories' => $more_categories,

			]);

	}

	public function all_transfers() {
		$transfers = DB::table('transfers')->paginate(3);
		$icons     = DB::table('package_icons')->get();
		//cities from DB
		$cities          = DB::table('cities')->where('of', '=', 'transfer')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_cities     = DB::table('cities')->where('of', '=', 'transfer')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_cities      = [];
		$arr_more_cities = [];
		foreach ($cities as $counter => $city) {
			$arr_cities[$counter] = $city->name;
		}
		foreach ($more_cities as $counter => $city) {
			$arr_more_cities[$counter] = $city->name;
		}
		$cities      = $arr_cities;
		$more_cities = array_diff($arr_more_cities, $arr_cities);

		//countries from DB
		$countries          = DB::table('countries')->where('of', '=', 'transfer')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_countries     = DB::table('countries')->where('of', '=', 'transfer')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_countries      = [];
		$arr_more_countries = [];
		foreach ($countries as $counter => $country) {
			$arr_countries[$counter] = $country->name;
		}
		foreach ($more_countries as $counter => $country) {
			$arr_more_countries[$counter] = $country->name;
		}
		$countries      = $arr_countries;
		$more_countries = array_diff($arr_more_countries, $arr_countries);

		//categories from DB
		$categories          = DB::table('categories')->where('of', '=', 'transfer')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_categories     = DB::table('categories')->where('of', '=', 'transfer')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_categories      = [];
		$arr_more_categories = [];
		foreach ($categories as $counter => $category) {
			$arr_categories[$counter] = $category->name;
		}
		foreach ($more_categories as $counter => $category) {
			$arr_more_categories[$counter] = $category->name;
		}
		$categories      = $arr_categories;
		$more_categories = array_diff($arr_more_categories, $arr_categories);

		return view('booknow/all_transfers')->with([
				'transfers'       => $transfers,
				'icons'           => $icons,
				'cities'          => $arr_cities,
				'more_cities'     => $more_cities,
				'countries'       => $arr_countries,
				'more_countries'  => $more_countries,
				'categories'      => $arr_categories,
				'more_categories' => $more_categories,

			]);

	}

	public function all_daytours() {
		$daytours = DB::table('daytours')->paginate(3);
		$icons    = DB::table('package_icons')->get();
		//cities from DB
		$cities          = DB::table('cities')->where('of', '=', 'daytour')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_cities     = DB::table('cities')->where('of', '=', 'daytour')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_cities      = [];
		$arr_more_cities = [];
		foreach ($cities as $counter => $city) {
			$arr_cities[$counter] = $city->name;
		}
		foreach ($more_cities as $counter => $city) {
			$arr_more_cities[$counter] = $city->name;
		}
		$cities      = $arr_cities;
		$more_cities = array_diff($arr_more_cities, $arr_cities);

		//countries from DB
		$countries          = DB::table('countries')->where('of', '=', 'daytour')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_countries     = DB::table('countries')->where('of', '=', 'daytour')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_countries      = [];
		$arr_more_countries = [];
		foreach ($countries as $counter => $country) {
			$arr_countries[$counter] = $country->name;
		}
		foreach ($more_countries as $counter => $country) {
			$arr_more_countries[$counter] = $country->name;
		}
		$countries      = $arr_countries;
		$more_countries = array_diff($arr_more_countries, $arr_countries);

		//categories from DB
		$categories          = DB::table('categories')->where('of', '=', 'daytour')->orderBy('id', 'desc')->take(5)->get()->unique('name');
		$more_categories     = DB::table('categories')->where('of', '=', 'daytour')->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
		$arr_categories      = [];
		$arr_more_categories = [];
		foreach ($categories as $counter => $category) {
			$arr_categories[$counter] = $category->name;
		}
		foreach ($more_categories as $counter => $category) {
			$arr_more_categories[$counter] = $category->name;
		}
		$categories      = $arr_categories;
		$more_categories = array_diff($arr_more_categories, $arr_categories);

		return view('booknow/all_daytours')->with([
				'daytours'        => $daytours,
				'icons'           => $icons,
				'cities'          => $arr_cities,
				'more_cities'     => $more_cities,
				'countries'       => $arr_countries,
				'more_countries'  => $more_countries,
				'categories'      => $arr_categories,
				'more_categories' => $more_categories,

			]);

	}

	public function index_grid() {
		$activities = DB::table('activities')->paginate(3);
		$cruises    = DB::table('cruises')->paginate(3);
		$daytours   = DB::table('daytours')->paginate(3);
		$transfers  = DB::table('transfers')->paginate(3);
		$packages   = DB::table('packages')->paginate(3);
		$icons      = DB::table('package_icons')->paginate(3);
		return view('booknow/index_grid')->with([
				'activities' => $activities,
				'cruises'    => $cruises,
				'daytours'   => $daytours,
				'transfers'  => $transfers,
				'packages'   => $packages,
				'icons'      => $icons,

			]);
	}

	public function list_city($city, $type) {
		if ($type == 'booknow') {
			$activities = DB::table('activities')
				->join('cities', 'cities.fkey', '=', 'activities.id')
				->where('cities.name', $city)
				->select('activities.*')
				->paginate(3);

			$daytours = DB::table('daytours')
				->join('cities', 'cities.fkey', '=', 'daytours.id')
				->where('cities.name', $city)
				->select('daytours.*')
				->paginate(3);

			$packages = DB::table('packages')
				->join('cities', 'cities.fkey', '=', 'packages.id')
				->where('cities.name', $city)
				->select('packages.*')
				->paginate(3);

			$transfers = DB::table('transfers')
				->join('cities', 'cities.fkey', '=', 'transfers.id')
				->where('cities.name', $city)
				->select('transfers.*')
				->paginate(3);
			$cruises = DB::table('cruises')
				->join('cities', 'cities.fkey', '=', 'cruises.id')
				->where('cities.name', $city)
				->select('cruises.*')
				->paginate(3);
			$packages = DB::table('packages')->paginate(3);
			$icons    = DB::table('package_icons')->paginate(3);

			return view('booknow/index')->with([
					'activities'  => $activities,
					'cruises'     => $cruises,
					'daytours'    => $daytours,
					'transfers'   => $transfers,
					'packages'    => $packages,
					'icons'       => $icons,
					'cities'      => $cities,
					'more_cities' => $more_cities,

				]);
		} else {

			if ($type == 'all_cruises') {
				$of = 'cruise';
			}
			if ($type == 'all_activities') {
				$of = 'activity';
			}
			if ($type == 'all_transfers') {
				$of = 'transfer';
			}
			if ($type == 'all_packages') {
				$of = 'package';
			}
			if ($type == 'all_daytours') {
				$of = 'daytour';
			}

			$view_name  = "booknow/".$type;
			$type_model = substr($type, 4);
			$model_name = $type_model;
			$model_name = DB::table($type_model)
				->join('cities', 'cities.fkey', '=', $type_model.'.id')
				->where('cities.name', $city)
				->select($type_model.'.*')
				->paginate(3);
			$icons = DB::table('package_icons')->paginate(3);

			//cities from DB
			$cities          = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_cities     = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_cities      = [];
			$arr_more_cities = [];
			foreach ($cities as $counter => $city) {
				$arr_cities[$counter] = $city->name;
			}
			foreach ($more_cities as $counter => $city) {
				$arr_more_cities[$counter] = $city->name;
			}
			$cities      = $arr_cities;
			$more_cities = array_diff($arr_more_cities, $arr_cities);

			//countries from DB
			$countries          = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_countries     = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_countries      = [];
			$arr_more_countries = [];
			foreach ($countries as $counter => $country) {
				$arr_countries[$counter] = $country->name;
			}
			foreach ($more_countries as $counter => $country) {
				$arr_more_countries[$counter] = $country->name;
			}
			$countries      = $arr_countries;
			$more_countries = array_diff($arr_more_countries, $arr_countries);

			//categories from DB
			$categories          = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_categories     = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_categories      = [];
			$arr_more_categories = [];
			foreach ($categories as $counter => $category) {
				$arr_categories[$counter] = $category->name;
			}
			foreach ($more_categories as $counter => $category) {
				$arr_more_categories[$counter] = $category->name;
			}
			$categories      = $arr_categories;
			$more_categories = array_diff($arr_more_categories, $arr_categories);
			return view($view_name)->with([
					$type_model.''    => $model_name,
					'icons'           => $icons,
					'cities'          => $arr_cities,
					'more_cities'     => $more_cities,
					'countries'       => $arr_countries,
					'more_countries'  => $more_countries,
					'categories'      => $arr_categories,
					'more_categories' => $more_categories,
				]);
		}

	}

	public function list_category($category, $type) {
		if ($type == 'booknow') {
			$activities = DB::table('activities')
				->join('categories', 'categories.fkey', '=', 'activities.id')
				->where('categories.name', $category)
				->select('activities.*')
				->paginate(3);

			$daytours = DB::table('daytours')
				->join('categories', 'categories.fkey', '=', 'daytours.id')
				->where('categories.name', $category)
				->select('daytours.*')
				->paginate(3);

			$packages = DB::table('packages')
				->join('categories', 'categories.fkey', '=', 'packages.id')
				->where('categories.name', $category)
				->select('packages.*')
				->paginate(3);

			$transfers = DB::table('transfers')
				->join('categories', 'categories.fkey', '=', 'transfers.id')
				->where('categories.name', $category)
				->select('transfers.*')
				->paginate(3);
			$cruises = DB::table('cruises')
				->join('categories', 'categories.fkey', '=', 'cruises.id')
				->where('categories.name', $category)
				->select('cruises.*')
				->paginate(3);
			$packages = DB::table('packages')->paginate(3);
			$icons    = DB::table('package_icons')->paginate(3);

			return view('booknow/index')->with([
					'activities' => $activities,
					'cruises'    => $cruises,
					'daytours'   => $daytours,
					'transfers'  => $transfers,
					'packages'   => $packages,
					'icons'      => $icons,

				]);
		} else {
			if ($type == 'all_cruises') {
				$of = 'cruise';
			}
			if ($type == 'all_activities') {
				$of = 'activity';
			}
			if ($type == 'all_transfers') {
				$of = 'transfer';
			}
			if ($type == 'all_packages') {
				$of = 'package';
			}
			if ($type == 'all_daytours') {
				$of = 'daytour';
			}
			$view_name  = "booknow/".$type;
			$type_model = substr($type, 4);
			$model_name = $type_model;
			$model_name = DB::table($type_model)
				->join('categories', 'categories.fkey', '=', $type_model.'.id')
				->where('categories.name', $category)
				->select($type_model.'.*')
				->paginate(3);
			$icons = DB::table('package_icons')->paginate(3);
			//cities from DB
			$cities          = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_cities     = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_cities      = [];
			$arr_more_cities = [];
			foreach ($cities as $counter => $city) {
				$arr_cities[$counter] = $city->name;
			}
			foreach ($more_cities as $counter => $city) {
				$arr_more_cities[$counter] = $city->name;
			}
			$cities      = $arr_cities;
			$more_cities = array_diff($arr_more_cities, $arr_cities);

			//countries from DB
			$countries          = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_countries     = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_countries      = [];
			$arr_more_countries = [];
			foreach ($countries as $counter => $country) {
				$arr_countries[$counter] = $country->name;
			}
			foreach ($more_countries as $counter => $country) {
				$arr_more_countries[$counter] = $country->name;
			}
			$countries      = $arr_countries;
			$more_countries = array_diff($arr_more_countries, $arr_countries);

			//categories from DB
			$categories          = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_categories     = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_categories      = [];
			$arr_more_categories = [];
			foreach ($categories as $counter => $category) {
				$arr_categories[$counter] = $category->name;
			}
			foreach ($more_categories as $counter => $category) {
				$arr_more_categories[$counter] = $category->name;
			}
			$categories      = $arr_categories;
			$more_categories = array_diff($arr_more_categories, $arr_categories);
			return view($view_name)->with([
					$type_model.''    => $model_name,
					'icons'           => $icons,
					'cities'          => $arr_cities,
					'more_cities'     => $more_cities,
					'countries'       => $arr_countries,
					'more_countries'  => $more_countries,
					'categories'      => $arr_categories,
					'more_categories' => $more_categories,
				]);
		}
	}

	public function list_price($minprice, $maxprice, $type) {

		if ($type == 'booknow') {
			$activities = DB::table('activities')
				->join('countries', 'countries.fkey', '=', 'activities.id')
				->where('countries.name', $country)
				->select('activities.*')
				->paginate(3);

			$daytours = DB::table('daytours')
				->join('countries', 'countries.fkey', '=', 'daytours.id')
				->where('countries.name', $country)
				->select('daytours.*')
				->paginate(3);

			$packages = DB::table('packages')
				->join('countries', 'countries.fkey', '=', 'packages.id')
				->where('countries.name', $country)
				->select('packages.*')
				->paginate(3);

			$transfers = DB::table('transfers')
				->join('countries', 'countries.fkey', '=', 'transfers.id')
				->where('countries.name', $country)
				->select('transfers.*')
				->paginate(3);
			$cruises = DB::table('cruises')
				->join('countries', 'countries.fkey', '=', 'cruises.id')
				->where('countries.name', $country)
				->select('cruises.*')
				->paginate(3);
			$packages = DB::table('packages')->paginate(3);
			$icons    = DB::table('package_icons')->paginate(3);

			return view('booknow/index')->with([
					'activities' => $activities,
					'cruises'    => $cruises,
					'daytours'   => $daytours,
					'transfers'  => $transfers,
					'packages'   => $packages,
					'icons'      => $icons,

				]);
		} else {
			if ($type == 'all_cruises') {
				$of = 'cruise';
			}
			if ($type == 'all_activities') {
				$of = 'activity';
			}
			if ($type == 'all_transfers') {
				$of = 'transfer';
			}
			if ($type == 'all_packages') {
				$of = 'package';
			}
			if ($type == 'all_daytours') {
				$of = 'daytour';
			}
			$view_name  = "booknow/".$type;
			$type_model = substr($type, 4);
			$model_name = $type_model;
			// $model_name = DB::table($type_model)
			// 	->join('countries', 'countries.fkey', '=', $type_model.'.id')
			// 	->where('countries.name', $country)
			// 	->select($type_model.'.*')
			// 	->paginate(3);
			if ($minprice == '250' && $maxprice == '0') {
				$model_name = DB::table($type_model)
					->where('price', '>', $minprice)
					->paginate(3);

			} elseif ($minprice == '100' && $maxprice == '250') {
				$model_name = DB::table($type_model)
					->where('price', '>=', $minprice)
					->where('price', '<=', $maxprice)
					->paginate(3);

			} elseif ($minprice == '50' && $maxprice == '100') {
				$model_name = DB::table($type_model)
					->where('price', '>=', $minprice)
					->where('price', '<=', $maxprice)
					->paginate(3);

			} elseif ($minprice == '25' && $maxprice == '50') {
				$model_name = DB::table($type_model)
					->where('price', '>=', $minprice)
					->where('price', '<=', $maxprice)
					->paginate(3);

			} elseif ($minprice == '0' && $maxprice == '25') {
				$model_name = DB::table($type_model)
					->where('price', '>=', $minprice)
					->where('price', '<=', $maxprice)
					->paginate(3);

			} else {

			}

			$icons = DB::table('package_icons')->paginate(3);
			//cities from DB
			$cities          = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_cities     = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_cities      = [];
			$arr_more_cities = [];
			foreach ($cities as $counter => $city) {
				$arr_cities[$counter] = $city->name;
			}
			foreach ($more_cities as $counter => $city) {
				$arr_more_cities[$counter] = $city->name;
			}
			$cities      = $arr_cities;
			$more_cities = array_diff($arr_more_cities, $arr_cities);

			//countries from DB
			$countries          = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_countries     = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_countries      = [];
			$arr_more_countries = [];
			foreach ($countries as $counter => $country) {
				$arr_countries[$counter] = $country->name;
			}
			foreach ($more_countries as $counter => $country) {
				$arr_more_countries[$counter] = $country->name;
			}
			$countries      = $arr_countries;
			$more_countries = array_diff($arr_more_countries, $arr_countries);

			//categories from DB
			$categories          = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_categories     = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_categories      = [];
			$arr_more_categories = [];
			foreach ($categories as $counter => $category) {
				$arr_categories[$counter] = $category->name;
			}
			foreach ($more_categories as $counter => $category) {
				$arr_more_categories[$counter] = $category->name;
			}
			$categories      = $arr_categories;
			$more_categories = array_diff($arr_more_categories, $arr_categories);
			return view($view_name)->with([
					$type_model.''    => $model_name,
					'icons'           => $icons,
					'cities'          => $arr_cities,
					'more_cities'     => $more_cities,
					'countries'       => $arr_countries,
					'more_countries'  => $more_countries,
					'categories'      => $arr_categories,
					'more_categories' => $more_categories,
				]);
		}
	}

	public function list_country($country, $type) {

		if ($type == 'booknow') {
			$activities = DB::table('activities')
				->join('countries', 'countries.fkey', '=', 'activities.id')
				->where('countries.name', $country)
				->select('activities.*')
				->paginate(3);

			$daytours = DB::table('daytours')
				->join('countries', 'countries.fkey', '=', 'daytours.id')
				->where('countries.name', $country)
				->select('daytours.*')
				->paginate(3);

			$packages = DB::table('packages')
				->join('countries', 'countries.fkey', '=', 'packages.id')
				->where('countries.name', $country)
				->select('packages.*')
				->paginate(3);

			$transfers = DB::table('transfers')
				->join('countries', 'countries.fkey', '=', 'transfers.id')
				->where('countries.name', $country)
				->select('transfers.*')
				->paginate(3);
			$cruises = DB::table('cruises')
				->join('countries', 'countries.fkey', '=', 'cruises.id')
				->where('countries.name', $country)
				->select('cruises.*')
				->paginate(3);
			$packages = DB::table('packages')->paginate(3);
			$icons    = DB::table('package_icons')->paginate(3);

			return view('booknow/index')->with([
					'activities' => $activities,
					'cruises'    => $cruises,
					'daytours'   => $daytours,
					'transfers'  => $transfers,
					'packages'   => $packages,
					'icons'      => $icons,

				]);
		} else {
			if ($type == 'all_cruises') {
				$of = 'cruise';
			}
			if ($type == 'all_activities') {
				$of = 'activity';
			}
			if ($type == 'all_transfers') {
				$of = 'transfer';
			}
			if ($type == 'all_packages') {
				$of = 'package';
			}
			if ($type == 'all_daytours') {
				$of = 'daytour';
			}
			$view_name  = "booknow/".$type;
			$type_model = substr($type, 4);
			$model_name = $type_model;
			$model_name = DB::table($type_model)
				->join('countries', 'countries.fkey', '=', $type_model.'.id')
				->where('countries.name', $country)
				->select($type_model.'.*')
				->paginate(3);
			$icons = DB::table('package_icons')->paginate(3);
			//cities from DB
			$cities          = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_cities     = DB::table('cities')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_cities      = [];
			$arr_more_cities = [];
			foreach ($cities as $counter => $city) {
				$arr_cities[$counter] = $city->name;
			}
			foreach ($more_cities as $counter => $city) {
				$arr_more_cities[$counter] = $city->name;
			}
			$cities      = $arr_cities;
			$more_cities = array_diff($arr_more_cities, $arr_cities);

			//countries from DB
			$countries          = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_countries     = DB::table('countries')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_countries      = [];
			$arr_more_countries = [];
			foreach ($countries as $counter => $country) {
				$arr_countries[$counter] = $country->name;
			}
			foreach ($more_countries as $counter => $country) {
				$arr_more_countries[$counter] = $country->name;
			}
			$countries      = $arr_countries;
			$more_countries = array_diff($arr_more_countries, $arr_countries);

			//categories from DB
			$categories          = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->take(5)->get()->unique('name');
			$more_categories     = DB::table('categories')->where('of', '=', $of)->orderBy('id', 'desc')->skip(5)->take(100)->get()->unique('name');
			$arr_categories      = [];
			$arr_more_categories = [];
			foreach ($categories as $counter => $category) {
				$arr_categories[$counter] = $category->name;
			}
			foreach ($more_categories as $counter => $category) {
				$arr_more_categories[$counter] = $category->name;
			}
			$categories      = $arr_categories;
			$more_categories = array_diff($arr_more_categories, $arr_categories);
			return view($view_name)->with([
					$type_model.''    => $model_name,
					'icons'           => $icons,
					'cities'          => $arr_cities,
					'more_cities'     => $more_cities,
					'countries'       => $arr_countries,
					'more_countries'  => $more_countries,
					'categories'      => $arr_categories,
					'more_categories' => $more_categories,
				]);
		}
	}

}
