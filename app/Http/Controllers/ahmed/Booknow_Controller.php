<?php

namespace App\Http\Controllers\ahmed;

use App;
use App\Activity;
use App\All_Events;
use App\Event_Country;
use App\Event_Category;
use App\Event_City;
use App\File;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PDF;

class Booknow_Controller extends Controller
{

	public function Index()
	{
		$All_Events = All_Events::PaginateAllEvents();
		$All_Activity_Events = All_Events::PaginateAllActivities();
		$All_Transfer_Events = All_Events::PaginateAllTransfers();
		$All_Cruise_Events = All_Events::PaginateAllCruises();
		$All_Package_Events = All_Events::PaginateAllPackages();
		$All_Daytour_Events = All_Events::PaginateAllDaytours();

		// dd($All_Activity_Events->toArray());
		return view('Booknow/Index', [
			'All_Events' => $All_Events,
			'All_Activity_Events' => $All_Activity_Events,
			'All_Cruise_Events' => $All_Cruise_Events,
			'All_Transfer_Events' => $All_Transfer_Events,
			'All_Package_Events' => $All_Package_Events,
			'All_Daytour_Events' => $All_Daytour_Events

		]);
	}

	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	public function All_Booknow_Events()
	{
		$All_Activity_Events = All_Events::where('event_type', '=', 'Activity')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Booknow/Index', ['All_Activity_Events' => $All_Activity_Events]);
	}


