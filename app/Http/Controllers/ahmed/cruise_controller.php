<?php

namespace App\Http\Controllers\ahmed;

use App;
use App\All_Events;
use App\Event_Country;
use App\Event_Category;
use App\Event_City;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PDF;

class Cruise_Controller extends Controller
{
	private $base_url;

	public function __construct()
	{

		$this->base_url = url('/');
	}

	public function returnpdf()
	{
		return view('cruises.pdf');
	}
	public function PDF($id)
	{
		$cruise = DB::table('cruises')
			->where('id', $id)
			->first();
		$pdf = PDF::loadView('cruises/pdf', compact('cruise'));
		$pdf->setOptions(['isPhpEnabled' => true, 'isRemoteEnabled' => true]);
		return $pdf->download('weblinerz.pdf');
	}

	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	public function All_Cruise_Events()
	{
		$All_Cruise_Events = All_Events::where('event_type', '=', 'Cruise')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Cruise_Event/All_Cruise_Events', ['All_Cruise_Events' => $All_Cruise_Events]);
	}
	//city search
	public function Cruise_By_City($id)
	{
		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			$All_Cruise_Events = $Get_City->Cruise_Events;
			if (count($All_Cruise_Events->toArray()) > 0) {
				return view('Cruise_Event/All_Cruise_Events', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'City', 'Search_Param' => $Get_City->name]);
			} else {
				return redirect()->route('all.events.cruise')->with('error', 'No Cruise Event Found For City ' . $Get_City->name);
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('all.events.activity')->with('error', 'No Activity Event Found For City ' . $Get_City->name);
		}
	}

	public function Cruise_By_Country($id)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			$All_Cruise_Events = $Get_Country->Cruise_Events;
			if (count($All_Cruise_Events->toArray()) > 0) {
				return view('Cruise_Event/All_Cruise_Events', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'Country', 'Search_Param' => $Get_Country->name]);
			} else {
				return redirect()->route('all.events.cruise')->with('error', 'No Cruise Event Found For Country ' . $Get_Country->name);
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('all.events.cruise')->with('error', 'No Cruise Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Cruise_By_Category($id)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			$All_Cruise_Events = $Get_Category->Cruise_Events;
			if (count($All_Cruise_Events->toArray()) > 0) {
				return view('Cruise_Event/All_Cruise_Events', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'Category', 'Search_Param' => $Get_Category->name]);
			} else {
				return redirect()->route('all.events.cruise')->with('error', 'No Cruise Event Found For Category ' . $Get_Category->name);
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('all.events.cruise')->with('error', 'No Cruise Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Cruise_By_Price($min, $max)
	{
		$type = 'Cruise';

		$All_Cruise_Events = All_Events::price($min, $max)->activity($type)->get();
		if (count($All_Cruise_Events->toArray()) > 0) {
			if ($max == '000' || $max == 000) {
				$maxx = 'Maximum';
				$Price_Range = "Range $" . $min . " , $" . $maxx;
			} else {
				$Price_Range = "Range $" . $min . " , $" . $max;
			}

			return view('Cruise_Event/All_Cruise_Events', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'Price', 'Search_Param' => $Price_Range]);
		} else {
			return redirect()->route('all.events.cruise')->with('error', 'No Cruise Event Found For Given Price Range');
		}
	}
	//###############################################################################################################
	//###############################################################################################################
	public function All_Cruise_Events_Grid()
	{

		$All_Cruise_Events = All_Events::where('event_type', '=', 'Cruise')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Cruise_Event/All_Cruise_Events_Grid', ['All_Cruise_Events' => $All_Cruise_Events]);
	}
	//city search
	public function Cruise_By_City_Grid($id)
	{
		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			$All_Cruise_Events = $Get_City->Cruise_Events;
			if (count($All_Cruise_Events->toArray()) > 0) {
				return view('Cruise_Event/All_Cruise_Events_Grid', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'City', 'Search_Param' => $Get_City->name]);
			} else {
				return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For City ' . $Get_City->name);
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For City ' . $Get_City->name);
		}
	}

	public function Cruise_By_Country_Grid($id)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			$All_Cruise_Events = $Get_Country->Cruise_Events;
			if (count($All_Cruise_Events->toArray()) > 0) {
				return view('Cruise_Event/All_Cruise_Events_Grid', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'Country', 'Search_Param' => $Get_Country->name]);
			} else {
				return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For Country ' . $Get_Country->name);
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Cruise_By_Category_Grid($id)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			$All_Cruise_Events = $Get_Category->Cruise_Events;
			if (count($All_Cruise_Events->toArray()) > 0) {
				return view('Cruise_Event/All_Cruise_Events_Grid', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'Category', 'Search_Param' => $Get_Category->name]);
			} else {
				return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For Category ' . $Get_Category->name);
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Cruise_By_Price_Grid($min, $max)
	{
		$type = 'Cruise';

		$All_Cruise_Events = All_Events::price($min, $max)->activity($type)->get();
		if (count($All_Cruise_Events->toArray()) > 0) {
			if ($max == '000' || $max == 000) {
				$maxx = 'Maximum';
				$Price_Range = "Range $" . $min . " , $" . $maxx;
			} else {
				$Price_Range = "Range $" . $min . " , $" . $max;
			}

			return view('Cruise_Event/All_Cruise_Events_Grid', ['All_Cruise_Events' => $All_Cruise_Events, 'Serach_Type' => 'Price', 'Search_Param' => $Price_Range]);
		} else {
			return redirect()->route('all.events.cruise.grid')->with('error', 'No Cruise Event Found For Given Price Range');
		}
	}
	//###############################################################################################################
	//###############################################################################################################
}
