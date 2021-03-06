<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\File;
use App\City;
use App\Country;
use App\Category;
use App\Package_Icon;


class Icon extends Model
{

	protected $table='icons';
	 protected $primaryKey = 'id';

     
     
      public function getimage(){
         $instance= $this->hasMany(Image::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'activity');
         return $instance;
    }
     public function getfile(){
       $instance= $this->hasMany(File::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'activity');
         return $instance;
    }
    public function getcity(){
        $instance= $this->hasMany(City::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'activity');
         return $instance;

    }
    public function getcountry()
    {
        
        $instance= $this->hasMany(Country::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'activity');
         return $instance;
    }
   public function getcategory()
    {
        $instance= $this->hasMany(Category::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'activity');
         return $instance;
    }

    public function geticons(){
    	 return $this->belongsTo(Package_Icon::class,'id','fkey');
    }
}
