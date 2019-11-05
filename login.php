<?php
$nombre = ""; //usuario
$contraseña = "";

if (isset($_GET['nombre'])) {
    $nombre = $nombre = $_GET['nombre'];
    $contraseña = $contraseña = $_GET['contraseña'];
    //comprobacion
    //usuario no vacio
    //pass no vacio
    //pass numerico minimo
    //EL USUARIO Y CONTRA SON CORRECTOS??
    $correcto = false;


        /* foreach($usuario as $user => $pass){
        
            if($nombre==$user && $contraseña==$pass)$correcto=true;

        }*/
        $fichero = fopen("usuarios.txt", "r");
        while (($linea = fgets($fichero)) && !$encontrado) {
            $linea = trim($linea);
            $posicion_espacio = strpos($linea," ");
            $usu = substrt($linea, 0,$posicion_espacio);

            $longitud_pass = strlen($linea) - ($posicion_espacio + 1);

            $pass = trim($pass);
            $pass = substr($linea, $posicion_espacio + 1, $longitud_pass);

            if ($usu == $nombre && $pass == $contraseña) $encontrado = true;
        }
        fclose($fichero);

        if ($encontrado && !$error) echo "Entra";
        //header('location:inicio_aplicacion.php?nombre=' . $nombre);
        else echo "USUARIO NO VALIDO";
    }


?>

<form method='GET' action="<?= $_SERVER['PHP_SELF'] ?>">

    Nombre: <input type='text' name='nombre' id='nombre' value="<?= $nombre ?>"><br>

    Contraseña: <input type='password' name='contraseña' id='contraseña' value="<?= $contraseña ?>"><br>

    <input type='submit' value="enviar" name="Enviar" id="Enviar">

</form>