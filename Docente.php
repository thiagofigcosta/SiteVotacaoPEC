<?php
include_once('Pessoa.php');
class Docente extends Pessoa{
    private $CodProf='';
    
    public function getCodProf(){
        return $this->CodProf;
    }
    
    public function setCodProf($CodProf){
        $this->CodProf=$CodProf;
    }
}
