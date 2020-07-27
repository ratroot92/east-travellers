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
//
use Validator;

class Daytour_Controller extends Controller
{

	private $base_url;

	public function __construct()
	{

		$this->base_url = url('/');
	}

	public function returnpdf()
	{
		return view('daytours.pdf');
	}
	public function PDF($id)
	{
		$daytour = DB::table('daytours')
			->where('id', $id)
			->first();
		$pdf = PDF::loadView('daytours/pdf', compact('daytour'));
		$pdf->setOptions(['isPhpEnabled' => true, 'isRemoteEnabled' => true]);
		return $pdf->download('weblinerz.pdf');
	}

	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	public function All_Daytour_Events()
	{
		$All_Daytour_Events = All_Events::where('event_type', '=', 'Daytour')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Daytour_Event/All_Daytour_Events', ['All_Daytour_Events' => $All_Daytour_Events]);
	}
	//city search
	public function Daytour_By_City($id)
	{
		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			$All_Daytour_Events = $Get_City->Daytour_Events;
			if (count($All_Daytour_Events->toArray()) > 0) {
				return view('Daytour_Event/All_Daytour_Events', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'City', 'Search_Param' => $Get_City->name]);
			} else {
				return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For City ' . $Get_City->name);
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For City ' . $Get_City->name);
		}
	}

	public function Daytour_By_Country($id)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			$All_Daytour_Events = $Get_Country->Daytour_Events;
			if (count($All_Daytour_Events->toArray()) > 0) {
				return view('Daytour_Event/All_Daytour_Events', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'Country', 'Search_Param' => $Get_Country->name]);
			} else {
				return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For Country ' . $Get_Country->name);
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Daytour_By_Category($id)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			$All_Daytour_Events = $Get_Category->Daytour_Events;
			if (count($All_Daytour_Events->toArray()) > 0) {
				return view('Daytour_Event/All_Daytour_Events', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'Category', 'Search_Param' => $Get_Category->name]);
			} else {
				return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For Category ' . $Get_Category->name);
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Daytour_By_Price($min, $max)
	{
		$type = 'Daytour';

		$All_Daytour_Events = All_Events::price($min, $max)->activity($type)->get();
		if (count($All_Daytour_Events->toArray()) > 0) {
			if ($max == '000' || $max == 000) {
				$maxx = 'Maximum';
				$Price_Range = "Range $" . $min . " , $" . $maxx;
			} else {
				$Price_Range = "Range $" . $min . " , $" . $max;
			}

			return view('Daytour_Event/All_Daytour_Events', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'Price', 'Search_Param' => $Price_Range]);
		} else {
			return redirect()->route('all.events.daytour')->with('error', 'No Daytour Event Found For Given Price Range');
		}
	}
	//###############################################################################################################
	//###############################################################################################################
	public function All_Daytour_Events_Grid()
	{

		$All_Daytour_Events = All_Events::where('event_type', '=', 'Daytour')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Daytour_Event/All_Daytour_Events_Grid', ['All_Daytour_Events' => $All_Daytour_Events]);
	}
	//city search
	public function Daytour_By_City_Grid($id)
	{
		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			$All_Daytour_Events = $Get_City->Daytour_Events;
			if (count($All_Daytour_Events->toArray()) > 0) {
				return view('Daytour_Event/All_Daytour_Events_Grid', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'City', 'Search_Param' => $Get_City->name]);
			} else {
				return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For City ' . $Get_City->name);
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For City ' . $Get_City->name);
		}
	}

	public function Daytour_By_Country_Grid($id)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			$All_Daytour_Events = $Get_Country->Daytour_Events;
			if (count($All_Daytour_Events->toArray()) > 0) {
				return view('Daytour_Event/All_Daytour_Events_Grid', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'Country', 'Search_Param' => $Get_Country->name]);
			} else {
				return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For Country ' . $Get_Country->name);
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Daytour_By_Category_Grid($id)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			$All_Daytour_Events = $Get_Category->Daytour_Events;
			if (count($All_Daytour_Events->toArray()) > 0) {
				return view('Daytour_Event/All_Daytour_Events_Grid', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'Category', 'Search_Param' => $Get_Category->name]);
			} else {
				return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For Category ' . $Get_Category->name);
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Daytour_By_Price_Grid($min, $max)
	{
		$type = 'Daytour';

		$All_Daytour_Events = All_Events::price($min, $max)->activity($type)->get();
		if (count($All_Daytour_Events->toArray()) > 0) {
			if ($max == '000' || $max == 000) {
				$maxx = 'Maximum';
				$Price_Range = "Range $" . $min . " , $" . $maxx;
			} else {
				$Price_Range = "Range $" . $min . " , $" . $max;
			}

			return view('Daytour_Event/All_Daytour_Events_Grid', ['All_Daytour_Events' => $All_Daytour_Events, 'Serach_Type' => 'Price', 'Search_Param' => $Price_Range]);
		} else {
			return redirect()->route('all.events.daytour.grid')->with('error', 'No Daytour Event Found For Given Price Range');
		}
	}
	//###############################################################################################################
	//###############################################################################################################
}
