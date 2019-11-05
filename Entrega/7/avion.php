<?php
include_once "funciones.php";
$array=[];
$imagen="imagenV.jpg";
    if(isset($_POST['cadena'])){
        $cadena=$_POST['cadena'];
        $fila=$_POST['fila'];
        $columna=$_POST['columna'];
        $array=cadena_a_array($cadena);

        if($array[$fila][$columna]=="imagenV.jpg"){
            $array[$fila][$columna]="rojo.jpg";
        }else{
            $array[$fila][$columna]="imagenV.jpg";
        }
        
    }else{
        for($i=1; $i<26;$i++){
            for($j=1;$j<5;$j++){
            $array[$i][$j]="imagenV.jpg";
            }
        }
    }
?>

<html>
<head>
    <title>reserva</title>
</head>
<body>
    <h1>reserva asientos</h1>
    <table>
    <?php
    $cadena=array_a_cadena($array);
        for($i=1; $i<26;$i++){
            ?><tr><?php
            for($j=1;$j<5;$j++){
               
                ?><td>
                 <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <input type="image" name="<?php echo "f".$i. "c".$j?>" id="<?php echo "f".$i. "c".$j?>" src="<?php echo $array[$i][$j]?>" alt="imagenasiento" >
                <input type="hidden" name="fila" id="fila" value="<?php echo $i?>">
                <input type="hidden" name="columna" id="columna" value="<?php echo $j?>">
                <input type="hidden" name="cadena" id="cadena" value="<?php echo $cadena?>">
                </form>
                
                <?php
            }
            ?></td>
                </tr>
                <?php
        }
        ?>
        </table>
   
    </body>
    </html>