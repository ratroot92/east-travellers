<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\All_Events;
class City extends Model {
	protected $table      = 'cities';
	protected $foreignKey = 'fkey';
	protected $fillable   = [
		'fkey', 'name', 'of',
	];

	public function activities() {
		return $this->belongsToMany('App\Activity');
	}

	public function GetCityActivities(){
        return $this->belongsToMany(All_Events::class,'city_all__events','city_id','all__events_id');
    }

}
