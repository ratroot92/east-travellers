<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\All_Events;

class Event_Category extends Model
{
    public $table         = 'event__categories';
    protected $primaryKey = 'id';
    protected $guarded    = [];

    public function All_Events()
    {
        return $this->belongsToMany(All_Events::class, 'category_all__events', 'category_id', 'all__events_id');
    }
}