<?php
$nombre = ""; //usuario
$contraseña = "";

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $contraseña = $_GET['contraseña'];
    //comprobacion
    //usuario no vacio
    //pass no vacio
    //pass numerico minimo
    //EL USUARIO Y CONTRA SON CORRECTOS??
    $encontrado = false;


    $fichero = fopen("usuarios.txt", "r");
    while (($linea = fscanf($fichero, "%s %s")) && !$encontrado) {
        if ($linea[0] == $nombre && $linea[1] == $contraseña) $encontrado = true;
    }
    fclose($fichero);
    $fichero2=fopen("logs.txt","a+");
       

    if ($encontrado){
        echo "todo correcto";
        fputs($fichero2 ,"El usuario $nombre ha entrado: " .date("l"). PHP_EOL);
    
    }else{
        echo "USUARIO NO VALIDO";
        fputs($fichero2 ,"El usuario $nombre ha intentado entrar: " .date("l").PHP_EOL);
    } 
}


?>

<form method='GET' action="<?= $_SERVER['PHP_SELF'] ?>">

    Nombre: <input type='text' name='nombre' id='nombre' value="<?= $nombre ?>"><br>

    Contraseña: <input type='password' name='contraseña' id='contraseña' value="<?= $contraseña ?>"><br>

    <input type='submit' value="enviar" name="Enviar" id="Enviar">

</form>