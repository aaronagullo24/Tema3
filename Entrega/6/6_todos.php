<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
boton6($cadena_datos);
if (isset($_POST['cadena'])) {
    $cadena_datos = $_POST['cadena'];
    $arrayd = cadena_a_array($cadena_datos);

    ?>

    <body Style="background-color:mediumspringgreen;">
        <h1>Ver todos los empleados</h1>
        <table border="1" style="color:blue;">
            <tr>

                <?php

                    foreach ($arrayd as $seccion => $arraysec) {
                        ?>
            <tr>
                <td><?php echo $seccion; ?> </td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>Horas</td>
                <td>Salario Neto</td>
                <td>Salario Bruto</td>

            </tr><?php


                            ?>

            </tr>
            <tr>
                <?php
                        foreach ($arrayd[$seccion] as $DNI => $arrayinfo) {
                            ?> <td> <?php
                                                echo $DNI;
                                                ?> </td> <?php
                                                                        foreach ($arrayinfo as $campo => $info) {

                                                                            ?> <td> <?php echo $info ?>
                        </td>

                    <?php
                                }
                                ?>


            </tr>
    <?php

            }
        }
        ?>
        </table>
    </body>
<?php
}


?>