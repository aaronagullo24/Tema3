<?php
include_once "funciones.php";

$acumulador=0;
$veces=0;
$cadena="";
$array=[];

if(isset($_POST['numero'])){ //segundas y siguientes

    $numero=$_POST['numero'];
    $acumulador=$_POST['acumulador'];
    $veces=$_POST['veces'];
    $cadena_array=$_POST['cadena_array'];
    $array=cadena_a_array($cadena_array);
    //compruebo datos
    //Opero
    $acumulador=$acumulador+$numero;
    $veces++;
    $array[]=$numero;
    $cadena= "nuevo numero: $numero La suma vale $acumulador y has entrado $veces";
}

$cadena_array=array_a_cadena($array);

?>

<html>
    <head>
</head>
<body>
    <?=$cadena?>
    <?php var_dump($array)?>
    <form method='post' action="<?=$_SERVER['PHP_SELF']?>">
        numero<input type='text' name='numero' id='numero'>
        <input type='hidden' name='acumulador' id='acumulador' value='<?=$acumulador?>'>
        <input type='hidden' name='veces' id='veces'value='<?=$veces?>'>
        <input type='hidden' name='cadena_array' id='cadena_array'value='<?=$cadena_array?>'>
        <br>
        <input type='submit' value="enviar datos" name="enviar" id="Enviar">
    </form>
</body>
</html>