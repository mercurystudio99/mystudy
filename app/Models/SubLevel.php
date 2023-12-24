<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLevel extends Model
{
    use HasFactory;
    protected $guarded = [];
    static $cacheKey = 'sub_levels';
    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }
}
