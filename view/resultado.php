<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
</head>
<body>
    
    <?php 
        require_once("../model/Data.php");

         $dat = new Data();

         $resultados = $dat->listarPreguntas();

         echo "<h2>Resultados</h2>";
         echo "<table border='1'>";
         foreach($resultados as $res){
             echo "<h3> Pregunta ".$res->id."</h3>";
             echo "<tr>";
                 echo "<td>".$res->opuno."</td>";
                 echo "<td>".$res->cantUno."</td>";
             echo "</tr>";
                echo "<tr>";
                    echo "<td>".$res->opdos."</td>";
                    echo "<td>".$res->cantDos."</td>";
                echo "</tr>";
            echo "<h3> Total de respuestas ".$res->id."</h3>";
         }
         echo "</table>";
    ?>
</body>
</html>