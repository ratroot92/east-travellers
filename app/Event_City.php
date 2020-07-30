<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\All_Events;

class Event_City extends Model
{
	public $table         = 'event__cities';
	protected $primaryKey = 'id';
	protected $guarded    = [];

	public function All_Events()
	{
		return $this->belongsToMany(All_Events::class, 'city_all__events', 'city_id', 'all__events_id');
	}
	public function Activity_Events()
	{
		return $this->belongsToMany(All_Events::class, 'city_all__events', 'city_id', 'all__events_id')->where('event_type', 'Activity');
	}
	public function Cruise_Events()
	{
		return $this->belongsToMany(All_Events::class, 'city_all__events', 'city_id', 'all__events_id')->where('event_type', 'Cruise');
	}
	public function Transfer_Events()
	{
		return $this->belongsToMany(All_Events::class, 'city_all__events', 'city_id', 'all__events_id')->where('event_type', 'Transfer');
	}
	public function Daytour_Events()
	{
		return $this->belongsToMany(All_Events::class, 'city_all__events', 'city_id', 'all__events_id')->where('event_type', 'Daytour');
	}
	public function Package_Events()
	{
		return $this->belongsToMany(All_Events::class, 'city_all__events', 'city_id', 'all__events_id')->where('event_type', 'Package');
	}
	public static function PaginateAllCities()
	{
		return self::query()->paginate(3);
	}
}