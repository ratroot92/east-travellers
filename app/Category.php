<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

	 protected $fillable = [
        'fkey', 'name', 'of','created_at','updated_at',
    ];



     public function activity_category(){
    	 return $this->belongsTo(Activity::class,'fkey','id');
    }
}
