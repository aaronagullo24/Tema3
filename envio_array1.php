<?php
$array=[2,3,4,5,'aa'];

?>

<form method='POST' action='envio_array2.php'>

    <?php
    $cadena="";
    $separador="||";
    for($i=0;$i<count($array);$i++){
        $cadena=$cadena. $array[$i]. $separador;
    }
    echo $cadena;
    ?>

    <input type='hidden' name='cad_array' id='cad_array' value='<?=$cadena?>';>
    <input type='hidden' name='tam' id='tam' value='<?=$i?>';>
     <input type='submit' value="enviar" name="Enviar" id="Enviar" >
</form>