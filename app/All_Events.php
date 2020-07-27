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
    //price
    public function scopePrice($query, $min, $max)
    {

        if ($max == '000' || $max == 000) {
            return $query->where('price', '>=', $min);
        } else {
            //dd($min, $max);
            return $query->whereBetween('price', [$min, $max]);
        }
    }

    public function scopeActivity($query, $type)
    {
        return $query->where('event_type', '=', $type);
    }




    public function All_Activity_Events($query)
    {
        return $query->where('event_type', '=', 'Activity');
    }
    public function All_Cruise_Events($query)
    {
        return $query->where('event_type', '=', 'Cruise');
    }
    public function All_Transfer_Events($query)
    {
        return $query->where('event_type', '=', 'Transfer');
    }
    public function All_Package_Events($query)
    {
        return $query->where('event_type', '=', 'Package');
    }
    public function All_Daytour_Events($query)
    {
        return $query->where('event_type', '=', 'Daytour');
    }
}