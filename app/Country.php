<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

	protected $table = 'countries';

	protected $fillable = [
		'fkey', 'name', 'of', 'created_at', 'updated_at',
	];

	public function GetEventsbyCountryName() {

		return $this->belongsToMany(All_Events::class , 'country_all__events', 'country_id', 'all__events_id');
	}
}
