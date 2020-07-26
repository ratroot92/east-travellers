<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event_Icons;
use App\Event_City;
use App\Event_Category;
use App\Event_Country;
use App\Image;
use App\File;


class All_Events extends Model
{
    public $table         = 'all__events';
    protected $primaryKey = 'id';
    protected $guarded = [];


    public function GET_Images()
    {
        return $this->hasMany(Image::class, 'fkey', 'id');
    }


    public function GET_Files()
    {
        return $this->hasMany(File::class, 'fkey', 'id');
    }
    //NEW
    public function Event_Cities()
    {
        return $this->belongsToMany(Event_City::class, 'city_all__events', 'all__events_id', 'city_id');
    }


    public function Event_Countries()
    {
        return $this->belongsToMany(Event_Country::class, 'country_all__events', 'all__events_id', 'country_id');
    }

    public function Event_Categories()
    {
        return $this->belongsToMany(Event_Category::class, 'category_all__events', 'all__events_id', 'category_id');
    }
    public function Event_Icons()
    {
        return $this->belongsToMany(Event_Icons::class, 'icon_all__events', 'all__events_id', 'icon_id');
    }
}