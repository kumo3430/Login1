<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuizbankController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class,'login']);

// 登入後的畫面
// '/home'參照app/Http/Providers/RouteServiceProvider
Route::get('/home',[HomeController::class,'controlPanel'])
    ->middleware(['auth', 'verified','auth.role'])
    ->name('home');

Route::get('/userhome', [UserController::class,'userCenter'])
    ->middleware(['auth', 'verified','auth.role'])
    ->name('userhome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/start-test/{quizbank}/{type}',[TestController::class,'startTest'])
        ->name('test.start');

Route::get('/browser-quiz/{quizbank}',[QuizbankController::class,'browser'])
        ->name('quiz.browser');

require __DIR__.'/auth.php';