	//###############################################################################################################
	//###############################################################################################################
	public function Booknow_By_City($id, $tab)
	{

		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			if ($tab == 'All') {
				$All_Events = $Get_City->All_Events;
				if (count($All_Events->toArray()) > 0) {
					// dd($All_Events->toArray());
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");

					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_City",
						'Param_Name' => $Get_City->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Events Found For City ' . $Get_City->name);
				}
			} else if ($tab == 'Activity') {
				$All_Activity_Events = $Get_City->Activity_Events;
				if (count($All_Activity_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_City",
						'Param_Name' => $Get_City->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Activity Event Found For City ' . $Get_City->name);
				}
			} else if ($tab == 'Transfer') {
				$All_Transfer_Events = $Get_City->Transfer_Events;
				if (count($All_Transfer_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_City",
						'Param_Name' => $Get_City->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Transfer Event Found For City ' . $Get_City->name);
				}
			} else if ($tab == 'Cruise') {
				$All_Cruise_Events = $Get_City->Cruise_Events;
				if (count($All_Cruise_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_City",
						'Param_Name' => $Get_City->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Cruise Event Found For City ' . $Get_City->name);
				}
			} else if ($tab == 'Package') {
				$All_Package_Events = $Get_City->Package_Events;
				if (count($All_Package_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_City",
						'Param_Name' => $Get_City->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Package Event Found For City ' . $Get_City->name);
				}
			} else if ($tab == 'Daytour') {
				$All_Daytour_Events = $Get_City->Daytour_Events;
				if (count($All_Daytour_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_City",
						'Param_Name' => $Get_City->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Daytour Event Found For City ' . $Get_City->name);
				}
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('booknow.index')->with('error', 'No Activity Event Found For City ' . $Get_City->name);
		}
	}

	public function Booknow_By_CityName($name, $tab)
	{
		$Get_City = Event_City::whereRaw(
			'? LIKE CONCAT("%", name, "%")',
			[$name]
		)->first();
		if ($Get_City == null) {
			return redirect()->route('booknow.index')->with('error', 'City ' . $name . ' does not exsist');
		} else {
			return $this->Booknow_By_City($Get_City->id, $tab);
		}
	}
	//###############################################################################################################
	//###############################################################################################################
	public function Booknow_By_Country($id, $tab)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			if ($tab == 'All') {
				$All_Events = $Get_Country->All_Events;
				if (count($All_Events->toArray()) > 0) {
					// dd($All_Events->toArray());
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Country->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Events Found For Country ' . $Get_Country->name);
				}
			} else if ($tab == 'Activity') {
				$All_Activity_Events = $Get_Country->Activity_Events;
				if (count($All_Activity_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Country");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Country->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Activity Event Found For Country ' . $Get_Country->name);
				}
			} else if ($tab == 'Transfer') {
				$All_Transfer_Events = $Get_Country->Transfer_Events;
				if (count($All_Transfer_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Country");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Country->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Transfer Event Found For Country ' . $Get_Country->name);
				}
			} else if ($tab == 'Cruise') {
				$All_Cruise_Events = $Get_Country->Cruise_Events;
				if (count($All_Cruise_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Country");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Country->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Cruise Event Found For Country ' . $Get_Country->name);
				}
			} else if ($tab == 'Package') {
				$All_Package_Events = $Get_Country->Package_Events;
				if (count($All_Package_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Country");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Country->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Package Event Found For Country ' . $Get_Country->name);
				}
			} else if ($tab == 'Daytour') {
				$All_Daytour_Events = $Get_Country->Daytour_Events;
				if (count($All_Daytour_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					//dd($tab . "_Country");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Country->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Daytour Event Found For Country ' . $Get_Country->name);
				}
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('booknow.index')->with('error', 'No Activity Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Booknow_By_CountryName($name, $tab)
	{
		$Get_Country = Event_Country::whereRaw(
			'? LIKE CONCAT("%", name, "%")',
			[$name]
		)->first();
		if ($Get_Country == null) {
			return redirect()->route('booknow.index')->with('error', 'Country ' . $name . ' does not exsist');
		} else {
			return $this->Booknow_By_Country($Get_Country->id, $tab);
		}
	}
	/////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////

	public function Booknow_By_Category($id, $tab)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			if ($tab == 'All') {
				$All_Events = $Get_Category->All_Events;
				if (count($All_Events->toArray()) > 0) {
					// dd($All_Events->toArray());
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_City");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Country",
						'Param_Name' => $Get_Category->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Events Found For Category ' . $Get_Category->name);
				}
			} else if ($tab == 'Activity') {
				$All_Activity_Events = $Get_Category->Activity_Events;
				if (count($All_Activity_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Category");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Category",
						'Param_Name' => $Get_Category->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Activity Event Found For Category ' . $Get_Category->name);
				}
			} else if ($tab == 'Transfer') {
				$All_Transfer_Events = $Get_Category->Transfer_Events;
				if (count($All_Transfer_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Category");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Category",
						'Param_Name' => $Get_Category->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Transfer Event Found For Category ' . $Get_Category->name);
				}
			} else if ($tab == 'Cruise') {
				$All_Cruise_Events = $Get_Category->Cruise_Events;
				if (count($All_Cruise_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Category");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Category",
						'Param_Name' => $Get_Category->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Cruise Event Found For Category ' . $Get_Category->name);
				}
			} else if ($tab == 'Package') {
				$All_Package_Events = $Get_Category->Package_Events;
				if (count($All_Package_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
					//dd($tab . "_Category");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Category",
						'Param_Name' => $Get_Category->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Package Event Found For Category ' . $Get_Category->name);
				}
			} else if ($tab == 'Daytour') {
				$All_Daytour_Events = $Get_Category->Daytour_Events;
				if (count($All_Daytour_Events->toArray()) > 0) {
					$All_Events = All_Events::all();
					$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
					$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
					$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
					$All_Package_Events = All_Events::where('event_type', 'Package')->get();
					//dd($tab . "_Category");
					return view('Booknow/Index', [
						'All_Events' => $All_Events,
						'All_Activity_Events' => $All_Activity_Events,
						'All_Cruise_Events' => $All_Cruise_Events,
						'All_Transfer_Events' => $All_Transfer_Events,
						'All_Package_Events' => $All_Package_Events,
						'All_Daytour_Events' => $All_Daytour_Events,
						'Active_Tab' => $tab,
						'Results_For' => $tab . "_Category",
						'Param_Name' => $Get_Category->name
					]);
				} else {
					return redirect()->route('booknow.index')->with('error', 'No Daytour Event Found For Category ' . $Get_Category->name);
				}
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('booknow.index')->with('error', 'No Activity Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Booknow_By_CategoryName($name, $tab)
	{
		$Get_Category = Event_Category::whereRaw(
			'? LIKE CONCAT("%", name, "%")',
			[$name]
		)->first();
		if ($Get_Category == null) {
			return redirect()->route('booknow.index')->with('error', 'Category ' . $name . ' does not exsist');
		} else {
			return $this->Booknow_By_Category($Get_Category->id, $tab);
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function Booknow_By_Price($min, $max, $tab)
	{
		if ($max == '000' || $max == 000) {
			$maxx = 'Maximum';
			$Price_Range = "Range $" . $min . " , $" . $maxx;
		} else {
			$Price_Range = "Range $" . $min . " , $" . $max;
		}
		if ($tab == 'All') {

			$All_Events = All_Events::price($min, $max)->get();
			if (count($All_Events->toArray()) > 0) {

				$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
				$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
				$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
				$All_Package_Events = All_Events::where('event_type', 'Package')->get();
				$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
				//dd($tab . "_Category");
				return view('Booknow/Index', [
					'All_Events' => $All_Events,
					'All_Activity_Events' => $All_Activity_Events,
					'All_Cruise_Events' => $All_Cruise_Events,
					'All_Transfer_Events' => $All_Transfer_Events,
					'All_Package_Events' => $All_Package_Events,
					'All_Daytour_Events' => $All_Daytour_Events,
					'Active_Tab' => $tab,
					'Results_For' => $tab . "_Price",
					'Param_Name' => $Price_Range
				]);
			} else {
				return redirect()->route('booknow.index')->with('error', 'No  Event Found For Price ' . $Price_Range);
			}
		} else if ($tab == 'Activity') {
			$type = $tab;
			$All_Activity_Events = All_Events::price($min, $max)->activity($type)->get();
			if (count($All_Activity_Events->toArray()) > 0) {
				if ($max == '000' || $max == 000) {
					$maxx = 'Maximum';
					$Price_Range = "Range $" . $min . " , $" . $maxx;
				} else {
					$Price_Range = "Range $" . $min . " , $" . $max;
				}
				$All_Events = All_Events::all();
				$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
				$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
				$All_Package_Events = All_Events::where('event_type', 'Package')->get();
				$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
				//dd($tab . "_Category");
				return view('Booknow/Index', [
					'All_Events' => $All_Events,
					'All_Activity_Events' => $All_Activity_Events,
					'All_Cruise_Events' => $All_Cruise_Events,
					'All_Transfer_Events' => $All_Transfer_Events,
					'All_Package_Events' => $All_Package_Events,
					'All_Daytour_Events' => $All_Daytour_Events,
					'Active_Tab' => $tab,
					'Results_For' => $tab . "_Price",
					'Param_Name' => $Price_Range
				]);
			} else {
				return redirect()->route('booknow.index')->with('error', 'No  Event Found For Price ' . $Price_Range);
			}
		} else if ($tab == 'Cruise') {
			$type = $tab;
			$All_Cruise_Events = All_Events::price($min, $max)->activity($type)->get();
			if (count($All_Cruise_Events->toArray()) > 0) {
				if ($max == '000' || $max == 000) {
					$maxx = 'Maximum';
					$Price_Range = "Range $" . $min . " , $" . $maxx;
				} else {
					$Price_Range = "Range $" . $min . " , $" . $max;
				}
				$All_Events = All_Events::all();
				$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
				$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
				$All_Package_Events = All_Events::where('event_type', 'Package')->get();
				$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
				//dd($tab . "_Category");
				return view('Booknow/Index', [
					'All_Events' => $All_Events,
					'All_Activity_Events' => $All_Activity_Events,
					'All_Cruise_Events' => $All_Cruise_Events,
					'All_Transfer_Events' => $All_Transfer_Events,
					'All_Package_Events' => $All_Package_Events,
					'All_Daytour_Events' => $All_Daytour_Events,
					'Active_Tab' => $tab,
					'Results_For' => $tab . "_Price",
					'Param_Name' => $Price_Range
				]);
			} else {
				return redirect()->route('booknow.index')->with('error', 'No  Event Found For Price ' . $Price_Range);
			}
		} else if ($tab == 'Daytour') {
			$type = $tab;
			$All_Daytour_Events = All_Events::price($min, $max)->activity($type)->get();
			if (count($All_Daytour_Events->toArray()) > 0) {
				if ($max == '000' || $max == 000) {
					$maxx = 'Maximum';
					$Price_Range = "Range $" . $min . " , $" . $maxx;
				} else {
					$Price_Range = "Range $" . $min . " , $" . $max;
				}
				$All_Events = All_Events::all();
				$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
				$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
				$All_Package_Events = All_Events::where('event_type', 'Package')->get();
				$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
				//dd($tab . "_Category");
				return view('Booknow/Index', [
					'All_Events' => $All_Events,
					'All_Activity_Events' => $All_Activity_Events,
					'All_Daytour_Events' => $All_Daytour_Events,
					'All_Transfer_Events' => $All_Transfer_Events,
					'All_Package_Events' => $All_Package_Events,
					'All_Cruise_Events' => $All_Cruise_Events,
					'Active_Tab' => $tab,
					'Results_For' => $tab . "_Price",
					'Param_Name' => $Price_Range
				]);
			} else {
				return redirect()->route('booknow.index')->with('error', 'No  Event Found For Price ' . $Price_Range);
			}
		} else if ($tab == 'Package') {
			$type = $tab;
			$All_Package_Events = All_Events::price($min, $max)->activity($type)->get();
			if (count($All_Package_Events->toArray()) > 0) {
				if ($max == '000' || $max == 000) {
					$maxx = 'Maximum';
					$Price_Range = "Range $" . $min . " , $" . $maxx;
				} else {
					$Price_Range = "Range $" . $min . " , $" . $max;
				}
				$All_Events = All_Events::all();
				$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
				$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
				$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
				$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
				//dd($tab . "_Category");
				return view('Booknow/Index', [
					'All_Events' => $All_Events,
					'All_Activity_Events' => $All_Activity_Events,
					'All_Package_Events' => $All_Package_Events,
					'All_Transfer_Events' => $All_Transfer_Events,
					'All_Daytour_Events' => $All_Daytour_Events,
					'All_Cruise_Events' => $All_Cruise_Events,
					'Active_Tab' => $tab,
					'Results_For' => $tab . "_Price",
					'Param_Name' => $Price_Range
				]);
			}
		} else if ($tab == 'Transfer') {
			$type = $tab;
			$All_Transfer_Events = All_Events::price($min, $max)->activity($type)->get();
			if (count($All_Transfer_Events->toArray()) > 0) {

				$All_Events = All_Events::all();
				$All_Package_Events = All_Events::where('event_type', 'Transfer')->get();
				$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
				$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();
				$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
				//dd($tab . "_Category");
				return view('Booknow/Index', [
					'All_Events' => $All_Events,
					'All_Activity_Events' => $All_Activity_Events,
					'All_Package_Events' => $All_Package_Events,
					'All_Transfer_Events' => $All_Transfer_Events,
					'All_Daytour_Events' => $All_Daytour_Events,
					'All_Cruise_Events' => $All_Cruise_Events,
					'Active_Tab' => $tab,
					'Results_For' => $tab . "_Price",
					'Param_Name' => $Price_Range
				]);
			} else {
				return redirect()->route('booknow.index')->with('error', 'No  Event Found For Price ' . $Price_Range);
			}
		}
	}
}