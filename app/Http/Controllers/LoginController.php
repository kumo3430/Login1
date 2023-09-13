<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function login()
    {
        return Inertia::render('Login', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'username' => Auth::user()->name ?? '訪客',
            'role' => Auth::user()->role ?? 'guest',
        ]);
    }
}
