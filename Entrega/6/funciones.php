<?php
//Esta función recibe una cadena y devuelve un array
function cadena_a_array($texto)
{
    // Esto lo hacemos por si está vacía la cadena no me cree un array
    // con una posición vacía
    $array = array();
    if ($texto != "") {
        // Antes de descodificar hay que quitar cualquier \ contrabarra     
        $texto = stripslashes($texto);
        // Decodifico de formato URL a texto plano
        $texto = urldecode($texto);
        // Ahora a partir de la cadena genero un array
        $array = unserialize($texto);
    }
    return $array;
}


function array_a_cadena($array)
{

    //Primero Transformamos el array en una cadena de texto
    $cadenatmp = serialize($array);
    //Codificamos dicha cadena en formato URL para enviar correctamente
    // los caracteres especiales
    $cadena = urlencode($cadenatmp);
    //devolvemos la cadena codificada
    return $cadena;
}

function solo_letras($cadena)
{
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
    for ($i = 0; $i < strlen($cadena); $i++) {
        if (strpos($permitidos, substr($cadena, $i, 1)) === false) {
            //no es válido;
            return false;
        }
    }
    //si estoy aqui es que todos los caracteres son validos
    return true;
}

function es_numero($cadena)
{
    if (is_numeric($cadena)) {
        return true;
    } else {
        return false;
    }
}

function validar_dni($dni)
{
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
      
        return true;
    } else {
        
        return false;
    }
}
function boton6($cadena_datos)
{
    ?>
    <h1 style="color:black;float:center">SECCIONES</h1>

    <body Style="background-color:springgreen;">
        <form method="POST" action="6_todos.php" style="display:inline; color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="ver todo" name="ver todo" id="ver todo">
        </form>

        <form method="POST" action="6_vertrabajador.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="ver trabajadores" name="ver" id="ver todo">
        </form>
        <form method="POST" action="6_darAlta.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="dar de alta" name="daralta" id="daralta">
        </form>

        <form method="POST" action="6_darBaja.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="dar baja" name="darbaja" id="darbaja">
        </form>

        <form method="POST" action="6_modificar.php" style="display:inline;color:mediumspringgreen">
            <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
            <input type="submit" value="modificar" name="modificar" id="modificar">
        </form>
    </body>

<?php
}

function salario($horas)
{
    $salario = 0;
    if ($horas > 41) {
        $salario += ($horas - 41) * 12;
        $horas = 41;
    }
    if ($horas > 30 && $horas <= 41) {
        $salario += ($horas - 30) * 9;
        $horas = 30;
    }
    if ($horas <= 30) {
        $salario += $horas * 6;
    }
    return $salario;
}

function impuesto($salario)
{
    $impuesto = 0;
    if ($salario > 180) {
        $impuesto += ($salario - 180) * 1.15;
        $salario = 180;
    }
    if ($salario <= 180) {
        $impuesto += $salario * 1.10;
    }
    return $impuesto;
}
