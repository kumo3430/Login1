<?php
namespace App\Services;

use App\Repositories\SubjectRepository;

class SubjectService
{
    
    function __construct( protected SubjectRepository $subject){}

    function all()
    {
        return $this->subject->all();
    }

    function subjectsInBank($bank_id)
    {
        return $this->subject->subjectsInBank($bank_id);
    }
    
    //處理編輯題目時會用到的資料，暫時先簡單寫，後面會再回來補齊
    function subjectEdit($id)
    {
        return  [
                 'bank'=>$bank,
                 'groups'=>$groups,
                 'subject'=>$subject,
                 'header'=>'編輯題目',
                 'button'=>'修改'
                ];
    }
    
    function store($subject)
    {
        $this->subject->create($subject);
    }

    function update($subject)
    {
        $this->subject->update($subject);
    }

    function find($id)
    {
        return $this->subject->find($id);
    }

    function destroy($id)
    {
        $this->subject->destroy($id);
    }
}
