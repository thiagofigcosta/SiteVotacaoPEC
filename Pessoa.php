<?php
abstract class Pessoa {
        private $Nome='';
        private $ContraPec=false;
        private $ContraGreve=false;
        private $ContraOcupacao=false;
        private $Ponderacoes='';

        public function getNome(){
            return $this->Nome;
        }
        public function setNome($Nome){
            $this->Nome=$Nome;
        }

        public function getContraPec(){
            return $this->ContraPec;
        }
        public function setContraPec($ContraPec){
            $this->ContraPec=$ContraPec;
        }

        public function getContraGreve(){
            return $this->ContraGreve;
        }
        public function setContraGreve($ContraGreve){
            $this->ContraGreve=$ContraGreve;
        }

        public function getContraOcupacao(){
            return $this->ContraOcupacao;
        }
        public function setContraOcupacao($ContraOcupacao){
            $this->ContraOcupacao=$ContraOcupacao;
        }

        public function getPonderacoes(){
            return $this->Ponderacoes;
        }
        public function setPonderacoes($Ponderacoes){
            $this->Ponderacoes=$Ponderacoes;
        }
}
