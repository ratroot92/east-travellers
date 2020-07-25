<?php

namespace App;
use App\All_Events;
use Illuminate\Database\Eloquent\Model;

class City extends Model {
	protected $table      = 'cities';
	protected $foreignKey = 'fkey';
	protected $fillable   = [
		'fkey', 'name', 'of',
	];

	//
	public function GetEventsbyCityName() {

		return $this->belongsToMany(All_Events::class , 'city_all__events', 'city_id', 'all__events_id');
	}
	public function GetEventsbyCityNames() {

		return $this->belongsToMany(All_Events::class , 'city_all__events', 'all__events_id', 'city_id');
	}

}
