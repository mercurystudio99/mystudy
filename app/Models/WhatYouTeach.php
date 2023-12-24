<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatYouTeach extends Model
{
    use HasFactory;
    protected $guarded = [];
    static $cacheKey = 'what_you_teaches';
    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function sublevel(){
        return $this->belongsTo(SubLevel::class,'sublevel_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
