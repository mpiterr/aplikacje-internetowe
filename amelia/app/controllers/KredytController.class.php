<?php

namespace app\controllers;

use core\App;
use app\forms\Data;
use core\ParamUtils;
use core\Utils;

class KredytController{
    private $data;
    private $result;

    public function __construct() {
        $this->data = new Data();
    }
    
    public function action_start() {   
        $this->generateView();  
    }
    
    public function action_calc() {
        $this->data->kwotakredytu = ParamUtils::getFromRequest('kwotakredytu');
        
        $this->data->okreskredytu = ParamUtils::getFromRequest('okreskredytu');

        $this->data->oprocentowanie = ParamUtils::getFromRequest('oprocentowanie');

        if($this->isValid()) {
            $this->oblicz();
        }

        $this->generateView();
    }

    private function isValid() {
        if (empty($this->data->kwotakredytu)) {
            Utils::addErrorMessage('Błędna kwota kredytu');
        }
        if (empty($this->data->okreskredytu)) {
            Utils::addErrorMessage('Błąd długości trwania kredytu');
        }
        if (empty($this->data->oprocentowanie)) {
            Utils::addErrorMessage('Błędne oprocentowanie');
        }
        if (App::getMessages()->isError()){
            return false;
        }
        if (! is_numeric($this->data->kwotakredytu)) {
            Utils::addErrorMessage('Podana kwota kredytu nie jest liczbą');
        }
        if (! is_numeric($this->data->okreskredytu)) {
            Utils::addErrorMessage('Podana długośc kredytu nie jest liczbą');
        }
        if (! is_numeric($this->data->oprocentowanie)) {
            Utils::addErrorMessage('Podane oporcentowanie nie jest liczba');
        }

        return !App::getMessages()->isError();
    }

    private function oblicz() {
        $kwotakredytu = intval($this->data->kwotakredytu);
	    $oprocnetowanie = intval($this->data->oprocentowanie);
	    $okreskredytu = intval($this->data->okreskredytu);

	    if ($kwotakredytu <= 0) {
            Utils::addErrorMessage('Kwota kredytu jest mniejsza od 0');
	    }
	
	    if ($oprocnetowanie <= 0 || $oprocnetowanie >= 100) {
            Utils::addErrorMessage('Oprocentowanie jest mniejsze od 0');
	    }
	
	    if ($okreskredytu < 0) {
            Utils::addErrorMessage('Lata kredytu nie mogą być mniejsze od 1');
	    }
        if (App::getMessages()->isError()){
            return;
        }
        //obliczenia
        $s = (1+(($oprocnetowanie/100)/12));
        $a = ($s**($okreskredytu*12));
        $b = ($s-1);
        $c = ($s**($okreskredytu*12)-1);
         
        $this->result = round($kwotakredytu*$a*$b/$c, 2);
        
        Utils::addInfoMessage('Parametry zostały przekazane');
        Utils::addInfoMessage('Obliczenia zostaną wykonane');

        App::getSmarty()->assign("result", $this->result);
    }

    private function generateView() {
        App::getSmarty()->assign("data", $this->data);
        App::getSmarty()->display("Kalkulator.tpl"); 
    }
}