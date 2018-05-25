<?php
    require_once("../model/Data.php");

    $d = new Data();

    $id = $_REQUEST["id"];
    $opc = $_REQUEST["opc"];

    $d->agregarVoto($id, $opc);

    session_start();
    $men = $_SESSION["mensaje"] = "Voto registrado.";
    echo $men;
    unset($_SESSION["mensaje"]);
?>