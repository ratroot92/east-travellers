<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\All_Events;

class Event_Icons extends Model
{

    public $table         = 'event__icons';
    protected $primaryKey = 'id';
    protected $guarded    = [];
    public function All_Events()
    {
        return $this->belongsToMany(All_Events::class, 'icon_all__events', 'icon_id', 'all__events_id');
    }
}