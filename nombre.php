<?php
$ruta = "./imagenes/";
$directorio = opendir($ruta);
var_dump($directorio);
while ($archivo = readdir($directorio)) {
    if (is_file($ruta . $archivo)) {
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
        $extension = explode(".", $archivo);
        $extension = end($extension);
        if (in_array($extension, $allowedExts)) {
            ?>
            <a href="<?= $_SERVER['PHP_SELF'] . '?imagen=' . $archivo ?>">


    <?php
                echo $archivo . "</a><br>";
            }
        }
    }
    if (isset($_GET['imagen'])) { //envio a si mismo
        echo "<img src='" . $ruta . $_GET['imagen'] . "'>";
    }
    ?>