<html>

<head>
    <title>"FECHA"</title>
</head>

<body>
    <form method='POST' action='<?= $_SERVER['PHP_SELF'] ?>'>
        Fecha: <input type='text' name='fecha' id='fecha'><br>
        <p></p>
        <input type='submit' value="enviar" name="Enviar" id="Enviar">

    </form>

    <?php
    include "funciones.php";
    if (isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];

        if (strpos($fecha, "/") == true) {
            $delimitador = strpos($fecha, "/");
            $dia = substr($fecha, 0, $delimitador);
            $deli = strpos($fecha, "/", $delimitador + 1);
            $mes = substr($fecha, $delimitador + 1, ($deli - $delimitador) - 1);
            $año = substr($fecha, $deli + 1, (strlen($fecha) - $deli) - 1);
            if (es_numero($dia) && es_numero($mes) && es_numero(($año))) {
                fecha_correcta($dia, $mes, $año);
                echo $fecha;
            } else {
                echo "Fecha mal escrita";
            }
        } else {
            $fecha = $_POST['fecha'];
            if (strpos($fecha, "-") == true) {
                $delimitador = strpos($fecha, "-");
                $dia = substr($fecha, 0, $delimitador);
                $deli = strpos($fecha, "-", $delimitador + 1);
                $mes = substr($fecha, $delimitador + 1, ($deli - $delimitador) - 1);
                $año = substr($fecha, $deli + 1, (strlen($fecha) - $deli) - 1);
                if (es_numero($dia) && es_numero($mes) && es_numero(($año))) {
                    fecha_correcta($dia, $mes, $año);
                    echo $fecha;
                } else {
                    echo "Fecha mal escrita";
                }
            }
        }
    }

    function bisiesto($año, $dia) //comprobamos que el año es bisiesto y que tiene 29 dias
    {
        if ((($año % 4 == 0 && $año % 100 != 0) || $año % 400 == 0) && $dia == 29)
            return true;
    }
    function fecha_correcta($dia, $mes, $año)
    {
        if (bisiesto($año, $dia)) {
            echo "año bisiesto ";
        } else if (($dia < 1 || $dia > 31) || ($dia > 28 && $mes == 2) || ($dia > 30 && $mes == 4) || ($dia > 30 && $mes == 6) || ($dia > 30 && $mes == 9) || ($dia > 30 && $mes == 11)) {
            echo "Fecha incorrecta ";
        } else if ($mes < 1 || $mes > 12) {
            echo "Mes incorrecto ";
        } else if ($año <= 0) {
            echo "año incorrecta ";
        } else if ($año > 9999) {
            echo "año incorrecta ";
        } else {
            echo "Fecha correcta ";
        }
    }


    ?>
</body>

</html>