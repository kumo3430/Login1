<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class QuizbankController extends Controller
{
    function browser($quizbank) {
        return Inertia::render('BrowserQuizBank',[
            'canLogin' => Route::has('login'),
            'canRegister' => Route::hsa('register'),
            'username'=>Auth::user()->name??'訪客',
            'role'=>Auth::user()->role??'guest',
            'quizbank'=>$quizbank,
        ]);
    }
}
