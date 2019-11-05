<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];

boton($cadena_datos);
if (isset($_POST['ver'])) {

    $cadena_datos = $_POST['cadena'];
    $arrayd = cadena_a_array($cadena_datos);
    $ven_pasado = $_POST['vendedores'];

    ?>
    <table border="1">
        <tr>
            <td>vendedor</td>
            <?php

                foreach ($arrayd["v1"] as $produc => $din) {
                    ?><td><?php echo $produc; ?> </td><?php
                                                            }

                                                            ?>
        </tr>
        <tr>
            <td><?= $ven_pasado ?></td>
            <?php
                foreach ($arrayd as $vendedor => $coste) {

                    foreach ($arrayd[$vendedor] as $productos => $dinero) {
                        if ($vendedor == $ven_pasado) {
                            //AND PRODUCTO==PRODUCTO_PASADO
                            ?> <td> <?php echo $dinero . "€"; ?>
                        </td>
            <?php
                        }
                    }
                }
                ?>
        </tr>
    <?php
    }
    ?>
    </table>

    <?php

    ?>


    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <select name="vendedores">
            <option value="v1">vendedor 1</option>
            <option value="v2">vendedor 2</option>
            <option value="v3">vendedor 3</option>
            <option value="v4">vendedor 4</option>
            <option value="v5">vendedor 5</option>
            <option value="v6">vendedor 6</option>
            <option value="v7">vendedor 7</option>
            <option value="v8">vendedor 8</option>
            <option value="v9">vendedor 9</option>
            <option value="v10">vendedor 10</option>
            <option value="v11">vendedor 11</option>
            <option value="v12">vendedor 12</option>
            <option value="v13">vendedor 13</option>
            <option value="v14">vendedor 14</option>
            <option value="v15">vendedor 15</option>
            <option value="v16">vendedor 16</option>
            <option value="v17">vendedor 17</option>
            <option value="v18">vendedor 18</option>

        </select>

        <input type="submit" value="buscar" name="ver" id="ver todo">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">

    </form>
  