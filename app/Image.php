<?php

namespace App;

use App\Activity;
use App\Transfer;
use App\Cruise;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table         = 'images';
    protected $primaryKey = 'id';
    protected $guarded = [];
}