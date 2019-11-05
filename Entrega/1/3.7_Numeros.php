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
        $des = $_POST['desplazamineto'];
        $letra = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'K', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        
        if (solo_letras($frase) && es_numero($des)) {
            echo "Frase sin codificar: " . $frase;
            echo "<br>";
            echo "Frase condificada: ";
            for ($i = 0; $i < strlen($frase); $i++) {
                $caracter = substr($frase, $i, 1);
                for ($j = 0; $j < count($letra); $j++) {
                    if ($letra[$j] == $caracter) {
                        $posicion = ($j + $des) % count($letra);
                        $enigma[$i] = $letra[$posicion];
                        echo $enigma[$i];
                    }

                    if ($caracter == " ") {
                        $enigma[$i] = " ";
                        echo " ";
                    }
                }
            }
            echo "<br>";
            echo "Frase decodificada: ";
            for ($i = 0; $i < count($enigma); $i++) {
                $caracter = $enigma[$i];
                for ($j = 0; $j < count($letra); $j++) {
                    if ($letra[$j] == $caracter) {
                        if (($j - $des) < 0) {
                            $des = $des % count($letra);
                            $posicion = (count($letra) - ($des - $j)) % count($letra);
                            echo $letra[$posicion];
                        } else {
                            $des = $des % count($letra);
                            echo $letra[$j - $des];
                        }
                    }
                    if ($enigma[$i] == " ") echo " ";
                }
            }
        } else {
            echo "La semilla debe ser un numero y la frase solo letras";
        }
    }


    ?>
</body>

</html>