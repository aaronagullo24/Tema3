<?php
    $numero=$_GET["dni"];
    $numero=strtoupper($numero);
    $longitud=strlen($numero);
    $valido=true;
    $i=0;

    if($longitud!=9) {
        $valido=false;
        echo "Longitud incorrecto";
        echo "<br>";
    }else{
        while($i<=7 && $valido){
            if(ord($numero[$i])<48 || ord($numero[$i])>57){
                echo "letras en posicion incorrecta";
                echo "<br>";
                $valido=false;
            }
            else{
                if(ord($numero[8])<65 || ord($numero[8]) >90){
                    $valido=false;
                    echo "Introduce letra final";
                    echo "<br>";
                }
            }
            $i++;
        }
    }
    if($valido==false){
        echo "El nif introducido no es valido";
    }
    else{
        echo "DNI correcto";
        echo $numero;
    }

    

?>