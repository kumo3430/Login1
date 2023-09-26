<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SubjectController;
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

Route::get('/', [LoginController::class, 'login']);

// 登入後的畫面
// '/home'參照app/Http/Providers/RouteServiceProvider
Route::get('/home', [HomeController::class, 'controlPanel'])
    ->middleware(['auth', 'verified', 'auth.role'])
    ->name('home');

Route::get('/userhome', [UserController::class, 'userCenter'])
    ->middleware(['auth', 'verified', 'auth.role'])
    ->name('userhome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/start-test/{quizbank}/{type}', [TestController::class, 'startTest'])
    ->name('test.start');

Route::get('/browser-quiz/{quizbank}', [QuizbankController::class, 'browser'])
    ->name('quiz.browser');

// Route::get('/home/banks', [HomeController::class, 'bankList'])
//     ->name('home.bank');
// Route::get('/home/quizzes', [HomeController::class, 'quizList'])
//     ->name('home.quiz');
// Route::get('/home/tests', [HomeController::class, 'testList'])
//     ->name('home.test');
// Route::get('/home/groups', [HomeController::class, 'groupList'])
//     ->name('home.group');
Route::get('/home/banks',[BankController::class,'index'])->name('home.banks');
Route::get('/home/quizzes',[QuizController::class,'index'])->name('home.quizzes');
Route::get('/home/tests',[TestController::class,'index'])->name('home.tests');
Route::get('/home/groups',[GroupController::class,'index'])->name('home.groups');


Route::inertia('/home/bank/create', 'Home/CreateBank')->name('bank.create');
// Route::post('/home/bank',[HomeController::class,'store'])->name('bank.store');
Route::get('/subjects',[SubjectController::class,'index'])->name('subject.index');
Route::get('/subject/{bank}/create',[SubjectController::class,'create'])->name('subject.create');
Route::post('/subject',[SubjectController::class,'store'])->name('subject.store');

// Route::get('/home/bank/edit/{id}',[HomeController::class,'edit'])->name('bank.edit');
// Route::put('/home/bank/{id}',[HomeController::class,'update'])->name('bank.update');
// Route::delete('/home/bank/{id}',[HomeController::class,'destroy'])->name('bank.destroy');
Route::get('/subject/edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
Route::put('/subject/{id}',[SubjectController::class,'update'])->name('subject.update');
Route::delete('/subject/{id}',[SubjectController::class,'destroy'])->name('subject.destroy');

//用來顯示某個題庫下的題目
Route::get('/bank/{id}/subjects',[SubjectController::class,'subjectsInBank'])
        ->name('bank.subjects');
//建立題庫的表單畫面
Route::get('/bank/create',[BankController::class,'create'])
        ->name('bank.create');
//儲存新增的題庫資料
Route::post('/bank',[BankController::class,'store'])
        ->name('bank.store');
//顯示編輯指定id的題庫表單
Route::get('/bank/edit/{id}',[BankController::class,'edit'])
        ->name('bank.edit');
//更新指定id的題庫資料
Route::put('/bank/{id}',[BankController::class,'update'])
        ->name('bank.update');
//刪除指定id的題庫資料
Route::delete('/bank/{id}',[BankController::class,'destroy'])
        ->name('bank.destroy');

require __DIR__ . '/auth.php';