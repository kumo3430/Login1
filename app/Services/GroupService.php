<?php
namespace App\Services;
use App\Repositories\BankRepository;
class GroupService 
{
    function __construct( protected BankRepository $bank){}
    function infos(){ return ['count'=>10]; }
}