<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
$DNI = "";


if (isset($_POST['darbaja'])) {
    ?>

    <body Style="background-color:mediumspringgreen;">
    <h1>Dar de baja a un empleado</h1>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <select name="seccion">
                <option value="seccion1">seccion 1</option>
                <option value="seccion2">seccion 2</option>
                <option value="seccion3">seccion 3</option>
                <option value="seccion4">seccion 4</option>
                <option value="seccion5">seccion 5</option>
            </select>

            introduce DNI: <input type="text" name="DNI" id="DNI" value="<?php echo $DNI; ?>">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="dar de baja" name="ver" id="ver todo">

        </form>
    </body>
<?php
}



if (isset($_POST['DNI'])) {
    $cadena_datos = $_POST['cadena'];
    $DNI_pasado = $_POST['DNI'];
    $seccion = $_POST['seccion'];
    $arrayd = cadena_a_array($cadena_datos);

    if (isset($arrayd[$seccion][$DNI_pasado])) { //comprobamos si existe
        unset($arrayd[$seccion][$DNI_pasado]); //eliminamos del array
        echo "El trabajador con DNI: " . $DNI_pasado . " a sido eliminado";
    } else {
        echo "EL DNI: " . $DNI_pasado . " no existe en nuestra base de datos";
    }
    $cadena_datos = array_a_cadena($arrayd);
}
boton6($cadena_datos);
