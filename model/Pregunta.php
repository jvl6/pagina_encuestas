<?php

Class Pregunta{
    private $id;
    private $opcionUnoFk;
    private $opcionDosFk;

    function __construct($id, $opcionUnoFk, $opcionDosFk){
        $this ->id            = $id;
        $this ->opcionUnoFk   = $opcionUnoFk;
        $this ->opcionDosFk   = $opcionDosFk;
    }

    public function getId(){
        return $this->id;
    }
 
    public function setId($id){
        $this->id = $id;
        return $this;
    }
 
    public function getOpcionUnoFk(){
        return $this->opcionUnoFk;
    }

    public function setOpcionUnoFk($opcionUnoFk){
        $this->opcionUnoFk = $opcionUnoFk;
        return $this;
    }

    public function getOpcionDosFk(){
        return $this->opcionDosFk;
    }

    public function setOpcionDosFk($opcionDosFk){
        $this->opcionDosFk = $opcionDosFk;
        return $this;
    }

    }
?>