<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
$DNI = "";
$horas = "";

if (isset($_POST['modificar'])) {
    ?>
    <body Style="background-color:mediumspringgreen;">
    <h1>Modificar a un empleado</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <select name="seccion">
            <option value="seccion1">seccion 1</option>
            <option value="seccion2">seccion 2</option>
            <option value="seccion3">seccion 3</option>
            <option value="seccion4">seccion 4</option>
            <option value="seccion5">seccion 5</option>
        </select>

        introduce DNI: <input type="text" name="DNI" id="DNI" value="<?php echo $DNI; ?>">
        introduce horas: <input type="text" name="horas" id="horas" value="<?php echo $horas; ?>">
        <input type="submit" value="modificar" name="modificar" id="modificar">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">


    </form>
</body>
<?php
}

if (isset($_POST['DNI'])) {
    $cadena_datos = $_POST['cadena'];
    //var_dump($cadena_datos);
    $DNI_pasado = $_POST['DNI'];
    $hora_pasado = $_POST['horas'];
    $seccion = $_POST['seccion'];
    $arrayd = cadena_a_array($cadena_datos);
    foreach ($arrayd[$seccion] as $DNI => $arrayinfo) {
        if ($DNI == $DNI_pasado) {
            $arrayd[$seccion][$DNI_pasado]["horas"] = $hora_pasado;
            $arrayd[$seccion][$DNI]["Salario Neto"] = salario($hora_pasado);
            $arrayd[$seccion][$DNI]["Salario Bruto"] = impuesto($arrayd[$seccion][$DNI]["Salario Neto"]);
            echo "El trabajador con DNI: " . $DNI_pasado . " a sido modificado";
        } else {
            echo "EL DNI: " . $DNI_pasado . " no existe en nuestra base de datos";
        }
    }

    $cadena_datos = array_a_cadena($arrayd);
}
boton6($cadena_datos);
