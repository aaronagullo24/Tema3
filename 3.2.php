<?php
    $frase = "El perro de San Roque no tiene rabo";

    $palabra=false;
    $posinicial=-1;
    $posFinal=-1;
    $totalPalabra=0;
    
    for($i=0;$i<strlen($frase);$i++){
        if($frase[$i]==" "){
            //  vengo de cadena
            if($palabra==true){
                //acaba la palabra
                $posFinal=$i-1;
                $nuevapalabra=substr($frase,$posinicial,$posFinal-$posinicial+1);
                echo "La palabra es: ".$nuevapalabra; 
                echo " Longitud palabra " .strlen($nuevapalabra)."<br>";
                $totalPalabra++;

                //reiniciar datos
                $palabra=false;
            }
        }else{
            if(!$palabra){
                $palabra=true;
                $posinicial=$i;
            }
        }

    }
    if($palabra)
                $posFinal=$i-1;
                $nuevapalabra=substr($frase,$posinicial,$posFinal-$posinicial+1);
                echo "La palabra es: ".$nuevapalabra; 
                echo " Longitud palabra " .strlen($nuevapalabra);
                $totalPalabra++;

                //reiniciar datos
                $palabra=false;
            
?>

