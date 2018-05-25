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
        $query = "SELECT * FROM listado";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);
        $listaP = array();

        while($reg = $rs->fetch_array()){
            $listaP[] = $reg;
        }

        $this->con->desconectar();

        return $listaP;
    }

    public function agregarVoto($id, $opc){
        $queryCant;
        $cant;
        $query;

        $this->con->conectar();

        if($opc == 1){
            $queryCant = "SELECT cantUno FROM pregunta WHERE id = $id";
            $rsCant = $this->con->ejecutar($queryCant);

            if($reg = $rsCant->fetch_array()){
                $cant = $reg[0] + 1;
            }

            $query = "UPDATE pregunta SET cantUno = $cant WHERE id = $id";
            $this->con->ejecutar($query);
        }

        if($opc == 2){
            $queryCant = "SELECT cantDos FROM pregunta WHERE id = $id";
            $rsCant = $this->con->ejecutar($queryCant);

            if($reg = $rsCant->fetch_array()){
                $cant = $reg[0] + 1;
            }

            $query = "UPDATE pregunta SET cantDos = $cant WHERE id = $id";
            $this->con->ejecutar($query);
        }

        $this->con->desconectar();
    }
    
    }
?>
