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
		$All_Events = All_Events::all();
		$All_Activity_Events = All_Events::where('event_type', 'Activity')->get();
		$All_Transfer_Events = All_Events::where('event_type', 'Transfer')->get();
		$All_Cruise_Events = All_Events::where('event_type', 'Cruise')->get();
		$All_Package_Events = All_Events::where('event_type', 'Package')->get();
		$All_Daytour_Events = All_Events::where('event_type', 'Daytour')->get();

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
}