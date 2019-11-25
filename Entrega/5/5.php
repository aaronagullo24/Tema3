<?php
include "funciones.php";

$arrayd = [
    "v1" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "1"],
    "v2" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v3" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v4" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v5" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v6" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v7" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v8" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v9" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v10" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v11" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v12" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v13" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v14" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v15" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v16" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v17" => ["Consola" => "1112", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "0", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "12", "DVD" => "12121"],
    "v18" => ["Consola" => "0", "Television" => "12212", "Cascos" => "32322", "Mandos" => "323", "Coches" => "302930", "Carne" => "121121", "Pescado" => "1211", "Plantas" => "323232", "Videojuegos" => "13", "DVD" => "3"]
];

$cadena_datos = array_a_cadena($arrayd);

if (isset($_POST['ver'])) {
    $suma = 0;
    $cadena_datos = $_POST['cadena'];
    $arrayd = cadena_a_array($cadena_datos);
    ?>
    <table border="1">
        <tr>
            <td>vendedor</td>
            <?php

                foreach ($arrayd["v1"] as $produc => $din) {
                    ?><td><?php echo $produc; ?> </td><?php
                                                            }

                                                            ?>
            <td>Total</td>
        </tr>
        <tr>
            <?php
                foreach ($arrayd as $vendedor => $coste) {
                    ?> <td> <?php
                                    echo $vendedor;
                                    ?> </td> <?php
                                                        foreach ($arrayd[$vendedor] as $productos => $dinero) {
                                                            $suma += $dinero;
                                                            ?> <td> <?php echo $dinero . "€"; ?>
                    </td>

                <?php
                        }
                        ?>

                <td><?= $suma ?>€</td>
        </tr>
    <?php
            $suma = 0;
        }
        ?>
    </table>
<?php
    $cadena_datos = array_a_cadena($arrayd);
}
//var_dump($array);  

boton($cadena_datos);
?>