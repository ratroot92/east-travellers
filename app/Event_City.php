<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_City extends Model {
	public $table         = 'event__cities';
	protected $primaryKey = 'id';
	protected $guarded    = [];
}
