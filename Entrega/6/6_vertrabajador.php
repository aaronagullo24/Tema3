<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
$sec_pasado = " ";

boton6($cadena_datos);

if (isset($_POST['seccion'])) {
    //var_dump($_POST);
    $cadena_datos = $_POST['cadena'];
    $arrayd = cadena_a_array($cadena_datos);
    $sec_pasado = $_POST['seccion'];
    $salarioN_total = 0;
    $salarioB_total = 0;
    $hora = 0;

    //calculamos el sueldo
    foreach ($arrayd as $seccion => $arraysec) {
        foreach ($arrayd[$seccion] as $DNI => $arrayinfo) {
            foreach ($arrayinfo as $campo => $info) {
                if ($campo == "horas") {
                    $arrayd[$seccion][$DNI]["Salario Neto"] = salario($info);
                    $arrayd[$seccion][$DNI]["Salario Bruto"] = impuesto($arrayd[$seccion][$DNI]["Salario Neto"]);
                }
            }
        }
    }

    ?>


    <table border="1" style="color:blue;text-align:rigth;">

        <tr>
            <td>DNI</td>
            <td>Apellido</td>
            <td>Nombre</td>
            <td>Horas</td>
            <td>Salario Neto</td>
            <td>Salario Bruto</td>
        </tr>
        <tr>
            <?php
                foreach ($arrayd[$sec_pasado] as $DNI => $arrayinfo) {
                    ?> <td> <?php
                                    echo $DNI;
                                    ?> </td> <?php
                                                            foreach ($arrayinfo as $campo => $info) {
                                                                if ($campo == "Salario Neto") {
                                                                    $salarioN_total += $info;
                                                                }
                                                                if ($campo == "Salario Bruto") {
                                                                    $salarioB_total += $info;
                                                                }
                                                                if ($campo == "horas") {
                                                                    $hora += $info;
                                                                }
                                                                ?> <td> <?php echo $info ?>
                    </td>

                <?php
                        }

                        ?>


        </tr>

    <?php

        }
        ?>
    <tr>
        <td>salario neto total:<?= $salarioN_total ?></td>
    </tr>
    <tr>
        <td>salario bruto total:<?= $salarioB_total ?></td>
    </tr>
    <tr>
        <td>Horas total:<?= $hora ?></td>
    </tr>
    </table>
<?php
}


?>

<body Style="background-color:mediumspringgreen;">
    <h1>Ver los trabajadores por seccion</h1>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <select name="seccion">
            <option value="seccion1">seccion 1</option>
            <option value="seccion2">seccion 2</option>
            <option value="seccion3">seccion 3</option>
            <option value="seccion4">seccion 4</option>
            <option value="seccion5">seccion 5</option>
        </select>

        <input type="submit" value="buscar" name="ver" id="ver todo">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">

    </form>
</body>