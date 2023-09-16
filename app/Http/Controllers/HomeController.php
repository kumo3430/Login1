<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class HomeController extends Controller
{
    function controlPanel() {
        return Inertia::render('Home/Home');
    }
    function bankList() {
        return Inertia::render('Home/Banks');
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
}
