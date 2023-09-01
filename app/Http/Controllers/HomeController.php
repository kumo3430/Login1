<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class HomeController extends Controller
{
    function controlPanel() {
        return Inertia::render('Home');
    }
}