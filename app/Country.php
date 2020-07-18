<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table='countries';

	 protected $fillable = [
        'fkey', 'name', 'of','created_at','updated_at',
    ];



     public function activity_city(){
    	 return $this->belongsTo(Activity::class,'fkey','id');
    }
}
