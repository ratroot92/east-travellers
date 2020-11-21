<?php

namespace App\Http\Controllers\ahmed;

use App;
use App\Transfer;
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

class Transfer_Controller extends Controller
{
	private $base_url;

	public function __construct()
	{

		$this->base_url = url('/');
	}

	public function returnpdf()
	{
		return view('transfers.pdf');
	}

	public function PDF($id)
	{
		$transfer = DB::table('transfers')->where('id', $id)->first();
		$pdf = PDF::loadView('transfers/pdf', compact('transfer'));
		$pdf->setOptions(['isPhpEnabled' => true, 'isRemoteEnabled' => true]);
		return $pdf->download('weblinerz.pdf');
	}
	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	//###############################################################################################################
	public function All_Transfer_Events()
	{
		$All_Transfer_Events = All_Events::where('event_type', '=', 'Transfer')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Transfer_Event/All_Transfer_Events', ['All_Transfer_Events' => $All_Transfer_Events]);
	}
	//city search
	public function Transfer_By_City($id)
	{
		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			$All_Transfer_Events = $Get_City->Transfer_Events;
			if (count($All_Transfer_Events->toArray()) > 0) {
				return view('Transfer_Event/All_Transfer_Events', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'City', 'Search_Param' => $Get_City->name]);
			} else {
				return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For City ' . $Get_City->name);
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For City ' . $Get_City->name);
		}
	}

	public function Transfer_By_Country($id)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			$All_Transfer_Events = $Get_Country->Transfer_Events;
			if (count($All_Transfer_Events->toArray()) > 0) {
				return view('Transfer_Event/All_Transfer_Events', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'Country', 'Search_Param' => $Get_Country->name]);
			} else {
				return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For Country ' . $Get_Country->name);
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Transfer_By_Category($id)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			$All_Transfer_Events = $Get_Category->Transfer_Events;
			if (count($All_Transfer_Events->toArray()) > 0) {
				return view('Transfer_Event/All_Transfer_Events', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'Category', 'Search_Param' => $Get_Category->name]);
			} else {
				return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For Category ' . $Get_Category->name);
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Transfer_By_Price($min, $max)
	{
		$type = 'Transfer';

		$All_Transfer_Events = All_Events::price($min, $max)->activity($type)->get();
		if (count($All_Transfer_Events->toArray()) > 0) {
			if ($max == '000' || $max == 000) {
				$maxx = 'Maximum';
				$Price_Range = "Range $" . $min . " , $" . $maxx;
			} else {
				$Price_Range = "Range $" . $min . " , $" . $max;
			}

			return view('Transfer_Event/All_Transfer_Events', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'Price', 'Search_Param' => $Price_Range]);
		} else {
			return redirect()->route('all.events.transfer')->with('error', 'No Transfer Event Found For Given Price Range');
		}
	}
	//###############################################################################################################
	//###############################################################################################################
	public function All_Transfer_Events_Grid()
	{

		$All_Transfer_Events = All_Events::where('event_type', '=', 'Transfer')->paginate(6);
		// $Icons               = DB::table('icons')->get();
		return view('Transfer_Event/All_Transfer_Events_Grid', ['All_Transfer_Events' => $All_Transfer_Events]);
	}
	//city search
	public function Transfer_By_City_Grid($id)
	{
		$Get_City = Event_City::Find($id);
		if ($Get_City) {
			$All_Transfer_Events = $Get_City->Transfer_Events;
			if (count($All_Transfer_Events->toArray()) > 0) {
				return view('Transfer_Event/All_Transfer_Events_Grid', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'City', 'Search_Param' => $Get_City->name]);
			} else {
				return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For City ' . $Get_City->name);
			}
		}
		//No Activbity Associated With Searched City
		else {
			return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For City ' . $Get_City->name);
		}
	}

	public function Transfer_By_Country_Grid($id)
	{
		$Get_Country = Event_Country::Find($id);
		if ($Get_Country) {
			$All_Transfer_Events = $Get_Country->Transfer_Events;
			if (count($All_Transfer_Events->toArray()) > 0) {
				return view('Transfer_Event/All_Transfer_Events_Grid', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'Country', 'Search_Param' => $Get_Country->name]);
			} else {
				return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For Country ' . $Get_Country->name);
			}
		}
		//No Activbity Associated With Searched Country
		else {
			return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For Country ' . $Get_Country->name);
		}
	}
	public function Transfer_By_Category_Grid($id)
	{
		$Get_Category = Event_Category::Find($id);
		if ($Get_Category) {
			$All_Transfer_Events = $Get_Category->Transfer_Events;
			if (count($All_Transfer_Events->toArray()) > 0) {
				return view('Transfer_Event/All_Transfer_Events_Grid', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'Category', 'Search_Param' => $Get_Category->name]);
			} else {
				return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For Category ' . $Get_Category->name);
			}
		}
		//No Activbity Associated With Searched Category
		else {
			return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For Category ' . $Get_Category->name);
		}
	}
	public function Transfer_By_Price_Grid($min, $max)
	{
		$type = 'Transfer';

		$All_Transfer_Events = All_Events::price($min, $max)->activity($type)->get();
		if (count($All_Transfer_Events->toArray()) > 0) {
			if ($max == '000' || $max == 000) {
				$maxx = 'Maximum';
				$Price_Range = "Range $" . $min . " , $" . $maxx;
			} else {
				$Price_Range = "Range $" . $min . " , $" . $max;
			}

			return view('Transfer_Event/All_Transfer_Events_Grid', ['All_Transfer_Events' => $All_Transfer_Events, 'Serach_Type' => 'Price', 'Search_Param' => $Price_Range]);
		} else {
			return redirect()->route('all.events.transfer.grid')->with('error', 'No Transfer Event Found For Given Price Range');
		}
	}
	//###############################################################################################################
	//###############################################################################################################

}
