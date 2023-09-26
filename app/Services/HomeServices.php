<?php
namespace App\Services;

use App\Services\BankService;
use App\Services\GroupService;
use App\Services\TestService;
use App\Services\QuizService;

class HomeServices
{
    protected $items=['bank','group','test','quiz'];  

    function __construct( protected BankService $bank,
                          protected GroupService $group,
                          protected TestService $test,
                          protected QuizService $quiz,){}

    function getInfos()
    {
        $infos=[]; //宣告一個空陣列來裝每個功能回傳的資料
        foreach($this->items as $item)
        {
            $infos[$item]=$this->$item->infos();
        }
        return $infos;
    }
}
