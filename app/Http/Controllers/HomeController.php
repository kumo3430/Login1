<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Option;
// use App\Services\HomeServices;
use App\Services\HomeServices;

class HomeController extends Controller
{

    function __construct( protected HomeServices $home){}

    function controlPanel() {
        $infos=$this->home->getInfos();
        return Inertia::render('Home/Home',['infos'=>$infos]);
    }

    // function controlPanel() {
    //     return Inertia::render('Home/Home');
    // }
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

    function edit($id) {
        $subject=Subject::find($id);
        $options=$subject->options;
        return Inertia::render('Home/EditBank',
        [
            'subject'=>$subject,
            'options'=>$options
        ]);
    }

    function update(Request $request,$id) {
        $subject=Subject::find($id);
        $subject->subject=$request->subject;
        $subject->seq=$request->seq;
        $subject->code=$request->code;
        $subject->level=$request->level;
        $subject->group=$request->group;
        $subject->multiple=$request->multiple;
        $subject->save();

        foreach($request->options as $key => $opt) {
            $option=Option::find($opt['id']);
            $option->option=$opt['option'];
            $option->ans=$opt['ans'];
            $option->save();
        }
        return redirect()->route('home.bank');
    }

    function destroy($id) {
        $subject=Subject::find($id);
        $options= $subject->options;
        $subject->delete();
        $options->map(function($opt){
            $opt->delete();
        });
    }
}
