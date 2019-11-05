<html>
    <head>
        <title>"Codificacion"</title>
    </head>
<body>
<form method='POST' action='<?=$_SERVER['PHP_SELF']?>'> 
    <h1>Introduce la frase: </h1>
    Frase: <input type='text' name='frase' id='frase' ><br>
    Desplazamiento: <input type='text' name='des' id='des' ><br>
    <p></p>
    <input type='submit' value="enviar" name="Enviar" id="Enviar" >

</form>
<?php
 if(isset($_POST['frase'])){ //comprobamos que existen las variables
       
        $frase=strtolower($_POST['frase']);
        $des=$_POST['des'];
        $letra=array("a","b","c","d","e","f","g","h","i","j","K","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");
        echo "Frase sin codificar: ".$frase;
        echo "<br>";
        echo "Frase condificada: ";
    
   

    for($i=0;$i<=strlen($frase);$i++){
        $caracter=substr($frase,$i, 1);
        if($caracter == ' '){
            echo ' ';
            
        }else{
            for($j=0;$j<count($letra);$j++){
                if($letra[$j]==$caracter){
                    $posicion=$j;
                    $pos_final =($j+$des)%count($letra);
                    echo $letra[$pos_final];
                }
                
            }
    }
}
   
}
?>
</body>
</html>