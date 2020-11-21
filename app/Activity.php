<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {

	public $table         = 'activities';
	protected $primaryKey = 'id';

	public function getimage() {
		$instance = $this->hasMany(Image::class , 'fkey', 'id');
		$instance->getQuery()->where('of', '=', 'activity');
		return $instance;
	}
	public function getfile() {
		$instance = $this->hasMany(File::class , 'fkey', 'id');
		$instance->getQuery()->where('of', '=', 'activity');
		return $instance;
	}
	public function getcity() {
		return $this->hasMany('App\City', 'fkey', 'id');
	}
	// public function cities() {
	// 	return City::where('fkey', $this->id)->first()->name;
	// }

	public function getcountry() {
		return $this->hasMany('App\Country', 'fkey', 'id');
	}
	public function getcategory() {
		return $this->hasMany('App\Category', 'fkey', 'id');
	}

	public function geticons() {
		$instance = $this->hasMany(Package_Icon::class , 'fkey', 'id');
		$instance->getQuery()->where('of', '=', 'activity');
		return $instance;
	}
	public function cities() {
		return $this->belongsToMany('App\City');
	}

}
