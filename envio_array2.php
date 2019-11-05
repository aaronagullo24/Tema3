<?php


$cadena=$_POST['cad_array'];
echo $cadena;
//var_dump(unserialize($cadena));

function cadena_a_array($cadena,$separador){
    $array=array();
    $inicio=0;
    while($inicio < strlen($cadena)){
        $pos_fin = strpos($cadena,$separador,$inicio);
        $array[]=substr($cadena,$inicio,$pos_fin-$inicio);

        $inicio=$pos_fin + strlen($separador);
    }
    return $array;
}

$resultado=cadena_a_array($cadena,"||");
var_dump($resultado);
  
    
?>


