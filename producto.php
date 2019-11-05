<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
//  var_dump($_POST);

if (isset($_POST['ver'])) {
    //var_dump($_POST);
    $cadena_datos = $_POST['cadena'];
    $arrayd = cadena_a_array($cadena_datos);
    //var_dump($arrayd);
    $pro_pasado = $_POST['producto'];

    ?>
    <table border="1">
        <tr>
            <td>vendedor</td>
            <?php

                foreach ($arrayd["v1"] as $produc => $din) {
                    if ($produc == $pro_pasado) {
                        ?><td><?php echo $produc; ?> </td><?php
                                                                    }
                                                                }

                                                                ?>
        </tr>
        <tr>

            <?php
                foreach ($arrayd as $vendedor => $coste) {
                    ?> <td> <?php
                                    echo $vendedor;
                                    ?> </td> <?php
                                                    foreach ($arrayd[$vendedor] as $productos => $dinero) {
                                                        if ($productos == $pro_pasado) {
                                                            ?> <td> <?php echo $dinero . "€"; ?>
                        </td>
                <?php

                            }
                        }
                        ?>
        </tr>
    <?php
        }
        ?>
    </table>

<?php
}
?>


<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <select name="producto">
        <option value="Consola">Consola</option>
        <option value="Television">Television</option>
        <option value="Cascos">cascos</option>
        <option value="Mandos">Mandos</option>
        <option value="Coches">Coches</option>
        <option value="Carne">Carne</option>
        <option value="Pescado">Pescado</option>
        <option value="Plantas">Plantas</option>
        <option value="Videojuegos">Videojuegos</option>
        <option value="DVD">DVD</option>

    </select>

    <input type="submit" value="buscar" name="ver" id="ver todo">
    <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">

</form>
<?php boton($cadena_datos); ?>