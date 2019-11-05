<?php
include "funciones.php";
if(isset($_GET['errores'])){
    $array_errores=cadena_a_array($_GET['errores']);
    $arrar_datos=cadena_a_array($_GET['datos']);
    var_dump($array_errores);
    var_dump($array_datos);
}
?>


<form method='GET' action="comprobar.php">

    DNI: <input type='text' name='dni' id='dni' value=""><br>

    Nombre: <input type='text' name='nombre' id='nombre' ><br>

    Nick: <input type='text' name='nick' id='nick' ><br>

    Contraseña: <input type='password' name='contraseña' id='contraseña' ><br>

    Sexo: <input type="radio" name="sexo" id="sexo" value="mujer" checked>Mujer
    <input type="radio" name="sexo" id="sexo" value="hombre">Hombre
    <br>

    Aficiones: <input type="checkbox" name="box" value="deporte[]">deporte
    <input type="checkbox" name="box" value="musica[]">musica
    <input type="checkbox" name="box" value="jugar[]">jugar
    <br>


    <input type='submit' value="enviar" name="Enviar" id="Enviar" >

</form>