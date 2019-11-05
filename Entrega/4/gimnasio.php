<?php
include "funciones.php";

function generaCalorias($minutos)
{
    $calorias = 0;
    switch ($minutos) {
        case ($minutos > 60):
            $calorias += ($minutos - 60) * 8;
            $minutos = 60;

        case ($minutos <= 60 && $minutos >= 51):
            $calorias += ($minutos - 50) * 8;
            $minutos = 50;

        case ($minutos <= 50 && $minutos >= 41):
            $calorias += ($minutos - 40) * 7;
            $minutos = 40;


        case ($minutos <= 40 && $minutos >= 31):
            $calorias += ($minutos - 30) * 6;
            $minutos = 30;

        case ($minutos <= 30 && $minutos >= 21):
            $calorias += ($minutos - 20) * 5;
            $minutos = 20;

        case ($minutos <= 20 && $minutos >= 11):
            $calorias += ($minutos - 10) * 4;
            $minutos = 10;


        case ($minutos >= 2 && $minutos <= 10):
            $calorias += ($minutos - 1) * 3;
            $minutos = 1;


        case ($minutos = 1):
            $calorias += 2;
    }
    return $calorias;
}


$cadena = "";
$minutos = 0;
$cal = 0;
$calorias = [];
if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    $cadena = $_POST['cadena'];
    $array = cadena_a_array($cadena);
    $array[] = $numero;

    if ($numero == 0) {
        $minutos = 0;
        $calorias = 0;
        for ($i = 0; $i < count($array) && $array[$i] != 0; $i++) {
            echo "tiempo de sesion " . ($i + 1) . " a sido: ";
            $minutos = $minutos + $array[$i];
            echo $array[$i] ." minutos, ";
            $cal = generaCalorias($array[$i]);
            echo "calorias perdidas: " . $cal . "<br>";
            $calorias = $calorias + $cal;
        }
        echo "Total calorias quemadas " . $calorias . " Tiempo invertido " . $minutos." minutos";
    }
    $cadena = array_a_cadena($array);
}

?>
    <html>
    <header>
        <title>

        </title>
    </header>

    <body>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            Minutos: <input type="text" name="numero" id="numero">
            <input type="hidden" name="cadena" id="cadena" value="<?= $cadena ?>">
            <input type="submit" value="Enviar Datos" name="enviar" id="enviar">
        </form>
    </body>

    </html>