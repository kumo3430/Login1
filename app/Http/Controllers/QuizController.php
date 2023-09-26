<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
class QuizController extends Controller
{
    function index() {
        return Inertia::render('Home/Quizzes');
    }
}
