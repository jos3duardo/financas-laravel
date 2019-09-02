<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Recebe um data no formato de String e converte no padrão de date para salvar no DB
     * @author Jos3duardo
     * @param $date
     * @return string
     */
    public function dateParse($date){
        //DD/MM/YYY -> YYYY-MM-DD
        $dateArray = explode('/', $date);
        // [dd, mm, yyyy]
        $dateArray = array_reverse($dateArray);
        //[yyyy-mm-dd]
        return implode('-',$dateArray);
    }

    /**
     * Recebe uma string e retorna um numero formatado sem virgula
     * @param $number
     * @return mixed
     */
    public function numberParse($number){
        //1.000,58 -> 1000.58
        $newNumber = str_replace('.','',$number);
        $newNumber = str_replace(',','.',$newNumber);
        return $newNumber;
    }
}
