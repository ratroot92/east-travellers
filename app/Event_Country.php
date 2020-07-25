<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Country extends Model {
	public $table         = 'event__countries';
	protected $primaryKey = 'id';
	protected $guarded    = [];
}
