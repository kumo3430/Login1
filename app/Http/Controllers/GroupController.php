<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GroupController extends Controller
{
    function index() {
        return Inertia::render('Home/Groups');
    }
}
