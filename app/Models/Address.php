<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];
    static $cacheKey = 'addresses';
    public function country(){
        return $this->belongsTo(Location::class,'location_id','id');
    }
    public function district(){
        return $this->belongsTo(Location::class,'location_id','id');
    }
    public function locality(){
        return $this->belongsTo(Location::class,'location_id','id');
    }
    public function sublocality(){
        return $this->belongsTo(Location::class,'location_id','id');
    }
    public function pincode(){
        return $this->belongsTo(Location::class,'code','id');
    }
}
