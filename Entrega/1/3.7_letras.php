<html>

<head>
    <title>"Codificacion"</title>
</head>

<body>
    <form method='POST' action='<?= $_SERVER['PHP_SELF'] ?>'>
        <h1>Introduce la frase: </h1>
        Frase: <input type='text' name='frase' id='frase'><br>
        Desplazamiento: <input type='text' name='desplazamineto' id='desplazamineto'><br>
        <p></p>
        <input type='submit' value="enviar" name="Enviar" id="Enviar">

    </form>

    <?php
    include "funciones.php";
    if (isset($_POST['frase'])) { //comprobamos que existen las variables



        $frase = strtolower($_POST['frase']);
        $desplazamiento = $_POST['desplazamineto'];
        $letra = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'K', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

        if (solo_letras($frase) == false || solo_letras($desplazamiento) == false) { //comprobacion de solo letras en la frase y en el desplazamiento
            echo "introduzca solo letras";
        } else if ($frase == null || $desplazamiento == null) {
            echo "La frase y el desplazamiento deben tener valor";
        } else if (strlen($frase) > strlen($desplazamiento)) { //La frase debe ser mas larga o igual al desplazamiento
            echo "La frase y el desplazamiento deben tener la misma longitud o superior a la frase";
        } else if (strpos($desplazamiento, " ") == true) {
            echo "la semilla no debe tener espacios";
        } else {

            echo "Frase sin codificar: " . $frase;
            echo "<br>";
            echo "Frase condificada: ";

            //codificamos la frase
            $j = 0;
            for ($i = 0; $i < strlen($frase); $i++) {
                if ($frase[$i] == " ") {
                    echo " ";
                    $enigma[$i] = " "; //frase resultante en la codificacion
                } else {
                    $operacion = ((ord($desplazamiento[$j]) + ord($frase[$i])) - 193) % count($letra); //le resto 193 para que me de la posicion en codigo ascii, para que no se salga edl array
                    echo $letra[$operacion];
                    $enigma[$i] = $letra[$operacion];
                    $j++;
                }
            }
            //decodificamos la frase
            echo "</br>";
            echo "La frase decodificada: ";
            $p = 0;
            $k = 0;
            //recorremos enigma
            for ($i = 0; $p < count($enigma); $i++) {
                if ($enigma[$p] == " ") {
                    echo " ";
                    $p++;
                }

                if ($letra[$i] == $enigma[$p]) {
                    $opr = ((ord($enigma[$p]) - ord($desplazamiento[$k]))) % count($letra);
                    if ($opr <= 0) {
                        $opr = count($letra) + $opr;
                    }
                    echo $letra[$opr - 1];
                    $p++;
                    $i = -1;
                    $k++;
                    if ($k > strlen($desplazamiento)) {
                        $k = 0;
                    }
                }
            }
        }
    }
    ?>