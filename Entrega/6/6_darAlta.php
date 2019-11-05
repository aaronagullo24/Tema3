<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
$DNI = "";
$horas = "";
$Nombre = "";
$Apellido = "";

if (isset($_POST['daralta'])) {
    ?>

    <body Style="background-color:mediumspringgreen;">
        <h1>Dar de alta un nuevo trabajador</h1>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <select name="seccion">
                <option value="seccion1">seccion 1</option>
                <option value="seccion2">seccion 2</option>
                <option value="seccion3">seccion 3</option>
                <option value="seccion4">seccion 4</option>
                <option value="seccion5">seccion 5</option>
            </select>

            introduce DNI: <input type="text" name="DNI" id="DNI" value="<?php echo $DNI; ?>">
            introduce Horas: <input type="text" name="horas" id="horas" value="<?php echo $horas; ?>">
            Introduce Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $Nombre; ?>">
            Introduce Apellido: <input type="text" name="apellido" id="apellido" value="<?php echo $Apellido; ?>">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="dar de alta" name="ver" id="ver todo">

        </form>
    </body>

<?php
}


if (isset($_POST['DNI'])) {
    $arrayd = cadena_a_array($cadena_datos);

    $cadena_datos = $_POST['cadena'];
    $DNI = $_POST['DNI'];
    $horas = $_POST['horas'];
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellido'];
    $seccion_pasada = $_POST['seccion'];

    if (isset($arrayd[$seccion_pasada][$DNI])) {
        echo "el DNI ya existe";
    } else {
        if ((validar_dni($DNI) == true) && ($horas <= 50 && $horas > 0) && ($Nombre != " ") && ($Apellido != " ")) {
            $salarion = salario($horas);
            $salariob = impuesto(salario($horas));
            $arrayd[$seccion_pasada][$DNI] = ["Apellido" => $Apellido, "Nombre" => $Nombre, "horas" => $horas, "Salario Neto" => $salarion, "Salario Bruto" => $salariob];
            echo "El usuario " . $Nombre . " " . $Apellido . " a sido dado de alta en: " . $seccion_pasada;
        }else{
            echo "Campo erroneo";
        }
    }
    $cadena_datos = array_a_cadena($arrayd);
}

boton6($cadena_datos);
