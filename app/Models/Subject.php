<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    static $cacheKey = 'subjects';
    public function sublevel(){
        return $this->belongsTo(SubLevel::class,'sublevel_id');
    }
}
