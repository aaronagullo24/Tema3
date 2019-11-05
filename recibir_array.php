<?php
include "funciones.php";

//primero recojo la cadena
$cadena_array=$_REQUEST['array'];
  // el método de envio usado. (en el ejemplo un link genera un GET.
  //En el formulario se usa POST podria ser GET tambien ...)

//ahora con la función anteriormente definida genero el array
$array=cadenaurl_a_array($cadena_array);

//Muestro el array
foreach ($array as $indice => $valor){
echo $indice." = ".$valor."<br>";
}
?>