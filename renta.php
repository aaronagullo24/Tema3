
<?php
if(isset($_GET['$nombre']) || isset($_GET['DNI']) || isset($_GET['sueldo'])){
    $nombre=$_GET['nombre'];
    $DNI=strtolower($_GET['DNI']);
    $sueldo=$_GET['sueldo'];
    $salida=true;

    function DNI($DNI){
        $numero=0;

        if(strlen($DNI)==9){
            while($numero<strlen($DNI)-1){
                if(ord(substr($DNI,$numero, $numero+1))>47  && ord(substr($DNI,$numero,$numero+1))<57){
                    $salida=true;
                }else $salida=false;
                
            }
                if($numero==8){
                    if(ord(substr($DNI, 8)) > 64 && ord(substr($DNI, 8)<90)){
                        $salida=true;
                    }else if(ord(substr($DNI, 8,1))>96 && ord(string.substr($DNI, 8) <128)){
                        $salida=false;
                    }else $salida=false;
                }else $salida=false;

            }else $salida=false;

            return $salida;
        }
    }


    function nombre($nombre){
        if(!is_numeric($nombre) && strlen($nombre) >3){
            $salida=true;
        }else $salida=false;

        return $salida;
    }

    function sueldo($sueldo){
        if($sueldo > 100){
            $salida=true;
        }else $salida=false;

        return $salida;
    }

    function calSueldo($sueldo){
        if($sueldo>100 && $sueldo <=1000){
            return $sueldo*0.10;
        }else if($sueldo>1000 && $sueldo <= 3000){
            return $sueldo * 0.15;
        }else if($sueldo > 3000){
            return $sueldo*0.20;
        }
    }

?>
<html>
<head>
        <title>Renta</title>
</head>
<body>
<form method='GET' action='renta.php' >

    Nombre: <input type='text' name='nombre' id='nombre' value="<?=isset($_GET['nombre'])?$nombre: '' ?>"><br>
    
    Sueldo: <input type='text' name='sueldo' id='sueldo' value="<?=isset($_GET['Sueldo'])?$Sueldo: '' ?>"><br>
    DNI: <input type='text' name='DNI' id='DNI' value="<?=isset($_GET['DNI'])?$DNI: '' ?>"><br>

    <input type='submit' value="enviar" name="Enviar" id="Enviar" >

</form>

<?php
if(isset($_GET['nombre']) || isset($_GET['DNI']) || isset($_GET['sueldo'])){
    if(nombre($nombre)==false){
        echo "introduce un nombre valido...";
        echo '<br>';
    }

    if(sueldo($sueldo)==false){
        echo "Tu sueldo es una mierda";
        echo '<br>';
    }else{
        $sueldo=calSueldo($sueldo);
        echo "Tu renta es: $sueldo";
        echo '<br>';
    }

    if(DNI($DNI)==false){
        echo "DNI incorrecto";
        echo '<br>';
    }
}
?>
</body>
</html>