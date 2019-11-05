<?php
include "funciones.php";
    $array_clientes=[
    "12345678D"=>["nombre"=>"Luis","nick"=>"luis","contraseña"=>"123","sexo"=>"M"],
    "2222222s"=>["nombre"=>"si","nick"=>"si","contraseña"=>"123","sexo"=>"H"],
    "3333333s"=>["nombre"=>"diego","nick"=>"diego","contraseña"=>"123","sexo"=>"M"],
    ];


    if(isset($_GET['dni'])){
        //recoger datos
        $dni=$_GET['dni'];
        $nombre=$_GET['nombre'];
        $nick=$_GET['nick'];
        $contraseña=$_GET['contraseña'];
        $sexo=$_GET['sexo'];
        //compruebo errores
        $errores=false;

        $array_errores=[];
        $array_No_vacios=["dni","nombre","nick"];
        for($i=0;$i<count($array_No_vacios);$i++){
            $campo=$array_No_vacios[$i];
            if(empty($_GET[$campo])){
                $errores=true;
                $array_errores[]="Error, el campo ".$array_No_vacios[$i]. " no puede estar vacio";
            }
        }

        //comprobar errores campos unicos
        //existe DNI
        if(isset($array_clientes[$dni])){
            $errores=true;
            echo "error el DNI ya existe \r\n";
        }

        $array_unico=["nick"];
        foreach($array_clientes as $indice => $fila){
            for($i=0;$i<count($array_unico);$i++){
                $campo=$array_unico[$i];
                if($fila[$campo]==$_GET[$campo]){
                $errores=true;
                $array_errores[]="Error, el campo ".$array_unico[$i]. " no puede estar vacio";
                }
            }
        }

        

        //compruebo que hay errores
        $cadena_errores=array_a_cadena($array_errores);
        
        $cadena_datos=["dni"=>$dni,"nombre"=>$nombre,"nick"=>$nick,"contraseña"=>$contraseña,"sexo"=>$sexo];

        if($errores) {
            header("location:logginb.php?errores=".$cadena_errores);
         }else{//Doy de alta
            echo "doy de alta";
            $array_clientes[$dni]=["nombre"=>$nombre,"nick"=>$nick,"contraseña"=>$contraseña,"sexo"=>$sexo];
            var_dump($array_clientes);
        }



    }else{
        echo "Error";
    }

?>