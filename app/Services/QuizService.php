<?php
namespace App\Services;
use App\Repositories\BankRepository;
class QuizService 
{
    function __construct( protected BankRepository $bank){}
    function infos(){ return ['count'=>30]; }
}