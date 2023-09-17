<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Option;


class HomeController extends Controller
{
    function controlPanel() {
        return Inertia::render('Home/Home');
    }
    function bankList() {
        $subjects = Subject::all();
        $const = Subject::count();
        return Inertia::render('Home/Banks',
        [
            'subjects'=>$subjects,
            'count'=>Subject::count()
        ]);
    }
    function quizList() {
        return Inertia::render('Home/Quizzes');
    }
    function testList() {
        return Inertia::render('Home/Tests');
    }
    function groupList() {
        return Inertia::render('Home/Groups');
    }

    function store(Request $request)
    {
        $subject=new Subject;
        $subject->subject=$request->subject;
        $subject->seq=$request->seq;
        $subject->code=$request->code;
        $subject->level=$request->level;
        $subject->group=$request->group;
        $subject->multiple=$request->multiple;
        $subject->save();

        foreach($request->options as $key => $opt){
            $option=new Option;
            $option->option=$opt;
            $option->subject_id=$subject->id;
            $option->ans=$request->ans[$key];
            $option->save();
        }
        return redirect()->route('home.bank');
    }
}
