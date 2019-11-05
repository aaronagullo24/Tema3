<?php

include "funciones.php";



$array=array("algo","nose","otracosa");
//con la función anteriormente definida generamos una cadena
// a partir de un array será esta cadena lo que se enviará a la siguiente página
// a través del valor value del objeto html

$array_en_cadena=array_a_cadena($array);
?>
// Ejemplo  Usando un formulario y campo hidden.

<form action="recibir_array.php" method="POST">
    <input name="array" type="hidden" value="<?php echo $array_en_cadena;?>">
    <input name="enviar" type="submit" value=" Enviar ">
</form>

<?php
//  Ejemplo Usando un link (URL). Hay que usar un GET implícito.
// se debe conocer el formato de envío vía URL de variables
echo "<a href='recibir_array.php?array=$array_en_cadena'>pasar array</a>";
?>