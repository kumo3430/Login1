<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Subject;
use App\Services\BankService;


class BankController extends Controller
{
    
    function __construct(protected BankService $bank){}

    function index(){
        $all=$this->bank->all();

        return Inertia::render('Home/Banks',[
            'count'=>$all->count(),
            'banks'=>$all
        ]);
    }

    function create()
    {
        return Inertia::render('Home/BankForm');
    }

    function store(Request $request)
    {
        $this->bank->store($request->input());
        return redirect()->route('home.banks');
    }

    function edit($id)
    {
        return Inertia::render('Home/BankForm',[
            'header'=>'編輯題庫',
            'button'=>'修改',
            'bank'=>$this->bank->find($id) //取得資料
        ]);
    }

    function update(Request $request,$id)
    {
        $this->bank->update($request->input(),$id);
        return redirect()->route('home.banks');
    }

    function destroy($id)
    {
        $this->bank->destroy($id);
        return redirect()->back();
    }
}
