<?php
include "funciones.php";

$arrayd = [
    "seccion1" => ["22222222D" => ["Apellido" => "Tomas", "Nombre" => "Mario", "horas" => "30", "Salario Neto" => "", "Salario Bruto" => ""]],
    "seccion2" => ["33333333F" => ["Apellido" => "Tomas", "Nombre" => "Mario", "horas" => "40", "Salario Neto" => "", "Salario Bruto" => ""]],
    "seccion3" => ["44444444D" => ["Apellido" => "Tomas", "Nombre" => "Mario", "horas" => "40", "Salario Neto" => "", "Salario Bruto" => ""]],
    "seccion4" => ["55555555D" => ["Apellido" => "Tomas", "Nombre" => "Mario", "horas" => "40", "Salario Neto" => "", "Salario Bruto" => ""]],
    "seccion5" => ["66666666D" => ["Apellido" => "Tomas", "Nombre" => "Mario", "horas" => "40", "Salario Neto" => "", "Salario Bruto" => ""]],

];

//recorremos para calcular el salario

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

$cadena_datos = array_a_cadena($arrayd);
?>

<body Style="background-color:mediumspringgreen;">
    <?php
    boton6($cadena_datos);


    ?>
</body>