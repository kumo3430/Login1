<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Bank extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps = false;
    
    //建立一個level值對應的中文字陣列
    protected $levelc=["A"=>"甲",
                       "B"=>"乙",
                       "C"=>"丙",
                       "D"=>"單一"];
                        
    function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    
    //使用Attribute類別的功能，增加一個屬性levelC
    //levelC的結果會是回傳一個中文字
    protected function levelC():Attribute
    {
        return Attribute::make(  
            get:fn($value,$attributes)=>$this->levelc[$attributes['level']],
        );
    }

}