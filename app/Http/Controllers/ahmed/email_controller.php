<?php

namespace App\Http\Controllers\ahmed;

use App\Http\Controllers\Controller;
use App\Inquiry;
use DB;
use Illuminate\Http\Request;
use Redirect;

class email_controller extends Controller {

	public function insert_email_inquiry(Request $request) {
		$inquiry                        = new Inquiry;
		$inquiry->type                  = $request->input('type');
		$inquiry->description           = $request->input('description');
		$inquiry->email                 = $request->input('email');
		$inquiry->phone                 = $request->input('phone');
		$inquiry->name                  = $request->input('name');
		$inquiry->number_of_travelers   = $request->input('number_of_travelers');
		$inquiry->travelers_description = $request->input('travelers_description');
		$inquiry->city                  = $request->input('city');
		$inquiry->max_price             = $request->input('max_price');
		$inquiry->min_price             = $request->input('min_price');
		//flight details
		$inquiry->flight_from = $request->input('flight_from');
		$inquiry->flight_to   = $request->input('flight_to');
		$inquiry->flight_time = $request->input('flight_time');

		//airpott transfer  details
		$inquiry->airport_from      = $request->input('airport_from');
		$inquiry->airport_to        = $request->input('airport_to');
		$inquiry->flight_number     = $request->input('flight_number');
		$inquiry->airport_transport = $request->input('airport_transport');

		//accomodation   details
		$inquiry->accomodation_city     = $request->input('accomodation_city');
		$inquiry->accomodation_from     = $request->input('accomodation_from');
		$inquiry->accomodation_to       = $request->input('accomodation_to');
		$inquiry->accomodation_standard = $request->input('accomodation_standard');

		//tour   details
		$inquiry->tour_city   = $request->input('tour_city');
		$inquiry->tour_date   = $request->input('tour_date');
		$inquiry->tour_type   = $request->input('tour_type');
		$inquiry->tour_period = $request->input('tour_period');

		//tour   details
		$inquiry->trip_from = $request->input('trip_from');
		$inquiry->trip_to   = $request->input('trip_to');
		$inquiry->trip_type = $request->input('trip_type');

		$inquiry->save();

		$object = DB::table('inquiries')
			->orderBy('created_at', 'desc')
			->first();

		// Mail::to('info@eastravels.com')->send(new SendMailable($object));

		return redirect('/custominquiry')->with('success', 'Your Inquiry Has Been Submitted Successfully ');

	}

	public function detail_inquiry($id) {

		$date  = $request->input('date');
		$name  = $request->input('name');
		$email = $request->input('email');
		$phone = $request->input('phone');
		$adult = $request->input('adult');
		$child = $request->input('child');

		//Mail::to('info@eastravels.com')->send(new detailMail($object));
		//Mail::to('info@eastravels.com')->send(new SendMailable($object));
		return redirect('/')->with('success', 'Your Detailed Inquiry Has Been Submitted Successfully ');
	}

	public function event_detail_inquiry(Request $request) {

		$event_name = $request->input('event_name');
		$event_id   = $request->input('event_id');
		$date       = $request->input('date');
		$date       = $request->input('date');
		$name       = $request->input('name');
		$email      = $request->input('email');
		$phone      = $request->input('phone');
		$adult      = $request->input('adult');
		$child      = $request->input('child');

		//Mail::to('info@eastravels.com')->send(new detailMail($object));
		//Mail::to('info@eastravels.com')->send(new SendMailable($object));
		return Redirect::back()->with('success', 'Email Inquiry dispatched successfully');
	}

}
