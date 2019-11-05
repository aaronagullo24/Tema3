<?php
include "funciones.php";
$opciones = array("piedra", "papel", "tijeras");
$array_jugadas=[];

if (isset($_REQUEST["jugada"] )) {
    $jugadaOrdenador = $opciones[rand(0, 2)];   
    $array_jugadas=cadena_a_array($_REQUEST['cadena_jugadas']);
    
        if ($_REQUEST["jugada"] == $jugadaOrdenador) {
            $resultado = "Empates.";
            $array_jugadas[]=["mi_jugada"=>$_REQUEST["jugada"],"maquina"=>$jugadaOrdenador,"resultado"=>"empate"];

        } else if (($_REQUEST["jugada"]=="piedra" && $jugadaOrdenador == "tijeras") ||
        ($_REQUEST["jugada"] == "tijeras" && $jugadaOrdenador == "papel")||
        ($_REQUEST["jugada"] == "papel" && $jugadaOrdenador == "piedra")) {
            $resultado = "Tu ganas.";
            $array_jugadas[]=["mi_jugada"=>$_REQUEST["jugada"],"maquina"=>$jugadaOrdenador,"resultado"=>"victoria"];

        } else {
             $resultado = "Gano yo.";
             $array_jugadas[]=["mi_jugada"=>$_REQUEST["jugada"],"maquina"=>$jugadaOrdenador,"resultado"=>"derrote"];
    }
}
    var_dump($array_jugadas);
    $cadena_jugadas=array_a_cadena($array_jugadas);
?>

<html>
<head>
<title>Piedra, papel o tijera</title>
</head>
<body>

<?php
echo isset($_REQUEST["jugada"])?"Has elegido {$_REQUEST['jugada']}, yo he
elegido $jugadaOrdenador $resultado <br>¿Quieres jugar otra vez?<br>":"";
?>
<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
Piedra<input type="radio" name="jugada" value="piedra">
Papel<input type="radio" name="jugada" value="papel">
Tijera<input type="radio" name="jugada" value="tijeras">
<input type="hidden" name="cadena_jugadas" value="<?=$cadena_jugadas?>">
<input type="submit" value="Jugar">
</form>
</body>
</head>
</html>