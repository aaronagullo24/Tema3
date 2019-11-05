<html>

<head>

</head>

<body background="fondo.jpg">
    <h1 style="color:midnightblue">Treasure game</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <select name="dificultad">
            <option value="3">facil</option>
            <option value="4">medio</option>
            <option value="6">dificil</option>
        </select>
        <input type='submit' value="enviar" name="Enviar" id="Enviar">
    </form>

</body>

</html>

<?php
include_once "funciones.php";
$array = [];

$dificultad = isset($_POST['dificultad']) ? $_POST['dificultad'] : 3;
if ($dificultad == 3) {
    $vida = 3;
} else if ($dificultad == 4) {
    $vida = 4;
} else if ($dificultad == 6) {
    $vida = 5;
}

if (isset($_POST['cadena'])) {

    $cadena = $_POST['cadena'];
    $vida = $_POST['vida'];
    $fila = $_POST['fila'];
    $columna = $_POST['columna'];
    $fila_tesor = $_POST['fila_tesor'];
    $columna_tesoro = $_POST['columna_tesoro'];
    $fila_vida = $_POST['fila_vida'];
    $columna_vida = $_POST['columna_vida'];


    $array = cadena_a_array($cadena);

    if ($fila == $fila_vida && $columna_vida == $columna) {
        $array[$fila][$columna] = "vida.png";
        $vida++;
    } else if ($fila == $fila_tesor && $columna_tesoro == $columna) {
        $vida == 0;
        echo "Winner";

        for ($i = 0; $i < $dificultad; $i++) {
            for ($j = 0; $j < $dificultad; $j++) {
                $array[$fila_tesor][$columna_tesoro] = "tesoro.png";
                $array[$fila_vida][$columna_vida] = "vida.png";
                $array[$i][$j] = "error.jpg";
            }
        }

        ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            ¿Quieres volver a jugar? <input type='submit' value="jugar" name="jugar" id="jugar2">
        </form>

    <?php
        } else if ($vida == 1) {
            $vida = 0;
            echo "Looser";
            for ($i = 0; $i < $dificultad; $i++) {
                for ($j = 0; $j < $dificultad; $j++) {
                    $array[$fila_tesor][$columna_tesoro] = "tesoro.png";
                    $array[$fila_vida][$columna_vida] = "vida.png";
                    $array[$i][$j] = "error.jpg";
                }
            }

            ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            ¿Quieres volver a jugar? <input type='submit' value="jugar" name="jugar" id="jugar">
        </form>
<?php
    } else if ($array[$fila][$columna] = "playa.jpg") {
        $array[$fila][$columna] = "error.jpg";
        $vida--;
    }
} else { //primera vez

    for ($i = 0; $i < $dificultad; $i++) {
        for ($j = 0; $j < $dificultad; $j++) {
            $array[$i][$j] = "playa.jpg";
        }
    }
    $fila_tesor = random_int(0, $dificultad - 2);
    $columna_tesoro = random_int(0, $dificultad - 2);
    $fila_vida = random_int(0, $dificultad - 2);
    $columna_vida = random_int(0, $dificultad - 2);

    while ($fila_tesor == $fila_vida && $columna_tesoro == $columna_vida) {
        $fila_vida = random_int(0, $dificultad - 1);
        $columna_vida = random_int(0, $dificultad - 1);
    }
}
?>
<html>

<head>
    <title>TESORO</title>
</head>

<body>

    <table>
        <?php

        $cadena = array_a_cadena($array);
        echo "</br>";
        echo "Vida: " . $vida;

        for ($i = 0; $i < $dificultad; $i++) {
            ?>
            <tr><?php
                    for ($j = 0; $j < $dificultad; $j++) {
                        if ($array[$i][$j] == 'playa.jpg') {
                            ?>
                        <td>
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                                <input type="image" name="<?php echo "f" . $i . "c" . $j ?>" id="<?php echo "f" . $i . "c" . $j ?>" 
                                src="<?php echo $array[$i][$j] ?>" alt="imagen" height="85" width="85">
                                <input type="hidden" name="fila" id="fila" value="<?php echo $i ?>">
                                <input type="hidden" name="columna" id="columna" value="<?php echo $j ?>">
                                <input type="hidden" name="cadena" id="cadena" value="<?php echo $cadena ?>">
                                <input type="hidden" name="vida" id="vida" value="<?php echo $vida ?>">
                                <input type="hidden" name="winner" id="winner" value="<?php echo $winner ?>">

                                <input type="hidden" name="dificultad" id="dificultad" value="<?php echo $dificultad ?>">
                                <input type="hidden" name="fila_tesor" id="fila_tesor" value="<?php echo $fila_tesor ?>">
                                <input type="hidden" name="columna_tesoro" id="columna_tesoro" value="<?php echo $columna_tesoro ?>">
                                <input type="hidden" name="fila_vida" id="fila_vida" value="<?php echo $fila_vida ?>">
                                <input type="hidden" name="perdido" id="perdido" value="<?php echo $perdido ?>">
                                <input type="hidden" name="columna_vida" id="columna_vida" value="<?php echo $columna_vida ?>">
                            </form>

                <?php

                        } else {
                            echo "<td><img src='" . $array[$i][$j] . "' alt='imagen' height='85' width='85'></td>";
                        }
                    }
                }




                ?>
            </tr>




    </table>

</body>

</html>