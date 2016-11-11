<?php

class Discente extends Pessoa{
    private $Matricula='';
    
    public function getMatricula(){
        return $this->Matricula;
    }
    
    public function setMatricula($Matricula){
        $this->Matricula=$Matricula;
    }
}
