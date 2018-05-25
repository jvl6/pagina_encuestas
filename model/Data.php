<?php
    require_once("Conexion.php"); // Import 1
    require_once("OpcionUno.php");  // Import 2
    require_once("OpcionDos.php"); // Import 3
    require_once("Pregunta.php"); // Import 4

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

    public function crearOpcionUno($nombre,$votos){
        $query = "INSERT INTO opcionUno VALUES(NULL,'$nombre','$votos')";
        $this ->con->conectar();
        $this ->con->ejecutar($query);
        $this ->con->desconectar();
    }

    public function crearOpcionDos(){
        $query = "INSERT INTO opcionDos VALUES(NULL,'$nombre','$votos')";
        $this ->con->conectar();
        $this ->con->ejecutar($query);
        $this ->con->desconectar();
    }

    public function getIdOPUno($nombre){
        $query = "SELECT id FROM opcionUno WHERE nombre = '$nombre'";

        $this ->con->conectar();
        $rs = $this ->con ->ejecutar($query);

        $opcuno = null;

        if($reg = $rs ->fetch_array()){
            $opcuno = $reg[0];
        }

        $this ->con->desconectar();

        return $opcuno;
    }
    
    public function getIdOPDos($nombre){
        $query = "SELECT id FROM opcionDos WHERE nombre = '$nombre'";

        $this ->con->conectar();
        $rs = $this ->con ->ejecutar($query);

        $opcdos = null;

        if($reg = $rs ->fetch_array()){
            $opcdos = $reg[0];
        }

        $this ->con->desconectar();

        return $opcdos;
    }

    public function listarPreguntas(){
        # Usamos una vista para mostrar
        # o con un simple select * from?
    }

    public function listarOpciones(){
        # TO DO
    }

    public function mostratStatsUno(){
        # No se como callear una function en mysequel. :'(
        # Es igual a tsql?
    }

    public function mostrarStatsDos(){
        # TO DO
    }

    }
?>
