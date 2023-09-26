<?php
namespace App\Services;
use App\Repositories\BankRepository;


class TestService 
{
    function __construct( protected BankRepository $bank){}
    function infos(){ return ['count'=>22]; }
}