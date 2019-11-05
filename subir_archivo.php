<?php
$temporal = $_FILES["miarchivo"]["tmp_name"];
$destino = "imagenes/" . $_FILES["miarchivo"]["name"];
if (move_uploaded_file($temporal, $destino)) {
    echo "Archivo subido con éxito";
} else {
    echo "Ocurrió un error, no se ha podido subir el archivo";
}
?>