<?php

    Class Pregunta{
        private $id;
        private $opcionUno_fk;
        private $cantUno;
        private $porcentajeUno;
        private $opcionDos_fk;
        private $cantDos;
        private $porcentajeDos;
        private $totalVotos;
    
    function __construct($id, $opcionUno_fk,$cantUno,$porcentajeUno,$opcionDos_fk,$cantDos,$porcentajeDos,$totalVotos){
        $this ->id             = $id;
        $this ->opcionUno_fk   = $opcionUno_fk;
        $this ->cantUno        = $cantUno;
        $this ->porcentajeUno  = $porcentajeUno;
        $this ->opcionDos_fk   = $opcionDos_fk;
        $this ->cantDos        = $cantDos;
        $this ->porcentajeDos  = $porcentajeDos;
        $this ->totalVotos     = $totalVotos;
    }

        public function getId(){
            return $this->id;
        }
 
        public function getOpcionUno_fk(){
            return $this->opcionUno_fk;
        }

        public function getCantUno(){
            return $this->cantUno;
        }

        public function getPorcentajeUno(){
             return $this->porcentajeUno;
        }
 
        public function getOpcionDos_fk(){
            return $this->opcionDos_fk;
        }
 
        public function getCantDos(){
            return $this->cantDos;
        }

        public function getPorcentajeDos(){
            return $this->porcentajeDos;
        }

        public function getTotalVotos(){
            return $this->totalVotos;
        }
    }
?>