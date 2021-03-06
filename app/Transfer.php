<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\File;
use App\Package_Icon;
class Transfer extends Model
{
    
     
      public function getimage(){
         $instance= $this->hasMany(Image::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'transfer');
         return $instance;
    }
     public function getfile(){
       $instance= $this->hasMany(File::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'transfer');
         return $instance;
    }
    public function getcity(){
        $instance= $this->hasMany(City::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'transfer');
         return $instance;

    }
    public function getcountry()
    {
        
        $instance= $this->hasMany(Country::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'transfer');
         return $instance;
    }
   public function getcategory()
    {
        $instance= $this->hasMany(Category::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'transfer');
         return $instance;
    }
    public function geticons(){
        $instance= $this->hasMany(Package_Icon::class,'fkey','id');
         $instance->getQuery()->where('of','=', 'transfer');
         return $instance;
    }
}
