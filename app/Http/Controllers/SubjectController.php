<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubjectService;
use Inertia\Inertia;

class SubjectController extends Controller
{
    function __construct(protected SubjectService $subject){}

    function index()
    {
        $subjects=$this->subject->all();
        $count=$subjects->count();
        return Inertia::render('Home/Banks',
                        [
                         'subjects'=>$subjects,
                         'count'=>$count
                        ]);
    }

    function subjectsInBank($bank_id)
    {
        $subjects=$this->subject->subjectsInBank($bank_id);
        return Inertia::render('Home/Subjects',
                        [
                         'subjects'=>$subjects,
                         'count'=>$subjects->count()
                        ]);
    }
    
    function store(Request $request)
    {
        $this->subject->store($request->input());
        
        //因為我們在表單的欄位中有一個bankId，所以可以直接取出來使用
        return redirect()->route('bank.subjects',$request->bankId);
        // return redirect()->route('subject.store',$request->bankId);
    }

    function edit($id)
    {
        /* 因為新增題目的同時要帶入題庫和題組的資料，所以這題目的表單初始資料
         * 我們交由Service中的subjectEdit函式來產生，再丟去給前端頁面使用
         * 同時我們會讓新增和編輯都在同一個前端檔案中處理*/ 
        return Inertia::render('Home/SubjectForm',
                                $this->subject->subjectEdit($id));
    }

    function update(Request $request,$id)
    {
        $this->subject->update($request->input());
        return redirect()->route('bank.subjects',$request->bankId);
        // return redirect()->route('subject.update',$request->bankId);
    }

    function destroy($id)
    {
        $this->subject->destroy($id);
        return redirect()->back();
    }
}
