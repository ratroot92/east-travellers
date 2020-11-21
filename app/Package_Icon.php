<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use App\Activity;
class Package_Icon extends Model
{

	 protected $table='package_icons';
	 protected $primaryKey = 'id';

	 protected $fillable = [
        'fkey', 'name', 'of',
    ];



    public function icons_belong_to(){
    	 return $this->belongsTo(Activity::class,'id','fkey');
    }

    // public function transfer_file(){
    // 	 return $this->belongsTo(File::class,'fkey');
    // }

    //  public function cruise_file(){
    // 	 return $this->belongsTo(File::class,'fkey');
    // }


}
