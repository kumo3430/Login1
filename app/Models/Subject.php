<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden=['created_at','updated_at'];

    function options()
    {
       return $this->hasMany(Option::class);
    }

    function bank()
{
    return $this->belongsTo(Bank::class);
}
}