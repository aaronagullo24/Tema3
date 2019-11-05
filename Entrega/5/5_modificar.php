<?php
include "funciones.php";
$cadena_datos = "";
$cadena_datos = $_POST['cadena'];
$producto = "";
$precio=0;
  

if (isset($_POST['ver'])) {
    
    $cadena_datos = $_POST['cadena'];
    $arrayd = cadena_a_array($cadena_datos);
    
    $ven_pasado = $_POST['vendedores'];
    $pro_pasado = $_POST['producto'];
    $precio = $_POST['precio'];

    $arrayd[$ven_pasado][$pro_pasado]=$precio;
    $cadena_datos = array_a_cadena($arrayd);
}
boton($cadena_datos);
?>




<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <select name="vendedores">
        <option value="v1">vendedor 1</option>
        <option value="v2">vendedor 2</option>
        <option value="v3">vendedor 3</option>
        <option value="v4">vendedor 4</option>
        <option value="v5">vendedor 5</option>
        <option value="v6">vendedor 6</option>
        <option value="v7">vendedor 7</option>
        <option value="v8">vendedor 8</option>
        <option value="v9">vendedor 9</option>
        <option value="v10">vendedor 10</option>
        <option value="v11">vendedor 11</option>
        <option value="v12">vendedor 12</option>
        <option value="v13">vendedor 13</option>
        <option value="v14">vendedor 14</option>
        <option value="v15">vendedor 15</option>
        <option value="v16">vendedor 16</option>
        <option value="v17">vendedor 17</option>
        <option value="v18">vendedor 18</option>

    </select>

    <select name="producto">
        <option value="Consola">Consola</option>
        <option value="Television">Television</option>
        <option value="Cascos">cascos</option>
        <option value="Mandos">Mandos</option>
        <option value="coches">Coches</option>
        <option value="Carne">Carne</option>
        <option value="Pescado">Pescado</option>
        <option value="Plantas">Plantas</option>
        <option value="Videojuegos">Videojuegos</option>
        <option value="DVD">DVD</option>

    </select>
    Nuevo Dato: <input type="text" name="precio" id="precio" value="<?php echo $precio; ?>">
    <input type="submit" value="modificar" name="ver" id="ver todo">
    <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">

</form>

