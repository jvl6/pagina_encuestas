<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='shortcut icon' type='image/x-icon' href='res/img/favicon.ico' />
    <title>Resultados</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            background-image: url("../res/img/laptop.jpg");
        }
    </style>
</head>
<body>
    <div class="container bg-white rounded">
        <?php
            require_once("../model/Data.php");

            $dat = new Data();

            $resultados = $dat->listarPreguntas();

            echo "<h1>Resultados</h1>";
            echo "<a href='encuesta.php'>Volver</a>";
            echo "<br>";
            foreach($resultados as $res){
                echo "<table class='table table-striped'>";
                    echo "<h3> Pregunta ".$res[0]."</h3>";
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>".$res[1]."</td>";
                            echo "<td>".$res[2]."</td>";
                            echo "<td>".$res[3]."% </td>";
                        echo "</tr>";
                            echo "<tr>";
                                echo "<td>".$res[4]."</td>";
                                echo "<td>".$res[5]."</td>";
                                echo "<td>".$res[6]."% </td>";
                            echo "</tr>";
                    echo "</body>";
                echo "</table>";
                echo "<h6> Total de respuestas: ".$res[7]."</h6>";
                echo "<br>";
            }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>