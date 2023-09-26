<?php
namespace App\Repositories;

use App\Models\Bank;

class BankRepository 
{
    function __construct(protected Bank $bank){}

    function all(){ return $this->bank->all(); }

    function store($bank){ $this->bank->insert($bank); }

    function find($id){ return $this->bank->find($id); }

    function update($bank,$id){ $this->find($id)->update($bank); }

    function destroy($id){ $this->bank->find($id)->delete();}
}