<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    function userCenter(){
        return Inertia::render('UserHome');
    }
}
