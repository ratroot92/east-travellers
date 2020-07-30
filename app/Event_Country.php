<?php

namespace App;

use App\All_Events;
use Illuminate\Database\Eloquent\Model;

class Event_Country extends Model
{
	public $table         = 'event__countries';
	protected $primaryKey = 'id';
	protected $guarded    = [];



	public function All_Events()
	{
		return $this->belongsToMany(All_Events::class, 'country_all__events', 'country_id', 'all__events_id');
	}
	public function Activity_Events()
	{
		return $this->belongsToMany(All_Events::class, 'country_all__events', 'country_id', 'all__events_id')->where('event_type', 'Activity');
	}
	public function Cruise_Events()
	{
		return $this->belongsToMany(All_Events::class, 'country_all__events', 'country_id', 'all__events_id')->where('event_type', 'Cruise');
	}
	public function Transfer_Events()
	{
		return $this->belongsToMany(All_Events::class, 'country_all__events', 'country_id', 'all__events_id')->where('event_type', 'Transfer');
	}
	public function Daytour_Events()
	{
		return $this->belongsToMany(All_Events::class, 'country_all__events', 'country_id', 'all__events_id')->where('event_type', 'Daytour');
	}
	public function Package_Events()
	{
		return $this->belongsToMany(All_Events::class, 'country_all__events', 'country_id', 'all__events_id')->where('event_type', 'Package');
	}
	public static function PaginateAllCountries()
	{
		return self::query()->paginate(3);
	}
}