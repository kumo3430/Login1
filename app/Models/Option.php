<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;    
    protected $guarded=[];
    public $timestamps = false;  //不使用timestamp的兩個欄位

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}