<?php

Class OpcionDos{
    private $id;
    private $nombre;
    private $votos;

    function __construct($id, $nombre, $votos){
        $this ->id       = $id;
        $this ->nombre   = $nombre;
        $this ->votos    = $votos;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function getVotos(){
        return $this->votos;
    }

    public function setVotos($votos){
        $this->votos = $votos;
        return $this;
    }
}

?>