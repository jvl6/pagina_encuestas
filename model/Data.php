<?php
    require_once("Conexion.php"); // Import 1
    require_once("Pregunta.php"); // Import 2

    Class Data{
        private $con;
  
    public function __construct(){
        $this ->con = new Conexion("bd_encuesta");
    }

    public function crearPregunta($opcionUno,$opcionDos){
        $query = "CALL insertarPregunta ('$opcionUno', '$opcionDos')";
        $this ->con->conectar();
        $this ->con->ejecutar($query);
        $this ->con->desconectar();
    }

    public function listarPreguntas(){
        $query = "SELECT * FROM vista_preguntas";

        $listaP = array();

        $this->con->conectar();

        $rs = $this->con->ejecutar($query);

        while($obj = $rs->fetch_object()){
            array_push($listaP, $obj);
        }

        $this->con->desconectar();

        return $listaP;
    }
    
    }
?>
