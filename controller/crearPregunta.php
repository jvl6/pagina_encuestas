<?php
    require_once("../model/Data.php");

    $opUno = $_REQUEST["opcionUno"];
    $opDos = $_REQUEST["opcionDos"];

    $dat = new Data();

    session_start();

    $dat->crearPregunta($opUno,$opDos);

    $men = $_SESSION["mensaje"] = "Pregunta creada.";
    
    echo $men;
    
    unset($_SESSION["mensaje"]);
?>

<a href="../index.php">Volver</a>