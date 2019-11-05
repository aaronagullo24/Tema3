<?php
//Esta función recibe una cadena y devuelve un array
function cadena_a_array($texto) {
// Esto lo hacemos por si está vacía la cadena no me cree un array
// con una posición vacía
        $array = array();
        if($texto != "") {
// Antes de descodificar hay que quitar cualquier \ contrabarra     
            $texto = stripslashes($texto);
// Decodifico de formato URL a texto plano
            $texto = urldecode($texto);
// Ahora a partir de la cadena genero un array
            $array = unserialize($texto);
        }
        return $array;   
}


function array_a_cadena($array) {

//Primero Transformamos el array en una cadena de texto
     $cadenatmp = serialize($array);
//Codificamos dicha cadena en formato URL para enviar correctamente
// los caracteres especiales
     $cadena = urlencode($cadenatmp);
//devolvemos la cadena codificada
     return $cadena;
}

function solo_letras($cadena){
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
    for ($i=0; $i<strlen($cadena); $i++){
        if (strpos($permitidos, substr($cadena,$i,1))===false){
            //no es válido;
            return false;
        }
    }
    //si estoy aqui es que todos los caracteres son validos
    return true;
}

function es_numero($cadena){
    if (is_numeric($cadena)) {
        return true;
    }
    else {
       return false;
    }
}

function boton($cadena_datos)
{
    ?>
    <h1 style="color:black;float:center">SELLERS</h1>
    <body Style="background-color:springgreen;">
    <!--Ver todas las ventas-->
    <form method="POST" action="5.php" style="display:inline">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="ver todo" name="ver" id="ver todo">
    </form>

    <!--Eliges vendedor y ves sus ventas -->
    <form method="POST" action='5_vendedor.php' style="display:inline">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="ver vendedor" name="ver vendedor" id="ver vendedor">
    </form>

    <!--Eliges vendedor y producto -->
    <form method="POST" action='5_vendedor_producto.php' style="display:inline">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="ver vendedor y producto" name="ver vendedor y producto" id="ver vendedor_producto">
    </form>

    <!--Eliges producto -->
    <form method="POST" action='producto.php' style="display:inline">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="ver producto" name="ver producto" id="ver producto">
    </form>

    <!--Modificar -->
    <form method="POST" action='5_modificar.php' style="display:inline">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="modificar" name="modificar" id="modificar">
    </form>
    </body>
<?php
}


?>