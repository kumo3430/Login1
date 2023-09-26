<?php
namespace App\Services;

// use App\Models\Bank; 
use App\Repositories\BankRepository;

class BankService 
{

    function __construct( protected BankRepository $bank){}
    // protected $bank;
    function infos()
    {
        return ['count'=>$this->all()->count()];
    }
    
    function all()
    {
        return $this->bank->all()->map(function($bank){
            $bank->levelC=$bank->levelC;  //取用資料時增加指定級別的中文
            return $bank;
        });
    }

    function find($id)
    {
        $bank=$this->bank->find($id);
        $bank->levelC=$bank->levelC;   //取用資料時增加指定級別的中文
        return $bank;
    }

    function store($bank)
    {
        $this->bank->store($bank);
    }

    function update($bank,$id)
    {
        unset($bank['levelC']); //更新資料時移除附加的級別中文欄位
        $this->bank->update($bank,$id);
    }
    
    function destroy($id)
    {
        $this->bank->destroy($id);
    }
}