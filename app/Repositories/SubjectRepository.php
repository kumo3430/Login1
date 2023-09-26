<?php
namespace App\Repositories;

use App\Models\Subject;
use App\MOdels\Option;

class SubjectRepository 
{
    function __construct(protected Subject $subject,
                         protected Option $option){}

    function all()
    {
        return $this->subject->all();
    }

    function find($id)
    {
        return $this->subject->find($id);
    }
    
    function subjectsInBank($bank_id)
    {
        return $this->subject->where('bank_id',$bank_id)->get();
    }

    //在create中拆分不同model需要的資料，
    //再分配給不同model去執行各自的新增功能
    function create($subject)
    {
        //在題目傳入的陣列中取得選項的資料
        $options=$subject['options'];

        //取得題目儲存後的id
        $subjectId=$this->createSubject($subject);
        
        //把題目id分配給選項去做新增
        $this->createOptions($options,$subjectId);
    }

    function createSubject($subject)
    {
        //把前端傳來的駝峰命名欄位轉為資料表的蛇形命名
        $subject['bank_id']=$subject['bankId'];
        $subject['bank_group_id']=$subject['bankGroupId'];
        
        //移除不需要的資料
        unset($subject['bankId'],$subject['bankGroupId'],$subject['options']);
        
        //新增題目進資料表並回傳id
        return $this->subject->create($subject)->id;
    }

    function createOptions($options,$subjectId)
    {
        foreach($options as $option)
        {
            $options['subject_id']=$subjectId;
            $this->option->create($option);
        }
    }

    function update($subject)
    {
        $options=$subject['options'];
        unset($subject['options']);
        $this->subject->updateSubject($subject);
        $this->subject->updateOptions($options);
    }

    function updateSubject($subject)
    {
        $id=$subject['id'];
        $subject['bank_id']=$subject['bankId'];
        $subject['bank_group_id']=$subject['bankGroupId'];
        unset($subject['id'],$subject['bankId'],$subject['bankGroupId']);
        $this->subject->find($id)->update($subject);
    }

    function updateOptions($options)
    {
        foreach($options as $option)
        {
            $id=$option['id'];
            unset($option['id']);
            $this->option->find($id)->update($option);
        }
    }

    function destroy($id)
    {
        $subject=$this->subject->find($id);
        $options=$subject->options;

        $options->map(function($opt){
            $opt->delete();
        });

        $subject->delete();
    }
}