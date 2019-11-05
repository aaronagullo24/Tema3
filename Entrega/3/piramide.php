<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <h1>PIRAMIDE: </h1>
    Tamaño de piramide: <input type='text' name="tamaño" id="tamaño"><br>
    <input type='submit' value="enviar" name="Enviar" id="Enviar">

</form>

<?php
if (isset($_POST['tamaño'])) {
    $tamaño = $_POST['tamaño'];//recogemos el numero introducido

    if (!is_numeric($tamaño)) {
        echo "debe ser un numero ";
    } else if ($tamaño < 2) {
        echo "Debe ser mayor de 2";
    } else {
        for ($i = 1; $i <= $tamaño; $i++) {
            for ($j = $tamaño; $j >= 1; $j--) {
                if ($i >= $j) {
                    echo $j;
                } else {
                    echo '&nbsp&nbsp';
                }
            }

            for ($p = 2; $p <= $tamaño; $p++) {
                if ($i >= $p) {
                    echo $p;
                } else {
                    echo '';
                }
            }
            echo "<br>";
        }
    }
}

?>