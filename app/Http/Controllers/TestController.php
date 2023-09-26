<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    function index() {
        return Inertia::render('Home/Tests');
    }
    function startTest($quizbank,$type) {
        return Inertia::render('StartTest',[
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'username'=>Auth::user()->name??'訪客',
            'role'=>Auth::user()->role??'guest',
            'quizbank'=>$quizbank,
            'type'=>$type
        ]);
    }
}
